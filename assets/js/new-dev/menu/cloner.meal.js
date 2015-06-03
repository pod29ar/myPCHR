/**
 * clone the HTML for meal sets
 * from the designated template
 */

module.exports = function cloneMealTemplate(data, template) {
	"use strict";
	var clones  = [];
	var mealSet = data;
	// loop counter
	var x, y, z;
	// data from JSON object
	var meals, group, item;
	// html containers
	var meal, groupTitle, clonedContainer, cloned, itemContainer, cloneItem;
	// data containers
	var itemType, itemDesc, itemIcon;

	for (x = 0; x < mealSet.length; x++) { // begin level-1 array
		// pull data from JSON object
		meals = mealSet[x].meals;
		group = mealSet[x].group;

		// set group title
		groupTitle = $('<h4 class="deal-head pizza-deal-title"><span>' + group.toUpperCase() + '</span></h4>');
		// push the group title to the return array
		clones.push(groupTitle);

		// cloned mealset
		clonedContainer = $('<div class="row" class="mealer"></div>');
		for (y = 0; y < meals.length; y++) { // begin level-2 array
			meal          = meals[y];
			cloned        = $(template).clone();
			itemContainer = cloned.find('.meal-deal');

			// modify header data attributes and html
			cloned.find('.deal').data('size', meal.size);
			cloned.find('.meal-block').attr({
				'data-name'  : meal.name,
				'data-price' : meal.price
			});
			cloned.find('.meal-name').html(meal.name);

			// cloned item list
			for (z = 0; z < meal.items.length; z++) { // begin level-3 array
				item      = meal.items[z];
				itemType  = item.type;
				itemDesc  = (itemType === 'side') ? itemType : item.size;
				cloneItem = cloned.find('.md-temp').clone();

				// item data attributes
				cloneItem.removeClass('md-temp').attr({
					'data-type'   : itemType,
					'data-size'   : item.size,
					'data-desc'   : item.desc,
					'data-amount' : item.amount
				});

				// set icon
				itemIcon = setItemIcon(itemType, itemDesc);
				cloneItem.find('.mdi').addClass(itemIcon);

				// set description
				cloneItem.find('.md-amount').html(item.amount);
				cloneItem.find('.md-desc').html(itemDesc);

				itemContainer.append(cloneItem);

			} // end level-3 array
			// remove the clone as we don't need it anymore
			itemContainer.find('.md-temp').remove();

			// set footer
			cloned.find('.mf-price').html('<span>just</span> RM' + meal.price);
			cloned.find('.mf-save').html('<span>Save</span> RM'  + meal.save);

			// append the clone to container
			clonedContainer.append(cloned);

		} // end level-2 array

		// push the whole clone list to the return array
		clones.push(clonedContainer);
	} // end level-1 array

	// return the html jquery object array
	return clones;
};

/**
 * set item icon dynamically
 * depends on item's type and desc from the JSON
 */
function setItemIcon(type, desc) {
	var icon;
	if (type === 'pizza') {
		switch (desc) {
			case 'regular':     icon = 'rg'; break;
			case 'large':       icon = 'lg'; break;
			case 'extra large': icon = 'xl'; break;
			default:            icon = 'rg'; break;
		}
	} else if (type === 'side') {
		icon = 'sd';
	} else if (type === 'beverage') {
		icon = 'bv';
	}
	return icon;
}