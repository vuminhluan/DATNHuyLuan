<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MyUserAuth
{
  /**
  * Handle an incoming request.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \Closure  $next
  * @return mixed
  */
  public function handle($request, Closure $next)
  {
    /**
    *
    * Nếu tài khoản là của người dùng Q0002
    * -> Nếu tài khoản chưa kích hoạt -> chuyển tới trang kích hoạt
    * -> Nếu đã kích hoạt rồi -> Nếu đang hoạt động hoặc đang khóa (tự khóa) thì được truy cập
    * Ngược lại tài khoản là của Admin,... thì hiển thị trang 404;
    *
    **/
    if(Auth::check() && Auth::user()->quyen == "Q0002" ) {
      if( Auth::user()->trang_thai == 1 ) {
        return redirect()->route('kichhoat.index');
      }
      return $next($request);
    }

    if(!Auth::check()) {
      return redirect()->route('index');
    }

    return redirect()->route('admin.index');
  }
}
