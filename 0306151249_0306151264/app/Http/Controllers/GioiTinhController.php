<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GioiTinh;
use Illuminate\Support\Facades\DB;

class GioiTinhController extends Controller
{

  public function index() {
    $tatca_gioitinh = DB::table('gioi_tinh')
      ->join('nguoi_dung AS nguoi_tao', 'gioi_tinh.nguoi_tao', '=', 'nguoi_tao.ma_tai_khoan')
      ->join('nguoi_dung AS nguoi_sua', 'gioi_tinh.nguoi_sua', '=', 'nguoi_sua.ma_tai_khoan')
      // ->leftjoin('nguoi_dung AS nguoi_tao', 'gioi_tinh.nguoi_tao', '=', 'nguoi_tao.ma_tai_khoan')
      // ->leftjoin('nguoi_dung AS nguoi_sua', 'gioi_tinh.nguoi_sua', '=', 'nguoi_sua.ma_tai_khoan')
      ->select(
        'gioi_tinh.*',
        DB::raw("CONCAT(nguoi_tao.ho_ten_lot,' ', nguoi_tao.ten) AS hoten_nguoitao"),
        DB::raw("CONCAT(nguoi_sua.ho_ten_lot,' ', nguoi_sua.ten) AS hoten_nguoisua")
      )
      ->get();

    // return view('admin.gioitinh.index')->with(['tatca_gioitinh'=>$tatca_gioitinh]);
    return $tatca_gioitinh;
  }

  public function getThem() {
    return view('admin.gioitinh.them-gioitinh');
  }

  public function postThem(Request $req) {
    $gioitinh = new GioiTinh();
    $gioitinh->ma_gioi_tinh = 2;
    $gioitinh->ten_gioi_tinh = $req->gender;
    $gioitinh->nguoi_tao = "TK0001";
    $gioitinh->nguoi_sua = "TK0001";
    $gioitinh->save();
  }

}
