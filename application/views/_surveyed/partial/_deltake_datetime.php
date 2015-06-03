<div class="row steps step-datetime">
	<h5 class="step-head">Choose Delivery Date &amp; Time</h5>
	<div class="small-6 columns">
		<label for="orderDate">Date</label>
		<select name="orderDate" class="form-control" id="orderDate"><?php
			for ($x=0; $x<count($delDate); $x++) {
				echo "<option value=\"${delDate[$x]}\">${delDate[$x]}</option>";
			}
		?></select>
	</div>
	<div class="small-6 columns">
		<label for="orderTime">Time</label>
		<select name="orderTime" class="form-control" id="orderTime"><?php
			for ($x=0; $x<count($delTime); $x++) {
				echo "<option value=\"${delTime[$x]}\">${delTime[$x]}</option>";
			}
		?></select>
	</div>
</div>