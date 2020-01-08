const resizeContainer = function() {
	const windowWidth = $(window).outerWidth();
	if (windowWidth < 1200) {
		if (windowWidth <= 800) {
			$("#hero-sub-div")
				.removeClass("col-md-6")
				.addClass("col-md-8");
		}
		$(".container")
			.outerWidth(windowWidth - 50)
			.css({ maxWidth: windowWidth - 50 });
	} else {
		$(".container")
			.outerWidth(windowWidth - 260)
			.css({ maxWidth: windowWidth - 260 });
	}
};

window.onload = function() {
	resizeContainer();
};

$(window).resize(function() {
	resizeContainer();
});
