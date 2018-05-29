<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\thanh_vien_nhom;
use App\thanh_vien_cho_phe_duyet;
use App\NguoiDung;
use App\nhom_m;
use App\chuc_vu_cua_thanh_vien_trong_nhom;


class ThanhVienNhom extends Controller
{
    public function GetNhomTheoMaTaiKhoan(Request $rq)
    {
     $lstNhomCuaTaiKhoan = DB::table("thanh_vien_nhom")->join('nhom','thanh_vien_nhom.ma_nhom','=','nhom.ma_nhom')->select('thanh_vien_nhom.*','nhom.*')->where([["thanh_vien_nhom.ma_tai_khoan",$rq->ma_tai_khoan],["thanh_vien_nhom.trang_thai","1"]])->get();

     $lstNhomQuanLyCuaTaiKhoan = DB::table("thanh_vien_nhom")->join('nhom','thanh_vien_nhom.ma_nhom','=','nhom.ma_nhom')->select('thanh_vien_nhom.*','nhom.*')->where([["thanh_vien_nhom.ma_tai_khoan","=",$rq->ma_tai_khoan],["ma_chuc_vu","=","CV01"],["thanh_vien_nhom.trang_thai","1"]])->get();
        return view("includes.content-menu-popup",["lstnhomcuataikhoan"=>$lstNhomCuaTaiKhoan,"lstNhomQuanLyCuaTaiKhoan"=>$lstNhomQuanLyCuaTaiKhoan]);
    }


    public function GetLstThanhVienTheoMaNhom(Request $rql)
    {
        return DB::table('thanh_vien_nhom')->join('nguoi_dung','thanh_vien_nhom.ma_tai_khoan','=','nguoi_dung.ma_tai_khoan')->select('thanh_vien_nhom.*','nguoi_dung.*')->where([['ma_nhom',$rql->ma_nhom],['thanh_vien_nhom.trang_thai',$rql->trang_thai]])->get();
    }
    public function PostUpdateThanhVienTrongNhom(Request $rql){
      return   DB::table('thanh_vien_nhom')
                                    ->where([['ma_nhom',$rql->ma_nhom],['ma_tai_khoan',$rql->ma_tai_khoan]])
                                    ->update(['trang_thai'=> $rql->trang_thai]);

    }
    public function PostUpdateThanhVienChoPheDuyet(Request $rql){
        DB::table('thanh_vien_cho_phe_duyet')
            ->where([['ma_tai_khoan', $rql->ma_tai_khoan],['ma_nhom',$rql->ma_nhom]])
            ->update(['trang_thai' => $rql->trang_thai,'nguoi_phe_duyet'=>$rql->nguoi_phe_duyet]);
            return "hoàn thành update".$rql->ma_tai_khoan.$rql->ma_nhom.$rql->nguoi_phe_duyet;
    }
    public function PostThemThanhVienVaoNhom(Request $rql){
        $thanhviennhom = new thanh_vien_nhom();
        $thanhviennhom->ma_nhom                         = $rql->ma_nhom;
        $thanhviennhom->ma_tai_khoan                    = $rql->ma_tai_khoan;
        $thanhviennhom->ma_chuc_vu                      = $rql->ma_chuc_vu;
        $thanhviennhom->thoi_gian_vao_nhom              = $rql->thoi_gian_vao_nhom;
        $thanhviennhom->thoi_gian_thoat_nhom            = $rql->thoi_gian_thoat_nhom;
        $thanhviennhom->trang_thai                      = $rql->trang_thai;
        $thanhviennhom->save();
          return "Đã thêm thành công thành viên vào nhóm";
        // return "Đã thêm thành công thành viên vào nhóm".$rql->ma_nhom.$rql->ma_tai_khoan.$rql->ma_chuc_vu.$rql->thoi_gian_vao_nhom.$rql->thoi_gian_thoat_nhom.$rql->trang_thai;
    }
    public function PostChucVuCuaThanhVienVaoNhom(Request $rql){
        $thanhviennhom = new chuc_vu_cua_thanh_vien_trong_nhom();
        $thanhviennhom->ma_nhom                         = $rql->ma_nhom;
        $thanhviennhom->ma_tai_khoan                    = $rql->ma_tai_khoan;
        $thanhviennhom->ma_chuc_vu                      = $rql->ma_chuc_vu;
        $thanhviennhom->trang_thai                      = $rql->trang_thai;
        $thanhviennhom->save();
          return "Đã thêm chức vụ vào nhóm";

    }
    public function GetMaChucVuTaiKhoan(Request $rql){
        return DB::table('chuc_vu_cua_thanh_vien_trong_nhom')->select('chuc_vu_cua_thanh_vien_trong_nhom.*')->where([['ma_tai_khoan',$rql->ma_tai_khoan],['ma_nhom',$rql->ma_nhom],['trang_thai',"1"]])->get();
    }
    public function GetLstNhomMaThanhVienGiaNhap(Request $rql)
    {
            $lstNhomTVdagianhap = DB::table("thanh_vien_nhom")->where("ma_tai_khoan",$rql->ma_tai_khoan)->get();
            return $lstNhomTVdagianhap;
    }
    public function PostThanhVienXinGiaNhapNhom(Request $rql)
    {

            $thanhvienchopheduyet = new thanh_vien_cho_phe_duyet();
            $thanhvienchopheduyet->ma_nhom                  = $rql->ma_nhom;
            $thanhvienchopheduyet->ma_tai_khoan             = $rql->ma_tai_khoan;
            $thanhvienchopheduyet->nguoi_moi                = $rql->nguoi_moi;
            $thanhvienchopheduyet->nguoi_phe_duyet          = $rql->nguoi_phe_duyet;
            $thanhvienchopheduyet->thoi_gian_cho_phe_duyet  = $rql->thoi_gian_cho_phe_duyet;
            $thanhvienchopheduyet->trang_thai               = $rql->trang_thai;
            $thanhvienchopheduyet->save();
            return "Xin gia nhập thành công";
    }
    public function GetLstThanhVienDangChoPheDuyetTheoMaNhom(Request $rql){
            // $lstThanhVienDangChoPheDuyetTheoMaNhom = DB::table("thanh_vien_cho_phe_duyet")


            //                                     ->select("ma_tai_khoan")->where([
            //                                             ["ma_nhom",$rql->ma_nhom],
            //                                             ["trang_thai","1"]
            //                                         ])->get();
            // return $lstThanhVienDangChoPheDuyetTheoMaNhom;
        //////
        //->select("ma_tai_khoan")

        //->where([["ma_nhom",$rql->ma_nhom],["trang_thai","1"]])


          $lstThanhVienDangChoPheDuyetTheoMaNhom = DB::table("thanh_vien_cho_phe_duyet")->join('nguoi_dung','thanh_vien_cho_phe_duyet.ma_tai_khoan','=','nguoi_dung.ma_tai_khoan')->select('thanh_vien_cho_phe_duyet.*','nguoi_dung.*')->where([
                                                        ["ma_nhom",$rql->ma_nhom],
                                                        ["trang_thai","1"]
                                                    ])->get();
            return $lstThanhVienDangChoPheDuyetTheoMaNhom;
    }
    public function GetLstNhomNguoiDungDangXinGiaNhap(Request $rql){
        $lstnhomnguoidungdangxingianhap= DB::table("thanh_vien_cho_phe_duyet")->select("ma_nhom")->where([
                                                                                    ["ma_tai_khoan",$rql->ma_tai_khoan],["trang_thai","1"]
                                                                                                        ])->get();
        return $lstnhomnguoidungdangxingianhap;
    }
}
