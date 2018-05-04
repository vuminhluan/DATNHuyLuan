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

Route::get('/', 'DangNhapController@getIndex')->name('index');

Route::post('/dangnhap', 'DangNhapController@postDangNhap')->name('dangnhap');

Route::post('/dangki', 'DangKiController@dangki')->name('dangki');

Route::get('/trangchu', 'TrangChuController@getTrangChu')->name('trangchu');
