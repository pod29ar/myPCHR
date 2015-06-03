<nav id="profile-bar" class="navbar navbar-default profile-bar" role="navigation">
	<div class="container">

		<?php if ($username == ''): ?>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<div class="user-action">Don't have a Pizza Profile? <a href="<?php echo base_url();?>register"><!--
					-->Create One<!--
					--></a></div>
				</li>
				<li><a id="sign-in" href="<?php echo base_url('signin');?>">Sign In</a></li>
			</ul>
		<?php else: ?>
			<ul class="nav navbar-nav navbar-right logged-in">
				<li>
					<div class="profile-pic">
						<img src="<?php echo base_url();?>assets/img/profile.png" class="img-responsive">
					</div>

					<div class="user-action">
						<span>Hello <?php echo $username;?></span>
						<a href="<?php echo base_url("profile/${username}");?>">My Profile</a><a href="<?php echo base_url('signout');?>">Sign Out</a>
					</div>
				</li>
				<li class="item-cart">
					<div class="cart-img">
						<!-- change image to correct asset -->
						<img src="<?php echo base_url();?>assets/img/cart.png" class="img-responsive">
					</div>
					<div class="cart-score">
						<p class="cart-int">My Cart</p>
						<h5 id="mycart" class="cart-price"><?php echo $cartprice;?></h5>
					</div>
					<a href="<?php echo base_url('confirmation');?>" class="btn btn-default cart-link">Checkout</a>
					<div class="clearfix"></div>
				</li>
			</ul>
		<?php endif; ?>

	</div>
</nav>

<?php
/* End of file new_profilebar.php */
/* Location: ./application/views/includes/new_profilebar.php */
/* By: Taufan Arsyad */
?>