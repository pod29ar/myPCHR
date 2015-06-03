$(document).ready(function () {
	"use strict";
	var pathArray = window.location.href.split('/'),
		host        = pathArray[0] + '//' + pathArray[2] + '/',
		fbcon       = $('.fb-con');

	function popitup(url,windowName) {
		var newWindow = window.open(
			url,
			windowName,
			'width=700,height=500,' +
			'toolbar=0,menubar=0,location=0,status=1,' +
			'scrollbars=1,resizable=1,left=0,top=0'
			);
		if (window.focus) newWindow.focus();
		return false;
	}

	fbcon.click(function (e) {
		e.preventDefault();
		popitup(host + "main/fb_connect", 'Facebook');
		return false;
	});
});