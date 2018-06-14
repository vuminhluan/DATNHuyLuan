<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanh_vien_nhom extends Model
{
    protected $table = "thanh_vien_nhom";
    // public $timestamps = false;
    const CREATED_AT = 'thoi_gian_vao_nhom';
    const UPDATED_AT = 'thoi_gian_thoat_nhom';
    

}
