<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thanh_vien_nhom extends Model
{
    protected $table = "thanh_vien_nhom";
    // public $timestamps = false;
    protected $primaryKey = "ma";
    const CREATED_AT = 'thoi_gian_vao_nhom';
    const UPDATED_AT = 'thoi_gian_thoat_nhom';
    

    public function belongsToTaiKhoan()
    {
    	return $this->belongsTo('App\TaiKhoan', 'ma_tai_khoan', 'ma_tai_khoan');
    }


    // public function hasManyBaiViet()
    // {
    // 	return $this->hasMany('App\bai_viet', '')
    // }


}
