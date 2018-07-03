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
use App\tep_duoc_nop;
use App\y_kien_binh_chon_bai_viet;
use App\nguoi_chon_y_kien;
use Illuminate\Support\Facades\Auth;
use App\Traits\TaoThuMucGoogleDriveTrait;
use App\Traits\ThemTepGoogleDriveTrait;

//
use App\nhom_m;
use App\thanh_vien_nhom;
use App\thanh_vien_cho_phe_duyet;
use App\chuc_vu_cua_thanh_vien_trong_nhom;
use App\chuc_vu_trong_nhom;
use App\cai_dat_nhom;
use App\bai_viet_chia_se;
use Storage;




class BaiViet extends Controller 
{

    use BaiVietTrait;
    use TaoThuMucGoogleDriveTrait;
    use ThemTepGoogleDriveTrait;

    public function Postbaiviet(Request $request)
    {
         $this->PostbaivietT($request);
         if ($request->lstmanhomsharebv!="") {
            for ($i=0; $i <count($request->lstmanhomsharebv) ; $i++) {  
                $this->Postbaivietchiase( $this->GetMaBaiVietT(),$request->ma_nguoi_viet,$request->lstmanhomsharebv[$i]);
            }
         }


    }
    // public function Getmabaivietnguoidangtheo($value='')
    // {
    //     # code...
    // }
    public function Postbaivietchiase($mabaiviet,$manguoichiase,$manhomchiase){
        
            $baivietchiase = new bai_viet_chia_se();
            $baivietchiase->ma_nguoi_chia_se        = $manguoichiase;    
            $baivietchiase->ma_bai_viet             = $mabaiviet;
            $baivietchiase->ma_nhom_chia_se         = $manhomchiase; 
            $baivietchiase->trang_thai              = "1";
            $baivietchiase->save();
        
        
    }




    public function postfilenopbaithanhvien(Request $rql){
       // return "ok route";
        // ma_bai_viet
        $client_file = $rql['inputfilenopbai-'.$rql->ma_bai_viet];
        $root_id     = $rql->ma_thumuc;//Auth::user()->thu_muc_google_drive->ma_thumuc;
        $folder_id   = $rql->ma_thumuc;
        // return $client_file. '--'.$root_id.'--'.$folder_id;
        if($this->themTepGoogleDrive($client_file, $root_id, $folder_id)['success']) {
            // return redirect()->back()->with('slidemessage', 'Tai tep thanh cong');
            return "Tải tập tin thành công"; //sida :v
        } else {
           //  return redirect()->back()->with('slidemessage', 'Tai tep that bai, file > 50 MB');
            return "Thất bại file > 100 MB, thử lại sau";
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
        // đoạn thêm tránh trùng folder
        // $dt = new DateTime();
        // $timer= $dt->format('Y-m-d-H-i-s');.$timer
        // hihi



        $new_folder = 'folder'.$rql->ma_bai_viet.$rql->nguoi_tao;
        $path = $root.'/'.$thumuc_dangbai.'/'.$new_folder;
        $folder = $this->taoThuMucGoogleDrive($path, $root, $new_folder);


      //   $contents = collect(Storage::cloud()->listContents($root, true));

      // $dir = $contents->where('type', '=', 'dir')
      //   ->where('filename', '=', $new_folder)
      //   ->first();




        // nó ko trả về kết quả được :v lỗi từ khúc này trở xuống
        $thumuc_thubai = new ThuMucThuBai();
        $thumuc_thubai->ma_thumuc =$folder['basename'];
        $thumuc_thubai->ma_bai_viet = $rql->ma_bai_viet; 
        $thumuc_thubai->nguoi_tao = $rql->nguoi_tao;
        $thumuc_thubai->trang_thai = 1;
        $thumuc_thubai->save();
        // return $folder['basename'];




        return "OK";

    }


    public function POSTBaiVietThuBaiFull(Request $rql)
    {
        // return $rql;
        // $this->taofolderchuatepthubai($rql);
        $this->Postbaiviet($rql);

    }
    // public function POSTBaiVietKhaoSatvaThuBaiFull($value='')
    // {
    //     # code...
    // }
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
        // $listbaiviet = DB::table('bai_viet')
        // ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
        // ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','LIKE','hinh_anh_bai_viet.ma_bai_viet')
        // ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*')
        // ->where([["bai_viet.ma_nguoi_viet",$rql->ma_nguoi_viet],["bai_viet.ma_chu_bai_viet",$rql->ma_chu_bai_viet]])
        // ->orderBy('bai_viet.ma_bai_viet','desc')
        // ->get();

// 
        $listbaiviet      = DB::table('bai_viet')
        ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
        ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
        ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
        ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
        ->where([["bai_viet.ma_chu_bai_viet",$rql->ma_chu_bai_viet],['bai_viet.ma_nguoi_viet',$rql->ma_nguoi_viet],["bai_viet.trang_thai","1"]])
        ->orderBy('bai_viet.ma_bai_viet','desc')
        ->take(1)->get();
// 



        return view("baiviet.hienthibaivietmoi",["lstbaiviet"=>$listbaiviet]);
    }

    public function Postanh(Request $rql){
                
        if ($rql->hasFile('imgInp')) {
            // return "lỗi ảnh";
           // return $this->Getmaanh()+1;

            $mabaiviet = $this->Getmabaiviet()+1;
            // return $mabaiviet;
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
           else{
            return "Không có ảnh";
           }
        //return $this->Getmaanh()+1;
        // return $this->Getmabaiviet()+1;
        
    }
    public function Getmaanh(){
       // return DB::table('hinh_anh_bai_viet')->select('ma_hinh_anh')->orderBy('ma_hinh_anh','desc')->get()->first();
        $ma =  DB::table('hinh_anh_bai_viet')
        ->select('ma_hinh_anh')
        ->orderBy('ma_hinh_anh','desc')
        ->get()
        ->first();
        if($ma==''){
            return '0';
        }
        return $ma->ma_hinh_anh;
    }
    // public function Getmabaiviet(){
    //        return DB::table('bai_viet')->select('ma_bai_viet')->orderBy('ma_bai_viet','desc')->take(1)->get();
    // }
    public function posttepduocnop(Request $rql){
        $tepduocnop = new tep_duoc_nop();
        $tepduocnop->ma_bai_viet    = $rql->ma_bai_viet;
        $tepduocnop->ma_nguoi_nop   = $rql->ma_nguoi_nop; 
        $tepduocnop->ten_tep         = $rql->ten_tep;
        $tepduocnop->trang_thai     = $rql->trang_thai;
        $tepduocnop->save();
        return "Nộp tệp tin thành công"; //$rql->ma_bai_viet.$rql->ma_nguoi_nop.$rql->ma_tep.$rql->trang_thai;

    }

    public function postykienvotebaiviet(Request $rql){
        $ykienvote = new y_kien_binh_chon_bai_viet(); 
        $ykienvote->ma_bai_viet              = $rql->ma_bai_viet;
        $ykienvote->noi_dung_y_kien          = $rql->noi_dung_y_kien;
        $ykienvote->nguoi_tao_y_kien         = $rql->nguoi_tao_y_kien;
        $ykienvote->nguoi_sua                = $rql->nguoi_sua;
        $ykienvote->trang_thai               = $rql->trang_thai;
        $ykienvote->save();
        return "success";
    }
    public function getykienvotebaiviet(Request $rql){
        return DB::table("y_kien_binh_chon_bai_viet")
        ->where([["ma_bai_viet",$rql->ma_bai_viet],["trang_thai","1"]])
        ->get();
    }
    public function postbinhchonykien($rql){
        $nguoichonykien = new   nguoi_chon_y_kien();
        $nguoichonykien->ma_y_kien              = $rql->ma_y_kien; 
        $nguoichonykien->ma_bai_viet            = $rql->ma_bai_viet;
        $nguoichonykien->ma_tai_khoan_chon      = $rql->ma_tai_khoan_chon;
        $nguoichonykien->trang_thai             = $rql->trang_thai;
        $nguoichonykien->save();
    }
    public function themhuyluachonykienbaiviet(Request $rql){
        if($this->kiemtradatontaichua($rql,"0")[0]->soluong>0)
        {
            $this->updateykienbinhchon($rql,"1");
        }
        else
        if($this->kiemtradatontaichua($rql,"1")[0]->soluong>0)
        {
            $this->updateykienbinhchon($rql,"0");
        }
        else
        if($this->kiemtradatontaichua($rql,"0")[0]->soluong==0&&$this->kiemtradatontaichua($rql,"1")[0]->soluong==0)
        {
            $this->postbinhchonykien($rql);
        }
      //  return $this->kiemtradatontaichua($rql,"0")[0]->soluong;

    }
    public function updatebaiviet(Request $rql){
        DB::table("bai_viet")
                ->where("ma_bai_viet",$rql->ma_bai_viet)
                ->update(['trang_thai'=> $rql->trang_thai]);

    }
    public function updatetatcabaiviet(Request $rql){
        DB::table("bai_viet")
                ->where([["ma_chu_bai_viet",$rql->ma_chu_bai_viet],["trang_thai","2"]])
                ->update(['trang_thai'=> $rql->trang_thai]);

    }

    public function GetBaiVietPhanTrang(Request $rql){
          // $path = "?manho"
        $soluongbaivietdalay = $rql->soluongbaivietdalay;
        $soluongbaivietcanlay = $rql->soluongbaivietcanlay;
                $listbaiviet      = DB::table('bai_viet')
                                ->leftJoin('bai_viet_chia_se','bai_viet_chia_se.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
                                ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
                                ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                // ->leftJoin('thumuc_googledrive','bai_viet.ma_nguoi_viet','=','thumuc_googledrive.ma_tai_khoan')
                                // 'thumuc_googledrive.*',
                                ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
                                ->where([["bai_viet.ma_chu_bai_viet",$rql->ma_nhom],["bai_viet.trang_thai","1"]])
                                ->orWhere([["bai_viet_chia_se.ma_nhom_chia_se",$rql->ma_nhom],["bai_viet.trang_thai","1"]])
                                ->orderBy('bai_viet.ma_bai_viet','desc')
                                // ->paginate(5)
                                ->offset($soluongbaivietdalay)
                                ->limit($soluongbaivietcanlay)   
                                ->get();
                                // ->setPath("?ma_nhom=".$rql->ma_nhom);
          return  view("baiviet.hienthibaiviet",["lstbaiviet"=>$listbaiviet]);
    }

    public function GetBaiVietPhanTrangKiemDuyet(Request $rql){
          // $path = "?manho"
        $soluongbaivietdalay = $rql->soluongbaivietkiemduyetdalay;
        $soluongbaivietcanlay = $rql->soluongbaivietkiemduyetcanlay;
                $listbaiviet      = DB::table('bai_viet')
                                
                                ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
                                ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
                                ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
                                ->where([["bai_viet.ma_chu_bai_viet",$rql->ma_nhom],["bai_viet.trang_thai","2"]])
                                
                                ->orderBy('bai_viet.ma_bai_viet','desc')
                                ->offset($soluongbaivietdalay)
                                ->limit($soluongbaivietcanlay)   
                                ->get();
                                // ->setPath("?ma_nhom=".$rql->ma_nhom);
          return  view("baiviet.hienthibaivietkiemduyet",["lstbaiviet"=>$listbaiviet]);
    }

    public function updateykienbinhchon($rql,$trangthai){
        DB::table("nguoi_chon_y_kien")
                ->where([["ma_y_kien",$rql->ma_y_kien],["ma_tai_khoan_chon",$rql->ma_tai_khoan_chon]])
                ->update(['trang_thai'=> $trangthai]);

    }

    public function kiemtradatontaichua($rql,$trangthai){
        return DB::table("nguoi_chon_y_kien")
        ->select(DB::raw("count(*) as soluong"))
        ->where([["ma_y_kien",$rql->ma_y_kien],["ma_tai_khoan_chon",$rql->ma_tai_khoan_chon],["trang_thai",$trangthai]])
        ->get();
    }

    public function getsoluongluachoncuaykien(Request $rql){
         return DB::table("nguoi_chon_y_kien")
        ->select(DB::raw("count(*) as soluong, ma_y_kien"))//,ma_y_kien
        ->where([["ma_y_kien",$rql->ma_y_kien],["trang_thai","1"]])
        ->get();
    }

    public function getkiemtravoteykien(Request $rql){
        return DB::table("nguoi_chon_y_kien")
        ->select(DB::raw("count(*) as soluong, ma_y_kien"))
        ->where([["ma_tai_khoan_chon",$rql->ma_tai_khoan_chon],["ma_bai_viet",$rql->ma_bai_viet]])
        ->get();
    }


    public function getsoluongbaivietcuamotnhom(Request $rql){
        return DB::table('bai_viet')->select(DB::raw('count(*) as soluongbaivietcuanhom'))
        ->where([["ma_chu_bai_viet",$rql->ma_chu_bai_viet],["trang_thai","1"]])->get()[0]->soluongbaivietcuanhom;
    }



}
