<div id="edit-topping" class="reveal-modal edit-topping item-modal" data-reveal>
	<div class="row id-header">
		<h4 class="idh-copy">Edit Topping</h4>
	</div>

	<div class="row et-content">
		<div id="topping-holder" class="small-8 columns etc-left">
			<!-- template -->
			<li class="templar" style="display:none;">
				<label>Cheese</label>
				<ul class="small-block-grid-2 et-block">
					<li><div class="et-image"></div></li>
					<li>
						<div class="row collapse et-counter">
							<div class="small-7 columns">
								<input type="text" name="etc-number" class="etc-number" value="0" disabled="">
							</div>
							<div class="small-5 columns etc-button-holder" data-name="Cheese" data-price="0.00">
								<button class="button etc-button etc-incr"><i class="fa fa-plus"></i></button>
								<button class="button etc-button etc-decr"><i class="fa fa-minus"></i></button>
							</div>
						</div>
					</li>
				</ul>
			</li>
			<!-- end template -->

			<div class="row">

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

				<div class="small-6 columns et-row">
					<ul id="special-topping" class="small-block-grid-2"></ul>
				</div>

			</div>

			<div id="topping-list" class="et-row"></div>
		</div>

		<div class="small-4 columns etc-right">
			<div data-alert class="alert-box warning radius et-warning">
				You have reached maximum amount of topping.
			</div>
			<div class="et-surcharge">
				<h4>SURCHARGE</h4>
				<div class="row">
					<div class="small-12 columns ets-topping">
						<!-- topping template -->
						<div class="top-temple top-line" style="display:none" data-name="" data-amount="">
							<div class="row">
								<div class="columns small-8">
									<p class="topping-name">Chicken Potpourri</p>
								</div>
								<div class="columns small-4">
									<p class="topping-price">RM3.50</p>
								</div>
							</div>

							<p class="topping-meta"><span class="unit-price">RM1.75</span> | Qty: <span class="unit-qty">2</span></p>
						</div>

						<!-- topping list here -->
					</div>
				</div>
				<div class="row ets-info">
					<div class="small-12 columns">
						<p>Subtotal: <span class="ets-total">RM0.00</span></p>
						<button class="button button-green ets-confirm">Confirm</button>
					</div>
				</div>
			</div>

		</div>
	</div>

	<!-- close -->
	<a class="close-reveal-modal">&#215;</a>
</div>