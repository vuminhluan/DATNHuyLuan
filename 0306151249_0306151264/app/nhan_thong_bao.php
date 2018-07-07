<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhan_thong_bao extends Model
{
  protected $table = "nhan_thong_bao";
  // protected $primaryKey = "ma_nhom";
  // public $incrementing = false;ngay_them	ngay_up
  const CREATED_AT = 'ngay_them';
  const UPDATED_AT = 'ngay_up';
}
