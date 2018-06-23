<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaiVietController extends Controller
{
  public function getTrangBaiViet()
  {
  	return view('admin.baiviet.index');
  }
}
