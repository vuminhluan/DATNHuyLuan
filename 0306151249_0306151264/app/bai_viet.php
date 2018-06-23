<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bai_viet extends Model
{
    //
    protected $table = "bai_viet";
    protected $primaryKey = "ma_bai_viet";
    //public $timestamps = false;

    const CREATED_AT = 'thoi_gian_dang';
    const UPDATED_AT = 'thoi_gian_sua';


    public function belongsToTaiKhoan()
    {
    	return $this->belongsTo('App\TaiKhoan', 'ma_nguoi_viet', 'ma_tai_khoan');
    }
}
