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
					--><a href="<?php echo base_url('menu/meal');?>">Meals</a> / <!--
				--></span> Pizza Customization
			</h3>

			<div id="content-hold" class="col-xs-7 col-sm-9">
				<?php if ( ! empty($retrieveDeal['pizza'])): ?>
				<div id="pizza-hold" class="row" style="display:none;">

					<div id="menu-holder" class="col-md-12 menu-holder">
						<!-- Step 1 -->
						<div class="row">
							<h3 class="dir-head"><span>Step 1/3 - </span>Select Topping</h3>

							<!-- start first class pizza-->
							<!-- topping 1 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-etpg" href="#" data-price="3.50">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">7-Meat Wonder</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													7 fantastic toppings; Chicken Pepperoni, Shredded Chicken, Roasted Chicken, Beef Pepperoni, 
													Ground Beef, Beef Sausage, Chicken Potpourri Sausage (Surcharge Applies)
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
									<a class="sel-pz btn-etpg" href="#" data-price="3.50">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Sambal Surf &amp; Turf</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Succulent Prawns marinated in herbs &amp; spices, Shredded Chicken, Juicy Pineapples and 
													Green Peppers on our new and authentic sambal sauce. (Surcharge Applies)
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
									<a class="sel-pz btn-etpg" href="#" data-price="3.50">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Prawn Passion</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Succulent prawns, marinated in Italian herbs and spices, juicy cherry tomatoes &amp; onions 
													on our new pesto passion sauce! (Surcharge Applies)
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
									<a class="sel-pz btn-etpg" href="#" data-price="3.50">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Ultimate Hawaiian</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Loads of delicious roasted chicken, shredded chicken, juicy pineapples and fresh &amp;mushrooms on our brand new pizza sauce (Surcharge Applies)

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
									<a class="sel-pz btn-etpg" href="#" data-price="3.50">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Meatsaurus</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Generous portions of everyone's favorite beef pepperoni, ground beef and fresh &amp;mushrooms on our new blended smoky BBQ sauce (Surcharge Applies)
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
									<a class="sel-pz btn-etpg" href="#" data-price="3.50">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Chicken Perfection</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Delicious roasted chicken breast, fresh mushrooms, juicy cherry tomatoes & onions &amp;on our new pesto passion sauce! (Surcharge Applies)
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
							<!-- end first class pizza-->

							<!-- topping 1 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-etpg" href="#" data-price="0.00">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Sambal Vagie</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Fresh Mushrooms, Green Peppers, Onions, Ripe Olives and Cherry Tomatoes on our new &amp;
													and authentic sambal sauce.
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
									<a class="sel-pz btn-etpg" href="#" data-price="0.00">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">BBQ Chicken</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Succulent shredded chicken, fresh onions, green pepper topped with 100% mozzarella &amp;
													cheese &amp; tangy BBQ sauce.
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
									<a class="sel-pz btn-etpg" href="#" data-price="0.00">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Aloha Chicken</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													100% mozzarella cheese with succulent shredded chicken, and generous amounts &amp;
													of juicy pineapples. Surfs up!
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
									<a class="sel-pz btn-etpg" href="#" data-price="0.00">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Extravaganzza</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Our signature pizza loved by the world. Topped with beef pepperoni, ground beef, &amp;
													fresh onions, green pepper, mushroom and ripe olives. Need we say more?
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
									<a class="sel-pz btn-etpg" href="#" data-price="0.00">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Classified Chicken</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													100% Mozzarella Cheese with Succulent Smoked Chicken Breast, Fresh Onions and Mushrooms
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
									<a class="sel-pz btn-etpg" href="#" data-price="0.00">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Beef Pepperoni</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url().'assets/img/pizza.png';?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													The all time favorite with generous portions of beef pepperoni and 100% mozzarella cheese.
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

					<div id="edit-pizza" class="col-md-12" style="display:none;">

						<!-- Preview -->
						<div class="row pz-prev pz-subtle">
							<center>
								<h3 class="dir-head"><span id="topping-name">Lorem Ipsum</span></h3>
								<div class="col-md-12">
									<img src="http://placehold.it/1200x500" id="topping-img" class="img-responsive">
								</div>
								<div class="menu-desc">
									<p id="topping-desc">
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
										Donec lorem tellus, vehicula id luctus et, mattis at erat.
									</p>
								</div>
							</center>
						</div>

						<!-- Step 2 -->
						<h3 class="dir-head"><span>Step 2/3 - </span>Select Crust</h3>
						<div class="row pz-crust pz-subtle">

							<!-- crust -->
							<!-- Please change it accordingly to fit your menu as well -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<!-- detail the price of the crust here -->
								<div class="menu crust"  data-price="23.80">
									<h5 class="crust-name">Classic Hand Tossed</h5>
									<div class="crust-img">
										<img src="<?php echo base_url().'assets/img/classic_hand.jpg';?>" class="img-responsive">
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>
							</div>

							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu crust" data-price="23.80">
									<h5 class="crust-name">Crunchy Thin Crust</h5>
									<div class="crust-img">
										<img src="<?php echo base_url().'assets/img/crunchy_thin.jpg';?>" class="img-responsive">
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>
							</div>

							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu crust" data-price="23.80">
									<h5 class="crust-name">New York Crust</h5>
									<div class="crust-img">
										<img src="<?php echo base_url().'assets/img/new_york.jpg';?>" class="img-responsive">
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>
							</div>

							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu crust" data-price="28.80"> <!-- 23.80 + 5.00 -->
									<h5 class="crust-name">Cheese Burst Double Decker</h5>
									<div class="crust-img">
										<img src="<?php echo base_url().'assets/img/double_decker.jpg';?>" class="img-responsive">
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>
							</div>

							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu crust"  data-price="28.80"> <!-- 23.80 + 5.00 -->
									<h5 class="crust-name">Extreme Edge</h5>
									<div class="crust-img">
										<img src="<?php echo base_url().'assets/img/classic_hand.jpg';?>" class="img-responsive">
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>
							</div>
							<!-- end of crust -->

						</div>

						<!-- Step 3 -->
						<h3 class="dir-head"><span>Step 3/3 - </span>Confirm Selection</h3>
						<div class="row pz-conf pz-not-subtle">
							<form id="order-form">
								<input type="hidden" name="menu-name" value="">
								<input type="hidden" name="menu-desc" value="">
								<input type="hidden" name="menu-size" value="">
								<input type="hidden" name="menu-crust" value="">
								<input type="hidden" name="menu-price" value="">
								<input type="hidden" name="menu-quantity" value="">
							</form>
							<div class="col-sm-6">
								<button id="btn-retop" class="btn btn-blue">Edit Topping</button>
								<div class="form-group">
									<label for="quantity">Set Quantity</label>
									<select id="quantity" class="form-control" name="quantity" disabled="disabled">
										<?php for ($x=1; $x<=5; $x++) {
											echo "<option value=\"${x}\">${x}</option>";
										} ?>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<span class="spc-text">Total</span>
								<h3 class="dir-head"><span id="totpric">RM 0.00</span></h3>
								<button id="cnf-sel" class="btn btn-lg btn-action">Confirm Selection</button>
							</div>
						</div>

					</div>

				</div>
				<?php endif; ?>

				<?php if ( ! empty($retrieveDeal['sides'])): ?>
				<div id="sides-hold" class="row" style="display:none;">

					<div id="sdbv-holder" class="col-md-12 menu-holder">
						<!-- Step 1 -->
						<div class="row">
							<h3 class="dir-head">Select Side Orders</h3>

							<!-- topping 1 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="5.00">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">The Sides</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url('assets/img/roasted_drumet.png');?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>
													Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
													Donec lorem tellus, vehicula id luctus et, mattis at erat.
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
				<?php endif; ?>

				<?php if ( ! empty($retrieveDeal['beverages'])): ?>
				<div id="beverages-hold" class="row" style="display:none;">

					<div id="sdbv-holder" class="col-md-12 menu-holder">
						<!-- Step 1 -->
						<div class="row">
							<h3 class="dir-head">Select Beverages</h3>

							<!-- topping 1 -->
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="3.00">
										<center>
											<!-- Change the value according to your menu -->
											<h4 class="menu-name">Drinks</h4>
											<div class="menu-preview">
												<img src="<?php echo base_url('assets/img/pepsican.png');?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p>7 Up drinks</p>
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
				<?php endif;?>

			</div>

			<?php $this->load->view('partials/float_cart');?>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript" src="<?php echo base_url('assets/js/pizza.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/deals.js');?>"></script>
</body>
</html>

<?php
/* End of file custom_pizza.php */
/* Location: ./application/views/custom_pizza.php */
/* By: Bazli */
