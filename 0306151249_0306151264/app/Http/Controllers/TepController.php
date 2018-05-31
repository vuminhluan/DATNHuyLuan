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


	public function getTepIndex($username)
	{
		// return $ma_tk;
		$tatca_tep = TaiKhoan::where('ten_tai_khoan', $username)->first()->hasManyTep()->orderBy('ma_tep', 'desc')->get();
		// return $tatca_tep;
		return view('trang_ca_nhan.tep.index', ['tatca_tep' => $tatca_tep, 'username' => $username]);
	}

  public function getTepCongKhai($username)
  {
  	return view('trang_ca_nhan.tep.congkhai', ['username' => $username]);
  }

  public function postTaiTepLen(Request $req)
  {
  	
  	if(!$req->hasFile('uploads')) {
  		return redirect()->back();
  	}

  	foreach ($req->uploads as $key => $file) {
			// echo "<pre>";
  		if($file->getClientSize() < 25000) {
  			$file_name = md5(time()+$key).'.'.$file->extension();
  			$dir = "uploads/".Auth::user()->ma_tai_khoan."/";
				// print_r($dir."---".$file_name);
				// print_r($file->getClientSize());
				// print_r($this->taoMaTepTrait());
  			$data = [
  				"ma_tep" => $this->taoMaTepTrait(),
  				"ten_tep" => $file->getClientOriginalName(),
  				"duong_dan_tep" => $file_name,
  				"cong_khai" => 0,
  				"nguoi_tao" => Auth::user()->ma_tai_khoan,
  				"trang_thai" => 1
  			];

  			$file->move($dir, $file_name);

  			$tep = new Tep();
  			$this->capNhatDoiTuong($data, $tep);

  		}
  	}

  	return redirect()->back()->with('message', 'Thêm tệp thành công'); 



  }

  
}
