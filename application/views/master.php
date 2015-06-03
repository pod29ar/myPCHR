<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $desc;?>">
    <title><?php echo $title;?></title>

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/img/favicon.ico');?>">
    <link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/foundation.min.css');?>">
    <!-- custom css -->
    <?php foreach ($css as $style): ?>
        <link rel="stylesheet" href="<?php echo $style;?>">
    <?php endforeach; ?>
    <script src="<?php echo base_url('assets/js/plugs/modernizr.custom.js');?>"></script>
</head>
<body>
    <div class="wrapper">
        <?php
        $this->load->view('includes/header');

        if ( ! empty($view))
            $this->load->view($view);
        ?>
    </div>

    <?php $this->load->view('includes/footer'); ?>

    <div id="login-modal" class="reveal-modal login-modal" data-reveal>
        <?php $this->load->view('includes/login_box');?>
        <a class="close-reveal-modal">&#215;</a>
    </div>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <?php /*<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>*/ ?>
    <script src="<?php echo base_url('assets/js/foundation.min.js');?>"></script>
    <script type="text/javascript">
    // initialise foundation
    $(document).foundation();
    // echo any inline js
    <?php if ( ! empty($inlinejs)) echo $inlinejs; ?>
    </script>
    <?php foreach ($js as $script): ?>
        <script src="<?php echo $script;?>"></script>
    <?php endforeach; ?>

</body>
</html>