<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class TaiKhoan extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{

  use Authenticatable;

  protected $table = "tai_khoan";
  protected $primaryKey = "ma_tai_khoan";
  public $incrementing = false;
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';

  public function getAuthPassword()
  {
    return $this->mat_khau;
  }

  public function scopeLayMaTaiKhoanDauTien()
  {
    // thêm tiền tố scope để được: TaiKhoan::LayMaTaiKhoanDauTien()
    // link: https://stackoverflow.com/questions/32806287/how-to-call-a-model-function-inside-the-controller-in-laravel-5
    return "TK00000001";
  }


}
