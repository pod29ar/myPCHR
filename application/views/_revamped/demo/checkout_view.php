<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69951/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Confirm your order</h2>
				<table class="table">
					<thead>
						<tr>
							<td>NO</td><td>ITEM DETAILS</td><td>QTY</td>
							<td>UNIT PRICE(RM)</td><td>PRICE(RM)</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><?php echo $detail;?></td>
							<td><?php echo $quantity;?></td>
							<td><?php echo $price;?></td>
							<td><?php echo $total;?></td>
						</tr>
					</tbody>
				</table>

				<h4>TOTAL PRICE(RM): <?php echo $total;?></h4>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h2>Order Method</h2>
				<?php if ($selAddr === $this->session->userdata('addr_nick')): ?>
				<h4>Delivery</h4>
				<address>
					<?php
					echo $this->session->userdata('addr_houseNo').' '.
					$this->session->userdata('addr_street').', '.
					$this->session->userdata('addr_suburb').'<br>'.
					$this->session->userdata('addr_city').', '.
					$this->session->userdata('addr_state').' '.
					$this->session->userdata('addr_postcode').'<br>';
					?>
				</address>
				<?php else: ?>
				<address>
					<strong>Domino's, Inc.</strong><br>
					795 Folsom Ave, Suite 600<br>
					San Francisco, CA 94107<br>
					<abbr title="Phone">P:</abbr> (123) 456-7890
				</address>
				<?php endif; ?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<h2>Payment Method</h2>
				<input type="radio">&nbsp;Cash&nbsp;&nbsp;
				<input type="radio">&nbsp;Credit Card&nbsp;&nbsp;
				<input type="radio">&nbsp;Domino's Debit&nbsp;&nbsp;<br><br>
				<label>Change for</label><br>
				<select>
					<option>RM 200</option>
					<option>RM 100</option>
					<option>RM 50</option>
				</select><br><br>

				<a href="<?php echo base_url();?>main/track_pizza" class="btn btn-danger">Confirm Order</a>
			</div>
		</div>

		<?php $this->load->view('includes/bottom');?>
	</div>

	<?php $this->load->view('includes/footer');?>
	<script type="text/javascript">
	</script>
</body>
</html>