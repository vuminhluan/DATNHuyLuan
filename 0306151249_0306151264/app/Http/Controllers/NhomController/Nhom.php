<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class Nhom extends Controller
{
    public function loadnhom ($id)
    {
    	$listbaiviet = DB::table('bai_viet')->orderBy('ma_bai_viet','desc')->get();
    	$soluongbaiviet =10;
    	return view("nhom.indexnhom",["t"=>$id,"s"=>$soluongbaiviet,"lstbaiviet"=>$listbaiviet]);




    }
}
