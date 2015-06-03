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

			<div id="float-meter" class="row">
				<h3 class="dir-head"><span>Menu / Deals / </span> Supper</h3>

				<div id="content-hold" class="col-xs-7 col-sm-9">
					<div class="row">

						<div id="menu-holder" class="col-md-12 menu-holder">
							<!-- Step 1 -->
							<div class="row">
								<h3 class="dir-head"><span>Step 1 - </span>Select Topping</h3>

								<!-- topping 1 -->
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu">
										<a class="sel-pz" href="#">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">Prawn Passion</h4>
												<div class="menu-preview">
													<img src="http://placehold.it/640x480" class="img-responsive">
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

								<!-- topping 2 -->
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu">
										<a class="sel-pz" href="#">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">Beef Pepperoni</h4>
												<div class="menu-preview">
													<img src="http://placehold.it/640x480" class="img-responsive">
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

								<!-- topping 3 -->
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu">
										<a class="sel-pz" href="#">
											<center>
												<!-- Change the value according to your menu -->
												<h4 class="menu-name">Chicken Perfection</h4>
												<div class="menu-preview">
													<img src="http://placehold.it/640x480" class="img-responsive">
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
							<h3 class="dir-head"><span>Step 2 - </span>Select Size</h3>
							<div class="row pz-size pz-subtle">
								<h4 class="dir-head"><span>Pizza Size</span></h4>
								<div class="col-md-3 col-sm-6 sz">
									<div class="size-img">
										<img src="http://placehold.it/60x60" class="img-responsive img-circle">
									</div>
									<div class="size-dtl">
										<h5 class="dir-head">Personal</h5>
										<p>6 inch, 1 Person</p>
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>

								<div class="col-md-3 col-sm-6 sz">
									<div class="size-img">
										<img src="http://placehold.it/80x80" class="img-responsive img-circle">
									</div>
									<div class="size-dtl">
										<h5 class="dir-head">Regular</h5>
										<p>8 inch, 2 People</p>
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>

								<div class="col-md-3 col-sm-6 sz">
									<div class="size-img">
										<img src="http://placehold.it/100x100" class="img-responsive img-circle">
									</div>
									<div class="size-dtl">
										<h5 class="dir-head">Large</h5>
										<p>10 inch, 3 people</p>
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>

								<div class="col-md-3 col-sm-6 sz">
									<div class="size-img">
										<img src="http://placehold.it/120x120" class="img-responsive img-circle">
									</div>
									<div class="size-dtl">
										<h5 class="dir-head">Extra Large</h5>
										<p>12 inch, 4 people</p>
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>
							</div>

							<!-- Step 3 -->
							<h3 class="dir-head"><span>Step 3 - </span>Select Crust</h3>
							<div class="row pz-crust pz-subtle">

								<!-- crust -->
								<!-- Please change it accordingly to fit your menu as well -->
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu crust">
										<h5 class="crust-name">Classic Hand Tossed</h5>
										<div class="crust-img">
											<img src="http://placehold.it/480x480" class="img-responsive">
										</div>
										<div class="menu-sel">
											<span class="glyphicon glyphicon-ok"></span>
										</div>
									</div>
								</div>

								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu crust">
										<h5 class="crust-name">Crunchy Thin Crust</h5>
										<div class="crust-img">
											<img src="http://placehold.it/480x480" class="img-responsive">
										</div>
										<div class="menu-sel">
											<span class="glyphicon glyphicon-ok"></span>
										</div>
									</div>
								</div>

								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu crust">
										<h5 class="crust-name">New York Crust</h5>
										<div class="crust-img">
											<img src="http://placehold.it/480x480" class="img-responsive">
										</div>
										<div class="menu-sel">
											<span class="glyphicon glyphicon-ok"></span>
										</div>
									</div>
								</div>

								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu crust">
										<h5 class="crust-name">Cheese Burst Double Decker</h5>
										<div class="crust-img">
											<img src="http://placehold.it/480x480" class="img-responsive">
										</div>
										<div class="menu-sel">
											<span class="glyphicon glyphicon-ok"></span>
										</div>
									</div>
								</div>

								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="menu crust">
										<h5 class="crust-name">Extreme Edge</h5>
										<div class="crust-img">
											<img src="http://placehold.it/480x480" class="img-responsive">
										</div>
										<div class="menu-sel">
											<span class="glyphicon glyphicon-ok"></span>
										</div>
									</div>
								</div>
								<!-- end of crust -->

							</div>

							<!-- Step 4 -->
							<h3 class="dir-head"><span>Last Step</span></h3>
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
									<button class="btn btn-blue">Edit Topping</button>
									<div class="form-group">
										<label for="quantity">Set Quantity</label>
										<select id="quantity" class="form-control" name="quantity">
											<?php for ($x=1; $x<=5; $x++) {
												echo "<option value=\"${x}\">${x}</option>";
											} ?>
										</select>
									</div>
								</div>
								<div class="col-sm-6">
									<span class="spc-text">Total</span>
									<h3 class="dir-head"><span>RM 25.00</span></h3>
									<button id="cnf-sel" class="btn btn-lg btn-action">Confirm Selection</button>
								</div>
							</div>

						</div>

					</div>
				</div>

				<div id="float-cart" class="col-xs-5 col-sm-3 float-cart">
					<center>
						<h4>My Selection</h4>
					</center>
					<ul id="item"></ul>
					<p id="pre-stat" class="faded pre-stat">0 Item</p>
					<button id="atc" class="btn btn-action atc-btn faded">Add To Cart</button>
				</div>

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
