<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrangCaNhanController extends Controller
{
	public function getTrangCaNhan($username)
	{
		return view('trang_ca_nhan.index')->with(['username'=>$username]);
	}
}
