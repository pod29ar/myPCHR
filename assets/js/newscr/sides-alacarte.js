$(document).ready(function () {
	"use strict";
	var btnSides    = $('.btn-qatc'),
		floatPlholder = $('#pre-stat'),
		itemHolder    = $('#items');

	function showData(side) {
		var ordName  = side.find('h4.menu-name').text(),
			ordPrice   = side.find('.menu-price').text(),
			ordQuant   = 1,
			ordImage   = side.find('img').attr('src'),
			itemCompare = itemHolder.find('.active'),
			item, name, compText, itemText;

		item = $('<li class="item active finished" data-item="pizza">' +
			'<div class="item-img" style="background-image: url('+ordImage+');">' +
			'</div>' +
			'<div class="item-desc">' + ordName + '</div>' +
			'<div class="clearfix"></div>' +
			'<input type="hidden" class="cart-item" name="item-nm" value="' + ordName + '">' +
			'<input type="hidden" class="cart-price" name="item-pr" value="' + ordPrice + '">' +
			'<input type="number" class="cart-quant" name="item-qn" value="' + ordQuant + '"> <a href="#">Remove</a>' +
			'</li>');
		floatPlholder.hide();
		if (itemCompare.length > 0){
			compText = itemCompare.find('.item-desc').text();
			itemText = item.find('.item-desc').text();
			if (compText === itemText)
				itemCompare.remove();
			else
				itemCompare.removeClass('active');
		}
		itemHolder.append(item);
		enableAction();
	}

	btnSides.click(function (e) {
		e.preventDefault();
		var side = $(this);
		showData(side);
		return false;
	});

	// disable button add to cart by default
	btnAction.unbind('click');
});