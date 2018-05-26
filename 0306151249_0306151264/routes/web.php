<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Route::post('/luan/route', function ()
// {
// 	return "dit me may ajax a`";
// })->name('index');

Route::get('/', 'DangNhapController@getIndex')->name('index');

Route::post('/dangnhap', 'DangNhapController@postDangNhap')->name('post_dangnhap');
// Route::get('/dangki', 'DangKiController@getDangKi')->name('get_dangki');
Route::post('/dangki', 'DangKiController@postDangKi')->name('post_dangki');

Route::get('/dangxuat', function() {
  Auth::logout();
  return redirect()->route('index');
})->name('dangxuat');

Route::get('/trangchu', 'TrangChuController@getTrangChu')->middleware('MyUserAuth')->name('trangchu');
