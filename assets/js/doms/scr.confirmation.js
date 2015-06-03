$(document).ready(function () {
	"use strict";

	$('.payment-cl').change(function () {
		var value = $(this).val(),
			cashier = $('#pc-cash'),
			debitur = $('#pc-debit'),
			credite = $('#pc-credit');
		switch (value) {
			case 'cash':
				cashier.show();
				debitur.hide();
				credite.hide();
				break;

			case 'debit':
				cashier.hide();
				debitur.show();
				credite.hide();
				break;

			case 'credit':
				cashier.hide();
				debitur.hide();
				credite.show();
				break;

			default:
				cashier.show();
				debitur.hide();
				credite.hide();
				break;
		}
	});
});