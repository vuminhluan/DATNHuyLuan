<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaiKhoan;

class TaiKhoanController extends Controller
{
  public function getTrangQuanLyTaiKhoan()
  {
  	$tatca_taikhoan = TaiKhoan::paginate(5);
  	return view('admin.taikhoan.index', ['tatca_taikhoan' => $tatca_taikhoan]);
  }
}
