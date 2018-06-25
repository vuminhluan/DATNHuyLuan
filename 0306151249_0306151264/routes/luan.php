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

	Route::get(
		'/taikhoan/{userid}/kiemtra/baocao',
		'TrangCaNhanController@getKiemTraBaoCaoTonTaiHayChua'
	)->name('trangcanhan.taikhoan.kiemtra.baocao');

	Route::post(
		'/taikhoan/{username}/baocao',
		'TrangCaNhanController@postBaoCaoTaiKhoan'
	)->name('trangcanhan.taikhoan.baocao');

	// Chặn một tài khoản nào đó
	Route::get(
		'/taikhoan/chan/{userid}/{username}',
		'TrangCaNhanController@chanMotTaiKhoan'
	)->name('trangcanhan.taikhoan.chan');
	// End


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

		// Tệp của tài khoản
		Route::get('/{ma_tai_khoan}/tep/{noi_chua_tep}', 'Admin\TepController@getIndexTepCuaTaiKhoan')->name('admin.taikhoan.tep');

		Route::post('/{ma_tai_khoan}/tep/capnhat', 'Admin\TepController@postCapNhatTepCuaMotTaiKhoan')->name('admin.taikhoan.tep.capnhat');

		Route::get('/{ma_tai_khoan}/tep/tim/{tu_khoa}', 'Admin\TepController@getTimKiemTheoTenTep')->name('admin.taikhoan.tep.timkiem');


		// End Tệp của tài khoản




		// Tài khoản
		Route::get('/them', function() {
			if(Auth::user()->quyen != 'Q0001') {
	  		abort(404);
	  	}
			return view('admin.taikhoan.them-taikhoan');
		})->name('admin.taikhoan.them');

		Route::post('/them', 'Admin\TaiKhoanController@postThemTaiKhoan')->name('admin.taikhoan.them.post');


		Route::get('/{quyen?}', 'Admin\TaiKhoanController@getTrangQuanLyTaiKhoan')->name('admin.taikhoan');


		
		Route::post('/capnhat', 'Admin\TaiKhoanController@postCapNhat')->name('admin.taikhoan.capnhat');
		Route::post('/xemchitiet', 'Admin\TaiKhoanController@postXemChiTietTaiKhoan')->name('admin.taikhoan.xem');

		Route::get('/timkiem/{loc}/{tukhoa}', 'Admin\TaiKhoanController@getTimKiemTheoTenTaiKhoan')->name('admin.taikhoan.timkiem');

		Route::get('/chinhsua/{ten_tai_khoan}', 'Admin\TaiKhoanController@getChinhSuaTaiKhoan')->name('admin.taikhoan.chinhsua');
		Route::post('/capnhat/{loai_cap_nhat}', 'Admin\TaiKhoanController@postCapNhatThongTin')->name('admin.taikhoan.capnhat.post');

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
		Route::post('/xemchitiet', 'Admin\PhanHoiController@postXemPhanHoi')->name('admin.phanhoi.xem');
		Route::post('/capnhat', 'Admin\PhanHoiController@postCapNhat')->name('admin.phanhoi.capnhat');
		Route::get('/timkiem/{tukhoa}', 'Admin\PhanHoiController@getTimKiemTheoTenNguoiGui')->name('admin.phanhoi.timkiem');
	});
	// End phản hồi

	//  Báo cáo
	Route::prefix('baocao')->group(function() {
		Route::get('/', 'Admin\BaoCaoController@getTrangQuanLyBaoCao')->name('admin.baocao');
		// Route::post('/xemchitiet', 'Admin\BaoCaoController@postXemBaoCao')->name('admin.baocao.xem');
		Route::post('/capnhat', 'Admin\BaoCaoController@postCapNhat')->name('admin.baocao.capnhat');
		Route::get('/timkiem/{tukhoa}', 'Admin\BaoCaoController@getTimKiemTheoTenNguoiGui')->name('admin.baocao.timkiem');
	});
	// End báo cáo




	// Admin chat
	Route::prefix('chat')->group(function() {
		Route::post('/luuchat', 'Admin\ChatController@luuChatVaoSession')->name('admin.chat.luu');
		Route::get('/xoa_khung_chat', 'Admin\ChatController@xoaKhungChat')->name('admin.chat.xoa_tatca');
	});


	// Bài viết

	Route::prefix('baiviet')->group(function() {
		Route::get('/', 'Admin\BaiVietController@getTrangBaiViet')->name('admin.baiviet');
		Route::get('/xemchitiet/{post_id}', 'Admin\BaiVietController@getXemChiTietBaiViet')->name('admin.baiviet.xem');
		Route::post('/capnhat', 'Admin\BaiVietController@postCapNhat')->name('admin.baiviet.capnhat.post');
		// Route::get('/timkiem/{tukhoa}', 'Admin\PhanHoiController@getTimKiemTheoTenNguoiGui')->name('admin.phanhoi.timkiem');
	});
	// End bài viết


	// Nhóm
	Route::prefix('nhom')->group(function() {
		Route::get('/', 'Admin\NhomController@getIndex')->name('admin.nhom');
		// Route::get('/xemchitiet/{post_id}', 'Admin\NhomController@getXemChiTietBaiViet')->name('admin.baiviet.xem');
		Route::post('/capnhat', 'Admin\NhomController@postCapNhat')->name('admin.nhom.capnhat.post');
		Route::get('/timkiem/{tukhoa}', 'Admin\NhomController@getTimKiemTheoTenNhom')->name('admin.nhom.timkiem');
	});

	// End Nhóm






});
