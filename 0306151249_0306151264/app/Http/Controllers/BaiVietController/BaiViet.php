<?php

namespace App\Http\Controllers\BaiVietController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\bai_viet;
use App\NguoiDung;
use App\Traits\BaiVietTrait;
use App\hinh_anh_bai_viet;
use App\ThuMucThuBai;

use Illuminate\Support\Facades\Auth;


use App\Traits\TaoThuMucGoogleDriveTrait;
use App\Traits\ThemTepGoogleDriveTrait;



class BaiViet extends Controller 
{

    use BaiVietTrait;
    use TaoThuMucGoogleDriveTrait;
    use ThemTepGoogleDriveTrait;

    public function Postbaiviet(Request $request)
    {
        // return  
    	// $baiviet = new bai_viet();
    	// $baiviet->ma_bai_viet 			= $request->ma_bai_viet;
    	// $baiviet->ma_nguoi_viet			= $request->ma_nguoi_viet;
    	// $baiviet->ma_chu_bai_viet		= $request->ma_chu_bai_viet;
    	// $baiviet->noi_dung_bai_viet		= $request->noi_dung_bai_viet; 
    	// $baiviet->binh_luan_bai_viet	= $request->binh_luan_bai_viet;
    	// $baiviet->hinh_anh_bai_viet		= $request->hinh_anh_bai_viet;
    	// $baiviet->nop_tep				= $request->nop_tep;
    	// $baiviet->khao_sat_y_kien		= $request->khao_sat_y_kien;
    	// $baiviet->ma_loai_bai_viet		= $request->ma_loai_bai_viet;
    	// $baiviet->thoi_gian_dang		= $request->thoi_gian_dang;
    	// $baiviet->thoi_gian_an_bai_viet	= $request->thoi_gian_an_bai_viet;
    	// $baiviet->thoi_gian_sua			= $request->thoi_gian_sua;
    	// $baiviet->nguoi_sua				= $request->nguoi_sua;
    	// $baiviet->save();							
     //    return "hihi";	
        return $this->PostbaivietT($request);	
    }
    public function postfilenopbaithanhvien(Request $rql){
       // return "ok route";
        // ma_bai_viet
        $client_file = $rql['inputfilenopbai-'.$rql->ma_bai_viet];

        $root_id     = Auth::user()->thu_muc_google_drive->ma_thumuc;
        $folder_id   = $rql->ma_thumuc;

        // return $client_file. '--'.$root_id.'--'.$folder_id;

        if($this->themTepGoogleDrive($client_file, $root_id, $folder_id)['success']) {
            // return redirect()->back()->with('slidemessage', 'Tai tep thanh cong');
            return "Thanh cong"; //sida :v
        } else {
           //  return redirect()->back()->with('slidemessage', 'Tai tep that bai, file > 50 MB');
            return "That bai file > 100 MB";
        }

    }

     // tạo folder theo mã bài viết + mã tài khoản ở đây nha 

    public function taofolderchuatepthubai(Request $rql){
        $root = env('GOOGLE_DRIVE_FOLDER_ID');

        $thumuc_dangbai = Auth::user()->thu_muc_google_drive->ma_thumuc;

        // return Auth::user()->thu_muc_google_drive->ma_thumuc;

        //Tạo tệp trên drive:
        // $folder = $this->taoThuMucGoogleDrive($path, $root, $foldername);
        
        // if(!Auth::user()->thu_muc_google_drive) {

        //     $foldername = Auth::user()->ma_tai_khoan;
        //     $path = $root.'/'.$foldername;

        //     $folder = $this->taoThuMucGoogleDrive($path, $root, $foldername);

        //     $thumuc_googledrive = new ThuMucGoogleDrive();
        //     $thumuc_googledrive->ma_tai_khoan => Auth::user()->ma_tai_khoan;
        //     $thumuc_googledrive->ma_thumuc    => $folder['basename'];
        //     $thumuc_googledrive->trang_thai  => 1;
        //     $thumuc_googledrive->save();
        // }

        // return $rql; // cais nayf la gi : 

        $new_folder = 'folder'.$rql->ma_bai_viet.$rql->nguoi_tao;
        $path = $root.'/'.$thumuc_dangbai.'/'.$new_folder;
        $folder = $this->taoThuMucGoogleDrive($path, $root, $new_folder);
        // nó ko trả về kết quả được :v lỗi từ khúc này trở xuống

        // return $folder['basename'];


        $thumuc_thubai = new ThuMucThuBai();
        $thumuc_thubai->ma_thumuc = $folder['basename'];
        $thumuc_thubai->ma_bai_viet = $rql->ma_bai_viet;
        $thumuc_thubai->nguoi_tao = $rql->nguoi_tao;
        $thumuc_thubai->trang_thai = 1;
        $thumuc_thubai->save();

        return "OK";

    }




    public function GetMaBaiViet()
    {
      return  $this->GetMaBaiVietT();
        // $ma =  DB::table('bai_viet')->select('ma_bai_viet')->orderBy('ma_bai_viet','desc')->get()->first();
        // return $ma->ma_bai_viet;
    
    }
    public function GetBaiVietTheoChuBaiViet(Request $rq)
    {
        return $this->GetBaiVietTheoChuBaiVietT($rq);
    }
    public function GetBaiVietMoi(Request $rq)
    {
        return $this->GetBaiVietMoiT($rq);
        //     $mabaiviet=$rq->mabaiviet;
        // $listbaiviet = DB::table('bai_viet')->where("ma_bai_viet",$mabaiviet)->get();
        
        // return view("baiviet.hienthibaivietmoi",["mabaivietmoi"=>$mabaiviet,"lstbaiviett"=>$listbaiviet]);
    }
    public function Getbaiviettheonguoivietvanguoisohuu(Request $rql )
    {
        $listbaiviet = DB::table('bai_viet')
        ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
        ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','LIKE','hinh_anh_bai_viet.ma_bai_viet')
        ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*')
        ->where([["bai_viet.ma_nguoi_viet",$rql->ma_nguoi_viet],["bai_viet.ma_chu_bai_viet",$rql->ma_chu_bai_viet]])
        ->orderBy('bai_viet.ma_bai_viet','desc')
        ->get();
        return view("baiviet.hienthibaivietmoi",["lstbaiviett"=>$listbaiviet]);
    }

    public function Postanh(Request $rql){
                
        if ($rql->hasFile('imgInp')) {
           // return $this->Getmaanh()+1;

            $mabaiviet = $this->Getmabaiviet()+1;
            $mahinhanh = $this->Getmaanh()+1;
            $duongdananh= 'images/'.$rql->chu_cua_bai_dang.$rql->nguoi_dang;
            $tenanh = $rql->chu_cua_bai_dang.$rql->nguoi_dang.$mabaiviet.$mahinhanh.'.png';
           $rql->file('imgInp')->move($duongdananh,$tenanh);

         //  return $mabaiviet.$duongdananh.$tenanh.$rql->chu_cua_bai_dang.$rql->nguoi_dang.$rql->trang_thai;
            $anhbaiviet = new hinh_anh_bai_viet();
            $anhbaiviet->ma_bai_viet = $mabaiviet;
            $anhbaiviet->duong_dan_anh= $duongdananh.'/'.$tenanh;
            $anhbaiviet->chu_so_huu_anh = $rql->chu_cua_bai_dang;
            $anhbaiviet->nguoi_dang_anh = $rql->nguoi_dang;
            $anhbaiviet->trang_thai = $rql->trang_thai;
            $anhbaiviet->save();

           }
        //return $this->Getmaanh()+1;
        // return $this->Getmabaiviet()+1;
        
    }
    public function Getmaanh(){
       // return DB::table('hinh_anh_bai_viet')->select('ma_hinh_anh')->orderBy('ma_hinh_anh','desc')->get()->first();
        $ma =  DB::table('hinh_anh_bai_viet')->select('ma_hinh_anh')->orderBy('ma_hinh_anh','desc')->get()->first();
        if($ma==''){
            return '0';
        }
        return $ma->ma_hinh_anh;
    }
    // public function Getmabaiviet(){
    //        return DB::table('bai_viet')->select('ma_bai_viet')->orderBy('ma_bai_viet','desc')->take(1)->get();
    // }

}
