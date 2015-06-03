$(document).ready(function () {
	"use strict";
	var ordForm  = $('#order-form'),
		ordTopping = ordForm.find('input[name="menu-name"]'),
		ordCrust   = ordForm.find('input[name="menu-crust"]'),
		ordPrice   = ordForm.find('input[name="menu-price"]'),
		cartForm   = $('#cart-form'),
		cartHolder = $('#item-deals'),
		confButton = $('#cnf-sel'),
		curHold = $('#content-hold').children('div:visible'),
		curHoldId = curHold.attr('id'),
		sideBev = $('.btn-qatc'),
		btnAction = $('#atc');
		// pzHold = $('#pizza-hold'),
		// sdHold = $('#sides-hold'),
		// bvHold = $('#beverages-hold');

	function resetViewPz() {
		var menu = $('#menu-holder'),
			edit = $('#edit-pizza');

		menu.fadeIn('slow', function () {
			menu.find('.menu-sel').hide();
			$(this).show();
		});

		edit.fadeOut('slow', function () {
			$(this).hide();
		});

		$('.crust.selected').removeClass('selected');
		ordTopping.val('');
		ordCrust.val('');
		ordPrice.val('');
		$('#totpric').text('RM 0.00');
	}

	function moveToNext(itemActive) {
		var nextItem = itemActive.next('.item'),
			itemName;
		itemActive.removeClass('active');

		if (nextItem.length > 0) {
			nextItem.addClass('active');
		} else {
			btnAction.removeClass('faded');
			btnAction.bind('click');

			btnAction.click(function (e) {
				cartForm.submit();
			});
		}
			
		itemName = nextItem.attr('data-item');

		if (curHoldId.indexOf(itemName) !== -1) {
			if (itemName === 'pizza')
				resetViewPz();
		} else {
			curHold.hide();
			$('#' + itemName + '-hold').show();
		}
	}

	function storePzToCart() {
		var menuTop = ordTopping.val(),
			menuCrust = ordCrust.val(),
			menuPrice = ordPrice.val(),
			// original holder
			itemActive = cartForm.children('.active'),
			itemIdent = itemActive.attr('data-identifier'),
			itemDesc = itemActive.find('.item-desc'),
			// cart holder
			cartItem = itemActive.find('.cart-item'),
			cartPrice = itemActive.find('.cart-price'),
			newText;

		newText = itemDesc.text() + ' ' + menuTop + ' - ' + menuCrust;
		cartItem.val(newText);
		cartPrice.val(menuPrice);

		itemDesc.text(newText);
		itemActive.addClass('finished');

		moveToNext(itemActive);
	}

	function storeSbToCart(ths) {
		var itemActive = cartForm.children('.active'),
			itemPrice = ths.attr('data-price'),
			itemName = itemActive.find('.item-desc').text(),
			// cart holder
			cartItem = itemActive.find('.cart-item'),
			cartPrice = itemActive.find('.cart-price');
		cartItem.val(itemName);
		cartPrice.val(itemPrice);

		itemActive.addClass('finished');
		moveToNext(itemActive);
	}

	confButton.click(function (e) {
		e.preventDefault();
		storePzToCart();
		return false;
	});

	sideBev.click(function (e) {
		e.preventDefault();
		storeSbToCart($(this));
		return false;
	});
	btnAction.unbind('click');
});