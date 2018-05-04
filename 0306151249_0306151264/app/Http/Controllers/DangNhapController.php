<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DangNhapController extends Controller
{
	public function getIndex()
	{
		return view('index');
	}

	public function postDangNhap()
	{
		// Dang nhap

		// Chuyển hướng về trang chủ sau khi đăng nhập
		return redirect()->route('trangchu');
	}
}
