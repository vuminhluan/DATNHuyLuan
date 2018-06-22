<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thong_bao extends Model
{

	protected $table = "thong_bao";
    // public $timestamps = false;
    const CREATED_AT = 'ngay_tao_thong_bao';
    const UPDATED_AT = 'ngay_sua_thong_bao';
}
