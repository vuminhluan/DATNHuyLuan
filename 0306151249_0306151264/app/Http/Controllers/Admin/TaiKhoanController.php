<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use App\TaiKhoan;
use App\NguoiDung;

use App\Traits\CapNhatDoiTuongTrait;
use App\Traits\TaoMaTaiKhoanTrait;

class TaiKhoanController extends Controller
{

	use CapNhatDoiTuongTrait;
	use TaoMaTaiKhoanTrait;

  public function getTrangQuanLyTaiKhoan($role = "Q0002")
  {
  	if($role == "Q0001") {
  		abort(404);
  	}

  	$tatca_taikhoan = TaiKhoan::where('quyen', $role)->orderBy('thoi_gian_tao', 'DESC')->paginate(5);
  	return view('admin.taikhoan.index', ['tatca_taikhoan' => $tatca_taikhoan])->with('slidemessage', 'Trang quản lý tài khoản');
  }

  public function postXemChiTietTaiKhoan(Request $req)
  {
		$taikhoan  = TaiKhoan::find($req->id);

  	// return $taikhoan->hasNguoiDung->ho_ten_lot;
  	return [
			'taikhoan'  => $taikhoan,
			'nguoidung' => $taikhoan->hasNguoiDung
  	];
  }

  public function getTimKiemTheoTenTaiKhoan($filter_role, $keyword)
  {

    $tatca_taikhoan = TaiKhoan::where('ten_tai_khoan', 'LIKE', '%'.$keyword.'%')->where('quyen', $filter_role)->orderBy('thoi_gian_tao', 'DESC')->paginate(5);

    // $tatca_taikhoan = $tatca_taikhoan;
  	return view('admin.taikhoan.index', ['tatca_taikhoan' => $tatca_taikhoan])->with('slidemessage', 'Có bao nhiêu kết quả tìm kiếm');
  }

  public function postCapNhat(Request $req)
  {
  	// return $req;

  	if($req->search) {
  		$role = "Q0002";
  		if($req->filter_role && Auth::user()->quyen == "Q0001") {
  			$role = $req->filter_role;
  		}
      return redirect()->route('admin.taikhoan.timkiem', [$role, $req->search]);
    }

    if($req->filter_role) {
      return redirect()->route('admin.taikhoan', [$req->filter_role]);
    }

  	$message = "";
  	if($req->task == "account-ban") {
  		//Đánh dấu vi phạm
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 5]);
  		$message = "Đánh dấu vi phạm";
  	} else if ($req->task == "account-live") {
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 2]);
  		$message = "Cho phép hoạt động bình thường";
  	} else if ($req->task == "account-deactivate") {
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 4]);
  		$message = "Hủy kích hoạt - Xóa -";
  	} else if ($req->task == "account-inactivate") {
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 1]);
  		$message = "Đánh dấu chưa kích hoạt";
  	} else if ($req->task == "account-lock") {
  		TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 3]);
  		$message = "Khóa";
  	}

  	return redirect()->back()->with('slidemessage', 'Đã '.$message.' những tài khoản được chọn');
  }

  public function postThemTaiKhoan(Request $req)
  {

  	$slidemessage = "";
  	
  	$username_rules = 'required';
  	$email_rules = 'required';
  	$messages = [
      'username.required' => 'Tên tài khoản không thể để trống.',
      'email.required'    => 'Email không thể để trống.'
    ];

  	// Kiểm tra tài khoản chứa tên tài khoản đó đã bị vô hiệu hóa hay chưa

  	// Kiểm tra tài khoản có chứa email đó đã bị vô hiệu hóa hay chưa
  	$taikhoan_tentaikhoan = TaiKhoan::where('ten_tai_khoan', $req->username)->first();
  	if($taikhoan_tentaikhoan && $taikhoan_tentaikhoan->trang_thai != 4) {
  		$username_rules.='|unique:tai_khoan,ten_tai_khoan';
  		$messages['username.unique'] = 'Tên tài khoản đã có người sử dụng.';
  		// return $username_rules;
  	}

  	// return $username_rules;

  	$taikhoan_email = TaiKhoan::where('email', $req->email)->first();
  	if($taikhoan_email && $taikhoan_email->trang_thai != 4) {
  		$email_rules.='|unique:tai_khoan,email';
  		$messages ['email.unique'] = 'Email đã có người sử dụng.';
  	}

  	// return $messages;

  	$rules = [
      'username' => $username_rules,
      'email'    => $email_rules
    ];
    
    $validator = Validator::make($req->all(), $rules, $messages);

    if($validator->fails()) {
  		$slidemessage = "";
	  	foreach ($validator->errors()->all() as $key => $value) {
	  		$slidemessage.= $value." ";
	  	}

	  	return redirect()->back()->with('slidemessage', $slidemessage)->withInput();
  	}

  	$taikhoan = new TaiKhoan();
  	$data = [
			'ma_tai_khoan'  =>  $this->taoMaTaiKhoan(),
			'ten_tai_khoan' => $req->username,
			'email'         => $req->email,
			'mat_khau'      => bcrypt($req->password),
			'quyen'         => 'Q0003',
			'thoi_gian_tao' => Carbon::now()->toDateTimeString(),
			'thoi_gian_sua' => Carbon::now()->toDateTimeString(),
			'nguoi_sua'     => Auth::user()->ma_tai_khoan,
			'trang_thai'    => 2 // Đang hoạt động (tạm thời là 2)
  	];

  	$this->capNhatDoiTuong($data, $taikhoan);

  	$nguoidung = new NguoiDung([
  		'ho_ten_lot' => $req->familyname,
  		'ten' => $req->firstname,
  		'anh_dai_dien' => 'default-avatar.jpg',
  		'anh_bia' => 'default-banner.png'
  	]);

  	$taikhoan = TaiKhoan::find($data['ma_tai_khoan']);

  	$taikhoan->hasNguoiDung()->save($nguoidung);

  	return redirect()->back()->with('slidemessage', 'Tạo tài khoản Mod thành công')->withInput();

  }

}
