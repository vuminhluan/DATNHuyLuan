<?php

namespace App\Http\Controllers\BaiVietController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bai_viet;



class BaiViet extends Controller 
{
    //
    public function Getajax(Request $rq)
    {
        return $rq->dulieu;
    }
    public function Dangbaiviet( $rq)
    {
    	// $baiviet = new bai_viet();
    	// $baiviet->ma_bai_viet 			= $request->ma_bai_viet;
    	// $baiviet->ma_nguoi_viet			= $request->ma_nguoi_viet;
    	// $baiviet->ma_chu_bai_viet		= $request->ma_chu_bai_viet;
    	// $baiviet->noi_dung_bai_viet		= $request->noi_dung_bai_viet; 
    	// $baiviet->binh_luan_bai_viet	= $request->binh_luan_bai_viet;
    	// $baiviet->hinh_anh_bai_viet		= $request->hinh_anh_bai_viet;
    	// $baiviet->nop_tep				= $request->nop_tep;
    	// $baiviet->khao_sat_y_kien		= $request->khao_sat_y_kien;
    	// $baiviet->ma_loai_bai_viet		= $request->ma_loai_bai_viet;
    	// $baiviet->thoi_gian_dang		= $request->thoi_gian_dang;
    	// $baiviet->thoi_gian_an_bai_viet	= $request->thoi_gian_an_bai_viet;
    	// $baiviet->thoi_gian_sua			= $request->thoi_gian_sua;
    	// $baiviet->nguoi_sua				= $request->nguoi_sua;
    	// $baiviet->save();
    	// echo "đã thực hiện save";								
        return $rq->dulieu;		
    }



}
