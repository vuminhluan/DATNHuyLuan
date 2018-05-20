<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhom extends Model
{
    //
    protected $table= "nhom";
    public $timestemps = false;

    const CREATE_AT = "thoi_gian_tao";
    const UPDATE_AT ="thoi_gian_sua";
}
