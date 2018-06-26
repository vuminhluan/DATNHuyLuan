<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\TaiKhoan;
use App\bai_viet as BaiViet;
use App\Nhom;
// use App\thanh_vien_nhom as ThanhVienNhom;

class NhomController extends Controller
{
  public function getIndex()
  {
  	$tatca_nhom = Nhom::orderBy('thoi_gian_tao','DESC')->with('belongsToTaiKhoan')->paginate(8);
  	return view('admin.nhom.index', ['tatca_nhom'=>$tatca_nhom]);
  }


  public function postCapNhat(Request $req)
  {

  	if($req->search) {
  		return redirect()->route('admin.nhom.timkiem', [$req->search]);
  	}

  	$message = "";
    $data_update = [
      'nguoi_sua' => Auth::user()->ma_tai_khoan,
      'trang_thai' => 1
    ];

  	if($req->task == "group-ban") {
      $data_update['trang_thai'] = 2;
  		$message = "Đánh dấu vi phạm";
  	} else if ($req->task == "group-live") {
  		$message = "Cho phép hoạt động bình thường";
  	} else if ($req->task == "group-delete") {
      $data_update['trang_thai'] = 0;
  		$message = "Xóa";
  	} else {
  		abort(404);
  	}

  	Nhom::whereIn('ma_nhom', $req->id)->update($data_update);
  	return redirect()->back()->with('slidemessage', 'Đã '.$message.' những nhóm được chọn');
  }

  public function getTimKiemTheoTenNhom($keyword)
  {
  	// return $keyword;
    $tatca_nhom = Nhom::where('ten_nhom', 'LIKE', '%'.$keyword.'%')->orderBy('thoi_gian_tao', 'desc')->paginate(8);
    return view('admin.nhom.index',['tatca_nhom' => $tatca_nhom]);
  }


  public function getXemChiTietNhom($group_id)
  {
    return view('admin.nhom.chitiet');
  }

}
