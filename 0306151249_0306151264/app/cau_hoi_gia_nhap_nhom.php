<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cau_hoi_gia_nhap_nhom extends Model
{
    protected $table= "cau_hoi_gia_nhap_nhom";
    //public $timestamps=false;
    const CREATED_AT = 'thoi_gian_tao';
    const UPDATED_AT = 'thoi_gian_sua';
}
