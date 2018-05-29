var link_host = "/DATNHuyLuan/0306151249_0306151264/public";
var link_trangchufull="http://localhost/DATNHuyLuan/0306151249_0306151264/public";
var myregex = {
	'sodienthoai' : '^[0-9]{9,11}$',
	'matkhau'     : '^[a-z0-9_]{6,30}$',
	'ten_taikhoan': '^[a-z0-9_]{6,40}$',
	'tiengviet'   :'^([A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,10}((\\s[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,15})?)+$)'
};

// console.log(myregex['matkhau']);

// 
function getMaChucVuCuaTaiKhoan(mataikhoan,manhom) {
	//var MaChucVu;
	 $.ajax({
        url: link_host+'/ajax/getmachucvutaikhoanne',
        type:'GET',
        data:{
            ma_nhom:manhom,
            ma_tai_khoan:mataikhoan
        }
    }).done(function(data){
    	alert(data[0].ma_chuc_vu+"đây mã tìm được đây");
 	return data[0].ma_chuc_vu;
    })
 //   alert(MaChucVu[0].ma_chuc_vu+"hàm này đây");
   // return MaChucVu;
}

