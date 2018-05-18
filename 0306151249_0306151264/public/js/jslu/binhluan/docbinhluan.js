

// $('textarea').each(function(){
// 	if(this.scrollHeight>15)
// 	{
// 		 // this.setAttribute('style', 'background-color:red');
// 		 $('#div-btn-showcmt-157').css("display","block");
// 		 $('#i-btn-show-allcmt').css("display","block");
// 	}
// })



var dohaidivmot =0;
function showfullcmt(mabinhluan,mabaiviet)
{	
	//doi css nut show
	$('#i-btn-show-allcmt'+mabinhluan).css("color","#c5cfd6");
	//$('#div-id-show-all-cmt-'+mabinhluan).css("","none");
	//$('#div-id-show-all-cmt-'+mabinhluan).off('click');
	

	$('#tare-cmt-'+mabinhluan).each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
})


	
// 	.on('input', function () {
//   this.style.height = 'auto';
//   this.style.height = (this.scrollHeight) + 'px';
// })
//get do dai thay doi cua tara
var dodaithaydoiterea=Math.round( $('#tare-cmt-'+mabinhluan).height()-15);
alert(dodaithaydoiterea);

 	var	dohaidiv1 = $('#dv-div-big-'+mabaiviet).height();
 	var	dohaidiv2 = $('#dv-div-tare-cmt-'+mabinhluan).height();
 	var	dohaidiv3 = $('#div-tare-cmt-'+mabinhluan).height();
alert(dohaidiv1+"-"+dohaidiv2+"-"+dohaidiv3);
  	dohaidiv1 +=dodaithaydoiterea;
  	dohaidiv2 +=dodaithaydoiterea;
  	dohaidiv3 +=dodaithaydoiterea;

  	var	strdohaidiv1 = dohaidiv1 + 'px';
 	var	strdohaidiv2 = dohaidiv2 + 'px'; 	
 	var	strdohaidiv3 = dohaidiv3 + 'px';

 	$('#dv-div-big-'+mabaiviet).height(strdohaidiv1);  //dv-div-big-
	$('#dv-div-tare-cmt-'+mabinhluan).height(strdohaidiv2);    //dv-div-tare-cmt-
	$('#div-tare-cmt-'+mabinhluan).height(strdohaidiv3);     // tare-cmt-

	// gán lại css auto để nó tự nở ra 
	 $('#dv-div-big-'+mabaiviet).css("height","auto");
	// document.getElementById('#div-id-show-all-cmt-'+mabinhluan).disabled = false;

}

