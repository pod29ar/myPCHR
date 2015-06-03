$(document).ready(function () {
	"use strict";

	var pageMenu = $('.page-menu'),
		menuTitle = $('.mh-title'),
		menuTip = $('.alacarte-menu').children('.menu-holder');

	pageMenu.on('click', '.dm-anchor', function (e) {
		e.preventDefault();
		var ths = $(this),
			type = ths.attr('data-type'),
			url = host + 'alacarte/load_menu',
			data;
		type = type.split(' ');
		type = type[0];
		data = {'menu' : type};
		$.post(url, data, function(resp) {
			menuTitle.html('About Our ' + type);
			menuTip.fadeOut('slow', function () {
				$(this).empty();
				menuTip.fadeIn('slow', function () {
					$(this).append(resp);
					$(document).foundation();
				});
			});
			$('.dm-item.active').removeClass('active');
			ths.parent().addClass('active');
		});
		return false;
	});
});