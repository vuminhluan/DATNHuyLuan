<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;

use App\NguoiDung;

class TrangCaNhanController extends Controller
{
	public function getTrangCaNhan($username)
	{
		$tatca_gioitinh = DB::table('gioi_tinh')->get();
		return view('trang_ca_nhan.index')->with(['username'=>Auth::user()->ten_tai_khoan, 'tatca_gioitinh'=>$tatca_gioitinh]);
	}

	public function getNhom($username)
	{
		$tatca_gioitinh = DB::table('gioi_tinh')->get();
		return view('trang_ca_nhan.danhsach_nhom')->with(['username'=>$username, 'tatca_gioitinh'=>$tatca_gioitinh]);
	}

	public function capNhatNguoiDung(Request $req)
	{
		$ho_ten_lot = $req['profile-family-middle-name'];
		$ten = $req['profile-first-name'];
		$gioi_thieu = preg_replace( "/(\r\n)/", " ", $req['profile-bio']);
		$gioi_tinh = $req['profile-gender'];
		$ngay_sinh = $req['profile-birthday'];
		$nguoi_sua = Auth::user()->ma_tai_khoan;

		// return Auth::user()->ma_tai_khoan;
		$nguoi_dung = NguoiDung::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();
		// return $nguoi_dung;

		$nguoi_dung->ho_ten_lot = $ho_ten_lot;
		$nguoi_dung->ten = $ten;
		$nguoi_dung->ngay_sinh = $ngay_sinh;
		$nguoi_dung->ma_gioi_tinh = $gioi_tinh;
		$nguoi_dung->gioi_thieu = $gioi_thieu;
		$nguoi_dung->nguoi_sua = $nguoi_sua;
		$nguoi_dung->save();

		return redirect()->back();
	}

	public function capNhatAnhNguoiDung($kind_of_image, Request $req)
	{
		// return $kind_of_image;
		$the_message; $field; $file;
		if($kind_of_image == "anh_bia") {
			$field = "upload_banner";
			$the_message = "ảnh bìa";
			// $file = $req->upload_banner;
		} else {
			$field = "upload_avatar";
			$the_message = "ảnh đại diện";
		}


		if($req->hasFile($field)) {
			$file = $req->$field;
		} else {
			return "Không tìm thấy ảnh.";
		}

		$validator = Validator::make(
			$req->all(),
			[
				$field => 'image'
			]
		);

		if($validator->fails()) {
			return "Không phải hình ảnh";
		}

		// Nếu upload thành công. Chú ý, upload lên bộ nhớ tạm, chứ không phải move tới thư mục nào đó.
		if($file->isValid()) {
			$file_name =  md5(time()).'.'.$file->extension();

			$file->move('pictures/'.$kind_of_image, $file_name);

			// Update database
			$nguoi_dung = NguoiDung::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();
			$nguoi_dung->$kind_of_image = $file_name;
			$nguoi_dung->save();
		}

		return redirect()->back()->with('my_message', 'Cập nhật '.$the_message.' thành công');





	}

}
