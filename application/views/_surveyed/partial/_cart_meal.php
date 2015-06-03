<section class="row">
	<div class="small-12 columns">
		<div class="order-section menu-holder">
			<div class="clearfix carter-head">
				<h3 class="left csh-text">My Order Details</h3>
				<button class="button right ch-exco ch-toggler"><i class="fa fa-caret-down"></i><i class="fa fa-angle-down"></i></button>
				<a href="<?php echo base_url('menu');?>" class="button right ch-btm"><i class="fa fa-angle-left"></i>Back to Menu</a>
				<button class="button right ch-chd ch-dto">Check These Deals Too</button>
			</div>
			<?php foreach ($cart as $key => $value): ?>

				<?php for($x=0; $x<count($key); $x++): ?>

					<?php
					$mealName = $key;
					if ($key != 'pizza' && $key != 'side' && $key != 'beverage' && $key != 'condiment' && $key !='extra'):
						$mealItems = $value['item'];
						$mealDetail = $value['detail'];
						$lightbox = TRUE;
						$buttonSplit = '';
					else:
						$mealItems = $value;
						$mealDetail = '';
						$lightbox = FALSE;
						$buttonSplit = 'mc-split';
					endif;

					switch ($key) {
						case 'pizza':     $mealCl = 'pz'; $mealUrl = 'menu/alacarte';            break;
						case 'side':      $mealCl = 'sd'; $mealUrl = 'menu/alacarte/side_order'; break;
						case 'beverage':  $mealCl = 'bv'; $mealUrl = 'menu/alacarte/beverage';   break;
						case 'condiment': $mealCl = 'sd'; $mealUrl = 'menu/alacarte/condiment';  break;
						default:          $mealCl = 'pz'; $mealUrl = 'menu/alacarte';            break;
					}
					?>

					<?php if (isset($mealDetail) && ! empty($mealDetail)): ?>
						<ul style="display:none">
							<?php
							for ($a=0; $a<count($mealDetail['items']); $a++):
								$item = $mealDetail['items'][$a];
								$itemType = $item['type'];
								if ($itemType == 'side')
									$desc = $itemType;
								else
									$desc = $item['size'];

								$icon = 'http://placehold.it/90x90';
								if ($itemType == 'pizza')
									$icon = base_url('assets/img/new_home/pizza_icon_blue.png');
								elseif ($itemType == 'side')
									$icon = base_url('assets/img/new_home/drummet_icon_blue.png');
								elseif ($itemType == 'beverage')
									$icon = base_url('assets/img/new_home/drinks_icon_blue.png');
							?>
								<li class="md-item" data-type="<?php echo $item['type'];?>"
									data-size="<?php echo $item['size'];?>"
									data-desc="<?php echo $item['desc'];?>"
									data-amount="<?php echo $item['amount'];?>">lorem</li>
							<?php endfor;?>
						</ul>
					<?php endif; ?>

					<?php if ($key == 'extra'): ?>
						<div class="clearfix cart-section-head spec-ops" style="display:none;">
					<?php else: ?>
						<div class="clearfix cart-section-head">
					<?php endif;?>

						<span class="left csh-text"><?php echo strtoupper($mealName);?></span>
						<span class="csh-text right caret"><i class="fa fa-caret-down"></i></span>

						<?php if (isset($mealDetail) && ! empty($mealDetail)): ?>
							<span class="csh-text right">RM<?php echo $mealDetail['price'];?></span>
						<?php
						else:
							if (count($mealItems) > 4)
								$cmi = count($mealItems) - 1;
							else
								$cmi = count($mealItems);
							switch ($key) {
								case 'pizza':
									echo '<span class="csh-text right">RM';
									printf('%6.2f', $cmi*10);
									echo '</span>';
									break;
								default:
									echo '<span class="csh-text right">RM';
									printf('%6.2f', $cmi*5);
									echo '</span>';
									break;
							}
						endif;
						?>

						<?php if ($key != 'pizza' && $key != 'side' && $key != 'beverage' && $key != 'condiment' && $key != 'extra'): ?>
							<button class="button right radius crt cart-remove" data-trip="<?php echo $value['trip']; ?>">Remove</button>

							<button class="button right radius crt cart-edit"
								data-name="<?php  echo $mealDetail['name'];?>"
								data-price="<?php echo $mealDetail['price'];?>"
								data-size="<?php  echo $mealDetail['size'];?>">Edit This</button>

							<div class="row right collapse et-counter">
								<div class="small-7 columns">
									<input type="text" name="etc-number" class="etc-number" value="0" disabled="">
								</div>
								<div class="small-5 columns etc-button-holder" data-name="Chicken Pepperoni" data-price="2.00">
									<button class="button etc-button etc-incr"><i class="fa fa-plus"></i></button>
									<button class="button etc-button etc-decr"><i class="fa fa-minus"></i></button>
								</div>
							</div>
						<?php endif; ?>
					</div>

					<?php if ($key == 'extra'): ?>
						<div class="scrooge clearfix spec-ops" style="display:none">
					<?php else: ?>
						<div class="scrooge clearfix">
							<div class="scroll-left scroll left"><span class="caret-fold"><i class="fa fa-caret-left"></i></span></div>
							<div class="scroll-right scroll right"><span class="caret-fold"><i class="fa fa-caret-right"></i></span></div>
					<?php endif;?>
						<!-- begin row card -->
						<div class="row row-card">


							<?php for ($y=0; $y<count($mealItems); $y++): ?>

								<?php
								$item = $mealItems[$y];
								$name = $item['name'];
								$image = $item['image'];
								$desc = $item['desc'];
								$price = $item['price'];
								$type = '';
								$size = '';
								$indic = '';

								if ($key != 'pizza' && $key != 'side' && $key != 'beverage' && $key != 'condiment' && $key != 'extra')
									$trip = $value['trip'];
								else
									$trip = $item['trip'];

								if (array_key_exists('type', $item)) $type = $item['type'];
								if (array_key_exists('size', $item)) $size = $item['size'];
								if (array_key_exists('indicator', $item)) $indic = $item['indicator'];

								$page_menu_active = $item['aka'];
								$sizeOption = explode(' ', $size);

								$clickAction = 'mc-'.$page_menu_active;
								if (isset($lightbox) && $lightbox == TRUE):
									$lightboxAction = 'mc-lightbox';
									$detailId = 'half-detail';
									$toppingId = 'half-topping';
								else:
									$lightboxAction = 'mc-toggle';
									$detailId = 'item-detail';
									$toppingId = 'edit-topping';
								endif;
								?>

								<div class="small-3 columns left card-box" data-trip="<?php echo $trip;?>" data-price="<?php echo $price;?>">

									<!-- front card -->
									<div class="card-holder">
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
															<?php for ($m=0; $m<count($indic); $m++) { ?>
																<li class="mch-item <?php echo $indic[$m];?>"></li>
															<?php } ?>
														</ul>
													</div>
												<?php endif;?>
											</div>

											<?php if ($key == 'pizza' OR $key == 'side' OR $key == 'beverage' OR $key == 'condiment'): ?>
												<a href="#" class="button mc-order <?php echo $clickAction.' '.$lightboxAction.' '.$buttonSplit;?>"
													data-name="<?php  echo $name;?>"
													data-price="<?php echo $price;?>"
													data-type="<?php  echo $page_menu_active;?>"
													data-size="<?php  echo $size;?>"
													data-addon="<?php echo $add_on;?>"
													data-trip="<?php  echo $trip;?>">Edit This</a>
												<a href="#" class="button mc-remove mc-split" data-trip="<?php echo $trip;?>">Remove</a>
											<?php endif; ?>
										</div>

										<!-- back card pizza -->
										<?php if ($lightbox == FALSE): ?>
											<div class="menu-card mc-back">
												<div class="mc-head">
													<h4 class="mch-name"><?php echo $name;?></h4>
													<a href="#" class="mch-headbutt mc-toggle"><i class="fa fa-times"></i></a>
												</div>

												<div class="order-container">
													<form action="#" method="post" class="order-form">
														<?php if (strtolower($page_menu_active) == 'pizza'): ?>
															<!-- size -->
															<div class="row">
																<div class="small-12 columns">
																	<select class="pz-size">
																		<option value="">Pizza Size</option>
																		<?php
																		for ($n=0; $n<count($sizeOption); $n++) {
																			$so = $sizeOption[$n];
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
																	<label>Total <h6 class="pz-price half-sr">RM0.00</h6></label>
																	<button type="submit" class="button pz-edtconf" data-type="<?php echo $page_menu_active;?>">Confirm</button>
																</div>
															</div>
														<?php endif; ?>
													</form>
												</div>
											</div>
										<?php endif; ?>
									</div>

								</div><!-- end menu card -->

								<?php if ($y == (count($mealItems) - 1) &&
								($key == 'pizza' OR $key == 'side' OR $key == 'beverage' OR $key == 'condiment')): ?>
									<div class="small-3 columns left card-box">
										<!-- front card -->
										<div class="card-holder">
											<div class="menu-card mc-front spc-menu">
												<a href="<?php echo base_url($mealUrl);?>" class="card-anchor <?php echo $mealCl;?>">Add More</a>
											</div>
										</div>
									</div><!-- end menu card -->
								<?php endif; ?>

							<?php endfor; ?>

						</div><!-- end row card -->
					</div>

				<?php endfor;?>

			<?php endforeach;?>

		</div>
	</div>
</section>