<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69937/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>
	
	<div class="container">
		<div class="row order-type">
			<div class="col-md-4 col-md-offset-1 delv">
				<a href="<?php echo base_url();?>main/order_way/vry">
					<h2>Delivery</h2>
				</a>
			</div>
			<div class="col-md-2">
				<h2>Or</h2>
			</div>
			<div class="col-md-4 tkway">
				<a href="<?php echo base_url();?>main/order_way/kwy">
					<h2>Take away</h2>
				</a>
			</div>
		</div>

		<?php $this->load->view('includes/bottom');?>
	</div>

	<?php $this->load->view('includes/footer');?>
	<script type="text/javascript">
	</script>
</body>
</html>