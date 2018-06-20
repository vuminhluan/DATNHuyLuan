<?php

namespace App\Http\Controllers\ThongBaoController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\thong_bao_nhom;

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
}
