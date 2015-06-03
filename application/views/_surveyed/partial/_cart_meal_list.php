<section class="row order-section cart-order">
	<div class="small-12 columns">
		<div class="clearfix carter-head">
			<h3 class="left csh-text">My Order Details</h3>
			<a href="<?php echo base_url('menu');?>" class="button right ch-btm" style="margin-right:0"><i class="fa fa-angle-left"></i>Back to Menu</a>
			<button class="button right ch-chd ch-dto">Check These Deals Too</button>
		</div>

		<table class="tablature">
			<thead>
				<tr>
					<td class="tab-number">No</td>
					<td class="tab-items">Items</td>
					<td class="tab-price">Price</td>
					<td class="tab-quantity">Quantity</td>
					<td class="tab-total">Total</td>
				</tr>
			</thead>
			<tbody class="menu-holder">

				<?php
				$number = 0;
				foreach ($cart as $key => $value):
					$number++;
				?>

					<?php for ($x=0; $x<count($key); $x++): ?>

						<?php
						if (count($key) > 1) $number++;

						$image = 'http://placehold.it/240x300';
						if ($key != 'pizza' && $key != 'side' && $key != 'beverage' && $key != 'condiment' && $key !='extra'):
							$detail   = $value['detail'];

							$name     = $key;
							$desc     = '';
							for ($y=0; $y<count($detail['items']); $y++) {
								$die = $detail['items'][$y];
								switch ($die['type']) {
									case 'pizza':    $desc .= $die['amount'].' '.$die['type'].' '.$die['size']; break;
									case 'beverage': $desc .= $die['amount'].' '.$die['type'];                  break;
									default:         $desc .= $die['amount'].' '.$die['desc'];                  break;
								}
								$desc = str_replace(';', ' or ', $desc);
								if ($y != count($detail['items']) - 1) $desc .= ' + ';
							}
							$image    = base_url('assets/img/misc/meals_placeholder.png');
							$price    = $detail['price'];
							$total    = $price;
							$quantity = 1;

							$trip = $value['trip'];
							$removeClass = 'cart-remove';

							$size     = '';
							if (array_key_exists('size', $detail)) $size = $detail['size'];

							$lightbox = TRUE;

						else:
							$detail   = '';
							$vx       = $value[$x];
							if ($key != 'extra'):
								$oru      = $vx['oru'];

								$name     = $vx['name'];
								$desc     = $vx['desc'];
								$image    = base_url($vx['image']);
								$price    = $oru->price;
								$total    = $oru->total;
								$quantity = $total / $price;
								$vx       = $value[$x];
							else:
								$name     = $vx['name'];
								$desc     = $vx['desc'];
								$image    = base_url($vx['image']);
								$price    = 'RM3.5';
								$total    = 'RM3.5';
								$quantity = 1;
							endif;

							$size     = '';
							if (array_key_exists('size', $vx)) $size = $vx['size'];

							$trip     = $vx['trip'];
							$removeClass = 'mc-remove';

							$page_menu_active = $vx['aka'];
							$lightbox = FALSE;

						endif;

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


						<?php if ($key == 'extra'): ?>
							<tr style="display:none">
						<?php else: ?>
							<tr>
						<?php endif; ?>
							<td class="tn-number">
						<?php if (isset($detail) && ! empty($detail)): ?>
							<ul style="display:none">
								<?php
								for ($a=0; $a<count($detail['items']); $a++):
									$item = $detail['items'][$a];
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
								<span class="numero"><?php echo $number; ?></span>
							</td>
							<td>
								<div class="row">
									<div class="small-2 columns item-img-container">
										<img src="<?php echo $image; ?>" class="item-img">
									</div>
									<div class="small-10 columns">
										<p class="item-name"><?php echo ucfirst($name); ?></p>
										<p class="item-desc"><?php echo $desc; ?></p>
									</div>
								</div>
							</td>
							<td>
								<p class="item-price"><?php echo $price; ?></p>
							</td>
							<td>
								<div class="row">
									<div class="small-2 columns">
										<input type="text" name="quantity" value="<?php echo $quantity; ?>" class="item-quantity" disabled>
									</div>
									<div class="small-5 columns">
										<?php if ($key == 'pizza' OR $key == 'side' OR $key == 'beverage' OR $key == 'condiment'): ?>
											<?php
											switch ($key) {
												case 'pizza':     $editUrl = 'menu/alacarte/pizza/';      break;
												case 'side':      $editUrl = 'menu/alacarte/side_order/'; break;
												case 'beverage':  $editUrl = 'menu/alacarte/beverage/';   break;
												case 'condiment': $editUrl = 'menu/alacarte/condiment/';  break;
												default:          $editUrl = '';                          break;
											}
											$editUrl .= rawurlencode($name);
											?>
											<a href="<?php echo base_url($editUrl); ?>" class="button">Edit</a>
										<?php else: ?>
											<button class="button cart-edit"
												data-name="<?php  echo $name; ?>"
												data-price="<?php echo $price; ?>"
												data-size="<?php  echo $size; ?>">Edit</button>
										<?php endif; ?>
									</div>
									<div class="small-5 columns">
										<button class="button act-cancel <?php echo $removeClass; ?>" data-trip="<?php echo $trip; ?>">Remove</button>
									</div>
								</div>
							</td>
							<td>
								<p class="item-total"><?php echo $total; ?></p>
							</td>
						</tr>

					<?php endfor; ?>
				<?php endforeach; ?>

			</tbody>
		</table>

	</div>
</section>