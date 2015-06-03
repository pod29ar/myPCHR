<div id="half-topping" class="reveal-modal edit-topping item-modal" data-reveal>
	<div class="row id-header">
		<h4 class="idh-copy">Edit Topping</h4>
	</div>

	<div class="row et-content">
		<div class="small-12 columns">

			<!-- first row -->
			<div class="row et-row">
				<div class="small-6 columns">

					<div class="row">

						<div class="small-8 columns">
							<label>Select Sauce</label>
							<div class="row">
								<div class="small-3 columns">
									<div class="et-image">
										<img src="http://placehold.it/90x90">
									</div>
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

						<div class="small-4 columns">
							<label>Cheese</label>
							<ul class="small-block-grid-2 et-block">
								<li>
									<div class="et-image">
										<img src="http://placehold.it/90x90">
									</div>
								</li>
								<li>
									<div class="row collapse et-counter">
										<div class="small-7 columns">
											<input type="text" name="etc-number" class="etc-number" value="0" disabled>
										</div>
										<div class="small-5 columns etc-button-holder" data-name="cheese" data-price="1.00">
											<button class="button etc-button etc-incr"><i class="fa fa-plus"></i></button>
											<button class="button etc-button etc-decr"><i class="fa fa-minus"></i></button>
										</div>
									</div>
								</li>
							</ul>
						</div>

					</div>

				</div>

				<div class="small-6 columns">
					<div data-alert class="alert-box warning radius et-warning">
						You have reached maximum amount of topping.
					</div>
				</div>
			</div>

			<?php
			$counter = 0;
			$superCounter = 0;
			$currentTopping = '';
			foreach ($topping as $t):
				$name = $t['name'];
				$image = $t['image'];
				$price = $t['price'];
				$type = $t['type'];
			?>

				<?php if (strtolower($type) != strtolower($currentTopping)): ?>
					<?php if ($counter != 0) echo '</ul></div>'; ?>

					<?php if ($superCounter == 6): ?>
						<div class="row">
							<div class="small-8 columns">
					<?php endif; ?>

					<div class="row et-row">

				<?php
					$counter = 0;
				endif;
				$currentTopping = $type;
				?>

				<?php if ($superCounter == 0): ?>
					<ul class="small-block-grid-6">
				<?php elseif ($superCounter > 0 && $counter == 0): ?>
					<ul class="small-block-grid-4">
				<?php elseif ($superCounter > 5 && $counter % 4 == 0): ?>
					</ul><ul class="small-block-grid-4">
				<?php endif; ?>

				<li>
					<label><?php echo $name;?></label>
					<ul class="small-block-grid-2 et-block">
						<li>
							<div class="et-image">
								<img src="<?php echo $image;?>">
							</div>
						</li>
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

				<?php if ($superCounter == (count($topping) - 1)): ?>
						</ul></div></div>
						<div class="small-4 columns et-surcharge">
							<h5>TOTAL SURCHARGE</h5>
							<div class="row">
								<div class="small-12 columns ets-topping">
									<!-- topping list here -->
								</div>
							</div>
							<div class="row ets-info">
								<p>Total Surcharge: <span class="ets-total">RM0.00</span></p>
								<button class="button ets-confirm">Confirm</button>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php
				$counter++;
				$superCounter++;
			endforeach;
			?>

		</div>
	</div>

	<!-- close -->
	<a class="close-reveal-modal">&#215;</a>
</div>