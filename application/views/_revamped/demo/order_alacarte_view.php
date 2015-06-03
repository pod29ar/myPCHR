<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69945/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>
	<?php
	// print_r($this->session->all_userdata());
	?>
	
	<div class="container">
		<div class="row">
			<div class="btn-group btn-group-justified">
				<a href="#" class="btn btn-default">Meal</a>
				<a href="#" class="btn btn-default">Pizza</a>
				<a href="#" class="btn btn-default">Side Orders</a>
				<a href="#" class="btn btn-default">Beverages</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-9">

				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3">
								<h4>Price Guide</h4>
								<ul>
									<li>Small - RM10</li>
									<li>Medium - RM20</li>
									<li>Large - RM30</li>
								</ul>
							</div>
							<div class="col-md-9 pizza-prev">
								<img src="http://placehold.it/80x80" class="img-circle">
								<img src="http://placehold.it/100x100" class="img-circle">
								<img src="http://placehold.it/140x140" class="img-circle">
							</div>
						</div>
					</div>
				</div>

				<div class="row spec-menu">
					<div class="col-md-4">
						<a href="<?php echo base_url();?>main/pizza_detail">
							<h4>New Topping</h4>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>main/pizza_detail">
							<h4>Make Your Own</h4>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>main/pizza_detail">
							<h4>Half &amp; Half</h4>
						</a>
					</div>
				</div>

				<div class="row spec-menu">
					<div class="col-md-4">
						<a href="<?php echo base_url();?>main/pizza_detail">
							<h4>Sambal</h4>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>main/pizza_detail">
							<h4>Tandori Chicken</h4>
						</a>
					</div>
					<div class="col-md-4">
						<a href="<?php echo base_url();?>main/pizza_detail">
							<h4>Tuna</h4>
						</a>
					</div>
				</div>

			</div>

			<div class="col-md-3">
				<?php $this->load->view('partials/side_cart');?>
			</div>
		</div>

		<?php $this->load->view('includes/bottom');?>
	</div>

	<?php $this->load->view('includes/footer');?>
	<script type="text/javascript">
	</script>
</body>
</html>