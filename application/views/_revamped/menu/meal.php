<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper meal-main">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div class="container">

			<div class="serve-size">
				<span class="menu-meal">
					<a href="<?php echo base_url().'selectmenu';?>">Menu</a> / <b>Meals</b>
				</span>

				<select class="form-control serve-select">
					<option>All</option>
					<option>2 - 3 People</option>
					<option>3 - 4 People</option>
					<option>4 - 5 People</option>
					<option>5 - 6 People</option>
					<option>7 - 8 People</option>
					<option>9 - 10 People</option>
					<option>11 People</option>
					<option>13 People</option>
				</select>
			</div>

			<div class="pizza-deal-title">
				2 PIZZA DEALS
			</div>

			<!-- Deal Selection -->
			<div class="row deal-select">
				<div class="row">

					<div class="col-md-4 promo-sm">
						<div class="image">
							<a href="<?php echo base_url().'meal/deal_1';?>">
								<img src="<?php echo base_url().'assets/img/white_box.png';?>" class="img-responsive">
							</a>
							<a href="#deal_1">
								<button type="button" class="form-control add-button">
									<span class="add-label">Add To Order</span>
								</button>
							</a>
						</div>
						<div class="promo-label">
							2 REGULAR PIZZAS WITH EXTRA CHEESE @ RM30 ONLY!
						</div>
					</div>

					<div class="col-md-4 promo-sm">
						<div class="image">
							<a href="<?php echo base_url().'meal/deal_2';?>">
								<img src="<?php echo base_url().'assets/img/white_box.png';?>" class="img-responsive">
							</a>
							<a href="#deal_2">
								<button type="button" class="form-control add-button">
									<span class="add-label">Add To Order</span>
								</button>
							</a>
						</div>
						<div class="promo-label">
							2 LARGE PIZZAS WITH EXTRA CHEESE @ RM50 ONLY!
						</div>
					</div>

					<div class="col-md-4 promo-sm">
						<div class="image">
							<a href="<?php echo base_url().'meal/deal_3';?>">
								<img src="<?php echo base_url().'assets/img/white_box.png';?>" class="img-responsive">
							</a>
							<a href="#deal_3">
								<button type="button" class="form-control add-button">
									<span class="add-label">Add To Order</span>
								</button>
							</a>
						</div>
						<div class="promo-label">
							2 EXTRA LARGE PIZZAS WITH EXTRA CHEESE @ RM70 ONLY!
						</div>
					</div>

				</div>
				<br><br>
				<div class="row">

					<div class="col-md-4 promo-sm">
						<div class="image">
							<a href="<?php echo base_url().'meal/deal_4';?>">
								<img src="<?php echo base_url().'assets/img/white_box.png';?>" class="img-responsive">
							</a>
							<a href="#deal_4">
								<button type="button" class="form-control add-button">
									<span class="add-label">Add To Order</span>
								</button>
							</a>
						</div>
						<div class="promo-label">
							2 REGULAR PIZZAS WITH EXTRA CHEESE @ RM30 ONLY!
						</div>
					</div>

					<div class="col-md-4 promo-sm">
						<div class="image">
							<a href="<?php echo base_url().'meal/deal_5';?>">
								<img src="<?php echo base_url().'assets/img/white_box.png';?>" class="img-responsive">
							</a>
							<a href="#deal_5">
								<button type="button" class="form-control add-button">
									<span class="add-label">Add To Order</span>
								</button>
							</a>
						</div>
						<div class="promo-label">
							2 LARGE PIZZAS WITH EXTRA CHEESE @ RM50 ONLY!
						</div>
					</div>

					<div class="col-md-4 promo-sm">
						<div class="image">
							<a href="<?php echo base_url().'meal/deal_6';?>">
								<img src="<?php echo base_url().'assets/img/white_box.png';?>" class="img-responsive">
							</a>
							<a href="#deal_6">
								<button type="button" class="form-control add-button">
									<span class="add-label">Add To Order</span>
								</button>
							</a>
						</div>
						<div class="promo-label">
							2 EXTRA LARGE PIZZAS WITH EXTRA CHEESE @ RM70 ONLY!
						</div>
					</div>

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

<!--
	End of file meal.php
	Location: application/views/meal.php
	By: Bazli
-->