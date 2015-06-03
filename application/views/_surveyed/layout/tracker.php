<?php
$time = 5;
if ( ! empty($opted)):
	if ($opted == 'modular')
		header('Refresh: ' . $time . ';url=' . base_url('survey/survey_three'));
	elseif ($opted == 'longform')
		header('Refresh: ' . $time . ';url=' . base_url('survey/survey_two'));
endif;
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $description;?>">
	<title><?php echo $title;?></title>

	<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico');?>">
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/foundation.min.css');?>">
	<!-- custom css -->
	<?php $this->load->view($css_dir);?>
	<?php $this->load->view('include/recorder'); ?>
</head>
<body>
	<div class="wrapper">
		<?php $this->load->view('include/header');?>
		<?php $this->load->view($view);?>
	</div>
	<?php
	$this->load->view('include/footer');
	$this->load->view('partial/_hint_scenario');
	?>
	<div id="login-modal" class="reveal-modal login-modal" data-reveal>
		<?php $this->load->view('include/login_box');?>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!-- <script src="<?php echo base_url('assets/js/jquery.js');?>"></script> -->
	<script src="<?php echo base_url('assets/js/foundation.min.js');?>"></script>
	<?php $this->load->view($js_dir);?>
</body>
</html>