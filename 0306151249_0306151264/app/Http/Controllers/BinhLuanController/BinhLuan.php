<?php

namespace App\Http\Controllers\BinhLuanController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\binh_luan_bai_viet;
use App\binh_luan_cap_2;
class BinhLuan extends Controller
{
	public function GetMaBinhLuan()
	{
		$mabl= DB::table('binh_luan_bai_viet')->select('ma_binh_luan')->orderBy('ma_binh_luan','desc')->get()->first();
		return $mabl->ma_binh_luan;
	}
	public function GetBinhLuanMoi(Request $rq)
	{
		 $noidung = $rq->noidung;
		return View('binhluan.motbinhluanmoi',["noidungbinhluanmoi"=>$noidung]);
	}



	// public function GetBinhLuanMoi(Request $rq)
	// {
	// 	$binhluanmoi = DB::table('binh_luan_bai_viet')->where('ma_binh_luan',$rq->ma_binh_luan)->get();
		 
	// 	return View('binhluan.motbinhluanmoi',["binhluanmoi"=>$binhluanmoi,"mabaivietmoil"=>$binhluanmoi->ma_bai_viet]);
	// }




	public function GetBinhLuan(Request $rq)
	{
		 $lstbinhluan = DB::table('binh_luan_bai_viet')->where('ma_bai_viet',$rq->ma_bai_viet)->take(5)->get();
		 
		return View('binhluan.motbinhluan',["lstbinhluan"=>$lstbinhluan,"mabaivietl"=>$rq->ma_bai_viet]);
	}


    public function PostBinhLuan(Request $rq)
    {
    	$binhluan = new binh_luan_bai_viet();
    	$binhluan->ma_binh_luan = $rq->ma_binh_luan;
    	$binhluan->ma_bai_viet	 = $rq->ma_bai_viet;
    	$binhluan->ma_nguoi_binh_luan = $rq->ma_nguoi_binh_luan;
    	$binhluan->noi_dung_binh_luan	= $rq->noi_dung_binh_luan;
    	$binhluan->thoi_gian_tao	=  $rq->thoi_gian_tao;
    	$binhluan->thoi_gian_sua	= $rq->thoi_gian_sua;
    	$binhluan->nguoi_sua	= $rq->nguoi_sua;
    	$binhluan->trang_thai = $rq->trang_thai;
    	$binhluan->save();
    }
    public function PostBinhLuanC2(Request $rq)
    {
    	$binhluanc2 = new binh_luan_cap_2();
    	$binhluanc2->ma_binh_luan = $rq->ma_binh_luan;
    	$binhluanc2->ma_binh_luan_cap_2	 = $rq->ma_binh_luan_cap_2;
    	$binhluanc2->ma_nguoi_binh_luan = $rq->ma_nguoi_binh_luan;
    	$binhluanc2->noi_dung_binh_luan	= $rq->noi_dung_binh_luan;
    	$binhluanc2->thoi_gian_tao	=  $rq->thoi_gian_tao;
    	$binhluanc2->thoi_gian_sua	= $rq->thoi_gian_sua;
    	$binhluanc2->nguoi_sua	= $rq->nguoi_sua;
    	$binhluanc2->trang_thai = $rq->trang_thai;
    	$binhluanc2->save();
    }
}
