<?php if ( is_array($menu) && ! empty($menu)): ?>

	<?php
	$keeper = 0;
	$superKeeper = 0;
	$currentType = '';
	foreach ($menu as $row):
		$name = $row['name'];
		$image = $row['image'];
		$desc = $row['desc'];
		$price = $row['price'];
		$type = '';
		$size = '';
		$indic = '';

		if (array_key_exists('type', $row)) $type = $row['type'];
		if (array_key_exists('size', $row)) $size = $row['size'];
		if (array_key_exists('indicator', $row)) $indic = $row['indicator'];

		$sizeOption = explode(' ', $size);

		$clickAction = 'mc-'.$page_menu_active;
		if ($lightbox == TRUE):
			$lightboxAction = 'mc-lightbox';
			$detailId = 'half-detail';
			$toppingId = 'half-topping';
		else:
			$lightboxAction = 'mc-toggle';
			$detailId = 'item-detail';
			$toppingId = 'edit-topping';
		endif;

		// crazy hack for custom pizza
		$customPizza = '';
		if ( strtolower($type) == 'custom pizza')
			$customPizza = 'custom-pizza ';
		$makeYourOwn = '';
		if ( strtolower($name) == 'make your own')
			$makeYourOwn = 'make-own ';
	?>

		<?php if ( strtolower($type) != strtolower($currentType) ): // add type divisor ?>

			<?php if ($keeper != 0) echo '</div>'; // close unclosed row ?>
			<?php
			if ( strtolower($type) == 'first class'):
				$extraHead = 'Surcharge for Regular (+RM3.50), Large (+RM5.00), and Extra Large (+RM7.00)';
				$strike = 'true';
			else:
				$extraHead = '';
				$strike = 'false';
			endif;
			?>
			<!-- menu header -->
			<div class="row"><div class="small-12 columns">
				<h5 class="deal-head pizza-deal-title <?php echo $customPizza?>"><span><?php echo strtoupper($type); ?></span><?php echo $extraHead;?></h5>
			</div></div>
			<div class="row">

		<?php
			// reset keeper
			$keeper = 0;
		else:
			if ($keeper == 0) echo '<div class="row">';
		endif;
		$currentType = $type;
		?>

		<div class="small-3 columns left card-box <?php echo $customPizza.$makeYourOwn.$opted;?>">

			<div class="card-holder">
				<!-- front card -->
				<div class="menu-card mc-front">
					<div class="mc-img-wrapper">
						<img src="<?php echo base_url($image);?>" class="mc-image">
					</div>

					<div class="mc-head">
						<h4 class="mch-name"><?php echo $name;?></h4>
						<a href="#" class="mch-headbutt mch-info" data-reveal-id="<?php echo $detailId;?>" data-reveal
							data-name="<?php echo $name;?>" data-type="<?php echo $page_menu_active;?>">
							<i class="fa fa-info"></i>
						</a>
						<?php if ( ! empty($indic) ): ?>
							<div class="mch-indicator">
								<ul class="mch-indicate clearfix">
									<?php for ($x=0; $x<count($indic); $x++) { ?>
										<li class="mch-item <?php echo $indic[$x];?>"></li>
									<?php } ?>
								</ul>
							</div>
						<?php endif;?>
					</div>

					<?php if (array_key_exists('new', $row) && $row['new'] == TRUE): ?>
						<div class="mc-indicator">
							<span>New</span>
						</div>
					<?php endif;?>

					<a href="#" class="button mc-order <?php echo $clickAction . ' ' . $lightboxAction;?>"
						data-name="<?php echo $name;?>"
						data-price="<?php echo $price;?>"
						data-type="<?php echo $page_menu_active;?>"
						data-size="<?php echo $size;?>"
						data-addon="<?php echo $add_on;?>">Order This</a>
				</div>

				<!-- back card pizza -->
				<?php if ($lightbox == FALSE): ?>
					<div class="menu-card mc-back">
						<div class="mc-head">
							<h4 class="mch-name"><?php echo $name;?></h4>
							<a href="#" class="mch-headbutt mc-toggle"><i class="fa fa-times"></i></a>
						</div>

						<?php if (array_key_exists('new', $row) && $row['new'] == TRUE): ?>
							<div class="mc-indicator">
								<span>New</span>
							</div>
						<?php endif;?>

						<div class="order-container">
							<form action="#" method="post" class="order-form">
								<?php if (strtolower($page_menu_active) == 'pizza'): ?>
									<!-- size -->
									<div class="row">
										<div class="small-12 columns">
											<select class="pz-size" data-strike="<?php echo $strike; ?>">
												<option value="">Pizza Size</option>
												<?php
												for ($z=0; $z<count($sizeOption); $z++) {
													$so = $sizeOption[$z];
													$so = str_replace('-', ' ', $so);
													if ($so == 'personal')
														$soSize = ' - 6"';
													elseif ($so == 'regular')
														$soSize = ' - 9"';
													elseif ($so == 'large')
														$soSize = ' - 12"';
													elseif ($so == 'extra large')
														$soSize = ' - 15"';
													$value = $so . $soSize;
													$option = ucwords($so) . $soSize;
												?>
													<option value='<?php echo $value;?>'><?php echo $option;?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<!-- crust -->
									<div class="row">
										<div class="small-12 columns">
											<select class="pz-crust">
												<option value="">Select Size First</option>
											</select>
										</div>
									</div>

									<!-- buttons -->
									<div class="row">
										<div class="small-7 columns">
											<?php if ($name == 'Half & Half'): ?>
												<a href="#" class="button btn-edtp pz-topping pz-half">Customize</a>
											<?php else: ?>
												<a href="#" class="button btn-edtp pz-topping" data-reveal-id="<?php echo $toppingId;?>" data-reveal>Edit Topping</a>
											<?php endif; ?>
										</div>
										<div class="small-5 columns">
											<button class="button btn-chse pz-cheese">Cheese</button>
										</div>
									</div>
								<?php endif;?>

								<!-- review -->
								<?php if ($name != 'Half & Half'): ?>
									<div class="row pz-review">
										<!-- quantity -->
										<div class="small-5 columns">
											<label>Quantity</label>
											<div class="row collapse pz-quantity">
												<!-- decrease -->
												<div class="small-3 columns">
													<a href="#" class="button prefix pzq-btn" data-action="decr"><i class="fa fa-minus"></i></a>
												</div>
												<!-- input -->
												<div class="small-6 columns">
													<input type="text" class="pzq-number" name="quantity" value="1" disabled>
												</div>
												<!-- increase -->
												<div class="small-3 columns">
													<a href="#" class="button postfix pzq-btn" data-action="incr"><i class="fa fa-plus"></i></a>
												</div>
											</div>
										</div>

										<!-- Total and deal -->
										<div class="small-7 columns">
											<label>Total <span class="pz-price half-sr">RM0.00</span></label>
											<button type="submit" class="button pz-done" data-type="<?php echo $page_menu_active;?>">Add To Cart</button>
										</div>
									</div>
								<?php endif; ?>
							</form>
						</div>
					</div>
				<?php endif; ?>
			</div>

		</div><!-- end menu card -->
		
		<?php
		if ($superKeeper == (count($menu) - 1)) echo '</div><!-- end menu -->'; // end the menu
		$keeper++;
		$superKeeper++;
		?>

	<?php endforeach; //end loops ?>

<?php else: ?>

	<div class="row">
		<h1>No menu available for the moment.</h1>
		<h4>Please be patient.</h4>
	</div>

<?php endif;?>