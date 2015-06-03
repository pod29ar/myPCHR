// hosts
var pathArray = window.location.href.split('/'),
	host        = pathArray[0] + '//' + pathArray[2] + '/',
	floatCart   = $('#floatCart'),
	cartForm    = $('#cart-form'),
	btnAction   = $('#atc'),
	views       = $('html, body');

function htmlspecialchars (string, quote_style, charset, double_encode) {
	// http://kevin.vanzonneveld.net
	// +   original by: Mirek Slugen
	// +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +   bugfixed by: Nathan
	// +   bugfixed by: Arno
	// +    revised by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
	// +    bugfixed by: Brett Zamir (http://brett-zamir.me)
	// +      input by: Ratheous
	// +      input by: Mailfaker (http://www.weedem.fr/)
	// +      reimplemented by: Brett Zamir (http://brett-zamir.me)
	// +      input by: felix
	// +    bugfixed by: Brett Zamir (http://brett-zamir.me)
	// %        note 1: charset argument not supported
	// *     example 1: htmlspecialchars("<a href='test'>Test</a>", 'ENT_QUOTES');
	// *     returns 1: '&lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;'
	// *     example 2: htmlspecialchars("ab\"c'd", ['ENT_NOQUOTES', 'ENT_QUOTES']);
	// *     returns 2: 'ab"c&#039;d'
	// *     example 3: htmlspecialchars("my "&entity;" is still here", null, null, false);
	// *     returns 3: 'my &quot;&entity;&quot; is still here'
	var optTemp = 0,
		i = 0,
		noquotes = false;
	if (typeof quote_style === 'undefined' || quote_style === null) {
		quote_style = 2;
	}
	string = string.toString();
	if (double_encode !== false) { // Put this first to avoid double-encoding
		string = string.replace(/&/g, '&amp;');
	}
	string = string.replace(/</g, '&lt;').replace(/>/g, '&gt;');

	var OPTS = {
		'ENT_NOQUOTES': 0,
		'ENT_HTML_QUOTE_SINGLE': 1,
		'ENT_HTML_QUOTE_DOUBLE': 2,
		'ENT_COMPAT': 2,
		'ENT_QUOTES': 3,
		'ENT_IGNORE': 4
	};
	if (quote_style === 0) {
		noquotes = true;
	}
	if (typeof quote_style !== 'number') { // Allow for a single string or an array of string flags
		quote_style = [].concat(quote_style);
		for (i = 0; i < quote_style.length; i++) {
			// Resolve string input to bitwise e.g. 'ENT_IGNORE' becomes 4
			if (OPTS[quote_style[i]] === 0) {
				noquotes = true;
			}
			else if (OPTS[quote_style[i]]) {
				optTemp = optTemp | OPTS[quote_style[i]];
			}
		}
		quote_style = optTemp;
	}
	if (quote_style & OPTS.ENT_HTML_QUOTE_SINGLE) {
		string = string.replace(/'/g, '&#039;');
	}
	if (!noquotes) {
		string = string.replace(/"/g, '&quot;');
	}

	return string;
}

function submitForm() {
	var inputs = cartForm.find('input'),
		atom     = [],
		proton   = {},
		otfForm;
	inputs.each(function () {
		var ths = $(this),
			key   = ths.attr('name'),
			value = ths.val();
		proton[key] = value;
		if (key === 'item-qn') {
			atom.push(proton);
			proton = {};
		}
	});

	atom = JSON.stringify(atom);
	atom = htmlspecialchars(atom, 'ENT_QUOTES');

	otfForm = $('<form method="post" action="' + host + 'data/ordered">' +
		'<input type="hidden" name="orders" value="' + atom + '">' +
		'</form>');
	otfForm.appendTo(floatCart);
	otfForm.submit();
}

function enableAction() {
	btnAction.removeClass('faded');
	btnAction.bind('click');
	btnAction.click(function (e) {
		e.preventDefault();
		submitForm();
		return false;
	});
}

function scrollToTop() {
	views.animate({scrollTop: '0px'}, 500);
}

function hiding(item, time) {
	item.fadeOut(time, function () { $(this).hide(); });
}

function showing(item, time) {
	item.fadeIn(time, function () { $(this).show(); });
}