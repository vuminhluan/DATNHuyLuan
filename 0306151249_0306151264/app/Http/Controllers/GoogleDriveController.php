<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\ThuMucGoogleDrive;
use Storage;

use App\Traits\CapNhatDoiTuongTrait;
use App\Traits\ThemTepGoogleDriveTrait;
use App\Traits\TaoThuMucGoogleDriveTrait;

class GoogleDriveController extends Controller
{

	use CapNhatDoiTuongTrait;

	use ThemTepGoogleDriveTrait;
	use TaoThuMucGoogleDriveTrait;

	public function getDangKiDichVu()
	{
		$root = env('GOOGLE_DRIVE_FOLDER_ID');
		$foldername = Auth::user()->ma_tai_khoan;
		// $foldername = date('dmY_His');

		$path = $root.'/'.$foldername;

		//Tạo tệp trên drive:
		$folder = $this->taoThuMucGoogleDrive($path, $root, $foldername);

		// return $folder;
		
		// Lưu id thư mục mới vào database
	  $thumuc_googledrive = new ThuMucGoogleDrive();
	  $data = [
			'ma_tai_khoan' => Auth::user()->ma_tai_khoan,
			'ma_thumuc'    => $folder['basename'],
			'trang_thai'   => 1
	  ];
	  $this->capNhatDoiTuong($data, $thumuc_googledrive);

	  // Nếu chưa đăng kí sử dụng dịch vụ
	  // if(!Auth::user()->thu_muc_google_drive)

	  //Lấy mã thư mục được cấp khi đăng kí dịch vụ
	  //$myfolder = Auth::user()->thu_muc_google_drive->ma_thumuc;


	  return redirect()->back()->with('slidemessage', $folder['basename']);

	}

	public function getHuyBoDichVu()
	{
		$ma_thumuc = Auth::user()->thu_muc_google_drive->ma_thumuc;
		ThuMucGoogleDrive::destroy($ma_thumuc);

		Storage::cloud()->deleteDirectory($ma_thumuc);

	  sleep(3); // Sleep 3s để drive xóa thư mục online

	  // return route('nguoidung.tep.index', ['username' => Auth::user()->ten_tai_khoan])->with('slidemessage', 'Đã hủy bỏ dịch vụ bạn đã đăng kí');

	  return redirect('/taikhoan/'.Auth::user()->ten_tai_khoan.'/tep/')->with('slidemessage', 'Đã hủy bỏ dịch vụ bạn đã đăng kí');
	}

	public function getIndex()
	{
		// Lấy folder id của người dùng.
		$myfolder = Auth::user()->thu_muc_google_drive->ma_thumuc;
		$dir = '/'.$myfolder.'/';
	  $recursive = false; // Get subdirectories also?
	  $contents = collect(Storage::cloud()->listContents($dir, $recursive));

	  $files = $contents->where('type', '=', 'file'); // files
	  $folders = $contents->where('type', '=', 'dir'); // directory

		return view('trang_ca_nhan.tep.googledrive')->with(['files'=>$files, 'folders'=>$folders, 'username'=>Auth::user()->ten_tai_khoan]);
		// return $files;
	}

	public function postThemTep(Request $req)
	{

		$client_file = $req->file;
		$root_id     = Auth::user()->thu_muc_google_drive->ma_thumuc;
		$folder_id   = $root_id;

		if($this->themTepGoogleDrive($client_file, $root_id, $folder_id)['success']) {
			return redirect()->back()->with('slidemessage', 'Tai tep thanh cong');
		} else {
			return redirect()->back()->with('slidemessage', 'Tai tep that bai, file > 50 MB');
		}

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
