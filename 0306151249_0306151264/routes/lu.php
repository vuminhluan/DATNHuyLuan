<?php


Route::get("mid",function(){

return view("includes.navtop");

});
Route::get("gr/{id}","NhomController\Nhom@loadnhom");

Route::get("baiviet", function(){
	return view("includes.baiviet");
});
Route::post("postbaiviet","BaiVietController/BaiViet@Dangbaiviet")->name('postbaiviet');
Route::post("getbaiviet","BaiVietController/BaiViet@Getajax")->name('ajaxget');