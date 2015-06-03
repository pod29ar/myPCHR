<section class="row login-box">
	<div class="small-7 columns">
		<section class="sct left-top">
			<button class="button fb-btn fb-con fb-login">Login with <strong>facebook</strong></button>
		</section>
		<section class="sct left-bottom user-cont">
			<div class="uc-or">OR</div>
			<form action="<?php echo base_url('data/login');?>" method="post">
				<label class="text-center">Login with username</label>
				<div class="row collapse">
					<div class="small-2 columns">
						<span class="prefix"><i class="fa fa-user"></i></span>
					</div>
					<div class="small-10 columns">
						<input type="text" name="name" placeholder="Username">
					</div>
				</div>
				<div class="row collapse">
					<div class="small-2 columns">
						<span class="prefix"><i class="fa fa-unlock-alt"></i></span>
					</div>
					<div class="small-10 columns">
						<input type="password" name="pass" placeholder="Password">
					</div>
				</div>
				<div class="row">
					<div class="small-6 columns login-link">
						<a href="#">Help</a>
						<a href="#">Forgot password?</a>
					</div>
					<div class="small-6 columns">
						<button class="button right logreg">Login</button>
					</div>
				</div>
			</form>
		</section>
	</div>
	<div class="small-5 columns sct right-top">
		<h4 class="lc-head">BENEFIT YOU WILL GET</h4>
		<p class="lc-excerpt">Free pizza on tenth order Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius, risus id imperdiet gravida, est lorem egestas eros, ultricies rhoncus mi arcu ut felis. Not a member?</p>
		<a href="<?php echo base_url('register');?>" class="button logreg">Sign Up</a>
	</div>
</section>