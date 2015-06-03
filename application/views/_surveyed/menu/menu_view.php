<!-- menu filter -->
<?php if ( $page_menu_active == 'pizza'): ?>
	<div class="row pizza-filter"><div class="small-12 columns">
		<?php
		if ($this->session->userdata('opted') == 'modular')
			$this->load->view('partial/_pizza_filter');
		elseif ($this->session->userdata('opted') == 'longform')
			$this->load->view('partial/_long_filter');
		?>
	</div></div>
<?php endif; ?>

<?php $this->load->view('partial/_pizza_menu'); ?>

<!-- item detail modal -->
<?php $this->load->view('partial/_item_detail'); ?>
<!-- half detail modal -->
<?php $this->load->view('partial/_half_detail'); ?>


<?php if ($page_menu_active == 'pizza'): ?>
	<!-- edit topping modal -->
	<?php $this->load->view('partial/_edit_topping'); ?>
	<!-- half topping modal -->
	<?php //$this->load->view('partial/_half_topping'); ?>

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
				<?php $this->load->view('partial/_edit_half');?>
			</div>
		</section>
	</div>
<?php endif; ?>
