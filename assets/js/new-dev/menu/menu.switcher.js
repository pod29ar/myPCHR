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
