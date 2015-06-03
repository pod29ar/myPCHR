$(document).ready(function () {
	"use strict";
	var passer = $('.long-pass');
	passer.click(function (e) {
		e.preventDefault();
		var ths = $(this),
			view = $('html, body'),
			target = ths.attr('data-target'),
			destination = $(target).offset().top - 110;
		view.animate({
			scrollTop: destination
		}, 400);
		return false;
	});
});