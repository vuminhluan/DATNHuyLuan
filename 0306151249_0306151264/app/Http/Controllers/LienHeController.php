<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TinNhanLienHe;
use App\Traits\CapNhatDoiTuongTrait;

class LienHeController extends Controller
{ 
  use CapNhatDoiTuongTrait;

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

  public function socketGuiTinNhan(Request $req)
  {

    return $req;
    $data = [
      'ho_va_ten' => $req->fullname,
      'email' => $req->email,
      'tin_nhan' => $req->message
    ];
    $tinnhan_lienhe = new TinNhanLienHe();

    $this->capNhatDoiTuong($data, $tinnhan_lienhe);

    $tinnhan_moinhat = TinNhanLienHe::find($tinnhan_lienhe->ma);
    return $tinnhan_moinhat;

  }
}
