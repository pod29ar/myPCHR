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