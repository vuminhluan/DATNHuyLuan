<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tep extends Model
{
  protected $table = "tep";
  protected $primaryKey = "ma_tep";
  public $incrementing = false;
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';


  public function belongsToTaiKhoan()
  {
  	return $this->belongsTo('App\TaiKhoan', 'nguoi_tao', 'ma_tai_khoan');
  }


}
