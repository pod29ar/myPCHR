$(document).ready(function () {
	"use strict";

	// INIT THE LIGHTBOX, FILL THE LIGHTBOX WITH CORESPONDING MEAL
	var body = $('body'),
		mealChoice = $('.cart-edit'),
		lightbox = $('#meal-lightbox'),
		lightboxTop = 50,
		wrapper = $('.wrapper'),
		wrapperHeight = wrapper.outerHeight(),
		windowScrollGlobal,
		boxContainer = $('#lbb');

	// freeze/unfreeze the body
	function bodyFreeze(windowScrollGlobal) {
		body.addClass('freeze').css({'top':'-' + windowScrollGlobal + 'px'});
	}
	function bodyUnfreeze(win, windowScrollGlobal) {
		body.removeClass('freeze').css({'top':'auto'});
		win.scrollTop(windowScrollGlobal);
	}
	// get the meal detail
	function getMealDetail(ths) {
		var deals = ths.parent().prev('ul').find('.md-item'),
			dealName = ths.attr('data-name'),
			dealPrice = ths.attr('data-price');
		lightbox.find('.lb-name').text(dealName);
		lightbox.find('.lb-price').html('<span>Total</span>&nbsp;RM' + dealPrice);
		boxContainer.find('.lb-content').not('.lb-preset').remove();
		deals.each(function () {
			var deal = $(this),
				item = deal.attr('data-type'),
				size = deal.attr('data-size'),
				desc = deal.attr('data-desc'),
				amount = deal.attr('data-amount');
			cloningItem(item, size, desc, amount);
		});
	}
	// clone the preset item
	function cloningItem(item, size, desc, amount) {
		var preset = $('.lb-' + item + '.lb-preset'),
			opted = 'all',
			sized = 'all',
			x;
		for (x=0; x<amount; x++) {
			if (desc.length > 0)
				opted = desc;
			if (size.length > 0 )
				sized = size;
			clone = preset.clone();

			title = item + ' ' + (x+1);
			anchor = item + '-' + (x+1);
			// fill the necessary container
			clone.find('.lb-title').text(title);
			clone.attr({'data-anchor': anchor});
			clone.find('.lbp-edit').attr({
				'data-target' : anchor,
				'data-load' : item,
				'data-size' : sized,
				'data-desc' : opted
			});
			clone.find('.lbd-size').text(size);
			// remove the hide property
			clone.removeClass('lb-preset');
			clone.appendTo(boxContainer);
		}
	}
	var clone, title, anchor;

	// set initial meal data
	function initMeal(ths) {
		var name = ths.attr('data-name'),
			price = ths.attr('data-price');
		price = parseFloat(price);
		mealData = {
			'name' : name,
			'total' : price,
			'type' : 'meal',
			'surcharge' : 0.00,
			'items' : []
		};
	}

	// choose a meal
	mealChoice.click(function (e) {
		e.preventDefault();
		var ths= $(this),
			win, windowScroll;
		if ( ! lightbox.hasClass('active')) {
			// define variable
			win = $(window);
			windowScrollGlobal = win.scrollTop();
			// register time
			regTime('meal', 'select deal', '0');
			// activation setup
			lightbox.addClass('active');
			bodyFreeze(windowScrollGlobal);
			// filling the box
			getMealDetail(ths);
			// init meal
			initMeal(ths);
		}
		return false;
	});


	// LOAD THE MENU ACCORDING TO THE SELECTED ITEM
	var levelOne = $('#level-one'),
		levelTwo = $('#level-two');

	function disableFunction(box, data, size, type) {
		var selectSize = box.find('.pz-size'),
			buttonPizza = box.find('.pzq-btn'),
			valueSize, optionSize;
		switch (size) {
			case 'personal':
				valueSize = 'personal - 6"';
				// optionSize = 'Personal - 6"';
				break;
			case 'regular':
				valueSize = 'regular - 9"';
				// optionSize = 'Regular - 9"';
				break;
			case 'large':
				valueSize = 'large - 12"';
				// optionSize = 'Large - 12"';
				break;
			case 'extra large':
				valueSize = 'extra large - 15"';
				// optionSize = 'Extra Large - 15"';
				break;
			default:
				valueSize = '';
				// optionSize = 'None';
		}
		console.log(size);
		buttonPizza.remove();
		selectSize.val(valueSize).trigger('change');
		selectSize.prop('disabled', 'disabled');
	}

	function ajaxingMenu(url, size, type) {
		$.get(url, function (data) {
			var box = levelTwo.find('.lb-boxes');
			// empty box first
			box.empty();
			// add content
			box.append(data);
			disableFunction(box, data, size, type);

			// positioning
			levelTwo.css({'left' : '0'});

			$(document).foundation();
		});
	}

	boxContainer.on('click', '.lbp-edit', function (e) {
		e.preventDefault();
		var ths = $(this),
			type = ths.attr('data-load'),
			size = ths.attr('data-size'),
			desc = ths.attr('data-desc'),
			description = '',
			url, sizex;
		mealIndex = ths.parents('.lb-content').index();
		desc = desc.split(';');
		for (var x=0; x<desc.length; x++) {
			description += desc[x];
			if (x != (desc.length - 1))
				description += '-';
		}
		sizex = size;
		if (size === 'extra large')
			sizex = 'extra-large';
		url = host + 'data/load_menu/' + type + '/' + sizex + '/' + description;
		url = htmlspecialchars(url);
		ajaxingMenu(url, size, type);

		// mark the selected item
		ths.parents('.lb-content').addClass('selected');
		return false;
	});

	// back to selection
	var selectionBack = $('.box-switch');
	function switchBack() {
		// positioning
		levelTwo.css({'left' : '100%'});
	}
	selectionBack.click(function (e) {
		e.preventDefault();
		switchBack();
		return false;
	});


	// ACTION TO TAKE (CANCEL/CONFIRM MEAL)
	var cancelMeal = $('.lb-cancel');
	// canceling meal
	cancelMeal.click(function (e) {
		e.preventDefault();
		var win = $(window);
		bodyUnfreeze(win, windowScrollGlobal);
		lightbox.removeClass('active');
		switchBack();
		return false;
	});
});