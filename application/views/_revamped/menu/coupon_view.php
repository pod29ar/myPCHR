<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div class="container coupon">
			<h3 class="dir-head">
				<span><!--
					--><a href="<?php echo base_url('menu');?>">Menu</a> / <!--
				--></span> Coupon
			</h3>

			<div id="float-meter" class="row">

				<div class="col-xs-7 col-sm-9">
					<ul class="nav nav-pills nav-justified nav-alc">
						<li class="active"><a href="<?php echo base_url('menu/coupon');?>" class="select-menu">Coupon</a></li>
						<li><a href="<?php echo base_url('menu/express-card');?>" class="select-menu">Express Card</a></li>
					</ul>

					<div class="row">
						<div class="col-sm-12">
							<div class="redeem">

								<?php if (isset($code) && $code == "SH1"):
									$this->load->view('menu/coupon_result');
								else: ?>

								<div class="coupon-status">
									<?php echo $this->session->flashdata('status');?>
								</div>

								<h4 class="code-label-top">Please enter your coupon or promotion code</h4>
								<form method="post" action="<?php echo base_url().'coupon/get_coupon';?>" class="form-inline">
									<div class="row">
										<div class="col-sm-8 form-group">
											<label for="coupon-code" class="sr-only">Coupon Code</label>
											<input id="coupon-code" class="form-control input-code" type="text" name="code"/>
										</div>
										<button class="col-sm-4 btn btn-lg btn-action" type="submit">Submit</button>
									</div>
								</form>
								<div class="code-label-btm">
									Coupon must be presented upon receipt of pizza
								</div>

								<?php endif; ?>

							</div>
						</div>
					</div>
				</div>

				<?php $this->load->view('partials/float_cart');?>

			</div>
		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript" src="<?php echo base_url('assets/js/pizza.js');?>"></script>
</body>
</html>

<!--
	End of file coupon.php
	Location: application/views/coupon.php
	By: Bazli
-->