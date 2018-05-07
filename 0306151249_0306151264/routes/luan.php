<?php



// Route của Luân :D

// Route::view('/home', 'trangchu')->name('home');


Route::get(
	'/taikhoan/{username}',
	'TrangCaNhanController@getTrangCaNhan'
)->name('trangcanhan.index');

Route::get(
	'/taikhoan/{username}/nhom',
	'TrangCaNhanController@getNhom'
)->name('trangcanhan.nhom');

Route::get('/caidat', function() {
	return redirect()->route('caidat.index');
});

Route::get('/caidat/taikhoan', 'CaiDatController@getIndex')->name('caidat.index');
