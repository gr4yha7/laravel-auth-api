function eHoverEffect(object) {
	object.mousemove(function(e) {
		var offset = object.offset();
		var width = object.outerWidth();
		var height = object.outerHeight();
		var referenceWidth = width / 2;
		var referenceHeight = height / 2;
		var left = e.pageX - offset.left;
		var top = e.pageY - offset.top;
		if (left > referenceWidth) {
			object.css({
				transform:
					"rotateY(" +
					(left - referenceWidth) / 80 +
					"deg) rotateX(" +
					(referenceHeight - top) / 30 +
					"deg) translateX(" +
					left / 50 +
					"px) translateY(" +
					top / 50 +
					"px)",
			});
		} else if (left == referenceWidth) {
			object.css({
				transform:
					"rotateY(" +
					(left - referenceWidth) / 80 +
					"deg) rotateX(" +
					(referenceHeight - top) / 30 +
					"deg) translateX(" +
					left / 50 +
					"px) translateY(" +
					top / 50 +
					"px)",
			});
		} else {
			object.css({
				transform:
					"rotateY(" +
					(left - referenceWidth) / 80 +
					"deg) rotateX(" +
					(referenceHeight - top) / 30 +
					"deg) translateX(" +
					left / 50 +
					"px) translateY(" +
					top / 50 +
					"px)",
			});
		}
	});
	object.mouseleave(function(e) {
		object.css({
			transform:
				"translateX(0px) translateY(0px) rotateY(0deg) rotateZ(0deg) rotateX(0deg)",
		});
	});
}
