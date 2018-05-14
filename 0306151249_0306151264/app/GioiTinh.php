<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioiTinh extends Model
{
  protected $table = "gioi_tinh";
  protected $primaryKey = "ma_gioi_tinh";
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';
}
