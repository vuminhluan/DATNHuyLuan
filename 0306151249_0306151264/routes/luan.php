<?php



// Route của Luân :D

// Route::view('/home', 'trangchu')->name('home');


Route::get(
	'/taikhoan/{username}',
	'TrangCaNhanController@getTrangCaNhan'
)->name('trangcanhan');
