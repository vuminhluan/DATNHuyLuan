<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bao_cao_vi_pham extends Model
{
      protected $table = "bao_cao_vi_pham";
    // public $timestamps = false;
      protected $primaryKey = "ma_bao_cao";
	  // public $incrementing = false;
	  const CREATED_AT = 'thoi_gian_gui_bao_cao';
	  const UPDATED_AT = 'thoi_gian_xu_ly_bao_cao_update';


	  public function belongsToTaiKhoan()
	  {
	  	return $this->belongsTo('App\TaiKhoan', 'nguoi_gui_bao_cao', 'ma_tai_khoan');
	  }

	  public function belongsToLoaiBaoCao()
	  {
	  	return $this->belongsTo('App\LoaiBaoCao', 'ma_loai_bao_cao', 'ma_loai_bao_cao');
	  }
}
