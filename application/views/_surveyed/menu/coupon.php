<!-- page menu -->
<section class="row page-menu">
	<div class="small-12 columns"><?php $this->load->view('partial/_page_menu');?></div>
</section>

<!-- title -->
<section class="row menu-head">
	<h2 class="mh-title"><?php echo $coupon_title;?></h2>
</section>

<?php if ($active_view == 'coupon_enter'): ?>

	<!-- coupon container -->
	<section class="row">
		<div class="small-12 columns">

			<div class="row">
				<div class="small-8 columns cp-container">
					<div class="coupon-box">
						<h5 class="cb-head">HOW CAN YOU MISS THIS</h5>
						<p>Redeem your coupon code here:</p>
						<form action="<?php echo base_url('coupon/get_coupon');?>" method="post">
							<input type="text" name="code" placeholder="E.G.: AF1">
							<button class="button" type="submit">Redeem</button>
						</form>
						<p>*Coupon must be presented upon receiving of pizza</p>
					</div>
				</div>
				<div class="small-4 columns ecoupon-container">
					<h5 class="ec-head">E-COUPON</h5>
					<div class="ecoupon-box">
						<p>You have 0 e-coupon</p>
					</div>
				</div>
			</div>

		</div>
	</section>

<?php else: ?>

	<!-- coupon value container -->
	<section class="row">
		<div class="small-12 columns">

			<div class="row">
				<div class="small-8 small-centered columns cp-container clearfix">
					<div class="coupon-box">
						<h5 class="cb-head">HOW CAN YOU MISS THIS</h5>
						<p>Redeem your coupon code here:</p>
						<form action="<?php echo base_url('coupon/get_coupon');?>" method="post">
							<select class="coupon-select">
								<option value="deal-a">Deal A</option>
								<option value="incredible-b">Incredible B</option>
								<option value="combo-c">Combo C</option>
							</select>
							<a href="<?php echo base_url('menu/meal/deal-a');?>" class="button cs-anchor">Redeem</a>
						</form>
						<p>*Coupon must be presented upon receiving of pizza</p>
					</div>
				</div>
			</div>

		</div>
	</section>

<?php endif; ?>