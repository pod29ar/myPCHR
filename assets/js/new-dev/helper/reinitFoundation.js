/**
 * Foundation needs to be reinited when
 * A new element is appended to the view AND it needs Foundation's JavaScript to work
 */

module.exports =  function () {
	$(document).foundation({
		tooltip: {
			disable_for_touch: true
		}
	});
};
