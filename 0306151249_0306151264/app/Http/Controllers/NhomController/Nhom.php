<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Nhom extends Controller
{
    public function loadnhom ($id)
    {
    	$soluongbaiviet =10;
    	
    	
    	return view("nhom.indexnhom",["t"=>$id,"s"=>$soluongbaiviet]);

    }
}
