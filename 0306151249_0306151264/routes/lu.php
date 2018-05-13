<?php


Route::get("mid",function(){

return view("includes.navtop");

});
Route::get("gr/{id}","NhomController\Nhom@loadnhom");

Route::get("baiviet", function(){
	return view("includes.baiviet");
});
Route::post("/hr/postbaivietne","BaiVietController\BaiViet@Dangbaiviet")->name('postbaiviet');
Route::get("/hr/postbaivietne","BaiVietController\BaiViet@Dangbaiviet")->name('postbaiviet');