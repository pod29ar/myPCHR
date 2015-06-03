$(document).ready(function() {
	$('.addr-ls li').click( function() {
		$('.addr-ls li').removeClass('selected');
		$('.addrNick').prop('checked', false);
		$(this).addClass('selected');
		$(this).find('.addrNick').prop('checked', true);
	});
});