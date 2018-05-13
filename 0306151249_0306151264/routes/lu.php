<?php


Route::get("mid",function(){

return view("includes.navtop");

});
Route::get("gr/{id}","NhomController\Nhom@loadnhom");

Route::get("baiviet", function(){
	return view("includes.baiviet");
});
Route::post("/ajax/postbaivietne","BaiVietController\BaiViet@Postbaiviet")->name('postbaiviet');
Route::get("/ajax/getmabaivietne","BaiVietController\BaiViet@GetMaBaiViet")->name('getmabaiviet');
Route::get("/ajax/getbaivietne","BaiVietController\BaiViet@GetBaiViet")->name('getbaiviet');