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
