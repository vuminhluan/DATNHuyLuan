<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNhacNhoViPham;
use App\bao_cao_vi_pham as BaoCao;
use DB;

class BaoCaoController extends Controller
{
  public function getTrangQuanLyBaoCao()
  {
  	$tatca_baocao = BaoCao::orderBy('thoi_gian_gui_bao_cao', 'DESC')->where([['trang_thai', '!=', 0],['ma_loai_bao_cao', 'LBC02']])->with(['belongsToTaiKhoan.hasNguoiDung','belongsToLoaiBaoCao'])->paginate(8);
  	// return $tatca_baocao;
  	return view('admin.baocao.index', ['tatca_baocao' => $tatca_baocao]);
  }

  public function postCapNhat(Request $req)
  {

  	$message = "";
    if($req->task == "report-delete") {
      BaoCao::whereIn('ma_bao_cao', $req->id)->update(['trang_thai'=> 0]);
      $message = "Xóa";
    } else if($req->task == "report-mark-as-seen") {
      BaoCao::whereIn('ma_bao_cao', $req->id)->update(['da_xem'=> 1]);
      $message = "Đánh dấu đã đọc";
    } else if($req->task == "report-mark-as-unread") {
      BaoCao::whereIn('ma_bao_cao', $req->id)->update(['da_xem'=> 0]);
      $message = "Đánh dấu chưa đọc";
    } else {
      abort(404);
    }

  	return redirect()->back()->with('slidemessage', 'Đã '.$message.' những báo cáo được chọn');
  }

  public function getTimKiemTheoTenNguoiGui($keyword)
  {
  	return $keyword;
    $tatca_nhom = Nhom::where('ten_nhom', 'LIKE', '%'.$keyword.'%')->orderBy('thoi_gian_tao', 'desc')->paginate(8);
    return view('admin.nhom.index',['tatca_nhom' => $tatca_nhom]);
  }

  public function getGuiMailNhacNho($user_id, $report_id)
  {
    // return $user_id.'----'.$report_id;
    $target = DB::table('bao_cao_vi_pham AS baocao')
    ->leftjoin('tai_khoan', 'tai_khoan.ma_tai_khoan', '=', 'baocao.ma_doi_tuong_bi_bao_cao')
    ->leftjoin('nguoi_dung', 'nguoi_dung.ma_tai_khoan', '=', 'baocao.ma_doi_tuong_bi_bao_cao')
    ->where([['baocao.ma_bao_cao', $report_id]])
    ->select(
      'tai_khoan.ma_tai_khoan AS target_id',
      'tai_khoan.email AS target_email',
      DB::raw("CONCAT(nguoi_dung.ho_ten_lot,' ', nguoi_dung.ten) AS target_fullname"),
      'baocao.noi_dung_bao_cao AS report_content',
      'baocao.thoi_gian_gui_bao_cao AS created_at'
    )
    ->get();
    Mail::send(new MailNhacNhoViPham($target));
    return $target;
  }

  public function postXemBaoCao(Request $req)
  {
    // $report = BaoCao::find($req->id);
    // // return $report->belongsToTaiKhoan->hasNguoiDung->ho_ten_lot;
    // return $report;

    // return $req->id;
    $report = BaoCao::find($req->id);
    if(!$req->seen) {
      $report->da_xem = "1";
      $report->save();
    }

    $report_obj = DB::table('bao_cao_vi_pham AS Report')
      ->join('loai_bao_cao AS Kind', 'Report.ma_loai_bao_cao', '=', 'Kind.ma_loai_bao_cao')
      ->join('nguoi_dung AS Sender', 'Report.nguoi_gui_bao_cao', '=', 'Sender.ma_tai_khoan')
      ->join('nguoi_dung AS Target', 'Report.ma_doi_tuong_bi_bao_cao', '=', 'Target.ma_tai_khoan')
      ->join('tai_khoan AS SenderAccount', 'SenderAccount.ma_tai_khoan', '=', 'Sender.ma_tai_khoan')
      ->join('tai_khoan AS TargetAccount', 'TargetAccount.ma_tai_khoan', '=', 'Target.ma_tai_khoan')
      ->where([['ma_bao_cao', $req->id], ['Kind.ma_loai_bao_cao', 'LBC02']])
      ->select(
        'Report.ma_bao_cao AS report_id',
        'Report.noi_dung_bao_cao AS report_content',
        'Report.thoi_gian_gui_bao_cao AS report_created_at',
        'Kind.ma_loai_bao_cao AS report_kind_id',
        'Kind.ten_loai_bao_cao AS report_kind',
        'Sender.ma_tai_khoan AS sender_id',
        DB::raw("CONCAT(Sender.ho_ten_lot,' ', Sender.ten) AS sender_fullname"),
        'SenderAccount.ten_tai_khoan AS sender_account',
        'SenderAccount.email AS sender_email',
        'TargetAccount.ten_tai_khoan AS target_account',
        'TargetAccount.email AS target_email',
        
        'Target.ma_tai_khoan AS target_id',
        'Target.ma_tai_khoan AS target_owner',
        DB::raw("CONCAT(Target.ho_ten_lot,' ', Target.ten) AS target_name")
      )->get();


    // if($report->ma_loai_bao_cao == "LBC01") {
    //   // Báo cáo nhóm
    //   $report_obj = $report_obj
    //   ->join('nhom AS Target', 'Report.ma_doi_tuong_bi_bao_cao', '=', 'Target.ma_nhom')
    //   ->where('ma_bao_cao', $req->id)
    //   ->select(
    //     'Report.ma_bao_cao AS report_id',
    //     'Report.noi_dung_bao_cao AS report_content',
    //     'Report.thoi_gian_gui_bao_cao AS report_created_at',
    //     'Kind.ma_loai_bao_cao AS report_kind_id',
    //     'Kind.ten_loai_bao_cao AS report_kind',
    //     'Sender.ma_tai_khoan AS sender_id',
    //     DB::raw("CONCAT(Sender.ho_ten_lot,' ', Sender.ten) AS sender_fullname"),

    //     'Target.ma_nhom AS target_id',
    //     'Target.ma_tai_khoan AS target_owner',
    //     'Target.ten_nhom AS target_name'
    //   );
    // } else if($report->ma_loai_bao_cao == "LBC02") {
    //   // Báo cáo tài khoản
    //   $report_obj = $report_obj
    //   ->join('nguoi_dung AS Target', 'Report.ma_doi_tuong_bi_bao_cao', '=', 'Target.ma_tai_khoan')
    //   ->where('ma_bao_cao', $req->id)
    //   ->select(
    //     'Report.ma_bao_cao AS report_id',
    //     'Report.noi_dung_bao_cao AS report_content',
    //     'Report.thoi_gian_gui_bao_cao AS report_created_at',
    //     'Kind.ma_loai_bao_cao AS report_kind_id',
    //     'Kind.ten_loai_bao_cao AS report_kind',
    //     'Sender.ma_tai_khoan AS sender_id',
    //     DB::raw("CONCAT(Sender.ho_ten_lot,' ', Sender.ten) AS sender_fullname"),
        
    //     'Target.ma_tai_khoan AS target_id',
    //     'Target.ma_tai_khoan AS target_owner',
    //     DB::raw("CONCAT(Target.ho_ten_lot,' ', Target.ten) AS target_name")
    //   );
    // } else if($report->ma_loai_bao_cao == "LBC03") {
    //   $report_obj = $report_obj
    //   ->join('bai_viet AS Target', 'Report.ma_doi_tuong_bi_bao_cao', '=', 'Target.ma_bai_viet')
    //   ->where('ma_bao_cao', $req->id)
    //   ->select(
    //     'Report.ma_bao_cao AS report_id',
    //     'Report.noi_dung_bao_cao AS report_content',
    //     'Report.thoi_gian_gui_bao_cao AS report_created_at',
    //     'Kind.ma_loai_bao_cao AS report_kind_id',
    //     'Kind.ten_loai_bao_cao AS report_kind',
    //     'Sender.ma_tai_khoan AS sender_id',
    //     DB::raw("CONCAT(Sender.ho_ten_lot,' ', Sender.ten) AS sender_fullname"),
        
    //     'Target.ma_bai_viet AS target_id',
    //     'Target.ma_nguoi_viet AS target_owner',
    //     DB::raw("CONCAT('Bài viết #', Target.ma_bai_viet) AS target_name")
    //   );
    // }

    return $report_obj;
  }

}
