$(document).ready(function () {
	"use strict";

	var fbLogin = $('.fb-login');
	fbLogin.click(function (e) {
		e.preventDefault();
		var form = $(this).parent().next().children('form'),
			name = form.find('input[name="name"]'),
			pass = form.find('input[name="pass"]');
		name.val('anon');
		pass.val('pass');
		form.submit();
		return false;
	});
});