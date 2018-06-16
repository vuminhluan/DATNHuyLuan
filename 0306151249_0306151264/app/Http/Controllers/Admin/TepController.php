<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
// use Validator;
use App\TaiKhoan;
use App\Tep;
use App\Traits\TaoMaTepTrait;
use App\Traits\CapNhatDoiTuongTrait;

class TepController extends Controller
{

	use TaoMaTepTrait;
	use CapNhatDoiTuongTrait;

  public function getIndexTepCuaTaiKhoan($username, $kind)
  {

  	$tatca_tep = TaiKhoan::where('ten_tai_khoan', $username)->where('trang_thai', '!=', 4)->first()->hasManyTep()->orderBy('thoi_gian_tao', 'DESC')->paginate(8);
  	return view('admin.tep.index', ['tatca_tep' => $tatca_tep, 'ten_tai_khoan' => $username]);
  }

  public function postCapNhatTepCuaMotTaiKhoan($username, Request $req)
  {

  	if($req->search) {
      return redirect()->route('admin.taikhoan.tep.timkiem', [$username, $req->search]);
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

  public function getTimKiemTheoTenTep($username, $filename)
  {
  	$tatca_tep = TaiKhoan::where('ten_tai_khoan', $username)->where('trang_thai', '!=', 4)->first()->hasManyTep()->where('ten_tep', 'LIKE', '%'.$filename.'%')->orderBy('thoi_gian_tao', 'DESC')->paginate(8);
    return view('admin.tep.index', ['tatca_tep' => $tatca_tep, 'ten_tai_khoan' => $username]);
  }

}
