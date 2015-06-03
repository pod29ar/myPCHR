$(document).ready(function () {
	"use strict";
	var upsModal   = $('#upsell'),
		upsellBtn    = $('#add-sides'),
		ordTbl       = $('#order-table'),
		items        = $('.item'),
		itemQuantity = $('.item-quant'),
		subTotal     = $('#sub-total'),
		taxPrice     = $('#tax-price'),
		totalTax     = $('#total-tax'),
		roundTax     = $('#rounding-tax'),
		grandTotal   = $('#grand-total'),
		scrollBtn    = $('.auto-scr'),
		upsideBtn    = $('.us-side'),
		confirmBtn   = $('#confirm-order'),
		taxing       = 6 / 100,
		itemTotal, taxPay, totalPay;

	upsModal.modal('show');

	function priceCalculation() {
		totalPay = 0.00;
		items    = $('.item');

		// default price calculation start
		items.each(function () {
			var ths     = $(this),
				itemPrice = parseFloat(ths.find('.item-price').text().replace('RM ', '')),
				itemQuant = parseFloat(ths.find('.item-quant').val()),
				itemTotal = ths.find('.item-total'),
				newTot;
			newTot = itemPrice * itemQuant;
			itemTotal.text('RM ' + newTot.toFixed(2));
		});
		// subtotal
		itemTotal = $('.item-total');
		itemTotal.each(function () {
			var ths = $(this),
				price = parseFloat(ths.text().replace('RM ', ''));
			totalPay += price;
		});
		subTotal.text('RM ' + totalPay.toFixed(2));
		// tax
		taxPay = totalPay * taxing;
		taxPrice.text('RM ' + taxPay.toFixed(2));
		// total + tax
		totalPay += taxPay;
		totalTax.text('RM ' + totalPay.toFixed(2));
		roundTax.text('RM 0.00');
		grandTotal.text('RM ' + totalPay.toFixed(2));
	}

	function removeAlert() {
		var alerts = $('.alert');
		window.setTimeout(function () {
			alerts.removeClass('alert alert-info');
    }, 3000);
	}

	function addUpsell(sideItems) {
		sideItems.each(function () {
			var ths     = $(this),
				sideName  = ths.find('.sd-name').text(),
				sideQuant = ths.find('.sd-quant').val(),
				items     = $('.item'),
				newItem;

			if (sideQuant !== 0) {
				newItem = $('<tr class="item alert alert-info">' +
					'<td>' + (items.length + 1) +'</td>' +
					'<td>' + sideName + '</td>' +
					'<td class="item-price">RM 5.00</td>' +
					'<td>' +
					'<input type="number" class="item-quant" name="quantity" maxlength="2" size="2" value="' +
					sideQuant + '"> ' +
					'<button type="button" class="btn btn-action">Edit</button> ' +
					'<button type="button" class="btn btn-default">Remove</button> ' +
					'</td><td><div class="price item-total">RM 5.00</div></td></tr>');
				subTotal.parent().before(newItem);
			}
		});
		removeAlert();
	}

	function autoScroll(ths) {
		var target = ths.attr('data-target'),
			item = $(target),
			offset = 20;
		$('html, body').animate({
			scrollTop: item.offset().top + offset
		}, 500);
	}

	function scrollToTop() {
		$('html, body').animate({
			scrollTop: $('.steam').offset().top
		}, 500);
	}

	function destroySession() {
		var pathArray = window.location.href.split('/'),
			host        = pathArray[0] + '//' + pathArray[2] + '/';
		$.post(
			host + 'data/order_destroyer',
			{
				'foo' : 'bar'
			},
			function (resp) {
				var stats = $.parseJSON(resp);
				if (stats.status === 'success')
					window.location = host + 'gps_tracker';
				else
					alert('error!');
			}
			);
	}

	priceCalculation();

	upsellBtn.click(function () {
		var sideItems = $('.sd-item');
		addUpsell(sideItems);
		priceCalculation();
		upsModal.modal('hide');

		return false;
	});

	ordTbl.on('change', '.item-quant', function () {
		priceCalculation();
	});

	scrollBtn.click(function (e) {
		e.preventDefault();
		autoScroll($(this));
		return false;
	});

	upsideBtn.click(function (e) {
		e.preventDefault();
		var ths = $(this),
			sideItems = ths.parent().parent();
		addUpsell(sideItems);
		priceCalculation();
		scrollToTop();
		return false;
	});

	confirmBtn.click(function (e) {
		e.preventDefault();
		destroySession();
		return false;
	});
});