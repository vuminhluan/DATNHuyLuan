<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoanBiChan extends Model
{
  protected $table = "tai_khoan_bi_chan";
  protected $primaryKey = "ma";
  const UPDATED_AT = 'thoi_gian_chan';

  const CREATED_AT = null;

  protected $fillable = ['ma_tai_khoan_bi_chan', 'ma_tai_khoan_chan', 'trang_thai'];




  public function belongsToTaiKhoan()
	{
	  return $this->belongsTo('App\TaiKhoan', 'ma_tai_khoan', 'ma');
	}
}


