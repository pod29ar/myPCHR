<!-- main promotions -->
<section class="row main-promo">
	<div class="small-8 columns menu-container">
		<!-- subtle message -->
		<div class="row">
			<div class="small-12 columns">
				<section class="subtle-msg">
					<a href="#">Hi Tom, we have launched a new crust, check em out!</a>
				</section>
			</div>
		</div>

		<!-- menu row 1 -->
		<div class="row">
			<div class="small-6 columns">
				<section class="mc-menu"><a href="<?php echo base_url('menu/meal/');?>">
					<header class="mc-header">
						<h4 class="text-center">Meals</h4>
					</header>
					<div class="mc-content">
						<img src="<?php echo base_url('assets/img/new_home/menu_meals.png');?>">
						<a href="<?php echo base_url('menu/meal/');?>" class="button small">Order Meals</a>
					</div>
				</a></section>
			</div>
			<div class="small-6 columns">
				<section class="mc-menu"><a href="<?php echo base_url('menu/alacarte/');?>">
					<header class="mc-header">
						<h4 class="text-center">A La Carte</h4>
					</header>
					<div class="mc-content">
						<img src="<?php echo base_url('assets/img/new_home/menu_alacarte.png');?>">
						<a href="<?php echo base_url('menu/alacarte/');?>" class="button small">Order A La Carte</a>
					</div>
				</a></section>
			</div>
		</div>

		<!-- menu row 2 -->
		<div class="row">
			<div class="small-6 columns">
				<section class="mc-menu"><a href="<?php echo base_url('menu/coupon/');?>">
					<header class="mc-header">
						<h4 class="text-center">Coupons</h4>
					</header>
					<div class="mc-content">
						<img src="<?php echo base_url('assets/img/new_home/menu_coupon.png');?>">
						<a href="<?php echo base_url('menu/coupon/');?>" class="button small">Redeem Coupon</a>
					</div>
				</a></section>
			</div>
			<div class="small-6 columns">
				<section class="mc-menu"><a href="#">
					<header class="mc-header">
						<h4 class="text-center">Exclusive online offer for citibank card members</h4>
					</header>
					<div class="mc-content">
						<img src="<?php echo base_url('assets/img/new_home/menu_citibank.png');?>">
						<a href="#" class="button small">Order Now!</a>
					</div>
				</a></section>
			</div>
		</div>
	</div>

	<aside class="small-4 columns"><?php
		// $this->load->view('include/side_promo');
		$this->load->view('include/side_personal');
	?></aside>
</section>