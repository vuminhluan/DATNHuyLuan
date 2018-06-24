<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bai_viet as BaiViet;
// use Auth;
use Illuminate\Support\Facades\Auth;
use DB;

class BaiVietController extends Controller
{
  public function getTrangBaiViet()
  {
  	$tatca_baiviet = BaiViet::orderBy('thoi_gian_dang', 'DESC')->with(['belongsToTaiKhoan.hasNguoiDung', 'belongsToTaiKhoan:ma_tai_khoan,ten_tai_khoan'])->paginate(8);
  	return view('admin.baiviet.index', ['tatca_baiviet'=>$tatca_baiviet]);
  }

  public function postCapNhat(Request $req)
  {
  	// return $req;

  	$message = "";
    $data_update = [
      'nguoi_sua' => Auth::user()->ma_tai_khoan,
      'trang_thai' => 1
    ];

  	if($req->task == "post-ban") {
      $data_update['trang_thai'] = 2;
  		$message = "Đánh dấu vi phạm";
  	} else if ($req->task == "post-live") {
  		$message = "Cho phép hiển thị bình thường";
  	} else if ($req->task == "post-delete") {
      $data_update['trang_thai'] = 0;
  		$message = "Xóa";
  	}

  	BaiViet::whereIn('ma_bai_viet', $req->id)->update($data_update);
  	return redirect()->back()->with('slidemessage', 'Đã '.$message.' những bài viết được chọn');

  }

  public function getXemChiTietBaiViet($post_id)
  {
  	// $baiviet = BaiViet::find($post_id);
  	// return $baiviet;

  	$account_posts = DB::table('bai_viet')
			->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
			->join('nhom','bai_viet.ma_chu_bai_viet','=','nhom.ma_nhom')
			->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
			->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
      ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet', 'nhom.ma_nhom', 'nhom.ten_nhom')//
      ->where([['bai_viet.ma_bai_viet',$post_id]])
      ->get();

     // return $account_posts;

     return view('admin.baiviet.chitiet')->with(['lstbaiviet'=>$account_posts]);






  }

}
