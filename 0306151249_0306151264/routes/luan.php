<?php



// Route của Luân :D

// Route::view('/home', 'trangchu')->name('home');


Route::get(
	'/taikhoan/{username}',
	'TrangCaNhanController@getTrangCaNhan'
)->name('trangcanhan.index');

Route::get(
	'/taikhoan/{username}/nhom',
	'TrangCaNhanController@getNhom'
)->name('trangcanhan.nhom');

Route::prefix('caidat')->group(function () {

	Route::get('/', function() {
		return redirect()->route('caidat.index');
	});

	Route::get('/taikhoan', 'CaiDatController@getIndex')->name('caidat.index');

	Route::get('/matkhau', 'CaiDatController@getTrangThayDoiMatKhau')->name('caidat.thaydoi_matkhau');
	Route::get('/vohieuhoa', 'CaiDatController@getTrangVoHieuHoaTaiKhoan')->name('caidat.vohieuhoa');

	Route::get('/taikhoan_bichan', 'CaiDatController@getTrangTaiKhoanBiChan')->name('caidat.chan_taikhoan');


});
