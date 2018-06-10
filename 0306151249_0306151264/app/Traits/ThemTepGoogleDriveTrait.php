<?php

namespace App\Traits;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TaiKhoan;
use Storage;

trait ThemTepGoogleDriveTrait {

	public function themTepGoogleDrive($client_file, $root_id, $folder_id) {

		// Giới hạn 100 MB
    if($client_file->getClientSize()/1024/1024 > 50) {
			$message = [
				'success'      => false,
				'slidemessage' => 'Kích thước tệp lớn hơn 100MB'
			];
			return $message;
		}

		// $folderid = Auth::user()->thu_muc_google_drive->ma_thumuc; // thư mục chưa file

		// thư mục gốc là thư mục tạo khi người dùng đồng ý sử dụng dịch vụ google drive. Tên thư mục đó = mã tài khoản.
		//folder_id là thư mục để thu bài (theo từng bài đăng). Mỗi bài đăng sẽ tạo 1 thư mục riêng. Tên mặc định = thời gian hiện tại vd 08062018_214604

		$dir = "/".$root_id.'/';
		if($root_id != $folder_id) {
			$dir .= $folder_id.'/';
		}

		$extension = $client_file->extension();
		$filename_without_ext = pathinfo($client_file->getClientOriginalName(), PATHINFO_FILENAME);
		$filename_without_ext = str_replace(' ', '-', $filename_without_ext);
	  $filename = $filename_without_ext.'.'.$extension;
	  $content =  file_get_contents($client_file);

	  Storage::cloud()->put($dir.$filename, fopen($client_file, 'r+'));

	  $recursive = false; // Get subdirectories also?
	  $contents = collect(Storage::cloud()->listContents($dir, $recursive));

	  // Lấy lại file đã up -> lấy id -> thay đổi quyền
	  $file = $contents
      ->where('type', '=', 'file')
      ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
      ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
      ->first();
	  // Set quyền truy cập : Ai có link thì được truy cập
	  $service = Storage::cloud()->getAdapter()->getService();
    $permission = new \Google_Service_Drive_Permission();
    $permission->setRole('reader');
    $permission->setType('anyone');
    $permission->setAllowFileDiscovery(false);
    $permissions = $service->permissions->create($file['basename'], $permission);

    $message = [
			'success'      => true,
			'slidemessage' => 'Đã tải tệp '.$filename.' lên Google Drive'
		];
		return $message;
	}

}