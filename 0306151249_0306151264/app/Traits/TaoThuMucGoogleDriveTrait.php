<?php

namespace App\Traits;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TaiKhoan;
use Storage;

trait TaoThuMucGoogleDriveTrait {

	public function taoThuMucGoogleDrive($path, $root, $foldername, $search_from) {

		Storage::cloud()->makeDirectory($path);

		$recursive = false; // Get subdirectories also?
		// true: Nó quét từ thư mục gốc -> thư mục con. false: chỉ quét ở thư mục hiện tại -_-:)
	  // $contents = collect(Storage::cloud()->listContents($root, $recursive));
	  $contents = collect(Storage::cloud()->listContents($search_from, $recursive));

	  $dir = $contents->where('type', '=', 'dir')
	    ->where('filename', '=', $foldername)
	    ->first(); // phòng trường hợp bị trùng tên thì luôn lấy thằng đầu tiên

	  $service = Storage::cloud()->getAdapter()->getService();
    $permission = new \Google_Service_Drive_Permission();
    $permission->setRole('reader');
    $permission->setType('anyone');
    $permission->setAllowFileDiscovery(false);
    $permissions = $service->permissions->create($dir['basename'], $permission);

    return $dir;
		
	}

}