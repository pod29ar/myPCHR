<!-- main promotions -->
<section class="row main-promo">
    <div class="small-9 columns mc-container">
        <div id="main-cars" class="main-cars">
            <div class="mc-item"><img src="<?php echo base_url('assets/img/new_home/banner_1.png');?>"></div>
            <div class="mc-item"><img src="<?php echo base_url('assets/img/new_home/banner_2.png');?>"></div>
            <div class="mc-item"><img src="<?php echo base_url('assets/img/new_home/banner_3.png');?>"></div>
        </div>
    </div>
    <aside class="small-3 columns"><?php $this->load->view('includes/side_promo');?></aside>
</section>

<!-- coupons promotions -->
<section class="row coupons-promo">
    <!-- newsletter -->
    <div class="small-6 columns">
        <div class="boxer nwsltr-container">
            <h2 class="nwsltr-head">WANT FREE COUPONS?</h2>
            <form action="#" method="post">
                <div class="row"><div class="small-12 columns">
                    <label class="nwsltr-instr">Enter <strong>Email Address</strong> to get promo codes<br>from us in the future</label>
                </div></div>
                <div class="row">
                    <div class="small-7 columns">
                        <input type="email" name="email" class="nwsltr-email" placeholder="your@email.com">
                    </div>
                    <div class="small-5 columns">
                        <button class="button nwsltr-button" type="submit">Subscribe</button>
                    </div>
                </div>
                <div class="row"><div class="small-12 columns nwsltr-caption">
                    <span>Domino's loves you, we don't spam.</span>
                </div></div>
            </form>
        </div>
    </div>
    <!-- gps tracker -->
    <div class="small-3 columns">
        <div class="boxer gps-container">
            <img src="<?php echo base_url('assets/img/new_home/gps_tracker.png');?>">
            <h4 class="gps-head">GPS TRACKER</h4>
            <h5 class="gps-subhead">TRACK YOUR PIZZA</h5>
        </div>
    </div>
    <!-- coupon box -->
    <div class="small-3 columns">
        <div class="boxer coupon-container">
            <h4 class="cou-head">GOT COUPON?</h4>
            <p class="cou-excerpt">Enter Promo Code &amp; Redeem Now!</p>
            <form action="<?php echo base_url('coupon/get_coupon');?>" method="post">
                <div class="row">
                    <div class="small-7 columns">
                        <input type="text" name="code" class="coupon-code" placeholder="DP2">
                    </div>
                    <div class="small-5 columns">
                        <button class="button coupon-button" type="submit">Go</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- flipboard -->
<section class="row flipboard" data-equalizer>
    <div class="small-4 columns">
        <div id="fb-left" class="flips fb-flips bb-bookblock" data-equalizer-watch>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/express_promo.png');?>"></div>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/like_facebook.png');?>"></div>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/citibank_promo.png');?>"></div>
        </div>
    </div>
    <div class="small-4 columns">
        <div id="fb-center" class="flips fb-flips bb-bookblock" data-equalizer-watch>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/like_facebook.png');?>"></div>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/citibank_promo.png');?>"></div>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/express_promo.png');?>"></div>
        </div>
    </div>
    <div class="small-4 columns">
        <div id="fb-right" class="flips fb-flips bb-bookblock" data-equalizer-watch>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/citibank_promo.png');?>"></div>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/express_promo.png');?>"></div>
            <div class="bb-item"><img src="<?php echo base_url('assets/img/new_home/like_facebook.png');?>"></div>
        </div>
    </div>
</section>
