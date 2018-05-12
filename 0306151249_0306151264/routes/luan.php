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

Route::get('/lienhe', function () {
	return view('khac.lienhe');
})->name('lienlac');

Route::prefix('caidat')->group(function () {

	Route::get('/', function() {
		return redirect()->route('caidat.index');
	});

	Route::get('/taikhoan', 'CaiDatController@getIndex')->name('caidat.index');


	Route::get('/taikhoan/vohieuhoa', 'CaiDatController@getTrangVoHieuHoaTaiKhoan')->name('caidat.vohieuhoa');

	Route::get('/taikhoan/bichan', 'CaiDatController@getTrangTaiKhoanBiChan')->name('caidat.chan_taikhoan');

	Route::get('/matkhau/thaydoi', 'CaiDatController@getTrangThayDoiMatKhau')->name('caidat.thaydoi_matkhau');
	Route::get('/matkhau/quen', 'CaiDatController@getQuenMatKhau')->name('caidat.quen_matkhau');
	Route::post('/matkhau/quen', 'CaiDatController@postQuenMatKhau')->name('caidat.quen_matkhau_post');


});


Route::prefix('admin')->group(function () {

	Route::get('/', function() {
		return view('admin.index');
	})->name('admin.index');

});
