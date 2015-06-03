<div class="float-switch sc">
	<a href="#" data-reveal-id="hint-scenario" class="pirate-ship">
		<h4 class="captain">User Guide</h4>
		<p class="first-mate">Feeling Lost?</p>
		<div class="sharp-shooter">Click Here For Scenario</div>
	</a>
</div>

<div id="hint-scenario" class="reveal-modal large" data-reveal>
	<div class="row"><div class="small-12 columns">
		<?php $this->load->view('partial/_scenario');?>
	</div></div>

	<div class="row"><div class="small-12 columns notice-container">
		<?php $this->load->view('partial/_pricing');?>
	</div></div>
	<a class="close-reveal-modal">&#215;</a>
</div>