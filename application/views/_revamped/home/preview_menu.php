<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>    
</head>
<body>
	<div class="wrapper spc-back mn-holder">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div class="container">
			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href="<?php echo base_url('menu/alacarte/speciality_pizza');?>" class="mn-cnt">
						<h1 class="mn-title">Speciality Pizza</h1>
						<div class="mn-img">
							<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href= "<?php echo base_url('menu/alacarte/side_orders');?>" class="mn-cnt">
						<h1 class="mn-title">Side Orders &amp; Condiments</h1>
						<div class="mn-img">
							<img src="<?php echo base_url('assets/img/side_orders.png');?>" class="img-responsive">
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href= "<?php echo base_url('menu/alacarte/beverages');?>" class="mn-cnt">
						<h1 class="mn-title">Beverages</h1>
						<div class="mn-img">
							<img src="<?php echo base_url('assets/img/beverages.png');?>" class="img-responsive">
						</div>
					</a>
				</div>
			</div>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript">
	</script>
</body>
</html>