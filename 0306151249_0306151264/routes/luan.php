<?php

use Illuminate\Http\Request;

// Route của Luân :D

Route::get('/huongdan', function ()
{
	return view('huongdan');
})->name('huongdan');

Route::group(['middleware' => ['MyUserAuth']], function () {
	Route::get(
		'/taikhoan/{username}',
		'TrangCaNhanController@getTrangCaNhan'
	)->name('trangcanhan.index');

	Route::get(
		'/taikhoan/{username}/nhom',
		'TrangCaNhanController@getNhom'
	)->name('trangcanhan.nhom');


	Route::post(
		'/taikhoan/{username}/tep/tailen',
		'TepController@postTaiTepLen'
	)->name('nguoidung.tep.tailen');

	Route::get(
		'/taikhoan/{username}/tep/{kind?}',
		'TepController@getTrangTep'
	)->name('nguoidung.tep.index');

	Route::get(
		'/taikhoan/{username}/tep/{file_id}/xoa',
		'TepController@getXoaTep'
	)->name('nguoidung.tep.xoa');


	Route::get(
		'/taikhoan/{username}/tep/{file_id}/capnhat/{kind}',
		'TepController@getCapNhat'
	)->name('nguoidung.tep.capnhat');
	
	
});


// Route::post('/route/ajax', function (Request $req)
// {
// 	// return "test ajax route";
// 	// return "luan";
// 	return $req;
// });


Route::get('/lienhe', function () {
	return view('khac.lienhe');
})->name('lienhe');
Route::post('/lienhe', 'LienHeController@postLienHe')->name('lienhe.post');

Route::post('/socket/gui/tinnhan', 'LienHeController@socketGuiTinNhan')->name('socket.post.tinnhan');



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
		Route::get('/taikhoan/chan/{userid}/{username}', 'CaiDatController@getChanMotTaiKhoan')->name('caidat.chan.mot_taikhoan');


		Route::get('/matkhau/thaydoi', 'CaiDatController@getTrangThayDoiMatKhau')->name('caidat.thaydoi_matkhau');
		Route::post('/matkhau/thaydoi/dongy', 'CaiDatController@postThayDoiMatKhau')->name('caidat.thaydoi_matkhau.dongy');
	});


	Route::get('/matkhau/quen', 'CaiDatController@getQuenMatKhau')->name('caidat.quen_matkhau');
	Route::get('/matkhau/quen/khongphaitoi', 'CaiDatController@getKhongPhaiToi')->name('caidat.quen_matkhau.khongphaitoi')->middleware('MyUserAuth');
	Route::post('/matkhau/quen', 'CaiDatController@postQuenMatKhau')->name('caidat.post.quen_matkhau');
});


// Route google drive:

Route::group(['middleware' => ['MyUserAuth']], function () {

	//Cho no toi route nay
	Route::get('googledrive/dangki/dichvu', 'GoogleDriveController@getDangKiDichVu')->name('googledrive.dangkidichvu');


	Route::get('googledrive/huy/dichvu', 'GoogleDriveController@getHuyBoDichVu')->name('googledrive.huydichvu');

	Route::get('googledrive/tep', 'GoogleDriveController@getIndex')->name('googledrive.tep.index');

	Route::post('googledrive/tep/them', 'GoogleDriveController@postThemTep')->name('googledrive.tep.them');

	Route::get('googledrive/tep/tai/{id}', 'GoogleDriveController@getTaiTep')->name('googledrive.tep.tai');
	Route::get('googledrive/tep/xoa/{id}', 'GoogleDriveController@getXoaTep')->name('googledrive.tep.xoa');

});




// END Route google drive





// Các route cho admin ở dưới đây

Route::prefix('admin')->middleware('MyAdminAuth')->group(function () {

	Route::get('/', 'Admin\AdminController@getIndex')->name('admin.index');

	// Route::get('/phanhoi', function() {
	// 	return view('admin.phanhoi.index');
	// })->name('admin.phanhoi');

	Route::get('/cauhinh', function() {
		return view('admin.cauhinh.index');
	})->name('admin.cauhinh');

	// Tài khoản
	Route::prefix('taikhoan')->group(function() {
		Route::get('/', 'Admin\TaiKhoanController@getTrangQuanLyTaiKhoan')->name('admin.taikhoan');

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



	//  Phản hồi
	Route::prefix('phanhoi')->group(function() {
		Route::get('/', 'Admin\PhanHoiController@getTrangQuanLyPhanHoi')->name('admin.phanhoi');

		// Route::get('/them', function() {
		// 	return view('admin.taikhoan.them-taikhoan');
		// })->name('admin.taikhoan.them');
	});



});
