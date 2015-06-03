<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69939/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="<?php echo base_url();?>main/order_start" method="post" role="form">
					<div class="form-group">
						<label for="address">Select your address to deliver</label>
						<select name="address">
							<option value="">-Select Address-</option>
							<option value="<?php echo $address_nick;?>"><?php echo $address_nick;?></option>
						</select>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
			</div>
		</div>

		<?php $this->load->view('includes/bottom');?>
	</div>

	<?php $this->load->view('includes/footer');?>
	<script type="text/javascript">
	</script>
</body>
</html>