<div class="side-cart">
	<h4>My Carts</h4>
	<p>Foods</p>
	<table id="cart" class="table">
		<tbody>
			<tr><td colspan="4"></td></tr>
			<?php //print_r($this->session->all_userdata()); ?>
			<?php if ($pizza != ''): ?>
			<tr>
				<td><?php echo $pizza['quantity']; ?></td>
				<td><?php echo $pizza['detail']; ?></td>
				<td>RM <?php echo $pizza['price']; ?></td>
				<td>
					<button class="btn btn-link">
						<span class="glyphicon glyphicon-edit"></span>
					</button>
					<button class="btn btn-rmv btn-link">
						<span class="glyphicon glyphicon-remove"></span>
					</button>
				</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>

	<a href="<?php echo base_url();?>main/checkout" class="btn btn-primary">Checkout</a>
</div>