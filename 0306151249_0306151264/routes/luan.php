<?php

use Illuminate\Http\Request;

// Route của Luân :D

// Route::view('/home', 'trangchu')->name('home');
// Route::get('/admin/tk', 'AjaxController@get')->name('ajax');
//
// Route::post('/register', 'AjaxController@post')->name('ajaxpost');

Route::get(
	'/taikhoan/{username}',
	'TrangCaNhanController@getTrangCaNhan'
)->middleware('MyUserAuth')->name('trangcanhan.index');

Route::get(
	'/taikhoan/{username}/nhom',
	'TrangCaNhanController@getNhom'
)->name('trangcanhan.nhom');

Route::get(
	'/taikhoan/{username}/tep',
	'TrangCaNhanController@getTep'
)->name('trangcanhan.tep');

Route::get('/lienhe', function () {
	return view('khac.lienhe');
})->name('lienhe');

Route::get('/taikhoan/{username}/{username_md5}/kichhoat', 'GuiMailController@kichHoatTaiKhoan')->name('taikhoan.kichhoat');

Route::prefix('caidat')->middleware('MyUserAuth')->group(function () {

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


// Các route cho admin ở dưới đây

Route::prefix('admin')->middleware('MyAdminAuth')->group(function () {

	Route::get('/', function() {
		return view('admin.index');
	})->name('admin.index');

	Route::get('/phanhoi', function() {
		return view('admin.phanhoi.index');
	})->name('admin.phanhoi');

	Route::get('/cauhinh', function() {
		return view('admin.cauhinh.index');
	})->name('admin.cauhinh');

	Route::prefix('taikhoan')->group(function() {
		Route::get('/', function() {
			return view('admin.taikhoan.index');
		})->name('admin.taikhoan');

		Route::get('/them', function() {
			return view('admin.taikhoan.them-taikhoan');
		})->name('admin.taikhoan.them');
	});

	// Giới tính route group
	Route::prefix('gioitinh')->group(function() {
		Route::get('/', 'GioiTinhController@index')->name('admin.gioitinh');

		Route::get('/them', 'GioiTinhController@getThem')->name('admin.gioitinh.get_them');
		Route::post('/them', 'GioiTinhController@postThem')->name('admin.gioitinh.post_them');

		// Route::post('/tacvu/{hanhdong}', 'GioiTinhController@postTacVu')->name('admin.gioitinh.post_tacvu');
	});



});
