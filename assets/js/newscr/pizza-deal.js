$(document).ready(function () {
	"use strict";
	var pizzaHolder = $('#pizza-hold'),
		sidesHolder   = $('#sides-hold'),
		bevsHolder    = $('#beverages-hold'),
		btnConfirm    = $('#cnf-sel'),
		ordForm       = $('#order-form'),
		btnAction     = $('#atc'),
		pizzaSizeHold = $('.pz-size'),
		pizzaSize     = $('.sz');

	function setPriorityShow() {
		if (pizzaHolder.length > 0) {
			pizzaHolder.show();
		} else {
			if (sidesHolder.length > 0) {
				sidesHolder.show();
			} else {
				bevsHolder.show();
			}
		}
	}

	function showData() {
		var ordName   = ordForm.children("input[name='menu-name']").val(),
			ordSize     = ordForm.children("input[name='menu-size']").val(),
			ordTopping  = ordForm.children("input[name='menu-topping']").val(),
			ordPrice    = ordForm.children("input[name='menu-price']").val(),
			ordQuant    = ordForm.children("input[name='menu-quantity']").val(),
			ordImage    = ordForm.children("input[name='menu-image']").val(),
			item        = cartForm.find('.active'),
			name, compText, itemText;

		name = ordSize + ' - ' + ordName + ' - ' + ordTopping;
		// store to view
		item.find('img').attr('src', ordImage);
		item.find('.item-desc').text(name);
		// store to form
		item.find('.cart-item').val(name);
		item.find('.cart-price').val(ordPrice);
		item.find('.cart-quant').val(ordQuant);
	}

	function resetPizzaContainer() {
		var firstHolder = $('#szcr-holder'),
			lastHolder    = $('#cnfr-holder'),
			selecteds     = $('.selected');
		hiding(lastHolder, 'slow');
		showing(firstHolder, 'slow');
		selecteds.removeClass('selected');
		manipulateSize();
		scrollToTop();
	}

	function reloadContainer(curr, next) {
		var currCont, nextCont;
		resetPizzaContainer();
		if (curr !== next) {
			hiding($('#' + curr + '-hold'), 'slow');
			showing($('#' + next + '-hold'), 'slow');
		} else {
			showing($('#' + curr + '-hold'), 'slow');
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

	function manipulateSize() {
		pizzaSize.each(function () {
			var compare = $(this).attr('data-size');
			if (compare === pzsz)
				$(this).click();
		});
		pizzaSizeHold.hide();
		pizzaSizeHold.prev('.dir-head').hide();
	}

	setPriorityShow();
	manipulateSize();

	btnConfirm.click(function (e) {
		e.preventDefault();
		showData();
		nextItem();
		return false;
	});

	// disable button add to cart by default
	btnAction.unbind('click');
});