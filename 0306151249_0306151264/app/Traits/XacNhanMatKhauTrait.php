<?php

namespace App\Traits;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\TaiKhoan;

trait XacNhanMatKhauTrait {

	public function xacNhanMatKhau($confirm_password) {

		return Auth::attempt(['ten_tai_khoan' => Auth::user()->ten_tai_khoan, 'password' => $confirm_password, 'hoat_dong' => 1]);

	}

}