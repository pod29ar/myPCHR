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
				--></span> Speciality Pizza
			</h3>

			<div id="content-hold" class="col-xs-7 col-sm-9">

				<ul class="nav nav-pills nav-justified nav-alc">
					<li class="active"><a href="<?php echo base_url('menu/alacarte/speciality_pizza');?>" class="select-menu">Pizza</a></li>
					<li><a href="<?php echo base_url('menu/alacarte/side_orders');?>" class="select-menu">Side &amp; Condiments</a></li>
					<li><a href="<?php echo base_url('menu/alacarte/beverages');?>" class="select-menu">Beverages</a></li>
				</ul>

				<div class="row">

					<div id="szcr-holder" class="col-md-12 step active">
						<!-- Step 1 - Select Size -->
						<h4 class="dir-head"><span>Step 1/4 - </span>Select Size</h4>
						<div class="row pz-size pz-subtle">
							<h4 class="dir-head"><span>Pizza Size</span></h4>
							<div class="col-md-3 col-sm-6 sz" data-size="personal">
								<div class="size-img">
									<img src="<?php echo base_url('assets/img/size_small.png');?>" class="img-responsive img-circle">
								</div>
								<div class="size-dtl">
									<h5 class="dir-head">Personal</h5>
									<p>6 inch, 1 Person</p>
								</div>
								<div class="menu-sel">
									<span class="glyphicon glyphicon-ok"></span>
								</div>
							</div>

							<div class="col-md-3 col-sm-6 sz" data-size="regular">
								<div class="size-img">
									<img src="<?php echo base_url('assets/img/size_regular.png');?>" class="img-responsive img-circle">
								</div>
								<div class="size-dtl">
									<h5 class="dir-head">Regular</h5>
									<p>8 inch, 2 People</p>
								</div>
								<div class="menu-sel">
									<span class="glyphicon glyphicon-ok"></span>
								</div>
							</div>

							<div class="col-md-3 col-sm-6 sz" data-size="large">
								<div class="size-img">
									<img src="<?php echo base_url('assets/img/size_large.png');?>" class="img-responsive img-circle">
								</div>
								<div class="size-dtl">
									<h5 class="dir-head">Large</h5>
									<p>10 inch, 3 people</p>
								</div>
								<div class="menu-sel">
									<span class="glyphicon glyphicon-ok"></span>
								</div>
							</div>

							<div class="col-md-3 col-sm-6 sz" data-size="xlarge">
								<div class="size-img">
									<img src="<?php echo base_url('assets/img/size_extra_large.png');?>" class="img-responsive img-circle">
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

						<!-- Step 2 - Select Crust -->
						<h4 class="dir-head"><span>Step 2/4 - </span>Select Crust</h4>
						<div class="row pz-crust pz-subtle">
							<?php foreach ($pzCrust as $pzc): ?>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu crust" data-size="<?php echo $pzc['size'];?>" data-price="<?php echo $pzc['price'];?>">
									<h5 class="crust-name"><?php echo $pzc['name'];?></h5>
									<div class="crust-img">
										<img src="<?php echo base_url($pzc['image']);?>" class="img-responsive">
									</div>
									<div class="menu-sel">
										<span class="glyphicon glyphicon-ok"></span>
									</div>
								</div>
							</div>
							<?php endforeach; ?>

							<div class="clearfix"></div>
						</div>
					</div>

					<div id="tppg-holder" class="col-md-12 step">
						<!-- Step 3 - Select Topping -->
						<h4 class="dir-head"><span>Step 3/4 - </span>Select Topping</h4>
						<div class="row pz-topping pz-subtle">
							<!-- Start Personal Pizza Topping -->
							<?php foreach ($pzPersonal as $pzp): ?>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu sel-pz btn-etpg" data-size="<?php echo $pzp['size'];?>" 
									data-price="<?php echo $pzp['price'];?>" data-type="<?php echo $pzp['type'];?>">
									<center>
										<h4 class="menu-name"><?php echo $pzp['name'];?></h4>
										<div class="menu-preview">
											<img src="<?php echo base_url($pzp['image']);?>" class="img-responsive">
										</div>
										<div class="menu-desc">
											<p><?php echo $pzp['desc'];?></p>
										</div>
										<div class="menu-sel">
											<span class="glyphicon glyphicon-ok"></span>
										</div>
									</center>
								</div>
							</div>
							<?php endforeach; ?>

							<!-- Start Other Pizza Topping -->
							<?php foreach ($pzOther as $pzo): ?>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu sel-pz btn-etpg" data-size="<?php echo $pzo['size'];?>" 
									data-price="<?php echo $pzo['price'];?>" data-type="<?php echo $pzo['type'];?>">
									<center>
										<h4 class="menu-name"><?php echo $pzo['name'];?></h4>
										<div class="menu-preview">
											<img src="<?php echo base_url($pzo['image']);?>" class="img-responsive">
										</div>
										<div class="menu-desc">
											<p><?php echo $pzo['desc'];?></p>
										</div>
										<div class="menu-sel">
											<span class="glyphicon glyphicon-ok"></span>
										</div>
									</center>
								</div>
							</div>
							<?php endforeach; ?>

							<div class="clearfix"></div>
						</div>
					</div>

					<div id="cnfr-holder" class="col-md-12 step">
						<!-- Step 4 - Confirmation -->
						<h4 class="dir-head"><span>Step 4/4 - </span>Confirmation</h4>
						<div class="row pz-conf pz-not-subtle">
							<form id="order-form">
								<input type="hidden" name="menu-name" value="">
								<input type="hidden" name="menu-desc" value="">
								<input type="hidden" name="menu-size" value="">
								<input type="hidden" name="menu-topping" value="">
								<input type="hidden" name="menu-price" value="">
								<input type="hidden" name="menu-quantity" value="1">
								<input type="hidden" name="menu-image" value="">
							</form>

							<div class="row pz-prev">
								<center>
									<h3 class="dir-head"><span id="topping-name">Lorem Ipsum</span></h3>
									<div class="col-md-12">
										<img src="http://placehold.it/1200x500" id="topping-img" class="img-responsive">
									</div>
									<div class="menu-description">
										<p id="topping-desc">
											Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
											Donec lorem tellus, vehicula id luctus et, mattis at erat.
										</p>
									</div>
								</center>
							</div>

							<div class="row">
								<div class="col-sm-6">
									<button class="btn btn-blue" id="edt-tppg">Change Topping</button>
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
									<h3 class="dir-head"><span id="totpric">RM 0.00</span></h3>
									<button id="cnf-sel" class="btn btn-lg btn-action">Confirm Selection</button>
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
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/global.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/floatcart.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/pizza.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/pizza-alacarte.js');?>"></script>
</body>
</html>

<?php
/* End of file dominos.php */
/* Location: ./application/views/home/deltake_view.php */
/* By: Taufan Arsyad */
