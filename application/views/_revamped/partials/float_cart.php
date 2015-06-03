<div id="float-cart" class="col-xs-5 col-sm-3 float-cart">
	<center>
		<h4>My Selection</h4>
	</center>

	<?php if ( ! empty($retrieveDeal)):
	$itemClass = 'item'; ?>
	<ul id="item-deals" class="items">
		<form id="cart-form" action="<?php echo base_url('meal/deal_meal');?>" method="post">
		<?php foreach ($retrieveDeal as $key => $value):
			if ( ! empty($value)):
				for ($x=0; $x<count($value); $x++) {
					if ($activeItem === $key.'-'.$x) $itemClass .= ' active';

					if ($key == 'pizza') $itemImg = base_url('assets/img/pizza.png');
					elseif ($key == 'sides') $itemImg = base_url('assets/img/roasted_drumet.png');
					elseif ($key == 'beverages') $itemImg = base_url('assets/img/beverages.png');
		?>
		<li class="<?php echo $itemClass;?>" data-item="<?php echo $key;?>">
			<div class="item-img" style="background-image: url('<?php echo $itemImg;?>');">
				
			</div>
			<div class="item-desc"><?php echo $value[$x];?></div>
			<div class="clearfix"></div>
			<input type="hidden" class="cart-item" name="item-nm" value="">
			<input type="hidden" class="cart-price" name="item-pr" value="">
			<input type="hidden" class="cart-quant" name="item-qn" value="">
		</li>
		<?php $itemClass = 'item'; }
			endif;
		endforeach; ?>
		</form>
	</ul>

	<?php else: ?>
		<form id="cart-form" action="<?php echo base_url('alacarte/ordered');?>" method="post">
			<ul id="items" class="items">
			</ul>
		</form>
		<p id="pre-stat" class="faded pre-stat">0 Item</p>

	<?php endif; ?>
	<div class="text-center">
		<button id="atc" class="btn btn-action atc-btn faded">Place My Order</button>
	</div><!--  close -->
</div>