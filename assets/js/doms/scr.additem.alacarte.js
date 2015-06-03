$(document).ready(function () {
	"use strict";

	var body     = $('body'),
		menuHolder = $('#menu-holder');

	// multiply quantity
	function multiplyQuantity(ths) {
		var quantity = ths.parents('.order-form').find('.pzq-number').attr('value'),
			totalPrice = orderData.price;
		totalPrice *= quantity;
		orderData.total = totalPrice;
	}

	// post request
	function postRequest() {
		var url = host + 'data/ordered',
			data = {
				'orders' : JSON.stringify(orderData),
				'flag' : 'alacarte'
			};
		$.post(url, data, function (resp) {
			var json = $.parseJSON(resp);
			if (json.message === 'success!') {
				window.location = host + 'my-cart';
			} else {
				alert(json.message);
			}
		});
	}

	function executeOrder(ths, type) {
		multiplyQuantity(ths);
		delete orderData.surcharge;
		postRequest();
	}

	// add to order
	menuHolder.on('click', '.pz-done', function (e) {
		e.preventDefault();
		var ths   = $(this),
			type    = ths.attr('data-type'),
			parents = ths.parents('.order-form'),
			size, crust;
		if (type === 'pizza') {
			size  = parents.find('.pz-size').val();
			crust = parents.find('.pz-crust').val();
			if (size.length === 0) {
				alert('Select size first!');
			} else if (crust.length === 0) {
				alert('Select a crust first!');
			} else {
				executeOrder(ths, type);
				regTime('alacarte', 'select item: pizza', '1');
			}
		} else {
			executeOrder(ths, type);
			regTime('alacarte', 'select item: non-pizza', '1');
		}
		return false;
	});
});