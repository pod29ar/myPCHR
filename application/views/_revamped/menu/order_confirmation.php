<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div class="container steam">
			<!-- confirmation table -->
			<h3 class="dir-head">Order Confirmation</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="pz-subtle">
						<!-- start table -->
						<h4 class="dir-head">My Order Details</h4>
						<table id="order-table" class="table table-hover table-conf">
							<thead>
								<tr>
									<th>No</th><th>Items</th><th>Price</th><th>Quantity</th><th>Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $nm = 'item-nm'; $pr = 'item-pr'; $qn = 'item-qn';
								for ($x=0; $x<count($order); $x++) { ?>
								<tr class="item">
									<td><?php echo $x+1;?></td>
									<td><?php echo $order[$x]->$nm;?></td>
									<td class="item-price"><?php echo $order[$x]->$pr;?></td>
									<td>
										<input type="number" class="item-quant" name="quantity" maxlength="2" size="2" value="<?php echo $order[$x]->$qn;?>">
										<button type="button" class="btn btn-action">Edit</button>
										<button type="button" class="btn btn-default">Remove</button>
									</td>
									<td><div class="price item-total">RM 30.00</div></td>
								</tr>
								<?php } ?>
								<tr class="no-border total-price">
									<td></td>
									<td colspan="3">Sub Total</td>
									<td id="sub-total" class="price">RM 30.00</td>
								</tr>
								<tr class="no-border">
									<td></td>
									<td colspan="3" class="addon">Prices subject to 6% Government tax</td>
									<td id="tax-price" class="price">RM 1.28</td>
								</tr>
								<tr class="no-border">
									<td></td>
									<td colspan="3" class="addon">Grand Total</td>
									<td id="total-tax" class="price">RM 31.28</td>
								</tr>
								<tr class="no-border">
									<td></td>
									<td colspan="3" class="addon">Rounding Adj</td>
									<td id="rounding-tax" class="price">RM 0.02</td>
								</tr>
								<tr class="grand-total">
									<td></td>
									<td colspan="3" class="addon">Grand Total After Rounding Adj</td>
									<td id="grand-total" class="price">RM 31.28</td>
								</tr>
							</tbody>
						</table>
						<!-- end table -->
						<button class="btn btn-action pull-right auto-scr" data-target="#upsells">Confirmation</button>
						<div class="clearfix"></div>
					</div><!-- pz-subtle close -->
				</div>
			</div>

			<div id="upsells" class="row upsell-combo">
				<div class="col-md-3">
					<div class="sd-name" style="display:none;">Starter Box Duo</div>
					<input type="hidden" class="sd-quant" value="1">
					<div class="pz-subtle text-center">
						<img src="<?php echo base_url('assets/img/upsell/starter-box-duo.png');?>" class="img-responsive">
						<a href="#" class="btn btn-lg btn-action us-side">Add this</a>
					</div><!-- pz-subtle close -->
				</div><!-- col-md-3 close -->
				<div class="col-md-3">
					<div class="sd-name" style="display:none;">Starter Box Four</div>
					<input type="hidden" class="sd-quant" value="1">
					<div class="pz-subtle text-center">
						<img src="<?php echo base_url('assets/img/upsell/starter-box-four.png');?>" class="img-responsive">
						<a href="#" class="btn btn-lg btn-action us-side">Add this</a>
					</div><!-- pz-subtle close -->
				</div><!-- col-md-3 close -->
				<div class="col-md-3">
					<div class="sd-name" style="display:none;">Garlic Cheese Onion Rings</div>
					<input type="hidden" class="sd-quant" value="1">
					<div class="pz-subtle text-center">
						<img src="<?php echo base_url('assets/img/upsell/onion-rings.png');?>" class="img-responsive">
						<a href="#" class="btn btn-lg btn-action us-side">Add this</a>
					</div><!-- pz-subtle close -->
				</div><!-- col-md-3 close -->
				<div class="col-md-3">
					<div class="sd-name" style="display:none;">Chicken Perfection</div>
					<input type="hidden" class="sd-quant" value="1">
					<div class="pz-subtle text-center">
						<img src="<?php echo base_url('assets/img/upsell/pz-perf.png');?>" class="img-responsive">
						<a href="#" class="btn btn-lg btn-action us-side">Add this</a>
					</div><!-- pz-subtle close -->
				</div><!-- col-md-3 close -->
			</div><!-- row close -->

			<div class="row">

				<div class="col-md-7">
					<h3 class="dir-head">Order Method</h3>
					<div class="pz-subtle">
						<div class="row">
							<div class="col-md-8">
								<div class="method-title">Take Away</div>
								<address class="user-address">
									<strong class="addr-head">Bangi 2</strong><br><br>
									Bandar Baru Bangi Branch No. 40,<br>
									Jalan Medan PB2B, Sek 9,<br>
									Pusat Bandar Baru Bangi, 43650,<br>
									Bandar Baru Bangi, Selangor
								</address>
							</div>
							<div class="col-md-4">
								<div class="method-title">Order Date</div>
								<label for="orderDate">Date</label>
								<select name="orderDate" class="form-control" id="orderDate">
									<?php
									for ($x=0; $x<count($delDate); $x++) {
										echo "<option value=\"${delDate[$x]}\">${delDate[$x]}</option>";
									}
									?>
								</select><br>
								<label for="orderTime">Time</label>
								<select name="orderTime" class="form-control" id="orderTime">
									<?php
									for ($x=0; $x<count($delTime); $x++) {
										echo "<option value=\"${delTime[$x]}\">${delTime[$x]}</option>";
									}
									?>
								</select>
							</div>
						</div>
					</div><!-- pz-subtle close -->
				</div>

				<div class="col-md-5">
					<h3 class="dir-head">Payment Method</h3>
					<div class="pz-subtle">
						<input name="payment" type="radio" id="payment_cash">&nbsp;<label for="payment_cash">Cash</label><br>
						<span>Change for&nbsp;</span>
						<select>
							<option>RM 200</option>
							<option>RM 100</option>
							<option>RM 50</option>
							<option>Exact Amount</option>
						</select><br><br>
						<input name="payment" type="radio" id="payment_debit">&nbsp;<label for="payment_debit">Domino's Debit</label><br>
						<input name="payment" type="radio" id="payment_credit">&nbsp;<label for="payment_credit">Credit Card</label>

						<hr>
						<a id="confirm-order" href="<?php echo base_url('gps_tracker');?>" class="btn btn-lg btn-action confirm-order">Confirm My Order</a>

					</div><!-- pz-subtle close -->
				</div>
				
			</div><!-- row close -->

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');?>

	<div id="upsell" class="modal fade upsell">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="btn btn-link pull-right" data-dismiss="modal" aria-hidden="true">Close</button>
					<div class="clearfix"></div>
				</div>
				<div class="modal-body">
					<h2 class="dir-head spc-hd">You might also want these..</h2>
					<div class="row">
						<div class="col-sm-6 addon">
							<img src="<?php echo base_url('assets/img/upsell/crazy-chicken-crunch.png');?>" class="img-responsive">
						</div>
						<div class="col-sm-6 addon">
							<img src="<?php echo base_url('assets/img/upsell/crazy-chicken-tomyam.png');?>" class="img-responsive">
						</div>
					</div>
					<h4 class="dir-head">Today's Online Deal</h4>
					<ul class="addon-list">
						<li class="row sd-item">
							<div class="col-xs-7 sd-name">Crazy Chicken Crunchies (original)</div>
							<div class="col-xs-5 qu">Quantity&nbsp;<input class="sd-quant" type="number" value="1"></div>
						</li>
						<li class="row sd-item">
							<div class="col-xs-7 sd-name">Crazy Chicken Crunchies (tomyam)</div>
							<div class="col-xs-5 qu">Quantity&nbsp;<input class="sd-quant" type="number" value="1"></div>
						</li>
					</ul>
				</div>
				<div class="modal-footer">
					<h4 class="dir-head text-center">Add To Your Order?</h4>
					<div class="text-center">
						<button type="button" class="btn btn-lg btn-default" data-dismiss="modal">Nevermind</button>
						<button id="add-sides" type="button" class="btn btn-lg btn-action">Yes</button>
					</div><!-- text-center close -->
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('includes/footer');?>

	<script type="text/javascript" src="<?php echo base_url('assets/js/conf.js');?>"></script>
</body>
</html>

<?php
/* End of file order_confirmation.php */
/* Location: ./application/views/includes/order_confirmation.php */
/* By: Arif Tukiman */
?>
