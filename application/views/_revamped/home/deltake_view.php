<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');
		if ( ! empty($preOrder)) $btnOrder = 'Continue to Checkout';
		else $btnOrder = 'Start Ordering';?>

		<div class="container">

			<div class="row">
				<div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1">

					<div class="stp-deltk">
						<div class="spc-dir">
							<h2 class="pull-left"><span>Step 1</span></h2>
						</div>

						<ul class="nav nav-pills nav-justified nav-deltake">
							<li class="active"><a href="#del" data-toggle="tab">Delivery</a></li>
							<li><a href="#take" data-toggle="tab">Take Away</a></li>
						</ul>
					</div>

					<div class="tab-content">

						<div class="tab-pane fade in active" id="del">
							<form role="form" id="form_dlv" class="lr-form" action="<?php echo base_url('data/delivery_take');?>" method="post">
							<div class="deltake-cont">
								<input type="hidden" name="deltake" value="delivery">

								<!-- date time -->
								<div class="spc-dir">
									<h2 class="pull-left"><span>Step 2</span> Choose Delivery Date &amp; Time</h2>
								</div>
								<div class="row order-dt">
									<div class="col-sm-6 form-group">
										<label for="orderDate">Date</label>
										<select name="orderDate" class="form-control" id="orderDate">
											<?php
											for ($x=0; $x<count($delDate); $x++) {
												echo "<option value=\"${delDate[$x]}\">${delDate[$x]}</option>";
											}
											?>
										</select>
									</div>
									<div class="col-sm-6 form-group">
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

								<!-- address -->
								<div class="spc-dir">
									<h2 class="pull-left"><span>Step 3</span> Choose My Address</h2>
									<a href="#" class="btn btn-dark pull-right">Manage Address</a>
								</div>
								<ul class="addr-ls">
								<?php $x = 1;
								foreach ($addresses as $array):
									$addrNick = $array['addrNick']; $fullAddr = $array['fullAddr'];
									if ($x == 1): $li = '<li class="row selected">'; $chc = 'checked';
									else:         $li = '<li class="row">';          $chc = '';
									endif;
									echo $li;?>
										<div class="col-sm-10 addr">
											<span class="address_position"><?php echo $x;?></span>
											<h3><?php echo $addrNick;?></h3>
											<span><?php echo $fullAddr;?></span>
										</div>
										<div class="col-sm-2 check">
											<input name="addrNick" type="radio" value="<?php echo $addrNick;?>" class="addrNick" <?php echo $chc;?>>
										</div>
									</li>
									<?php $x++;
								endforeach;?>
								</ul>

								<!-- contact -->
								<div class="spc-dir ccn">
									<h2 class="pull-left"><span>Step 4</span> Choose Contact Number</h2>
								</div>
								<div class="row order-dt">
									<div class="col-sm-6 form-group">
										<label for="orderCon">Contact</label>
										<select name="orderCon" class="form-control" id="orderCon">
											<?php for ($x=0; $x<count($contact); $x++) {
												echo "<option value=\"${contact[$x]}\">${contact[$x]}</option>";
											} ?>
										</select>
									</div>
									<button class="col-md-12 btn btn-lg btn-action st-or"><?php echo $btnOrder;?></button>
								</div>

							</div>
							</form>
						</div>

						<div class="tab-pane fade" id="take">
							<form role="form" id="form_twy" class="lr-form" action="<?php echo base_url('data/delivery_take');?>" method="post">
							<div class="deltake-cont">
								<input type="hidden" name="deltake" value="take away">

								<!-- date time -->
								<div class="spc-dir">
									<h2 class="pull-left"><span>Step 2</span> Choose Take Away Date &amp; Time</h2>
								</div>
								<div class="row order-dt">
									<div class="col-sm-6 form-group">
										<label for="orderDate">Date</label>
										<select name="orderDate" class="form-control" id="orderDate">
											<?php
											for ($x=0; $x<count($delDate); $x++) {
												echo "<option value=\"${delDate[$x]}\">${delDate[$x]}</option>";
											}
											?>
										</select>
									</div>
									<div class="col-sm-6 form-group">
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

								<!-- store -->
								<div class="spc-dir">
									<h2 class="pull-left"><span>Step 3</span> Choose Store Address</h2>
									<a href="#" class="btn btn-dark pull-right">
										<span class="glyphicon glyphicon-map-marker"></span>
									</a>
								</div>
								<ul class="addr-ls">
									<li class="row">
										<div class="col-sm-10 addr">
											<span class="address_position">1</span>
											<h3>BANGI</h3>
											<p><?php echo DOMINO_1;?></p>
										</div>
										<div class="col-sm-2 check">
											<input name="addrNick" type="radio" value="BANGI" class="addrNick">
										</div>
									</li>
									<li class="row">
										<div class="col-sm-10 addr">
											<span class="address_position">2</span>
											<h3>BANGI 2</h3>
											<p><?php echo DOMINO_2;?></p>
										</div>
										<div class="col-sm-2 check">
											<input name="addrNick" type="radio" value="BANGI 2" class="addrNick">
										</div>
									</li>
								</ul>

								<!-- contact -->
								<div class="spc-dir ccn">
									<h2 class="pull-left"><span>Step 4</span> Choose Contact Number</h2>
								</div>
								<div class="row order-dt">
									<div class="col-sm-6 form-group">
										<label for="orderCon">Contact</label>
										<select name="orderCon" class="form-control" id="orderCon">
											<?php for ($x=0; $x<count($contact); $x++) {
												echo "<option value=\"${contact[$x]}\">${contact[$x]}</option>";
											} ?>
										</select>
									</div>
									<button class="col-md-12 btn btn-lg btn-action st-or"><?php echo $btnOrder;?></button>
								</div>

							</div>
							</form>
						</div>

					</div>

				</div>				
			</div>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript">
	$(document).ready(function() {
		$('.addr-ls li').click( function() {
			$('.addr-ls li').removeClass('selected');
			$('.addrNick').prop('checked', false);
			$(this).addClass('selected');
			$(this).find('.addrNick').prop('checked', true);
		});
	});
	</script>
</body>
</html>

<?php
/* End of file dominos.php */
/* Location: ./application/views/home/deltake_view.php */
/* By: Taufan Arsyad */
