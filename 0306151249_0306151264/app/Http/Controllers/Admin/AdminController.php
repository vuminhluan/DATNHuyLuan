<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaiKhoan;
use App\TinNhanLienHe;

class AdminController extends Controller
{
  public function getIndex()
  {
  	$tatca_phanhoi = TinNhanLienHe::orderBy('thoi_gian_tao', 'desc')->get();
  	return view('admin.index', ['tatca_phanhoi' => $tatca_phanhoi]);
  }
}
