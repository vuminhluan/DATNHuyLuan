<?php

namespace App\Http\Controllers\BaoCaoController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\bao_cao_vi_pham;

class BaoCao extends Controller
{
   public function postbaocaovipham(Request $rql)
   {
   	if($this->checkpost($rql)>0){
		return "0";
   		}
   			else{
   				   		 $baocaovipham = new bao_cao_vi_pham();
   		 $baocaovipham->ma_loai_bao_cao     		 = $rql->ma_loai_bao_cao;	
   		 $baocaovipham->ma_noi_nhan_bao_cao     	 = $rql->ma_noi_nhan_bao_cao;
   		 $baocaovipham->nguoi_gui_bao_cao     		 = $rql->nguoi_gui_bao_cao;	
   		 $baocaovipham->noi_dung_bao_cao     		 = $rql->noi_dung_bao_cao;	
   		 $baocaovipham->ma_doi_tuong_bi_bao_cao      = $rql->ma_doi_tuong_bi_bao_cao;	
   		 $baocaovipham->ma_noi_tiep_nhan_bao_cao     = $rql->ma_noi_tiep_nhan_bao_cao;	
   		 $baocaovipham->trang_thai    				 = $rql->trang_thai;
   		 $baocaovipham->save();
   		  return "1";
   			}




   }
   public function checkpost($rql){
   		return DB::table('bao_cao_vi_pham')
   		->select(DB::raw('count(*) as soluong'))
   		->where([['ma_doi_tuong_bi_bao_cao',$rql->ma_doi_tuong_bi_bao_cao],
                  ['nguoi_gui_bao_cao',$rql->nguoi_gui_bao_cao],
                  ['ma_noi_nhan_bao_cao',$rql->ma_noi_nhan_bao_cao],
                  ['ma_noi_tiep_nhan_bao_cao',$rql->ma_noi_tiep_nhan_bao_cao],
                  ['ma_loai_bao_cao',$rql->ma_loai_bao_cao]])
   		->get()[0]->soluong;
   }

}
