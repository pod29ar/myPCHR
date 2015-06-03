$(document).ready(function () {
	"use strict";

	// add data trip for faking things
	var menuHolder = $('.menu-holder');
	menuHolder.on('click', '.mc-order:not(.mc-lightbox)', function (e) {
		var ths = $(this);
		orderData.trip = ths.attr('data-trip');
	});
	// faking things
	menuHolder.on('click', '.pz-edtconf', function (e) {
		e.preventDefault();
		window.location = host + 'my-cart';
		return false;
	});

	// faking things for removal
	menuHolder.on('click', '.mc-remove', function (e) {
		e.preventDefault();
		var ths = $(this),
			trip = ths.attr('data-trip'),
			url = host + 'data/remove_item',
			data = { 'trip' : trip };
		$.post(url, data, function (data) {
			var json = $.parseJSON(data);
			if (json.status === 'success') {
				window.location = host + 'my-cart';
			} else {
				alert(json.status);
			}
		});
		return false;
	});

	// faking things for removal
	menuHolder.on('click', '.cart-remove', function (e) {
		e.preventDefault();
		var ths = $(this),
			trip = ths.attr('data-trip'),
			url = host + 'data/remove_item',
			data = { 'trip' : trip };
		$.post(url, data, function (data) {
			var json = $.parseJSON(data);
			if (json.status === 'success') {
				window.location = host + 'my-cart';
			} else {
				alert(json.status);
			}
		});
		return false;
	});


	// carouseling
	var carParent = $('.scrooge:not(.spec-ops) .row-card');
	if (carParent.length > 0) {
		carParent.carouFredSel({
			items : {
				visible : 4
			},
			scroll : {
				items : 1
			},
			auto : {
				play : false
			},
			prev : {
				button : function () {
					var previous = $(this).parents('.scrooge').children('.scroll-left');
					return previous;
				}
			},
			next : {
				button : function () {
					var next = $(this).parents('.scrooge').children('.scroll-right');
					return next;
				}
			},
			circular : false
		});
	}


	// toggling state
	var toggler = $('.cart-section-head').find('.caret');
	toggler.click(function (e) {
		var ths = $(this),
			target = ths.parent().next(),
			targetHeight = target.outerHeight();
		if (targetHeight > 0) {
			ths.addClass('toggled');
			target.addClass('toggled');
		} else {
			ths.removeClass('toggled');
			target.removeClass('toggled');
		}
		return false;
	});
	// super toggler
	var superToggler = $('.ch-toggler');
	superToggler.click(function (e) {
		var ths = $(this),
			toggleHead = $('.cart-section-head'),
			togglers = toggleHead.find('.caret');
		if (ths.hasClass('toggled')) {
			ths.removeClass('toggled');
			togglers.removeClass('toggled');
			toggleHead.each(function () {
				var togglings = $(this).next();
				togglings.removeClass('toggled');
			});
		} else {
			ths.addClass('toggled');
			togglers.addClass('toggled');
			toggleHead.each(function () {
				var togglings = $(this).next();
				togglings.addClass('toggled');
			});
		}
		return false;
	});


	// checking deals
	var dealer = $('.ch-dto');
	dealer.click(function (e) {
		var view = $('html, body'),
			target = $('#upsells').offset().top - 120;
		view.animate({
			scrollTop: target
		}, 400);
		return false;
	});


	// party popper
	var popper = $('#cart-popper');
	function postRequest(order, name, image) {
		var url = host + 'data/ordered',
			data = {
				'orders' : JSON.stringify(order),
				'flag' : 'alacarte'
			};
		$.post(url, data, function (resp) {
			var json = $.parseJSON(resp),
				specOps = $('.spec-ops');
			if (json.message === 'success!') {
				specOps.show();
			} else {
				alert(json.message);
			}
		});
		popped();
	}
	function popped() {
		$.post(
			host + 'data/popped',
			{ 'flag' : 1 },
			function (resp) {
				var json = $.parseJSON(resp);
				console.log(json);
			}
			);
	}
	if (popper.length > 0 && popperSwitch === 0) {
		popper.foundation('reveal', 'open');
		popper.on('click', '.mc-spc-order', function (e) {
			e.preventDefault();
			var ths = $(this),
				name = ths.attr('data-name'),
				image = ths.attr('data-image'),
				order = {
					name: name,
					price: 3.5,
					quantity: 1,
					size: "",
					total: 3.5,
					type: "beverage"
				};
			postRequest(order, name, image);
			popper.foundation('reveal', 'close');
			return false;
		});
		popper.on('click', '#block-cart', popped);
	}
});