<?php

namespace App\Http\Controllers\BinhLuanController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\binh_luan_bai_viet;
use App\binh_luan_cap_2;
use App\bai_viet;
class BinhLuan extends Controller
{
	public function GetMaBinhLuan(Request $rql)
	{
		$mabl= DB::table('binh_luan_bai_viet')
        ->select('ma_binh_luan')
        ->where([['ma_nguoi_binh_luan',$rql->ma_nguoi_binh_luan],['ma_bai_viet',$rql->ma_bai_viet]])
        ->orderBy('ma_binh_luan','desc')
        ->get()
        ->first();
		return $mabl->ma_binh_luan;
	}
    public function GetMaBinhLuanCap2(Request $rql)
    {
        $mabl= DB::table('binh_luan_cap_2')
        ->select('ma_binh_luan_cap_2')
        ->where([['ma_nguoi_binh_luan',$rql->ma_nguoi_binh_luan],['ma_binh_luan',$rql->ma_binh_luan]])
        ->orderBy('ma_binh_luan_cap_2','desc')
        ->get()
        ->first();
        return $mabl->ma_binh_luan_cap_2;
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
		 $lstbinhluan = DB::table('binh_luan_bai_viet')
                        ->join('bai_viet','binh_luan_bai_viet.ma_bai_viet','=','bai_viet.ma_bai_viet')
                        ->join('nguoi_dung','binh_luan_bai_viet.ma_nguoi_binh_luan','=','nguoi_dung.ma_tai_khoan')
                        ->select('bai_viet.*','binh_luan_bai_viet.*','nguoi_dung.*')
                        ->where([['bai_viet.ma_bai_viet',$rq->ma_bai_viet],['binh_luan_bai_viet.trang_thai',"1"]])->take(15)->get();
		 
         return $lstbinhluan;
	 //	return View('binhluan.motbinhluan',["lstbinhluan"=>$lstbinhluan,"mabaivietl"=>$rq->ma_bai_viet]);
	}
    public function GetBinhLuanCap2(Request $rq)
    {
         return DB::table('binh_luan_cap_2')
                        ->join('binh_luan_bai_viet','binh_luan_cap_2.ma_binh_luan','=','binh_luan_bai_viet.ma_binh_luan')
                        ->join('nguoi_dung','binh_luan_cap_2.ma_nguoi_binh_luan','=','nguoi_dung.ma_tai_khoan')
                        ->join('bai_viet','binh_luan_bai_viet.ma_bai_viet','=','bai_viet.ma_bai_viet')
                        ->select('binh_luan_cap_2.*','binh_luan_bai_viet.*','nguoi_dung.*','bai_viet.*','binh_luan_cap_2.noi_dung_binh_luan')
                        ->where([['binh_luan_bai_viet.ma_binh_luan',$rq->ma_binh_luan],["binh_luan_cap_2.trang_thai","1"]])
                        ->take(15)
                        ->get();
         
        
    }

    public function updatebinhluan(Request $rql){
        DB::table("binh_luan_bai_viet")
                ->where("ma_binh_luan",$rql->ma_binh_luan)
                ->update(['trang_thai'=> $rql->trang_thai]);

    }
        public function updatebinhluancap2(Request $rql){
        DB::table("binh_luan_cap_2")
                ->where("ma_binh_luan_cap_2",$rql->ma_binh_luan_cap_2)
                ->update(['trang_thai'=> $rql->trang_thai]);

    }


    public function PostBinhLuan(Request $rq)
    {
    	$binhluan = new binh_luan_bai_viet();
    	// $binhluan->ma_binh_luan = $rq->ma_binh_luan;
    	$binhluan->ma_bai_viet	 = $rq->ma_bai_viet;
    	$binhluan->ma_nguoi_binh_luan = $rq->ma_nguoi_binh_luan;
    	$binhluan->noi_dung_binh_luan	= $rq->noi_dung_binh_luan;
    	// $binhluan->thoi_gian_tao	=  $rq->thoi_gian_tao;
    	// $binhluan->thoi_gian_sua	= $rq->thoi_gian_sua;
    	$binhluan->nguoi_sua	= $rq->nguoi_sua;
    	$binhluan->trang_thai = $rq->trang_thai;
    	$binhluan->save();
    }
    public function PostBinhLuanC2(Request $rq)
    {
    	$binhluanc2 = new binh_luan_cap_2();
    	$binhluanc2->ma_binh_luan = $rq->ma_binh_luan;
    	$binhluanc2->ma_nguoi_binh_luan = $rq->ma_nguoi_binh_luan;
    	$binhluanc2->noi_dung_binh_luan	= $rq->noi_dung_binh_luan;
    	$binhluanc2->nguoi_sua	= $rq->nguoi_sua;
    	$binhluanc2->trang_thai = $rq->trang_thai;
    	$binhluanc2->save();
    }
}
