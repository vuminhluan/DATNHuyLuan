<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
  protected $table = "nguoi_dung";
  protected $primaryKey = "ma_tai_khoan";
  public $incrementing = false;
  const CREATED_AT = null;
  const UPDATED_AT = 'thoi_gian_sua';

  protected $fillable = ['ho_ten_lot', 'ten', 'ten_an_danh', 'ngay_sinh', 'ma_gioi_tinh', 'anh_dai_dien', 'anh_bia', 'thoi_gian_sua', 'nguoi_sua'];
}
