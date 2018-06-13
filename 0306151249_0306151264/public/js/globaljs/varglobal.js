var link_host = "/DATNHuyLuan/0306151249_0306151264/public";
var link_trangchufull="http://localhost/DATNHuyLuan/0306151249_0306151264/public";
var myregex = {
	'sodienthoai' : '^[0-9]{9,11}$',
	'matkhau'     : '^[a-z0-9_]{6,30}$',
	'ten_taikhoan': '^[a-z0-9_]{6,40}$',
	'tiengviet'   :'^([A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,10}((\\s[A-Za-zÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚÝàáâãèéêìíòóôõùúýĂăĐđĨĩŨũƠơƯưẠ-ỹ]{1,15})?)+$)'
};


function createboxhoilydotocao(ma_loai_bao_cao,ma_noi_nhan_bao_cao,nguoi_gui_bao_cao,ma_doi_tuong_bi_bao_cao,ma_noi_tiep_nhan_bao_cao){
	var soluongkitutocao = 267;
	var noidung="";
        var divtobig = document.createElement("div");
        	divtobig.className="modal";
        	divtobig.style.display="block";
        	divtobig.id="popupbaocao"+ma_doi_tuong_bi_bao_cao;
        		var divto = document.createElement("div");
        			divto.className="divmainnoidungpopup";
	        		var divtop = document.createElement("div");
	        			divtop.className="toppopuptocao"
	        			//divtop.textContent="Báo cáo";
	        			divtop.innerHTML='<i class="fa fa-flag" aria-hidden="true"></i>&nbsp;Báo cáo';
	        		var divbody = document.createElement("div");
	        			divbody.className="divbodynoidungpopup";
	        			var ipp= document.createElement("TEXTAREA");
	        				ipp.id="textnoidungbaocao"+ma_doi_tuong_bi_bao_cao;
	        				ipp.placeholder ="Nhập vào nội dung báo cáo..."
	        				ipp.style.resize="none";
	        				ipp.className="inputpopuptocao";
	        				ipp.addEventListener("input",function(e){
	        					
	        					var soluongconlai = soluongkitutocao - parseInt($("#textnoidungbaocao"+ma_doi_tuong_bi_bao_cao).val().length);
	        					if(soluongconlai>0){
	        						noidung=$("#textnoidungbaocao"+ma_doi_tuong_bi_bao_cao).val();
	        					}
	        					else{
	        						$("#textnoidungbaocao"+ma_doi_tuong_bi_bao_cao).val(noidung);
	        					}
	        					document.getElementById("spanslkitu"+ma_doi_tuong_bi_bao_cao).textContent=soluongconlai;
	        				})
	        			divbody.appendChild(ipp);
	        		var divbot = document.createElement("div");
	        			divbot.id="guitocaodivbot"+ma_doi_tuong_bi_bao_cao;
	        			divbot.className="divbotpopuptocao";
	        				var spanslkitu = document.createElement("SPAN");
	        					spanslkitu.id= "spanslkitu"+ma_doi_tuong_bi_bao_cao;
	        					spanslkitu.textContent=soluongkitutocao;
	        			//divbot.textContent="169";
	        			divbot.appendChild(spanslkitu);
	        			var btndongy = document.createElement("div");
	        				btndongy.textContent="Gửi"
	        				btndongy.className="btndongypopup";
	        				btndongy.addEventListener("click",function(){
	        					$.ajax({
	        						url:link_host+'/ajax/postbaocaoviphamne',
	        						type:'POST',
	        						data:{
	        							_token: $('input[name=_token]').val(),
	        							ma_loai_bao_cao:ma_loai_bao_cao,	
	        							ma_noi_nhan_bao_cao:ma_noi_nhan_bao_cao,	
	        							nguoi_gui_bao_cao:nguoi_gui_bao_cao,	
	        							noi_dung_bao_cao:$("#textnoidungbaocao"+ma_doi_tuong_bi_bao_cao).val(),
	        							ma_doi_tuong_bi_bao_cao	:ma_doi_tuong_bi_bao_cao,
	        							ma_noi_tiep_nhan_bao_cao:ma_noi_tiep_nhan_bao_cao,
	        							trang_thai:"1"
	        						}
	        					}).done(function(data){
	        						console.log(data);
	        						if(data=="1"){
	        							var e = document.getElementById("popupbaocao"+ma_doi_tuong_bi_bao_cao);
                  							  e.parentNode.removeChild(e);
	        							thongbaopopupy("Thông báo","Báo cáo thành công");
	        						}else{
	        							var e = document.getElementById("popupbaocao"+ma_doi_tuong_bi_bao_cao);
                  							  e.parentNode.removeChild(e);
	        							thongbaopopupy("Thông báo","Bạn đã báo cáo nội dung này");
	        						}
                  							  
	        					})
	        				})
	        			var btnhuybo = document.createElement("div");
	        				btnhuybo.className="btndongypopup";
	        				btnhuybo.textContent="Hủy";
	        				btnhuybo.addEventListener("click",function(){
                  							   var e = document.getElementById("popupbaocao"+ma_doi_tuong_bi_bao_cao);
                  							  e.parentNode.removeChild(e);
	        				})
	        			divbot.appendChild(btndongy);
	        			divbot.appendChild(btnhuybo);
		             divto.appendChild(divtop);
		             divto.appendChild(divbody);
		             divto.appendChild(divbot);
		    divtobig.appendChild(divto);
      document.getElementById("bodymaster").appendChild(divtobig);
}


function thucthifuncysno(prl,namef,noidungcanhbao,textcanhbao){
        var divtobig = document.createElement("div");
            divtobig.className="modal";
            divtobig.style.display="block";
            divtobig.id="popupbaocao";
                var divto = document.createElement("div");
                    divto.className="divmainnoidungpopupys";
                    var divtop = document.createElement("div");
                        divtop.className="toppopuptocaoys";
                        divtop.textContent=noidungcanhbao;

                    var divbody = document.createElement("div");
                        divbody.className="divbodynoidungpopupys";
                        divbody.textContent=textcanhbao;
                    var divbot = document.createElement("div");
                        divbot.className="divbotpopuptocaoys";
                        var btndongy = document.createElement("div");
                            btndongy.textContent="Đồng ý"
                            btndongy.className="btndongypopupys";
                            btndongy.addEventListener("click",function(){
                                  eval(namef+'(prl);');
                               var e = document.getElementById("popupbaocao");
                                   e.parentNode.removeChild(e);
                            })
                        var btnhuybo = document.createElement("div");
                            btnhuybo.className="btnhuypopupys";
                            btnhuybo.textContent="Hủy";
                            btnhuybo.addEventListener("click",function(){
                               var e = document.getElementById("popupbaocao");
                                e.parentNode.removeChild(e);
                            })
                        divbot.appendChild(btndongy);
                        divbot.appendChild(btnhuybo);
                     divto.appendChild(divtop);
                     divto.appendChild(divbody);
                     divto.appendChild(divbot);
            divtobig.appendChild(divto);
      document.getElementById("bodymaster").appendChild(divtobig);
}

//2 biến
function thucthifuncysno2p(prl1,prl2,namef,noidungcanhbao,textcanhbao){
        var divtobig = document.createElement("div");
            divtobig.className="modal";
            divtobig.style.display="block";
            divtobig.id="popupbaocao";
                var divto = document.createElement("div");
                    divto.className="divmainnoidungpopupys";
                    var divtop = document.createElement("div");
                        divtop.className="toppopuptocaoys";
                        divtop.textContent=noidungcanhbao;

                    var divbody = document.createElement("div");
                        divbody.className="divbodynoidungpopupys";
                        divbody.textContent=textcanhbao;
                    var divbot = document.createElement("div");
                        divbot.className="divbotpopuptocaoys";
                        var btndongy = document.createElement("div");
                            btndongy.textContent="Đồng ý"
                            btndongy.className="btndongypopupys";
                            btndongy.addEventListener("click",function(){
                                  eval(namef+'(prl1,prl2);');
                               var e = document.getElementById("popupbaocao");
                                   e.parentNode.removeChild(e);
                            })
                        var btnhuybo = document.createElement("div");
                            btnhuybo.className="btnhuypopupys";
                            btnhuybo.textContent="Hủy";
                            btnhuybo.addEventListener("click",function(){
                               var e = document.getElementById("popupbaocao");
                                e.parentNode.removeChild(e);
                            })
                        divbot.appendChild(btndongy);
                        divbot.appendChild(btnhuybo);
                     divto.appendChild(divtop);
                     divto.appendChild(divbody);
                     divto.appendChild(divbot);
            divtobig.appendChild(divto);
      document.getElementById("bodymaster").appendChild(divtobig);
}


function thongbaopopupy(noidungcanhbao,textcanhbao){
        var divtobig = document.createElement("div");
            divtobig.className="modal";
            divtobig.style.display="block";
            divtobig.id="popupbaocao";
                var divto = document.createElement("div");
                    divto.className="divmainnoidungpopupys";
                    var divtop = document.createElement("div");
                        divtop.className="toppopuptocaoys";
                        divtop.textContent=noidungcanhbao;

                    var divbody = document.createElement("div");
                        divbody.className="divbodynoidungpopupys";
                        divbody.textContent=textcanhbao;
                    var divbot = document.createElement("div");
                        divbot.className="divbotpopuptocaoys";
                        var btndongy = document.createElement("div");
                            btndongy.textContent="Đồng ý"
                            btndongy.className="btndongypopupys";
                            btndongy.addEventListener("click",function(){
                               //   eval(namef+'(prl);');
                               var e = document.getElementById("popupbaocao");
                                   e.parentNode.removeChild(e);
                            })
                        // var btnhuybo = document.createElement("div");
                        //     btnhuybo.className="btnhuypopupys";
                        //     btnhuybo.textContent="Xác nhận";
                        //     btnhuybo.addEventListener("click",function(){
                        //        var e = document.getElementById("popupbaocao");
                        //         e.parentNode.removeChild(e);
                        //     })
                        divbot.appendChild(btndongy);
                        // divbot.appendChild(btnhuybo);
                     divto.appendChild(divtop);
                     divto.appendChild(divbody);
                     divto.appendChild(divbot);
            divtobig.appendChild(divto);
      document.getElementById("bodymaster").appendChild(divtobig);
}

















// console.log(myregex['matkhau']);

// function thongbao(noidung) {
// 	var divbig= document.createElement("div");
// 	divbig.style.width="100%";
// 	divbig.style.height="100%";
// 	divbig.style.position="absolute";
// 	divbig.style.background ="white";
// 	//return divbig;
// 	//var divomhainut= document.createElement("div");
// }

