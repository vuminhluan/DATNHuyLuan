<?php


Route::get("mid",function(){

return view("includes.navtop");

});
Route::get("gr/{id}","NhomController\Nhom@loadnhom");

Route::get("baiviet", function(){
	return view("includes.baiviet");
});
Route::post("gr/postbaitest","BaiVietController\BaiViet@Dangbaiviet");

