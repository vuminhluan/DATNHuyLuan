

$('textarea').each(function(){
	if(this.scrollHeight>15)
	{
		 // this.setAttribute('style', 'background-color:red');
		 $('#div-btn-showcmt-157').css("display","block");
		 $('#i-btn-show-allcmt').css("display","block");

	}
})



var dohaidivmot =0;
function showfullcmt()
{	
	//doi css nut show
	$('#i-btn-show-allcmt').css("color","#c5cfd6");
	//$('#div-btn-show-allcmt').prop("disabled", true);
	

	$('.tara-read-cmt').each(function () {
  this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
})
// 	.on('input', function () {
//   this.style.height = 'auto';
//   this.style.height = (this.scrollHeight) + 'px';
// })
//get do dai thay doi cua tara
var dodaithaydoiterea=Math.round( $('#tare-cmt-157').height()-15);
alert(dodaithaydoiterea);

 	var	dohaidiv1 = $('#dv-div-big-tare-cmt-157').height();
 	var	dohaidiv2 = $('#dv-div-tare-cmt-157').height();
 	var	dohaidiv3 = $('#div-tare-cmt-157').height();
alert(dohaidiv1+"-"+dohaidiv2+"-"+dohaidiv3);
  	dohaidiv1 +=dodaithaydoiterea;
  	dohaidiv2 +=dodaithaydoiterea;
  	dohaidiv3 +=dodaithaydoiterea;

  	var	strdohaidiv1 = dohaidiv1 + 'px';
 	var	strdohaidiv2 = dohaidiv2 + 'px'; 	
 	var	strdohaidiv3 = dohaidiv3 + 'px';

 	$('#dv-div-big-tare-cmt-157').height(strdohaidiv1);
	$('#dv-div-tare-cmt-157').height(strdohaidiv2);
	$('#div-tare-cmt-157').height(strdohaidiv3);

}

