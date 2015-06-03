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
