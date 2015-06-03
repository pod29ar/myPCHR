<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>

	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');
		?>



		<div class="container">

			<div class="gps_tracker">
				
				<h2>GPS Tracker</h2>

				<h3>Ever wondered where your pizza was?</h3>
				<p>Well, at Domino's, The "Pizza Delivery Experts" at Domino's have specifically engineered the "Great Pizza Service" Trackerthat keeps you up to date from the moment you place your order to the moment your pizza leaves the store.</p>

				<h4 class="text-center">Your Order Id: 9071902</h4>

				<ul class="pizza-status">
					<li><span>1</span></li>
					<li><span>2</span></li>
					<li><span>3</span></li>
					<li><span>4</span></li>
					<li><span>5</span></li>
					<li><span>6</span></li>
					<li><span>7</span></li>
				</ul>

				<ul class="pizza-status-text">
					<li>Order Placed</li>
					<li>Preparing</li>
					<li>Baking</li>
					<li>Boxing</li>
					<li>Packing</li>
					<li>Preparing For Delivery</li>
					<li>Delivering</li>
				</ul>

				<br class="clear">
			</div><!-- gps_tracker close -->

			<div class="row">
				<div class="col-md-7">
					<div class="order-feedback">
						<h3>Help Us To Get Better</h3>
						

						<form role="form">

							<div class="form-group">
								<label>How was your online order experience?</label>
								<br />
								<label class="checkbox-inline">
									<input type="radio" name="order-rating" value="option1"> 1
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="order-rating" value="option2"> 2
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="order-rating" value="option3"> 3
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="order-rating" value="option4"> 4
								</label>
								<label class="checkbox-inline">
									<input type="radio" name="order-rating" value="option5"> 5
								</label>
							</div><!-- form-group close -->

							<div class="form-group">
							<label for="order-feedback">You got something to say?</label>
							<input type="email" class="form-control" id="order-feedback" placeholder="">
							</div>
							
							<div class="form-group">
								<input type="submit" class="btn btn-default btn-action" value="Submit">
							</div><!-- form-group close -->

						</form>
					</div><!-- order-feedback close -->
				</div><!-- col-md-7 close -->
				<div class="col-md-5">
					<div class="order-feedback">
						<h3>Track Other Order</h3>

						<form role="form">
							<div class="form-group">
								<label for="order-feedback">Please key in purchaser phone number</label>
								<input type="email" class="form-control" id="order-feedback" placeholder="">
							</div>
							
							<div class="form-group">
								<input type="submit" class="btn btn-default btn-action" value="Submit">
							</div><!-- form-group close -->

						</form>
					</div><!-- order-feedback close -->
				</div><!-- col-md-5 close -->
			</div><!-- row close -->

		</div><!-- container close -->
		
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.pizza-status li').first().addClass('current');

			setInterval(function() { trackerStatus()}, 1000*5);
			function trackerStatus() {
				if ($('.pizza-status li.current')) {
					$('.pizza-status li.current').next().addClass('current');
					$('.pizza-status li.current').prev().removeClass('current');
					$('.pizza-status li.current').transition({
					  perspective: '100px',
					  rotateY: '360deg'
					});
					$('.pizza-status li.current').prev().addClass('done');
				}
			}
		});

	</script>
</body>
</html>

<?php
/* End of file landing_view.php */
/* Location: ./application/views/home/landing_view.php */
/* By: Taufan Arsyad */
?>