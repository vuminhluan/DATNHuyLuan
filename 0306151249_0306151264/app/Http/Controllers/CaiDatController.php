<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaiDatController extends Controller
{
  public function getIndex()
  {
  	return view('caidat.index');
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

}
