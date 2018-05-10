<?php

namespace App\Http\Controllers\BaiVietController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bai_viet;



class BaiViet extends Controller
{
    //
    public function Dangbaiviet()
    {
    	$baiviet = new bai_viet();
    	$baiviet->ma_bai_viet 			="BV12345670";
    	$baiviet->ma_nguoi_viet			="NV12345670";
    	$baiviet->ma_chu_bai_viet		="NH12345670";
    	$baiviet->noi_dung_bai_viet		="Đây là bài viết test thêm vô";
    	$baiviet->binh_luan_bai_viet	="1";
    	$baiviet->hinh_anh_bai_viet		="1";
    	$baiviet->nop_tep				="1";
    	$baiviet->khao_sat_y_kien		="1";	
    	$baiviet->ma_loai_bai_viet		="LBV001";
    	$baiviet->thoi_gian_dang		=	"2001/01/01";
    	$baiviet->thoi_gian_an_bai_viet	=	"2001/01/01";
    	$baiviet->thoi_gian_sua			= 	"2001/01/01";
    	$baiviet->nguoi_sua				="NV12345670";	
    	$baiviet->save();
    	echo "đã thực hiện save";

    													
    }
}
