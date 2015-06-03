/**
 * clone the HTML for meal sets
 * from the designated template
 */

// set base url
var helperUrl     = require('../helper/baseurl.js');
var objectChecker = require('../helper/objectChecker.js');
var baseUrl       = helperUrl();


module.exports = function cloneMenuTemplate(data, template, submenu) {
	"use strict";
	var clones = [];
	var menus  = data;
	// loop counters
	var x, y, z;
	// data container
	var currentType = '';
	var menu, menuType;
	// html container
	var cloneCategory, cloned, categoryHeader;

	for (x = 0; x < menus.length; x++) {
		menu     = menus[x];
		menuType = menu.type;
		cloned   = $(template).clone();
		cloned.removeClass('temple').show();

		if (menuType != currentType) {
			// match the type
			currentType = menuType;

			// reinit row
			clones = pushObjectToArray(cloneCategory, clones);
			cloneCategory = $('<div class="row"></div>');

			// create header
			if (menu.hasOwnProperty('type')) {
				categoryHeader = createCategoryHeader(currentType);
				clones.push(categoryHeader);
			}
		}

		// Modify front side of card
		modifyFrontSide(submenu, menu, cloned);

		// Modify back side of card
		modifyBackSide(submenu, menu, cloned);

		// append to the container
		cloneCategory.append(cloned);

		if (x === menus.length - 1)
			clones = pushObjectToArray(cloneCategory, clones);
	}

	return clones;
};

function modifyFrontSide(submenu, menu, cloned) {
	var indicators, x, orderAttribute;

	customPizzaCard(menu.name, cloned);
	cloned.find('.mc-image').attr('src', baseUrl + menu.image);
	cloned.find('.mch-name').html(menu.name);
	cloned.find('.mch-headbutt.front').addClass('has-tip tooltip-bottom').attr({
		'title'        : menu.desc,
		'data-tooltip' : ''
	});

	// modify the indicator
	indicators = cloned.find('.mch-indicator');
	if (menu.hasOwnProperty('indicator') && menu.indicator.length > 0) {
		for (x = 0; x < menu.indicator.length; x++) {
			indicators.find('.mch-temp').clone()
			.removeClass('mch-temp')
			.addClass(menu.indicator[x])
			.appendTo(indicators.children('ul'));
		}
		indicators.find('.mch-temp').remove();

	} else {
		indicators.remove();

	}

	// remove new indicator if item has no new indicator
	if ( ! menu.hasOwnProperty('new'))
		cloned.find('.mc-indicator').remove();

	// modify the click button
	orderAttribute = {
		'data-name' : menu.name,
		'data-type' : submenu
	};
	if (submenu === 'pizza') {
		orderAttribute['data-size']  = menu.size;

	} else {
		orderAttribute['data-price'] = menu.price.normal;
		orderAttribute['data-size']  = (submenu === 'side') ? menu.type : (submenu === 'beverage') ? menu.size : menu.desc;

	}
	cloned.find('.mc-order').attr(orderAttribute);
}

function modifyBackSide(submenu, menu, cloned) {
	var menuAvailable, sizeSelect, sizeOption, available, availableName;

	if (submenu === 'pizza') {
		// modify the size options
		menuAvailable = menu.available.split(' ');
		sizeSelect = cloned.find('.pz-size');
		for (y = 0; y < menuAvailable.length; y++) {
			available = menuAvailable[y];
			availableName = modifySizeInch(available);
			sizeOption = $('<option value="' + available + '" data-price="' + menu.price[available] + '">' + availableName.ucwords() + '</option>');
			sizeSelect.append(sizeOption);
		}

	} else {
		// remove the size and crust for item other than pizza
		cloned.find('#pz-size').remove();
		cloned.find('#pz-crust').remove();
		cloned.find('#pz-customizer').remove();

	}

	// special modification for the half and half pizza
	if (menu.name.toLowerCase() === 'half & half') {
		cloned.find('.pz-topping').html('Customize');
		cloned.find('.pz-review').remove();
		
	}
}

function createCategoryHeader(type) {
	var customClass = '';
	var extraHead = '';
	var header;

	switch (type.toLowerCase()) {
		case 'custom pizza':
			customClass = 'custom-pizza'; break;
		case 'make your own':
			customClass = 'make-own'; break;
		case 'first class':
			extraHead = 'Surcharge for Regular (+RM3.50), Large (+RM5.00), and Extra Large (+RM7.00)'; break;
		default: break;
	}

	header = $('<h5 class="deal-head pizza-deal-title ' + customClass + '"><span>' + type.toUpperCase() + '</span>' + extraHead + '</h5>');
	return header;
}

function customPizzaCard(name, card) {
	var customClass;
	if (name.toLowerCase() === 'half & half')
		customClass = 'custom-pizza';
	else if (name.toLowerCase() ===  'make your own')
		customClass = 'make-own';
	card.addClass(customClass);
}

function modifySizeInch(size) {
	var sizeParse = size.replace('-', ' ');
	var additional;
	switch (sizeParse) {
		case 'personal':    additional = ' - 6&quot;';  break;
		case 'regular':     additional = ' - 9&quot;';  break;
		case 'large':       additional = ' - 12&quot;'; break;
		case 'extra large': additional = ' - 15&quot;'; break;
		default: break;
	}
	return sizeParse + additional;
}

function pushObjectToArray(object, array) {
	if (objectChecker(object))
		array.push(object);
	return array;
}
