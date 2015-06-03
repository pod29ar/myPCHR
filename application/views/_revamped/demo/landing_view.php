<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69933/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php $this->load->view('partials/carousel');?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<img src="http://placehold.it/350x200">
			</div>
			<div class="col-md-4">
				<img src="http://placehold.it/350x200">
			</div>
			<div class="col-md-4">
				<img src="http://placehold.it/350x200">
			</div>
		</div>

	</div>

	<?php $this->load->view('includes/bottom');?>

	<div id="order-modal" class="modal fade modal-login">
		<div class="modal-dialog">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" 
					aria-hidden="true">&times;</button>
					<h4 class="modal-title">Fill In Your Details</h4>
				</div>

				<div class="modal-body">
					<form class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputEmail" class="col-sm-3 control-label">
								Email
							</label>
							<div class="col-sm-9">
								<input type="email" class="form-control" id="inputEmail" 
								placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-3 control-label">
								Password
							</label>
							<div class="col-sm-9">
								<input type="password" class="form-control" id="inputPassword" 
								placeholder="Password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<button type="submit" class="btn btn-default">Login</button>
								<button id="fb-connect" class="btn btn-primary">
									Login Using Facebook
								</button>
							</div>
						</div>
					</form>
				</div>

				<div class="modal-footer">
					<a class="btn btn-default" href="<?php echo base_url();?>main/register">
						Register
					</a>
					<button type="button" class="btn btn-link" data-dismiss="modal" 
					aria-hidden="true">
						Cancel
					</button>
				</div>

			</div>
		</div>
	</div>

	<?php $this->load->view('includes/footer');?>

	<script type="text/javascript">
	function popitup(url,windowName) {
		var newWindow = window.open(
			url,
			windowName,
			'width=700,height=500,' +
			'toolbar=0,menubar=0,location=0,status=1,' +
			'scrollbars=1,resizable=1,left=0,top=0'
			);
		if (window.focus) newWindow.focus();
		return false;
	}

	$(document).ready(function () {
		"use strict";
		$('#fb-connect').click(function (e) {
			e.preventDefault();
			popitup("<?php echo base_url();?>main/fb_connect", 'Facebook');
			return false;
		})
	});
	</script>
</body>
</html>