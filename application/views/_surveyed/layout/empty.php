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
</head>
<body class="special-package">
	<?php $this->load->view($view); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<!-- <script src="<?php echo base_url('assets/js/jquery.js');?>"></script> -->
	<script src="<?php echo base_url('assets/js/foundation.min.js');?>"></script>
	<script>$(document).foundation();</script>
</body>
</html>