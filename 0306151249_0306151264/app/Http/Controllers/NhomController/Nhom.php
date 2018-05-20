<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\nhom;


class Nhom extends Controller
{
    public function loadnhom ($id)
    {
    	$listbaiviet = DB::table('bai_viet')->orderBy('ma_bai_viet','desc')->take(3)->get();
    	$soluongbaiviet =10;
    	return view("nhom.indexnhom",["t"=>$id,"s"=>$soluongbaiviet,"lstbaiviet"=>$listbaiviet]);




    }
    public function getmanhom()
    {
    	$manhom = DB::table('nhom')->select('ma_nhom')->otherBy('ma_nhom','desc')->get()->first();
    	return $manhom->ma_nhom;
    }
    public function posttaonhom(Request $rql)
    {
    	$nhom = new nhom();

    	 $nhom->ma_nhom						= $rql->ma_nhom;
    	 $nhom->ma_gia_nhap					= $rql->ma_gia_nhap;
    	 $nhom->ten_nhom					= $rql->ten_nhom;
    	 $nhom->anh							= $rql->anh;
    	 $nhom->ma_tai_khoan				= $rql->ma_tai_khoan;
    	 $nhom->ma_loai_nhom				= $rql->ma_loai_nhom;
    	 $nhom->gioi_thieu_nhom				= $rql->gioi_thieu_nhom;
    	 $nhom->thoi_gian_tham_gia			= $rql->thoi_gian_tham_gia;
    	 $nhom->thoi_gian_het_han_tham_gia	= $rql->thoi_gian_het_han_tham_gia;
    	 $nhom->nguoi_sua					= $rql->nguoi_sua;
    	 $nhom->trang_thai  				= $rql->trang_thai;
    	 $nhom->save();
    	 return "ok";
    }
}
