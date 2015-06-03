<?php $this->load->view('home/before_login');?>

<section id="meal" class="meal-container">
	<?php $this->load->view('menu/meals');?>
</section>

<section id="alacarte" class="alacarte-container">
	<?php $this->load->view('menu/alacartes');?>
</section>

<?php $this->load->view('partial/_mealset_lightbox');?>