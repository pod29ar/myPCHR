<?php $this->load->view('include/progress_tab'); ?>

<div class="row"><div class="small-10 small-centered columns scenario-container">
	<h1>Part <?php echo $part; ?></h1>
	<?php $this->load->view('partial/_scenario');?>
</div></div>

<div class="row"><div class="small-10 small-centered columns notice-container">
	<?php $this->load->view('partial/_pricing');?>
</div></div>

<div class="row"><div class="small-12 columns text-center">
	<a href="<?php echo $link;?>" class="button">Next Step <i class="fa fa-arrow-right"></i></a>
</div></div>