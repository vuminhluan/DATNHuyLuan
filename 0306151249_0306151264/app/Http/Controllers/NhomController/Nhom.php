<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\TaiKhoan;
use App\nhom_m;
use App\thanh_vien_nhom;
use App\thanh_vien_cho_phe_duyet;
use App\chuc_vu_cua_thanh_vien_trong_nhom;
use App\chuc_vu_trong_nhom;
use App\cai_dat_nhom;
use App\hinh_anh_bai_viet;
use App\tep_duoc_nop;
use App\ThuMucThuBai;
use App\binh_luan_bai_viet;
use App\binh_luan_cap_2;
use App\bai_viet_chia_se;
use App\nhan_thong_bao;
use App\loai_thong_bao_nhan;
class Nhom extends Controller
{
    public function loadnhom ($idnhom)
    {
        $matk =  Auth::user()->ma_tai_khoan;
        $lstthanhviennhom = DB::table('thanh_vien_nhom')
                                ->join('nguoi_dung','thanh_vien_nhom.ma_tai_khoan','=','nguoi_dung.ma_tai_khoan')
                                ->select('thanh_vien_nhom.*','nguoi_dung.*')
                                ->where([['ma_nhom',$idnhom],['thanh_vien_nhom.trang_thai',"1"]])
                                ->get();
        $caidatnhom       = DB::table('cai_dat_nhom')
                                ->where("ma_nhom",$idnhom)
                                ->get();
        $flagthanhviennhom = false;
        for ($i=0; $i <count($lstthanhviennhom) ; $i++) { 
           if ($lstthanhviennhom[$i]->ma_tai_khoan==$matk) {
                $flagthanhviennhom=true; 
           }
        }



         
         // if ($matk==null) {
         //     return redirect()->route('')
         // }
       // $machucvu = DB::table('thanh_vien_nhom')->select("ma_chuc_vu")->where([["ma_nhom",$idnhom],["ma_tai_khoan",$matk],["trang_thai","1"]
       //                                                                          ])->get();
        $nhanthongbaoftk  = $this->gettknhanthongbao($matk,$idnhom,1);
        $listloaithongbao = $this->getlistloaithongbaonhan();

        $listnhomtkquanly = $this->getlistnhomtkquanly($matk);
                                

        $machucvu         = DB::table('chuc_vu_cua_thanh_vien_trong_nhom')
                                ->join('chuc_vu_trong_nhom','chuc_vu_cua_thanh_vien_trong_nhom.ma_chuc_vu','=','chuc_vu_trong_nhom.ma_chuc_vu')
                                ->select('chuc_vu_cua_thanh_vien_trong_nhom.*','chuc_vu_trong_nhom.*')
                                ->where([['ma_tai_khoan',$matk],['ma_nhom',$idnhom],['chuc_vu_cua_thanh_vien_trong_nhom.trang_thai',"1"]])
                                ->get();
        $nhom             = DB::table('nhom')
                                ->where("ma_nhom","$idnhom")
                                ->get();

        $totalbaiviet =     DB::table('bai_viet')->select(DB::raw('count(*) as soluongbaivietcuanhom'))
                                ->where([["ma_chu_bai_viet",$idnhom],["trang_thai","1"]])
                                ->get()[0]->soluongbaivietcuanhom;
        $listbaiviet      = DB::table('bai_viet')
                                ->leftJoin('bai_viet_chia_se','bai_viet_chia_se.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
                                ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
                                ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                // ->join('tai_khoan','tai_khoan.ma_tai_khoan','=','nguoi_dung.ma_tai_khoan')
                                ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
                                ->where([["bai_viet.ma_chu_bai_viet",$idnhom],["bai_viet.trang_thai","1"]])
                                ->orWhere([["bai_viet_chia_se.ma_nhom_chia_se",$idnhom],["bai_viet.trang_thai","1"]])
                                ->groupBy('bai_viet.ma_bai_viet')
                                ->orderBy('bai_viet.ma_bai_viet','desc')
                                ->take(10)->get();

        if ($caidatnhom[0]->ma_loai_nhom=="LN01") {
            //nhóm công khai
            //ai cũng vào được// người ko trong nhóm ko được đăng
                if ($flagthanhviennhom) {
                           return view("nhom.indexnhom",["t"=>$idnhom,"quyentruycapnhomcuataikhoan"=>$machucvu,"totalbaiviet"=>$totalbaiviet,"lstbaiviet"=>$listbaiviet,"caidatnhom"=>$caidatnhom,"thongtinnhom"=>$nhom,"lstthanhviennhom"=>$lstthanhviennhom,"listnhomtkquanly"=>$listnhomtkquanly,"listloaithongbao"=>$listloaithongbao,"nhanthongbaoftk"=>$nhanthongbaoftk]);
                }else{
                    
                    return view("nhom.indexnhomkhinguoikhongthuocnhom",["t"=>$idnhom,"quyentruycapnhomcuataikhoan"=>$machucvu,"totalbaiviet"=>$totalbaiviet,"lstbaiviet"=>$listbaiviet,"caidatnhom"=>$caidatnhom,"thongtinnhom"=>$nhom,"lstthanhviennhom"=>$lstthanhviennhom,"listnhomtkquanly"=>$listnhomtkquanly]);
                }

        }else
        {
            if ($caidatnhom[0]->ma_loai_nhom=="LN02") {
               //nhóm kín
                //thành viên trong nhóm mới được vào
                if ($flagthanhviennhom) {
                           return view("nhom.indexnhom",["t"=>$idnhom,"quyentruycapnhomcuataikhoan"=>$machucvu,"totalbaiviet"=>$totalbaiviet,"lstbaiviet"=>$listbaiviet,"caidatnhom"=>$caidatnhom,"thongtinnhom"=>$nhom,"lstthanhviennhom"=>$lstthanhviennhom,"listnhomtkquanly"=>$listnhomtkquanly,"listloaithongbao"=>$listloaithongbao,"nhanthongbaoftk"=>$nhanthongbaoftk]);
                }            
                else{
                 return view("nhom.indexnhomkhongco");
            }
            }

        }




    }

    public function getlistloaithongbaonhan()
    {
        return DB::table('loai_thong_bao_nhan')->get();
    }
    public function gettknhanthongbao($matk,$ma_nhom,$trangthai)
    {
        return DB::table('nhan_thong_bao')
        ->join('loai_thong_bao_nhan','loai_thong_bao_nhan.ma_loai_thong_bao_nhan','=',
            'nhan_thong_bao.loai_thong_bao_nhan')
        ->select('loai_thong_bao_nhan.*')
        ->where([['nhan_thong_bao.ma_nhom',$ma_nhom],['nhan_thong_bao.ma_tai_khoan',$matk],['nhan_thong_bao.trang_thai',$trangthai]])
        ->groupBy('nhan_thong_bao.loai_thong_bao_nhan')
        ->get();
    }
    public function gettknhanthongbaomatbmanhom($matk,$ma_nhom,$loai_thong_bao_nhan)
    {
        return DB::table('nhan_thong_bao')->where([['ma_nhom',$ma_nhom],['ma_tai_khoan',$matk],['loai_thong_bao_nhan',$loai_thong_bao_nhan]])->get();
    }
    public function posttknhanthongbaosl(Request $rql)
    {
        if (count($this->gettknhanthongbaomatbmanhom($rql->matk,$rql->ma_nhom,$rql->loai_thong_bao_nhan))==0) {
            $this->updatetknhantbxxx($rql->matk,$rql->ma_nhom,0);
           $this->inserttknhantb($rql->matk,$rql->ma_nhom,$rql->loai_thong_bao_nhan);
        }
        else{
            if   ($this->gettknhanthongbaomatbmanhom($rql->matk,$rql->ma_nhom,$rql->loai_thong_bao_nhan)[0]->trang_thai=='0') {
                $this->updatetknhantbxxx($rql->matk,$rql->ma_nhom,0);
                $this->updatetknhantb($rql->matk,$rql->ma_nhom,$rql->loai_thong_bao_nhan,1);
            }
        }

    } 
    public function updatetknhantb($matk,$ma_nhom,$loaitbnhan,$trang_thai)
    {
                DB::table('nhan_thong_bao')
                ->where([['ma_tai_khoan',$matk],['ma_nhom',$ma_nhom],['loai_thong_bao_nhan',$loaitbnhan]])
                ->update(["trang_thai"=>$trang_thai]);
    }
    public function updatetknhantbxxx($matk,$ma_nhom,$trang_thai)
    {
                DB::table('nhan_thong_bao')
                ->where([['ma_tai_khoan',$matk],['ma_nhom',$ma_nhom]])
                ->update(["trang_thai"=>$trang_thai]);
    }
    public function inserttknhantb($matk,$ma_nhom,$loaitbn)
    {
                $taikhoannhantb = new nhan_thong_bao();
                $taikhoannhantb->ma_nhom    = $ma_nhom;
                $taikhoannhantb->ma_tai_khoan =  $matk;
                $taikhoannhantb->loai_thong_bao_nhan =$loaitbn;
                $taikhoannhantb->trang_thai ="1";
                $taikhoannhantb->save();
    }




    public function getlistquanlycuanhom($idnhom)
    {
        return DB::table('chuc_vu_cua_thanh_vien_trong_nhom')
                ->where([['ma_nhom',$idnhom],['ma_chuc_vu','CV02']])
                ->get();
    }

    public function getlistnhomtkquanly($matk)
    {
        return DB::table('nhom')
                                ->join('chuc_vu_cua_thanh_vien_trong_nhom','chuc_vu_cua_thanh_vien_trong_nhom.ma_nhom','=','nhom.ma_nhom')
                                ->select('nhom.*')
                                ->where([['chuc_vu_cua_thanh_vien_trong_nhom.ma_chuc_vu','CV02'],['chuc_vu_cua_thanh_vien_trong_nhom.ma_tai_khoan',$matk]])
                                ->get();
    }

    // public function getcaidatnhom(Request $rql){
    //   return    DB::table('cai_dat_nhom')
    //                             ->where("ma_nhom",$rql->ma_nhom)
    //                             ->get();
    // }

    public function loadnhomvoimotbaiviettheoma ($idnhom,$mabaiviet)
    {
         $matk =  Auth::user()->ma_tai_khoan;
       // $machucvu = DB::table('thanh_vien_nhom')->select("ma_chuc_vu")->where([["ma_nhom",$idnhom],["ma_tai_khoan",$matk],["trang_thai","1"]
       //                                                                          ])->get();
        $caidatnhom       = DB::table('cai_dat_nhom')
                                ->where("ma_nhom",$idnhom)
                                ->get();
        $machucvu         = DB::table('chuc_vu_cua_thanh_vien_trong_nhom')
                                ->join('chuc_vu_trong_nhom','chuc_vu_cua_thanh_vien_trong_nhom.ma_chuc_vu','=','chuc_vu_trong_nhom.ma_chuc_vu')
                                ->select('chuc_vu_cua_thanh_vien_trong_nhom.*','chuc_vu_trong_nhom.*')
                                ->where([['ma_tai_khoan',$matk],['ma_nhom',$idnhom],['chuc_vu_cua_thanh_vien_trong_nhom.trang_thai',"1"]])
                                ->get();
        $nhom             = DB::table('nhom')
                                ->where("ma_nhom","$idnhom")
                                ->get();
        $lstthanhviennhom = DB::table('thanh_vien_nhom')
                                ->join('nguoi_dung','thanh_vien_nhom.ma_tai_khoan','=','nguoi_dung.ma_tai_khoan')
                                ->select('thanh_vien_nhom.*','nguoi_dung.*')
                                ->where([['ma_nhom',$idnhom],['thanh_vien_nhom.trang_thai',"1"]])
                                ->get();
        $totalbaiviet =     DB::table('bai_viet')->select(DB::raw('count(*) as soluongbaivietcuanhom'))
                                ->where([["ma_chu_bai_viet",$idnhom],["trang_thai","1"]])
                                ->get()[0]->soluongbaivietcuanhom;
        $listbaiviet      = DB::table('bai_viet')
                                ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
                                ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
                                ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
                                ->where([["bai_viet.ma_bai_viet",$mabaiviet],["bai_viet.trang_thai","1"]])
                                ->groupBy('bai_viet.ma_bai_viet')
                                ->orderBy('bai_viet.ma_bai_viet','desc')
                               ->take(1)->get();

        return view("nhom.indexnhomhienthibaiviet",["t"=>$idnhom,"quyentruycapnhomcuataikhoan"=>$machucvu,"totalbaiviet"=>$totalbaiviet,"lstbaiviet"=>$listbaiviet,"caidatnhom"=>$caidatnhom,"thongtinnhom"=>$nhom,"lstthanhviennhom"=>$lstthanhviennhom]);
    }

    public function loadnhomvoimotbaiviettheomabinhluan ($mabinhluan)
    {
         $matk =  Auth::user()->ma_tai_khoan;
       // $machucvu = DB::table('thanh_vien_nhom')->select("ma_chuc_vu")->where([["ma_nhom",$idnhom],["ma_tai_khoan",$matk],["trang_thai","1"]
       //                                                                          ])->get();
        $manhomvamabaiviet = DB::table('binh_luan_bai_viet')
                                ->join('bai_viet','bai_viet.ma_bai_viet','=','binh_luan_bai_viet.ma_bai_viet')
                                ->join('nhom','bai_viet.ma_chu_bai_viet','=','nhom.ma_nhom')
                                ->select('nhom.ma_nhom','bai_viet.ma_bai_viet')
                                ->where('binh_luan_bai_viet.ma_binh_luan',$mabinhluan)
                                ->get()[0];


        $caidatnhom       = DB::table('cai_dat_nhom')
                                ->where("ma_nhom",$manhomvamabaiviet->ma_nhom)
                                ->get();
        $machucvu         = DB::table('chuc_vu_cua_thanh_vien_trong_nhom')
                                ->join('chuc_vu_trong_nhom','chuc_vu_cua_thanh_vien_trong_nhom.ma_chuc_vu','=','chuc_vu_trong_nhom.ma_chuc_vu')
                                ->select('chuc_vu_cua_thanh_vien_trong_nhom.*','chuc_vu_trong_nhom.*')
                                ->where([['ma_tai_khoan',$matk],['ma_nhom',$manhomvamabaiviet->ma_nhom],['chuc_vu_cua_thanh_vien_trong_nhom.trang_thai',"1"]])
                                ->get();
        $nhom             = DB::table('nhom')
                                ->where("ma_nhom",$manhomvamabaiviet->ma_nhom)
                                ->get();
        $lstthanhviennhom = DB::table('thanh_vien_nhom')
                                ->join('nguoi_dung','thanh_vien_nhom.ma_tai_khoan','=','nguoi_dung.ma_tai_khoan')
                                ->select('thanh_vien_nhom.*','nguoi_dung.*')
                                ->where([['ma_nhom',$manhomvamabaiviet->ma_nhom],['thanh_vien_nhom.trang_thai',"1"]])
                                ->get();
        $totalbaiviet =     DB::table('bai_viet')->select(DB::raw('count(*) as soluongbaivietcuanhom'))
                                ->where([["ma_chu_bai_viet",$manhomvamabaiviet->ma_nhom],["trang_thai","1"]])
                                ->get()[0]->soluongbaivietcuanhom;
        $listbaiviet      = DB::table('bai_viet')
                                ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
                                ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
                                ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
                                ->where([["bai_viet.ma_bai_viet",$manhomvamabaiviet->ma_bai_viet],["bai_viet.trang_thai","1"]])
                                ->groupBy('bai_viet.ma_bai_viet')
                                ->orderBy('bai_viet.ma_bai_viet','desc')
                               ->take(1)->get();

        return view("nhom.indexnhomhienthithongbaobinhluanbaivietmoi",["t"=>$manhomvamabaiviet->ma_nhom,"quyentruycapnhomcuataikhoan"=>$machucvu,"totalbaiviet"=>$totalbaiviet,"lstbaiviet"=>$listbaiviet,"caidatnhom"=>$caidatnhom,"thongtinnhom"=>$nhom,"lstthanhviennhom"=>$lstthanhviennhom,"mabinhluan"=>$mabinhluan]);
    }


    public function loadnhomvoimotbaiviettheomabinhluanvarepcmt ($mabinhluan)
    {
         $matk =  Auth::user()->ma_tai_khoan;
       // $machucvu = DB::table('thanh_vien_nhom')->select("ma_chuc_vu")->where([["ma_nhom",$idnhom],["ma_tai_khoan",$matk],["trang_thai","1"]
       //                                                                          ])->get();
        $manhomvamabaiviet = DB::table('binh_luan_bai_viet')
                                ->join('bai_viet','bai_viet.ma_bai_viet','=','binh_luan_bai_viet.ma_bai_viet')
                                ->join('nhom','bai_viet.ma_chu_bai_viet','=','nhom.ma_nhom')
                                ->select('nhom.ma_nhom','bai_viet.ma_bai_viet')
                                ->where('binh_luan_bai_viet.ma_binh_luan',$mabinhluan)
                                ->get()[0];


        $caidatnhom       = DB::table('cai_dat_nhom')
                                ->where("ma_nhom",$manhomvamabaiviet->ma_nhom)
                                ->get();
        $machucvu         = DB::table('chuc_vu_cua_thanh_vien_trong_nhom')
                                ->join('chuc_vu_trong_nhom','chuc_vu_cua_thanh_vien_trong_nhom.ma_chuc_vu','=','chuc_vu_trong_nhom.ma_chuc_vu')
                                ->select('chuc_vu_cua_thanh_vien_trong_nhom.*','chuc_vu_trong_nhom.*')
                                ->where([['ma_tai_khoan',$matk],['ma_nhom',$manhomvamabaiviet->ma_nhom],['chuc_vu_cua_thanh_vien_trong_nhom.trang_thai',"1"]])
                                ->get();
        $nhom             = DB::table('nhom')
                                ->where("ma_nhom",$manhomvamabaiviet->ma_nhom)
                                ->get();
        $lstthanhviennhom = DB::table('thanh_vien_nhom')
                                ->join('nguoi_dung','thanh_vien_nhom.ma_tai_khoan','=','nguoi_dung.ma_tai_khoan')
                                ->select('thanh_vien_nhom.*','nguoi_dung.*')
                                ->where([['ma_nhom',$manhomvamabaiviet->ma_nhom],['thanh_vien_nhom.trang_thai',"1"]])
                                ->get();
        $totalbaiviet =     DB::table('bai_viet')->select(DB::raw('count(*) as soluongbaivietcuanhom'))
                                ->where([["ma_chu_bai_viet",$manhomvamabaiviet->ma_nhom],["trang_thai","1"]])
                                ->get()[0]->soluongbaivietcuanhom;
        $listbaiviet      = DB::table('bai_viet')
                                ->join('nguoi_dung','bai_viet.ma_nguoi_viet','=','nguoi_dung.ma_tai_khoan')
                                ->leftJoin('hinh_anh_bai_viet','bai_viet.ma_bai_viet','=','hinh_anh_bai_viet.ma_bai_viet')
                                ->leftJoin('thumuc_thubai','thumuc_thubai.ma_bai_viet','=','bai_viet.ma_bai_viet')
                                ->select('nguoi_dung.*','bai_viet.*','hinh_anh_bai_viet.*','thumuc_thubai.*','bai_viet.ma_bai_viet')//
                                ->where([["bai_viet.ma_bai_viet",$manhomvamabaiviet->ma_bai_viet],["bai_viet.trang_thai","1"]])
                                ->groupBy('bai_viet.ma_bai_viet')
                                ->orderBy('bai_viet.ma_bai_viet','desc')
                               ->take(1)->get();

        return view("nhom.indexnhomhienthithongbaorepbinhluanbaivietmoi",["t"=>$manhomvamabaiviet->ma_nhom,"quyentruycapnhomcuataikhoan"=>$machucvu,"totalbaiviet"=>$totalbaiviet,"lstbaiviet"=>$listbaiviet,"caidatnhom"=>$caidatnhom,"thongtinnhom"=>$nhom,"lstthanhviennhom"=>$lstthanhviennhom,"mabinhluan"=>$mabinhluan]);
    }








    public function getlsttepduocnoptheomabaiviet(Request $rql){
                 return DB::table('tep_duoc_nop')->select(DB::raw('count(*) as soluong'))->where([["ma_nguoi_nop",$rql->ma_nguoi_nop],["ma_bai_viet",$rql->ma_bai_viet]])->get();
    }

    public function Postanhbianhom(Request $rql){
                
        if ($rql->hasFile('ipanhbianhom')) {
           // return $this->Getmaanh()+1;
            // return "hihi";
            // $mabaiviet = $this->Getmabaiviet()+1;
            // $mahinhanh = $this->Getmaanh()+1;
            //$date=new DateTime(); //this returns the current date time
            $daynow = date("-Y-m-d-h-i-sa");

            $duongdananh= 'img_group/'.$rql->ma_nhom.$rql->nguoi_dang;
            $tenanh = $rql->ma_nhom.$rql->nguoi_dang.$daynow.'.png';
           $rql->file('ipanhbianhom')->move($duongdananh,$tenanh);

           DB::table('nhom')->where('ma_nhom',$rql->ma_nhom)->update(["anh"=>$duongdananh.'/'.$tenanh]);

            // $anhbaiviet->duong_dan_anh= $duongdananh.'/'.$tenanh;

           return "Cập nhật ảnh bìa thành công";
           }else{
            return "Cập nhật ảnh bìa thất bại";
            }
    }

    public function getmanhom(Request $rql)
    {
    	$manhom = DB::table('nhom')->select('ma_nhom')->where('ma_tai_khoan',$rql->ma_tai_khoan)->orderBy('ma_nhom','desc')->get()->first();
    	return $manhom->ma_nhom;
    }
    
    public function gettimkiemnhom(Request $rql)
    {

// DB::table('cai_dat_nhom')
//                                 ->where("ma_nhom",$idnhom)
//                                 ->get();


        $lstnhomtimkiem;
        if ($rql->ten_nhom!="") {
           $lstnhomtimkiem = DB::table('nhom')
                           ->leftJoin('cai_dat_nhom','nhom.ma_nhom','=','cai_dat_nhom.ma_nhom')
                           ->select("nhom.*","cai_dat_nhom.*")
                           ->where("nhom.ma_nhom",$rql->ten_nhom)
                           ->orWhere("nhom.ten_nhom","LIKE","%$rql->ten_nhom%")
                           ->groupBy('nhom.ma_nhom')
                           ->take(3)->get();
        }
        else{
         $lstnhomtimkiem = DB::table('nhom')
                             ->leftJoin('cai_dat_nhom','nhom.ma_nhom','=','cai_dat_nhom.ma_nhom')
                             ->select("nhom.*","cai_dat_nhom.*")         
                             ->where("nhom.ten_nhom","LIKE","%$rql->ten_nhom%")
                             ->orWhere("nhom.ma_nhom",$rql->ten_nhom)
                             ->take(0)
                             ->get();
        }
        return $lstnhomtimkiem;
    }
    public function getnhom(Request $rql)
    {
    	$nhom = DB::table('nhom')->where("ma_nhom",$rql->ma_nhom)->get();
    	return $nhom;
    }

    public function posttaonhom(Request $rql)
    {
        
    	 $nhom = new nhom_m();
    	 // $nhom->ma_nhom						= $rql->ma_nhom;
    	 $nhom->ma_gia_nhap					= $rql->ma_gia_nhap;
    	 $nhom->ten_nhom					= $rql->ten_nhom;
    	 $nhom->anh							= $rql->anh;
    	 $nhom->ma_tai_khoan				= $rql->ma_tai_khoan;
    	 $nhom->ma_loai_nhom				= $rql->ma_loai_nhom;
    	 $nhom->gioi_thieu_nhom				= $rql->gioi_thieu_nhom;
    	 // $nhom->thoi_gian_tham_gia			= $rql->thoi_gian_tham_gia;
    	 // $nhom->thoi_gian_het_han_tham_gia	= $rql->thoi_gian_het_han_tham_gia;
    	 // $nhom->thoi_gian_tao				= $rql->thoi_gian_tao;
    	 // $nhom->thoi_gian_sua				= $rql->thoi_gian_sua;
    	 $nhom->nguoi_sua					= $rql->nguoi_sua;
    	 $nhom->trang_thai  				= $rql->trang_thai;
    	 $nhom->save();
         
    	 return "ok tao thanh cong";
    }

}
