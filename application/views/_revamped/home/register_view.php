<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/plugin/chosen.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/datepicker.css');?>">
	<?php $this->load->view('includes/new_header');?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div class="container">

			<div id="scroller" class="side-scroller">
				<ul>
					<li class="sc-target"><a class="sc-link" href="#regs">
						<span class="sc-caret">&nbsp;</span><span class="sc-text">Login Information</span>
					</a></li>
					<li class="sc-target"><a class="sc-link" href="#pers">
						<span class="sc-caret">&nbsp;</span><span class="sc-text">Personal Information</span>
					</a></li>
					<li class="sc-target"><a class="sc-link" href="#addr">
						<span class="sc-caret">&nbsp;</span><span class="sc-text">Address Information</span>
					</a></li>
					<div class="sc-line"></div>
				</ul>
			</div>

			<!-- Login Panel -->
			<div class="row">
				<center><h3 class="lr-intro">Welcome To Domino's!</h3></center>
				<ul class="nav nav-pills nav-justified nav-deltake">
					<li class="active"><a href="#del" data-toggle="tab">Delivery</a></li>
					<li><a href="#take" data-toggle="tab">Take Away</a></li>
				</ul>
			</div>
				
			<div class="row tab-content">
				<div id="del" class="col-sm-10 tab-pane fade in active centeri">

					<?php if (validation_errors() != ''): ?>
						<h5 class="alert alert-danger"><?php echo validation_errors();?></h5>
					<?php endif;?>

					<form role="form" action="<?php echo base_url('data/registration');?>" method="post" class="lr-form">
						<?php $this->load->view('partials/register/login_personal_info');?>

						<div id="addr" class="row">
							<div class="col-md-12 tool-panel">
								<h4>Guideline</h4>
								<br>
								<h5>Address Nickname</h5>
								<span>Please add a nickname to your address, <!-- 
								-->this will be used throughout the website.</span>
								<br>
								<h5>Address</h5>
								<span>Please fill-up all address fields. <!-- 
								-->If you can't find your address, <!-- 
								-->please enter your address manually or <!-- 
								-->call our customer service at 1-300-xxx-xxx</span>
								<br>
								<h5>Can't find your address in the list?</h5>
								<span>Please call our customer service at 1-300-xxx-xxx</span>
							</div>

							<div class="col-md-12 lr-panel spc-rgs">
								<h4 class="text-center">Address Information</h4>

								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="addrNick">Address Nickname</label>
										<input name="addrNick" type="text" class="form-control" id="addrNick" value="<?php echo set_value('addrNick');?>">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="addrState">State</label>
										<select name="addrState" class="form-control" id="addrState">
											<option value="">Select a State</option>
											<option value="Johor">Johor</option><option value="Kedah">Kedah</option><option value="Kelantan">Kelantan</option>
											<option value="Melaka">Melaka</option><option value="Negeri Sembilan">Negeri Sembilan</option><option value="Pahang">Pahang</option>
											<option value="Perak">Perak</option><option value="Perlis">Perlis</option><option value="Pulau Pinang">Pulau Pinang</option>
											<option value="Sabah">Sabah</option><option value="Sarawak">Sarawak</option><option value="Selangor">Selangor</option>
											<option value="Terengganu">Terengganu</option><option value="W. P. Kuala Lumpur">W. P. Kuala Lumpur</option>
											<option value="W. P. Labuan">W. P. Labuan</option><option value="W. P. Putrajaya">W. P. Putrajaya</option>
										</select>
									</div>
									<div class="col-sm-4 form-group">
										<label for="addrCity">City</label>
										<select id="addrCity" name="addrCity" class="form-control">
											<option value="">Select a City</option>
											<option value="Ampang">Ampang</option><option value="Bandar Baru Bangi">Bandar Baru Bangi</option><option value="Bangi">Bangi</option>
											<option value="Banting">Banting</option><option value="Batu Caves">Batu Caves</option><option value="Cheras">Cheras</option>
											<option value="Cyberjaya">Cyberjaya</option><option value="Dengkil">Dengkil</option><option value="Gombak">Gombak</option>
											<option value="Hulu Klang">Hulu Klang</option><option value="Hulu Langat">Hulu Langat</option><option value="Jenjarom">Jenjarom</option>
											<option value="Kajang">Kajang</option><option value="Kapar">Kapar</option><option value="Kepong">Kepong</option>
											<option value="Kinrara">Kinrara</option><option value="Klang">Klang</option><option value="Kuala Lumpur">Kuala Lumpur</option>
											<option value="Kuala Selangor">Kuala Selangor</option><option value="Kuang">Kuang</option><option value="Meru">Meru</option>
											<option value="Pelabuhan Klang">Pelabuhan Klang</option><option value="Petaling Jaya">Petaling Jaya</option><option value="Puchong">Puchong</option>
											<option value="Putrajaya">Putrajaya</option><option value="Rantau Panjang">Rantau Panjang</option><option value="Selayang">Selayang</option>
											<option value="Semenyih">Semenyih</option><option value="Sepang">Sepang</option><option value="Serdang">Serdang</option>
											<option value="Seri Kembangan">Seri Kembangan</option><option value="Sungai Buloh">Sungai Buloh</option><option value="Shah Alam">Shah Alam</option>
											<option value="Subang">Subang</option><option value="Subang Jaya">Subang Jaya</option><option value="Telok Panglima Garang">Telok Panglima Garang</option>
										</select>
									</div>
									<div class="col-sm-2 form-group">
										<label for="postcode">Postcode</label>
										<select id="postcode" name="postcode" class="form-control">
											<option value="">Select Postcode</option>
											<option value="43000">43000</option><option value="43300">43300</option>
											<option value="43650">43650</option><option value="58200">58200</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="suburb">Suburb</label>
										<select id="suburb" name="suburb" class="form-control">
											<option value="">Select a Suburb</option>
											<option value="Seksyen 1">Seksyen 1</option><option value="Seksyen 2">Seksyen 2</option><option value="Seksyen 3">Seksyen 3</option>
											<option value="Seksyen 4">Seksyen 4</option><option value="Seksyen 5">Seksyen 5</option><option value="Seksyen 6">Seksyen 6</option>
											<option value="Seksyen 7">Seksyen 7</option><option value="Seksyen 8">Seksyen 8</option><option value="Seksyen 9">Seksyen 9</option>
											<option value="Seksyen 10">Seksyen 10</option><option value="Seksyen 11">Seksyen 11</option><option value="Seksyen 13">Seksyen 13</option>
											<option value="Seksyen 14">Seksyen 14</option><option value="Seksyen 15">Seksyen 15</option><option value="Seksyen 16">Seksyen 16</option>
											<option value="Taman Kajang Impian">Taman Kajang Impian</option>
										</select>
									</div>
									<div class="col-sm-4 form-group">
										<label for="addrStreet">Street</label>
										<select id="addrStreet" name="addrStreet" class="form-control">
											<option value="">Select a Street</option>
											<option value="JLN 1/1">JLN 1/1</option><option value="JLN 1/2">JLN 1/2</option><option value="JLN 1/2B">JLN 1/2B</option>
											<option value="JLN 1/2C">JLN 1/2C</option><option value="JLN 1/2D">JLN 1/2D</option><option value="JLN 1/2E">JLN 1/2E</option>
											<option value="JLN 1/3">JLN 1/3</option><option value="JLN 1/3 A">JLN 1/3 A</option><option value="JLN 1/3B">JLN 1/3B</option>
											<option value="JLN 1/3C">JLN 1/3C</option><option value="JLN 1/3D">JLN 1/3D</option><option value="JLN 1/3E">JLN 1/3E</option>
											<option value="JLN 1/3F">JLN 1/3F</option><option value="JLN 1/3G">JLN 1/3G</option><option value="JLN 1/3H">JLN 1/3H</option>
											<option value="JLN 1/3J">JLN 1/3J</option><option value="JLN 1/3K">JLN 1/3K</option><option value="JLN 1/3L">JLN 1/3L</option>
											<option value="JLN 1/3M">JLN 1/3M</option><option value="JLN 1/3N">JLN 1/3N</option><option value="JLN 1/3O">JLN 1/3O</option>
											<option value="JLN 1/3P">JLN 1/3P</option><option value="JLN 1/3Q">JLN 1/3Q</option><option value="JLN 1/3R">JLN 1/3R</option>
											<option value="JLN 1/3S">JLN 1/3S</option><option value="JLN 1/3T">JLN 1/3T</option><option value="JLN 1/3U">JLN 1/3U</option>
											<option value="JLN 1/3Z">JLN 1/3Z</option><option value="JLN 1/5">JLN 1/5</option><option value="JLN 1/6">JLN 1/6</option>
											<option value="JLN 1/7A">JLN 1/7A</option><option value="JLN 1/7B">JLN 1/7B</option><option value="JLN 1/7C">JLN 1/7C</option>
											<option value="JLN 1/7D">JLN 1/7D</option><option value="JLN 1/7E">JLN 1/7E</option><option value="JLN 1/7F">JLN 1/7F</option>
											<option value="JLN 1/7G">JLN 1/7G</option><option value="JLN 1/7H">JLN 1/7H</option><option value="JLN 1/7K">JLN 1/7K</option>
											<option value="JLN 1/8A">JLN 1/8A</option><option value="JLN 1/8B">JLN 1/8B</option><option value="JLN 1/8C">JLN 1/8C</option>
											<option value="JLN 1/8D">JLN 1/8D</option><option value="JLN 1/9">JLN 1/9</option><option value="JLN 1/9A">JLN 1/9A</option>
											<option value="JLN 1/9B">JLN 1/9B</option><option value="JLN 1/9C">JLN 1/9C</option><option value="JLN 1/9D">JLN 1/9D</option>
											<option value="JLN 1/9E">JLN 1/9E</option><option value="JLN 1/9F">JLN 1/9F</option><option value="JLN 1/9H">JLN 1/9H</option>
											<option value="JLN CEMPAKA">JLN CEMPAKA</option><option value="JLN GOLF">JLN GOLF</option><option value="LRG CEMPAKA 1">LRG CEMPAKA 1</option>
											<option value="LRG CEMPAKA 3">LRG CEMPAKA 3</option><option value="LRG CEMPAKA 6">LRG CEMPAKA 6</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6 form-group">
										<label for="addrType">Address Type</label>
										<select id="addrType" name="addrType" class="form-control">
											<option value="Resident">Resident</option>
											<option value="Business">Business</option>
											<option value="Hotel">Hotel</option>
											<option value="Other">Other</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="addrBuild">Building No</label>
										<input name="addrBuild" type="text" class="form-control" id="addrBuild" value="<?php echo set_value('addrBuild');?>">
									</div>
									<div class="col-sm-2 form-group">
										<label for="addrBlock">Block</label>
										<input name="addrBlock" type="text" class="form-control" id="addrBlock" value="<?php echo set_value('addrBlock');?>">
									</div>
									<div class="col-sm-2 form-group">
										<label for="addrBlock">Level</label>
										<input name="addrBlock" type="text" class="form-control" id="addrBlock" value="<?php echo set_value('addrBlock');?>">
									</div>
									<div class="col-sm-2 form-group">
										<label for="addrBlock">Unit</label>
										<input name="addrBlock" type="text" class="form-control" id="addrBlock" value="<?php echo set_value('addrBlock');?>">
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="addrComplex">Complex (optional)</label>
										<input name="addrComplex" type="text" class="form-control" id="addrComplex" value="<?php echo set_value('addrComplex');?>">
									</div>
									<div class="col-sm-6 form-group">
										<label for="addrComplex">Others (company name)</label>
										<input name="addrComplex" type="text" class="form-control" id="addrComplex" value="<?php echo set_value('addrComplex');?>">
									</div>
								</div>

								<button class="btn btn-lg btn-action btn-reg" type="submit">Submit</button>
							</div>
						</div>
					</form>

				</div>

				<div class="tab-pane fade" id="take">
				</div>
			</div>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('partials/login_modal');
	$this->load->view('includes/footer');?>

	<script type="text/javascript" src="<?php echo base_url('assets/js/plugin/chosen.jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/prompt-signin.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/fblogin.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/edtaddr.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/sidescroll.js');?>"></script>
</body>
</html>

<?php
/* End of file register_view.php */
/* Location: ./application/views/home/register_view.php */
/* By: Taufan Arsyad */
