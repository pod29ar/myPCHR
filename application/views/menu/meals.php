<!-- title -->
<section class="row menu-head">
	<h2 class="mh-title">MEALS</h2>
</section>


<!-- content -->
<section class="row">
	<div class="small-2 columns">
		<ul class="side-filter">
			<li class="directive"><span>Show menu for</span></li>
			<li class="current"><a href="#" class="meal-filter" data-amount="1">All</a></li>
			<li><a href="#" class="meal-filter" data-amount="2">2 People</a></li>
			<li><a href="#" class="meal-filter" data-amount="3">3 People</a></li>
			<li><a href="#" class="meal-filter" data-amount="5">5 People</a></li>
			<li><a href="#" class="meal-filter" data-amount="8">8 People</a></li>
			<li><a href="#" class="meal-filter" data-amount="10">10 People</a></li>
			<li><a href="#" class="meal-filter" data-amount="12">12 People</a></li>
		</ul>
	</div><!-- col-md-2 close -->

	<div class="small-10 columns">
		<div id="meal-template" style="display:none;">
			<div class="small-4 columns deal" data-size="4">
				<a href="#" class="meal-block mb-choice" data-name="Combo A" data-price="31.80">
					<h3 class="meal-name">MEAL NAME</h3>
					<ul class="meal-deal">
						<li class="row md-item md-temp" data-type="pizza" data-size="regular" data-desc="" data-amount="1">
							<div class="small-4 columns">
								<div class="md-icon">
									<img src="<?php echo base_url('assets/img/new_home/meals_sprite.png'); ?>" class="mdi">
								</div>
							</div>
							<div class="small-8 columns">
								<h2 class="md-amount">1</h2>
								<h4 class="md-desc">REGULAR</h4>
							</div>
						</li>
					</ul>
					<footer class="meal-footer">
						<h4 class="mf-price"><span>just</span> RM0.00</h4>
						<h5 class="mf-save"><span>Save</span> RM0.00</h5>
					</footer>
				</a>
			</div>
		</div>

		<div id="meal-holder"></div>

		<section id="nodl" class="row" style="display:none;">
			<h5 class="deal-head pizza-deal-title"><span>No deals available for selected servings</span></h5>
		</section>

	</div><!-- col-md-10 close -->
</section><!-- row close -->