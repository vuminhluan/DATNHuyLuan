<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TinNhanLienHe;

class PhanHoiController extends Controller
{
  public function getTrangQuanLyPhanHoi()
  {
  	$tatca_phanhoi = TinNhanLienHe::orderBy('thoi_gian_tao', 'desc')->paginate(2);
  	return view('admin.phanhoi.index',['tatca_phanhoi' => $tatca_phanhoi]);
  }
}
