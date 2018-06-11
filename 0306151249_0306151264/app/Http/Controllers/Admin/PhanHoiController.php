<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TinNhanLienHe;

class PhanHoiController extends Controller
{
  public function getTrangQuanLyPhanHoi()
  {
  	$tatca_phanhoi = TinNhanLienHe::where('trang_thai', '1')->orderBy('thoi_gian_tao', 'desc')->paginate(8);
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

  public function postCapNhat(Request $req)
  {
    
    if($req->search) {
      return redirect()->route('admin.phanhoi.timkiem', [$req->search]);
    }

    // return "khong co search";
    // return $req->id;
    $message = "";
    if($req->task == "delete") {
      TinNhanLienHe::whereIn('ma', $req->id)->update(['trang_thai'=> 0]);
      $message = "Xóa";
    } else if($req->task == "mark_as_seen") {
      TinNhanLienHe::whereIn('ma', $req->id)->update(['da_xem'=> 1]);
      $message = "Đánh dấu đã đọc";
    } else {
      TinNhanLienHe::whereIn('ma', $req->id)->update(['da_xem'=> 0]);
      $message = "Đánh dấu chưa đọc";
    }

    // TinNhanLienHe::whereIn('ma', $req->id)->update(['trang_thai'=> 0]);
    return redirect()->back()->with('slidemessage', 'Đã '.$message.' (những) phản hồi được chọn');
    // return redirect()->back();
  }

  public function getTimKiemTheoTenNguoiGui($keyword)
  {
    $tatca_phanhoi = TinNhanLienHe::where('trang_thai', '1')->where('ho_va_ten', 'LIKE', '%'.$keyword.'%')->orderBy('thoi_gian_tao', 'desc')->paginate(8);
    return view('admin.phanhoi.index',['tatca_phanhoi' => $tatca_phanhoi]);
  }
}
