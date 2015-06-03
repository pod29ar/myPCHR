// setup required modules
var string           = require('../prototypes/string.js');
var jsonKey          = require('../helper/jsonKeyChecker.js');
var carousel         = require('./carousel.js');
var mealClone        = require('../menu/cloner.meal.js');
var menuClone        = require('../menu/cloner.menu.js');
var topClone         = require('../menu/cloner.topping.js');
var flipper          = require('../helper/flipper.js');
var loadCrust        = require('../menu/card.crust.js');
var ordering         = require('../ordering/ordering.js');
var pageSwitcher     = require('../menu/menu.switcher.js');
var reinitFoundation = require('../helper/reinitFoundation.js');


$(document).ready(function() {
	"use strict";
	// data holder
	var items          = {};
	var orderOptions;
	// html holder
	var mealHolder     = $('#meal-holder');
	var filterHolder   = $('#menu-holder');
	var menuItemHolder = $('#menu-item-holder');
	var editTopHolder  = $('#edit-topping');
	var pageMenu       = $('.page-menu');

	// call the prototype extension of String
	string();
	
	// set up main head carousel
	carousel();

	/**
	 * If JSON is available and not empty
	 * then set up mealset
	 */
	if (jsonKey(bigMenu, 'bigMenu.meals')) // check for valid + not empty json, pass data and the keychain to check
		items.meals     = mealClone(bigMenu.meals,          '#meal-template > .deal');                   // data, template

	if (jsonKey(bigMenu, 'bigMenu.menu.pizza'))
		items.pizza     = menuClone(bigMenu.menu.pizza,     '#menu-item-holder > .temple', 'pizza');     // data, template, submenu

	if (jsonKey(bigMenu, 'bigMenu.menu.side'))
		items.side      = menuClone(bigMenu.menu.side,      '#menu-item-holder > .temple', 'side');      // data, template, submenu

	if (jsonKey(bigMenu, 'bigMenu.menu.beverage'))
		items.beverage  = menuClone(bigMenu.menu.beverage,  '#menu-item-holder > .temple', 'beverage');  // data, template, submenu

	if (jsonKey(bigMenu, 'bigMenu.menu.condiment'))
		items.condiment = menuClone(bigMenu.menu.condiment, '#menu-item-holder > .temple', 'condiment'); // data, template, submenu

	if (jsonKey(bigMenu, 'bigMenu.menu.topping'))
		items.topping   = topClone(bigMenu.menu.topping,    editTopHolder); // data, container

	// plug the variables based on need
	mealHolder.append(items.meals);

	menuItemHolder.append(items.pizza);
	reinitFoundation();

	// setup flipper on card items
	flipper(menuItemHolder, '.mc-toggle');

	// setup loader for crust based on type
	loadCrust(bigMenu.crust, menuItemHolder);

	// setup page switcher
	pageSwitcher(pageMenu, menuItemHolder, items);

	/**
	 * javascript function set
	 * for ordering mechanism
	 */
	// setup options
	orderOptions = {
		'data'         : bigMenu.crust,
		'set'          : 'all', // alacarte, mealset, all
		'filterHolder' : filterHolder,
		'menuHolder'   : menuItemHolder,
		'mealHolder'   : mealHolder
	};
	ordering(orderOptions);
});
