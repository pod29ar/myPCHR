<div class="row">
	<h2 class="text-center page-head">SIGN UP TO ORDER PIZZA</h2>
</div>

<!-- tabs controller -->
<section class="row">
	<div class="small-7 small-centered columns">
		<dl class="tabs tab-steps" data-tab>
			<dd class="active tab-step"><a href="#personal-info" class="step pi">
				<h4 class="step-no">1</h4>
				<span class="step-copy">Personal Info</span>
			</a></dd>
			<dd class="tab-step"><a href="#address-info" class="step ai">
				<h4 class="step-no">2</h4>
				<span class="step-copy">Address Info</span>
			</a></dd>
			<dd class="tab-step"><a href="#fin" class="step fi">
				<h4 class="step-no">3</h4>
				<span class="step-copy">Finish</span>
			</a></dd>
		</dl>
	</div>
</section>

<!-- form begin -->
<section class="row">
	<div class="small-10 small-centered columns">
		<form action="<?php echo base_url('data/registration');?>" method="post">
			<div class="tabs-content">

				<!-- personal info -->
				<?php $this->load->view('partial/_register_personal_info');?>

				<!-- address info -->
				<?php $this->load->view('partial/_register_address_info');?>

				<!-- redirect page -->
				<div class="content" id="finish">
					<p>Third panel content goes here...</p>
				</div>
			</div>
		</form>

	</div>
</section>