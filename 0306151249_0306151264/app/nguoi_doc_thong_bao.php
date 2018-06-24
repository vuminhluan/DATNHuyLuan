<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nguoi_doc_thong_bao extends Model
{
  protected $table = "nguoi_doc_thong_bao";

  const CREATED_AT = 'ngay_doc';
  const UPDATED_AT = 'ngay_cap_nhat';
}
