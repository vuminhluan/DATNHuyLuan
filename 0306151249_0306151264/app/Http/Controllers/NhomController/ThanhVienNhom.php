<?php

namespace App\Http\Controllers\NhomController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\thanh_vien_nhom;
use App\thanh_vien_cho_phe_duyet;


class ThanhVienNhom extends Controller
{
    public function GetNhomTheoMaTaiKhoan(Request $rq)
    {
    	$lstNhomCuaTaiKhoan = DB::table("thanh_vien_nhom")->where("ma_tai_khoan",$rq->ma_tai_khoan)->get();
    	$lstNhomQuanLyCuaTaiKhoan = DB::table("thanh_vien_nhom")->where([
    																		["ma_tai_khoan","=",$rq->ma_tai_khoan],
    																		["ma_chuc_vu","=","CV01"]

    																    ])->get();
    	return view("includes.content-menu-popup",["lstnhomcuataikhoan"=>$lstNhomCuaTaiKhoan,"lstNhomQuanLyCuaTaiKhoan"=>$lstNhomQuanLyCuaTaiKhoan]);
    }

    public function GetLstThanhVienTheoMaNhom()
    {

    }
    public function PostUpdateThanhVienChoPheDuyet(Request $rql){
        DB::table('thanh_vien_cho_phe_duyet')
            ->where([['ma_tai_khoan', $rql->ma_tai_khoan],['ma_nhom',$rql->ma_nhom]])
            ->update(['trang_thai' => "0",'nguoi_phe_duyet'=>$rql->nguoi_phe_duyet]);
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
            $lstThanhVienDangChoPheDuyetTheoMaNhom = DB::table("thanh_vien_cho_phe_duyet")->select("ma_tai_khoan")->where([
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
