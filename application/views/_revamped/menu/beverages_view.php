<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div class="container">
			<h3 class="dir-head">
				<span><!--
					--><a href="<?php echo base_url('menu');?>">Menu</a> / <!--
					--><a href="<?php echo base_url('menu/alacarte');?>">A La Carte</a> / <!--
				--></span> Beverages
			</h3>

			<div id="float-meter" class="row">
				<div id="content-hold" class="col-xs-7 col-sm-9">

					<ul class="nav nav-pills nav-justified nav-alc">
						<li><a href="<?php echo base_url('menu/alacarte/speciality_pizza');?>" class="select-menu">Pizza</a></li>
						<li><a href="<?php echo base_url('menu/alacarte/side_orders');?>" class="select-menu">Side &amp; Condiments</a></li>
						<li class="active"><a href="<?php echo base_url('menu/alacarte/beverages');?>" class="select-menu">Beverages</a></li>
					</ul>

					<div class="row">

						<div id="menu-holder" class="col-md-12 menu-holder">
							<!-- Step 1 -->
							<div class="row beverages">
								<h3 class="dir-head"><span>Step 1 - </span>Select Beverages</h3>

								<!-- topping 1 -->
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu">
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">7UP</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/7up_bottle.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														7UP Bottle
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

								<!-- topping 1 -->
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu">
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">7UP</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/7up_can.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														7UP Bottle
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
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">100 Plus</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/100_bottle.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														100 Plus
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
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">Revive</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/revive_bottle.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														Revie
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
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">Sprite</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/sprite_bottle.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														Sprite
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
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">Sprite</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/sprite_can.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														Sprite
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
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">Tropicana Twister Orange</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/twister_orange_bottle.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														Tropicana Twister Orange
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
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">PEPSI</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/pepsi_can.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														Pepsi
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
										<a class="sel-pz btn-qatc" href="#" data-price="2.50">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">PEPSI</h4>
												<div class="menu-preview">
													<img src="<?php echo base_url().'assets/img/beverages/pepsi_bottle.png';?>" class="img-responsive">
												</div>
												<div class="menu-desc">
													<p>
														Pepsi
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
