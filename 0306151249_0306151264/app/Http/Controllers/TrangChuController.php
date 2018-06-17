<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrangChuController extends Controller
{
  public function getTrangChu()
  {
  	// return view('trangchu');
  	return redirect()->route('trangcanhan.index', [Auth::user()->ten_tai_khoan]);
  }
}
