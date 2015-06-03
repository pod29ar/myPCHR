<?php
	if ($this->session->userdata('opted') == 'modular')
		$home = base_url('modular');
	elseif ($this->session->userdata('opted') == 'longform')
		$home = base_url('longform');
	else
		$home = base_url();
	?>
	<section class="contain-to-grid show-for-medium-up nvb nvb-menu">
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name">
					<h1><a href="<?php echo $home;?>">
						<img src="<?php echo base_url('assets/img/dominos_logo.png');?>">
					</a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
			</ul>

			<section class="top-bar-section">
				<?php
				switch ($opted) {
					case 'longform':
						$ala_url = '<a href="' . base_url('longform#alacarte') . '" class="long-pass" data-target="#alacarte">Menu</a>';
						$meal_url = '<a href="' . base_url('longform#meal') . '" class="long-pass" data-target="#meal">Promo Meals</a>';
						$ono_url = '<a href="' . base_url('longform#meal') . '" class="button long-pass" data-target="#meal">Order Now</a>';
						break;

					case 'modular':
						if (empty($username))
							$ala_url = '<a href="' . base_url('menu/alacarte') . '">Menu</a>';
						else
							$ala_url = '<a href="' . base_url('menu') . '">Menu</a>';
						$meal_url = '<a href="' . base_url('menu/meal') . '">Promo Meals</a>';
						$ono_url = '<a href="' . base_url('menu/meal') . '" class="button">Order Now</a>';
						break;
					
					default:
						$ala_url = '<a href="' . base_url('menu/alacarte') . '">Menu</a>';
						$meal_url = '<a href="' . base_url('menu/meal') . '">Promo Meals</a>';
						$ono_url = '<a href="' . base_url('menu/meal') . '" class="button">Order Now</a>';
						break;
				}
				?>
				<!-- Left Nav Section -->
				<ul class="left">
					<li><a href="<?php echo $home;?>"><i class="fa fa-home"></i></a></li>
					<li><?php echo $ala_url;?></li>
					<li><?php echo $meal_url;?></li>
					<li><a href="#">Locate Us</a></li>
					<li><a href="#">About Us</a></li>
				</ul>
				<ul class="right cart-container">
					<li class="has-dropdown">
						<a class="cart-button" href="<?php echo base_url('my-cart');?>">
							<span><i class="fa fa-shopping-cart"></i>&nbsp;My Cart</span>
							<?php if (isset($cartprice) && ! empty($cartprice) && $cartprice != 'RM0.00' && $cartprice != 'RM0'): ?>
								<span><?php echo $cartprice;?></span>
							<?php else: ?>
								<span class="prc-cont">Feed Me</span>
							<?php endif;?>
						</a>
						<ul class="dropdown cart-drop">

							<li class="cd-head">
								<div class="row">
									<div class="small-7 columns">
										<h4>My Cart</h4>
									</div>
									<div class="small-5 columns">
										<a href="<?php echo base_url('my-cart');?>" class="button">CHECKOUT NOW</a>
									</div>
								</div>
							</li>

							<li class="cd-content">
								<div class="row"><div class="small-12 columns">
									<ul class="cdc-items">
										<?php
										$subTotal = 0.00;
										if (isset($order) && ! empty($order)):
										?>

											<?php
											for ($x=0; $x<count($order); $x++):
												$item = $order[$x];

												if ($item->type == 'meal'):
													$itemName = $item->name;
													$itemDetail = '';
													if (array_key_exists('items', $item)):
														$itemDetail = 'includes ';
														$mealItems = $item->items;
														for ($y=0; $y<count($mealItems); $y++) {
															$mealItem = $mealItems[$y];
															$name = $mealItem->size.' '.$mealItem->name;
															if ($y == (count($mealItems) - 1))
																$itemDetail .= $name;
															else
																$itemDetail .= $name.', ';
														}
													endif;
													$price = 'RM'.$item->total;
													$quantity = $item->total / $item->total;
													$total = 'RM'.$item->total;
													$subTotal += $item->total;
												else:
													$itemName = $item->size.' '.$item->type.' - '.$item->name;
													$itemDetail = '';
													if (array_key_exists('additional', $item) && ! empty($item->additional->item)):
														$itemDetail = 'added ';
														$additional = $item->additional;
														for ($y=0; $y<count($additional); $y++) {
															if ($y == (count($additional) - 1))
																$itemDetail .= $additional->item[$y];
															else
																$itemDetail .= $additional->item[$y].', ';
														}
													endif;
													$price = 'RM'.$item->price;
													$quantity = $item->total / $item->price;
													$total = 'RM'.$item->total;
													$subTotal += $item->total;
												endif;
											?>
												<li class="cdc-item"><div class="row">
													<div class="small-3 columns">
														<div class="cdc-image">
															<img src="http://placehold.it/90x90">
														</div>
													</div>
													<div class="small-6 columns cdc-detail">
														<h5 class="cdc-name"><?php echo $itemName;?></h5>
														<p class="cdc-desc"><?php echo $itemDetail;?></p>
														<a href="#" class="cdc-edit">Edit</a>
													</div>
													<div class="small-3 columns">
														<h5 class="cdc-price"><?php echo $total;?></h5>
													</div>
												</div></li>
											<?php endfor; ?>

										<?php else: ?>
											<li><h4>No Item</h4></li>
										<?php endif;?>
									</ul>
								</div></div>
							</li>

							<li class="cd-foot">
								<div class="row">
									<div class="small-9 columns">
										<p>Subtotal</p>
									</div>
									<div class="small-3 columns">
										<h5 class="cdc-total">RM<?php echo $subTotal;?></h5>
									</div>
								</div>
							</li>

						</ul>
					</li>
				</ul>
				<ul class="right button-group howto-container">
					<li><a href="#" class="button" data-reveal-id="hint-scenario">How To?</a></li>
					<li><?php echo $ono_url;?></li>
				</ul>
			</section>
		</nav>
	</section>