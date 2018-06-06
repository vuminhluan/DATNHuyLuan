<?php

namespace App\Http\Controllers\BaiVietController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\bai_viet;
use App\NguoiDung;
use App\Traits\BaiVietTrait;



class BaiViet extends Controller 
{

    use BaiVietTrait;

    public function Postbaiviet(Request $request)
    {
        // return  
    	// $baiviet = new bai_viet();
    	// $baiviet->ma_bai_viet 			= $request->ma_bai_viet;
    	// $baiviet->ma_nguoi_viet			= $request->ma_nguoi_viet;
    	// $baiviet->ma_chu_bai_viet		= $request->ma_chu_bai_viet;
    	// $baiviet->noi_dung_bai_viet		= $request->noi_dung_bai_viet; 
    	// $baiviet->binh_luan_bai_viet	= $request->binh_luan_bai_viet;
    	// $baiviet->hinh_anh_bai_viet		= $request->hinh_anh_bai_viet;
    	// $baiviet->nop_tep				= $request->nop_tep;
    	// $baiviet->khao_sat_y_kien		= $request->khao_sat_y_kien;
    	// $baiviet->ma_loai_bai_viet		= $request->ma_loai_bai_viet;
    	// $baiviet->thoi_gian_dang		= $request->thoi_gian_dang;
    	// $baiviet->thoi_gian_an_bai_viet	= $request->thoi_gian_an_bai_viet;
    	// $baiviet->thoi_gian_sua			= $request->thoi_gian_sua;
    	// $baiviet->nguoi_sua				= $request->nguoi_sua;
    	// $baiviet->save();							
     //    return "hihi";	
        return $this->PostbaivietT($request);	
    }
    public function GetMaBaiViet()
    {
      return  $this->GetMaBaiVietT();
        // $ma =  DB::table('bai_viet')->select('ma_bai_viet')->orderBy('ma_bai_viet','desc')->get()->first();
        // return $ma->ma_bai_viet;
    
    }
    public function GetBaiVietTheoChuBaiViet(Request $rq)
    {
        return $this->GetBaiVietTheoChuBaiVietT($rq);
    }
    public function GetBaiVietMoi(Request $rq)
    {
        return $this->GetBaiVietMoiT($rq);
        //     $mabaiviet=$rq->mabaiviet;


        // $listbaiviet = DB::table('bai_viet')->where("ma_bai_viet",$mabaiviet)->get();
        
        // return view("baiviet.hienthibaivietmoi",["mabaivietmoi"=>$mabaiviet,"lstbaiviett"=>$listbaiviet]);
    }
    public function Getbaiviettheonguoivietvanguoisohuu(Request $rql )
    {
        $listbaiviet = DB::table('bai_viet')
        ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
        ->select('nguoi_dung.*','bai_viet.*')
        ->where([["bai_viet.ma_nguoi_viet",$rql->ma_nguoi_viet],["bai_viet.ma_chu_bai_viet",$rql->ma_chu_bai_viet]])
        ->orderBy('bai_viet.ma_bai_viet','desc')
        ->get();
        return view("baiviet.hienthibaivietmoi",["lstbaiviett"=>$listbaiviet]);
    }



}
