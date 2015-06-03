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

			<!-- Login Panel -->
			<div class="row">
				
				<div class="col-md-5 lgn-panel centeri">
					<div class="row">
						<div class="col-md-12 nm-lgn">
							<center><h4>Forgot Password?</h4></center>
							<form role="form" action="#" method="post" class="lr-form">
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email">
								</div>
								<button type="submit" class="btn btn-action btn-lg pull-right">Submit</button>
							</form>
						</div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript">
	</script>
</body>
</html>

<?php
/* End of file pass_forgot_view.php */
/* Location: ./application/views/home/pass_forgot_view.php */
/* By: Taufan Arsyad */
?>