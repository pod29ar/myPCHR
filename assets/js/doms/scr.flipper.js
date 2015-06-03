$(document).ready(function () {
	"use strict";

	var body     = $('body'),
		menuHolder = $('.menu-holder');

	// toggle the card flip
	function togglingCard(ths) {
		var card      = ths.parents('.card-holder'),
			flippedCard = $('.card-holder.flipped');
		if (card.hasClass('flipped')) {
			card.removeClass('flipped');
		} else {
			flippedCard.removeClass('flipped');
			card.addClass('flipped');
		}
	}
	// flipping card
	menuHolder.on('click', '.mc-toggle', function (e) {
		e.preventDefault();
		var ths = $(this);
		togglingCard(ths);
		return false;
	});

	// menu storage
	var additionalData;

	// show the total price
	function showTotal() {
		var totalPrice   = orderData.total,
			priceContainer = $('.pz-price');
		priceContainer.text('RM'+totalPrice.toFixed(2));
	}

	// utilities: reset topping each time a new pizza is selected
	function resetTopping() {
		var editTopping = $('.edit-topping');
		if (editTopping.length > 0) {
			editTopping.find('.etc-number').val('0');
			editTopping.find('.ets-topping').html('');
			editTopping.find('.ets-total').html('RM0.00');
			toppingPrice   = 0.00;
			toppingCounter = 0;
		}
	}
	// inital store data for menu select
	function initData(name, price, type, size) {
		orderData = {
			'type'      : type,
			'name'      : name,
			'size'      : size,
			'quantity'  : 1,
			'price'     : 0.00,
			'total'     : 0.00
		};
	}
	// additional init for pizza select
	function initPizza(price) {
		orderData.surcharge = price;
		resetTopping();
	}
	// manipulate data
	function manipulateOther(addon, price) {
		if (addon === true)
			price = price[1];
		else
			price = price[0];
		orderData.price = parseFloat(price);
		orderData.total = parseFloat(price);
	}
	// order storing
	menuHolder.on('click', '.mc-order:not(.mc-lightbox)', function (e) {
		e.preventDefault();
		var ths = $(this),
			name  = ths.attr('data-name'),
			price = ths.attr('data-price'),
			type  = ths.attr('data-type'),
			size  = ths.attr('data-size'),
			addon = ths.attr('data-addon');
		price = price.split(' ');
		currentBasePrice = 0.00;
		currentBaseSurcharge = 0.00;

		initData(name, price, type, size);
		if (ths.hasClass('mc-pizza'))
			initPizza(price);
		else
			manipulateOther(addon, price);
		showTotal();

		return false;
	});

	// pizza additional data
	// load crust
	function loadCrust(url, theSize, strike, ths) {
		var crust = ths.parents('.order-form').find('.pz-crust'),
			data;
		theSize = theSize.split(' ');
		theSize = theSize[0];
		data    = { 'size' : theSize };

		var sururu = '';
		console.log(theSize);
		if (strike === 'true') {
			switch (theSize) {
				case 'personal': sururu = '';           break;
				case 'regular':  sururu = ' (+RM3.50)'; break;
				case 'large':    sururu = ' (+RM5.00)'; break;
				case 'extra':    sururu = ' (+RM7.00)'; break;
				default: sururu = '';
			}
		}
		$.post(url, data, function (resp) {
			var json = $.parseJSON(resp),
				crusts = '<option value="">Select Crust</option>',
				x;
			for (x=0; x<json.length; x++) {
				var c = json[x];
				crusts += '<option value="' + c.name + '" data-price="' + c.price +'">' + c.name + sururu + '</option>';
			}
			crust.html(crusts);
		});
	}
	menuHolder.on('change', '.pz-size', function () {
		var ths   = $(this),
			theSize = ths.val(),
			strike  = ths.attr('data-strike'),
			url     = host + 'data/load_crust';
		loadCrust(url, theSize, strike, ths);
		return false;
	});

	// utilities: get selected size
	function selectedSize(size) {
		size = size.split(' ');
		if (size.length === 3)
			size = size[0];
		else if (size.length === 4)
			size = size[0] + ' ' + size[1];
		return size;
	}
	// utilities: get the related price
	function sizeToPrice(size, prices) {
		var price;
		switch (size) {
			case 'personal':
				price = parseFloat(prices[0]);
				break;
			case 'regular':
				price = parseFloat(prices[1]);
				break;
			case 'large':
				price = parseFloat(prices[2]);
				break;
			case 'extra large':
				price = parseFloat(prices[3]);
				break;
			default:
				price = 0.00;
		}
		return price;
	}
	// base price
	var currentBasePrice = 0.00;
	function crustPrice(ths) {
		var card     = ths.parents('.order-form'),
			size       = card.find('.pz-size').val(),
			crustType  = ths.val(),
			crust      = ths.children('option:selected').attr('data-price'),
			totalPrice = orderData.total,
			diffPrice  = 0.00,
			basePrice;

		// get the selected size
		size = selectedSize(size);
		// get the correct base price
		crust = crust.split(' ');
		basePrice = sizeToPrice(size, crust);

		// store the size and crust
		orderData.size  = size;
		orderData.crust = crustType;

		// base price
		diffPrice = basePrice - currentBasePrice;
		currentBasePrice = basePrice;
		totalPrice += diffPrice;

		orderData.total = totalPrice;
	}
	// surcharge price
	var currentBaseSurcharge = 0.00;
	function manipulatePizza(ths) {
		var card           = ths.parents('.order-form'),
			size             = card.find('.pz-size').val(),
			crust            = card.find('.pz-crust').val(),
			toppingSurcharge = orderData.surcharge,
			diffSurcharge    = 0.00,
			totalPrice       = orderData.total,
			baseSurcharge;

		if (size.length > 0 && crust.length > 0) {

			// get the selected size
			size = selectedSize(size);
			// get the correct base price
			baseSurcharge = sizeToPrice(size, toppingSurcharge);

			// topping surcharge
			diffSurcharge = baseSurcharge - currentBaseSurcharge;
			currentBaseSurcharge = baseSurcharge;
			totalPrice += diffSurcharge;

			orderData.price = totalPrice;
			orderData.total = totalPrice;

		} else if (size.length === 0) {
			alert('Please select pizza size');
		} else if (crust.length === 0) {
			alert('Please select pizza crust');
		}
	}
	menuHolder.on ('change', '.pz-crust', function () {
		var ths = $(this);
		crustPrice(ths);
		manipulatePizza(ths);
		showTotal();
	});


	// edit topping
	var toppingCounter = 0,
		toppingPrice     = 0.00;
	// check topping
	/*function toppingCheck(name, toppingDeck) {
		var topping = toppingDeck.children('[data-name="' + name + '"]');
		return topping;
	}*/
	// increase topping
	function increaseTopping(object) {
		var number = object.number.val(),
			price, topping;
		number = parseFloat(++number);
		price  = number * object.price;
		toppingPrice += object.price;

		// check topping availability
		if (object.check.length === 0) {
			// topping is not added yet, create new element for it
			topping = '<div class="row add-top" data-name="' + object.name + '" data-amount="' + number + '">' +
				'<div class="small-5 medium-6 columns ets-name">' + object.name + '</div>' +
				'<div class="small-2 columns ets-amount">' + number + '</div>' +
				'<div class="small-5 medium-4 columns ets-price">RM' + price.toFixed(2) + '</div>' +
				'</div>';
			// append to deck
			object.deck.append(topping);
			// increase counter
			toppingCounter++;
		} else {
			// topping is already there, increase the amount and price instead
			object.check.attr('data-amount', number);
			object.check.find('.ets-amount').html(number);
			object.check.find('.ets-price').html('RM' + price.toFixed(2));
		}

		object.number.val(number);
		object.charge.html('RM' + toppingPrice.toFixed(2));
	}
	// decrease topping
	function decreaseTopping(object) {
		var number = object.number.val(),
			price,
			topping;
		number = parseFloat(--number);
		price  = number * object.price;
		toppingPrice -= object.price;

		// check number of this topping in topping cart
		if (number === 0) {
			// topping is nil, remove it
			object.check.remove();
			// decrease counter back to zero
			toppingCounter--;
		} else {
			// topping is not nil, decrease the amount and price instead
			object.check.find('.ets-amount').html(number);
			object.check.find('.ets-price').html('RM' + price.toFixed(2));
		}

		object.number.val(number);
		object.charge.html('RM' + toppingPrice.toFixed(2));
	}
	// topping edited
	body.on('click', '.etc-button', function (e) {
		e.preventDefault();
		var ths       = $(this),
			target      = ths.parent(),
			number      = target.prev().children('.etc-number'),
			toppingDeck = $('.ets-topping'),
			surcharger  = $('.ets-total'),
			name        = target.attr('data-name'),
			price       = target.attr('data-price'),
			check       = toppingDeck.children('[data-name="' + name + '"]'),
			warning     = $('.et-warning'),
			passObject;

		passObject = {
			'name'   : name,
			'price'  : parseFloat(price),
			'check'  : check,
			'deck'   : toppingDeck,
			'charge' : surcharger,
			'number' : number
		};

		if (ths.hasClass('etc-incr')) {
			if (toppingCounter < 8 || check.length > 0)
				increaseTopping(passObject);
			else
				warning.show();
		} else if (ths.hasClass('etc-decr')) {
			if (number.val() > 0)
				decreaseTopping(passObject);
			if (toppingCounter === 7)
				warning.hide();
		}
		return false;
	});


	// confirming edit topping
	var currentToppingPrice = 0.00;
	function confirmTopping() {
		var toppings = $('.ets-topping').children(),
			total      = parseFloat($('.ets-total').text().replace('RM', '')),
			item       = [],
			amount     = [],
			difference = 0.00,
			currentPrice;

		// get difference in price
		difference = total - currentToppingPrice;
		currentToppingPrice = total;

		// calculate price
		currentPrice = orderData.price;
		currentPrice += difference;
		orderData.price = currentPrice;
		orderData.total = currentPrice;

		// push item and amount of topping to arrays
		toppings.each(function () {
			var ths = $(this),
				name = ths.attr('data-name'),
				counter = ths.attr('data-amount');
			item.push(name);
			amount.push(counter);
		});
		// set the JSON key and value
		orderData.additional = {
			'item' : item,
			'amount' : amount
		};
	}
	body.on('click', '.ets-confirm', function (e) {
		e.preventDefault();
		confirmTopping();
		showTotal();
		$('a.close-reveal-modal').trigger('click');
		return false;
	});


	// extra cheese
	var cheesy = $('.etc-button-holder[data-name="cheese"]').children('.etc-button.etc-incr');
	menuHolder.on('click', '.btn-chse', function (e) {
		e.preventDefault();
		if (confirm('Add extra cheese for RM2.00?')) {
			// simulate click
			cheesy.trigger('click');
			// simulate topping confirmation to increase price
			confirmTopping();
		}
		showTotal();
		return false;
	});


	// item quantity
	function itemQuantity(action, target) {
		var quantity = target.val();
		if (action === 'incr') {
			++quantity;
		} else if (action === 'decr') {
			if (quantity > '1')
				--quantity;
		}
		target.attr('value', quantity);
		priceQuantity(quantity);
	}
	// item base price quantity
	function priceQuantity(quantity) {
		var price = orderData.price;
		price *= quantity;
		orderData.quantity = quantity;
		orderData.total = price;
	}
	menuHolder.on('click', '.pzq-btn', function mlock (e) {
		e.preventDefault();
		var ths  = $(this),
			action = ths.attr('data-action'),
			target = ths.parents('.pz-quantity').find('.pzq-number');
		itemQuantity(action, target);
		showTotal();
		return false;
	});


	// load item description
	function itemRequest(url, data) {
		var itemModal = $('.item-detail'),
			itemName    = itemModal.find('.id-name'),
			itemDesc    = itemModal.find('.id-desc'),
			itemIndi    = itemModal.find('.mch-indicate'),
			itemImag    = itemModal.find('.id-preview');
		$.post(url, data, function (resp) {
			var json = $.parseJSON(resp),
				indic = '',
				y;
			itemName.html(json.name);
			itemDesc.html(json.desc);
			itemImag.attr('src', host + json.image);

			itemIndi.html('');
			if ('indicator' in json) {
				for (y=0; y<json.indicator.length; y++)
					indic += '<li class="mch-item ' + json.indicator[y] + '"></li>';
				itemIndi.append(indic);
			}
			
		});
	}
	menuHolder.on('click', '.mch-info', function (e) {
		var ths = $(this),
			name  = ths.attr('data-name'),
			type  = ths.attr('data-type'),
			url   = host + 'data/load_item',
			data  = {
				'name' : name,
				'type' : type
			};
		itemRequest(url, data);
		return false;
	});


	// special hack: diversing register time for alacarte and meal item
	var grandMenuHolder = $('#menu-holder'),
		grandMealHolder   = $('#meal-holder');
	if (grandMenuHolder.length > 0) {
		grandMenuHolder.on('click', '.mc-order:not(.mc-lightbox)', function (e) {
			var ths = $(this);
			if (ths.hasClass('mc-pizza'))
				regTime('alacarte', 'select item: pizza', '0');
			else
				regTime('alacarte', 'select item: non-pizza', '0');
		});
	}
	if (grandMealHolder.length > 0) {
		grandMealHolder.on('click', '.mc-order:not(.mc-lightbox)', function (e) {
			var ths = $(this);
			if (ths.hasClass('mc-pizza'))
				regTime('meal', 'select deal item: pizza', '0');
			else
				regTime('meal', 'select deal item: non-pizza', '0');
		});
	}
});