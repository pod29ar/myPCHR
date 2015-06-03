module.exports = function (relativeParent, flipTarget) {
	"use strict";
	// flip object
	relativeParent.on('click', flipTarget, function (e) {
		e.preventDefault();
		var ths = $(this);
		var card = ths.parents('.card-holder');
		var flipped = $('.card-holder.flipped');

		if (card.hasClass('flipped')) {
			card.removeClass('flipped');
		} else {
			flipped.removeClass('flipped');
			card.addClass('flipped');
		}
		return false;
	});
};