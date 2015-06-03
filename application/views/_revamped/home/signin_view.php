<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div class="container">

			<!-- Register Panel -->
			<div class="row">
				<center><h3 class="lr-intro">Welcome Back To Domino's!</h3></center>
				
				<div class="col-md-10 centeri">

					<?php if (validation_errors() != ''): ?>
						<h5 class="alert alert-danger"><?php echo validation_errors();?></h5>
					<?php endif;?>

					<div class="row">

						<div class="col-md-7 lr-panel">

							<div class="row ins-panel">
								<div class="col-md-12">
									<h4 class="text-center">Sign In</h4>
									<form role="form" action="<?php echo base_url('data/login');?>" method="post" class="lr-form">
										<div class="form-group">
											<label for="user">Username</label>
											<input name="user" type="text" class="form-control" id="user" value="<?php echo (validation_errors()) ?  set_value('user') : $username;?>">
										</div>
										<div class="form-group">
											<label for="password">Password</label>
											<a href="<?php echo base_url();?>forgot-password"
												class="pull-right">Forgot Password?</a>
											<input name="password" type="password" class="form-control" id="password">
										</div>
										<button type="submit" class="btn btn-action btn-lg pull-right">Sign In</button>
										<div class="checkbox pull-right">
											<label>
												<input type="checkbox">Remember Me&nbsp;&nbsp;
											</label>
										</div>
									</form>
								</div>
							</div>

							<div class="row ins-panel">
								<div class="col-md-12">
									<center>
										<h4 class="lr-note">or you can</h4>
										<button class="btn btn-fb fb-con">Sign In With Facebook</button>
									</center>
								</div>
							</div>
						</div>

						<div class="col-md-5 tool-panel">
							<h4 class="text-center lr-note">
								Don't have an account?<br>
								<a href="<?php echo base_url('register');?>">Create One</a>
							</h4>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/fblogin.js');?>"></script>
</body>
</html>

<?php
/* End of file signin_view.php */
/* Location: ./application/views/home/signin_view.php */
/* By: Taufan Arsyad */
?>