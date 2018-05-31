<?php

namespace App\Traits;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait TaoMaTepTrait {

	public function taoMaTepTrait() {

		// $lastID = DB::table('tai_khoan')->orderBy('thoi_gian_tao', 'DESC')->first()->ma_tai_khoan;
		$latestFile = DB::table('tep')->latest('ma_tep')->first();

		// return $latestFile->ten_tep;
		if($latestFile === null) return "TEP0000001";
		$lastID = $latestFile->ma_tep;

		$pattern = '/\d\d+/'; // Lấy ra dãy các chữ số liên tiếp. Ví dụ: TK00123896 => lấy ra 00123896
		preg_match($pattern, $lastID, $matches);

		$newIDNumber =  ltrim($matches[0], '0') + 1;

		// return $newIDNumber;

		$newID = "TEP";
		for ($i=0; $i < strlen($lastID) - (3 + strlen($newIDNumber)) ; $i++) {
		  $newID.="0";
		}
		$newID.=$newIDNumber;
		return $newID;

	}

}