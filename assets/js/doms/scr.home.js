$(document).ready(function () {
	"use strict";
	// rotate main carousel
	var mainCarousel = $('#main-cars');
	mainCarousel.carouFredSel({
		items     : 1,
		direction : 'up',
		scroll    : {
			fx      : 'crossfade'
		}
	});
	// rotate side carousel
	var sideCarousel = $('#side-cars');
	sideCarousel.carouFredSel({
		items     : 3,
		direction : 'up',
		prev      : {
			button  : $('#cars-prev')
		},
		next      : {
			button  : $('#cars-next')
		}
	});
	// rotate flipboard
	var fbLeft = $('#fb-left'),
		fbCenter = $('#fb-center'),
		fbRight  = $('#fb-right'),
		fbOpt = {
			orientation : 'horizontal',
			autoplay    : true,
			speed       : 1500,
			shadows     : true,
			shadowSides : 1.0
		};
	fbLeft.bookblock(fbOpt);
	fbCenter.bookblock(fbOpt);
	fbRight.bookblock(fbOpt);
});
