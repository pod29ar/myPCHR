<div id="meal-lightbox" class="meal-lightbox">
	<header class="lb-head">
		<nav class="row">
			<div class="left">
				<span class="left lb-name">Meal Set</span>
			</div>
			<div class="right">
				<button class="button act-cancel lb-cancel">Cancel</button>
				<button class="button lb-confirm">Confirm</button>
			</div>
			<h4 class="right lb-price"><span>Total</span>&nbsp;RM0.00</h4>
		</nav>
	</header>
	<!-- contents -->
	<section id="level-one" class="lb-boxes-container">
		<div class="lb-boxes">
			<div class="row">
				<div id="lbb" class="small-12 columns lbb">

					<!-- pizza -->
					<div class="small-3 columns left lb-content lb-preset lb-pizza" data-anchor="pizza-1">
						<h3 class="lb-title">Pizza</h3>
						<div class="lb-box">
							<section class="lb-preview pz">
								<h4 class="lbp-edit" data-target="pizza-1" data-load="pizza" data-size="all" data-desc="all">
									<a href="#" class="lbpe">ADD</a>
								</h4>
							</section>
							<section class="clearfix lb-desc">
								<h5 class="lbd-name">Please Select Topping</h5>
								<h6 class="left lbd-size">Size</h6>
								<h6 class="left lbd-crust">Crust</h6>
							</section>
						</div>
					</div>

					<!-- side -->
					<div class="small-3 columns left lb-content lb-preset lb-side" data-anchor="side-1">
						<h3 class="lb-title">Side</h3>
						<div class="lb-box">
							<section class="lb-preview sd">
								<h4 class="lbp-edit" data-target="side-1" data-load="side" data-size="all" data-desc="all">
									<a href="#" class="lbpe">ADD</a>
								</h4>
							</section>
							<section class="clearfix lb-desc">
								<h5 class="lbd-name">Please Select Side</h5>
								<h6 class="left lbd-size"></h6>
								<h6 class="left lbd-crust"></h6>
							</section>
						</div>
					</div>

					<!-- beverage -->
					<div class="small-3 columns left lb-content lb-preset lb-beverage" data-anchor="beverage-1">
					<h3 class="lb-title">Beverage</h3>
						<div class="lb-box">
							<section class="lb-preview bv">
								<h4 class="lbp-edit" data-target="beverage-1" data-load="beverage" data-size="all" data-desc="all">
									<a href="#" class="lbpe">ADD</a>
								</h4>
							</section>
							<section class="clearfix lb-desc">
								<h5 class="lbd-name">Please Select Beverage</h5>
								<h6 class="left lbd-size">Size</h6>
								<h6 class="left lbd-crust"></h6>
							</section>
						</div>
					</div>

				</div><!-- end grid -->
			</div><!-- end row -->
		</div><!-- end boxes -->
	</section>
	<section id="level-two" class="lb-boxes-container level-two">
		<div class="row bs-container">
			<div class="small-12 columns bs-box">
				<button class="button right spc-button box-switch">Back To Selection</button>
			</div>
		</div>
		<div id="meal-holder" class="lb-boxes menu-holder"><!-- load menu here --></div>
	</section>
</div>