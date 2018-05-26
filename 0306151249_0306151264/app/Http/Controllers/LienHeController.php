<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinNhanLienHe;

class LienHeController extends Controller
{
  public function postLienHe(Request $req)
  {
  	$tinnhan_lienhe = new TinNhanLienHe();
  	$tinnhan_lienhe->ho_va_ten = $req->fullname;
  	$tinnhan_lienhe->email = $req->email;
  	$tinnhan_lienhe->tin_nhan = $req->message;
  	$tinnhan_lienhe->trang_thai = 1;

  	$tinnhan_lienhe->save();

  	return redirect()->back()->with('success_message', 'Cảm ơn bạn đã gửi liên lạc với chúng tôi.');
  }
}
