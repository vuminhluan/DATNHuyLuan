<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\TaiKhoan;
use App\TaiKhoanBiChan;
use App\Tep;
use App\bai_viet as BaiViet;
use App\Traits\TaoMaTepTrait;
use App\Traits\CapNhatDoiTuongTrait;
use App\Traits\ChanHoacBoChanMotTaiKhoanTrait;
use App\bao_cao_vi_pham as BaoCao;
use App\nhom_m as Nhom;


use App\NguoiDung;

class TrangCaNhanController extends Controller
{

	use TaoMaTepTrait;
	use CapNhatDoiTuongTrait;
	use ChanHoacBoChanMotTaiKhoanTrait;

	public function getTrangCaNhan($username)
	{
		$tatca_gioitinh = DB::table('gioi_tinh')->get();

		
		// return $tatca_baiviet;
		// return $tatca_gioitinh;

		// $taikhoan_nguoidung = DB::table('tai_khoan AS tk')
		// 	->join('nguoi_dung AS nd', 'tk.ma_tai_khoan', '=', 'nd.ma_tai_khoan')
		// 	->where('tk.ten_tai_khoan', '=', $username)
		// 	->select(
		// 		'tk.*',
		// 		DB::raw("CONCAT(nd.ho_ten_lot,' ', nd.ten) AS hoten_nguoidung")
		// 	)->get();

			// return $taikhoan_nguoidung;



		$taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->where('trang_thai', '!=', 4)->first();

		if(!$taikhoan || $taikhoan->trang_thai != 2) {
			abort(404);
		}
		// return $taikhoan->hasNguoiDung->ten;
		$taikhoan_bichan = TaiKhoanBiChan::where('ma_tai_khoan_bi_chan', $taikhoan->ma_tai_khoan)->where('ma_tai_khoan_chan', Auth::user()->ma_tai_khoan)->where('trang_thai', 1)->first();

		if($taikhoan_bichan) {
			abort(404);
		}
		$account_posts = DB::table('bai_viet')
		->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
		->join('nhom','bai_viet.ma_chu_bai_viet','=','nhom.ma_nhom')
		->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
		// ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
		->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','bai_viet.ma_bai_viet', 'nhom.ma_nhom', 'nhom.ten_nhom')//
      ->where([['bai_viet.ma_nguoi_viet',$taikhoan->ma_tai_khoan],["bai_viet.trang_thai","1"]]);

		// $account_posts = DB::table('bai_viet')
		// 	->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
		// 	->join('nhom','bai_viet.ma_chu_bai_viet','=','nhom.ma_nhom')
		// 	->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
		// 	->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
  //     ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet', 'nhom.ma_nhom', 'nhom.ten_nhom')//
  //     ->where([['bai_viet.ma_nguoi_viet',$taikhoan->ma_tai_khoan],["bai_viet.trang_thai","1"], ['bai_viet.ma_bai_viet', 14]]);
      // ->orderBy('bai_viet.ma_bai_viet','desc')
      // ->take(100)->get()

    if(Auth::user()->ma_tai_khoan != $taikhoan->ma_tai_khoan) {
    	$account_posts = $account_posts->where([
    		['bai_viet.ma_loai_bai_viet', '!=', 'LBV002'],
    		['bai_viet.ma_loai_bai_viet', '!=', 'LBV004']
    	]);
    }

    $account_posts = $account_posts->orderBy('bai_viet.ma_bai_viet','desc')->take(100)->get();

      // return $account_posts;


     // return $account_posts;

		return view('trang_ca_nhan.index')->with(['taikhoan'=>$taikhoan, 'tatca_gioitinh'=>$tatca_gioitinh, 'lstbaiviet'=>$account_posts]);
	}

	public function getNhom($username)
	{	
		$taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->where('trang_thai', '!=', '4')->first();
		$tatca_gioitinh = DB::table('gioi_tinh')->get();

		// return $taikhoan;

		// $tatca_nhom = $taikhoan->hasManyNhom()->where('trang_thai', 1)->get();
		// // return $tatca_nhom;
		$tatca_nhom_theo_taikhoan = DB::table('nhom')
		->join('chuc_vu_cua_thanh_vien_trong_nhom AS TV_CV', 'TV_CV.ma_nhom', '=', 'nhom.ma_nhom')
		->join('chuc_vu_trong_nhom AS CV', 'CV.ma_chuc_vu', '=', 'TV_CV.ma_chuc_vu')
		->select('nhom.*', 'TV_CV.ma_chuc_vu', 'TV_CV.ma_tai_khoan AS thanhvien', 'CV.ten_chuc_vu')
		->where([
			['TV_CV.ma_tai_khoan', $taikhoan->ma_tai_khoan],
			['nhom.trang_thai', '!=', 0]
		])
		->where(function ($query) {
			$query->whereIn('TV_CV.ma_chuc_vu', ['CV02', 'CV07']);
		})
		->orderBy('TV_CV.ma_chuc_vu', 'DESC')->orderBy('TV_CV.ma_nhom', 'ASC')
		->get();

		// return $tatca_nhom_theo_taikhoan;

		$nhom_theo_chucvu = [
			'CV02' => [],
			'CV07' => []
		];

		foreach ($tatca_nhom_theo_taikhoan as $nhom) {
			$nhom->soluong_thanhvien = DB::table('thanh_vien_nhom')->where('ma_nhom', $nhom->ma_nhom)->count();
			if($nhom->ma_chuc_vu == "CV07") {
				$nhom_theo_chucvu['CV07'][] = $nhom;
			} else {
				$nhom_theo_chucvu['CV02'][] = $nhom;
			}
		}

		// return $nhom_theo_chucvu;


		return 	view('trang_ca_nhan.danhsach_nhom')->with([
							'taikhoan'=>$taikhoan,
							'tatca_gioitinh'=>$tatca_gioitinh,
							'tatca_nhom'=>$nhom_theo_chucvu
						]);
	}

	public function capNhatNguoiDung(Request $req)
	{
		$data = [
			'ho_ten_lot' => $req->profile_family_middle_name,
			'ten' => $req->profile_first_name,
			'ten_an_danh' => $req->profile_secret_name,
			'ngay_sinh' => $req->profile_birthday,
			'ma_gioi_tinh' => $req->profile_gender,
			'nguoi_sua' => Auth::user()->ma_tai_khoan,
			'gioi_thieu' => preg_replace( "/(\r\n)/", " ", $req->profile_bio)
		];
		
		// $nguoi_dung = NguoiDung::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();
		NguoiDung::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->update($data);

		return redirect()->back()->with('my_message', 'Cập nhật thông tin thành công');
	}

	public function capNhatAnhNguoiDung($kind_of_image, Request $req)
	{
		// return $kind_of_image;
		$the_message; $field; $file;
		if($kind_of_image == "anh_bia") {
			$field = "upload_banner";
			$the_message = "ảnh bìa";
			// $file = $req->upload_banner;
		} else {
			$field = "upload_avatar";
			$the_message = "ảnh đại diện";
		}


		if($req->hasFile($field)) {
			$file = $req->$field;
		} else {
			return "Không tìm thấy ảnh.";
		}

		$validator = Validator::make(
			$req->all(),
			[
				$field => 'image'
			]
		);

		if($validator->fails()) {
			return "Không phải hình ảnh";
		}

		// Nếu upload thành công. Chú ý, upload lên bộ nhớ tạm, chứ không phải move tới thư mục nào đó.
		if($file->isValid()) {
			$file_name =  md5(time()).'.'.$file->extension();

			$file->move('pictures/'.$kind_of_image, $file_name);

			// Update database
			$nguoi_dung = NguoiDung::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();
			$nguoi_dung->$kind_of_image = $file_name;
			$nguoi_dung->save();
		}

		return redirect()->back()->with('my_message', 'Cập nhật '.$the_message.' thành công');
	}


	public function chanMotTaiKhoan($userid, $username)
	{
		// return $userid."--".$username;
		if($this->chanHoacBoChanMotTaiKhoan($userid)) {
			$message = "Đã chặn tai khoản @".$username;
		} else {
			$message = "Đã bỏ chặn tai khoản @".$username;
		}
		return redirect()->route('caidat.chan_taikhoan')->with('slidemessage', $message);
	}


	public function postBaoCaoTaiKhoan(Request $req)
	{
		// return "Đã báo cáo tài khoản thành công";

		if($this->getKiemTraBaoCaoTonTaiHayChua($req->user_id)['reported']) {
			$baocao = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first()->hasManyBaoCao()->where('trang_thai', 1)->where('ma_doi_tuong_bi_bao_cao', 'NH00000003')->first();
			$baocao->noi_dung_bao_cao = $req->report_input;
			$baocao->save();
		} else {
			$baocao = new BaoCao();
			$baocao->ma_loai_bao_cao = "LBC01";
			$baocao->ma_noi_nhan_bao_cao = "NNBC1";
			$baocao->nguoi_gui_bao_cao = Auth::user()->ma_tai_khoan;
			$baocao->noi_dung_bao_cao = $req->report_input;
			$baocao->ma_doi_tuong_bi_bao_cao = $req->user_id;
			$baocao->save();
		}

		return redirect()->back()->with('slidemessage', 'Báo cáo thành công');
	}

	// Ajax
	public function getKiemTraBaoCaoTonTaiHayChua($userid)
	{
		$baocao = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first()->hasManyBaoCao()->where('trang_thai', 1)->where('ma_doi_tuong_bi_bao_cao', $userid)->first();
		$data = [
			'reported' => false // Đối tượng này chưa bị báo cáo hoặc báo cáo đã được xử lý hay đã xóa
		];
		if($baocao) {
			$reported_at = date_format($baocao->thoi_gian_gui_bao_cao,'d/m/Y h:i:s');
			$data['reported'] = true;
			$data['message'] = "Bạn đã báo cáo người này vào lúc ".$reported_at." và báo cáo của bạn đang đợi để xử lý. Nếu báo cáo lại, nội dung báo cáo sẽ thay đổi.";
			$data['content'] = $baocao->noi_dung_bao_cao;
		}

		return $data;
	}


	// public function GetBaiVietPhanTrang(Request $rql){
 //          // $path = "?manho"
	// 	$soluongbaivietdalay = $rql->soluongbaivietdalay;
	// 	$soluongbaivietcanlay = $rql->soluongbaivietcanlay;
	// 	$listbaiviet      = DB::table('bai_viet')
	// 	->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
	// 	->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
	// 	->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
 //    // ->leftJoin('thumuc_googledrive','bai_viet.ma_nguoi_viet','=','thumuc_googledrive.ma_tai_khoan')
 //    // 'thumuc_googledrive.*',
 //    ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
 //    ->where([["bai_viet.ma_chu_bai_viet",$rql->ma_nhom],["bai_viet.trang_thai","1"]])
 //    ->orderBy('bai_viet.ma_bai_viet','desc')
 //    // ->paginate(5)
 //    ->offset($soluongbaivietdalay)
 //    ->limit($soluongbaivietcanlay)   
 //    ->get();
 //    // ->setPath("?ma_nhom=".$rql->ma_nhom);
 //    return  view("baiviet.hienthibaiviet",["lstbaiviet"=>$listbaiviet]);
 //  }


}
