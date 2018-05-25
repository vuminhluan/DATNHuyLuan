function gotogroup($manhom) {
	alert($manhom);
	window.location.href = "http://localhost/DATNHuyLuan/0306151249_0306151264/public/gr/"+$manhom;
}

function opencontent_nhom(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tab-content-nhom");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    // tablinks = document.getElementsByClassName("tablinks");
    // for (i = 0; i < tablinks.length; i++) {
    //     tablinks[i].className = tablinks[i].className.replace(" active", "");
    // }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).style.display = "block";
    // evt.currentTarget.className += " active";
}
function clickxinvaonhom(pr){
    alert(pr.currentTarget.myParam);
    document.getElementById("btnxingianhapnhom"+pr.currentTarget.myParam).innerHTML="Đã xin gia nhập";
}
function search_group(){

	//alert("hihi");
    $.ajax({
        url: link_host+'/ajax/getlsttimkiemnhomne',
        type: 'GET',
        data: {
            ten_nhom: $('#input-search-gr').val()
        }
    }).done(function(data){
        //alert(data[0].ma_nhom);
        var listsearchdiv = document.getElementById('div-ket-qua-tim-kiem');
       // alert(listsearchdiv.childNodes.length);
        // for (var i = 0; i < listsearchdiv.childNodes.length; i++) {
        //     listsearchdiv.removeChild(listsearchdiv.childNodes[i]);
        // }
        while(listsearchdiv.firstChild){
            listsearchdiv.removeChild(listsearchdiv.firstChild);
        }

        for (var i = 0; i < data.length; i++) {
            var divkq = document.createElement("div");
        divkq.style.height= "70px";
        divkq.style.with="100%";
        divkq.style.background ="white";
        divkq.style.color="black";
        divkq.style.borderBottom ="solid 1px #9695d8";
        divkq.innerHTML = data[i].ma_nhom;

        var btnxingianhapnhom = document.createElement("div");
        btnxingianhapnhom.style.height ="29px";
        btnxingianhapnhom.style.with="30px";
        btnxingianhapnhom.style.background="white";
        btnxingianhapnhom.style.color="black";
        btnxingianhapnhom.style.border="solid 1px #9695d8";
        btnxingianhapnhom.innerHTML = '<i class="fa fa-plus-circle" aria-hidden="true"></i> &nbsp; Gia nhập';
        btnxingianhapnhom.style.cursor="pointer";
        btnxingianhapnhom.style.marginTop="0px";
        btnxingianhapnhom.style.marginLeft="315px";
        btnxingianhapnhom.style.borderRadius="3px";
        btnxingianhapnhom.style.paddingLeft="10px";
        btnxingianhapnhom.style.paddingTop="3px";
        btnxingianhapnhom.addEventListener("click",clickxinvaonhom);
        btnxingianhapnhom.myParam=data[i].ma_nhom;
        btnxingianhapnhom.id="btnxingianhapnhom"+data[i].ma_nhom;
        divkq.appendChild(btnxingianhapnhom);








        document.getElementById("div-ket-qua-tim-kiem").appendChild(divkq);
        }
        


       // console.log(Object.values(data));
        // $('#div-ket-qua-tim-kiem').html(data->ma_nhom);
        // alert("lay thanh cong 1");
    })
}

