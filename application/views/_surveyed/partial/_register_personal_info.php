<?php
if (isset($fbData) && ! empty($fbData)):
	$uname = $fbData[0];
	$email = $fbData[1];
	$fname = $fbData[2];
	$lname = $fbData[3];
else:
	$uname = '';
	$email = '';
	$fname = '';
	$lname = '';
endif;
?>
<div id="personal-info" class="content active reg-form">
	<section class="row">

		<!-- info box -->
		<div class="small-4 small-push-8 columns info-box">
			<h4 class="lc-head">SKIP THIS PROCESS</h4>
			<a href="<?php echo base_url('data/reg_facebook');?>" class="button fb-btn fb-connect">Connect With <strong>facebook</strong></a>
			<h4 class="lc-head pi-break">BENEFIT YOU WILL GET</h4>
			<p class="lc-excerpt">Free pizza on tenth order Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius, risus id imperdiet gravida, est lorem egestas eros, ultricies rhoncus mi arcu ut felis. Not a member?</p>
		</div>

		<!-- inputs -->
		<div class="small-8 small-pull-4 columns input-box">
			<!-- account info -->
			<div class="row">
				<div class="small-8 small-offset-4 columns"><h4>ACCOUNT INFORMATION</h4></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="user" class="right inline">Username<span class="text-red">*</span></label></div>
				<div class="small-8 columns"><input name="user" type="text" id="user" value="<?php echo $uname; ?>" placeholder="e.g. usercool"></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="email" class="right inline">Email<span class="text-red">*</span></label></div>
				<div class="small-8 columns"><input name="email" type="email" id="email" value="<?php echo $email; ?>" placeholder="e.g. example@mail.com"></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="password" class="right inline">Password<span class="text-red">*</span></label></div>
				<div class="small-8 columns"><input name="password" type="password" id="password" placeholder="e.g. PAas5W0ord"></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="passconf" class="right inline">Confirm Password<span class="text-red">*</span></label></div>
				<div class="small-8 columns"><input name="passconf" type="password" id="passconf" placeholder="same words as above"></div>
			</div>
			<!-- personal info -->
			<div class="row">
				<div class="small-8 small-offset-4 columns pi-break"><h4>PERSONAL INFORMATION</h4></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="firstName" class="right inline">First Name<span class="text-red">*</span></label></div>
				<div class="small-8 columns"><input name="fName" type="text" id="firstName" value="<?php echo $fname; ?>" placeholder="e.g. John"></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="lastName" class="right inline">Last Name<span class="text-red">*</span></label></div>
				<div class="small-8 columns"><input name="lName" type="text" id="lastName" value="<?php echo $lname; ?>" placeholder="e.g. Smith"></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="mobile" class="right inline">Mobile<span class="text-red">*</span></label></div>
				<div class="small-8 columns"><input name="mobile" type="tel" id="mobile" placeholder="e.g. 0123456789"></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="home" class="right inline">Home (optional)</label></div>
				<div class="small-8 columns"><input name="home" type="tel" id="home" class="optional" placeholder="e.g. 0123456789"></div>
			</div>
			<div class="row">
				<div class="small-4 columns"><label for="office" class="right inline">Office (optional)</label></div>
				<div class="small-8 columns"><input name="office" type="tel" id="office" class="optional" placeholder="e.g. 0123456789"></div>
			</div>
			<!-- next -->
			<div class="row">
				<div class="small-8 small-offset-4 columns pi-break">
					<button class="button logreg step-skip" data-target="ai">Next Step</button>
				</div>
			</div>
		</div>

	</section>
</div>