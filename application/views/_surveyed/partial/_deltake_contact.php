<div class="row steps step-contact">
	<h5 class="step-head">Choose Contact Number</h5>
	<div class="small-6 columns">
		<label for="orderCon">Contact</label>
		<select name="orderCon" class="form-control" id="orderCon"><?php
			for ($x=0; $x<count($contact); $x++) {
				echo "<option value=\"${contact[$x]}\">${contact[$x]}</option>";
			}
		?></select>
	</div>
</div>

<!-- button -->
<div class="row steps step-button">
	<button class="small-12 button"><?php echo $btn_order;?></button>
</div>