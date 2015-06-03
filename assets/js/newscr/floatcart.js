$(document).ready(function () {
	"use strict";
	var win = $(window),
		floatCart      = $('#float-cart'),
		// get float cart prop
		floatCartTop   = 20,
		fauxMetric     = $('#float-meter').offset().left,
		floatCartWidth = floatCart.innerWidth(),
		floatCartRight = fauxMetric,
		topHeight      = floatCart.offset().top + floatCartTop;

	function scrollToFix() {
		// get height
		var	winScroll = win.scrollTop();

		if (winScroll > topHeight) {
			floatCart.css({
				'position' : 'fixed',
				'top'      : floatCartTop,
				'right'    : floatCartRight,
				'width'    : floatCartWidth
			});
		} else {
			floatCart.css({
				'position' : 'relative',
				'top'      : '0px',
				'right'    : '0px'
			});
		}
	}

	function repairCartWidth() {
		var fauxMetric = parseInt($('#float-meter').outerWidth(), 10),
			win          = $(window),
			winWidth     = parseInt(win.outerWidth(), 10),
			winTreshold  = 768,
			// get scroll top
			winScroll    = win.scrollTop();

		if (winWidth >= winTreshold) {
			floatCartWidth = parseInt(fauxMetric / 4, 10);
		} else {
			floatCartWidth = parseInt(fauxMetric * 5 / 12, 10);
		}

		if (winScroll > topHeight) {
			floatCartRight = $('#float-meter').offset().left;
		}

		floatCart.css({
			'width' : floatCartWidth,
			'right' : floatCartRight
		});
	}

	win.scroll(scrollToFix);
	win.resize(function () {
		repairCartWidth();
	});
});