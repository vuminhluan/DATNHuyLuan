// Get the modal
var modal = document.getElementById('div-dynamic-menu');

// Get the button that opens the modal
var btn = document.getElementById("btn-show-dynamic-menu");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


// -----------------
$(document).ready(function() {
	$('.taikhoan-dropdown-content').click(function() {
		$('.taikhoan-dropdown-menu').fadeToggle('fast');
	});
});
// ------------------