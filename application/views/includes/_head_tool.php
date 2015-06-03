<section class="contain-to-grid show-for-medium-up nvb nvb-menu">
    <nav class="top-bar" data-topbar>

        <ul class="title-area">
            <li class="name">
                <h1><a href="<?php echo base_url();?>">
                    <img src="<?php echo base_url('assets/img/dominos_logo.png');?>">
                </a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
        </ul>

        <section class="top-bar-section">
            <?php
            $ala_url = '<a href="' . base_url('longform#alacarte') . '" class="long-pass" data-target="#alacarte">Health Record</a>';
            $meal_url = '<a href="' . base_url('longform#meal') . '" class="long-pass" data-target="#meal">Appointments</a>';
            $ono_url = '<a href="' . base_url('longform#meal') . '" class="button long-pass" data-target="#meal">Order Now</a>';
            ?>
            <!-- Left Nav Section -->
            <ul class="left">
                <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
                <li><a href="#">Health Record</a></li>
                <li><a href="#">Appointments</a></li>
                <li><a href="#">Consultations</a></li>
                <li><a href="#">My Child Status</a></li>
                <li><a href="#">Important Contact</a></li>
            </ul>
        </section>
    </nav>
</section>
