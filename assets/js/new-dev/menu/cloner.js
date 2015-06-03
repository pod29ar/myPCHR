var mealClone = require('./cloner.meal.js');

/**
 * This function will setup an HTML view
 * it will clone from the targeted template
 * and then append it to the designated container
 */
module.exports = function cloneMenuByTemplate(data, target, cloneType, container) {
	"use strict";
	var template = $(target),
		cloned;

	// call the cloning method based on the clone type
	if (cloneType === 1)      // clone meal set
		cloned = mealClone(data, template);
	else if (cloneType === 2) // clone meal set items
		cloned = callMealItemClone(data, template);
	else if (cloneType === 3) // clone menu item
		cloned = callMenuClone(data, template);

	$(container).append(cloned);
};