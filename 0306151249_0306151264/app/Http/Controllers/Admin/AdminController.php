<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TaiKhoan;
use App\TinNhanLienHe;

class AdminController extends Controller
{
  public function getIndex(Request $req)
  {
  	$list_chat = $req->session()->get('admin-chat');
  	return view('admin.index', ['list_chat' => $list_chat]);
  }
}
