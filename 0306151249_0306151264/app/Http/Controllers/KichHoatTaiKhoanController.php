<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailKichHoat;
use App\ThuMucGoogleDrive;

use App\Traits\TaoThuMucGoogleDriveTrait;
use App\Traits\CapNhatDoiTuongTrait;

class KichHoatTaiKhoanController extends Controller
{
  use CapNhatDoiTuongTrait;
  use TaoThuMucGoogleDriveTrait;

  public function kichHoatTaiKhoan($username, $usernameMD5)
  {

    $taikhoan;
    if($usernameMD5 == md5($username.'kichhoat') ) {
      $taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->where('hoat_dong', 1)->where('trang_thai', '!=', 4)->first();

      // Nếu tài khoản chưa được kích hoạt => kích hoạt và login cho tài khoản đó.
      if($taikhoan->trang_thai == 1) {
        $taikhoan->trang_thai = 2;
        $taikhoan->save();

        // Nếu tài khoản chưa đăng nhập
        if(!Auth::check()) {
          Auth::login($taikhoan);
        }
      }

      // Tạo thư mục google drive

      $root = env('GOOGLE_DRIVE_FOLDER_ID');
      $foldername = Auth::user()->ma_tai_khoan;
      $path = $root.'/'.$foldername;
      $search_from = $root;
      $folder = $this->taoThuMucGoogleDrive($path, $root, $foldername, $search_from);
      $thumuc_googledrive = new ThuMucGoogleDrive();
      $data = [
        'ma_tai_khoan' => Auth::user()->ma_tai_khoan,
        'ma_thumuc'    => $folder['basename'],
        'trang_thai'   => 1
      ];
      $this->capNhatDoiTuong($data, $thumuc_googledrive);

      // Tạo thư mục Google drive

      return redirect()->route('trangchu')->with('slidemessage', 'Chúc mừng @'.Auth::user()->ten_tai_khoan.' đã kích hoạt tài khoản thành công');

    }

    abort(404);
  }

  public function getKichHoatTaiKhoan()
  {
    if(Auth::check() && Auth::user()->trang_thai == 1)
      return view('khac.kichhoat_taikhoan');
    return abort(404);
  }

  public function guiLaiMailKichHoat()
  {
    Mail::send(new MailKichHoat());
    // echo "<script>alert('Đã gửi lại mail kích hoạt tài khoản')</script>";
    return redirect()->back()->with('success_message', 'Đã gửi lại email kích hoạt tài khoản');
  }












  // End class
}
