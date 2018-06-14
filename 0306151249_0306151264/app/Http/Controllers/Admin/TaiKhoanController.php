<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\TaiKhoan;
use App\NguoiDung;

class TaiKhoanController extends Controller
{
  public function getTrangQuanLyTaiKhoan($role = "Q0002")
  {
  	if($role == "Q0001") {
  		abort(404);
  	}

  	$tatca_taikhoan = TaiKhoan::where('quyen', $role)->orderBy('thoi_gian_tao', 'DESC')->paginate(5);
  	return view('admin.taikhoan.index', ['tatca_taikhoan' => $tatca_taikhoan])->with('slidemessage', 'Trang quản lý tài khoản');
  }

  public function postXemChiTietTaiKhoan(Request $req)
  {
		$taikhoan  = TaiKhoan::find($req->id);

  	// return $taikhoan->hasNguoiDung->ho_ten_lot;
  	return [
			'taikhoan'  => $taikhoan,
			'nguoidung' => $taikhoan->hasNguoiDung
  	];
  }

  public function getTimKiemTheoTenTaiKhoan($filter_role, $keyword)
  {

    $tatca_taikhoan = TaiKhoan::where('ten_tai_khoan', 'LIKE', '%'.$keyword.'%')->where('quyen', $filter_role)->orderBy('thoi_gian_tao', 'DESC')->paginate(5);

    // $tatca_taikhoan = $tatca_taikhoan;
  	return view('admin.taikhoan.index', ['tatca_taikhoan' => $tatca_taikhoan])->with('slidemessage', 'Có bao nhiêu kết quả tìm kiếm');
  }

  public function postCapNhat(Request $req)
  {
  	// return $req;

  	if($req->search) {
  		$role = "Q0002";
  		if($req->filter_role && Auth::user()->quyen == "Q0001") {
  			$role = $req->filter_role;
  		}
      return redirect()->route('admin.taikhoan.timkiem', [$role, $req->search]);
    }

    if($req->filter_role) {
      return redirect()->route('admin.taikhoan', [$req->filter_role]);
    }

  	$message = "";
  	if($req->task == "account-ban") {
  		//Đánh dấu vi phạm
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 5]);
  		$message = "Đánh dấu vi phạm";
  	} else if ($req->task == "account-live") {
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 2]);
  		$message = "Cho phép hoạt động bình thường";
  	} else if ($req->task == "account-deactivate") {
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 4]);
  		$message = "Hủy kích hoạt - Xóa -";
  	} else if ($req->task == "account-inactivate") {
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 1]);
  		$message = "Đánh dấu chưa kích hoạt";
  	} else if ($req->task == "account-lock") {
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 3]);
  		$message = "Khóa";
  	}




  	return redirect()->back()->with('slidemessage', 'Đã '.$message.' những tài khoản được chọn');
  }
}
