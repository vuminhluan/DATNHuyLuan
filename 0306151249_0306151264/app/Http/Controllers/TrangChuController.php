<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrangChuController extends Controller
{
  public function getTrangChu()
  {
  	return view('trangchu');
  }
}
