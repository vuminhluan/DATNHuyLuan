<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\TaiKhoan;
use App\TaiKhoanBiChan;
use App\Tep;
use App\Traits\TaoMaTepTrait;
use App\Traits\CapNhatDoiTuongTrait;
use App\Traits\ChanHoacBoChanMotTaiKhoanTrait;

use App\NguoiDung;

class TrangCaNhanController extends Controller
{

	use TaoMaTepTrait;
	use CapNhatDoiTuongTrait;
	use ChanHoacBoChanMotTaiKhoanTrait;

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

		$taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->where('trang_thai', '!=', 4)->first();
		// return $taikhoan->hasNguoiDung->ten;
		$taikhoan_bichan = TaiKhoanBiChan::where('ma_tai_khoan_bi_chan', $taikhoan->ma_tai_khoan)->where('ma_tai_khoan_chan', Auth::user()->ma_tai_khoan)->first();

		if(!$taikhoan || $taikhoan->trang_thai != 2 || $taikhoan_bichan) {
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

		$data = [
			'ho_ten_lot' => $req->profile_family_middle_name,
			'ten' => $req->profile_first_name,
			'ten_an_danh' => $req->profile_secret_name,
			'ngay_sinh' => $req->profile_birthday,
			'ma_gioi_tinh' => $req->profile_gender,
			'nguoi_sua' => Auth::user()->ma_tai_khoan,
			'gioi_thieu' => preg_replace( "/(\r\n)/", " ", $req->profile_bio)
		];
		
		// $nguoi_dung = NguoiDung::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();
		NguoiDung::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->update($data);

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


	public function chanMotTaiKhoan($userid, $username)
	{
		// return $userid."--".$username;
		if($this->chanHoacBoChanMotTaiKhoan($userid)) {
			$message = "Đã chặn tai khoản @".$username;
		} else {
			$message = "Đã bỏ chặn tai khoản @".$username;
		}
		return redirect()->route('caidat.chan_taikhoan')->with('slidemessage', $message);
	}


}
