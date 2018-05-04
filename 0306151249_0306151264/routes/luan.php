<?php



// Route của Luân :D

// Route::view('/home', 'trangchu')->name('home');


Route::get(
	'/trang_ca_nhan/{username}',
	'TrangCaNhanController@getTrangCaNhan'
)->name('trangcanhan');
