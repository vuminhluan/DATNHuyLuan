<?php

namespace App\Http\Controllers\ThongBaoController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\thong_bao;
use Illuminate\Support\Facades\DB;
use App\nguoi_dung;
use App\nhom_m;
use App\bai_viet;
use App\binh_luan_bai_viet;
use App\binh_luan_cap_2;
use App\nguoi_doc_thong_bao;
use App\nhan_thong_bao;
use App\chuc_vu_cua_thanh_vien_trong_nhom;
use App\thanh_vien_nhom;

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

	    public function postthongbaokrq($noi_nhan_tac_dong,$ma_loai_thong_bao,$noi_dung_tac_dong,$noi_dung_thong_bao,$nguoi_tao_thong_bao,$trang_thai)
	    {


	    	$thongbao = new thong_bao();
	    	$thongbao->noi_nhan_tac_dong     = $noi_nhan_tac_dong;	                 // mã nhóm
	    	$thongbao->ma_loai_thong_bao     = $ma_loai_thong_bao;	//đăng bài trong nhóm
	    	$thongbao->noi_dung_tac_dong     = $noi_dung_tac_dong;	//mã bài viết
	        $thongbao->noi_dung_thong_bao 	 = $noi_dung_thong_bao;         //"đã đăng bài viết"
	    	$thongbao->nguoi_tao_thong_bao   = $nguoi_tao_thong_bao;	     // thành viên A
	    	$thongbao->trang_thai    		 = $trang_thai;                       //1 là thông báo, 2 là thông  báo sẵn sàng
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

	    	// $loaitbtknhan = $this->gettknhanthongbao()

	        $mataikhoan = $rql->ma_tai_khoan;
	        $soluongthongbaodalay = $rql->soluongthongbaodalay;
	        $soluongthongbaocanlay = $rql->soluongthongbaocanlay;
	        $soluongthongbaodadoc = $this->soluonggetthongbao($rql);
	// if ($loaitbtknhan=='2'||$loaitbtknhan=="") {
	         $listthongbao = DB::table('thong_bao')
	                        ->leftJoin('thanh_vien_nhom','thong_bao.noi_nhan_tac_dong','=','thanh_vien_nhom.ma_nhom')
	                        ->leftJoin('nguoi_dung as nguoitaothongbao','thong_bao.nguoi_tao_thong_bao','=','nguoitaothongbao.ma_tai_khoan')
	                        // ->leftJoin('')
	                        ->leftJoin('bai_viet','thong_bao.noi_nhan_tac_dong','=','bai_viet.ma_bai_viet')
	                        ->leftJoin('nguoi_dung as chubaiviet','bai_viet.ma_nguoi_viet','=','chubaiviet.ma_tai_khoan')
	                        ->leftJoin('binh_luan_bai_viet','thong_bao.noi_nhan_tac_dong','=','binh_luan_bai_viet.ma_binh_luan')
	                        ->leftJoin('nguoi_dung as chubinhluan','binh_luan_bai_viet.ma_nguoi_binh_luan','=','chubinhluan.ma_tai_khoan') 

	                        ->leftJoin('nhom','thanh_vien_nhom.ma_nhom','=','nhom.ma_nhom')
	                        ->select('thong_bao.*',
	                        		 'nguoitaothongbao.*',
	                        		 'nguoitaothongbao.anh_dai_dien AS anhdaidiennguoitaothongbao',
	                        		 'nhom.*',
	                        		 'chubaiviet.*',
	                        		 // 'nguoi_doc_thong_bao.ma_nguoi_doc AS manguoidocthongbao',
	                        		 DB::raw("CONCAT(nguoitaothongbao.ho_ten_lot,' ',nguoitaothongbao.ten) AS hovatennguoitaothongbao "),
	                        		 DB::raw("CONCAT(chubaiviet.ho_ten_lot,' ',chubaiviet.ten) AS hovatenchubaiviet "),
	                        		 DB::raw("CONCAT(chubinhluan.ho_ten_lot,' ',chubinhluan.ten) AS hotenchubinhluan ")
	                        		 )//,'chubaiviet.*' 'thanh_vien_nhom.*','nguoitaothongbao.*',,'nhom.*'
	                        ->where([
	                        	['thanh_vien_nhom.ma_tai_khoan',$mataikhoan],['thong_bao.trang_thai','1'],['thong_bao.ma_loai_thong_bao','LTBN02'],['thong_bao.nguoi_tao_thong_bao','<>',$mataikhoan]
	                        	// ,['thanh_vien_nhom.thoi_gian_vao_nhom','<','thong_bao.ngay_tao_thong_bao']
	                        ])
	                        ->orWhere([['bai_viet.ma_nguoi_viet',$mataikhoan],['thong_bao.trang_thai','1'],['thong_bao.ma_loai_thong_bao','LTBN03'],['thong_bao.nguoi_tao_thong_bao','<>',$mataikhoan]])
	                        ->orWhere([['binh_luan_bai_viet.ma_nguoi_binh_luan',$mataikhoan],['thong_bao.trang_thai','1'],['thong_bao.ma_loai_thong_bao','LTBN04'],['thong_bao.nguoi_tao_thong_bao','<>',$mataikhoan]])
	                        ->groupBy('thong_bao.ma_thong_bao')
	                        ->orderBy('thong_bao.ma_thong_bao','desc')
	                        ->offset($soluongthongbaodalay)
	                        ->limit($soluongthongbaocanlay)   
	                        ->get();


				            $lstNhomTVdagianhap = DB::table("thanh_vien_nhom")->select('thanh_vien_nhom.ma_nhom','thanh_vien_nhom.thoi_gian_vao_nhom')->where([["ma_tai_khoan",$mataikhoan],["trang_thai","1"]])->get();

    
				            foreach ($listthongbao as $motthongbao) {
				            	foreach ($lstNhomTVdagianhap as $motnhomgianhap) {
	                        		if ($motthongbao->noi_nhan_tac_dong==$motnhomgianhap->ma_nhom) {
	                        			if ($motthongbao->ngay_tao_thong_bao<$motnhomgianhap->thoi_gian_vao_nhom) {
	                        					$flagxg = $motthongbao->ma_thong_bao;
						                        $listthongbao=  $listthongbao->filter(function($item) use($flagxg){
						                        	return $item->ma_thong_bao!=$flagxg;
						                        });

	                        			}
	                        		}
	                        	}
	                        }




	                        foreach ($listthongbao as $motthongbao) {
	                        	
	                        	if ($motthongbao->ma_loai_thong_bao=='LTBN02') {//$motthongbao->noi_nhan_tac_dong

	                        		if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)!='[]') {
	                        			 if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)[0]->loai_thong_bao_nhan=='1') {
	                        			 	//không nhận tb nhóm này => xóa tất cả
	                        					$flagxg = $motthongbao->ma_thong_bao;
						                        $listthongbao=  $listthongbao->filter(function($item) use($flagxg){
						                        	return $item->ma_thong_bao!=$flagxg;
						                        });
	                        			 }
	                        		}
	                        		if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)!='[]') {
	                        			 if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)[0]->loai_thong_bao_nhan=='2') {
	                        			//nhận tất cả
	                        			}
	                        		}
	                        		if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)!='[]') {
	                        		if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)[0]->loai_thong_bao_nhan=='3') {
	                        			//chỉ nhận tb của quản trị viên
	                        				$listquantrivienx =	$this->getlistquanlycuanhomtb($motthongbao->noi_nhan_tac_dong);
	                        				$flagqtv = false;
	                        				for ($j=0; $j <count($listquantrivienx) ; $j++) { 
	                        					if ($motthongbao->nguoi_tao_thong_bao==$listquantrivienx[$j]->ma_tai_khoan) {
	                        						$flagqtv = true;
	                        					}
	                        				}
	                        				if (!$flagqtv) {
	                        					//nếu true thì ko sao bài đó của QTV , còn nếu false thì ko phải của QTV và xóa
	                        					$flagxg = $motthongbao->ma_thong_bao;
						                        $listthongbao=  $listthongbao->filter(function($item) use($flagxg){
						                        	return $item->ma_thong_bao!=$flagxg;
						                        });
	                        				}
	                        			}
	                        		}
	                        	}
	                        }

















						                        // $key=  $listthongbao->search(function($item){
						                        // 	return $item->ma_thong_bao==$listthongbao[$i]->ma_thong_bao;
						                        // });
						                        // $listthongbao->pull($key);
//noi nhan tac dong,
// return count($listthongbao);





	                        return view("thongbao.thongbaonhom.thongbaonhom",["listthongbaoLSTAR"=>$listthongbao,'listthongbaodadoc'=>$soluongthongbaodadoc]);
	               // }
}


	// public function getngaythamgianhom($value='')
	// {
	// 	# code...
	// }
	
    public function gettknhanthongbao($matk,$ma_nhom,$trangthai)
    {
        return DB::table('nhan_thong_bao')
        ->where([['nhan_thong_bao.ma_nhom',$ma_nhom],['nhan_thong_bao.ma_tai_khoan',$matk],['nhan_thong_bao.trang_thai',$trangthai]])
        ->get();
    }

	// public function FunctionName($value='')
	// {
	// 	# code...
	// }

    public function getlistquanlycuanhomtb($idnhom)
    {
        return DB::table('chuc_vu_cua_thanh_vien_trong_nhom')
                ->where([['ma_nhom',$idnhom],['ma_chuc_vu','CV02'],['trang_thai','1']])
                ->get();
    }

	public function soluonggetthongbao(Request $rql){ // tạm thời
	        $mataikhoan = $rql->ma_tai_khoan;

	  $listthongbaosl =       DB::table('thong_bao')  // $listthongbao =
	                        ->leftJoin('thanh_vien_nhom','thong_bao.noi_nhan_tac_dong','=','thanh_vien_nhom.ma_nhom')
	                        ->leftJoin('nguoi_dung as nguoitaothongbao','thong_bao.nguoi_tao_thong_bao','=','nguoitaothongbao.ma_tai_khoan')
	                        //
	                        ->leftJoin('bai_viet','thong_bao.noi_nhan_tac_dong','=','bai_viet.ma_bai_viet')
	                        ->leftJoin('nguoi_dung as chubaiviet','bai_viet.ma_nguoi_viet','=','chubaiviet.ma_tai_khoan')
	                        //
	                        ->leftJoin('binh_luan_bai_viet','thong_bao.noi_nhan_tac_dong','=','binh_luan_bai_viet.ma_binh_luan')
	                        ->leftJoin('nguoi_dung as chubinhluan','binh_luan_bai_viet.ma_nguoi_binh_luan','=','chubinhluan.ma_tai_khoan') 
	                        //
	                        ->leftJoin('nhom','thanh_vien_nhom.ma_nhom','=','nhom.ma_nhom')
	                        // ->select('thong_bao.ma_thong_bao','thong_bao.ngay_tao_thong_bao','thong_bao.noi_nhan_tac_dong','thong_bao.ma_loai_thong_bao')//
	                        ->select('thong_bao.*')
	                        ->where([['thanh_vien_nhom.ma_tai_khoan',$mataikhoan],['thong_bao.trang_thai','1'],['thong_bao.ma_loai_thong_bao','LTBN02'],['thong_bao.nguoi_tao_thong_bao','<>',$mataikhoan]])
	                        ->orWhere([['bai_viet.ma_nguoi_viet',$mataikhoan],['thong_bao.trang_thai','1'],['thong_bao.ma_loai_thong_bao','LTBN03'],['thong_bao.nguoi_tao_thong_bao','<>',$mataikhoan]])
	                        ->orWhere([['binh_luan_bai_viet.ma_nguoi_binh_luan',$mataikhoan],['thong_bao.trang_thai','1'],['thong_bao.ma_loai_thong_bao','LTBN04'],['thong_bao.nguoi_tao_thong_bao','<>',$mataikhoan]])
	                        ->groupBy('thong_bao.ma_thong_bao')
	                        ->orderBy('thong_bao.ma_thong_bao','desc')
	                        ->get();



				            $lstNhomTVdagianhap = DB::table("thanh_vien_nhom")->select('thanh_vien_nhom.ma_nhom','thanh_vien_nhom.thoi_gian_vao_nhom')->where([["ma_tai_khoan",$mataikhoan],["trang_thai","1"]])->get();

    
				            foreach ($listthongbaosl as $motthongbao) {
				            	foreach ($lstNhomTVdagianhap as $motnhomgianhap) {
	                        		if ($motthongbao->noi_nhan_tac_dong==$motnhomgianhap->ma_nhom) {
	                        			if ($motthongbao->ngay_tao_thong_bao<$motnhomgianhap->thoi_gian_vao_nhom) {
	                        					$flagxg = $motthongbao->ma_thong_bao;
						                        $listthongbaosl=  $listthongbaosl->filter(function($item) use($flagxg){
						                        	return $item->ma_thong_bao!=$flagxg;
						                        });

	                        			}
	                        		}
	                        	}
	                        }

	                        foreach ($listthongbaosl as $motthongbao) {
	                        	
	                        	if ($motthongbao->ma_loai_thong_bao=='LTBN02') {//$motthongbao->noi_nhan_tac_dong

	                        		if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)!='[]') {
	                        			 if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)[0]->loai_thong_bao_nhan=='1') {
	                        			 	//không nhận tb nhóm này => xóa tất cả
	                        					$flagxg = $motthongbao->ma_thong_bao;
						                        $listthongbaosl=  $listthongbaosl->filter(function($item) use($flagxg){
						                        	return $item->ma_thong_bao!=$flagxg;
						                        });
	                        			 }
	                        		}
	                        		if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)!='[]') {
	                        			 if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)[0]->loai_thong_bao_nhan=='2') {
	                        			//nhận tất cả
	                        			}
	                        		}
	                        		if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)!='[]') {
	                        		if ($this->gettknhanthongbao($mataikhoan,$motthongbao->noi_nhan_tac_dong,1)[0]->loai_thong_bao_nhan=='3') {
	                        			//chỉ nhận tb của quản trị viên
	                        				$listquantrivienx =	$this->getlistquanlycuanhomtb($motthongbao->noi_nhan_tac_dong);
	                        				$flagqtv = false;
	                        				for ($j=0; $j <count($listquantrivienx) ; $j++) { 
	                        					if ($motthongbao->nguoi_tao_thong_bao==$listquantrivienx[$j]->ma_tai_khoan) {
	                        						$flagqtv = true;
	                        					}
	                        				}
	                        				if (!$flagqtv) {
	                        					//nếu true thì ko sao bài đó của QTV , còn nếu false thì ko phải của QTV và xóa
	                        					$flagxg = $motthongbao->ma_thong_bao;
						                        $listthongbaosl=  $listthongbaosl->filter(function($item) use($flagxg){
						                        	return $item->ma_thong_bao!=$flagxg;
						                        });
	                        				}
	                        			}
	                        		}
	                        	}
	                        }
	                        // $listthongbaosl=  $listthongbaosl->filter(function($item){
	                        // 	return $item->ma_thong_bao="82";
	                        // });

	                    return  $listthongbaosl;
	                        // return view("thongbao.thongbaonhom.thongbaonhom",["listthongbao"=>$listthongbao]);
	    }

	    public function updatethongbao(Request $rql)
	    {
	        DB::table('thong_bao')
	        ->where([['noi_nhan_tac_dong',$rql->noi_nhan_tac_dong],['ma_loai_thong_bao',$rql->ma_loai_thong_bao],['noi_dung_tac_dong',$rql->noi_dung_tac_dong]])
	        ->update(["trang_thai"=>$rql->trang_thai]);
	    }
	    public function postnguoidocthongbao(Request $rql)
	    {
	    	if ($this->checknguoidocthongbao($rql)[0]->soluongdong<1) { // kiểm trang có dòng này chưa
		    	$nguoidocthongbao = new nguoi_doc_thong_bao();
		    	$nguoidocthongbao->ma_thong_bao = $rql->ma_thong_bao;	
		    	$nguoidocthongbao->ma_nguoi_doc = $rql->ma_nguoi_doc;
		    	$nguoidocthongbao->trang_thai = $rql->trang_thai;
		    	$nguoidocthongbao->save();
	    	}

	    }
	    public function checknguoidocthongbao(Request $rql)
	    {
	    	 return DB::table('nguoi_doc_thong_bao')->select(DB::raw('count(*) as soluongdong'))->where([['ma_nguoi_doc',$rql->ma_nguoi_doc],['ma_thong_bao',$rql->ma_thong_bao]])->get();
	    }	    
	    public function getnguoidocthongbao(Request $rql)
	    {
	    	 return DB::table('nguoi_doc_thong_bao')->where('ma_nguoi_doc',$rql->ma_nguoi_doc)->get();
	    }
}
