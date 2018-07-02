<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bao_cao_vi_pham as BaoCao;

class BaoCaoController extends Controller
{
  public function getTrangQuanLyBaoCao()
  {
  	$tatca_baocao = BaoCao::orderBy('thoi_gian_gui_bao_cao', 'DESC')->where('trang_thai', '!=', 0)->with(['belongsToTaiKhoan.hasNguoiDung','belongsToLoaiBaoCao'])->paginate(8);
  	// return $tatca_baocao;
  	return view('admin.baocao.index', ['tatca_baocao' => $tatca_baocao]);
  }

  public function postCapNhat(Request $req)
  {
  	// return "Cap nhat bao cao";
  	// if($req->search) {
  	// 	return redirect()->route('admin.baocao.timkiem', [$req->search]);
  	// }

  	// return "ád";

  	$message = "";
    if($req->task == "report-delete") {
      BaoCao::whereIn('ma_bao_cao', $req->id)->update(['trang_thai'=> 0]);
      $message = "Xóa";
    } else if($req->task == "report-mark-as-seen") {
      BaoCao::whereIn('ma_bao_cao', $req->id)->update(['da_xem'=> 1]);
      $message = "Đánh dấu đã đọc";
    } else if($req->task == "report-mark-as-unread") {
      BaoCao::whereIn('ma_bao_cao', $req->id)->update(['da_xem'=> 0]);
      $message = "Đánh dấu chưa đọc";
    } else {
      abort(404);
    }

  	return redirect()->back()->with('slidemessage', 'Đã '.$message.' những báo cáo được chọn');
  }

  public function getTimKiemTheoTenNguoiGui($keyword)
  {
  	return $keyword;
    $tatca_nhom = Nhom::where('ten_nhom', 'LIKE', '%'.$keyword.'%')->orderBy('thoi_gian_tao', 'desc')->paginate(8);
    return view('admin.nhom.index',['tatca_nhom' => $tatca_nhom]);
  }

  public function postXemBaoCao(Request $req)
  {
    $report = BaoCao::find($req->id);
    return $report;
  }

}
