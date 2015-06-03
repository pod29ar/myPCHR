(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
module.exports = function baseUrl() {
	var url;
	if ( ! window.location.origin)
		window.location.origin = window.location.protocol + "//" + window.location.host;
	url = window.location.origin + '/';
	return url;
};
},{}],2:[function(require,module,exports){
module.exports = function (variable, value) {
	"use strict";
	return typeof variable !== 'undefined' ? variable : value;
};

},{}],3:[function(require,module,exports){
module.exports = function (relativeParent, flipTarget) {
	"use strict";
	// flip object
	relativeParent.on('click', flipTarget, function (e) {
		e.preventDefault();
		var ths = $(this);
		var card = ths.parents('.card-holder');
		var flipped = $('.card-holder.flipped');

		if (card.hasClass('flipped')) {
			card.removeClass('flipped');
		} else {
			flipped.removeClass('flipped');
			card.addClass('flipped');
		}
		return false;
	});
};
},{}],4:[function(require,module,exports){
var value = require('./defaultValue.js');

module.exports = function keyChecker(json, keys, array) {
	"use strict";
	var splitKey, testArray, test, x;
	var newArray = [];
	var newKey   = [];
	json  = value(json, '');
	keys  = value(keys, []);
	array = value(array, []);

	splitKey  = (keys !== '' && typeof keys === 'string') ? splitKey = keys.split('.') : splitKey = keys;
	testArray = (array.length > 0) ? array : splitKey;
	test = testArray[1];

	if (json.hasOwnProperty(test) && ! $.isEmptyObject(json[test])) {
		if (testArray.length === 2) {
			return true;
		} else {
			for (x = 1; x < testArray.length; x++) {
				newKey.push(splitKey[x]);
				newArray.push(testArray[x]);
			}
			return keyChecker(json[test], newKey, newArray);
		}
	} else {
		return false;
	}
};
},{"./defaultValue.js":2}],5:[function(require,module,exports){
module.exports = function checkContainer(object) {
	"use strict";
	return (object instanceof jQuery && object.children().length > 0);
};
},{}],6:[function(require,module,exports){
/**
 * Foundation needs to be reinited when
 * A new element is appended to the view AND it needs Foundation's JavaScript to work
 */

module.exports =  function () {
	$(document).foundation({
		tooltip: {
			disable_for_touch: true
		}
	});
};

},{}],7:[function(require,module,exports){
module.exports = function (string, sub) {
	return string.indexOf(sub) !== -1;
};
},{}],8:[function(require,module,exports){
module.exports = function setUpHeadCarousel() {
	"use strict";
	// set up main sliding carousel
	var mainCarousel = $('#main-cars');
	mainCarousel.carouFredSel({
		items     : 1,
		direction : 'up',
		scroll    : {
			fx      : 'crossfade'
		}
	});

	// set up rotating side carousel
	var sideCarousel = $('#side-cars');
	sideCarousel.carouFredSel({
		items     : 3,
		direction : 'up',
		prev      : {
			button  : $('#cars-prev')
		},
		next      : {
			button  : $('#cars-next')
		}
	});

	// set up flipping board
	var flipBoard = $('.fb-flips'),
		fbOpt     = {
			orientation : 'horizontal',
			autoplay    : true,
			speed       : 1500,
			shadows     : true,
			shadowSides : 1.0
		};
	flipBoard.bookblock(fbOpt);
};
},{}],9:[function(require,module,exports){
// setup required modules
var string           = require('../prototypes/string.js');
var jsonKey          = require('../helper/jsonKeyChecker.js');
var carousel         = require('./carousel.js');
var mealClone        = require('../menu/cloner.meal.js');
var menuClone        = require('../menu/cloner.menu.js');
var topClone         = require('../menu/cloner.topping.js');
var flipper          = require('../helper/flipper.js');
var loadCrust        = require('../menu/card.crust.js');
var ordering         = require('../ordering/ordering.js');
var pageSwitcher     = require('../menu/menu.switcher.js');
var reinitFoundation = require('../helper/reinitFoundation.js');


$(document).ready(function() {
	"use strict";
	// data holder
	var items          = {};
	var orderOptions;
	// html holder
	var mealHolder     = $('#meal-holder');
	var filterHolder   = $('#menu-holder');
	var menuItemHolder = $('#menu-item-holder');
	var editTopHolder  = $('#edit-topping');
	var pageMenu       = $('.page-menu');

	// call the prototype extension of String
	string();
	
	// set up main head carousel
	carousel();

	/**
	 * If JSON is available and not empty
	 * then set up mealset
	 */
	if (jsonKey(bigMenu, 'bigMenu.meals')) // check for valid + not empty json, pass data and the keychain to check
		items.meals     = mealClone(bigMenu.meals,          '#meal-template > .deal');                   // data, template

	if (jsonKey(bigMenu, 'bigMenu.menu.pizza'))
		items.pizza     = menuClone(bigMenu.menu.pizza,     '#menu-item-holder > .temple', 'pizza');     // data, template, submenu

	if (jsonKey(bigMenu, 'bigMenu.menu.side'))
		items.side      = menuClone(bigMenu.menu.side,      '#menu-item-holder > .temple', 'side');      // data, template, submenu

	if (jsonKey(bigMenu, 'bigMenu.menu.beverage'))
		items.beverage  = menuClone(bigMenu.menu.beverage,  '#menu-item-holder > .temple', 'beverage');  // data, template, submenu

	if (jsonKey(bigMenu, 'bigMenu.menu.condiment'))
		items.condiment = menuClone(bigMenu.menu.condiment, '#menu-item-holder > .temple', 'condiment'); // data, template, submenu

	if (jsonKey(bigMenu, 'bigMenu.menu.topping'))
		items.topping   = topClone(bigMenu.menu.topping,    editTopHolder); // data, container

	// plug the variables based on need
	mealHolder.append(items.meals);

	menuItemHolder.append(items.pizza);
	reinitFoundation();

	// setup flipper on card items
	flipper(menuItemHolder, '.mc-toggle');

	// setup loader for crust based on type
	loadCrust(bigMenu.crust, menuItemHolder);

	// setup page switcher
	pageSwitcher(pageMenu, menuItemHolder, items);

	/**
	 * javascript function set
	 * for ordering mechanism
	 */
	// setup options
	orderOptions = {
		'data'         : bigMenu.crust,
		'set'          : 'all', // alacarte, mealset, all
		'filterHolder' : filterHolder,
		'menuHolder'   : menuItemHolder,
		'mealHolder'   : mealHolder
	};
	ordering(orderOptions);
});

},{"../helper/flipper.js":3,"../helper/jsonKeyChecker.js":4,"../helper/reinitFoundation.js":6,"../menu/card.crust.js":10,"../menu/cloner.meal.js":11,"../menu/cloner.menu.js":12,"../menu/cloner.topping.js":13,"../menu/menu.switcher.js":14,"../ordering/ordering.js":25,"../prototypes/string.js":26,"./carousel.js":8}],10:[function(require,module,exports){
var substring = require('../helper/substring.js');

module.exports = function (data, holder) {
	"use strict";
	holder.on('change', '.pz-size', function () {
		var ths = $(this);
		var options = setCrustOptionForSize(data, ths.val());
		var crustParent = ths.closest('.order-form').find('.pz-crust');
		crustParent.html(options);
	});
};

function setCrustOptionForSize(data, size) {
	var x, crust;
	var option = '';
	if (size === '-') {
		option += '<option value="">Select Size First</option>';
		
	} else {
		for (x = 0; x < data.length; x++) {
			crust = data[x];
			if (substring(crust.available, size))
				option += '<option value="' + crust.name + '" data-price="' + crust.price[size] + '">' + crust.name + '</option>';
		}

	}

	return $(option);
}
},{"../helper/substring.js":7}],11:[function(require,module,exports){
/**
 * clone the HTML for meal sets
 * from the designated template
 */

module.exports = function cloneMealTemplate(data, template) {
	"use strict";
	var clones  = [];
	var mealSet = data;
	// loop counter
	var x, y, z;
	// data from JSON object
	var meals, group, item;
	// html containers
	var meal, groupTitle, clonedContainer, cloned, itemContainer, cloneItem;
	// data containers
	var itemType, itemDesc, itemIcon;

	for (x = 0; x < mealSet.length; x++) { // begin level-1 array
		// pull data from JSON object
		meals = mealSet[x].meals;
		group = mealSet[x].group;

		// set group title
		groupTitle = $('<h4 class="deal-head pizza-deal-title"><span>' + group.toUpperCase() + '</span></h4>');
		// push the group title to the return array
		clones.push(groupTitle);

		// cloned mealset
		clonedContainer = $('<div class="row" class="mealer"></div>');
		for (y = 0; y < meals.length; y++) { // begin level-2 array
			meal          = meals[y];
			cloned        = $(template).clone();
			itemContainer = cloned.find('.meal-deal');

			// modify header data attributes and html
			cloned.find('.deal').data('size', meal.size);
			cloned.find('.meal-block').attr({
				'data-name'  : meal.name,
				'data-price' : meal.price
			});
			cloned.find('.meal-name').html(meal.name);

			// cloned item list
			for (z = 0; z < meal.items.length; z++) { // begin level-3 array
				item      = meal.items[z];
				itemType  = item.type;
				itemDesc  = (itemType === 'side') ? itemType : item.size;
				cloneItem = cloned.find('.md-temp').clone();

				// item data attributes
				cloneItem.removeClass('md-temp').attr({
					'data-type'   : itemType,
					'data-size'   : item.size,
					'data-desc'   : item.desc,
					'data-amount' : item.amount
				});

				// set icon
				itemIcon = setItemIcon(itemType, itemDesc);
				cloneItem.find('.mdi').addClass(itemIcon);

				// set description
				cloneItem.find('.md-amount').html(item.amount);
				cloneItem.find('.md-desc').html(itemDesc);

				itemContainer.append(cloneItem);

			} // end level-3 array
			// remove the clone as we don't need it anymore
			itemContainer.find('.md-temp').remove();

			// set footer
			cloned.find('.mf-price').html('<span>just</span> RM' + meal.price);
			cloned.find('.mf-save').html('<span>Save</span> RM'  + meal.save);

			// append the clone to container
			clonedContainer.append(cloned);

		} // end level-2 array

		// push the whole clone list to the return array
		clones.push(clonedContainer);
	} // end level-1 array

	// return the html jquery object array
	return clones;
};

/**
 * set item icon dynamically
 * depends on item's type and desc from the JSON
 */
function setItemIcon(type, desc) {
	var icon;
	if (type === 'pizza') {
		switch (desc) {
			case 'regular':     icon = 'rg'; break;
			case 'large':       icon = 'lg'; break;
			case 'extra large': icon = 'xl'; break;
			default:            icon = 'rg'; break;
		}
	} else if (type === 'side') {
		icon = 'sd';
	} else if (type === 'beverage') {
		icon = 'bv';
	}
	return icon;
}
},{}],12:[function(require,module,exports){
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

},{"../helper/baseurl.js":1,"../helper/objectChecker.js":5}],13:[function(require,module,exports){
var objectChecker = require('../helper/objectChecker.js');

module.exports = function (data, container) {
	"use strict";
	// data holder
	var clones = [];
	var currentType = '';
	var x, topping, toppingName, toppingClass, toppingType;
	// html holder
	var specialTopping = $('#special-topping');
	var normalTopping  = $('#topping-list');
	var clonedCategory = $('<ul class="small-block-grid-4"></ul>');
	var cloned, categoryHead;

	for (x = 0; x < data.length; x++) {
		topping      = data[x];
		toppingName  = topping.name;
		toppingClass = toppingName.toLowerCase().replace(/ /g, '-');
		toppingType  = topping.type;
		cloned       = container.find('.templar').clone().removeClass('templar').css('display', 'block');

		// modify the clone
		cloned.find('label').html(toppingName);
		cloned.find('.et-image').addClass(toppingClass);
		cloned.find('.etc-button-holder').attr({
			'data-name'  : toppingName,
			'data-price' : topping.price
		});

		// create the special first two
		if (x === 2) {
			specialTopping.append(clones);

			// empty the bucket
			clones = [];
		}

		// category header
		if (currentType !== toppingType && x >= 2)
			splitByCategory(toppingType, clones);

		clones.push(cloned);

		if (x === data.length - 1)
			appendTheList(clones);
	}

	/**
	 * NOTE:
	 * these functions are declared here for scope reason
	 * by declaring here, it still has access to the variables above
	 * as well as the passed variables/parameters
	 */
	function splitByCategory(toppingType, copyClones) { // give different name to the clones array for different scoping
		var categoryHead = createCategoryHeader(toppingType);

		// match type
		currentType = toppingType;

		// pass the clones array of this scope
		appendTheList(copyClones);

		// append head
		normalTopping.append(categoryHead);

		// clean bucket
		clones = []; // clean the original clones array
		clonedCategory = $('<ul class="small-block-grid-4"></ul>');
	}

	function appendTheList(passClones) {
		// append the clones to the ul container
		clonedCategory.append(passClones);

		// append the ul and clones to the main div container
		if (objectChecker(clonedCategory))
			normalTopping.append(clonedCategory);
	}
};

function createCategoryHeader(type) {
	var header = $('<h4 class="deal-head"><span>' + type.toUpperCase() + '</span></h4>');
	return header;
}

},{"../helper/objectChecker.js":5}],14:[function(require,module,exports){
var reinitFoundation = require('../helper/reinitFoundation.js');

module.exports = function (holder, itemHolder, items) {
	"use strict";
	var pageTitle   = $('.mh-title');
	var pizzaFilter = $('.pizza-filter');

	holder.on('click', '.dm-plug', function (e) {
		e.preventDefault();
		var ths      = $(this);
		var target   = ths.data('type');
		var switches = contentSwitcher(target, items);

		// activate the tab in page menu
		ths.parent().addClass('active').siblings('.active').removeClass('active');

		/**
		 * unflip the flipped card to avoid problem with the ordering object not refreshed
		 * the object will only be refreshed when the card is changing from unflipped to flipped state
		 */
		$('.card-holder.flipped').removeClass('flipped');

		/**
		 * Begin changing the content
		 */
		pageTitle.text('OUR ' + target);

		/**
		 * Defer the fade in animation to begin only after the fade out completed
		 * this is to let the user know that the page is changing
		 */
		$.when( itemHolder.fadeOut().empty() ) // deferred object
		.then(function () { // callback
			itemHolder.append(switches.item).fadeIn();
			reinitFoundation();
		});
		// determine when to show the pizza filter
		if (switches.flag === 1)
			pizzaFilter.fadeIn();
		else
			pizzaFilter.fadeOut();

		return false;
	});
};

// determine which items to append to the view
function contentSwitcher(target, items) {
	var switches = {};
	switch (target.toLowerCase()) {
		case 'pizza':
			switches.item = items.pizza;
			switches.flag = 1;
			break;
		case 'side order':
			switches.item = items.side;
			switches.flag = 0;
			break;
		case 'beverage':
			switches.item = items.beverage;
			switches.flag = 0;
			break;
		case 'condiment':
			switches.item = items.condiment;
			switches.flag = 0;
			break;
		default:
			switches.item = items.pizza;
			switches.flag = 1;
			break;
	}

	return switches;
}

},{"../helper/reinitFoundation.js":6}],15:[function(require,module,exports){
/**
 * This module will provide the action for the extra cheese button on the card
 * Currently it only adds the surcharge of the extra cheese to price
 * but it doesn't increase the extra cheese in edit topping modal
 */

var getOptionPrice = require('./helper/getOptionPrice.js');
var calculator     = require('./helper/calculator.js');

module.exports = function (holder, singleOrder, surcharge) {
	"use strict";

	// toggler for add cheese
	holder.on('click', '.pz-cheese', function (e) {
		e.preventDefault();
		var ths       = $(this);
		var thsParent = ths.parents('#pz-customizer');
		var size      = thsParent.siblings('#pz-size').find('.pz-size');
		var crust     = thsParent.siblings('#pz-crust').find('.pz-crust');
		var referer   = thsParent.siblings('.pz-review');
		var thsPrice  = 0;

		// Toggler to show to user that the extra cheese has been added
		if (ths.hasClass('disabled')) {
			// remove extra cheese, enable button
			thsPrice -= parseFloat(2);
			ths.removeClass('disabled');

		} else {
			// add extra cheese, disable button
			thsPrice += parseFloat(2);
			ths.addClass('disabled');

		}

		singleOrder.price  = getOptionPrice(crust);
		surcharge.size     = getOptionPrice(size);
		/**
		 * additional surcharge:
		 * if it's still zero, assign immediately
		 * else add the surcharge and price from extra cheese
		 */
		surcharge.addition = (surcharge.addition === 0) ? thsPrice : surcharge.addition + thsPrice;

		// calculate the prices using the calculator helper
		singleOrder = calculator(referer, singleOrder, surcharge);

		return false;
	});
	
	return singleOrder;
};

},{"./helper/calculator.js":21,"./helper/getOptionPrice.js":23}],16:[function(require,module,exports){
var calculator = require('./helper/calculator.js');

module.exports = function (holder, singleOrder, surcharge) {
	"use strict";

	var price   = holder.data('price');
	var referer = holder.parent('.mc-front').next('.mc-back');

	singleOrder.price = price;
	calculator(referer, singleOrder, surcharge);

	return singleOrder;
};

},{"./helper/calculator.js":21}],17:[function(require,module,exports){
/**
 * This module is responsible for calculation on pizza only
 * it listens to change event on pizza size and crust selector
 * then it will calculate the price accordingly
 */

var getOptionPrice = require('./helper/getOptionPrice.js');
var calculator     = require('./helper/calculator.js');

module.exports = function (holder, singleOrder, surcharge) {
	"use strict";

	holder.on('change', '.pz-size, .pz-crust', function () {
		var ths = $(this);
		var size, crust, sizePrice, unitPrice, referer;

		/**
		 * set the price for size and crust
		 * based on the element changed
		 */
		if (ths.hasClass('pz-size')) {
			crust     = ths.parents('#pz-size').siblings('#pz-crust').find('.pz-crust');
			sizePrice = getOptionPrice(ths);
			unitPrice = getOptionPrice(crust);

		} else if (ths.hasClass('pz-crust')) {
			size      = ths.parents('#pz-crust').siblings('#pz-size').find('.pz-size');
			sizePrice = getOptionPrice(size);
			unitPrice = getOptionPrice(ths);

		}

		// assign the prices to the object holder
		surcharge.size    = sizePrice;
		singleOrder.price = unitPrice;

		// set the referer to display the price to user
		referer = ths.parents('.order-form');

		// calculate the prices using the calculator helper
		singleOrder = calculator(referer, singleOrder, surcharge);
	});

	// return the object
	return singleOrder;
};

},{"./helper/calculator.js":21,"./helper/getOptionPrice.js":23}],18:[function(require,module,exports){
/**
 * This module provides the quantity calculator of each item
 * and also the total price of the item by quantity
 */

var getOptionPrice = require('./helper/getOptionPrice.js');
var calculator     = require('./helper/calculator.js');

module.exports = function (holder, singleOrder, surcharge, flag) {
	"use strict";

	holder.on('click', '.pzq-btn', function (e) {
		e.preventDefault();
		var ths       = $(this);
		var action    = ths.data('action');
		var target    = ths.parents('.pz-quantity').find('.pzq-number');
		var referer   = ths.parents('.pz-review');
		// get the item quantity
		var quantity  = updateItemQuantity(action, target);
		// get the total price
		var crust, unitPrice, total;

		if (flag === 'pizza') {
			crust     = referer.siblings('#pz-crust').find('.pz-crust');
			unitPrice = getOptionPrice(crust);
			total     = updateTotalPrice(quantity, unitPrice);

			singleOrder.price = unitPrice;

		} else {
			total = updateTotalPrice(quantity, singleOrder.price);

		}

		// calculate back
		singleOrder.quantity = quantity;
		singleOrder.total    = total;

		// calculate the prices using the calculator helper
		singleOrder = calculator(referer, singleOrder, surcharge);

		return false;
	});

	return singleOrder;
};

// item quantity
function updateItemQuantity(action, target) {
	var quantity = target.val();
	if (action === 'incr')
		++quantity;
	else if (action === 'decr')
		if (quantity > '1') // do not allow the quantity to zero
			--quantity;

	target.val(quantity);
	return quantity;
}

// item base price quantity
function updateTotalPrice(quantity, price) {
	var total = quantity * price;
	return total;
}

},{"./helper/calculator.js":21,"./helper/getOptionPrice.js":23}],19:[function(require,module,exports){
/**
 * This module provides the whole operations inside
 * of edit topping modal
 */

var getOptionPrice = require('./helper/getOptionPrice.js');
var calculator     = require('./helper/calculator.js');
var objectChecker  = require('../helper/objectChecker.js');
var totalTopping   = 0;
var totalPrice     = 0;
var topLimit       = 8; // maximum topping per item

module.exports = function (singleOrder, surcharge) {
	"use strict";
	var body        = $('body');
	var toppingList = $('.ets-topping');
	var warningBox  = $('.et-warning');

	/**
	 * CRUD operation on the topping list
	 * everything inside the callback of the .etc-button click is related to CRUD of the topping list only
	 * it has nothing to do with manipulation of the {singleOrder} object.
	 */
	body.on('click', '.etc-button', function (e) {
		e.preventDefault();
		var ths          = $(this);
		var parent       = ths.parent();
		var name         = parent.data('name');
		var unitPrice    = parseFloat(parent.data('price'));
		var quantity     = updateQuantity(ths, parent, unitPrice);
		var toppingPrice = updatePrice(unitPrice, quantity);
		var target       = toppingList.find('[data-name="' + name + '"]');

		/**
		 * The Tangled if else
		 */
		if (totalTopping <= topLimit) { // top limit is the acceptable amount of toppings for one pizza, depends on business rule
			// hide warning box
			warningBox.hide();

			if (quantity === 0) { // remove topping from list since the quantity has reached 0
				deleteTopping(target);

			} else { // user updated the quantity, take action on the topping list

				// first, check for topping availability in the list
				if (toppingAdded(toppingList, name)) // topping already available, update it
					updateTopping(target, name, unitPrice, quantity, toppingPrice);

				else // topping unavailable, create it
					createTopping(toppingList, name, unitPrice, quantity, toppingPrice);

			}

			/**
			 * don't forget to update the total surcharge price
			 * we will need the total topping price later to return to the order object
			 */
			updateToppingSurcharge();

		} else { // limit reached, show warning
			warningBox.show();
			// decrease the totalTopping for controlling the condition
			totalTopping--;

		}

		return false;
	});

	/**
	 * Passing the topping price to the price object
	 * this callback will manipulate the {singleOrder}
	 * based on the topping list available
	 */
	body.on('click', '.ets-confirm', function (e) {
		e.preventDefault();
		var ths     = $(this);
		var referer = $('.card-holder.flipped');
		var size    = referer.find('#pz-size').find('.pz-size');
		var crust   = referer.find('#pz-crust').find('.pz-crust');

		// get the size and crust prices
		singleOrder.price  = getOptionPrice(crust);
		surcharge.size     = getOptionPrice(size);
		surcharge.addition = totalPrice;

		// calculate the prices using the calculator helper
		singleOrder = calculator(referer, singleOrder, surcharge);

		// pass the list of toppings to the single order object for later use
		singleOrder.additional = passToppingList(toppingList);

		// close the modal
		$('#edit-topping').foundation('reveal', 'close');

		return false;
	});

	return singleOrder;
};

function updateQuantity(trigger, referer, unitPrice) {
	var numberBox = referer.prev().children('.etc-number');
	var number = parseFloat(numberBox.val());
	
	/**
	 * increase or decrease the topping
	 * it affects the totalTopping, which will set the limit of max topping per order
	 * and also the totalPrice, which is calculated by simple addition and reduction
	 */
	if (trigger.hasClass('etc-incr')) { // user click +topping
		++number; // increase item quantity
		++totalTopping; // increase total topping count
		totalPrice += unitPrice; // increase total topping surcharge

	} else { // user click -topping
		if (number > 0) { // item quantity is not zero, do the decrement
			--number; // opposite of the above
			--totalTopping;
			totalPrice -= unitPrice;

		} else { // item quantity is zero, just set to zero and do nothing to avoid setting negative value
			number = 0;

		}
	}

	// control condition for when the top limit is hit
	if (totalTopping > topLimit) {
		totalTopping = topLimit + 1; // set the total topping count to the nearest number of the top limit
		if (trigger.hasClass('etc-incr')) --number; // if the item quantity has been increased, decrease it back
	}

	// assign the number to the display box
	numberBox.val(number);

	// return the number for display in topping list
	return number;
}

function updatePrice(price, quantity) {
	var total = price * quantity;
	return total;
}

// check if topping is already added
function toppingAdded(list, name) {
	var topping = list.find('[data-name="' + name + '"]');
	return objectChecker(topping);
}

function createTopping(holder, name, price, quantity, total) {
	var cloned = $('.top-temple').clone().removeClass('top-temple').css('display', 'block');
	
	// utilize update topping function since they are basically doing the same thing
	updateTopping(cloned, name, price, quantity, total);
	// append to holder
	holder.append(cloned);
}

function updateTopping(target, name, price, quantity, total) {
	// modify the target jquery object to be attached with various values
	target.attr({
		'data-name'   : name,
		'data-amount' : quantity,
	});
	target.find('.topping-name').html(name);
	target.find('.topping-price').html('RM' + total.toFixed(2));
	target.find('.unit-price').html('RM' + price.toFixed(2));
	target.find('.unit-qty').html(quantity);
}

function deleteTopping(target) {
	// remove topping from list
	target.remove();
}

function updateToppingSurcharge() {
	// update the surcharge in the display
	var surchargeHolder = $('.ets-total');
	if (totalPrice < 0) // avoid setting negative value
		totalPrice = 0;
	surchargeHolder.html('RM' + totalPrice.toFixed(2));
}

function passToppingList(list) {
	var additional = [];
	var toppings   = list.children('.top-line:not(.top-temple)');

	// for each topping in the topping list
	toppings.each(function () {
		var ths     = $(this);
		var topping = {};

		/**
		 * Get only the item name and amount. This should be usable for later when the user want to edit the order.
		 * When that happen, you can calculate the prices from the amount and the unit price of the item.
		 * Think of an algorithm for that. Shouldn't be too difficult.
		 * One of the many ways, you can define the quantity to use the amount data.
		 */
		topping.name   = ths.data('name');
		topping.amount = ths.data('amount');
		additional.push(topping);
	});

	// return the array to be attached to object.
	return additional;
}

},{"../helper/objectChecker.js":5,"./helper/calculator.js":21,"./helper/getOptionPrice.js":23}],20:[function(require,module,exports){
var objectChecker = require('../helper/objectChecker.js');

module.exports = function (holder) {
	"use strict";
	var filters = {
		'sauce' : 'all',
		'meat'  : 'all',
	};
	holder.on('click', '.filter-item', function () {
		var ths     = $(this);
		var type    = ths.data('type');
		var filter  = ths.data('filter');
		var current = ths.siblings('.active');
		var off, on;

		// manipulate the filters
		filters[filter] = type;

		// filter the cards based on the filters
		filterCards(filters);

		current.removeClass('active');
		ths.addClass('active');
	});
};

function filterCards(filters) {
	var sauce = filters.sauce;
	var meat  = filters.meat;
	var pre, on, off;

	off = $('.mch-item').parents('.card-holder');
	if (sauce === 'all' && meat === 'all')
		pre = $('.mch-item');
	else if (sauce !== 'all' && meat === 'all')
		pre = $('.mch-item.' + sauce);
	else if (sauce === 'all' && meat !== 'all')
		pre = $('.mch-item.' + meat);
	else
		pre = $('.mch-item.' + sauce).siblings('.mch-item.' + meat);

	on = pre.parents('.card-holder');

	if (objectChecker(off))
		off.fadeOut('slow');
	if (objectChecker(on))
		on.fadeIn('slow');
}

},{"../helper/objectChecker.js":5}],21:[function(require,module,exports){
/**
 * Calculator for the pricing
 * This method will calculate the {price} object first.
 * It will then calculate the total using the {singleOrder}
 * total = (price + surcharge) * quantity.
 *
 * It will attach back the whole keys, and return {singleOrder}.
 */

var displayThePrice = require('./displayPrice.js');

module.exports = function (referer, singleOrder, surcharge) {
	"use strict";
	var surchargeTotal, totalPrice;

	// calculate surcharge first
	surchargeTotal = (typeof surcharge === 'object') ? calculateSurchargePrice(surcharge) : singleOrder.surcharge;

	// then assign to {singleOrder}
	singleOrder.surcharge = surchargeTotal;

	// then calculate the total
	totalPrice        = calculateTotalPrice(singleOrder);
	singleOrder.total = totalPrice;

	// display the price to front end
	displayThePrice(referer, singleOrder);

	return singleOrder;
};

/**
 * calculate the surcharge price
 * make amendments as needed
 */
function calculateSurchargePrice(surcharge) {
	return surcharge.size + surcharge.addition;
}

// calculate the total price
function calculateTotalPrice(singleOrder) {
	return (singleOrder.price + singleOrder.surcharge) * singleOrder.quantity;
}

},{"./displayPrice.js":22}],22:[function(require,module,exports){
/**
 * Display the price to the card.
 * The referer should be an element in that particular card which
 * should be a parent to the price display element holder
 * i.e. $('.half-sr'), see HTML structure in items view
 */

module.exports = function (referer, singleOrder) {
	var priceHolder = referer.find('.half-sr');
	priceHolder.html('RM' + singleOrder.total.toFixed(2));
};

},{}],23:[function(require,module,exports){
/**
 * Get the price from option in pizza card.
 * It will extract the price from data-price attribute in option.
 */

module.exports = function (select) {
	var optionPrice = parseFloat(select.children('option:selected').data('price'));
	if (isNaN(optionPrice))
		optionPrice = 0;
	return optionPrice;
};

},{}],24:[function(require,module,exports){
/**
 * This module will set the default state for the ordering object.
 * It will return an object containing two other objects,
 * singleOrder and price objects.
 */

module.exports = function (trigger, flag) {
	"use strict";
	var name     = trigger.data('name');
	// var response = (flag === 'pizza') ? setupPizzaObject(name) : setupNonPizzaObject(name); // setup the default object
	var response = setupPizzaObject(name); // setup the default object

	return response;
};

function setupPizzaObject(name) {
	/**
	 * Please note the price calculation in {singleOrder} will goes with this pattern
	 * total = (price + surcharge) * quantity
	 * while the surcharge is a total of size surcharge and edit topping total price.
	 */
	var singleOrder = {
		'name'      : name, // TODO: Later change it to ID for more secure data transaction. Fetch ID from DB.
		'price'     : 0,
		'surcharge' : 0,
		'quantity'  : 1,
		'total'     : 0,
	};
	/**
	 * The price calculation in {surcharge} goes with this pattern
	 * surcharge = size + addition
	 * This surcharge will then attached to {singleOrder.surcharge}
	 *
	 * Update as necessary
	 */
	var surcharge = {
		'size'      : 0,
		'addition'  : 0,
	};
	//  return to response
	return {
		'singleOrder' : singleOrder,
		'surcharge'   : surcharge,
	};
}


function setupNonPizzaObject(name) {
	var singleOrder = {
		'name'      : name, // TODO: Later change it to ID for more secure data transaction. Fetch ID from DB.
		'price'     : 0,
		'surcharge' : 0,
		'quantity'  : 1,
		'total'     : 0,
	};
	var surcharge = {     // actually, it seems like there is no surcharge for non pizza order
		'size'      : 0,  // but let's just return it anyway
	};
	//  return to response
	return {
		'singleOrder' : singleOrder,
		'surcharge'   : surcharge,
	};
}
},{}],25:[function(require,module,exports){
var filterPizza  = require('./filter.pizza.js');
var defaulting   = require('./order.defaulting.js');
var calcPizza    = require('./calculator.pizza.js');
var calcCheese   = require('./calculator.cheese.js');
var calcTopping  = require('./calculator.topping.js');
var calcQuantity = require('./calculator.quantity.js');
var calcOther    = require('./calculator.other.js');

module.exports = function (set) {
	"use strict";
	/**
	 * Please make changes as needed
	 *
	 * Here, the wholeOrder object will store all order submitted and synced between the client and server.
	 * The singleOrder object acts as a buffer when the customer is fiddling around and customising his order.
	 * When user submit, push the singleOrder to wholeOrder and sync it to the server.
	 *
	 * use console.log() to get a picture of the structure.
	 */
	var wholeOrder  = {};
	var singleOrder = {};
	var surcharge   = {};

	// activate the filter
	filterPizza(set.filterHolder);

	/**
	 * trigger the defaulting event when a card is flipped
	 */
	set.menuHolder.on('click', '.mc-order', function () {
		var ths       = $(this);
		var thsType   = ths.data('type');
		var defaulted = defaulting(ths, thsType);

		/**
		 * The function calls below are put inside this callback because
		 * they need to be reinited every time the user choose a card
		 */

		// set default state for the manipulation objects
		singleOrder = defaulted.singleOrder;
		surcharge   = defaulted.surcharge;

		/**
		 * Below are the calculations per modules. The calculator always return the manipulated {singleOrder} object.
		 * You might want to update the calculation for surcharge.
		 * Change it later to match the syncing to database.
		 *
		 * It is differed by the data-type
		 */
		if (thsType === 'pizza') { // pizza order
			singleOrder = calcPizza(set.menuHolder, singleOrder, surcharge);
			singleOrder = calcCheese(set.menuHolder, singleOrder, surcharge);
			singleOrder = calcTopping(singleOrder, surcharge);

		} else { // non-pizza order
			singleOrder = calcOther(ths, singleOrder, surcharge);

		}

		singleOrder = calcQuantity(ths.parents('.card-holder'), singleOrder, surcharge, thsType);

		return false;
	});

	set.menuHolder.on('click', '.pz-done', function (e) {
		e.preventDefault();
		// debugging the singleOrder object
		console.log(singleOrder);
		console.log(surcharge);
		return false;
	});
};
},{"./calculator.cheese.js":15,"./calculator.other.js":16,"./calculator.pizza.js":17,"./calculator.quantity.js":18,"./calculator.topping.js":19,"./filter.pizza.js":20,"./order.defaulting.js":24}],26:[function(require,module,exports){
/**
 * A collection of extension for the native JavaScript
 * extended using the prototype
 */

String.prototype.ucfirst = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
};

String.prototype.ucwords = function () {
	var words = this.split(' ');
	for (var i = 0; i < words.length; i++)
		words[i] = words[i].charAt(0).toUpperCase() + words[i].slice(1);
	return words.join(' ');
};

module.exports = function () {
	// 
};
},{}]},{},[9])