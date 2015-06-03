$(document).ready(function () {
	"use strict";
	var menuHolder = $('.menu-holder');
	menuHolder.on('click', '.filter-item', function () {
		var ths = $(this),
			type = ths.attr('data-type'),
			currentActive = $('.filter-item.active'),
			killTarget, reviveTarget;

		if (type !== 'all') {
			killTarget = $('.mch-item:not(.' + type + ')').parents('.card-holder');
			reviveTarget = $('.mch-item.' + type).parents('.card-holder');
		} else {
			killTarget = $('.skrw');
			reviveTarget = $('.mch-item').parents('.card-holder');
		}
			
		if (killTarget.length > 0)
			killTarget.fadeOut('slow', function () {
				$(this).hide();
			});
		if (reviveTarget.length > 0)
			reviveTarget.fadeIn('slow', function () {
				$(this).show();
			});

		currentActive.removeClass('active');
		ths.addClass('active');
	});
});