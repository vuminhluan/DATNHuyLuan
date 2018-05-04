<?php


Route::get("mid",function(){

return view("includes.navtop");

});
Route::get("page",function(){
return view("nhom.index");
});
Route::get("baiviet", function(){
	return view("includes.baiviet");
});