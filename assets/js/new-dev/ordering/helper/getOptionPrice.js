/**
 * Get the price from option in pizza card.
 * It will extract the price from data-price attribute in option.
 */

module.exports = function (select) {
	var optionPrice = parseFloat(select.children('option:selected').data('price'));
	if (isNaN(optionPrice))
		optionPrice = 0;
	return optionPrice;
};
