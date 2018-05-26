<?php


Route::get("mid",function(){

return view("includes.navtop");

});
Route::get("gr/{id}","NhomController\Nhom@loadnhom");
Route::get("baiviet", function(){
	return view("baiviet.hienthibaiviet");
});

Route::post("/ajax/postbaivietne","BaiVietController\BaiViet@Postbaiviet")->name('postbaiviet');
Route::post("/ajax/postbinhluanne","BinhLuanController\BinhLuan@PostBinhLuan")->name('postbinhluan');
Route::post("/ajax/postbinhluanc2ne","BinhLuanController\BinhLuan@PostBinhLuanC2")->name('postbinhluanc2');
Route::get("/ajax/getmabinhluanne","BinhLuanController\BinhLuan@GetMaBinhLuan")->name('getmabinhluan');
Route::get("/ajax/getbinhluanmoine","BinhLuanController\BinhLuan@GetBinhLuanMoi")->name('getbinhluanmoi');
Route::get("/ajax/getbinhluanne","BinhLuanController\BinhLuan@GetBinhLuan")->name('getbinhluan');


Route::get("/ajax/getmabaivietne","BaiVietController\BaiViet@GetMaBaiViet")->name('getmabaiviet');
Route::get("/ajax/getbaivietmoine","BaiVietController\BaiViet@GetBaiVietMoi")->name('getbaivietmoi');

Route::post("/ajax/posttaonhomne","NhomController\Nhom@posttaonhom")->name('posttaonhom');
Route::get("/ajax/getmanhomne","NhomController\Nhom@getmanhom")->name('getmanhom');
Route::get("/ajax/getnhomtheomataikhoanne","NhomController\ThanhVienNhom@GetNhomTheoMaTaiKhoan")->name('getnhomtheomataikhoan');
Route::get("/ajax/getlsttimkiemnhomne","NhomController\Nhom@gettimkiemnhom")->name('getlsttimkiemnhom');
Route::post("/ajax/postthanhvienxingianhapnhomne","NhomController\ThanhVienNhom@PostThanhVienXinGiaNhapNhom")->name('postthanhvienxingianhapnhom');
Route::get("/ajax/getnhommathanhviencone","NhomController\ThanhVienNhom@GetLstNhomMaThanhVienGiaNhap")->name('getnhommathanhvienco');
Route::post("/ajax/postthemthanhvienvaonhomne","NhomController\ThanhVienNhom@PostThemThanhVienVaoNhom")->name('postthemthanhvienvaonhom');
Route::get("/ajax/getlstnhomnguoidungdangxingianhapne","NhomController\ThanhVienNhom@GetLstNhomNguoiDungDangXinGiaNhap")->name('getlstnhomnguoidungdangxingianhap');
Route::get("/ajax/getlstthanhviendangchopheduyettheomanhomne","NhomController\ThanhVienNhom@GetLstThanhVienDangChoPheDuyetTheoMaNhom")->name('getlstthanhviendangchopheduyettheomanhomne');
Route::post("/ajax/postupdatethanhvienchopheduyetne","NhomController\ThanhVienNhom@PostUpdateThanhVienChoPheDuyet")->name('postupdatethanhvienchopheduyet');