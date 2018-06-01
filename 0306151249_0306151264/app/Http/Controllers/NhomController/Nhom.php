<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\nhom_m;
use App\thanh_vien_nhom;
use App\thanh_vien_cho_phe_duyet;
use App\chuc_vu_cua_thanh_vien_trong_nhom;
use App\chuc_vu_trong_nhom;

class Nhom extends Controller
{
    public function loadnhom ($idnhom)
    {
         $matk =  Auth::user()->ma_tai_khoan;
       // $machucvu = DB::table('thanh_vien_nhom')->select("ma_chuc_vu")->where([["ma_nhom",$idnhom],["ma_tai_khoan",$matk],["trang_thai","1"]
       //                                                                          ])->get();
        $machucvu = DB::table('chuc_vu_cua_thanh_vien_trong_nhom')->join('chuc_vu_trong_nhom','chuc_vu_cua_thanh_vien_trong_nhom.ma_chuc_vu','=','chuc_vu_trong_nhom.ma_chuc_vu')->select('chuc_vu_cua_thanh_vien_trong_nhom.*','chuc_vu_trong_nhom.*')->where([['ma_tai_khoan',$matk],['ma_nhom',$idnhom],['chuc_vu_cua_thanh_vien_trong_nhom.trang_thai',"1"]])->get();


        $listbaiviet = DB::table('bai_viet')->where("ma_chu_bai_viet",$idnhom)->orderBy('ma_bai_viet','desc')->take(10)->get();
        $soluongbaiviet =10;
        return view("nhom.indexnhom",["t"=>$idnhom,"s"=>$soluongbaiviet,"lstbaiviet"=>$listbaiviet,"quyentruycapnhomcuataikhoan"=>$machucvu]);
    }
    public function getmanhom()
    {
    	$manhom = DB::table('nhom')->select('ma_nhom')->orderBy('ma_nhom','desc')->get()->first();
    	return $manhom->ma_nhom;
    }

    public function gettimkiemnhom(Request $rql)
    {
        $lstnhomtimkiem;
        if ($rql->ten_nhom!="") {
           $lstnhomtimkiem = DB::table('nhom')->where("ten_nhom","LIKE","%$rql->ten_nhom%")->take(5)->get();
        }
        else{
         $lstnhomtimkiem = DB::table('nhom')->where("ten_nhom","LIKE","%$rql->ten_nhom%")->take(0)->get();
        }
        return $lstnhomtimkiem;
    }
    public function getnhom(Request $rql)
    {
    	$nhom = DB::table('nhom')->where("ma_nhom",$rql->ma_nhom)->get();
    	return $nhom;
    }

    public function posttaonhom(Request $rql)
    {
        
    	 $nhom = new nhom_m();
    	 $nhom->ma_nhom						= $rql->ma_nhom;
    	 $nhom->ma_gia_nhap					= $rql->ma_gia_nhap;
    	 $nhom->ten_nhom					= $rql->ten_nhom;
    	 $nhom->anh							= $rql->anh;
    	 $nhom->ma_tai_khoan				= $rql->ma_tai_khoan;
    	 $nhom->ma_loai_nhom				= $rql->ma_loai_nhom;
    	 $nhom->gioi_thieu_nhom				= $rql->gioi_thieu_nhom;
    	 $nhom->thoi_gian_tham_gia			= $rql->thoi_gian_tham_gia;
    	 $nhom->thoi_gian_het_han_tham_gia	= $rql->thoi_gian_het_han_tham_gia;
    	 $nhom->thoi_gian_tao				= $rql->thoi_gian_tao;
    	 $nhom->thoi_gian_sua				= $rql->thoi_gian_sua;
    	 $nhom->nguoi_sua					= $rql->nguoi_sua;
    	 $nhom->trang_thai  				= $rql->trang_thai;
    	 $nhom->save();
         
    	 return "ok tao thanh cong";
    }

}
