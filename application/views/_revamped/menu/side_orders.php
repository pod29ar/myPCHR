<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div id="float-meter" class="container">
			<h3 class="dir-head">
				<span><!--
					--><a href="<?php echo base_url('menu');?>">Menu</a> / <!--
					--><a href="<?php echo base_url('menu/alacarte');?>">A La Carte</a> / <!--
				--></span> Side &amp; Condiments
			</h3>

			<div id="content-hold" class="col-xs-7 col-sm-9">

				<ul class="nav nav-pills nav-justified nav-alc">
					<li><a href="<?php echo base_url('menu/alacarte/speciality_pizza');?>" class="select-menu">Pizza</a></li>
					<li class="active"><a href="<?php echo base_url('menu/alacarte/side_orders');?>" class="select-menu">Side &amp; Condiments</a></li>
					<li><a href="<?php echo base_url('menu/alacarte/beverages');?>" class="select-menu">Beverages</a></li>
				</ul>

				<div class="row">

					<div id="menu-holder" class="col-md-12 menu-holder">
						<!-- Step 1 -->
						<div class="row">
							<h3 class="dir-head"><span>Step 1 - </span>Select Side Orders</h3>

							<!-- topping 1 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="25.60">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Starter Duo Box</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/starter_box_duo.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Roasted Chicken Drummet (6pcs), Crazy Chicken Crunchies Original
												</p>
											</div>
											<!-- End of value changing -->
											<div class="menu-sel">
												<span class="glyphicon glyphicon-ok"></span>
											</div>
										</center>
									</a>
								</div>
							</div>

							<!-- topping 2 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="44.20">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Starter Box Foursome</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/starter_box_foursome.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Roasted Chicken Drummet (6pcs), Crazy Chicken Crunchies Original,
													Crazy Chicken Crunchies Tom Yam, Garlic Cheese Onion Rings
												</p>
											</div>
											<!-- End of value changing -->
											<div class="menu-sel">
												<span class="glyphicon glyphicon-ok"></span>
											</div>
										</center>
									</a>
								</div>
							</div>

							<!-- topping 3 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="12.80">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Crazy Chicken Crunchies (Original)</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/crazy_chicken_original.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													New Original flavor of our delicious Crazy Chicken Crunchies.
													Tender cuts of succulent chicken breast, marinated and breaded then baked to perfection
												</p>
											</div>
											<!-- End of value changing -->
											<div class="menu-sel">
												<span class="glyphicon glyphicon-ok"></span>
											</div>
										</center>
									</a>
								</div>
							</div>

							<!-- topping 4 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="12.80">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Roasted Chicken Drumet (6pcs)</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/roasted_drumet.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Juicy chicken drummet marinated in dried oregano,
													black pepper and garlic then roasted to perfection
												</p>
											</div>
											<!-- End of value changing -->
											<div class="menu-sel">
												<span class="glyphicon glyphicon-ok"></span>
											</div>
										</center>
									</a>
								</div>
							</div>

							<!-- topping 5 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="5.80">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Garlic Cheese Onion Rings</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/garlic_cheese_onion_ring.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Onion Rings
												</p>
											</div>
											<!-- End of value changing -->
											<div class="menu-sel">
												<span class="glyphicon glyphicon-ok"></span>
											</div>
										</center>
									</a>
								</div>
							</div>

							<!-- topping 6 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="12.80">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Crazy Chicken Crunchies (Tomyam)</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/crazy_chicken_tomyam.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Marinated in authentic Tom Yam spices for that `Crazy` kick!
													Crispy on the outside and packed with flavor on the inside
												</p>
											</div>
											<!-- End of value changing -->
											<div class="menu-sel">
												<span class="glyphicon glyphicon-ok"></span>
											</div>
										</center>
									</a>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<?php $this->load->view('partials/float_cart');?>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript" src="<?php echo base_url('assets/js/pizza.js');?>"></script>
</body>
</html>

<?php
/* End of file dominos.php */
/* Location: ./application/views/home/deltake_view.php */
/* By: Taufan Arsyad */
