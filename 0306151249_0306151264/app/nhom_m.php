<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhom_m extends Model
{
    protected $table= "nhom";
   // public $timestamps = false;
  // protected $primaryKey = "ma_tai_khoan";
  // public $incrementing = false;
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';

}
