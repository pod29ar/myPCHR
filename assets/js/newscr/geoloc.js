$(document).ready(function() {
	"use strict";
	var userLoc = $('.user-location');

	var successCallback = function (position) {
		var x = position.coords.latitude,
			y = position.coords.longitude;
		displayLocation(x,y);
	};

	function displayLocation(latitude, longitude) {
		var request = new XMLHttpRequest(),
			method = 'GET',
			url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true',
			async = true;

		request.open(method, url, async);
		request.onreadystatechange = function () {
			if (request.readyState == 4 && request.status == 200) {
				var data = JSON.parse(request.responseText);
				var address = data.results[0];
				//$('.user-location').html('<span>' +address.formatted_address + '<br> Your nearest branch is </span> <a href="#">Bangi</a>');
				$('.user-location').html('<span>Your nearest branch is </span> <a href="#">Bangi</a>');
			}
		};
		request.send();
	}

	function getLocation() {
		if (navigator.geolocation)
			navigator.geolocation.getCurrentPosition(successCallback);
		else
			userLoc.html("Geolocation is not supported by this browser.");
	}

	getLocation();
});