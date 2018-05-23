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

Route::post('/taikhoan/{username}/thongtin/capnhat', 'TrangCaNhanController@capNhatNguoiDung')->name('post_taikhoan.thongtin_canhan.capnhat');
Route::post('/taikhoan/{kind_of_image}/capnhat', 'TrangCaNhanController@capNhatAnhNguoiDung')->name('post_taikhoan.anh.capnhat');



Route::get('/kichhoat/taikhoan/{username}/{username_md5}', 'KichHoatTaiKhoanController@kichHoatTaiKhoan')->name('kichhoat');
Route::get('/kichhoat/taikhoan', 'KichHoatTaiKhoanController@getKichHoatTaiKhoan')->name('kichhoat.index');
Route::get('/kichhoat/taikhoan/gui_mail', 'KichHoatTaiKhoanController@guiLaiMailKichHoat')->name('kichhoat.gui_mail');


Route::get('/xacnhan/thaydoi/email/{userid}/{userid_md5}/{newemail}/{newemail_md5}', 'XacNhanThayDoiEmailController@xacNhanThayDoi')->name('xacnhan.thaydoi.mail');


Route::get('/matkhau/datlai/{username}/{userid_md5}/{today_md5}', 'CaiDatController@getDatLaiMatKhau')->name('caidat.quen_matkhau.datlai');
Route::post('/matkhau/datlai', 'CaiDatController@postDatLaiMatKhau')->name('caidat.post.quen_matkhau.datlai')->middleware('MyUserAuth');



Route::prefix('caidat')->group(function () {

	Route::group(['middleware' => ['MyUserAuth']], function () {
		
		Route::get('/', function() {
			return redirect()->route('caidat.index');
		});

		Route::get('/taikhoan', 'CaiDatController@getIndex')->name('caidat.index');
		Route::post('/taikhoan/capnhat', 'CaiDatController@postThayDoiTaiKhoan')->name('caidat.post.capnhat.taikhoan');


		Route::get('/taikhoan/vohieuhoa', 'CaiDatController@getTrangVoHieuHoaTaiKhoan')->name('caidat.vohieuhoa');

		Route::post('/taikhoan/vohieuhoa/dongy', 'CaiDatController@postVoHieuHoaTaiKhoan')->name('caidat.post.vohieuhoa');

		Route::get('/taikhoan/bichan', 'CaiDatController@getTrangTaiKhoanBiChan')->name('caidat.chan_taikhoan');

		Route::get('/matkhau/thaydoi', 'CaiDatController@getTrangThayDoiMatKhau')->name('caidat.thaydoi_matkhau');
		Route::post('/matkhau/thaydoi/dongy', 'CaiDatController@postThayDoiMatKhau')->name('caidat.thaydoi_matkhau.dongy');
	});


	Route::get('/matkhau/quen', 'CaiDatController@getQuenMatKhau')->name('caidat.quen_matkhau');
	Route::get('/matkhau/quen/khongphaitoi', 'CaiDatController@getKhongPhaiToi')->name('caidat.quen_matkhau.khongphaitoi')->middleware('MyUserAuth');
	Route::post('/matkhau/quen', 'CaiDatController@postQuenMatKhau')->name('caidat.post.quen_matkhau');



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
