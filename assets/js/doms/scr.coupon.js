$(document).foundation();
$(document).ready(function () {
	"use strict";
	var couponSelect = $('.coupon-select'),
		anchor = $('.cs-anchor'),
		meal;
	couponSelect.change(function () {
		var ths = $(this);
		meal = ths.val();
		anchor.attr('href', host + 'menu/meal/' + meal);
	});
});