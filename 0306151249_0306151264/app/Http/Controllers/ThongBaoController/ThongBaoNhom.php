<?php

namespace App\Http\Controllers\ThongBaoController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\thong_bao_nhom;
use App\nguoi_dung;
use App\nhom_m;

class ThongBaoNhom extends Controller
{
    //
    public function postthongbaonhom(Request $rql)
    {
    	$thongbaonhom = new thong_bao_nhom();
    	$thongbaonhom->ma_nhom     = $rql->ma_nhom;	
    	$thongbaonhom->ma_loai_thong_bao_nhom     = $rql->ma_loai_thong_bao_nhom;	
    	$thongbaonhom->noi_dung_thong_bao     = $rql->noi_dung_thong_bao;	
    	$thongbaonhom->nguoi_tao_thong_bao     = $rql->nguoi_tao_thong_bao;	
    	$thongbaonhom->trang_thai     = $rql->trang_thai;
    	$thongbaonhom->save();
    	return " Lưu thông báo nhóm thành công";
    }
    public function getthongbaonhom(Request $rql){
        $mataikhoan = $rql->ma_tai_khoan;
        $soluongthongbaodalay = $rql->soluongthongbaodalay;
        $soluongthongbaocanlay = $rql->soluongthongbaocanlay;
         $listthongbao = DB::table('thong_bao_nhom')
                        ->leftJoin('thanh_vien_nhom','thong_bao_nhom.ma_nhom','=','thanh_vien_nhom.ma_nhom')
                        ->leftJoin('nguoi_dung','thong_bao_nhom.nguoi_tao_thong_bao','=','nguoi_dung.ma_tai_khoan')
                        ->leftJoin('nhom','thanh_vien_nhom.ma_nhom','=','nhom.ma_nhom')
                        ->select('thong_bao_nhom.*','thanh_vien_nhom.*','nguoi_dung.*','nhom.*')
                        ->where('thanh_vien_nhom.ma_tai_khoan',$mataikhoan)
                        ->orderBy('thong_bao_nhom.ma_thong_bao_nhom','desc')
                        ->offset($soluongthongbaodalay)
                        ->limit($soluongthongbaocanlay)   
                        ->get();
                        return view("thongbao.thongbaonhom.thongbaonhom",["listthongbao"=>$listthongbao]);
    }
}
