<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
  protected $table = "nhom";
  protected $primaryKey = "ma_nhom";
  public $incrementing = false;
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';

  public function hasManyThanhVien()
  {
  	return $this->hasMany('App\thanh_vien_nhom', 'ma_nhom', 'ma_nhom');
  }


  public function belongsToTaiKhoan()
  {
  	return $this->belongsTo('App\TaiKhoan', 'ma_tai_khoan', 'ma_tai_khoan');
  }


}
