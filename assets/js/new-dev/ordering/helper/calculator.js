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
