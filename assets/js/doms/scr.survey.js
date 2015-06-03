$(document).foundation();
$(document).ready(function () {
	"use strict";

	var nexstep = $('#nexstep');
	if (nexstep.length > 0) nexstep.hide();

	var brodo = setTimeout(function () {
		if (nexstep.length > 0) {
			nexstep.fadeIn(function () {
				$(this).show();
			});
		}
		window.clearTimeout(brodo);
	}, 1000 * counter);

	var timer,
		bummer = $('#bummer'),
		iframe = $('#surveyMonkeyInfo').find('iframe');

	function clearance() {
		window.clearTimeout(brodo);
		window.clearTimeout(timer);
	}

	function showBum() {
		bummer.show();
		clearance();
	}

	timer = window.setTimeout(function () {
		showBum();
	}, 10000);

	if (iframe.length > 0) {
		iframe.ready(function () {
			window.clearTimeout(timer);
		});
	} else {
		showBum();
	}
});