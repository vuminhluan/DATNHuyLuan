<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinNhanLienHe extends Model
{
  protected $table = "tinnhan_lienhe";
  protected $primaryKey = "ma";
  // public $incrementing = false;
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';
}
