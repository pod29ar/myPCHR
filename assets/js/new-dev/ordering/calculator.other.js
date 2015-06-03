var calculator = require('./helper/calculator.js');

module.exports = function (holder, singleOrder, surcharge) {
	"use strict";

	var price   = holder.data('price');
	var referer = holder.parent('.mc-front').next('.mc-back');

	singleOrder.price = price;
	calculator(referer, singleOrder, surcharge);

	return singleOrder;
};
