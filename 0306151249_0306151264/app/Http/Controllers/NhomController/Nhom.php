<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class Nhom extends Controller
{
    public function loadnhom ($id)
    {
    	$listbaiviet = DB::table('bai_viet')->orderBy('ma_bai_viet','desc')->take(3)->get();
    	$soluongbaiviet =10;
    	return view("nhom.indexnhom",["t"=>$id,"s"=>$soluongbaiviet,"lstbaiviet"=>$listbaiviet]);




    }
    public function posttaonhom(Request $rql)
    {
    //	$nhom = new 
    	// ma_nhom	ma_gia_nhap	ten_nhom	anh	ma_tai_khoan	ma_loai_nhom	gioi_thieu_nhom	thoi_gian_tao	thoi_gian_tham_gia	thoi_gian_het_han_tham_gia	thoi_gian_sua	nguoi_sua	trang_thai
    }
}
