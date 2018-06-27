<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bai_viet_chia_se extends Model
{
    protected $table = "bai_viet_chia_se";
    protected $primaryKey = "ma_chia_se_bai_viet";
    //public $timestamps = false;

    const CREATED_AT = 'ngay_chia_se';
    const UPDATED_AT = 'ngay_up';

}
