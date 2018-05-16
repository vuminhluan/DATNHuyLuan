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

Route::get('/', 'DangNhapController@getIndex')->name('index');

Route::post('/dangnhap', 'DangNhapController@postDangNhap')->name('dangnhap');
// Route::get('/dangki', 'DangKiController@getDangKi')->name('get_dangki');
Route::post('/dangki', 'DangKiController@postDangKi')->name('post_dangki');

Route::get('/trangchu', 'TrangChuController@getTrangChu')->name('trangchu');

Route::get('/kichhoat/taikhoan', 'DangKiController@getKichHoatTaiKhoan')->name('kichhoat');
Route::post('/kichhoat/taikhoan', 'DangKiController@postKichHoatTaiKhoan')->name('post_kichhoat');
