<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Traits\XacNhanMatKhauTrait;

class CaiDatController extends Controller
{
  use XacNhanMatKhauTrait;

  public function getIndex()
  {
  	return view('caidat.index');
  }

  public function postThayDoiTaiKhoan(Request $req)
  {

    // if( !Auth::attempt(['ten_tai_khoan' => Auth::user()->ten_tai_khoan, 'password' => $req->confirm_password]) ) {
    //   return ['errors' => ["confirm_password" => ["Mật khẩu xác nhận không đúng"] ]];
    // }

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
    $this->capNhatTaiKhoan($req);

    return ["success" => "Cập nhật thành công. Chuẩn bị tải lại trang"];

    

  }


  public function capNhatTaiKhoan($req)
  {
    $taikhoan = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();

    $taikhoan->ten_tai_khoan = $req->username;
    $taikhoan->email = $req->email;
    if($req->phone != "") {
      $taikhoan->so_dien_thoai = $req->phone;
    }
    $taikhoan->save();
  }

  public function getTrangThayDoiMatKhau()
  {
    return view('caidat.thaydoi_matkhau');
  }

  public function getTrangVoHieuHoaTaiKhoan()
  {
    return view('caidat.vohieuhoa_taikhoan');
  }

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
