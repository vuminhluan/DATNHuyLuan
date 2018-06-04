<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cai_dat_nhom extends Model
{
    protected $table = "cai_dat_nhom";
    //public $timestamps = false;
    const CREATED_AT = 'thoi_gian_them';
    const UPDATED_AT = 'thoi_gian_chinh_sua';
}
