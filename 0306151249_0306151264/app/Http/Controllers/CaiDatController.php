<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaiDatController extends Controller
{
  public function getIndex()
  {
  	return view('cai_dat.index');
  }
}
