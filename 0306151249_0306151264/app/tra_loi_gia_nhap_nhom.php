<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tra_loi_gia_nhap_nhom extends Model
{
        protected $table= "tra_loi_gia_nhap_nhom";
    //public $timestamps=false;
    const CREATED_AT = 'thoi_gian_tra_loi';
    const UPDATED_AT = 'thoi_gian_sua';
}
