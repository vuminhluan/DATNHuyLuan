<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Validator;
use Storage;
use App\TaiKhoan;
use App\Tep;
use App\Traits\TaoMaTepTrait;
use App\Traits\CapNhatDoiTuongTrait;
use App\ThuMucThuBai;

class TepController extends Controller
{

	use TaoMaTepTrait;
	use CapNhatDoiTuongTrait;

  public function getIndexTepCuaTaiKhoan($userid, $kind)
  {
  	if($kind == "server") {
	  	$tatca_tep = TaiKhoan::where('ma_tai_khoan', $userid)->first()->hasManyTep()->orderBy('thoi_gian_tao', 'DESC')->paginate(8);
	  	return view('admin.tep.index', ['tatca_tep' => $tatca_tep, 'ma_tai_khoan' => $userid]);
  	} else if ($kind == "googledrive") {

	  // 	// Lấy folder id của người dùng.
			// $myfolder = TaiKhoan::where('ma_tai_khoan', $userid)->first()->hasThuMuc;
			// if($myfolder) {
			// 	$myfolder = $myfolder->ma_thumuc;
			// } else return "Tài khoản này chưa đăng kí sử dụng dịch vụ Google Drive";

			
			// $dir = '/'.$myfolder.'/';
		 //  $recursive = false; // Get subdirectories also?
		 //  $contents = collect(Storage::cloud()->listContents($dir, $recursive));

		 //  // $files = $contents->where('type', '=', 'file'); // files
		 //  $folders = $contents->where('type', '=', 'dir'); // directory

			// // return view('trang_ca_nhan.tep.googledrive')->with(['files'=>$files, 'folders'=>$folders, 'userid'=>Auth::user()->ten_tai_khoan]);
			// // return $files;
      $root_folder = TaiKhoan::where('ma_tai_khoan', $userid)->first()->hasThuMuc;
      $children_folder = TaiKhoan::where('ma_tai_khoan', 'TK00000003')->first()->hasManyThuMucThuBai;


			return view('admin.tep.googledrive')->with(['children'=>$children_folder, 'root'=>$root_folder]);
  	}
  	abort(404);
  }

  public function postCapNhatTepCuaMotTaiKhoan($userid, Request $req)
  {

  	if($req->search) {
      return redirect()->route('admin.taikhoan.tep.timkiem', [$userid, $req->search]);
    }




  	$message = 'Tin nhắn';
  	$data_update = [
      'nguoi_sua' => Auth::user()->ma_tai_khoan
    ];



  	if($req->task == "server-files-delete") {
  		$data_update['trang_thai'] = 0;
  		$message = "Đã xóa các tệp được chọn";
  	} else if ($req->task == "server-files-recover") {
  		$data_update['trang_thai'] = 1;
  		$message = "Đã khôi phục các tệp được chọn";
  	} else if ($req->task == "server-files-change-name") {
  		$data_update['ten_tep'] = $req->new_filename;
  		$message = "Đã đổi tên các tệp được chọn";
  	} else abort(404);

  	Tep::whereIn('ma_tep', $req->id)->update($data_update);

  	return redirect()->back()->with('slidemessage', $message);

  }

  public function getTimKiemTheoTenTep($userid, $filename)
  {
  	$tatca_tep = TaiKhoan::where('ma_tai_khoan', $userid)->first()->hasManyTep()->where('ten_tep', 'LIKE', '%'.$filename.'%')->orderBy('thoi_gian_tao', 'DESC')->paginate(8);
    return view('admin.tep.index', ['tatca_tep' => $tatca_tep, 'ma_tai_khoan' => $userid]);
  }

}
