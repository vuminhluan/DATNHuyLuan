<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ThuMucGoogleDrive extends Model
{
  protected $table = "thumuc_googledrive";
  protected $primaryKey = "ma_thumuc";
  public $incrementing = false;
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';


  public function belongsToTaiKhoan()
  {
    return $this->hasOne('App\TaiKhoan', 'ma_tai_khoan', 'ma_tai_khoan');
  }

  public function scopeLayMaThuMuc()
  {
  	$thumuc =  DB::table('thumuc_googledrive')->where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();

  	if($thumuc) return $thumuc->ma_thumuc;
  	return "123";
  }


}
