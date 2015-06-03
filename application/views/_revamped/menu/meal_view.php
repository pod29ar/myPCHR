<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper spc-back meal-main">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<?php if ($username != ''): ?>
		<div class="serve-size">
			<div class="container">
				<h3 class="dir-head">
					<span><!--
						--><a href="<?php echo base_url('menu');?>">Menu</a> / <!--
					--></span> Meals
				</h3>

				<div class="filter_meals">
					<h4>Filter Meals by Number of People</h4>

					<div id="filter_meal_slider">
					</div><!--  close -->

					<p>
						<span id="no_of_people">3
						</span><!--  close -->
						<span id="people_copy">People</span> Meals
					</p>
				</div><!-- filter_meals close -->


				<!-- <select id="servings" class="form-control serve-select">
					<option value="All">All</option>
					<?php for ($x=2; $x<11; $x++) {
						echo "<option value=\"".($x+1)."\">${x} - ".($x+1)." People</option>";
					} ?>
					<option value="11">11 People</option>
					<option value="13">13 People</option>
				</select> -->
			</div>
		</div>
		<?php endif;?>

		<div class="container">

			<div class="row">

				<div class="col-md-2">
					<ul class="filter_list_sidebar">
						<li>
							<h4>Filter Meals by Number of People</h4>
						</li>
						<li>
							<a id="for_all_meals" href="#" class="current">
								Show All
							</a>
						</li>
						<li>
							<a id="for_2_meals" href="#">
								2 People
							</a>
						</li>
						<li>
							<a id="for_3_meals" href="#">
								3 People
							</a>
						</li>
						<li>
							<a id="for_5_meals" href="#">
								5 People
							</a>
						</li>
						<li>
							<a id="for_8_meals" href="#">
								8 People
							</a>
						</li>
						<li>
							<a id="for_10_meals" href="#">
								10 People
							</a>
						</li>
						<li>
							<a id="for_12_meals" href="#">
								12 People
							</a>
						</li>
					</ul>
				</div><!-- col-md-2 close -->

				<div class="col-md-10">

					<!-- Two Pizza Deal -->
					<div id="twopz" class="deal-select">
						<h4 class="pizza-deal-title">2 PIZZA DEALS</h4>
						<div class="row">

							<div class="col-sm-6 col-md-4 2_people">
								<a href="<?php echo base_url('menu/meal/two-pizza-deal-a');?>" class="mn-cnt mn-pz">
									<div class="mn-img">
										<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
									</div>
									<button class="btn btn-action add-order">
										<span class="add-label">Add To Order</span>
									</button>
								</a>
								<div class="promo-label">2 REGULAR PIZZAS WITH EXTRA CHEESE @ RM30 ONLY!</div>
							</div>

							<div class="col-sm-6 col-md-4 3_people">
								<a href="<?php echo base_url('menu/meal/two-pizza-deal-b');?>" class="mn-cnt mn-pz">
									<div class="mn-img">
										<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
									</div>
									<button class="btn btn-action add-order">
										<span class="add-label">Add To Order</span>
									</button>
								</a>
								<div class="promo-label">2 LARGE PIZZAS WITH EXTRA CHEESE @ RM50 ONLY!</div>
							</div>

							<div class="col-sm-6 col-md-4 5_people">
								<a href="<?php echo base_url('menu/meal/two-pizza-deal-c');?>" class="mn-cnt mn-pz">
									<div class="mn-img">
										<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
									</div>
									<button class="btn btn-action add-order">
										<span class="add-label">Add To Order</span>
									</button>
								</a>
								<div class="promo-label"><?php echo strtoupper('2 Xtra Large Pizzas with Extra Cheese '.
								'@ RM70 ONLY!');?></div>
							</div>

						</div>
					</div>

					<!-- The New Incredible Meal -->
					<div id="tnim" class="deal-select">
						<h4 class="pizza-deal-title">THE NEW INCREDIBLE MEAL</h4>
						<div class="row">

							<div class="col-sm-6 col-md-4">
								<a href="<?php echo base_url('menu/meal/incredible-meal-a');?>" class="mn-cnt mn-pz">
									<div class="mn-img">
										<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
									</div>
									<button class="btn btn-action add-order">
										<span class="add-label">Add To Order</span>
									</button>
								</a>
								<div class="promo-label"><?php echo strtoupper('2 Regular Pizzas + 1 Garlic Cheese Onion Rings + '.
								'1 TwistyBread/Banana Kaya');?></div>
							</div>

							<div class="col-sm-6 col-md-4">
								<a href="<?php echo base_url('menu/meal/incredible-meal-b');?>" class="mn-cnt mn-pz">
									<div class="mn-img">
										<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
									</div>
									<button class="btn btn-action add-order">
										<span class="add-label">Add To Order</span>
									</button>
								</a>
								<div class="promo-label"><?php echo strtoupper('2 Regular Pizzas + 1 BreadStix + '.
								'1 TwistyBread/Banana Kaya + 1 Crazy Chicken Crunchies');?></div>
							</div>

							<div class="col-sm-6 col-md-4">
								<a href="<?php echo base_url('menu/meal/incredible-meal-c');?>" class="mn-cnt mn-pz">
									<div class="mn-img">
										<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
									</div>
									<button class="btn btn-action add-order">
										<span class="add-label">Add To Order</span>
									</button>
								</a>
								<div class="promo-label"><?php echo strtoupper('3 Regular Pizzas + 1 Garlic Cheese Onion Rings + '.
								'1 Chicken Wings / Crazy Chicken Crunchies');?></div>
							</div>

						</div>
					</div>

					<!-- Top Secret Meal -->
					<div id="tsm" class=" deal-select">
						<h4 class="pizza-deal-title">TOP SECRET MEAL</h4>
						<div class="row">

							<div class="col-sm-6 col-md-4">
								<a href="<?php echo base_url('menu/meal/secret-meal-a');?>" class="mn-cnt mn-pz">
									<div class="mn-img">
										<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
									</div>
									<button class="btn btn-action add-order">
										<span class="add-label">Add To Order</span>
									</button>
								</a>
								<div class="promo-label"><?php echo strtoupper('1 Regular Top Secret Sauce Pizza +'.
								'1 Twisty Bread/ BreadStix/ CinnaStix + 2 Cans of Soft Drink');?></div>
							</div>

							<div class="col-sm-6 col-md-4">
								<a href="<?php echo base_url('menu/meal/secret-meal-b');?>" class="mn-cnt mn-pz">
									<div class="mn-img">
										<img src="<?php echo base_url('assets/img/speciality_pizzas.png');?>" class="img-responsive">
									</div>
									<button class="btn btn-action add-order">
										<span class="add-label">Add To Order</span>
									</button>
								</a>
								<div class="promo-label"><?php echo strtoupper('1 Regular Top Secret Sauce Pizza + '.
								'1 Twisty Bread/ BreadStix/ CinnaStix + 2 Cans of Lipton Ice Tea (Free Upgrade)');?></div>
							</div>

						</div>
					</div>

					<div id="nodl" class="row" style="display:none;">
						<h4 class="pizza-deal-title">No deals available for selected servings</h4>
					</div>

				</div><!-- col-md-10 close -->
			</div><!-- row close -->

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript">
	$(document).ready(function () {
		"use strict";

		$('.filter_list_sidebar li a').click( function(e) {
			$('.filter_list_sidebar li a').removeClass('current');
			$(this).addClass('current');

			e.preventDefault();
			$('.col-md-4').fadeOut();
			if ( $(this).is('#for_2_meals') ) {
				$(this).addClass('current');
				$('.2_people').fadeIn();
			} else if ( $(this).is('#for_3_meals') ) {
				$('.3_people').fadeIn();
			} else if ( $(this).is('#for_5_meals') ) {
				$('.5_people').fadeIn();
			} else {
				$('.col-md-4').fadeIn();
			}
		});


		$("#filter_meal_slider").noUiSlider({
			range: [0, 15],
			start: 3,
			step: 1,
			handles: 1,
			behaviour: "tap",
			serialization: {
				resolution: 1
			},
			slide: function () {
				$("#no_of_people").html( $(this).val() );
				filter_meals( $(this).val() );
				set_people_copy( $(this).val() );
			}
		});

		function set_people_copy(people) {
			var people_copy = $('#people_copy');
			if (people < 1) {
				people_copy.html('Display All');
				$("#no_of_people").html('');
			} else if ( people < 2) {
				people_copy.html('Person');
			} else {
				people_copy.html('People');
			}
		}

		function filter_meals(people) {
			$('.col-md-4').fadeOut();
			if (people < 1) {
				$('.col-md-4').fadeIn();
			} if (people < 3) {
				$('.2_people').fadeIn();
			} else if( people < 4) {
				$('.2_people, .3_people').fadeIn();
			} else {
				$('.col-md-4').fadeIn();
			}
		}

		// list out all deals category you have here
		var twoPizza = $('#twopz'),
			incMeal = $('#tnim'),
			secMeal = $('#tsm'),
			// no deal
			noDeal = $('#nodl');

		// add fading function to let user know something is changing
		function hiding(item) {
			item.fadeOut('fast', function () {
				$(this).hide();
			});
		}

		function showing(item) {
			item.fadeIn('fast', function () {
				$(this).show();
			});
		}

		function showServingDeal(size) {
			if (size >= 13) {
				// 13 people, short from bigger first
				hiding(twoPizza);
				hiding(incMeal);
				hiding(secMeal);
				// if no deal, show the no deal container
				showing(noDeal);
			} else if (size >= 11 && size < 13) {
				// 11 people
				hiding(twoPizza);
				hiding(incMeal);
				hiding(secMeal);
				// if no deal, show the no deal container
				showing(noDeal);
			} else if (size >= 10 && size < 11) {
				// 10 people
				hiding(twoPizza);
				hiding(incMeal);
				hiding(secMeal);
				// if no deal, show the no deal container
				showing(noDeal);
			} else if (size >= 9 && size < 10) {
				// 9 people
				hiding(twoPizza);
				hiding(incMeal);
				hiding(secMeal);
				// if no deal, show the no deal container
				showing(noDeal);
			} else if (size >= 8 && size < 9) {
				// 8 people
				hiding(twoPizza);
				hiding(incMeal);
				hiding(secMeal);
				// if no deal, show the no deal container
				showing(noDeal);
			} else if (size >= 7 && size < 8) {
				// 7 people
				hiding(twoPizza);
				hiding(incMeal);
				hiding(secMeal);
				// if no deal, show the no deal container
				showing(noDeal);
			} else if (size >= 6 && size < 7) {
				// 6 people
				hiding(twoPizza);
				hiding(incMeal);
				hiding(secMeal);
				// if no deal, show the no deal container
				showing(noDeal);
			} else if (size >= 5 && size < 6) {
				// 5 people
				hiding(twoPizza);
				showing(incMeal);
				hiding(secMeal);
				// if deal available, hide the no deal container
				noDeal.hide();
			} else if (size >= 4 && size < 5) {
				// 4 people - example
				hiding(twoPizza);
				showing(incMeal);
				showing(secMeal);
				// if deal available, hide the no deal container
				noDeal.hide();
			} else if (size >= 3 && size < 4) {
				// 3 people - example
				showing(twoPizza);
				showing(incMeal);
				hiding(secMeal);
				// if deal available, hide the no deal container
				noDeal.hide();
			} else if (size >= 2 && size < 3) {
				// 2 people - example
				showing(twoPizza);
				hiding(incMeal);
				hiding(secMeal);
				// if deal available, hide the no deal container
				noDeal.hide();
			} else {
				// all
				showing(twoPizza);
				showing(incMeal);
				showing(secMeal);
				// if deal available, hide the no deal container
				noDeal.hide();
			}
		}

		$('#servings').change(function () {
			var servingSize = $(this).val();
			showServingDeal(servingSize);
		})
	});
	</script>
</body>
</html>

<!--
	End of file meal.php
	Location: application/views/meal.php
	By: Bazli
-->