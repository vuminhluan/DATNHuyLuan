<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThuMucThuBai extends Model
{
  protected $table = "thumuc_thubai";
  protected $primaryKey = "ma_thu_muc";
  public $incrementing = false;
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';
}
