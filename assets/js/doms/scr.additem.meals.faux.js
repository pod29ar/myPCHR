$(document).ready(function () {
	"use strict";
	var mealHolder = $('#meal-holder'),
		body = $('body');

	function getSurcharge(ths) {
		var orderForm = ths.parents('.order-form'),
			baseSize = orderForm.find('.pz-size').val(),
			basePrice = orderForm.find('.pz-crust').children('option:selected').attr('data-price'),
			surcharge, mealSurcharge;

		if (ths.attr('data-type') === 'pizza') {
			baseSize = baseSize.split(' ');
			if (baseSize.length === 3)
				baseSize = baseSize[0];
			else if (baseSize.length === 4)
				baseSize = baseSize[0] + ' ' + baseSize[1];

			basePrice = basePrice.split(' ');
			switch (baseSize) {
				case 'personal':
					basePrice = parseFloat(basePrice[0]);
					break;
				case 'regular':
					basePrice = parseFloat(basePrice[1]);
					break;
				case 'large':
					basePrice = parseFloat(basePrice[2]);
					break;
				case 'extra large':
					basePrice = parseFloat(basePrice[3]);
					break;
				default:
					basePrice = 0.00;
			}

			surcharge = orderData.price - basePrice;
		} else {
			surcharge = 0.00;
		}
		mealSurcharge = mealData.surcharge;
		mealSurcharge += surcharge;

		mealData.surcharge = mealSurcharge;
	}

	function setMealData() {
		var index = mealIndex - 3;
		delete orderData.surcharge;
		mealData.items[index] = orderData;
	}

	function setItem(ths) {
		var target = $($('.lb-content')[mealIndex]),
			image = ths.parents('.card-holder').find('.mc-image').attr('src'),
			imageContainer = target.find('.lb-preview'),
			nameContainer = target.find('.lbd-name'),
			anchor = target.find('.lbpe');
		imageContainer.css('background-image', 'url("' + image + '")');
		if ( ! imageContainer.hasClass('edited'))
			imageContainer.addClass('edited');
		nameContainer.html(orderData.name);
		anchor.html('EDIT');
	}

	function switchBack() {
		// positioning
		levelOne.css({'left' : '0'});
		levelTwo.css({'left' : '100%'});
	}

	function executeOrder(ths) {
		getSurcharge(ths);
		setMealData();
		setItem(ths);
		switchBack();
	}
	
	var levelOne = $('#level-one'),
		levelTwo = $('#level-two');
	mealHolder.on('click', '.pz-done', function (e) {
		e.preventDefault();
		var ths = $(this),
			type = ths.attr('data-type'),
			parents = ths.parents('.order-form'),
			crust;
		if (type === 'pizza') {
			crust = parents.find('.pz-crust').val();
			if (crust.length === 0) {
				alert('Select a crust first!');
			} else {
				executeOrder(ths);
				regTime('meal', 'select deal item: pizza', '1');
			}
		} else {
			executeOrder(ths);
			regTime('meal', 'select deal item: non-pizza', '1');
		}
		return false;
	});

	mealHolder.on('click', '.half-done', function (e) {
		e.preventDefault();
		var ths = $(this),
			halfLightbox = ths.parents('.menu-holder').find('.half-lightbox');
		setMealData();
		halfLightbox.removeClass('active');
		switchBack();
		return false;
	});

	// confirming the deal
	var confirmMeal = $('.lb-confirm');

	confirmMeal.click(function (e) {
		e.preventDefault();
		window.location = host + 'my-cart';
		return false;
	});
});