<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoanBiChan extends Model
{
  protected $table = "tai_khoan_bi_chan";
  protected $primaryKey = "ma";
  const UPDATED_AT = 'thoi_gian_chan';




  public function belongsToTaiKhoan()
	{
	  return $this->belongsTo('App\TaiKhoan', 'ma_tai_khoan', 'ma');
	}
}


