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
use App\cau_hoi_gia_nhap_nhom;
use App\tra_loi_gia_nhap_nhom;

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
      $caidatmotnhom->gioi_thieu_nhom             = $rql->gioi_thieu_nhom;
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
                                              'gioi_thieu_nhom'                   =>$rql->gioi_thieu_nhom,
                                              'phe_duyet_bai_viet_an_danh'        =>$rql->phe_duyet_bai_viet_an_danh,
                                              'phe_duyet_bai_viet_binh_thuong'    =>$rql->phe_duyet_bai_viet_binh_thuong,
                                              'trang_thai_ma_gia_nhap_nhom'       =>$rql->trang_thai_ma_gia_nhap_nhom,
                                              'ma_gia_nhap_nhom'                  =>$rql->ma_gia_nhap_nhom,
                                              'trang_thai_cau_hoi_gia_nhap_nhom'  =>$rql->trang_thai_cau_hoi_gia_nhap_nhom,
                                              'ma_nguoi_them'                     =>$rql->ma_nguoi_them,
                                              'trang_thai'                        =>$rql->trang_thai
                                            ]);
    }
    public function PostCauTraLoiGiaNhapNhom(Request $rql){
          $cautraloi = new  tra_loi_gia_nhap_nhom();
          $cautraloi->ma_cau_hoi         = $rql->ma_cau_hoi;
          $cautraloi->ma_nhom            = $rql->ma_nhom;
          $cautraloi->ma_nguoi_tra_loi   = $rql->ma_nguoi_tra_loi;
          $cautraloi->noi_dung_tra_loi   = $rql->noi_dung_tra_loi;
          $cautraloi->trang_thai         = $rql->trang_thai;
          $cautraloi->save();

    }

    public function GetCaiDatNhom(Request $rql){
    	return  DB::table('cai_dat_nhom')->where("ma_nhom",$rql->ma_nhom)->get();
    }
    public function GetCauHoiGiaNhap(Request $rql){
          return DB::table('cau_hoi_gia_nhap_nhom')->where([['ma_nhom',$rql->ma_nhom],['trang_thai',$rql->trang_thai]])->get();
    }
    public function PostXoaCauHoi(Request $rql){ //update trạng thái về 1
         return   DB::table('cau_hoi_gia_nhap_nhom')
                                    ->where('ma_cau_hoi',$rql->ma_cau_hoi)
                                    ->update(['trang_thai'=> $rql->trang_thai]);

    }
     public function PostLuuChinhSuaCauHoi(Request $rql){ //update trạng thái về 1
         return   DB::table('cau_hoi_gia_nhap_nhom')
                                    ->where('ma_cau_hoi',$rql->ma_cau_hoi)
                                    ->update(['nguoi_sua'=> $rql->nguoi_sua,
                                              'noi_dung_cau_hoi'=>$rql->noi_dung_cau_hoi
                                              ]);

    }
    public function PostCauHoiGiaNhapNhom(Request $rql){
          $cauhoigianhapnhom = new cau_hoi_gia_nhap_nhom();
          $cauhoigianhapnhom->ma_nhom           =$rql->ma_nhom;
          $cauhoigianhapnhom->noi_dung_cau_hoi  =$rql->noi_dung_cau_hoi;
          $cauhoigianhapnhom->nguoi_tao         =$rql->nguoi_tao;
          $cauhoigianhapnhom->nguoi_sua         =$rql->nguoi_sua;
          $cauhoigianhapnhom->trang_thai        =$rql->trang_thai;
          $cauhoigianhapnhom->save();
    }
    public function GetPheDuyetBaiVietTruocKhiXuatHien(Request $rql){

    }
    public function GetGioiThieuNhom(Request $rql){
    	
    }
}
