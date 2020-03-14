function eParallax(selector) {
	var vh = $(window).innerHeight() / 100;
	selector.css({
		"background-position-x": "50%",
		"background-position-y": "50%",
	});
	if (selector.length) {
		$(window).scroll(function() {
			if ($(window).scrollTop() >= selector.offset().top - 100 * vh) {
				var scrollTop = $(window).scrollTop();
				var offset = selector.offset().top - 100 * vh;
				var scrolled = scrollTop - offset;
				var percentage = scrolled * 0.1;
				if (percentage >= 100) {
					selector.css({ "background-position-y": 100 + "%" });
				} else if (percentage <= 0) {
					selector.css({ "background-position-y": 0 + "%" });
				} else {
					selector.css({ "background-position-y": percentage + "%" });
				}
			} else {
				selector.css({ "background-position-y": "50%" });
			}
		});
	}
}
