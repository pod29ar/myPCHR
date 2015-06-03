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
