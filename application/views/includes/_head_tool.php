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
            $ala_url = '<a href="' . base_url('longform#alacarte') . '" class="long-pass" data-target="#alacarte">Menu</a>';
            $meal_url = '<a href="' . base_url('longform#meal') . '" class="long-pass" data-target="#meal">Promo Meals</a>';
            $ono_url = '<a href="' . base_url('longform#meal') . '" class="button long-pass" data-target="#meal">Order Now</a>';
            ?>
            <!-- Left Nav Section -->
            <ul class="left">
                <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i></a></li>
                <li><?php echo $ala_url;?></li>
                <li><?php echo $meal_url;?></li>
                <li><a href="#">Locate Us</a></li>
                <li><a href="#">About Us</a></li>
            </ul>

            <ul class="right button-group howto-container">
                <li><a href="#" class="button" data-reveal-id="hint-scenario">How To?</a></li>
                <li><?php echo $ono_url;?></li>
            </ul>
        </section>
    </nav>
</section>
