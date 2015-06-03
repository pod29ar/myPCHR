$(document).ready(function () {
	"use strict";
	var stepButton = $('.step-skip'),
		personalInfo = $('.pi'),
		addressInfo = $('.ai'),
		finishInfo = $('.fi');

	// hack into foundation tab xclick
	stepButton.click(function (e) {
		e.preventDefault();
		var ths = $(this),
			inputs = ths.parents('.input-box').find('input:not(.optional)'),
			target = ths.attr('data-target'),
			check;
		// check for empty value first
		check = inputs.filter(function () {
			return this.value === '';
		});
		if (check.length === 0) {
			// no empty value, register time and trigger tab click
			regTime('register', 'personal info', '1');
			regTime('register', 'address info', '0');
			$('.' + target).click();
		} else {
			// empty value, prompt to fill
			alert('Please fill in all mandatory details');
		}
		return false;
	});

	// the chosen one
	var selects = [
		$('#addrState'),
		$('#addrCity'),
		$('#postcode'),
		$('#suburb'),
		$('#addrStreet'),
		$('#addrType')
		],
		sc = 0;
	for (sc; sc<selects.length; sc++) {
		var select = selects[sc];
		select.addClass('sel-cho').select2();
	}
});