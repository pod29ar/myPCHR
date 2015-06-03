<script src="<?php echo base_url('assets/js/doms/scr.fbconnect.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.global.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.alacarte.menu.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.flipper.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.filter.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.half.alacarte.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.additem.alacarte.js');?>"></script>
<?php if ( isset($item) && ! empty($item)): ?>
	<script>
	$(document).ready(function () {
		"use strict";
		var item = $('.mc-toggle[data-name="<?php echo $item;?>"]'),
			view = $('html, body'),
			target = item.offset().top - 420;
		view.animate({ scrollTop: target }, 1000).promise().done(function () {
			item.trigger('click');
		});
	});
	</script>
<?php endif; ?>