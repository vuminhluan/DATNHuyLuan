<?php


Route::get("mid",function(){

return view("includes.navtop");

});
Route::get("gr/{id}","NhomController\Nhom@loadnhom");

Route::get("baiviet", function(){
	return view("includes.baiviet");
});
<<<<<<< HEAD
Route::post("/ajax/postbaivietne","BaiVietController\BaiViet@Postbaiviet")->name('postbaiviet');
Route::get("/ajax/getmabaivietne","BaiVietController\BaiViet@GetMaBaiViet")->name('getmabaiviet');
Route::get("/ajax/getbaivietne","BaiVietController\BaiViet@GetBaiViet")->name('getbaiviet');
=======
Route::post("/hr/postbaivietne","BaiVietController\BaiViet@Dangbaiviet")->name('postbaiviet');
Route::get("/hr/postbaivietne","BaiVietController\BaiViet@Dangbaiviet")->name('postbaiviet');
>>>>>>> 92c9be281799eb68ede1c0751a28f46ab914153e
