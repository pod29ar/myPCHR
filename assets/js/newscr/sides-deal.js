$(document).ready(function () {
	"use strict";
	var btnSides    = $('.btn-qatc'),
		floatPlholder = $('#pre-stat'),
		itemHolder    = $('#items');

	function reloadContainer(curr, next) {
		var currCont, nextCont;
		if (curr !== next) {
			hiding($('#' + curr + '-hold'), 'slow');
			showing($('#' + next + '-hold'), 'slow');
		}
	}

	function nextItem() {
		var active = cartForm.find('.active'),
			next     = active.next(),
			currType = active.attr('data-item'),
			nextType = next.attr('data-item');
		active.removeClass('active');
		active.addClass('finished');
		if (next.length > 0) {
			next.addClass('active');
		} else {
			enableAction();
		}

		reloadContainer(currType, nextType);
	}

	function showData(side) {
		var ordName   = side.find('.menu-name').text(),
			ordPrice    = side.find('.menu-price').text(),
			ordQuant    = 1,
			ordImage    = side.find('img').attr('src'),
			item        = cartForm.find('.active'),
			name, compText, itemText;

		// store to view
		item.find('img').attr('src', ordImage);
		item.find('.item-desc').text(ordName);
		// store to form
		item.find('.cart-item').val(ordName);
		item.find('.cart-price').val(ordPrice);
		item.find('.cart-quant').val(ordQuant);
	}

	btnSides.click(function (e) {
		e.preventDefault();
		var side = $(this);
		showData(side);
		nextItem();
		return false;
	});

	// disable button add to cart by default
	btnAction.unbind('click');
});