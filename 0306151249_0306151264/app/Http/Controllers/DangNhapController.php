<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Socialite;
use Storage;
use App\ThuMucGoogleDrive;
use App\Traits\TaoMaTaiKhoanTrait;
use App\Traits\TaoThuMucGoogleDriveTrait;
use App\Traits\CapNhatDoiTuongTrait;


class DangNhapController extends Controller
{

	use CapNhatDoiTuongTrait;
	use TaoMaTaiKhoanTrait;
	use TaoThuMucGoogleDriveTrait;

	// For Auth, change default name "username" to what we want.
	public function username()
  {
    return "ten_tai_khoan";
  }
	// End For Auth...

	public function getIndex()
	{
		if(Auth::check())
			return redirect()->route('trangchu');
		return view('index');
	}

	public function postDangNhap(Request $req)
	{

		$username = $req->username;
		$password = $req->password;
		$remember = $req->remember;

		$account = TaiKhoan::where('ten_tai_khoan', $username)->orwhere('email', $username)->first();

		// Nếu tài khoản không bị vô hiệu hóa và không bị khóa do vi phạm điều khoản sử dụng thì cho tài khoản đó đăng nhập.
		// Nói cách khác, nếu tài khoản đó Chưa kích hoạt || Đang hoạt động || Tự khóa thì được đăng nhập.
		if($account && $account->trang_thai != 4 && $account->trang_thai != 5) {
			if ( Auth::attempt(['ten_tai_khoan' => $username, 'password' => $password], $remember) || Auth::attempt(['email' => $username, 'password' => $password], $remember) ) {
				$success = true;

				// Tạo thư mục google drive (có tên là mã tài khoản) nếu chưa có
				if(!Auth::user()->thu_muc_google_drive) {
					$root = env('GOOGLE_DRIVE_FOLDER_ID');
					$foldername = Auth::user()->ma_tai_khoan;
					$path = $root.'/'.$foldername;
					$folder = $this->taoThuMucGoogleDrive($path, $root, $foldername);
					$thumuc_googledrive = new ThuMucGoogleDrive();
				  $data = [
						'ma_tai_khoan' => Auth::user()->ma_tai_khoan,
						'ma_thumuc'    => $folder['basename'],
						'trang_thai'   => 1
				  ];
				  $this->capNhatDoiTuong($data, $thumuc_googledrive);
				}

				return ['success' => true, 'message' => 'Đăng nhập thành công !'];
	  	} else {
				return ['success' => false, 'message' => 'Xin hãy kiểm tra lại mật khẩu !'];
			}
		}
		// Tài khoản bị khóa do vi phạm điều khoản sử dụng.
		if($account && $account->trang_thai == 5) {
			return ['success' => false, 'message' => 'Tài khoản của bạn đã bị khóa vì lý do vi phạm điều khoản. Hãy liên hệ với chúng tôi để biết thêm thông tin chi tiết'];
		}

		// Trường hợp còn lại:
		//
		$message = "Tài khoản không tồn tại !";
		// if(!$account || $account->trang_thai == 4) {
		// 	$message = "Tài khoản không tồn tại";
		// }

		return ['success' => false, 'message' => $message];

	}


	// public function postDangNhapGoogle()
	// {

	// 	return Socialite::driver('google')->redirect();
	// }

	// public function callBackDangNhapGoogle()
	// {
	// 	$user = Socialite::driver('google')->stateless()->user();

	// 	// return $user->getName();
	// 	return $this->xuLyDangNhapGoogle($user);
	// }


	// public function xuLyDangNhapGoogle($user)
	// {
		
	// 	return "bo tay";
	// }


}
