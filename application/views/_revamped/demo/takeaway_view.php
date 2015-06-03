<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69941/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form action="<?php echo base_url();?>main/order_start" method="post" role="form">
					<div class="form-group">
						<label for="address">Select the branch to take your order</label>
						<select name="address">
							<option>-Select Branch-</option>
							<?php for ($x=0; $x<count($branch); $x++) { ?>
							<option value="<?php echo $branch[$x];?>"><?php echo $branch[$x];?></option>
							<?php } ?>
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