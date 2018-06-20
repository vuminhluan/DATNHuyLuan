<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaiKhoan;
use App\TaiKhoanBiChan;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailThayDoiEmail;
use App\Mail\MailDatLaiMatKhau;
use App\Traits\ChanHoacBoChanMotTaiKhoanTrait;

use App\Traits\XacNhanMatKhauTrait;
use App\Traits\CapNhatDoiTuongTrait;

class CaiDatController extends Controller
{
  use XacNhanMatKhauTrait;
  use CapNhatDoiTuongTrait;
  use ChanHoacBoChanMotTaiKhoanTrait;

  public function getIndex()
  {
  	return view('caidat.index');
  }

  public function postThayDoiTaiKhoan(Request $req)
  {

    // if( !Auth::attempt(['ten_tai_khoan' => Auth::user()->ten_tai_khoan, 'password' => $req->confirm_password]) ) {
    //   return ['errors' => ["confirm_password" => ["Mật khẩu xác nhận không đúng"] ]];
    // }

    // XacNhanMatKhauTrait
    if(! $this->xacNhanMatKhau($req->confirm_password) ) {
      return ['errors' => ["confirm_password" => ["Mật khẩu xác nhận không đúng"] ]];
    }

    $rules    = [];
    $messages = [];
    // Nếu người dùng thay đổi tài khoản và email hiện tại
    //  => Kiểm tra xem tài khoản và email đó đã có người sử dụng chưa
    if(Auth::user()->email != $req->email) {
      $rules['email'] = 'unique:tai_khoan,email';
      $messages['email.unique'] = 'Email đã có người sử dụng';
    }

    if(Auth::user()->ten_tai_khoan != $req->username) {
      $rules['username'] = 'unique:tai_khoan,ten_tai_khoan';
      $messages['username.unique'] = 'Tên tài khoản đã có người sử dụng';
    }

    $validator = Validator::make($req->all(), $rules, $messages);
    if($validator->fails()) {
      return Response()->json(['errors' => $validator->errors()]);
    }

    // Thỏa tất cả điều kiến => cập nhật tài khoản
    $data = [
      "ten_tai_khoan" => $req->username,
      // "email" => $req->email,
      "so_dien_thoai" => $req->phone
    ];

    $taikhoan = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();

    // CapNhatDoiTuongTrait
    $this->capNhatDoiTuong($data, $taikhoan);

    // Muốn đổi email mới thì phải vào email mới và xác nhận
    if($req->email != Auth::user()->email) {
      Mail::send(new MailThayDoiEmail($req->email, Auth::user()->ma_tai_khoan));
      return ['errors' => ["confirm_email" => ["Để cập nhật email bạn cần vào email mới và bấm nút xác nhận"] ]];
    }

    

    return ["success" => "Cập nhật thành công. Chuẩn bị tải lại trang"];

  }

  public function getTrangThayDoiMatKhau()
  {
    return view('caidat.thaydoi_matkhau');
  }

  public function postThayDoiMatKhau(Request $req)
  {
    $taikhoan = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();

    $taikhoan->mat_khau = bcrypt($req['new-password']);
    $taikhoan->save();

    Auth::login($taikhoan);

    return ['success' => 'Chúc mừng ! Bạn đã thay đổi mật khẩu thành công.'];
  }

  // Vô hiệu hóa tài khoàn
  public function getTrangVoHieuHoaTaiKhoan()
  {
    return view('caidat.vohieuhoa_taikhoan');
  }

  public function postVoHieuHoaTaiKhoan(Request $req)
  {

    if(! $this->xacNhanMatKhau($req->confirm_password) ) {
      return ['errors' => "Mật khẩu xác nhận không đúng"];
    }

    $data = [
      "trang_thai" => 4,
      "hoat_dong" => 0
    ];

    $taikhoan = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->where('hoat_dong', 1)->first();

    // CapNhatDoiTuongTrait
    $this->capNhatDoiTuong($data, $taikhoan);
    return ['success' => "Vô hiệu hóa tài khoản thành công"];

  }

  // End Vô hiệu hóa tài khoàn


  


  public function getQuenMatKhau()
  {
    return view('caidat.quen_matkhau');
  }

  public function getKhongPhaiToi()
  {
    Auth::logout();
    return redirect()->back();
  }

  public function postQuenMatKhau(Request $req)
  {

    // note: return $taikhoan->hasNguoiDung->ten;
    $today = date('d-m-Y');
    $expiry_date =  date('d-m-Y', strtotime("+01 days")); // chuỗi date_create($date) return datetime
    // return date_create(date('Y-m-d')) == date_create('2018-05-23') ? 'homnay' : 'sai';

    if(!$req->username) {
      
      $data = [
        'username' => Auth::user()->ten_tai_khoan,
        'id'       => Auth::user()->ma_tai_khoan,
        'email'    => Auth::user()->email,
        'fullname' => Auth::user()->nguoi_dung->ho_ten_lot.' '.Auth::user()->nguoi_dung->ten,
        'today'    => $today
      ];

      Mail::send(new MailDatLaiMatKhau($data));

      return redirect()->back()->with(
        'forget-password-message',
        'Chúng tôi đã gửi một liên kết tới email '.Auth::user()->email.' để giúp bạn đặt lại mật khẩu của mình. Lưu ý, liên kết chỉ có hiệu lực trước 00:00:01 ngày '.$expiry_date
      );

    }

    $taikhoan;
    if( filter_var($req->username, FILTER_VALIDATE_EMAIL)) {
      $taikhoan = TaiKhoan::where('email', $req->username)->first();
    } else {
      $taikhoan = TaiKhoan::where('ten_tai_khoan', $req->username)->first();
    }

    if(!$taikhoan) {
      return redirect()->back()->with(
        'forget-password-message',
        'Tài khoản hoặc email không tồn tại'
      )->withInput();
    }

    //Thỏa điều kiện
    //Gửi mail ở đây
    $data = [
      'username' => $taikhoan->ten_tai_khoan,
      'id'       => $taikhoan->ma_tai_khoan,
      'email'    => $taikhoan->email,
      'fullname' => $taikhoan->hasNguoiDung->ho_ten_lot.' '.$taikhoan->hasNguoiDung->ten,
      'today'    => $today
    ];

    Mail::send(new MailDatLaiMatKhau($data));

    return redirect()->back()->with(
      'forget-password-message',
      'Chúng tôi đã gửi một liên kết tới email '.$taikhoan->email.' để giúp bạn đặt lại mật khẩu của mình. Lưu ý, liên kết chỉ có hiệu lực trước 00:00:01 ngày '.$expiry_date
    );


  }

  public function getDatLaiMatKhau($username, $userid_md5, $today_md5)
  {
    // return "Dat lai mat khau: ".$username." ".$userid_md5." ".$today_md5;

    if(md5(date('d-m-Y').'datlaimatkhau') != $today_md5) {
      return "Liên kết đã hết hiệu lực";
    }

    $taikhoan = TaiKhoan::where('ten_tai_khoan', $username)->first();
    if($taikhoan) {
      if (md5($taikhoan->ma_tai_khoan) == $userid_md5) {
        if(!Auth::check()) Auth::login($taikhoan);
        return view('caidat.datlai_matkhau');
      }
    }

    abort(404);
  }

  public function postDatLaiMatKhau(Request $req)
  {
    $taikhoan = TaiKhoan::where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();
    $taikhoan->mat_khau = bcrypt($req->new_password);
    $taikhoan->save();
    return redirect()->route('caidat.index');
    // Chưa gửi tin nhắn thông báo ->with('message', '');
  }




  // Trang liệt kê danh sách tài khoản bị chặn


  public function getTrangTaiKhoanBiChan()
  {
    // return view('caidat.danhsach_taikhoan_bichan');

    $locked_accounts = DB::table('tai_khoan AS tk_bichan')
      ->join('tai_khoan_bi_chan AS danhsach', 'danhsach.ma_tai_khoan_bi_chan', '=', 'tk_bichan.ma_tai_khoan')
      ->join('nguoi_dung AS nd_bichan', 'nd_bichan.ma_tai_khoan', '=', 'tk_bichan.ma_tai_khoan')
      ->where('danhsach.ma_tai_khoan_chan', '=', Auth::user()->ma_tai_khoan)
      ->where('danhsach.trang_thai', '=', 1)
      ->orderBy('thoi_gian_chan', 'desc')
      ->select(
        'tk_bichan.ma_tai_khoan',
        'tk_bichan.ten_tai_khoan',
        'nd_bichan.anh_dai_dien',
        DB::raw("CONCAT(nd_bichan.ho_ten_lot,' ', nd_bichan.ten) AS hoten_nguoi_bichan")

      )->get();
      

    // return $locked_accounts;
    return view('caidat.danhsach_taikhoan_bichan')->with(['locked_accounts' => $locked_accounts]);
    // return view('admin.gioitinh.index')->with(['tatca_gioitinh'=>$tatca_gioitinh]);
  }


  /*Chan 1 tai khoan*/
  public function getChanMotTaiKhoan($user_id, $username)
  {
    // return $user_id. " ".$username;
    // date_default_timezone_set("Asia/Ho_Chi_Minh");
    // $date = date('Y-m-d h:i:s');

    if($this->chanHoacBoChanMotTaiKhoan($user_id)) {
      $message = "Đã chặn tài khoản @".$username;
    } else {
      $message = "Đã bỏ chặn tài khoản @".$username;
    }
    return $message;

    // $taikhoan_bichan = TaiKhoanBiChan::where('ma_tai_khoan_bi_chan', $user_id)->where('ma_tai_khoan_chan', '=', Auth::user()->ma_tai_khoan)->first();

    // // Nếu tồn tại trong bảng bị chặn => bỏ chặn
    // if($taikhoan_bichan && $taikhoan_bichan->trang_thai == 1) {
    //   $this->getBoChanMotTaiKhoan($taikhoan_bichan);
    //   return "Bạn đã bỏ chặn tài khoản @".$username;
    // }

    // // Chặn tài khoản (insert)
    // $taikhoan_bichan->trang_thai = 1;
    // $taikhoan_bichan->save();

    // return "Bạn đã chặn tài khoản @".$username;
  }

  public function getBoChanMotTaiKhoan($taikhoan_bichan)
  {
    
    // Thay đổi trạng thái
    $taikhoan_bichan->trang_thai = 0;
    $taikhoan_bichan->save();

  }

  // Trang liệt kê danh sách tài khoản bị chặn.

}
