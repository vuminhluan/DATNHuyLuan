<?php

namespace App\Traits;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\TaiKhoan;
use App\TaiKhoanBiChan;

trait ChanHoacBoChanMotTaiKhoanTrait {

	public function chanHoacBoChanMotTaiKhoan($userid) {

		$data = [
			'ma_tai_khoan_bi_chan' => $userid,
			'ma_tai_khoan_chan'    => Auth::user()->ma_tai_khoan
		];

		$taikhoan_bichan = TaiKhoanBiChan::where($data)->first();

		$blocked = false;
		// Nếu chưa có đối tượng -> Chưa chặn bao giờ -> Chặn:
		if(!$taikhoan_bichan) {
			$data['trang_thai'] = 1;
			$blocked = true;
			TaiKhoanBiChan::create($data);
		} else {
			// Nếu trước đó đã chặn rồi -> Có dữ liệu. Nhưng đã bỏ chặn -> trang_thai = 0 => Chặn lại -> trang_thai = 1
			if(!$taikhoan_bichan->trang_thai) {
				TaiKhoanBiChan::where($data)->update(['trang_thai'=> 1]);
				$blocked = true;
			} else {
				// Bỏ chặn
				TaiKhoanBiChan::where($data)->update(['trang_thai'=> 0]);
			}
		}

		return $blocked;

		

	}

}