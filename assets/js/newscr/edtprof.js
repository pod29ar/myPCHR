$(document).ready(function () {
	"use strict";
	var pathArray    = window.location.href.split('/'),
		host           = pathArray[0] + '//' + pathArray[2] + '/',
		win            = $(window),
		// holder props
		addrHolder     = $('#addr'),
		addrLsHolder   = $('#addr-ls'),
		addrDtHolder   = $('#addr-dt'),
		addrHolderTop  = addrHolder.offset().top,
		lsHolderHeight = addrLsHolder.outerHeight(),
		dtHolderHeight = addrDtHolder.outerHeight(),
		// plugin plug
		dobHolder      = $('#dob'),
		nick           = $('#addrNick'),
		state          = $('#addrState'),
		city           = $('#addrCity'),
		post           = $('#postcode'),
		suburb         = $('#suburb'),
		street         = $('#addrStreet'),
		complex        = $('#addrComplex'),
		type           = $('#addrType'),
		build          = $('#addrBuild'),
		block          = $('#addrBlock'),
		// slider
		midSlide       = 'adr-md',
		rightSlide     = 'adr-rt',
		leftSlide      = 'adr-lf',
		// edit
		btnEdit        = $('.ed-addr'),
		btnCanc        = $('#btn-canc');

	function slide(direction) {
		var rmvOne, addOne, rmvTwo, addTwo, htHold;
		if (direction === 'left') {
			rmvOne = midSlide;   addOne = leftSlide;
			rmvTwo = rightSlide; addTwo = midSlide;
			htHold = addrDtHolder.outerHeight();
		} else if (direction === 'right') {
			rmvOne = leftSlide; addOne = midSlide;
			rmvTwo = midSlide;  addTwo = rightSlide;
			htHold = addrLsHolder.outerHeight();
		}
		addrLsHolder.removeClass(rmvOne).addClass(addOne);
		addrDtHolder.removeClass(rmvTwo).addClass(addTwo);
		addrHolder.height(htHold);
		win.scrollTop(addrHolderTop);
	}

	function matchSelect(haystack, needle) {
		console.log(needle);
		haystack.val(needle);
	}

	function pullAddressData(addressId) {
		$.ajax({
			type    : 'POST',
			url     : host + 'data/get_user_address',
			data    : { 'id' : addressId },
			success : function (data) {
				var jason = $.parseJSON(data),
					plethora, sephora, x, p, s;
				nick.val(jason.addrNick);
				complex.val(jason.addrComplex);
				build.val(jason.addrBuild);
				block.val(jason.addrBlock);

				plethora = [state, city, post, suburb, street, type];
				sephora  = ['addrState', 'addrCity', 'postcode', 'suburb', 'addrStreet', 'addrType'];
				for (x = 0; x < plethora.length; x++) {
					s = sephora[x];
					p = plethora[x];
					matchSelect(p, jason[s]);
					p.chosen({ disable_search_threshold: 8 });
				}
				slide('left');
			},
			error   : function () {
				alert('Connection failed, please try again');
			}
		});
	}

	dobHolder.datepicker();
	addrHolder.height(lsHolderHeight);

	btnEdit.click(function (e) {
		var ths = $(this),
			addressId = ths.parent().parent().attr('data-adid');
		e.preventDefault();
		pullAddressData(addressId);
		return false;
	});

	btnCanc.click(function (e) {
		e.preventDefault();
		slide('right');
		return false;
	});
});