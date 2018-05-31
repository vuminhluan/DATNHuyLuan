<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\TaiKhoan;
use App\Tep;
use App\Traits\TaoMaTepTrait;
use App\Traits\CapNhatDoiTuongTrait;

use App\NguoiDung;

class TrangCaNhanController extends Controller
{

	use TaoMaTepTrait;
	use CapNhatDoiTuongTrait;

	public function getTrangCaNhan($username)
	{
		$tatca_gioitinh = DB::table('gioi_tinh')->get();
		// return $tatca_gioitinh;

		// $taikhoan_nguoidung = DB::table('tai_khoan AS tk')
		// 	->join('nguoi_dung AS nd', 'tk.ma_tai_khoan', '=', 'nd.ma_tai_khoan')
		// 	->where('tk.ten_tai_khoan', '=', $username)
		// 	->select(
		// 		'tk.*',
		// 		DB::raw("CONCAT(nd.ho_ten_lot,' ', nd.ten) AS hoten_nguoidung")
		// 	)->get();

			// return $taikhoan_nguoidung;

		$taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->first();
		// return $taikhoan->hasNguoiDung->ten;

		if(!$taikhoan || $taikhoan->trang_thai != 2) {
			abort(404);
		}

		return view('trang_ca_nhan.index')->with(['taikhoan'=>$taikhoan, 'tatca_gioitinh'=>$tatca_gioitinh]);
	}

	public function getNhom($username)
	{	
		$taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->first();
		$tatca_gioitinh = DB::table('gioi_tinh')->get();
		return view('trang_ca_nhan.danhsach_nhom')->with(['taikhoan'=>$taikhoan, 'tatca_gioitinh'=>$tatca_gioitinh]);
	}

	public function capNhatNguoiDung(Request $req)
	{
		$ho_ten_lot = $req->profile_family_middle_name;
		$ten = $req->profile_first_name;
		$gioi_thieu = preg_replace( "/(\r\n)/", " ", $req->profile_bio);
		$gioi_tinh = $req->profile_gender;
		$ngay_sinh = $req->profile_birthday;
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

		return redirect()->back()->with('my_message', 'Cập nhật thông tin thành công');
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


	// public function postTaiTepLen(Request $req)
	// {
		
	// 	if(!$req->hasFile('uploads')) {
	// 		return redirect()->back();
	// 	}

	// 	foreach ($req->uploads as $key => $file) {
	// 		// echo "<pre>";
	// 		if($file->getClientSize() < 25000) {
	// 			$file_name = md5(time()+$key).'.'.$file->extension();
	// 			$dir = "uploads/".Auth::user()->ma_tai_khoan."/";
	// 			// print_r($dir."---".$file_name);
	// 			// print_r($file->getClientSize());
	// 			// print_r($this->taoMaTepTrait());
	// 			$data = [
	// 				"ma_tep" => $this->taoMaTepTrait(),
	// 				"ten_tep" => $file->getClientOriginalName(),
	// 				"duong_dan_tep" => $file_name,
	// 				"cong_khai" => 0,
	// 				"nguoi_tao" => Auth::user()->ma_tai_khoan,
	// 				"trang_thai" => 1
	// 			];

	// 			$file->move($dir, $file_name);

	// 			$tep = new Tep();
	// 			$this->capNhatDoiTuong($data, $tep);

	// 		}
	// 	}

	// 	return redirect()->back()->with('message', 'Thêm tệp thành công'); 



	// }

}
