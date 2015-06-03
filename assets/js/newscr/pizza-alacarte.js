$(document).ready(function () {
	"use strict";
	var ordForm     = $('#order-form'),
		// buttons and/or containers
		btnConfirm    = $('#cnf-sel'),
		floatCart     = $("#float-cart"),
		floatPlholder = $('#pre-stat'),
		itemHolder    = $('#items');

	function showData() {
		var ordName  = ordForm.children("input[name='menu-name']").val(),
			ordSize    = ordForm.children("input[name='menu-size']").val(),
			ordTopping = ordForm.children("input[name='menu-topping']").val(),
			ordPrice   = ordForm.children("input[name='menu-price']").val(),
			ordQuant   = ordForm.children("input[name='menu-quantity']").val(),
			ordImage   = ordForm.children("input[name='menu-image']").val(),
			itemCompare = cartForm.find('.active'),
			item, name, compText, itemText;

		name = ordSize + ' - ' + ordName + ' - ' + ordTopping;
		item = $('<li class="item active finished" data-item="pizza">' +
			'<div class="item-img" style="background-image: url('+ordImage+');">' +
			'</div>' +
			'<div class="item-desc">' + name + '</div>' +
			'<div class="clearfix"></div>' +
			'<input type="hidden" class="cart-item" name="item-nm" value="' + name + '">' +
			'<input type="hidden" class="cart-price" name="item-pr" value="' + ordPrice + '">' +
			'<input type="hidden" class="cart-quant" name="item-qn" value="' + ordQuant + '">' +
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
	}

	// disable button add to cart by default
	btnAction.unbind('click');

	btnConfirm.click(function (e) {
		e.preventDefault();
		// view data from pizza on floatcart
		showData();
		// enable add to cart button
		enableAction();
		return false;
	});
});