(function($) {

	let menuOpen = {right : '0px'};
	let menuClose = {right : '-270'};
	$("#mobile-menu-open").on("click", function() {
		$('.overlay').show();
	    $("#mobile-sidepanel").animate(menuOpen, 500);
	});
	$("#mobile-menu-close").on("click", function() {
		$('.overlay').hide();
	    $("#mobile-sidepanel").animate(menuClose, 500);
	});

})(jQuery);
