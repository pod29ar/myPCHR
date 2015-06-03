<!-- title -->
<section class="row menu-head">
	<h2 class="mh-title">MEALS</h2>
</section>


<!-- content -->
<section class="row">
	<?php
	// echo '<pre>';
	// print_r($this->session->all_userdata());
	// echo '</pre>';
	?>
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
		<?php if (is_array($meal) && ! empty($meal)): ?>
			<?php
			for ($x=0; $x<count($meal); $x++):
				$group = $meal[$x]['group'];
				$meals = $meal[$x]['meals'];
			?>

				<h4 class="deal-head pizza-deal-title"><span><?php echo strtoupper($group);?></span></h4>
				<section class="row">
				<?php
				for ($y=0; $y<count($meals); $y++):
					$ms = $meals[$y];
				?>
					<div class="small-4 columns deal" data-size="<?php echo $ms['size'];?>" <?php if (strtolower($ms['name']) == 'incredible d') echo 'style="margin-top:-60px"'; ?>>
						<a href="#" class="meal-block mb-choice" data-name="<?php echo $ms['name'];?>"
							data-price="<?php echo $ms['price'];?>">
							<h3 class="meal-name"><?php echo strtoupper($ms['name']);?></h3>
							<ul class="meal-deal">
								<?php
								for ($z=0; $z<count($ms['items']); $z++):
									$item = $ms['items'][$z];
									$itemType = $item['type'];
									if ($itemType == 'side')
										$desc = $itemType;
									else
										$desc = $item['size'];

									$icon = 'http://placehold.it/90x90';
									if ($itemType == 'pizza'):
										switch ($desc) {
											case 'regular':
												$icon = 'rg';
												break;
											case 'large':
												$icon = 'lg';
												break;
											case 'extra large':
												$icon = 'xl';
												break;
											default:
												$icon = 'rg';
												break;
										}
									elseif ($itemType == 'side'):
										$icon = 'sd';
									elseif ($itemType == 'beverage'):
										$icon = 'bv';
									endif;
								?>
									<li class="row md-item" data-type="<?php echo $item['type'];?>"
										data-size="<?php echo $item['size'];?>"
										data-desc="<?php echo $item['desc'];?>"
										data-amount="<?php echo $item['amount'];?>">
										<div class="small-4 columns">
											<div class="md-icon">
												<img src="<?php echo base_url('assets/img/new_home/meals_sprite.png'); ?>" class="mdi <?php echo $icon;?>">
											</div>
										</div>
										<div class="small-8 columns">
											<h2 class="md-amount"><?php echo $item['amount'];?></h2>
											<h4 class="md-desc"><?php echo strtoupper($desc);?></h4>
										</div>
									</li>
								<?php endfor;?>
							</ul>
							<footer class="meal-footer">
								<h4 class="mf-price"><span>just</span> RM<?php echo $ms['price'];?></h5>
								<h5 class="mf-save"><span>Save</span> RM<?php echo $ms['save'];?></h5>
							</footer>
						</a>
					</div>
					<?php if ($y % 2 == 0 && $y > 0): ?>
						</section><section class="row">
					<?php endif;?>
				<?php endfor; ?>
				</section>

			<?php endfor;?>
		<?php else: ?>
			<h5 class="deal-head">No item availble yet, please be patient.</h5>
		<?php endif;?>

		<section id="nodl" class="row" style="display:none;">
			<h5 class="deal-head pizza-deal-title"><span>No deals available for selected servings</span></h5>
		</section>

	</div><!-- col-md-10 close -->
</section><!-- row close -->