<section class="row">
	<div class="small-6 small-centered columns deltaker">

		<div class="row steps step-deltake">
			<dl class="tabs" data-tab>
				<dd class="active tab-del"><a href="#del" data-toggle="tab">Delivery</a></dd>
				<dd class="tab-tak"><a href="#take" data-toggle="tab">Take Away</a></dd>
				<span class="separator">OR</span>
			</dl>
		</div>

		<div class="tabs-content">

			<div class="content active" id="del">
				<form role="form" id="form_dlv" class="lr-form" action="<?php echo base_url('data/delivery_take');?>" method="post">
					<input type="hidden" name="deltake" value="delivery">

					<!-- date time -->
					<?php $this->load->view('partial/_deltake_datetime');?>

					<!-- address -->
					<div class="row steps step-address">
						<h5 class="step-head clearfix">
							<span class="left">Choose Address</span>
							<a href="#" class="button spc-button right">Manage Address</a>
						</h5>
						<ul class="addr-ls"><?php
							$x = 1;
							foreach ($addresses as $array):
								$addrNick = $array['addrNick']; $fullAddr = $array['fullAddr'];
								if ($x == 1): $li = '<li class="row selected">'; $chc = 'checked';
								else:         $li = '<li class="row">';          $chc = '';
								endif;
								echo $li;
								?><div class="small-9 small-offset-1 columns addr">
										<span class="addr-position"><?php echo $x;?></span>
										<h5><?php echo $addrNick;?></h5>
										<span><?php echo $fullAddr;?></span>
									</div>
									<div class="small-2 columns check">
										<input name="addrNick" type="radio" value="<?php echo $addrNick;?>" class="addrNick" <?php echo $chc;?>>
									</div>
								</li><?php
								$x++;
							endforeach;
						?></ul>
					</div>

					<!-- contact and submit button -->
					<?php $this->load->view('partial/_deltake_contact');?>
				</form>
			</div>

			<div class="content" id="take">
				<form role="form" id="form_twy" class="lr-form" action="<?php echo base_url('data/delivery_take');?>" method="post">
					<input type="hidden" name="deltake" value="take away">

					<!-- date time -->
					<?php $this->load->view('partial/_deltake_datetime');?>

					<!-- store -->
					<div class="row steps step-address">
						<h5 class="step-head clearfix">
							<span class="left">Choose Address</span>
							<a href="#" class="button spc-button right">Manage Address</a>
						</h5>
						<ul class="addr-ls">
							<li class="row">
								<div class="small-9 small-offset-1 columns addr">
									<span class="addr-position">1</span>
									<h5>BANGI</h5>
									<p><?php echo DOMINO_1;?></p>
								</div>
								<div class="small-2 columns check">
									<input name="addrNick" type="radio" value="BANGI" class="addrNick">
								</div>
							</li>
							<li class="row">
								<div class="small-9 small-offset-1 columns addr">
									<span class="addr-position">2</span>
									<h5>BANGI 2</h5>
									<p><?php echo DOMINO_2;?></p>
								</div>
								<div class="small-2 columns check">
									<input name="addrNick" type="radio" value="BANGI 2" class="addrNick">
								</div>
							</li>
						</ul>
					</div>

					<!-- contact and submit button -->
					<?php $this->load->view('partial/_deltake_contact');?>
				</form>
			</div>

		</div>

	</div>
</section>