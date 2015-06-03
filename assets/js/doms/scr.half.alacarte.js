$(document).ready(function () {
	"use strict";
	var body = $('body'),
		windowScrollGlobal;

	// freeze/unfreeze the body
	function bodyFreeze(windowScrollGlobal) {
		body.addClass('freeze').css({'top':'-' + windowScrollGlobal + 'px'});
	}
	function bodyUnfreeze(win, windowScrollGlobal) {
		body.removeClass('freeze').css({'top':'auto'});
		win.scrollTop(windowScrollGlobal);
	}

	// show the total price
	function showTotal() {
		var totalPrice = orderData.total,
			priceContainer = $('.pz-price');
		priceContainer.text('RM'+totalPrice.toFixed(2));
	}

	// initiating the lightbox
	var menuHolder = $('.menu-holder'),
		halfData = {};

	function initData(ths) {
		var url = host + 'data/load_pizza',
			cont = ths.parents('.menu-holder').find('.half-container');
		$.get(url, function (resp) {
			cont.html(resp);
			$(document).foundation();
			cont.find('.card-holder').hide();
			cont.find('.half-sr').html('RM' + orderData.total);
			$('.filter-item:first-child').trigger('click');
		});
	}

	function initLightbox(ths, size, crust) {
		var halfLightbox = ths.parents('.menu-holder').find('.half-lightbox');
		if (size.length === 0) {
			alert('Select size first!');
		} else if (crust.length === 0) {
			alert('Select a crust first!');
		} else {
			halfData.size = size;
			halfData.crust = crust;
			initData(ths);
			halfLightbox.addClass('active');
		}
	}
	menuHolder.on('click', '.pz-half', function (e) {
		e.preventDefault();
		var ths = $(this),
			parents = ths.parents('.order-form'),
			size = parents.find('.pz-size').val(),
			crust = parents.find('.pz-crust').val(),
			win = $(window);
		windowScrollGlobal = win.scrollTop();
		// freeze body
		bodyFreeze(windowScrollGlobal);
		initLightbox(ths, size, crust);
		return false;
	});

	// order lightbox actions
	function unselect(passObject) {
		var price = passObject.price;
		if (passObject.pon.html() === passObject.name) {
			passObject.pon.html('');
			passObject.pzl.attr('src', '#');
			passObject.this.removeClass('selected');
			passObject.parents.removeClass('selected');
		} else if (passObject.ptn.html() === passObject.name) {
			passObject.ptn.html('');
			passObject.pzr.attr('src', '#');
			passObject.this.removeClass('selected');
			passObject.parents.removeClass('selected');
		} else {
			alert('Error!');
		}

		orderData.price -= price;
	}

	function select(passObject) {
		var price = passObject.price;
		if (passObject.pon.html() === '') {
			passObject.pon.html(passObject.name);
			passObject.pzl.attr('src', passObject.image);
			passObject.this.addClass('selected');
			passObject.parents.addClass('selected');
		} else if (passObject.ptn.html() === '') {
			passObject.ptn.html(passObject.name);
			passObject.pzr.attr('src', passObject.image);
			passObject.this.addClass('selected');
			passObject.parents.addClass('selected');
		} else {
			alert('You have selected two toppings, please unselect one to add new topping');
		}

		orderData.price += price;
	}

	menuHolder.on('click', '.mc-lightbox', function (e) {
		e.preventDefault();
		var ths = $(this),
			parents = ths.parents('.mc-front'),
			name = ths.attr('data-name'),
			price = ths.attr('data-price'),
			image = parents.find('.mc-img-wrapper').children('img').attr('src'),
			pzOneName = $('.pz-one-name'),
			pzLeft = $('.ph-left').children('img'),
			pzTwoName = $('.pz-two-name'),
			pzRight = $('.ph-right').children('img'),
			size = orderData.size,
			passObject;

		price = price.split(' ');
		switch (size) {
			case 'personal':
				price = parseFloat(price[0]);
				break;
			case 'regular':
				price = parseFloat(price[1]);
				break;
			case 'large':
				price = parseFloat(price[2]);
				break;
			case 'extra large':
				price = parseFloat(price[3]);
				break;
			default:
				price = 0.00;
		}

		passObject = {
			'this'    : ths,
			'parents' : parents,
			'name'    : name,
			'price'   : price,
			'image'   : image,
			'pon'     : pzOneName,
			'pzl'     : pzLeft,
			'ptn'     : pzTwoName,
			'pzr'     : pzRight
		};

		// activate not activate
		if (ths.hasClass('selected'))
			unselect(passObject);
		else
			select(passObject);
		orderData.total = orderData.price;
		showTotal();
		return false;
	});

	// reset option
	menuHolder.on('click', '.filter-item', function () {
		var selected = $('.mc-lightbox.selected');
		selected.trigger('click');
	});

	// action on lightbox

	// canceling meal
	var cancelMeal = $('.lb-cancel');
	function revivalPizza() {
		var killTarget = $('.skrw'),
			reviveTarget = $('.mch-item').parents('.card-holder');
		if (killTarget.length > 0)
			killTarget.fadeOut('slow', function () {
				$(this).hide();
			});
		if (reviveTarget.length > 0)
			reviveTarget.fadeIn('slow', function () {
				$(this).show();
			});
	}

	cancelMeal.click(function (e) {
		e.preventDefault();
		var ths = $(this),
			win = $(window),
			halfLightbox = ths.parents('.menu-holder').find('.half-lightbox');
		// revive pizza affected by sauce filtering
		revivalPizza();
		// hide lightbox
		halfLightbox.removeClass('active');
		// unfreeze body
		bodyUnfreeze(win, windowScrollGlobal);
		return false;
	});

	// confirm selection
	var confirmSelect = $('.half-done');

	// multiply quantity
	function multiplyQuantity(ths) {
		var quantity = ths.parents('.pz-review').find('.pzq-number').attr('value'),
			totalPrice = orderData.price;
		totalPrice *= quantity;
		orderData.total = totalPrice;
	}

	// post request
	function postRequest() {
		var url = host + 'data/ordered',
			data = {
				'orders' : JSON.stringify(orderData),
				'flag' : 'alacarte'
			};
		$.post(url, data, function (resp) {
			var json = $.parseJSON(resp);
			if (json.message === 'success!') {
				window.location = host + 'confirmation';
			} else {
				alert(json.message);
			}
		});
	}

	confirmSelect.click(function (e) {
		e.preventDefault();
		var ths = $(this),
			type = ths.attr('data-type');
		multiplyQuantity(ths);
		delete orderData.surcharge;
		orderData.item = type;
		postRequest();
		return false;
	});
});