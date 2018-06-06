<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bai_viet extends Model
{
    //
    protected $table = "bai_viet";
    //public $timestamps = false;

    const CREATED_AT = 'thoi_gian_dang';
    const UPDATED_AT = 'thoi_gian_sua';
}
