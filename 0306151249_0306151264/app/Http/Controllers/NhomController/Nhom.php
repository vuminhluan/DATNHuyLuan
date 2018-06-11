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
use App\cai_dat_nhom;
use App\hinh_anh_bai_viet;
use App\tep_duoc_nop;
use App\ThuMucThuBai;
class Nhom extends Controller
{
    public function loadnhom ($idnhom)
    {
         $matk =  Auth::user()->ma_tai_khoan;
       // $machucvu = DB::table('thanh_vien_nhom')->select("ma_chuc_vu")->where([["ma_nhom",$idnhom],["ma_tai_khoan",$matk],["trang_thai","1"]
       //                                                                          ])->get();
        $caidatnhom       = DB::table('cai_dat_nhom')
                                ->where("ma_nhom",$idnhom)
                                ->get();
        $machucvu         = DB::table('chuc_vu_cua_thanh_vien_trong_nhom')
                                ->join('chuc_vu_trong_nhom','chuc_vu_cua_thanh_vien_trong_nhom.ma_chuc_vu','=','chuc_vu_trong_nhom.ma_chuc_vu')
                                ->select('chuc_vu_cua_thanh_vien_trong_nhom.*','chuc_vu_trong_nhom.*')
                                ->where([['ma_tai_khoan',$matk],['ma_nhom',$idnhom],['chuc_vu_cua_thanh_vien_trong_nhom.trang_thai',"1"]])
                                ->get();
        $nhom             = DB::table('nhom')
                                ->where("ma_nhom","$idnhom")
                                ->get();
        $lstthanhviennhom = DB::table('thanh_vien_nhom')
                                ->join('nguoi_dung','thanh_vien_nhom.ma_tai_khoan','=','nguoi_dung.ma_tai_khoan')
                                ->select('thanh_vien_nhom.*','nguoi_dung.*')
                                ->where([['ma_nhom',$idnhom],['thanh_vien_nhom.trang_thai',"1"]])
                                ->get();
        $totalbaiviet =     DB::table('bai_viet')->select(DB::raw('count(*) as soluongbaivietcuanhom'))
                                ->where([["ma_chu_bai_viet",$idnhom],["trang_thai","1"]])
                                ->get()[0]->soluongbaivietcuanhom;
        $listbaiviet      = DB::table('bai_viet')
                                ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
                                ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
                                ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                // ->leftJoin('thumuc_googledrive','bai_viet.ma_nguoi_viet','=','thumuc_googledrive.ma_tai_khoan')
                                // 'thumuc_googledrive.*',
                                ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
                                ->where([["bai_viet.ma_chu_bai_viet",$idnhom],["bai_viet.trang_thai","1"]])
                                ->orderBy('bai_viet.ma_bai_viet','desc')

                                // ->paginate(5)
                                // ->setPath("baiviet/trang");
                               ->take(10)->get();

// "lstykienbinhchon"=>$lstbinhchonykien

// 
        //$soluongbaiviet =10; //,"s"=>$soluongbaiviet
        return view("nhom.indexnhom",["t"=>$idnhom,"quyentruycapnhomcuataikhoan"=>$machucvu,"totalbaiviet"=>$totalbaiviet,"lstbaiviet"=>$listbaiviet,"caidatnhom"=>$caidatnhom,"thontinnhom"=>$nhom,"lstthanhviennhom"=>$lstthanhviennhom]);
    }



    public function getlsttepduocnoptheomabaiviet(Request $rql){
                 return DB::table('tep_duoc_nop')->select(DB::raw('count(*) as soluong'))->where([["ma_nguoi_nop",$rql->ma_nguoi_nop],["ma_bai_viet",$rql->ma_bai_viet]])->get();
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
