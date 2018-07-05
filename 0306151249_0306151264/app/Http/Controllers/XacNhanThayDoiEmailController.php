<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\TaiKhoan;


class XacNhanThayDoiEmailController extends Controller
{
  public function xacNhanThayDoi($userid, $userid_md5, $newemail, $newemail_md5)
  {
  	// return $userid.'---'.$userid_md5.' - - - '.$newemail.'---'.$newemail_md5;

  	$taikhoan;
  	if($userid_md5 == md5($userid.'xacnhan') && $newemail_md5 == md5($newemail.'xacnhan') ) {

  		if( $taikhoan = TaiKhoan::where('ma_tai_khoan', $userid)->first() ) {

  			if($taikhoan->email != $newemail) {

  				// Nếu tồn tại tài khoản và email chưa bị thay đổi thành email mới
  				// => Cập nhật email mới cho tài khoản đó
  				// => Đăng nhập cho tài khoản đó
  				// => Chuyển về trang chủ (kèm tin nhắn session như trong TrangCaNhanController)
  				$taikhoan->email = $newemail;
  				$taikhoan->save();

  				if(!Auth::check()) {
  					Auth::login($taikhoan);
  				}

  				return redirect()->route('caidat.index')->with('success_message', 'Cập nhật email '.$newemail.' thành công');

  			}

  		}

  	}

  	abort(404);

  }
}
