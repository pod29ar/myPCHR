var objectChecker = require('../helper/objectChecker.js');

module.exports = function (holder) {
	"use strict";
	var filters = {
		'sauce' : 'all',
		'meat'  : 'all',
	};
	holder.on('click', '.filter-item', function () {
		var ths     = $(this);
		var type    = ths.data('type');
		var filter  = ths.data('filter');
		var current = ths.siblings('.active');
		var off, on;

		// manipulate the filters
		filters[filter] = type;

		// filter the cards based on the filters
		filterCards(filters);

		current.removeClass('active');
		ths.addClass('active');
	});
};

function filterCards(filters) {
	var sauce = filters.sauce;
	var meat  = filters.meat;
	var pre, on, off;

	off = $('.mch-item').parents('.card-holder');
	if (sauce === 'all' && meat === 'all')
		pre = $('.mch-item');
	else if (sauce !== 'all' && meat === 'all')
		pre = $('.mch-item.' + sauce);
	else if (sauce === 'all' && meat !== 'all')
		pre = $('.mch-item.' + meat);
	else
		pre = $('.mch-item.' + sauce).siblings('.mch-item.' + meat);

	on = pre.parents('.card-holder');

	if (objectChecker(off))
		off.fadeOut('slow');
	if (objectChecker(on))
		on.fadeIn('slow');
}
