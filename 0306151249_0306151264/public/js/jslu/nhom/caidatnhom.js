function showhidediv(iddiv,flag){
    //flag = 1 thì display block
    //flag = 0 thì dispaly inline-block
    if (flag=='1') {
        if($('#'+iddiv).css('display')=='none')
    {
        $('#'+iddiv).css('display','block');
    }
    else{
        $('#'+iddiv).css('display','none');
    }
    }
    else{
        if(flag=='0')
        {
                    if($('#'+iddiv).css('display')=='none')
                    {
                        $('#'+iddiv).css('display','inline-block');
                    }
                    else{
                        $('#'+iddiv).css('display','none');
                    }
        }
    }
    
}


function themcauhoigianhapnhom(){
    var stt= parseInt( $("#ip-hide-sttcauhoigianhap").val())+1;
    $("#ip-hide-sttcauhoigianhap").val(stt);
    var div = document.createElement("div");
    div.style.height="36px";
    div.style.background="white";
    div.style.width="100%";
    div.style.marginBottom="5px";
    div.id="divcauhoigianhapnhom"+stt;

    var divnoidungcauhoi = document.createElement("div");
    divnoidungcauhoi.style.width="85%";
    divnoidungcauhoi.style.float="left";
    divnoidungcauhoi.style.height="36px";
    var x = document.createElement("INPUT");
    x.id="noidungcauhoi"+stt;
    x.style.width="100%";
    x.style.height="36px";
    x.style.border="solid 1px #f9f9f9";
    x.style.borderRight="transparent";
    x.setAttribute("type", "text");
    divnoidungcauhoi.appendChild(x);

    var divtuychon =document.createElement("div");
    divtuychon.style.width="15%";
    divtuychon.style.float="left";
    divtuychon.style.height="36px";
    divtuychon.style.padding="0px";
    divtuychon.style.textAlign="center";
    divtuychon.style.border="solid 1px #f9f9f9";
    divtuychon.style.borderLeft="transparent";
    var spanicone = document.createElement("SPAN");
    spanicone.id="chinhsuacauhoi"+stt;
    spanicone.style.color="#d3dae5";
    spanicone.style.marginTop="4px";
    spanicone.style.marginRight="4px";
    spanicone.className=("fa fa-pencil-square-o fa-2x");

    var spanicons = document.createElement("SPAN");
    spanicons.id="luucauhoi"+stt;
    spanicons.style.color="#d3dae5";
    spanicons.style.marginTop="3px";
    spanicons.style.marginRight="4px";
    spanicons.className=("fa fa-floppy-o fa-2x");

    var spanicond = document.createElement("SPAN");
    id="xoacauhoi"+stt;
    spanicond.style.color="#d3dae5";
    spanicond.style.marginTop="2px";
     spanicond.style.marginRight="4px";
    spanicond.className=("fa fa-times fa-2x");

   // spanicon.addClass("fa-times");
    
    divtuychon.appendChild(spanicone);
    divtuychon.appendChild(spanicons);
    divtuychon.appendChild(spanicond);

    div.appendChild(divnoidungcauhoi);
    div.appendChild(divtuychon);

    document.getElementById("div-cac-cau-hoi").appendChild(div);

}