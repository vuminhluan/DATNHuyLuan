<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class MyAdminAuth
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
    if(Auth::check() && Auth::user()->quyen == "Q0001") {
      return $next($request);
    }
    if(!Auth::check()) {
      return redirect()->route('index');
    }
    // return abort(404);
    return redirect()->back();

  }


}
