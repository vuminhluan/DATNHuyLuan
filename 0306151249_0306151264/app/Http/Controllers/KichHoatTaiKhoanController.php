<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailKichHoat;

class KichHoatTaiKhoanController extends Controller
{

  public function kichHoatTaiKhoan($username, $usernameMD5)
  {

    $taikhoan;
    if($usernameMD5 == md5($username.'kichhoat') ) {
      $taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->first();

      // Nếu tài khoản chưa được kích hoạt => kích hoạt và login cho tài khoản đó.
      if($taikhoan->trang_thai == 1) {
        $taikhoan->trang_thai = 2;
        $taikhoan->save();

        // Nếu tài khoản chưa đăng nhập
        if(!Auth::check()) {
          Auth::login($taikhoan);
        }
      }
      return redirect()->route('index');

    }
    abort(404);
  }

  public function getKichHoatTaiKhoan()
  {
    if(Auth::check() && Auth::user()->trang_thai == 1)
      return view('khac.kichhoat_taikhoan');
    // return abort(404);
    abort(404);
  }

  public function guiLaiMailKichHoat()
  {
    Mail::send(new MailKichHoat());
    echo "<script>alert('Đã gửi lại mail kích hoạt tài khoản'); window.location.href='/kichhoat/taikhoan'</script>";
  }












  // End class
}
