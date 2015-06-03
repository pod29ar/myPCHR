<nav class="navbar navbar-default" role="navigation">
	<div class="container">

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" 
			data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="<?php echo base_url();?>main">Domino's</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php if ($identifier == 'index'): ?>
					<li class="active"><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="#">Menu</a></li>
					<li><a href="#">Promotion</a></li>
					<li><a href="#">Corporate</a></li>
					<li><a href="#">Store Location</a></li>
					<li><a href="#">Sign Up</a></li>
				<?php else: ?>
					<li><a href="<?php echo base_url();?>">Home</a></li>
					<li><a href="#">Menu</a></li>
					<li><a href="#">Promotion</a></li>
					<li><a href="#">Corporate</a></li>
					<li><a href="#">Store Location</a></li>
					<li><a href="#">Sign Up</a></li>
				<?php endif;?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li>
					<button class="btn btn-primary" data-toggle="modal" 
					data-target="#order-modal">
						Order Now!
					</button>
				</li>
			</ul>
		</div>

	</div>
</nav>