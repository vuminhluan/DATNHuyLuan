<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hinh_anh_bai_viet extends Model
{
      protected $table = "hinh_anh_bai_viet";
	  protected $primaryKey = "ma_hinh_anh";
	  const CREATED_AT = 'ngay_up_load';
	  const UPDATED_AT = 'ngay_chinh_sua';
}
