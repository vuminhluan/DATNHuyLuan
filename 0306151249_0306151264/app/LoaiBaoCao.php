<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiBaoCao extends Model
{
	protected $table = "loai_bao_cao";
  protected $primaryKey = "ma_loai_bao_cao";
  public $incrementing = false;
  const CREATED_AT = 'ngay_them';
  const UPDATED_AT = 'ngay_sua';
}
