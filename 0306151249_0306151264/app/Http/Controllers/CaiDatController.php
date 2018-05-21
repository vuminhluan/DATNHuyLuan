<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailThayDoiEmail;

use App\Traits\XacNhanMatKhauTrait;
use App\Traits\CapNhatDoiTuongTrait;

class CaiDatController extends Controller
{
  use XacNhanMatKhauTrait;
  use CapNhatDoiTuongTrait;

  public function getIndex()
  {
  	return view('caidat.index');
  }

  public function postThayDoiTaiKhoan(Request $req)
  {

    // if( !Auth::attempt(['ten_tai_khoan' => Auth::user()->ten_tai_khoan, 'password' => $req->confirm_password]) ) {
    //   return ['errors' => ["confirm_password" => ["Mật khẩu xác nhận không đúng"] ]];
    // }

    // XacNhanMatKhauTrait
    if(! $this->xacNhanMatKhau($req->confirm_password) ) {
      return ['errors' => ["confirm_password" => ["Mật khẩu xác nhận không đúng"] ]];
    }

    $rules = [];
    $messages = [];
    // Nếu người dùng thay đổi tài khoản và email hiện tại
    //  => Kiểm tra xem tài khoản và email đó đã có người sử dụng chưa
    if(Auth::user()->email != $req->email) {
      $rules['email'] = 'unique:tai_khoan,email';
      $messages['email.unique'] = 'Email đã có người sử dụng';
    }

    if(Auth::user()->ten_tai_khoan != $req->username) {
      $rules['username'] = 'unique:tai_khoan,ten_tai_khoan';
      $messages['username.unique'] = 'Tên tài khoản đã có người sử dụng';
    }

    $validator = Validator::make($req->all(), $rules, $messages);
    if($validator->fails()) {
      return Response()->json(['errors' => $validator->errors()]);
    }

    // Thỏa tất cả điều kiến => cập nhật tài khoản
    $data = [
      "ten_tai_khoan" => $req->username,
      // "email" => $req->email,
      "so_dien_thoai" => $req->phone
    ];

    // Muốn đổi email mới thì phải vào email mới và xác nhận
    // Chưa có link
    if($req->email != Auth::user()->email) {
      Mail::to($req->email, 'Luan')->send(new MailThayDoiEmail());
      return ['errors' => ["confirm_email" => ["Để cập nhật email bạn cần vào email mới và bấm nút xác nhận"] ]];
    }

    $taikhoan = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();

    // CapNhatDoiTuongTrait
    $this->capNhatDoiTuong($data, $taikhoan);

    return ["success" => "Cập nhật thành công. Chuẩn bị tải lại trang"];

  }

  public function getTrangThayDoiMatKhau()
  {
    return view('caidat.thaydoi_matkhau');
  }

  // Vô hiệu hóa tài khoàn
  public function getTrangVoHieuHoaTaiKhoan()
  {
    return view('caidat.vohieuhoa_taikhoan');
  }

  public function postVoHieuHoaTaiKhoan(Request $req)
  {


    if(! $this->xacNhanMatKhau($req->confirm_password) ) {
      return ['errors' => "Mật khẩu xác nhận không đúng"];
    }

    $data = [
      "trang_thai" => 3,
    ];

    $taikhoan = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();

    // CapNhatDoiTuongTrait
    $this->capNhatDoiTuong($data, $taikhoan);
    return ['success' => "Vô hiệu hóa tài khoản thành công"];

  }

  // End Vô hiệu hóa tài khoàn


  public function getTrangTaiKhoanBiChan()
  {
    return view('caidat.danhsach_taikhoan_bichan');
  }


  public function getQuenMatKhau()
  {
    return view('caidat.quen_matkhau');
  }
  public function postQuenMatKhau()
  {
    return "Hãy kiểm tra email để nhận mã thay đổi mật khẩu";
  }

}
