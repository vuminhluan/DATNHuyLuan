<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class binh_luan_cap_2 extends Model
{
    protected $table = "binh_luan_cap_2";
    // public $timestamps = false;
      protected $primaryKey = "ma_binh_luan_cap_2";
	  // public $incrementing = false;
	  const CREATED_AT = 'thoi_gian_tao';
	  const UPDATED_AT = 'thoi_gian_sua';
}
