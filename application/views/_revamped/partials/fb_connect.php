<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<nav class="navbar navbar-facebook" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">
					<img src="<?php echo base_url();?>assets/img/fb-writing.png">
				</a>
				<button class="btn btn-success">Sign Up</button>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">

				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="inputEmail" class="col-xs-2 control-label">Email</label>
						<div class="col-xs-10">
							<input type="email" class="form-control" id="inputEmail" 
							placeholder="Email">
						</div>
					</div>
					<div class="form-group">
						<label for="inputPassword" class="col-xs-2 control-label">Password</label>
						<div class="col-xs-10">
							<input type="password" class="form-control" id="inputPassword" 
							placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<div class="checkbox">
								<label>
									<input type="checkbox"> Keep me logged in
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-offset-2 col-xs-10">
							<button class="btn btn-primary" data-toggle="modal" 
							data-target="#fb-modal">
								Log in
							</button>
							<span>&nbsp;or&nbsp;</span>
							<button type="submit" class="btn btn-link"><!-- 
						 -->Sign up for Facebook<!--
					 --></button>
						</div>
					</div>
				</form>

			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12 bottom-fb">
				<table class="table">
					<tbody>
						<tr class="_51mx">
							<td><a href="#">About</a></td>
							<td><a href="#">Create Ad</a></td>
							<td><a href="#">Create Page</a></td>
							<td><a href="#">Developers</a></td>
							<td><a href="#">Careers</a></td>
							<td><a href="#">Privacy</a></td>
							<td><a href="#">Cookies</a></td>
							<td><a href="#">Terms</a></td>
							<td><a href="#">Help</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div id="fb-modal" class="modal fade modal-login">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-body">
					<p>
						Domino's will receive the following info:
						your public profile, friend list, email adresses, and birthday.
					</p>
				</div>

				<div class="modal-footer">
					<button type="button" id="fb-okay" class="btn btn-primary">
						Okay
					</button>
					<button type="button" id="fb-cancel" class="btn btn-default">
						Cancel
					</button>
				</div>

			</div>
		</div>
	</div>


	<?php $this->load->view('includes/footer');?>
	<script type="text/javascript">
	$(document).ready(function () {
		"use strict";

		$('#fb-okay').click(function (e) {
			e.preventDefault();
			var name = $('#inputEmail').val(),
				pass = $('#inputPassword').val();
			$.ajax({
				type : 'POST',
				url : '<?php echo base_url();?>data/fb_login',
				data : {
					'name' : name,
					'pass' : pass
				},
				datatype : 'json',
				success : function (data) {
					window.opener.location = "<?php echo base_url();?>register";
					window.close();
				}
			});
			return false;
		});

		$('#fb-cancel').click(function (e) {
			e.preventDefault();
			alert('Facebook connect was declined! Redirecting you to the homepage');
			window.opener.location = "<?php echo base_url();?>";
			window.close();
			return false;
		});
	});
	</script>
</body>
</html>