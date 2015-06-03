module.exports = function setUpHeadCarousel() {
	"use strict";
	// set up main sliding carousel
	var mainCarousel = $('#main-cars');
	mainCarousel.carouFredSel({
		items     : 1,
		direction : 'up',
		scroll    : {
			fx      : 'crossfade'
		}
	});

	// set up rotating side carousel
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

	// set up flipping board
	var flipBoard = $('.fb-flips'),
		fbOpt     = {
			orientation : 'horizontal',
			autoplay    : true,
			speed       : 1500,
			shadows     : true,
			shadowSides : 1.0
		};
	flipBoard.bookblock(fbOpt);
};