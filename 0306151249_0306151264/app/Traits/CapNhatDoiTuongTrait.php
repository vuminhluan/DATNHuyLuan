<?php

namespace App\Traits;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TaiKhoan;

trait CapNhatDoiTuongTrait {

	public function capNhatDoiTuong($arrayParameters, $obj) {

    foreach ($arrayParameters as $field => $value) {
      $obj[$field] = $value;
    }
    
    $obj->save();

	}

}