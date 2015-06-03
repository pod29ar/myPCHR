$(document).ready(function () {
	"use strict";
	var scroller = $('#scroller'),
		sctarget = $('.sc-link'),
		win = $(window),
		htmlbody = $('html, body'),
		offset = 20,
		topHeight = scroller.offset().top + offset;

	function scrollToFix() {
		var	winScroll = win.scrollTop();

		if (winScroll > topHeight)
			scroller.css({
				'position' : 'fixed',
				'top' : offset
			});
		else
			scroller.css({
				'position' : 'absolute',
				'top' : topHeight
			});
	}

	function autoScroll(target) {
		var item = $(target);
		htmlbody.animate({
			scrollTop: item.offset().top + offset
		}, 500);
	}

	win.scroll(scrollToFix);
	sctarget.click(function (e) {
		e.preventDefault();
		var target = $(this).attr('href');
		autoScroll(target);
		return false;
	});
});