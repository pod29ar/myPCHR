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
				--></span> Beverages
			</h3>

			<div id="content-hold" class="col-xs-7 col-sm-9">

				<ul class="nav nav-pills nav-justified nav-alc">
					<li><a href="<?php echo base_url('menu/alacarte/speciality_pizza');?>" class="select-menu">Pizza</a></li>
					<li><a href="<?php echo base_url('menu/alacarte/side_orders');?>" class="select-menu">Side &amp; Condiments</a></li>
					<li class="active"><a href="<?php echo base_url('menu/alacarte/beverages');?>" class="select-menu">Beverages</a></li>
				</ul>

				<div class="row">

					<div id="menu-holder" class="col-md-12 menu-holder">
						<div class="row">
							<h4 class="dir-head"><span>Step 1 - </span>Select Beverages</h4>

							<?php foreach ($sideOrders as $so):
							$price = explode(' ', $so['price']);?>
							<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="menu">
									<a class="sel-pz btn-qatc" href="#" data-price="<?php echo $so['price'];?>">
										<center>
											<h4 class="menu-name"><?php echo $so['name'];?></h4>
											<h5 class="menu-price">RM <?php echo $price[0];?></h5>
											<div class="menu-preview">
												<img src="<?php echo base_url($so['image']);?>" class="img-responsive">
											</div>
											<div class="menu-desc">
												<p><?php echo $so['desc'];?></p>
											</div>
											<div class="menu-sel">
												<span class="glyphicon glyphicon-ok"></span>
											</div>
										</center>
									</a>
								</div>
							</div>
							<?php endforeach; ?>

							<div class="clearfix"></div>

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
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/sides-alacarte.js');?>"></script>
</body>
</html>

<?php
/* End of file dominos.php */
/* Location: ./application/views/home/deltake_view.php */
/* By: Taufan Arsyad */
