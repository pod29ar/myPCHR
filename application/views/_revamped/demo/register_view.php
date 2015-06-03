<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69935/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>

	<?php
	// print_r($this->session->all_userdata());
	?>
	
	<div class="container">
		<div class="row">
			<h1>Fill in your address</h1>
			<form id="reg-form" class="col-md-12" action="<?php echo base_url();?>main/register" 
				method="post" role="form">
				<div class="form-group">
					<input type="text" class="form-control" id="addressNick" name="addressNick" 
					placeholder="Address nickname, e.g.: My house, My office">
				</div>
				<div class="form-group">
					<select class="form-control" name="state">
						<option value="" selected>-Select State-</option>
						<option value="State North">State North</option>
						<option value="State East">State East</option>
						<option value="State South">State South</option>
						<option value="State West">State West</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="pocode">
						<option value="" selected>-Select Post Code-</option>
						<option value="12345">12345</option>
						<option value="67890">67890</option>
						<option value="45678">45678</option>
						<option value="19836">19836</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="city">
						<option value="" selected>-Select City/Town-</option>
						<option value="City North">City North</option>
						<option value="City East">City East</option>
						<option value="City South">City South</option>
						<option value="City West">City West</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="suburb">
						<option value="" selected>-Select Suburb-</option>
						<option value="Suburb North">Suburb North</option>
						<option value="Suburb East">Suburb East</option>
						<option value="Suburb South">Suburb South</option>
						<option value="Suburb West">Suburb West</option>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="street">
						<option value="" selected>-Select Street-</option>
						<option value="Upper Street">Upper Street</option>
						<option value="Rightee Street">Rightee Street</option>
						<option value="Down Street">Down Street</option>
						<option value="Leftee Street">Leftee Street</option>
					</select>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="houseNo" name="houseNo" 
					placeholder="House/Building No.">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" id="completeAddr" name="completeAddr" 
					placeholder="Please enter your complete address if you cannnot find it in the address selection">
				</div>
				<button type="submit" class="btn btn-primary">Register</button>
				<button type="button" id="btn-clear" class="btn btn-default">Clear</button>
			</form>
		</div>
		<?php $this->load->view('includes/bottom');?>
	</div>

	<?php $this->load->view('includes/footer');?>
	<script type="text/javascript">
	$(document).ready(function () {
		"use strict";
		$('#btn-clear').click(function (e) {
			e.preventDefault();
			$('#reg-form')[0].reset();
			return false;
		});
	});
	</script>
</body>
</html>