<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoanGoogle extends Model
{
  protected $table = "taikhoan_google";
  protected $primaryKey = "ma_taikhoan_google";
  public $incrementing = false;


  public function belongsToTaiKhoan()
  {
  	return $this->belongsTo('App\TaiKhoan', 'ma_tai_khoan', 'ma_tai_khoan');
  }
}
