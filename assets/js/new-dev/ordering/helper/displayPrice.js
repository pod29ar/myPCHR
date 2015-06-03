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
