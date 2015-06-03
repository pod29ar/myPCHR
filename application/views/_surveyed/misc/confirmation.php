<section class="row menu-head">
	<h2 class="mh-title">Payment</h2>
</section>

<!-- last step -->
<section class="row order-section">

	<div class="small-6 columns">
		<h3 class="dir-head">Order Method</h3>

		<div class="row">
			<div class="small-12 columns">
				<div class="steps step-deltake deltake-end">
					<dl class="tabs" data-tab>
						<dd class="active tab-del"><a href="#del" data-toggle="tab">Delivery</a></dd>
						<dd class="tab-tak"><a href="#take" data-toggle="tab">Take Away</a></dd>
						<span class="separator">OR</span>
					</dl>
				</div>
				<div class="addr-cont">
					<button class="button ac-fake">Edit</button>
					<address class="user-address">
						<p><strong class="addr-head">My Home</strong></p>
						<p>Bandar Baru Bangi Branch No. 40,<br>Jalan Medan PB2B, Sek 9,<br>Pusat Bandar Baru Bangi, 43650,<br>Bandar Baru Bangi, Selangor</p>
					</address>
				</div>
			</div>
		</div>
	</div>

	<div class="small-6 columns">
		<h3 class="dir-head">Order Date</h3>

		<div class="row">
			<div class="small-12 columns">
				<label for="orderDate">Date</label>
				<select name="orderDate" class="form-control" id="orderDate"><?php
					for ($x=0; $x<count($delDate); $x++) {
						echo "<option value=\"${delDate[$x]}\">${delDate[$x]}</option>";
					}
				?></select>
			</div>
		</div>
		<div class="row">
			<div class="small-12 columns">
				<label for="orderTime">Time</label>
				<select name="orderTime" class="form-control" id="orderTime"><?php
					for ($x=0; $x<count($delTime); $x++) {
						echo "<option value=\"${delTime[$x]}\">${delTime[$x]}</option>";
					}
				?></select>
			</div>
		</div>
	</div>

</section>

<section class="row">

	<div class="small-5 columns img-attack">
		<div class="img-holder">
			<img src="<?php echo base_url('assets/img/30minutes_sign.png');?>">
		</div>
	</div>

	<div class="small-7 columns pay-attack order-section">
		<h3 class="dir-head">Payment Method</h3>

		<ul class="small-block-grid-3 payment-selection">
			<li><input name="payment" type="radio" class="payment-cl" value="cash" checked>&nbsp;<label for="payment">Cash</label></li>
			<!-- <li><input name="payment" type="radio" class="payment-cl" value="debit">&nbsp;<label for="payment">Domino's Debit</label></li> -->
			<li><input name="payment" type="radio" class="payment-cl" value="credit">&nbsp;<label for="payment">Credit Card</label></li>
		</ul>

		<div class="payment-method">
			<div id="pc-cash" class="payment-container">
				<label>Change for&nbsp;</label>
				<select>
					<option>RM 200</option>
					<option>RM 100</option>
					<option>RM 50</option>
					<option>Exact Amount</option>
				</select>
			</div>
			<div id="pc-debit" class="payment-container" style="display:none">
				<span>Please skip this section and continue to next page</span>
			</div>
			<div id="pc-credit" class="payment-container" style="display:none">
				<div class="row"><div class="small-12 columns">
					<label>Card Number</label>
					<input type="text" placeholder="e.g. 0000-1111-2222-3333">
				</div></div>
				<div class="row">
					<div class="small-4 columns">
						<label>Post Code</label>
						<input type="text">
					</div>
					<div class="small-4 columns">
						<label>Security Code</label>
						<input type="text">
					</div>
					<div class="small-4 columns">
						<label>Expiration Date</label>
						<div class="row">
							<div class="small-6 columns">
								<select>
									<option>01</option>
									<option>02</option>
									<option>03</option>
									<option>04</option>
									<option>05</option>
									<option>06</option>
									<option>07</option>
									<option>08</option>
									<option>09</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
								</select>
							</div>
							<div class="small-6 columns">
								<select>
									<option>14</option>
									<option>15</option>
									<option>16</option>
									<option>18</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<a id="confirm-order" href="<?php echo base_url('gps-tracker');?>" class="button green confirm-order">Confirm My Order</a>
	</div>

</section>


<?php $this->load->view('partial/_hint_credit');?>