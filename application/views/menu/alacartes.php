<!-- page menu -->
<section class="row page-menu">
	<div class="small-12 columns"><?php $this->load->view('menu/includes/page_menu');?></div>
</section>

<!-- title -->
<section class="row menu-head">
	<h2 class="mh-title"><?php echo $alacarte_title;?></h2>
</section>

<!-- content -->
<section class="row alacarte-menu">
	<div id="menu-holder" class="small-12 columns menu-holder"><?php $this->load->view('menu/includes/menu_view');?></div>
</section><!-- row close -->