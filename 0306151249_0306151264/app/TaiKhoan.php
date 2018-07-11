<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TaiKhoan extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{

  use Authenticatable;

  protected $table = "tai_khoan";
  protected $primaryKey = "ma_tai_khoan";
  public $incrementing = false;
  const CREATED_AT = 'thoi_gian_tao';
  const UPDATED_AT = 'thoi_gian_sua';

  protected $hidden = [
    'mat_khau', 'remember_token',
  ];

  public function getAuthPassword()
  {
    return $this->mat_khau;
  }

  public function scopeLayMaTaiKhoanDauTien()
  {
    // thêm tiền tố scope để được: TaiKhoan::LayMaTaiKhoanDauTien()
    // link: https://stackoverflow.com/questions/32806287/how-to-call-a-model-function-inside-the-controller-in-laravel-5
    return "TK00000001";
  }

  public function hasManyThuMucThuBai()
  {
    return $this->hasMany('App\ThuMucThuBai', 'nguoi_tao', 'ma_tai_khoan');
  }

  public function hasManyNhom()
  {
    return $this->hasMany('App\nhom_m', 'ma_tai_khoan', 'ma_tai_khoan');
  }

  public function hasManyBaiViet()
  {
    return $this->hasMany('App\bai_viet', 'ma_nguoi_viet', 'ma_tai_khoan');
  }

  public function hasManyBaoCao()
  {
    return $this->hasMany('App\bao_cao_vi_pham', 'nguoi_gui_bao_cao', 'ma_tai_khoan');
  }

  public function hasNguoiDung()
  {
    return $this->hasOne('App\NguoiDung', 'ma_tai_khoan', 'ma_tai_khoan');
  }

  public function hasManyTep()
  {
    return $this->hasMany('App\Tep', 'nguoi_tao', 'ma_tai_khoan');
  }

  public function hasThuMuc()
  {
    return $this->hasOne('App\ThuMucGoogleDrive', 'ma_tai_khoan', 'ma_tai_khoan');
  }

  public function hasManyTaiKhoanBiChan()
  {
    return $this->hasMany('App\TaiKhoanBiChan', 'ma', 'ma_tai_khoan');
  }

  // Lấy dữ liệu từ bảng nguoi_dung thông qua Relationship hasOne ở trên
  // cấu trúc: get + CaiGiDo + Attribute
  // Gọi: Auth::user()->cai_gi_do
  public function getTenAttribute()
  {
    return $this->hasNguoiDung->ten;
  }

  // Lấy họ và tên lót từ bảng người dùng
  public function getHoTenLotAttribute()
  {
    return $this->hasNguoiDung->ho_ten_lot;
  }

  public function getAnhDaiDienAttribute()
  {
    return $this->hasNguoiDung->anh_dai_dien;
    // Phương thức tên getAnhDaiDien thì lúc gọi sẽ là anh_dai_dien
    // Lấy ảnh đại diện. Cách gọi: Auth::user()->anh_dai_dien
  }

  public function getNguoiDungAttribute()
  {
    return DB::table('nguoi_dung')->where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();
  }

  public function getThuMucGoogleDriveAttribute()
  {
    return DB::table('thumuc_googledrive')->where('ma_tai_khoan', Auth::user()->ma_tai_khoan)->first();
  }


}
