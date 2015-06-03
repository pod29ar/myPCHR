<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69943/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>
	
	<div class="container">
		<div class="row">
			<h1>Start</h1>
			<div class="col-md-3">
				<a href="<?php echo base_url();?>main/order_alacarte"><h2>Meal</h2></a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo base_url();?>main/order_alacarte"><h2>Ala Carte</h2></a>
			</div>
			<div class="col-md-3">
				<a href="<?php echo base_url();?>main/order_alacarte"><h2>Redeem</h2></a>
			</div>
			<div class="col-md-3">
				<h4>Pizza Tracker</h4>
				<p id="pizza-track">Ordering</p>
				<br>
				<h4>Order History</h4>
				<ul>
					<?php for ($x=0; $x<count($orderHistory); $x++) { ?>
					<li><?php echo $orderHistory[$x];?></li>
					<?php } ?>
				</ul>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6"><h5>Express Cart</h5></div>
			<div class="col-md-6"><h5>Bank Offer</h5></div>
		</div>

		<?php $this->load->view('includes/bottom');?>
	</div>

	<?php $this->load->view('includes/footer');?>
	<script type="text/javascript">
	</script>
</body>
</html>