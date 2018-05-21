var clicked = false, clickY;
$(document).on({
	'mousemove': function(e) {
		clicked && updateScrollPos(e);
		if(window.getSelection().toString() != "") {
			$('html').css('cursor', 'auto');
		}
	},
	'mousedown': function(e) {
		clicked = true;
		clickY = e.pageY;
		
	},
	'mouseup': function() {
		clicked = false;
		$('html').css('cursor', 'auto');

	}
});

var updateScrollPos = function(e) {
	$('html').css('cursor', 'grabbing');
	$(window).scrollTop($(window).scrollTop() + (clickY - e.pageY));
}
