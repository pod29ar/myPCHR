<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/header');?>
	<script src="https://usabilitytools.com/clicktracker/script/69947/tracker.js" type="text/javascript" defer="defer" async="async"></script>
</head>
<body>
	<?php $this->load->view('includes/navbar');?>
	<?php
	// print_r($this->session->all_userdata());
	?>
	
	<div class="container">
		<div class="row">
			<div class="btn-group btn-group-justified">
				<a href="#" class="btn btn-default">Meal</a>
				<a href="#" class="btn btn-default">Pizza</a>
				<a href="#" class="btn btn-default">Side Orders</a>
				<a href="#" class="btn btn-default">Beverages</a>
			</div>
		</div>

		<div class="row">
			<div class="col-md-9">
				<div class="tabbable tabs-left spec-tab">

					<ul class="nav nav-tabs">
						<li class="active"><a href="#tab1" data-toggle="tab">Step 1</a></li>
						<li><a href="#tab2" data-toggle="tab">Step 2</a></li>
					</ul>

					<form id="pizza-form" class="pizza-form-a">
						<div class="tab-content">

							<div class="tab-pane active pizza" id="tab1">
								<h4>Select Size &amp; Crust</h4>
								<div class="img-hold">
									<img src="http://placehold.it/200x200" class="img-circle">
								</div>
								<div class="img-desc">
									<h4>Chicken Supreme</h4>
									<p>The most delicious pizza in the realm</p>
								</div>
								<div class="clearfix"></div>
								<table class="table">
									<tr>
										<td><h4>Size</h4></td><td><h4>Crust</h4></td>
									</tr>
									<tr>
										<td><input type="radio" name="size" value="Small">&nbsp;Small</td>
										<td><input type="radio" name="crust" value="NY">&nbsp;NY</td>
									</tr>
									<tr>
										<td><input type="radio" name="size" value="Medium">&nbsp;Medium</td>
										<td><input type="radio" name="crust" value="Thin">&nbsp;Thin</td>
									</tr>
									<tr>
										<td><input type="radio" name="size" value="Large">&nbsp;Large</td>
										<td><input type="radio" name="crust" value="Classic">&nbsp;Classic</td>
									</tr>
								</table>
							</div>

							<div class="tab-pane fade" id="tab2">
								<h4>Edit Topping</h4>
								<table class="table">
									<tr>
										<td>
											<input type="checkbox" name="topping" value="Extra cheese">
											&nbsp;<span>Extra cheese</span>
										</td>
										<td>RM 5.00</td>
										<td>
											<input type="number" name="topping_amt">
										</td>
									</tr>
									<tr>
										<td>
											<input type="checkbox" name="topping" value="Meat">
											&nbsp;<span>Meat</span>
										</td>
										<td>RM 5.00</td>
										<td>
											<input type="number" name="topping_amt">
										</td>
									</tr>
									<tr>
										<td>
											<input type="checkbox" name="topping" value="Pepperoni">
											&nbsp;<span>Pepperoni</span>
										</td>
										<td>RM 5.00</td>
										<td>
											<input type="number" name="topping_amt">
										</td>
									</tr>
								</table>

								<h4>Select Sauces</h4>
								<table class="table">
									<tr>
										<td>
											<input type="radio" name="sauce" value="Top Secret">
											&nbsp;<span>Top Secret</span>
										</td>
										<td>RM 5.00</td>
									</tr>
									<tr>
										<td>
											<input type="radio" name="sauce" value="Presto">
											&nbsp;<span>Presto</span>
										</td>
										<td>RM 5.00</td>
									</tr>
									<tr>
										<td>
											<input type="radio" name="sauce" value="Signature">
											&nbsp;<span>Signature</span>
										</td>
										<td>RM 5.00</td>
									</tr>
									<tr>
										<td>
											<input type="radio" name="sauce" value="Sambal">
											&nbsp;<span>Sambal</span>
										</td>
										<td>RM 5.00</td>
									</tr>
								</table>

								<h4>Pizza Quantity</h4>
								<select name="pz_quantity">
									<?php for ($x=1; $x<=5; $x++) {
										echo '<option value="'.$x.'">'.$x.'</option>';
									} ?>
								</select><br>
								<br>

								<button type="button" id="add-cart" class="btn btn-primary">Add To Cart</button>
							</div>

						</div>
					</form>

					<div class="clearfix"></div>

				</div>
			</div>

			<div class="col-md-3">
				<?php $this->load->view('partials/side_cart');?>
			</div>
		</div>

		<?php $this->load->view('includes/bottom');?>
	</div>

	<?php $this->load->view('includes/footer');?>
	<script type="text/javascript">
	$(document).ready(function () {
		"use strict";

		$('#add-cart').click(function (e) {
			e.preventDefault();
			$.ajax({
				type : 'POST',
				url : '<?php echo base_url();?>main/add_cart',
				data : $('#pizza-form').serializeArray(),
				datatype : 'json',
				success : function (data) {
					var resp = $.parseJSON(data),
						newPizza;
					if (resp.status === 'success') {
						newPizza = $('<tr>' +
							'<td>' + resp.quantity + '</td>' +
							'<td>' + resp.detail + '</td>' +
							'<td>RM ' + resp.price + '</td>' +
							'<td>' +
							'<button class="btn btn-link">' +
							'<span class="glyphicon glyphicon-edit"></span>' +
							'</button>' +
							'<button class="btn btn-rmv btn-link">' +
							'<span class="glyphicon glyphicon-remove"></span>' +
							'</button>' +
							'</td>' +
							'</tr>');
						$('#cart').find('tbody').append(newPizza);
						window.location = '<?php echo base_url();?>main/order_alacarte';
					} else {
						alert(resp.message);
					}
				}
			});
			return false;
		});
	});
	</script>
	<script type="text/javascript">
	$(document).ready(function () {
		"use strict";
		$('#cart').on('click', '.btn-rmv', function (e) {
			e.preventDefault();
			var th = $(this),
				pr = th.parent().parent();
			pr.fadeOut('slow', function() {
				pr.remove();
			});
			return false;
		});
	});
	</script>
</body>
</html>