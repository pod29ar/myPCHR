<div id="edit-topping" class="reveal-modal edit-topping item-modal" data-reveal>
	<div class="row id-header">
		<h4 class="idh-copy">Edit Topping</h4>
	</div>

	<div class="row et-content">
		<div class="small-8 columns etc-left">
			<?php
			$counter = 0;
			$currentTopping = '';
			?>

			<?php foreach ($topping as $t): ?>
				
				<?php
				$name  = $t['name'];
				$class = strtolower(str_replace(' ', '-', $name));
				$price = $t['price'];
				$type  = $t['type'];
				?>

				<?php if ($type != $currentTopping && strtolower($type) != 'misc'): ?>
					<?php if ($counter > 0): ?>
							</ul>
						</div>
						<?php if (strtolower($type) == 'meat') echo '</div>'; ?>
						<?php $counter = 0; ?>
					<?php endif; ?>
					<h4 class="deal-head"><span><?php echo strtoupper($type);?></span></h4>
				<?php endif; ?>

				<?php if ($counter == 0): ?>
					<div class="row et-row">
					<?php if (strtolower($type) == 'misc'): ?>
						<div class="small-6 columns">
							<label>Select Sauce</label>
							<div class="row">
								<div class="small-3 columns">
									<div class="et-image"></div>
								</div>
								<div class="small-9 columns">
									<select>
										<option value="top secret sauce">Top Secret Sauce</option>
										<option value="pesto passion sauce">Pesto Passion Sauce</option>
										<option value="domino's signature sauce">Domino's Signature Sauce</option>
										<option value="spicy sambal sauce">Spicy Sambal Sauce</option>
									</select>
								</div>
							</div>
						</div>
						<div class="small-6 columns">
							<ul class="small-block-grid-2">
					<?php else: ?>
						<ul class="small-block-grid-4">
					<?php endif; ?>
				<?php endif; ?>

				<li>
					<label><?php echo $name;?></label>
					<ul class="small-block-grid-2 et-block">
						<li><div class="et-image <?php echo $class;?>"></div></li>
						<li>
							<div class="row collapse et-counter">
								<div class="small-7 columns">
									<input type="text" name="etc-number" class="etc-number" value="0" disabled>
								</div>
								<div class="small-5 columns etc-button-holder" data-name="<?php echo $name;?>" data-price="<?php echo $price;?>">
									<button class="button etc-button etc-incr"><i class="fa fa-plus"></i></button>
									<button class="button etc-button etc-decr"><i class="fa fa-minus"></i></button>
								</div>
							</div>
						</li>
					</ul>
				</li>

				<?php /*if (strtolower($type) == 'misc' && $counter == 1): ?>
							</ul>
						</div>
					</div>
					<?php $counter = 0; ?>
				<?php endif;*/ ?>
				<?php if ($counter > 0 && $counter % 3 == 0): ?>
						</ul>
					</div>
					<?php $counter = 0; ?>
				<?php else: ?>
					<?php $counter++; ?>
				<?php endif; ?>

				<?php $currentTopping = $type;?>


			<?php endforeach; ?>
		</div>

		<div class="small-4 columns etc-right">
			<div data-alert class="alert-box warning radius et-warning">
				You have reached maximum amount of topping.
			</div>
			<div class="et-surcharge">
				<h5>TOTAL SURCHARGE</h5>
				<div class="row">
					<div class="small-12 columns ets-topping">
						<!-- topping list here -->
					</div>
				</div>
				<div class="row ets-info">
					<div class="small-12 columns">
						<p>Total Surcharge: <span class="ets-total">RM0.00</span></p>
						<button class="button ets-confirm">Confirm</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- close -->
	<a class="close-reveal-modal">&#215;</a>
</div>