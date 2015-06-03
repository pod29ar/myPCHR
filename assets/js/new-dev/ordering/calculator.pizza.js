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
