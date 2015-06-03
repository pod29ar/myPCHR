var substring = require('../helper/substring.js');

module.exports = function (data, holder) {
	"use strict";
	holder.on('change', '.pz-size', function () {
		var ths = $(this);
		var options = setCrustOptionForSize(data, ths.val());
		var crustParent = ths.closest('.order-form').find('.pz-crust');
		crustParent.html(options);
	});
};

function setCrustOptionForSize(data, size) {
	var x, crust;
	var option = '';
	if (size === '-') {
		option += '<option value="">Select Size First</option>';
		
	} else {
		for (x = 0; x < data.length; x++) {
			crust = data[x];
			if (substring(crust.available, size))
				option += '<option value="' + crust.name + '" data-price="' + crust.price[size] + '">' + crust.name + '</option>';
		}

	}

	return $(option);
}