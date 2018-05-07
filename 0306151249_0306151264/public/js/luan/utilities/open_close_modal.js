// Open modal by modalid
function openModal(modalId) {
	$('#'+modalId).fadeIn('fast');
}

// Close modal by modalid
function closeModal(modalId) {
	$('#'+modalId).fadeOut('fast');
}

$(document).ready(function() {
	// Open modal
	$('.modal-open-button').click(function() {
		openModal($(this).attr('data-modalid'));
	});

	// Close modal
	$('.modal-cancel-button').click(function() {
		closeModal($(this).attr('data-modalid'));
	});
});
