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