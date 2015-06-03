<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>
		<div class="home-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-2">
						<p>Get Free Coupon</p>
						<div class="subscribe-form">
							<form>
								<input type="text" placeholder="Your email...">
								<input type="submit" value="Subscribe">
							</form>
						</div><!-- subscribe-form close -->
					</div><!-- col-md-8 close -->
					<div class="col-md-4">
						<div class="user-location">
							<span></span>
						</div><!-- user-location close -->
					</div><!-- col-md-4 close -->
				</div><!-- row close -->
			</div><!-- container close -->
		</div><!-- home-bar close -->

		<div class="landing-page">
			<img src="<?php echo base_url();?>assets/img/home/yours.png" class="img-responsive">
			<div class="start_now">
				<a href="#" class="btn btn-default">Order Now!</a>
				<p>PS: use "SH1" coupon to get Buy 1 free 1</p>
			</div><!-- start_now close -->
		</div><!-- landing_page close -->

		<div class="container">

			<!-- Small Carousel -->
			<div class="row">

				<div class="col-sm-4 promo-sm">
					<div class="promo-wrap">
						<img src="<?php echo base_url();?>assets/img/home/citibank.jpg" class="img-responsive">
						<div class="promo-text">
							<h3>CitiBank</h3>
							<p>Exclusive online offer only for Citibank card members.</p>
						</div>
					</div><!-- wrap close -->
				</div>

				<div class="col-sm-4 promo-sm">
					<div class="promo-wrap">
						<img src="<?php echo base_url();?>assets/img/home/express_card.jpg" class="img-responsive">
						<div class="promo-text">
							<h3>2014 Express Card</h3>
							<p>Get awesome deal buy purchasing with express card.</p>
						</div>
					</div><!-- wrap close -->
				</div>

				<div class="col-sm-4 promo-sm">
					<div class="promo-wrap">
						<img src="<?php echo base_url();?>assets/img/home/new_store_kuantan.jpg" class="img-responsive">
						<div class="promo-text">
							<h3>New Store</h3>
							<p>We just open our new store in Kuantan.</p>
						</div>
					</div><!-- wrap close -->
				</div>

			</div>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('partials/login_modal');
	$this->load->view('includes/footer');?>

	<?php if (base_url() == PROD_SERVER): ?>
	<script type="text/javascript" src="<?php echo base_url('assets/js/prod/home.js');?>"></script>
	<?php else: ?>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/geoloc.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/prompt-signin.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/fblogin.js');?>"></script>
	<?php endif; ?>
</body>
</html>

<?php
/* End of file landing_view.php */
/* Location: ./application/views/home/landing_view.php */
/* By: Taufan Arsyad */
?>