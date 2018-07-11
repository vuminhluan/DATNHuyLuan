<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

  	$tatca_taikhoan = TaiKhoan::where('quyen', $role);
  	if(Auth::user()->quyen == "Q0003") {
    	$tatca_taikhoan = $tatca_taikhoan->where('trang_thai', '!=', 4);
    }
    $tatca_taikhoan = $tatca_taikhoan->orderBy('thoi_gian_tao', 'DESC')->paginate(8);
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

    $tatca_taikhoan = TaiKhoan::where('ten_tai_khoan', 'LIKE', '%'.$keyword.'%')->where('quyen', $filter_role);
    if(Auth::user()->quyen == "Q0003") {
    	$tatca_taikhoan = $tatca_taikhoan->where('trang_thai', '!=', 4);
    }
    $tatca_taikhoan = $tatca_taikhoan->orderBy('thoi_gian_tao', 'DESC')->paginate(5);
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
    $data_update = [
      'nguoi_sua' => Auth::user()->ma_tai_khoan,
      'hoat_dong' => 1
    ];
  	$hoat_dong = 1;
  	if($req->task == "account-ban") {
  		// TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 5, 'hoat_dong' => 1]);
      $data_update['trang_thai'] = 5;
  		$message = "Đánh dấu vi phạm";
  	} else if ($req->task == "account-live") {
  		// TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 2, 'hoat_dong' => 1]);
      $data_update['trang_thai'] = 2;
  		$message = "Cho phép hoạt động bình thường";
  	} else if ($req->task == "account-deactivate") {
  		// TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 4, 'hoat_dong' => 0]);
      $data_update['trang_thai'] = 4; $data_update['hoat_dong'] = 0;
  		$message = "Hủy kích hoạt - Xóa -";
  	} else if ($req->task == "account-inactivate") {
  		// TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 1, 'hoat_dong' => 1]);
      $data_update['trang_thai'] = 1;
  		$message = "Đánh dấu chưa kích hoạt";
  	} else if ($req->task == "account-lock") {
  		// TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update(['trang_thai'=> 3, 'hoat_dong' => 1]);
      $data_update['trang_thai'] = 3;
  		$message = "Khóa";
  	}
    // return $data_update;

    TaiKhoan::whereIn('ma_tai_khoan', $req->id)->update($data_update);

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



  public function getChinhSuaTaiKhoan($username)
  {
    // return Auth::user()->ma_tai_khoan;
    $taikhoan = TaiKhoan::where([
      ['ten_tai_khoan', $username],
      ['trang_thai', '!=', 4],
      ['hoat_dong', 1]
    ])->first();

    if($taikhoan->quyen == "Q0001" && Auth::user()->quyen != "Q0001") {
      abort(404);
    }
    // return $taikhoan;
    return view('admin.taikhoan.chinhsua-thongtin', ['taikhoan' => $taikhoan]);
  }

  public function postCapNhatThongTin($kind, Request $req)
  {

    $message = "";
    if($kind == 'change-password') {
      if($this->capNhatMatKhau($req)) {
        $message = "Chúc mừng bạn đã đổi mật khẩu thành công";
      } else {
        $message = "Mật khẩu hiện tại không đúng";
      }
    } else if ($kind == 'deactive-account') {
      if($this->voHieuHoaTaiKhoan($req)) {
        Auth::logout();
      } else $message = "Sai mật khẩu";
    } else if ($kind == 'basic-info') {
      if($this->capNhatThongTinCoBan($req)) {
        $message = "Chúc mừng bạn đã đổi thông tin thành công";
      }
    } else if ($kind == 'contact-info') {
      $result = $this->capNhatThongTinLienHeVaTraVeTinNhan($req);
      $message = $result['messages'];
      if($result['success'])
        return redirect('/admin/taikhoan/chinhsua/'.$req->username)->with('slidemessage', $message);
    } else {
      abort(404);
    }


    return redirect()->back()->with('slidemessage', $message)->withInput();

  }

  public function capNhatMatKhau($req)
  {
    // return $req;
    $taikhoan = TaiKhoan::where('ma_tai_khoan', $req->id)->first();

    // return $req->cur_password;
    if(Hash::check($req->cur_password, $taikhoan->mat_khau)) {
      $taikhoan->mat_khau = bcrypt($req->new_password);
      $taikhoan->save();

      return true;
    }

    return false;
  }


  public function voHieuHoaTaiKhoan($req)
  {

    $taikhoan = TaiKhoan::where('ma_tai_khoan', $req->id)->first();

    // return $req->cur_password;
    if(Hash::check($req->password, $taikhoan->mat_khau)) {
      $taikhoan->trang_thai = 4;
      $taikhoan->hoat_dong = 0;
      $taikhoan->save();

      return true;
    }

    return false;
  }

  public function capNhatThongTinCoBan($req)
  {
    $nguoidung = NguoiDung::where('ma_tai_khoan', $req->id)->first();
    $nguoidung->ho_ten_lot = $req->familyname;
    $nguoidung->ten = $req->firstname;
    $nguoidung->ngay_sinh = $req->birthday;
    $nguoidung->ma_gioi_tinh = $req->gender;
    $nguoidung->nguoi_sua = Auth::user()->ma_tai_khoan;
    $nguoidung->save();

    return true;
  }

  public function capNhatThongTinLienHeVaTraVeTinNhan($req)
  {
    $return = [
      'success'  => true,
      'messages' => ''
    ];

    // Kiểm tra tài khoản có chứa email đó đã bị vô hiệu hóa hay chưa
    $taikhoan_tentaikhoan = TaiKhoan::where('ten_tai_khoan', $req->username)->where('trang_thai', '!=', 4)->first();
    if($taikhoan_tentaikhoan && $taikhoan_tentaikhoan->ma_tai_khoan != $req->id) {
      $return['success'] = false;
      $return['messages'] .= 'Tài khoản đã có người sử dụng.';
    }

    $taikhoan_email = TaiKhoan::where('email', $req->email)->where('trang_thai', '!=', 4)->first();
    if($taikhoan_email && $taikhoan_email->ma_tai_khoan != $req->id) {
      $return['success'] = false;
      $return['messages'] .= ' Email đã có người sử dụng.';
    }

    if($return['success']) {

      $taikhoan = TaiKhoan::where('ma_tai_khoan', $req->id)->first();
      $taikhoan->ten_tai_khoan = $req->username;
      $taikhoan->email = $req->email;
      $taikhoan->so_dien_thoai = $req->phone;
      $taikhoan->nguoi_sua = Auth::user()->ma_tai_khoan;
      $taikhoan->save();

      $return['messages'] = 'Cập nhật thông tin liện hệ thành công';
    }

    return $return;
  }


}
