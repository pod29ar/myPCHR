$(document).ready(function() {
	"use strict";
	var timego = setTimeout(trackerStatus, 1000*3);
	function trackerStatus() {
		var tracker = $('.tracker'),
			trackerFaux = $('.tracker-faux');
		tracker.hide();
		trackerFaux.show();
		window.clearTimeout(timego);
	}
});