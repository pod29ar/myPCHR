<section class="contain-to-grid show-for-medium-up nvb nvb-user">
	<nav class="top-bar" data-topbar>
		<section class="top-bar-section">
			<!-- Right Nav Section -->
			<?php if (empty($username)): ?>
				<ul class="right">
					<li><a href="<?php echo base_url('register');?>">
						<i class="fa fa-facebook"></i>&nbsp;JOIN NOW
					</a></li>
					<li><a href="#" data-reveal-id="login-modal" data-reveal>
						<i class="fa fa-user"></i>&nbsp;LOGIN
					</a></li>
				</ul>
			<?php else: ?>
				<ul class="right">
					<li><a href="#">Order History</a></li>
					<li><a href="#">My Profile</a></li>
					<li><a href="<?php echo base_url('signout');?>">Logout</a></li>
					<li><div class="profile-pic">
						<img src="http://placehold.it/100x100" class="pp-image">
					</div></li>
				</ul>
			<?php endif;?>

			<!-- Left Nav Section -->
			<ul class="left">
				<li class="has-dropdown">
					<a href="#">Language</a>
					<ul class="dropdown">
						<li><a href="#">English</a></li>
					</ul>
				</li>
				<li class="has-dropdown">
					<a href="#">Change Order Info</a>
					<ul class="dropdown">
						<li><a href="#">Order Info</a></li>
					</ul>
				</li>
			</ul>
		</section>
	</nav>
</section>