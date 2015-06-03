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
			<center><h4><span class="info">Try our new pizza! More info</span></h4></center>

			<!-- Menu Selection -->
			<h3 class="dir-head pull-left">Menu</h3>
			<a href="<?php echo base_url('begin-order');?>" class="btn btn-default pull-right">
				Change Delivery Address and Date
			</a>
			<div class="clearfix"></div>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href="<?php echo base_url('menu/meal');?>" class="mn-cnt">
						<h2 class="mn-title">Meals</h2>
						<div class="mn-img">
							<img src="<?php echo base_url('assets/img/meals.png');?>" class="img-responsive">
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href= "<?php echo base_url('menu/alacarte');?>" class="mn-cnt">
						<h2 class="mn-title">A La Carte</h2>
						<div class="mn-img">
							<img src="<?php echo base_url('assets/img/alacarte.png');?>" class="img-responsive">
						</div>
					</a>
				</div>

				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href= "<?php echo base_url('menu/coupon');?>" class="mn-cnt">
						<h2 class="mn-title">Redeem Coupons</h2>
						<div class="mn-img">
							<img src="<?php echo base_url('assets/img/coupon.png');?>" class="img-responsive">
						</div>
					</a>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href= "#" class="mn-cnt mn-btm">
						<h3 class="mn-title-small">City Bank Online Offer</h3>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href= "#" class="mn-cnt mn-btm">
						<h3 class="mn-title-small">My Favourite</h3>
					</a>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-4">
					<a href= "#" class="mn-cnt mn-btm">
						<h3 class="mn-title-small">Order History</h3>
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

<?php
/* End of file select_menu.php */
/* Location: ./application/views/includes/select_menu.php */
/* By: Arif Tukiman */
?>