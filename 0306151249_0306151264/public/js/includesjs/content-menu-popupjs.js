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
function search_group(){
	alert("hihi");
}

