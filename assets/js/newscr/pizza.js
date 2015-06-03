$(document).ready(function () {
	"use strict";
	// pizza order form container
	var ordForm    = $('#order-form'),
		ordName      = ordForm.children("input[name='menu-name']"),
		ordDesc      = ordForm.children("input[name='menu-desc']"),
		ordSize      = ordForm.children("input[name='menu-size']"),
		ordTopping   = ordForm.children("input[name='menu-topping']"),
		ordPrice     = ordForm.children("input[name='menu-price']"),
		ordQuant     = ordForm.children("input[name='menu-quantity']"),
		ordImage     = ordForm.children("input[name='menu-image']"),
		// buttons and/or containers
		szcrHold     = $('#szcr-holder'),
		tppgHold     = $('#tppg-holder'),
		cnfrHold     = $('#cnfr-holder'),
		pizzaSize    = $('.sz'),
		pizzaCrust   = $('.crust'),
		pizzaTopping = $('.btn-etpg'),
		totpricCont  = $('#totpric'),
		previewName  = $('#topping-name'),
		previewImg   = $('#topping-img'),
		previewDesc  = $('#topping-desc'),
		editTopping  = $('#edt-tppg'),
		quantity     = $('#quantity'),
		// price calculation
		totalPrice   = 0.00,
		curCrsPrice  = 0.00,
		curTopPrice  = 0.00,
		// misc
		currentSize;

	function centerPizzaSize() {
		var imgWidth, th, img = pizzaSize.find('img');
		// set each image in the button
		img.each(function () {
			th       = $(this);
			// get parent center point
			imgWidth = parseInt(th.width(), 10) / 2;
			// set image to center; this is combined with CSS absolute positioning
			th.css('margin-left', '-' + imgWidth + 'px');
		});
	}

	function selectSize(ths, thSize) {
		// find detail size name
		var detail = ths.find('.size-dtl > p').text();
		detail = detail.split(',');
		// store to the order form preapred
		ordSize.val(detail[0] + ' ' + thSize + ' Pizza');
		// select the size
		ths.siblings('.selected').removeClass('selected');
		ths.addClass('selected');
		// store current size for reference
		currentSize = thSize;
	}

	function sizeEliminateOption(ths, thSize, options) {
		// get options
		options.each(function () { // loop
			var option = $(this),
				optionSize = option.attr('data-size'); // get the option's size
			if (optionSize.indexOf(thSize) != -1) {
				// option available for this size, show it
				option.fadeIn('fast', function () {
					$(this).parent().show();
				});
			} else {
				// option unavailable for this size, hide it
				option.fadeOut('fast', function () {
					$(this).parent().hide();
				});
			}
		});
	}

	function storeCrustNamePrice(ths) {
		var prices    = ths.attr('data-price'),
			name        = ths.find('.crust-name').text(),
			// currentName = ordName.val(),
			price, currentPrice;

		// select crust
		$('.crust.selected').removeClass('selected');
		ths.addClass('selected');

		// calculate price
		prices  = prices.split(' ');
		if (currentSize === 'personal') {
			price = parseFloat(prices[0]);
		} else if (currentSize === 'regular') {
			price = parseFloat(prices[1]);
		} else if (currentSize === 'large') {
			price = parseFloat(prices[2]);
		} else if (currentSize === 'xlarge') {
			price = parseFloat(prices[3]);
		}
		// minus by previous crust price and plus by new crust price
		totalPrice -= curCrsPrice;
		totalPrice += price;
		curCrsPrice = price;
		currentPrice = 'RM ' + totalPrice.toFixed(2);

		// store name to form
		ordName.val(name);
		// store price to view and to form
		ordPrice.val(currentPrice);
		totpricCont.text(currentPrice);
	}

	function storeToppingNamePrice(ths) {
		var prices = ths.attr('data-price'),
			name     = ths.find('.menu-name').text(),
			image    = ths.find('img').prop('src'),
			desc     = ths.find('.menu-desc > p').text(),
			price, currentPrice;

		// select topping
		$('.sel-pz.selected').removeClass('selected');
		ths.addClass('selected');

		// calculate price
		prices  = prices.split(' ');
		if (currentSize === 'personal') {
			price = parseFloat(prices[0]);
		} else if (currentSize === 'regular') {
			price = parseFloat(prices[1]);
		} else if (currentSize === 'large') {
			price = parseFloat(prices[2]);
		} else if (currentSize === 'xlarge') {
			price = parseFloat(prices[3]);
		}
		// minus by previous crust price and plus by new crust price
		totalPrice -= curTopPrice;
		totalPrice += price;
		curTopPrice = price;
		currentPrice = 'RM ' + totalPrice.toFixed(2);

		// store details to form
		ordTopping.val(name);
		ordImage.val(image);
		ordDesc.val(desc);
		ordPrice.val(currentPrice);
		// store details to view
		previewName.text(name);
		previewImg.prop('src', image);
		previewDesc.text(desc);
		totpricCont.text(currentPrice);
	}

	function quantityChange(quantity) {
		var price, currentPrice;
		// calculate price
		price = totalPrice * quantity;
		currentPrice = 'RM ' + price.toFixed(2);
		// store price to view and form
		ordQuant.val(quantity);
		totpricCont.text(currentPrice);
	}

	// centering the pizza button image
	centerPizzaSize();

	// select a size, store the size name, eliminate crust+topping based on the size
	pizzaSize.click(function (e) {
		e.preventDefault();
		var ths  = $(this),
			thSize = ths.attr('data-size');
		// select size, pass object: this
		selectSize(ths, thSize);
		// eliminate crust
		sizeEliminateOption(ths, thSize, pizzaCrust);
		// eliminate topping
		sizeEliminateOption(ths, thSize, pizzaTopping);
		return false;
	});

	// select a crust, store current price, move to topping view
	pizzaCrust.click(function (e) {
		e.preventDefault();
		// check if size selected yet
		var sizeCheck = $('.sz.selected');
		if (sizeCheck.length > 0) {
			// size selected, continue
			// store crust name and price
			storeCrustNamePrice($(this));
			// move to topping view, hide current holder and show topping holder
			hiding(szcrHold, 'slow');
			showing(tppgHold, 'slow');
			scrollToTop();
		} else {
			// size not selected, prompt to select size
			alert('Select a size first!');
		}
		return false;
	});

	// select a topping, store current price, move to confirmation view
	pizzaTopping.click(function (e) {
		e.preventDefault();
		// store topping name and price
		storeToppingNamePrice($(this));
		// move to confirmation, hide current holder and show confirmation holder
		hiding(tppgHold, 'slow');
		showing(cnfrHold, 'slow');
		scrollToTop();
		return false;
	});

	// go back and edit topping
	editTopping.click(function (e) {
		// hide confirmation holder and show topping holder
		hiding(cnfrHold, 'slow');
		showing(tppgHold, 'slow');
		scrollToTop();
		return false;
	});

	// change price based on quantity
	quantity.change(function () {
		var quantity = $(this).val(); // get quantity
		quantityChange(quantity);
	});
});