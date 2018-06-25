<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bao_cao_vi_pham as BaoCao;

class BaoCaoController extends Controller
{
  public function getTrangQuanLyBaoCao()
  {
  	$tatca_baocao = BaoCao::orderBy('thoi_gian_gui_bao_cao', 'DESC')->with(['belongsToTaiKhoan','belongsToLoaiBaoCao'])->paginate(1);
  	// return $tatca_baocao;
  	return view('admin.baocao.index', ['tatca_baocao' => $tatca_baocao]);
  }
}
