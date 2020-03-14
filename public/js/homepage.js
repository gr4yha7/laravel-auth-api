var count = 1;
$(".hamburger").click(function() {
	count += 1;
	if (count % 2 === 0) {
		$(".drawer").addClass("open");
	} else {
		$(".drawer").removeClass("open");
	}
});

$("#searchTrigger").click(function() {
	$("nav").addClass("showSearch");
});

$("#closeSearch").click(function() {
	$("#mobileSearch").val("");
	$("nav").removeClass("showSearch");
});
