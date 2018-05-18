<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;


class DangNhapController extends Controller
{

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


}
