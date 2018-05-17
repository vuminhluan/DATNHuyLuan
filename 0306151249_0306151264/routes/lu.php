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
Route::get("/ajax/getbaivietne","BaiVietController\BaiViet@GetBaiViet")->name('getbaiviet');

