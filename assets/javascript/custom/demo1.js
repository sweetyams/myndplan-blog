(function() {
	var triggerBttn = $('.trigger-overlay'),
		overlay = $('div.overlay'),
		closeBttn = $( '.closebtn' ),
		body = $('body');


	function toggleOverlay() {
		if( overlay.hasClass('open') ) {
			overlay.removeClass('open');
			body.removeClass('overlay-open');
		}
		else {
			overlay.addClass('open');
			body.addClass('overlay-open');
		}
	}

	triggerBttn.on( 'click', toggleOverlay );
	closeBttn.on( 'click', toggleOverlay );
})();