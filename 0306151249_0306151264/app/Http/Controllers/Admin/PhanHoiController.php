<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TinNhanLienHe;

class PhanHoiController extends Controller
{
  public function getTrangQuanLyPhanHoi()
  {
  	$tatca_phanhoi = TinNhanLienHe::orderBy('thoi_gian_tao', 'desc')->paginate(8);
  	return view('admin.phanhoi.index',['tatca_phanhoi' => $tatca_phanhoi]);
  }

  public function postXemPhanHoi(Request $req)
  {	
  	// return $req->id;
  	$tinnhan = TinNhanLienHe::find($req->id);
  	if(!$req->seen) {
  		$tinnhan->da_xem = "1";
  		$tinnhan->save();
  	}
  	return $tinnhan;

  }

  public function postXoaPhanHoi(Request $req)
  {
    // return $req->id;

    TinNhanLienHe::whereIn('ma', $req->id)->update(['trang_thai'=> 0]);
    return redirect()->back()->with('slidemessage', 'Đã xóa (những) phản hồi được chọn');
  }
}
