<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\thanh_vien_nhom;


class ThanhVienNhom extends Controller
{
    public function GetNhomTheoMaTaiKhoan(Request $rq)
    {
    	$lstNhomCuaTaiKhoan = DB::table("thanh_vien_nhom")->where("ma_tai_khoan",$rq->ma_tai_khoan)->get();
    	return view("includes.content-menu-popup",["lstnhomcuataikhoan"=>$lstNhomCuaTaiKhoan]);
    }

    public function GetThanhVienTheoMaNhom()
    {

    }
}
