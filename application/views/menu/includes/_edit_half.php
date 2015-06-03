<div class="row">
	<h4 class="step-head">Step 1/2 - Select Sauce</h4>
	<div class="small-12 columns">

		<div class="filter">
			<ul class="small-block-grid-5">
				<li class="filter-item" data-type="signature">
					<span class="mch-item signature"></span>
					<p class="fi-desc">Domino's Signature Sauce</p>
				</li>
				<li class="filter-item" data-type="spicy">
					<span class="mch-item spicy"></span>
					<p class="fi-desc">Spicy Sambal Sauce</p>
				</li>
				<li class="filter-item" data-type="secret">
					<span class="mch-item secret"></span>
					<p class="fi-desc">Top Secret Sauce</p>
				</li>
				<li class="filter-item" data-type="smoky">
					<span class="mch-item smoky"></span>
					<p class="fi-desc">Smoky BBQ Sauce</p>
				</li>
				<li class="filter-item" data-type="pesto">
					<span class="mch-item pesto"></span>
					<p class="fi-desc">Pesto Passion Sauce</p>
				</li>
			</ul>
		</div>

	</div>
</div>
<div class="row">
	<h4 class="step-head">Step 2/2 - Select Topping</h4>
	<div class="small-12 columns half-container"><!-- load menu here --></div>
</div>
<footer class="lb-foot">
	<div class="row">
		<ul class="small-block-grid-5 grider">
			<li>
				<h3 class="step-head">HALF &amp; HALF</h3>
				<p>Customize your pizza</p>
			</li>
			<li>
				<label class="pz-one-name"></label>
				<button class="button pz-one-edtp" data-reveal-id="edit-topping" data-reveal>Edit Topping</button>
			</li>
			<li class="spc-pic">
				<div class="pic-holder">
					<div class="ph-left"><img src="<?php echo base_url('assets/img/new_home/pizza_icon_blue.png');?>"></div>
					<div class="ph-right"><img src="<?php echo base_url('assets/img/new_home/pizza_icon_blue.png');?>"></div>
				</div>
			</li>
			<li>
				<label class="pz-two-name"></label>
				<button class="button pz-two-edtp" data-reveal-id="edit-topping" data-reveal>Edit Topping</button>
			</li>
			<li>
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
						<label>Total <h6 class="pz-price">RM0.00</h6></label>
						<button type="submit" class="button half-done" data-type="<?php echo $page_menu_active;?>">Add To Cart</button>
					</div>
				</div>
			</li>
		</ul>
	</div>
</footer>