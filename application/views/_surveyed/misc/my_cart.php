<?php
/*echo '<pre>';
print_r($this->session->userdata('calculated'));
echo '</pre>';
exit;*/
?>
<!-- upselling item longform -->
<?php if ($opted == 'longform'): ?>
	<section class="row">
		<div id="upsells" class="small-12 columns sec-upsell">

			<section class="row menu-head">
				<h2 class="mh-title">You Might Want These</h2>
			</section>

			<div class="order-section order-clear">
				<?php $this->load->view('partial/_cart_extra');?>
			</div>
		</div>
	</section>
<?php endif; ?>

<section class="row menu-head">
	<h2 class="mh-title">My Cart</h2>
</section>

<section class="row"><div class="small-12 columns">
	<pre><?php //print_r($cart); ?></pre>
</div></section>

<section class="row">
	<div class="small-12 columns">
		<?php
		if ( ! empty($cart)):
			switch ($opted) {
				case 'longform': $this->load->view('partial/_cart_meal');      break;
				case 'modular':  $this->load->view('partial/_cart_meal_list'); break;
				default:         $this->load->view('partial/_cart_meal');      break;
			}
		endif;
		?>
	</div>
</section>

<section class="row silent-lamb">
	<div class="small-12 columns">
		<div class="cart-pricer">

			<div id="calculator" class="row">
				<div class="small-7 columns promo-display">
					<div class="pd-container">
						<p>The New 2014 Express Card is <strong>NOW</strong> available at all Domino's stores.</p>
						<div class="card-container">
							<img src="<?php echo base_url('assets/img/home/express_card.jpg');?>">
						</div>
						<p>Buy 1 Free 1 All Year Long</p>
						<a href="#" class="button ec-anchor">Buy Express Card</a>
					</div>
				</div>

				<div class="small-5 columns price-display">
					<?php
					$subTotal = $calculated['subtotal'];
					$tax = $calculated['taxed'];
					$grandTotal = $calculated['grand'];
					$rounded = $calculated['final'];
					$diffRounding = $calculated['differ'];
					?>
					<table class="table">
						<tbody>
							<tr class="no-border total-price">
								<td>Sub Total</td>
								<td id="sub-total" class="price">RM<?php printf('%6.2f', $subTotal);?></td>
							</tr>
							<tr class="no-border">
								<td class="addon">Prices subject to 6% Government tax</td>
								<td id="tax-price" class="price">RM<?php printf('%6.2f', $tax);?></td>
							</tr>
							<tr class="no-border">
								<td class="addon">Grand Total</td>
								<td id="total-tax" class="price">RM<?php printf('%6.2f', $grandTotal);?></td>
							</tr>
							<tr>
								<td class="addon">Rounding Adj</td>
								<td id="rounding-tax" class="price"><?php
								if ($diffRounding < 0):
									echo '-RM';
									printf('%6.2f', (-$diffRounding));
								else:
									echo 'RM';
									printf('%6.2f', $diffRounding);
								endif;
								?></td>
							</tr>
							<tr class="grand-total">
								<td class="addon">Grand Total After Rounding Adj</td>
								<td id="grand-total" class="price">RM<?php printf('%6.2f', $rounded);?></td>
							</tr>
						</tbody>
					</table>
					<?php if (empty($username)): ?>
						<a href="#" class="button proceed-anchor" data-reveal-id="login-modal" data-reveal>Proceed</a>
					<?php else: ?>
						<a href="<?php echo base_url('confirmation');?>" class="button proceed-anchor">Proceed</a>
					<?php endif;?>
				</div>
			</div>

		</div>
	</div>
</section>

<!-- upselling item modular -->
<?php if ($opted == 'modular'): ?>
	<section class="row">
		<div id="upsells" class="small-12 columns sec-upsell">

			<section class="row menu-head">
				<h2 class="mh-title">You Might Also Want These</h2>
			</section>

			<div class="order-section order-clear">
				<?php $this->load->view('partial/_cart_extra');?>
			</div>
		</div>
	</section>
<?php endif; ?>