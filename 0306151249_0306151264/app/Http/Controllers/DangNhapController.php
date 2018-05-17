<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;


class DangNhapController extends Controller
{

	// For Auth, change default name "username" to what we want.
	public function username()
  {
    return "ten_tai_khoan";
  }
	// End For Auth...

	public function getIndex()
	{
		if(Auth::check())
			return redirect()->route('trangchu');
		return view('index');
	}

	public function postDangNhap(Request $req)
	{

		$username = $req->username;
		$password = $req->password;
		// $remember = $req->remember == true ? true : false;
		$remember = $req->remember;

		$success  = false;

		// Chưa xét tài khoản bị khóa hay chưa kích hoạt

		if ( Auth::attempt(['ten_tai_khoan' => $username, 'password' => $password], $remember) || Auth::attempt(['email' => $username, 'password' => $password]) ) {
			$success = true;
			return ['success' => $success, 'message' => 'Đăng nhập thành công !'];
  	}

		$message = "Tài khoản không tồn tại";
		if(TaiKhoan::where('ten_tai_khoan', $username)->first()) {
			$message =  "Xin hãy kiểm tra lại mật khẩu";
		}
		return ['success' => $success, 'message' => $message];
		// return $message;

	}


}
