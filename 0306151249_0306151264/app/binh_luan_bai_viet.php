<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class binh_luan_bai_viet extends Model
{
      protected $table = "binh_luan_bai_viet";
    // public $timestamps = false;
      protected $primaryKey = "ma_binh_luan";
	  // public $incrementing = false;
	  const CREATED_AT = 'thoi_gian_tao';
	  const UPDATED_AT = 'thoi_gian_sua';
}
