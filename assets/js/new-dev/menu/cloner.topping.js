var objectChecker = require('../helper/objectChecker.js');

module.exports = function (data, container) {
	"use strict";
	// data holder
	var clones = [];
	var currentType = '';
	var x, topping, toppingName, toppingClass, toppingType;
	// html holder
	var specialTopping = $('#special-topping');
	var normalTopping  = $('#topping-list');
	var clonedCategory = $('<ul class="small-block-grid-4"></ul>');
	var cloned, categoryHead;

	for (x = 0; x < data.length; x++) {
		topping      = data[x];
		toppingName  = topping.name;
		toppingClass = toppingName.toLowerCase().replace(/ /g, '-');
		toppingType  = topping.type;
		cloned       = container.find('.templar').clone().removeClass('templar').css('display', 'block');

		// modify the clone
		cloned.find('label').html(toppingName);
		cloned.find('.et-image').addClass(toppingClass);
		cloned.find('.etc-button-holder').attr({
			'data-name'  : toppingName,
			'data-price' : topping.price
		});

		// create the special first two
		if (x === 2) {
			specialTopping.append(clones);

			// empty the bucket
			clones = [];
		}

		// category header
		if (currentType !== toppingType && x >= 2)
			splitByCategory(toppingType, clones);

		clones.push(cloned);

		if (x === data.length - 1)
			appendTheList(clones);
	}

	/**
	 * NOTE:
	 * these functions are declared here for scope reason
	 * by declaring here, it still has access to the variables above
	 * as well as the passed variables/parameters
	 */
	function splitByCategory(toppingType, copyClones) { // give different name to the clones array for different scoping
		var categoryHead = createCategoryHeader(toppingType);

		// match type
		currentType = toppingType;

		// pass the clones array of this scope
		appendTheList(copyClones);

		// append head
		normalTopping.append(categoryHead);

		// clean bucket
		clones = []; // clean the original clones array
		clonedCategory = $('<ul class="small-block-grid-4"></ul>');
	}

	function appendTheList(passClones) {
		// append the clones to the ul container
		clonedCategory.append(passClones);

		// append the ul and clones to the main div container
		if (objectChecker(clonedCategory))
			normalTopping.append(clonedCategory);
	}
};

function createCategoryHeader(type) {
	var header = $('<h4 class="deal-head"><span>' + type.toUpperCase() + '</span></h4>');
	return header;
}
