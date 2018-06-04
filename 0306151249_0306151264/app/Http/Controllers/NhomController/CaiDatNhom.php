<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\thanh_vien_nhom;
use App\thanh_vien_cho_phe_duyet;
use App\NguoiDung;
use App\nhom_m;
use App\chuc_vu_cua_thanh_vien_trong_nhom;
use App\cai_dat_nhom;

class CaiDatNhom extends Controller
{
    public function GetViewCaiDatNhom(Request $rql){
    	$caidatnhom = $this->GetCaiDatNhom($rql);
    	return View("nhom.includesnhom.caidatnhom",["caidatnhom"=>$caidatnhom]);
    }
   	public function PostCaiDatNhom(Request $rql){
   		$caidatmotnhom = new cai_dat_nhom();
   		$caidatmotnhom->ma_nhom 							=  $rql->ma_nhom;
   		$caidatmotnhom->ma_loai_nhom						=  $rql->ma_loai_nhom;
   		$caidatmotnhom->phe_duyet_bai_viet_an_danh			=  $rql->phe_duyet_bai_viet_an_danh;
   		$caidatmotnhom->phe_duyet_bai_viet_binh_thuong		=  $rql->phe_duyet_bai_viet_binh_thuong;
   		$caidatmotnhom->trang_thai_ma_gia_nhap_nhom			=  $rql->trang_thai_ma_gia_nhap_nhom;
   		$caidatmotnhom->ma_gia_nhap_nhom					=  $rql->ma_gia_nhap_nhom;
   		$caidatmotnhom->trang_thai_cau_hoi_gia_nhap_nhom	=  $rql->trang_thai_cau_hoi_gia_nhap_nhom;
   		$caidatmotnhom->ma_nguoi_them						=  $rql->ma_nguoi_them;
   		$caidatmotnhom->trang_thai 							=  $rql->trang_thai;
   		$caidatmotnhom->save();
   	//	return "Post cài đặt nhóm thành công";
   	}
    public function PostUpdateCaiDatNhom(Request $rql){
      return   DB::table('cai_dat_nhom')
                                    ->where('ma_nhom',$rql->ma_nhom)
                                    ->update([
                                              
                                              'ma_loai_nhom'                      =>$rql->ma_loai_nhom,
                                              'phe_duyet_bai_viet_an_danh'        =>$rql->phe_duyet_bai_viet_an_danh,
                                              'phe_duyet_bai_viet_binh_thuong'    =>$rql->phe_duyet_bai_viet_binh_thuong,
                                              'trang_thai_ma_gia_nhap_nhom'       =>$rql->trang_thai_ma_gia_nhap_nhom,
                                              'ma_gia_nhap_nhom'                  =>$rql->ma_gia_nhap_nhom,
                                              'trang_thai_cau_hoi_gia_nhap_nhom'  =>$rql->trang_thai_cau_hoi_gia_nhap_nhom,
                                              'ma_nguoi_them'                     =>$rql->ma_nguoi_them,
                                              'trang_thai'                        =>$rql->trang_thai
                                            ]);
    }

    public function GetCaiDatNhom(Request $rql){
    	return  DB::table('cai_dat_nhom')->where("ma_nhom",$rql->ma_nhom)->get();
    }
    public function GetCauHoiGiaNhap(Request $rql){

    }
    public function GetPheDuyetBaiVietTruocKhiXuatHien(Request $rql){

    }
    public function GetGioiThieuNhom(Request $rql){
    	
    }
}
