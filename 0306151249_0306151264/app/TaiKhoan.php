<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
  protected $table = "tai_khoan";
  protected $primaryKey = "ma_tai_khoan";
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';
}
