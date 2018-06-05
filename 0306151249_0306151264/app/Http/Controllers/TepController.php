<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\TaiKhoan;
use App\Tep;
use App\Traits\TaoMaTepTrait;
use App\Traits\CapNhatDoiTuongTrait;

// use App\NguoiDung;

class TepController extends Controller
{

	use TaoMaTepTrait;
	use CapNhatDoiTuongTrait;


  public function getTrangTep($username, $kind = "tatca", Request $req)
  {
    // return TaiKhoan::where('ten_tai_khoan', $username)->first()->hasManyTep()->where('cong_khai', 1)->orderBy('ma_tep', 'desc')->get();
    // $tatca_tep = null;
    $tatca_tep = TaiKhoan::where('ten_tai_khoan', $username)->first()->hasManyTep()->where('trang_thai', 1);
    // $kind = "congkhai";
    if($req->mode) {
      $kind = $req->mode;
    }
    if($req->filename_keyword) {
      $tatca_tep = $tatca_tep->where('ten_tep', 'LIKE', '%'.$req->filename_keyword.'%');
    }

    if($kind == "tatca" || $kind=="tep") {
      $tatca_tep = $tatca_tep->orderBy('ma_tep', 'desc')->get();
    } else if ($kind == "congkhai") {
      $tatca_tep = $tatca_tep->where('cong_khai', 1)->orderBy('ma_tep', 'desc')->get();
    } else if($kind == "riengtu") {
      $tatca_tep = $tatca_tep->where('cong_khai', 0)->orderBy('ma_tep', 'desc')->get();
    }
    // return $kind;
    // return $tatca_tep;
    return view('trang_ca_nhan.tep.index', ['tatca_tep' => $tatca_tep, 'username' => $username]);
    // return "haha";
    
  }

	// public function getTepIndex($username)
	// {
	// 	// return $ma_tk;
	// 	$abc = TaiKhoan::where('ten_tai_khoan', $username)->first()->hasManyTep();
 //    $tatca_tep = $abc->orderBy('ma_tep', 'desc')->get();
	// 	// return $tatca_tep;
	// 	return view('trang_ca_nhan.tep.index', ['tatca_tep' => $tatca_tep, 'username' => $username]);
	// }

  // public function getTepCongKhai($username)
  // {
  // 	return view('trang_ca_nhan.tep.congkhai', ['username' => $username]);
  // }

  public function postTaiTepLen(Request $req)
  {
  	
  	if(!$req->hasFile('uploads')) {
  		return redirect()->back();
  	}
    $overlimit = false;
    $message = "Thêm tệp thành công";

    $mode = ($req->mode == "congkhai") ? 1 : 0;

  	foreach ($req->uploads as $key => $file) {
			// echo "<pre>";
  		if($file->getClientSize() <= 15*1024*1024) {

  			$file_name = md5(time()+$key).'.'.$file->extension();
  			$dir = "uploads/".Auth::user()->ma_tai_khoan."/";
				// print_r($dir."---".$file_name);
				// print_r($file->getClientSize());
				// print_r($this->taoMaTepTrait());
  			$data = [
  				"ma_tep" => $this->taoMaTepTrait(),
  				"ten_tep" => $file->getClientOriginalName(),
  				"duong_dan_tep" => $file_name,
  				"cong_khai" => $mode,
  				"nguoi_tao" => Auth::user()->ma_tai_khoan,
  				"trang_thai" => 1
  			];

  			$file->move($dir, $file_name);

  			$tep = new Tep();
  			$this->capNhatDoiTuong($data, $tep);
  		} else {
        $overlimit = true;
      }
  	}

    if($overlimit) {
      $message = "Những tệp vượt quá kích thước (15MB) sẽ không được tải lên";
    }

  	return redirect()->back()->with('slidemessage', $message); 

  }

  public function getXoaTep($username, $file_id)
  {
    $tep = Tep::find($file_id);
    $data = ['trang_thai'=>0];
    $this->capNhatDoiTuong($data, $tep);
    sleep(1);
    return ['message' => 'Bạn đã xóa tệp: '.$tep->ten_tep];
  }

  public function getCapNhat($username, $file_id, $kind, Request $req)
  {
    $tep = Tep::find($file_id);
    if($kind == "chedo") {
      return $this->capNhatCheDo($tep);
    } else if($kind == "doiten") {
      return $this->capNhatTen($tep, $req->new_filename);
    }
  }

  public function capNhatCheDo($tep)
  {
    $mode = "Công khai";
    $mode_id = 1;
    if($tep->cong_khai) {
      $mode = "Riêng tư";
      $mode_id = 0;
    }
    $data = ["cong_khai" => $mode_id];
    $this->capNhatDoiTuong($data, $tep);
    return ['message' => 'Đã chuyển tệp '.$tep->ten_tep.'  sang chế độ '.$mode, 'modeid' => $mode_id];
  }

  public function capNhatTen($tep, $new_filename)
  {
    $data = ["ten_tep" => $new_filename];
    $this->capNhatDoiTuong($data, $tep);
    return redirect()->back()->with('slidemessage', 'Đổi tên tệp thành công');
  }



  
}
