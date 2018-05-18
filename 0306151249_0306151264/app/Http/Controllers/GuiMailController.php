<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class GuiMailController extends Controller
{
  public function kichHoatTaiKhoan($username, $usernameMD5)
  {

    $taikhoan;


    if($usernameMD5 == md5($username.'kichhoat') ) {
      $taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->first();

      // Nếu tài khoản chưa được kích hoạt => kích hoạt và login cho tài khoản đó.
      if($taikhoan->trang_thai == 1) {
        $taikhoan->trang_thai = 2;
        $taikhoan->save();

        // Nếu tài khoản chưa đăng nhập
        if(!Auth::check()) {
          Auth::login($taikhoan);
        }

        return redirect()->route('index');


      }

    }


  }
}
