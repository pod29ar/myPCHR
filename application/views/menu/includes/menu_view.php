<!-- menu filter -->
<?php if ( $page_menu_active == 'pizza'): ?>
	<div class="row pizza-filter"><div class="small-12 columns">
		<?php $this->load->view('menu/includes/_long_filter'); ?>
	</div></div>
<?php endif; ?>

<?php $this->load->view('menu/includes/_pizza_menu'); ?>

<?php $this->load->view('menu/includes/_edit_topping'); ?>
<?php /*
<?php if ($page_menu_active == 'pizza'): ?>
	<!-- edit topping modal -->
	<?php $this->load->view('menu/includes/_edit_topping'); ?>

	<!-- half ligthbox -->
	<div class="meal-lightbox half-lightbox">
		<header class="lb-head">
			<nav class="row">
				<div class="left">
					<span class="left lb-name">Half &amp; Half</span>
				</div>
				<div class="right">
					<button class="button act-cancel lb-cancel">Cancel</button>
				</div>
			</nav>
		</header>
		<section id="level-one" class="lb-boxes-container">
			<div class="lb-boxes">
				<?php $this->load->view('menu/includes/_edit_half');?>
			</div>
		</section>
	</div>
<?php endif; ?>
*/ ?>