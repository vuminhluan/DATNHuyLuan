<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailKichHoat;
use Carbon\Carbon;

class DangKiController extends Controller
{


  public function postDangKi(Request $req)
  {
    // Kiểm tra dữ liệu
    $rules = [
      'username' => 'unique:tai_khoan,ten_tai_khoan',
      'email'    => 'unique:tai_khoan,email'

    ];
    $messages = [
      'username.unique' => 'Tên tài khoản đã có người sử dụng.',
      'email.unique'    => 'Email đã có người sử dụng.'
    ];

    $validator = Validator::make($req->all(), $rules, $messages);
    // End Kiểm tra dữ liệu

    if($validator->fails()) {
  		return Response()->json(['errors'=>$validator->errors()]);
  	}
    // return "Tao tai khoan thanh cong";
    // Thỏa điều kiện, lưu thông tin vào bảng tài khoản, người dùng.

    //Tạo mã mới
    $ma_tai_khoan =  $this->taoMaTaiKhoan();
    $now = Carbon::now();

    // Tạo tài khoản (chỉ dành cho người dùng)
    $this->taoTaiKhoan($ma_tai_khoan, $req->username, $req->email, $req->password, $now);

    // Lưu thông tin người dùng (Họ tên, ảnh đại diện mặc định, ảnh bìa mặc định,...)
    $this->themThongTinNguoiDung($ma_tai_khoan, $req->lastname, $req->firstname, $now);

    Auth::attempt(['ten_tai_khoan' => $req->username, 'password' => $req->password]);

    //Gửi tin nhắn kích hoạt tới email
    Mail::send(new MailKichHoat());


  }


  public function taoTaiKhoan($ma_tai_khoan, $ten_tai_khoan, $email, $mat_khau, $thoigian_hientai)
  {

    $quyen = "Q0002"; //Người dùng

    $data = [
      'ma_tai_khoan'  => $ma_tai_khoan,
      'ten_tai_khoan' => $ten_tai_khoan,
      'email'         => $email,
      'mat_khau'      => bcrypt($mat_khau),
      'quyen'         => $quyen,
      'thoi_gian_tao' => $thoigian_hientai->toDateTimeString(),
      'thoi_gian_sua' => $thoigian_hientai->toDateTimeString(),
      'nguoi_sua'     => $ma_tai_khoan,
      'trang_thai'    => 1 // Chưa kích hoạt
    ];
    DB::table('tai_khoan')->insert($data);
  }

  public function themThongTinNguoiDung($ma_tai_khoan, $ho_ten_lot, $ten, $thoigian_hientai)
  {
    $anh_daidien = "default-avatar.jpg";
    $anh_bia = "default-banner.jpg";

    $data = [
      'ma_tai_khoan'  => $ma_tai_khoan,
      'ho_ten_lot'    => $ho_ten_lot,
      'ten'           => $ten,
      'anh_dai_dien'  => $anh_daidien,
      'anh_bia'       => $anh_bia,
      'thoi_gian_sua' => $thoigian_hientai->toDateTimeString(),
      'nguoi_sua'     => $ma_tai_khoan
    ];
    DB::table('nguoi_dung')->insert($data);
    // return Response()->json($data);
  }


  public function taoMaTaiKhoan()
  {
    // $lastID = DB::table('tai_khoan')->orderBy('thoi_gian_tao', 'DESC')->first()->ma_tai_khoan;
    $latestAccount = DB::table('tai_khoan')->latest('thoi_gian_tao')->first();
    if($latestAccount === null) return TaiKhoan::LayMaTaiKhoanDauTien();
    $lastID = $latestAccount->ma_tai_khoan;

    $pattern = '/\d\d+/'; // Lấy ra dãy các chữ số liên tiếp. Ví dụ: TK00123896 => lấy ra 00123896
    preg_match($pattern, $lastID, $matches);

    $newIDNumber =  ltrim($matches[0], '0') + 1;

    $newID = "TK";
    for ($i=0; $i < strlen($lastID) - (2 + strlen($newIDNumber)) ; $i++) {
      $newID.="0";
    }
    $newID.=$newIDNumber;
    return $newID;
  }

  // Sau khi đăng kí, chuyển tới trang xác nhận tài khoản
  // Để người dùng nếu ko nhận được tin nhắn kích hoạt trong email thì ấn nút để gửi lại
  // public function getKichHoatTaiKhoan()
  // {
  //   if(Auth::check() && Auth::user()->trang_thai == 1)
  //     return view('khac.kichhoat_taikhoan');
  //   // return abort(404);
  //   return redirect()->back();
  // }



}
