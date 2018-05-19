$(document).ready(function() {

	// // Open modal
	// $('.modal-open-button').click(function() {
	// 	closeModal($(this).attr('data-modalid'));
	// });
	//
	// // Close modal
	// $('.modal-cancel-button').click(function() {
	// 	closeModal($(this).attr('data-modalid'));
	// });

	$('.group-action-button').click(function() {
		if( $(this).parent().hasClass('js-card-hover') ) {
			$(this).parent().removeClass('js-card-hover');
		} else {
			$(this).parent().addClass('js-card-hover');
		}

		$(this).next().fadeToggle('fast');
	});


	$('#upload-avatar').change(function(event) {
		event.preventDefault();
		$(this).parent('form').submit();
	});

	$('#upload-banner').change(function(event) {
		event.preventDefault();
		$(this).parent('form').submit();
	});

});
