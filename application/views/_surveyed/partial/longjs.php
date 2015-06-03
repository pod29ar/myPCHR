<script src="<?php echo base_url('assets/js/plugs/jquery.carouFredSel-6.2.1-packed.js');?>"></script>
<script src="<?php echo base_url('assets/js/plugs/jquery.bookblock.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.fbconnect.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.home.js');?>"></script>

<script src="<?php echo base_url('assets/js/doms/scr.global.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.flipper.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.lightbox.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.filter.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.half.alacarte.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.additem.meals.js');?>"></script>
<?php if ( ! empty( $pre_selected ) ): ?>
	<script>
	$(document).ready(function () {
		"use strict";
		var item = $('.mb-choice[data-name="<?php echo $pre_selected;?>"]');
		item.trigger('click');
	});
	</script>
<?php endif; ?>

<script src="<?php echo base_url('assets/js/doms/scr.alacarte.menu.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.additem.alacarte.js');?>"></script>
<script src="<?php echo base_url('assets/js/doms/scr.long.js');?>"></script>