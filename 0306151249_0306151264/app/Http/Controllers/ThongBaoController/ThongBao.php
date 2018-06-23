<?php

namespace App\Http\Controllers\ThongBaoController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\thong_bao;
use Illuminate\Support\Facades\DB;
use App\nguoi_dung;
use App\nhom_m;
use App\bai_viet;

class ThongBao extends Controller
{
	 public function postthongbao(Request $rql)
	    {


	    	$thongbao = new thong_bao();
	    	$thongbao->noi_nhan_tac_dong     = $rql->noi_nhan_tac_dong;	                 // mã nhóm
	    	$thongbao->ma_loai_thong_bao     = $rql->ma_loai_thong_bao;	//đăng bài trong nhóm
	    	$thongbao->noi_dung_tac_dong     = $rql->noi_dung_tac_dong;	//mã bài viết
	        $thongbao->noi_dung_thong_bao 	 = $rql->noi_dung_thong_bao;         //"đã đăng bài viết"
	    	$thongbao->nguoi_tao_thong_bao   = $rql->nguoi_tao_thong_bao;	     // thành viên A
	    	$thongbao->trang_thai    		 = $rql->trang_thai;                       //1 là thông báo, 2 là thông  báo sẵn sàng
	    	$thongbao->save();
	    	return " Lưu thông báo thành công";
	    }

                                                // noi_nhan_tac_dong: $('#div-hi-chu-bai-viet-ma-nhom').val(), // hiện tại đăng trong nhóm nên sẽ là của nhóm
                                                // ma_loai_thong_bao:loaithongbao,
                                                // noi_dung_tac_dong:ma_noi_dung_duoc_thong_bao,
                                                // noi_dung_thong_bao:noidungthongbao,
                                                // nguoi_tao_thong_bao: $('#session-ma-tk').val(),
                                                // trang_thai: trangthai





	    public function getthongbao(Request $rql){ // tạm thời
	        $mataikhoan = $rql->ma_tai_khoan;
	        $soluongthongbaodalay = $rql->soluongthongbaodalay;
	        $soluongthongbaocanlay = $rql->soluongthongbaocanlay;
	         $listthongbao = DB::table('thong_bao')
	                        ->join('thanh_vien_nhom','thong_bao.noi_nhan_tac_dong','=','thanh_vien_nhom.ma_nhom')
	                        ->join('nguoi_dung as nguoitaothongbao','thong_bao.nguoi_tao_thong_bao','=','nguoitaothongbao.ma_tai_khoan')
	                        ->join('bai_viet','thong_bao.nguoi_tao_thong_bao','=','bai_viet.ma_nguoi_viet')
	                        ->join('nguoi_dung as chubaiviet','bai_viet.ma_nguoi_viet','=','chubaiviet.ma_tai_khoan')
	                        ->join('nhom','thanh_vien_nhom.ma_nhom','=','nhom.ma_nhom')
	                        ->select('thong_bao.*',
	                        		 'nguoitaothongbao.*',
	                        		 'nhom.*',
	                        		 'chubaiviet.*',
	                        		 DB::raw("CONCAT(nguoitaothongbao.ho_ten_lot,' ',nguoitaothongbao.ten) AS hovatennguoitaothongbao "),
	                        		 DB::raw("CONCAT(chubaiviet.ho_ten_lot,' ',chubaiviet.ten) AS hovatenchubaiviet ")
	                        		 )//,'chubaiviet.*' 'thanh_vien_nhom.*','nguoitaothongbao.*',,'nhom.*'
	                        ->where([['thanh_vien_nhom.ma_tai_khoan',$mataikhoan],['thong_bao.trang_thai','1']])
	                        ->orWhere([['bai_viet.ma_nguoi_viet',$mataikhoan],['thong_bao.trang_thai','1']])
	                        ->groupBy('thong_bao.ma_thong_bao')
	                        ->orderBy('thong_bao.ma_thong_bao','desc')
	                        ->offset($soluongthongbaodalay)
	                        ->limit($soluongthongbaocanlay)   
	                        ->get();
	                        return view("thongbao.thongbaonhom.thongbaonhom",["listthongbao"=>$listthongbao]);
	    }
	    public function updatethongbao(Request $rql)
	    {
	        DB::table('thong_bao')
	        ->where([['noi_nhan_tac_dong',$rql->noi_nhan_tac_dong],['ma_loai_thong_bao',$rql->ma_loai_thong_bao],['noi_dung_tac_dong',$rql->noi_dung_tac_dong]])
	        ->update(["trang_thai"=>$rql->trang_thai]);
	    }
}
