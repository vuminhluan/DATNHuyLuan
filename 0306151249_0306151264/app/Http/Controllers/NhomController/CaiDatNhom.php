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

class CaiDatNhom extends Controller
{
    public function GetViewCaiDatNhom(Request $rql){
    	$loainhom = $this->GetLoaiNhom($rql);
    	return View("nhom.includesnhom.caidatnhom",["loainhom"=>$loainhom]);
    }
    public function GetLoaiNhom(Request $rql){
    	return  DB::table('nhom')->select('ma_loai_nhom')->where("ma_nhom",$rql->ma_nhom)->get();
    }
    public function GetCauHoiGiaNhap(Request $rql){

    }
    public function GetPheDuyetBaiVietTruocKhiXuatHien(Request $rql){

    }
    public function GetGioiThieuNhom(Request $rql){
    	
    }
}
