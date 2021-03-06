<?php

Route::get("resetallbangne","NhomController\CaiDatNhom@RestaLLTABLE")
->name("restaLLtabLe");

Route::get("mid",function(){

return view("includes.navtop");

});
Route::get("gr/{id}","NhomController\Nhom@loadnhom")
->name('nhom.index')
->middleware('MyNhommidw');
Route::get("gr/{id}/baiviet/{idbv}","NhomController\Nhom@loadnhomvoimotbaiviettheoma")
->name('nhomhienthibaiviet.index')
->middleware('MyNhommidw');
Route::get("bl/{id}","NhomController\Nhom@loadnhomvoimotbaiviettheomabinhluan")
->name('loadnhomvoimotbaiviettheomabinhluan.index')
->middleware('MyNhommidw');
Route::get("blr/{id}","NhomController\Nhom@loadnhomvoimotbaiviettheomabinhluanvarepcmt")
->name('loadnhomvoimotbaiviettheomabinhluanvarepcmt.index')
->middleware('MyNhommidw');
Route::get("baiviet", function(){
	return view("baiviet.hienthibaiviet");
});

Route::get("/ajax/getbaivietphantrangne","BaiVietController\BaiViet@GetBaiVietPhanTrang")
->name("baiviet.trang");
Route::get("/ajax/getbaivietphantrangkiemduyetne","BaiVietController\BaiViet@GetBaiVietPhanTrangKiemDuyet")
->name("baiviet.trangkiemduyet");

Route::get("/ajax/getsoluongbaivietcuamotnhomne",'BaiVietController\BaiViet@getsoluongbaivietcuamotnhom')
->name("getsoluongbaivietcuamotnhom");

Route::post("/ajax/postupdatetatcathanhvientrongnhomne","NhomController\ThanhVienNhom@PostUpdateTatCaThanhVienTrongNhom")
->name("PostUpdateTatCaThanhVienTrongNhom");

Route::post("/ajax/postbaivietne","BaiVietController\BaiViet@Postbaiviet")
->name('postbaiviet');
Route::get('/ajax/getbaiviettheonguoivietvanguoisohuune',"BaiVietController\BaiViet@Getbaiviettheonguoivietvanguoisohuu")->name('getbaiviettheonguoivietvanguoisohuu');
Route::post("/ajax/postbinhluanne","BinhLuanController\BinhLuan@PostBinhLuan")
->name('postbinhluan');
Route::post("/ajax/postbinhluanc2ne","BinhLuanController\BinhLuan@PostBinhLuanC2")
->name('postbinhluanc2');

Route::get("/ajax/getbinhluancap2ne","BinhLuanController\BinhLuan@GetBinhLuanCap2")
->name('getbinhluancap2');
Route::get("/ajax/getmabinhluanne","BinhLuanController\BinhLuan@GetMaBinhLuan")
->name('getmabinhluan');
Route::get("/ajax/getmabinhluancap2ne","BinhLuanController\BinhLuan@GetMaBinhLuanCap2")
->name('getmabinhluancap2');

Route::get("/ajax/getbinhluanmoine","BinhLuanController\BinhLuan@GetBinhLuanMoi")
->name('getbinhluanmoi');
Route::get("/ajax/getbinhluanne","BinhLuanController\BinhLuan@GetBinhLuan")
->name('getbinhluan');
Route::get("/ajax/getbinhluantheomabinhluanne","BinhLuanController\BinhLuan@getbinhluantheomabinhluan")
->name('getbinhluantheomabinhluan');

Route::get("/ajax/getmabaivietne","BaiVietController\BaiViet@GetMaBaiViet")
->name('getmabaiviet');
Route::get("/ajax/getbaivietmoine","BaiVietController\BaiViet@GetBaiVietMoi")
->name('getbaivietmoi');
Route::post("/ajax/posttaonhomne","NhomController\Nhom@posttaonhom")
->name('posttaonhom');

Route::get("/ajax/getmanhomne","NhomController\Nhom@getmanhom")
->name('getmanhom');
Route::get("/ajax/getnhomtheomataikhoanne","NhomController\ThanhVienNhom@GetNhomTheoMaTaiKhoan")
->name('getnhomtheomataikhoan');


Route::post('/ajax/updatebinhluanne',"BinhLuanController\BinhLuan@updatebinhluan")
->name("updatebinhluan");
Route::post('/ajax/updatebinhluancap2n2',"BinhLuanController\BinhLuan@updatebinhluancap2")
->name("updatebinhluancap2");

Route::post('/ajax/postbaocaoviphamne',"BaoCaoController\BaoCao@postbaocaovipham")
->name("postbaocaovipham");

// Route::post("/ajax/postthongbaonhomne","ThongBaoController\ThongBaoNhom@postthongbaonhom")
// ->name("postthongbaonhom");
// Route::get("/ajax/getthongbaonhomne","ThongBaoController\ThongBaoNhom@getthongbaonhom")
// ->name("getthongbaonhom");
// Route::post("/ajax/updatethongbaonhomne","ThongBaoController\ThongBaoNhom@updatethongbaonhom")
// ->name("updatethongbaonhom");
//soluonggetthongbao
Route::post("/ajax/postthongbaone","ThongBaoController\ThongBao@postthongbao")
->name("postthongbao");
Route::get("/ajax/getthongbaone","ThongBaoController\ThongBao@getthongbao")
->name("getthongbao");
Route::get("/ajax/soluonggetthongbaone","ThongBaoController\ThongBao@soluonggetthongbao")
->name("soluonggetthongbao");
Route::post("/ajax/updatethongbaone","ThongBaoController\ThongBao@updatethongbao")
->name("updatethongbao");
Route::get("/ajax/getnguoidocthongbaone","ThongBaoController\ThongBao@getnguoidocthongbao")
->name("getnguoidocthongbao");
Route::post("/ajax/postnguoidocthongbaone","ThongBaoController\ThongBao@postnguoidocthongbao")
->name("postnguoidocthongbao");




Route::get("/ajax/getlsttimkiemnhomne","NhomController\Nhom@gettimkiemnhom")
->name('getlsttimkiemnhom');
Route::post("/ajax/postthanhvienxingianhapnhomne","NhomController\ThanhVienNhom@PostThanhVienXinGiaNhapNhom")
->name('postthanhvienxingianhapnhom');
Route::get("/ajax/getnhommathanhviencone","NhomController\ThanhVienNhom@GetLstNhomMaThanhVienGiaNhap")
->name('getnhommathanhvienco');

Route::post("/ajax/postthemthanhvienvaonhomne","NhomController\ThanhVienNhom@PostThemThanhVienVaoNhom")
->name('postthemthanhvienvaonhom');
Route::get("/ajax/getlstnhomnguoidungdangxingianhapne","NhomController\ThanhVienNhom@GetLstNhomNguoiDungDangXinGiaNhap")
->name('getlstnhomnguoidungdangxingianhap');
Route::get("/ajax/getlstthanhviendangchopheduyettheomanhomne","NhomController\ThanhVienNhom@GetLstThanhVienDangChoPheDuyetTheoMaNhom")
->name('getlstthanhviendangchopheduyettheomanhomne');

Route::post("/ajax/postupdatethanhvienchopheduyetne","NhomController\ThanhVienNhom@PostUpdateThanhVienChoPheDuyet")
->name('postupdatethanhvienchopheduyet');
Route::get("/ajax/getlstthanhvientheomanhomne","NhomController\ThanhVienNhom@GetLstThanhVienTheoMaNhom")
->name('getlstthanhvientheoManhom');

Route::post('/ajax/postupdatethanhvientrongnhomne',"NhomController\ThanhVienNhom@PostUpdateThanhVienTrongNhom")
->name('postupdatethanhvientrongnhom');

Route::get('/ajax/getmachucvutaikhoanne',"NhomController\ThanhVienNhom@GetMaChucVuTaiKhoan")
->name('getmachucvutaikhoan');
Route::post('/ajax/postchucvucuathanhvienvaonhomne',"NhomController\ThanhVienNhom@PostChucVuCuaThanhVienVaoNhom")
->name('postchucvucuathanhvienvaonhom');

Route::post('/ajax/postupdatechucvuthanhvientrongnhomne','NhomController\ThanhVienNhom@PostUpdateChucVuThanhVienTrongNhom')
->name('postupdatechucvuthanhvientrongnhom');
Route::get("/ajax/getviewcaidatnhomne","NhomController\CaiDatNhom@GetViewCaiDatNhom")
->name('getviewcaidatnhom');
Route::post('/ajax/postcaidatnhomne',"NhomController\CaiDatNhom@PostCaiDatNhom")
->name('postcaidatnhom');

Route::post('/ajax/postupdatecaidatnhomne',"NhomController\CaiDatNhom@PostUpdateCaiDatNhom")
->name('postupdatecaidatnhom');
Route::post('/ajax/postcauhoigianhapnhomne',"NhomController\CaiDatNhom@PostCauHoiGiaNhapNhom")
->name('postcauhoigianhapnhom');
Route::get('/ajax/getcauhoigianhapne',"NhomController\CaiDatNhom@GetCauHoiGiaNhap")
->name('getcauhoigianhap');

Route::post('/ajax/postxoacauhoine',"NhomController\CaiDatNhom@PostXoaCauHoi")
->name('postxoacauhoi');
Route::post('/ajax/postluuchinhsuacauhoine',"NhomController\CaiDatNhom@PostLuuChinhSuaCauHoi")
->name('postluuchinhsuacauhoi');
Route::get('/ajax/getcaidatnhomne',"NhomController\CaiDatNhom@GetCaiDatNhom")
->name('getcaidatnhom');

Route::post('/ajax/postcautraloigianhapnhomne',"NhomController\CaiDatNhom@PostCauTraLoiGiaNhapNhom")
->name('postcautraloigianhapnhom');
Route::get('/ajax/getcautraloivacauhoicuanhomtheomathanhvienne',"NhomController\CaiDatNhom@GetCauTraLoiVaCauHoiCuaNhomTheoMaThanhVien")
->name('getcautraloivacauhoicuanhomtheomathanhvien');
Route::get('/ajax/getlsttepduocnoptheomabaivietne',"NhomController\Nhom@getlsttepduocnoptheomabaiviet")
->name('getlsttepduocnoptheomabaiviet');


Route::post('/ajax/postykienvotebaivietne',"BaiVietController\BaiViet@postykienvotebaiviet")
->name("postykienvotebaiviet");

Route::get('/ajax/getykienvotebaivietne',"BaiVietController\BaiViet@getykienvotebaiviet")
->name("getykienvotebaiviet");

Route::get('/ajax/getkiemtravoteykienne',"BaiVietController\BaiViet@getkiemtravoteykien")
->name("getkiemtravoteykien");

Route::post('/ajax/updatebaivietne',"BaiVietController\BaiViet@updatebaiviet")
->name("updatebaiviet");

Route::post('/ajax/updatetatcabaivietne',"BaiVietController\BaiViet@updatetatcabaiviet")
->name("updatetatcabaiviet");


Route::post('/ajax/themhuyluachonykienbaivietne',"BaiVietController\BaiViet@themhuyluachonykienbaiviet")
->name("themhuyluachonykienbaiviet");

Route::get('/ajax/getsoluongluachoncuaykienne',"BaiVietController\BaiViet@getsoluongluachoncuaykien")
->name("getsoluongluachoncuaykien");

Route::post('/ajax/posttepduocnopne',"BaiVietController\BaiViet@posttepduocnop")
->name("posttepduocnop");

Route::post('/uploadanh',"BaiVietController\BaiViet@Postanh")
->name('postanh');

Route::post('/postanhbianhomne',"NhomController\Nhom@Postanhbianhom")
->name("postanhbianhom");

Route::get("taofolderchuatepthubaine","BaiVietController\BaiViet@taofolderchuatepthubai")
->name("taofolderchuatepthubai");
Route::post("/ajax/postbaivietthubaifullne","BaiVietController\BaiViet@POSTBaiVietThuBaiFull")
->name("postbaivietthubaifull");

Route::post("/postfilenopbaithanhvienne","BaiVietController\BaiViet@postfilenopbaithanhvien")
->name("postfilenopbaithanhvien");

Route::post("/sendmesnhom","NhomController\ChatNhomController@postMessagenl")
->name("sendmess.nhom");



Route::post("/ajax/posttknhanthongbaoslne","NhomController\Nhom@posttknhanthongbaosl")
->name('posttknhanthongbaosl');

// Route::get("gettknhanthongbao","ThongBaoController\ThongBao@gettknhanthongbao")->name('gettkknhantb');