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

			<!-- Login Panel -->
			<div class="row">
				
				<div class="col-md-11 centeri">

					<?php if (validation_errors() != ''): ?>
						<h5 class="alert alert-danger"><?php echo validation_errors();?></h5>
					<?php endif;?>

					<div id="regs" class="row pro-adr">
						<form method="post" action="<?php echo base_url('data/update_profile');?>">

							<div class="col-sm-6 lgn-panel">
								<h3>Account Information</h3>
								<div class="form-group">
									<label for="user">Username</label>
									<input name="user" type="text" class="form-control" id="user" value="<?php echo (validation_errors()) ? set_value('user') : (isset($username)) ? $username : '';?>">
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input name="email" type="email" class="form-control" id="email" value="<?php echo (validation_errors()) ? set_value('email') : (isset($email)) ? $email : '';?>">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input name="password" type="password" class="form-control" id="password" value="<?php echo set_value('password');?>">
								</div>
								<div class="form-group">
									<label for="passconf">Confirm Password</label>
									<input name="passconf" type="password" class="form-control" id="passconf" value="<?php echo set_value('passconf');?>">
								</div>
							</div>

							<div class="col-sm-6 lgn-panel">
								<h3>Personal Information</h3>
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="firstName">First Name</label>
										<input name="fName" type="text" class="form-control" id="firstName" value="<?php echo (validation_errors()) ?  set_value('fName') : (isset($fname)) ? $fname : '';?>">
									</div>
									<div class="col-sm-6 form-group">
										<label for="lastName">Last Name</label>
										<input name="lName" type="text" class="form-control" id="lastName" value="<?php echo (validation_errors()) ?  set_value('lName') : (isset($lname)) ? $lname : '';?>">
									</div>
								</div>
								<div class="form-group">
									<label for="dob">Date of Birth (MM/DD/YYYY)</label>
									<input name="dob" type="text" class="form-control" id="dob" value="<?php echo (validation_errors()) ? set_value('dob') : (isset($dob)) ? $dob : '';?>">
								</div>
								<div class="form-group">
									<label for="con-mobile">Mobile Contact</label>
									<input name="con-mobile" type="tel" class="form-control" id="con-mobile" value="<?php echo (validation_errors()) ? set_value('con-mobile') : (isset($conmobile)) ? $conmobile : '';?>">
								</div>
								<div class="form-group">
									<label for="con-home">Home Contact (optional)</label>
									<input name="con-home" type="tel" class="form-control" id="con-home" value="<?php echo (validation_errors()) ? set_value('con-home') : (isset($conhome)) ? $conhome : '';?>">
								</div>
								<div class="form-group">
									<label for="con-office">Office Contact (optional)</label>
									<input name="con-office" type="tel" class="form-control" id="con-office" value="<?php echo (validation_errors()) ? set_value('con-office') : (isset($conoffice)) ? $conoffice : '';?>">
								</div>
							</div>

							<div class="pull-right btn-ctrl">
								<button id="uprf" class="btn btn-action">Update Profile</button>
								<button id="mgad" class="btn btn-action">Manage Address</button>
							</div>
						</form>
					</div>

					<div id="addr" class="row adr-cont">
						<div id="addr-ls" class="col-sm-12 pull-left pro-adr adr-md">
							<ul class="addr-ls">
								<?php $x = 1;
								foreach ($addresses as $array): ?>
								<li class="addr" data-adid="<?php echo 'address'.$x;?>">
									<div class="pull-left addr-det">
										<span><?php echo $x;?></span>
										<h3><?php echo $array['addrNick'];?></h3>
										<h4><?php echo $array['addrType'];?></h4>
										<p><?php echo $array['fullAddr'];?></p>
									</div>
									<div class="pull-right btn-ctrl">
										<button class="btn btn-action ed-addr"><span class="glyphicon glyphicon-cog"></span></button>
										<button class="btn btn-danger dl-addr"><span class="glyphicon glyphicon-trash"></span></button>
									</div>
									<div class="clearfix"></div>
								</li>
								<?php $x++;
								endforeach;?>
							</ul>
						</div>

						<div id="addr-dt" class="col-sm-7 pull-left pro-adr adr-rt">
							<form method="post" action="<?php echo base_url('data/update_address');?>" data-flag="1">

								<h3>Address Information</h3>
								<div class="form-group">
									<label for="addrNick">Address Nickname</label>
									<input name="addrNick" type="text" class="form-control" id="addrNick" value="<?php echo set_value('addrNick');?>">
								</div>
								<div class="form-group">
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
								<div class="row">
									<div class="col-sm-8 form-group">
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
									<div class="col-sm-4 form-group">
										<label for="postcode">Postcode</label>
										<select id="postcode" name="postcode" class="form-control">
											<option value="">Select Postcode</option>
											<option value="43000">43000</option><option value="43300">43300</option>
											<option value="43650">43650</option><option value="58200">58200</option>
										</select>
									</div>
								</div>
								<div class="form-group">
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
								<div class="form-group">
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
								<div class="form-group">
									<label for="addrComplex">Complex (optional)</label>
									<input name="addrComplex" type="text" class="form-control" id="addrComplex" value="<?php echo set_value('addrComplex');?>">
								</div>
								<div class="form-group">
									<label for="addrType">Address Type</label>
									<select id="addrType" name="addrType" class="form-control">
										<option value="Resident">Resident</option>
										<option value="Business">Business</option>
										<option value="Hotel">Hotel</option>
										<option value="Other">Other</option>
									</select>
								</div>
								<div class="row">
									<div class="col-sm-6 form-group">
										<label for="addrBuild">Building No</label>
										<input name="addrBuild" type="text" class="form-control" id="addrBuild" value="<?php echo set_value('addrBuild');?>">
									</div>
									<div class="col-sm-6 form-group">
										<label for="addrBlock">Block No (optional)</label>
										<input name="addrBlock" type="text" class="form-control" id="addrBlock" value="<?php echo set_value('addrBlock');?>">
									</div>
								</div>

								<button id="btn-subm" class="btn btn-lg btn-action btn-reg">Submit</button>
								<button id="btn-canc" class="btn btn-lg btn-link">Cancel</button>

							</form>
						</div>

						<div class="clearfix"></div>
					</div>

				</div>
			</div>

		</div>
	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugin/chosen.jquery.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/plugin/bootstrap-datepicker.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/newscr/edtprof.js');?>"></script>
</body>
</html>

<?php
/* End of file register_view.php */
/* Location: ./application/views/home/register_view.php */
/* By: Taufan Arsyad */
