$(document).ready(function () {
	"use strict";
	var loginButton = $('#sign-in'),
		targetModal   = $('#login-mod');

	loginButton.click(function (e) {
		e.preventDefault();
		targetModal.modal('show');
		return false;
	});
});