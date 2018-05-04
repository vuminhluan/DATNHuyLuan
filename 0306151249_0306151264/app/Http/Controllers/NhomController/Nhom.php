<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Nhom extends Controller
{
    public function loadnhom ($id)
    {
    	echo "$id";
    	return view("nhom.indexnhom",["t"=>$id]);

    }
}
