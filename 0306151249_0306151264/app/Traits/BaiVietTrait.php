<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\bai_viet;

trait BaiVietTrait{

/////this is test

 public function PostbaivietT( $request)
    { 
// ma_bai_viet
// ma_nguoi_viet
// ma_chu_bai_viet
// noi_dung_bai_viet
// binh_luan_bai_viet
// hinh_anh_bai_viet
// nop_tep
// khao_sat_y_kien
// ma_loai_bai_viet
// thoi_gian_dang
// thoi_gian_an_bai_viet
// thoi_gian_sua
// nguoi_sua
// 
    	$baiviet = new bai_viet();
    	//$baiviet->ma_bai_viet 			= $request->ma_bai_viet;
    	$baiviet->ma_nguoi_viet			= $request->ma_nguoi_viet;
    	$baiviet->ma_chu_bai_viet		= $request->ma_chu_bai_viet;
    	$baiviet->noi_dung_bai_viet		= $request->noi_dung_bai_viet; 
    	$baiviet->binh_luan_bai_viet	= $request->binh_luan_bai_viet;
    	$baiviet->hinh_anh_bai_viet		= $request->hinh_anh_bai_viet;
    	$baiviet->nop_tep				= $request->nop_tep;
    	$baiviet->khao_sat_y_kien		= $request->khao_sat_y_kien;
    	$baiviet->ma_loai_bai_viet		= $request->ma_loai_bai_viet;
    	//$baiviet->thoi_gian_dang		= $request->thoi_gian_dang;
    	$baiviet->thoi_gian_an_bai_viet	= $request->thoi_gian_an_bai_viet;
    	//$baiviet->thoi_gian_sua			= $request->thoi_gian_sua;
    	$baiviet->nguoi_sua				= $request->nguoi_sua;
    	$baiviet->save();							
        return "hihi-traittttttttttttttxxxxxxxxxxxxxxxx";		
    }
    public function GetBaiVietTheoChuBaiVietT($rq)
    {
            $lstbaivietTheoMaChuBaiViet = DB::table('baiviet')->where("ma_chu_bai_viet",$rq->ma_chu_bai_viet)->take(10)->get();
            return $lstbaivietTheoMaChuBaiViet;
    }
    public function GetMaBaiVietT()
    {
        $ma =  DB::table('bai_viet')->select('ma_bai_viet')->orderBy('ma_bai_viet','desc')->get()->first();
        if($ma==''){
            return '0';
        }
        return $ma->ma_bai_viet;
    }
    public function GetBaiVietMoiT( $rq)
    {
        $mabaiviet=$rq->mabaiviet;
        $listbaiviet = DB::table('bai_viet')->where("ma_bai_viet",$mabaiviet)->get();
        return view("baiviet.hienthibaivietmoi",["mabaivietmoi"=>$mabaiviet,"lstbaiviett"=>$listbaiviet]);
    }



}