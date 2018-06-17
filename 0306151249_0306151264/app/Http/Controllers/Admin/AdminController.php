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
  	return view('admin.index');
  }
}
