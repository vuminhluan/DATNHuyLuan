<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chuc_vu_cua_thanh_vien_trong_nhom extends Model
{
    protected $table= "chuc_vu_cua_thanh_vien_trong_nhom";
    //public $timestamps=false;
    const CREATED_AT = 'thoi_gian_them_chuc_vu';
    const UPDATED_AT = 'thoi_gian_huy_bo_chuc_vu';
}
