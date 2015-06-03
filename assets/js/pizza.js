$(document).ready(function () {
	"use strict";
	// global var
	var win        = $(window),
		floatCartTop = 10,
		pizzaBtn     = $('.btn-etpg'),
		sizeBtn      = $('.sz'),
		crustBtn     = $('.crust'),
		editBtn      = $('#btn-retop'),
		quantity     = $('#quantity'),
		// pricings
		curTopPrice  = 0.00,
		curSzPrice   = 0.00,
		curCrsPrice  = 0.00,
		price        = 0.00,
		priceCont    = $('#totpric'),
		// form items
		ordForm      = $('#order-form'),
		ordName      = ordForm.children("input[name='menu-name']"),
		ordDesc      = ordForm.children("input[name='menu-desc']"),
		ordSize      = ordForm.children("input[name='menu-size']"),
		ordCrust     = ordForm.children("input[name='menu-crust']"),
		ordPrice     = ordForm.children("input[name='menu-price']"),
		ordQuant     = ordForm.children("input[name='menu-quantity']"),
		currentHolder;

	function getNavigationHeight() {
		var profileBar     = $('#profile-bar'),
			mainNav          = $('#main-nav'),
			profileBarHeight = parseInt(profileBar.height(), 10),
			mainNavHeight    = parseInt(mainNav.outerHeight(), 10),
			mainNavMargin    = parseInt(mainNav.css('margin-bottom'), 10),
			topHeight        = profileBarHeight + mainNavHeight + mainNavMargin - floatCartTop;
		return topHeight;
	}

	function scrollToFix() {
		// get height
		var topHeight    = getNavigationHeight(),
			// get scroll top
			winScroll      = win.scrollTop(),
			// get float cart prop
			floatCart      = $('#float-cart'),
			fauxMetric     = $('#float-meter').offset().left,
			floatCartWidth = floatCart.outerWidth(),
			floatCartRight = fauxMetric;

		if (winScroll > topHeight) {
			floatCart.css({
				'position' : 'fixed',
				'top'      : floatCartTop,
				'right'    : floatCartRight,
				'width'    : floatCartWidth
			});
		} else {
			floatCart.css({
				'position' : 'relative',
				'top'      : '0px',
				'right'    : '0px'
			});
		}
	}

	function repairCartWidth() {
		var newWidth,
			floatCart   = $('#float-cart'),
			fauxMetric  = parseInt($('#float-meter').outerWidth(), 10),
			fauxRight   = '0px',
			win         = $(window),
			winWidth    = parseInt(win.outerWidth(), 10),
			winTreshold = 768,
			// get height
			topHeight   = getNavigationHeight(),
			// get scroll top
			winScroll   = win.scrollTop();

		if (winWidth >= winTreshold) {
			newWidth = parseInt(fauxMetric / 4, 10);
		} else {
			newWidth = parseInt(fauxMetric * 5 / 12, 10);
		}

		if (winScroll > topHeight) {
			fauxRight = $('#float-meter').offset().left;
		}

		floatCart.css({
			'width' : newWidth,
			'right' : fauxRight
		});
	}

	function hideMenu(ths, menu) {
		menu.find('.menu-sel').hide();
		ths.find('.menu-sel').show();
		menu.fadeOut('slow', function () {
			$(this).hide();
		});
	}

	function showEdit(edit) {
		edit.fadeIn('slow', function () {
			$(this).show();
			centerAbsolute(sizeBtn);
		});
	}

	function fillTopping(ths, edit) {
		// get value
		var name   = ths.find('.menu-name').text(),
			preview  = ths.find('.menu-preview').find('img').prop('src'),
			desc     = ths.find('.menu-desc').find('p').text(),
			topPrice = parseFloat(ths.attr('data-price')),
			// preview container
			tpgName  = $('#topping-name'),
			tpgPrev  = $('#topping-img'),
			tpgDesc  = $('#topping-desc');

		// clear description whitespace
		desc = desc.replace(/\s{2,}/g, ' ').trim();

		// fill preview container
		tpgName.text(name);
		tpgPrev.prop('src', preview);
		tpgDesc.text(desc);

		// fill form
		ordName.val(name);
		ordDesc.val(desc);
		ordQuant.val('1');

		// set price
		price -= curTopPrice;
		price += topPrice;
		curTopPrice = topPrice;
		ordPrice.val(price.toFixed(2));
		priceCont.text('RM ' + price.toFixed(2));

		// show what's hidden
		showEdit(edit);
	}

	function fillPizzaSize(ths) {
		var detail = ths.find('.size-dtl'),
			szTerm   = detail.find('h5').text(),
			size     = detail.find('p').text();
		size.split(' ');
		ordSize.val(size[0] + ' inch ' + szTerm + ' Pizza');
		ths.addClass('selected');
		ths.siblings('.selected').removeClass('selected');
	}

	function fillPizzaCrust(ths) {
		var crust    = ths.find('.crust-name').text(),
			crustPrice = parseFloat(ths.attr('data-price'));
		ordCrust.val(crust);
		$('.crust.selected').removeClass('selected');
		ths.addClass('selected');

		price -= curCrsPrice;
		price += crustPrice;
		curCrsPrice = crustPrice;
		ordPrice.val(price.toFixed(2));
		priceCont.text('RM ' + price.toFixed(2));
	}

	function centerAbsolute(sizeBtn) {
		var imgWidth, th,
			img = sizeBtn.find('img');
		img.each(function () {
			th = $(this);
			imgWidth = parseInt(th.width(), 10) / 2;
			th.css('margin-left', '-' + imgWidth + 'px');
		});
	}

	function calcPrice(amount) {
		var totalPrice = amount * price;
		ordPrice.val(price.toFixed(2));
		priceCont.text('RM ' + totalPrice.toFixed(2));
	}

	win.scroll(scrollToFix);
	win.resize(function () {
		repairCartWidth();
	});

	pizzaBtn.click(function (e) {
		e.preventDefault();
		var ths = $(this),
			menu = $('#menu-holder'),
			edit = $('#edit-pizza');
		hideMenu(ths, menu);
		fillTopping(ths, edit);
		return false;
	});

	sizeBtn.click(function (e) {
		var ths = $(this);
		fillPizzaSize(ths);
		return false;
	});

	crustBtn.click(function (e) {
		var ths = $(this);
		fillPizzaCrust(ths);
		return false;
	});

	editBtn.click(function (e) {
		$('#edit-pizza').fadeOut('slow', function () {
			$(this).hide();
		});
		$('#menu-holder').fadeIn('slow', function () {
			$(this).show();
		});
		return false;
	});

	quantity.change(function () {
		calcPrice($(this).val());
	});

	$('#content-hold').children('div').first().show();
});

/* End of file pizza.js */
/* Location: ./assets/js/pizza.js */
/* By: Taufan Arsyad */