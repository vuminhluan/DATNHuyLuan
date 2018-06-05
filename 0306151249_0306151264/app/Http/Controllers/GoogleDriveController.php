<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ThuMucGoogleDrive;
use Storage;

use App\Traits\CapNhatDoiTuongTrait;

class GoogleDriveController extends Controller
{

	use CapNhatDoiTuongTrait;

	public function getDangKiDichVu()
	{
		$root = env('GOOGLE_DRIVE_FOLDER_ID');
		$foldername = Auth::user()->ma_tai_khoan;

		// Tên thư mục tạm thời sẽ là mã tài khoản => Không sợ bị trùng.
		Storage::cloud()->makeDirectory($root.'/'.$foldername);


  	// $dir = '/'; // thư mục gốc (trong file env có khai báo id của thư mục gốc.)
	  $recursive = false; // Get subdirectories also? //false => Chỉ sử dụng ở thư mục hiện tại, không tìm kiếm ở cácthư mục con.
	  $contents = collect(Storage::cloud()->listContents($root, $recursive));
		
	  $dir = $contents->where('type', '=', 'dir')
	    ->where('filename', '=', $foldername)
	    ->first(); // There could be duplicate directory names!
		
	  $thumuc_googledrive = new ThuMucGoogleDrive();
	  $data = [
			'ma_tai_khoan' => Auth::user()->ma_tai_khoan,
			'ma_thumuc'    => $dir['basename'],
			'trang_thai'   => 1
	  ];

	  $this->capNhatDoiTuong($data, $thumuc_googledrive);

	  sleep(2); //Sleep 2s để cho google drive tạo thư mục

	  return redirect()->back()->with('slidemessage', 'Chúc mừng bạn đã đăng kí dịch vụ thành công.');
	}

	public function getHuyBoDichVu()
	{
		$ma_thumuc = Auth::user()->thu_muc_google_drive->ma_thumuc;
		ThuMucGoogleDrive::destroy($ma_thumuc);

		Storage::cloud()->deleteDirectory($ma_thumuc);

	  sleep(3);
	  return redirect()->back()->with('slidemessage', 'Đã hủy bỏ dịch vụ bạn đã đăng kí');

	}

	public function getIndex()
	{
		// Lấy folder id của người dùng.
		$myfolder = Auth::user()->thu_muc_google_drive->ma_thumuc;
		$dir = '/'.$myfolder.'/';
	  $recursive = false; // Get subdirectories also?
	  $contents = collect(Storage::cloud()->listContents($dir, $recursive));

	  $files = $contents->where('type', '=', 'file'); // files

		return view('trang_ca_nhan.tep.googledrive')->with(['files'=>$files, 'username'=>Auth::user()->ten_tai_khoan]);
		// return $files;
	}

	public function postThemTep(Request $req)
	{
		$folderid = Auth::user()->thu_muc_google_drive->ma_thumuc;
		$dir = "/".$folderid.'/';

		$extension = $req->file->extension();
		$filename_without_ext = pathinfo($req->file->getClientOriginalName(), PATHINFO_FILENAME);
		$filename_without_ext = str_replace(' ', '-', $filename_without_ext);
	  $filename = $filename_without_ext.'.'.$extension;
	  $content =  file_get_contents($req->file);

	  // return $filename;

	  Storage::cloud()->put($dir.$filename, $content);
	  $recursive = false; // Get subdirectories also?
	  $contents = collect(Storage::cloud()->listContents($dir, $recursive));
	  // Lấy lại file đã up -> lấy id -> thay đổi quyền
	  $file = $this->getFileByName($filename, $contents);

	  $service = Storage::cloud()->getAdapter()->getService();
    $permission = new \Google_Service_Drive_Permission();
    $permission->setRole('reader');
    $permission->setType('anyone');
    $permission->setAllowFileDiscovery(false);
    $permissions = $service->permissions->create($file['basename'], $permission);

    return redirect()->back()->with('slidemessage', 'Đã tải tệp '.$filename.' lên Google Drive');
	}

	public function getFileByName($filename, $contents)
  {

	  $file = $contents
      ->where('type', '=', 'file')
      ->where('filename', '=', pathinfo($filename, PATHINFO_FILENAME))
      ->where('extension', '=', pathinfo($filename, PATHINFO_EXTENSION))
      ->first(); // there can be duplicate file names!

     return $file; //return $file; // array with file info
  }

  public function getFileById($fileid, $contents)
  {

	  $file = $contents
      ->where('type', '=', 'file')
      ->where('basename', '=', $fileid)
      ->first(); // there can be duplicate file names!

	  return $file; // array with file info
  }

  public function getTaiTep($fileid)
  {
  	$folderid = Auth::user()->thu_muc_google_drive->ma_thumuc;
		$dir = "/".$folderid.'/';
		$recursive = false; // Get subdirectories also?
	  $contents = collect(Storage::cloud()->listContents($dir, $recursive));

	  $file = $this->getFileById($fileid, $contents);

	  $filename = $file['name'];

	  $rawData = Storage::cloud()->get($file['path']);
	  return response($rawData, 200)
      ->header('ContentType', $file['mimetype'])
      ->header('Content-Disposition', "attachment; filename=$filename");
  }

  public function getXoaTep($fileid)
  {
  	Storage::cloud()->delete($fileid);
	  sleep(2);
	  return redirect()->back()->with('message', 'Đã xóa tệp trong Google Drive');
  }



}
