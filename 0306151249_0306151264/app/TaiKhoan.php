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


}
