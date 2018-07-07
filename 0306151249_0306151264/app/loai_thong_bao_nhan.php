<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loai_thong_bao_nhan extends Model
{
  protected $table = "loai_thong_bao_nhan";
  // protected $primaryKey = "ma_nhom";
  // public $incrementing = false;ngay_them	ngay_up
  const CREATED_AT = 'ngay_tao';
  const UPDATED_AT = 'ngay_up';
}
