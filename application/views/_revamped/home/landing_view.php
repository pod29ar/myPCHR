<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>
		<div class="home-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-2">
						<p>Get Free Coupon</p>
						<div class="subscribe-form">
							<form>
								<input type="text">
								<input type="submit" value="Subscribe">
							</form>
						</div><!-- subscribe-form close -->
					</div><!-- col-md-8 close -->
					<div class="col-md-4">
						<div class="user-location">
							<span></span>
						</div><!-- user-location close -->
					</div><!-- col-md-4 close -->
				</div><!-- row close -->
			</div><!-- container close -->
		</div><!-- home-bar close -->

		<div class="container">

			<div class="row">
				<div class="col-md-8">
					<div class="home-image">
						<img src="<?php echo base_url();?>assets/img/home/pizza.png" class="img-responsive">	
					</div><!-- home_image close -->
				</div><!-- col-md-8 close -->
				<div class="col-md-4">
					<div class="home-copy">
						<h2>Hungry?</h2>
						<h3>Try Our New Pizza <a href="#">Chicken Supreme</a></h3>

						<p>PS: use this code SH1 to get 2 Regular Pizza for RM30</p>
					</div><!-- home-copy close -->
				</div><!-- col-md-4 close -->
			</div><!-- row close -->

			<!-- Small Carousel -->
			<div class="row">

				<div class="col-sm-4 promo-sm">
					<div class="promo-wrap">
						<img src="<?php echo base_url();?>assets/img/home/citibank.jpg" class="img-responsive">
						<div class="promo-text">
							<h3>CitiBank</h3>
							<p>Exclusive online offer only for Citibank card members.</p>
						</div>
					</div><!-- wrap close -->
				</div>

				<div class="col-sm-4 promo-sm">
					<div class="promo-wrap">
						<img src="<?php echo base_url();?>assets/img/home/express_card.jpg" class="img-responsive">
						<div class="promo-text">
							<h3>2014 Express Card</h3>
							<p>Get awesome deal buy purchasing with express card.</p>
						</div>
					</div><!-- wrap close -->
				</div>

				<div class="col-sm-4 promo-sm">
					<div class="promo-wrap">
						<img src="<?php echo base_url();?>assets/img/home/new_store_kuantan.jpg" class="img-responsive">
						<div class="promo-text">
							<h3>New Store</h3>
							<p>We just open our new store in Kuantan.</p>
						</div>
					</div><!-- wrap close -->
				</div>

			</div>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript">
		$(document).ready(function() {


			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(successCallback);
				} else {
					$('.user-location').html("Geolocation is not supported by this browser.");
				}
			}

			var successCallback = function(position){
		        var x = position.coords.latitude;
		        var y = position.coords.longitude;
		        displayLocation(x,y);
		      };

			function displayLocation(latitude, longitude){
				var request = new XMLHttpRequest();

				var method = 'GET';
				var url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='+latitude+','+longitude+'&sensor=true';
				var async = true;

				request.open(method, url, async);
				request.onreadystatechange = function(){
					if(request.readyState == 4 && request.status == 200){
						var data = JSON.parse(request.responseText);
						var address = data.results[0];
						//$('.user-location').html('<span>' +address.formatted_address + '<br> Your nearest branch is </span> <a href="#">Bangi</a>');
						$('.user-location').html('<span>Your nearest branch is </span> <a href="#">Bangi</a>');
					}
				};
				request.send();
			};

			getLocation();

		});

	</script>
</body>
</html>

<?php
/* End of file landing_view.php */
/* Location: ./application/views/home/landing_view.php */
/* By: Taufan Arsyad */
?>