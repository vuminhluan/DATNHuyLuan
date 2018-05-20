<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CaiDatController extends Controller
{
  public function getIndex()
  {
  	return view('caidat.index');
  }

  public function postThayDoiTaiKhoan(Request $req)
  {

    if( !Auth::attempt(['ten_tai_khoan' => Auth::user()->ten_tai_khoan, 'password' => $req->confirm_password]) ) {
      return ['form_message' => ["confirm_password" => ["Mật khẩu xác nhận không đúng"] ]];
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
      return Response()->json(['form_message' => $validator->errors()]);
    }


    return ['form_message' => ["success" => ["Mật khẩu xác nhận không đúng"] ]];



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
