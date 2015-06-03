<?php
if ($username != '') $orderUrl = base_url('begin-order');
else $orderUrl = base_url('signin');
?>

<nav id="main-nav" class="navbar navbar-default main-nav" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" 
			data-target="#navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url();?>">
				<img src="<?php echo base_url();?>assets/img/new_logo.png" class="img-responsive">
			</a>
		</div>

		<div class="collapse navbar-collapse" id="navbar-collapse">
			<ul class="nav navbar-nav">
				<?php if ($username != ''): ?>
				<li><a href="<?php echo base_url('menu');?>">Menu</a></li>
				<?php else: ?>
				<li><a href="<?php echo base_url('preview-menu');?>">Menu</a></li>
				<?php endif; ?>
				<li><a href="<?php echo base_url('promotion');?>">Promotion</a></li>
				<li><a href="http://dominos.com.my/corporate/corporate.aspx">About</a></li>
				<li><a href="<?php echo base_url('stores');?>">Store Location</a></li>

			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo $orderUrl;?>" class="link-order">Order Now</a></li>
				<li><a href="#">How to?</a></li>
			</ul>
		</div>

	</div>
</nav>

<?php
/* End of file new_navbar.php */
/* Location: ./application/views/includes/new_navbar.php */
/* By: Taufan Arsyad */
?>
