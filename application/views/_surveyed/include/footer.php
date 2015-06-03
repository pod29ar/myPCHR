<?php
if ($this->session->userdata('opted') == 'modular')
	$home = base_url('dominos');
elseif ($this->session->userdata('opted') == 'longform')
	$home = base_url('longform');
else
	$home = base_url();
?>
<footer class="footer">
	<!-- first row -->
	<section class="row row-top">
		<div class="small-9 columns left-top">
			<div class="logo-container">
				<img src="<?php echo base_url('assets/img/dominos_logo.png');?>">
			</div>
			<div class="copy-container">
				<h5 class="cc-copy">DOMINO'S MALAYSIA</h5>
				<h4 class="cc-copy">1300-888-333</h4>
			</div>
		</div>
		<div class="small-3 columns right-top">
			<p>We Accept</p>
			<p><img src="<?php echo base_url('assets/img/cards.png');?>"></p>
		</div>
	</section>

	<!-- second row -->
	<section class="row row-btm">
		<div class="small-9 columns left-btm">
			<nav class="top-bar" data-topbar>
				<section class="top-bar-section">
					<ul class="left">
						<li><a href="<?php echo $home;?>">Home</a></li>
						<?php if (empty($username)): ?>
							<li><a href="<?php echo base_url('menu/alacarte/');?>">Menu</a></li>
						<?php else: ?>
							<li><a href="<?php echo base_url('menu/');?>">Menu</a></li>
						<?php endif;?>
						<li><a href="#">Join Our Team</a></li>
						<li><a href="#">Corporate</a></li>
						<li><a href="#">Terms of Use</a></li>
						<li><a href="#">Contact</a></li>
					</ul>
				</section>
			</nav>
			<p>Our food is verified by the Department of Islamic Development Malaysia (Jakim).</p>
			<p>Prices are subject to 6% Government Tax. &copy; 2014 Domino's Pizza Malaysia.</p>
		</div>
		<div class="small-3 columns right-btm">
			<p>Find us on Social Network</p>
			<ul class="small-block-grid-4">
				<li class="smb-item"><a class="fb" href="#"><i class="fa fa-facebook"></i></a></li>
				<li class="smb-item"><a class="gp" href="#"><i class="fa fa-google-plus"></i></a></li>
				<li class="smb-item"><a class="ig" href="#"><i class="fa fa-instagram"></i></a></li>
				<li class="smb-item"><a class="tw" href="#"><i class="fa fa-twitter"></i></a></li>
			</ul>
		</div>
	</section>
</footer>