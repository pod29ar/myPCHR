<?php if (isset($progress) && $progress == 'P1'): ?>
	<div class="progress small-12 primary">
	  <span class="meter" style="width: 0%"></span>
	  <div class="indicator">
	  	<span class="ind-text">0% of Survey Completion</span>
	  </div>
	</div>
<?php endif; ?>

<?php if ((isset($progress) && $progress == 'P2') OR (isset($opted) && $opted == 'longform')): ?>
	<div class="progress small-12 primary">
	  <span class="meter" style="width: 10%"></span>
	  <div class="indicator">
	  	<span class="ind-text">10% of Survey Completion</span>
	  </div>
	</div>
<?php endif; ?>

<?php if (isset($progress) && $progress == 'P3'): ?>
	<div class="progress small-12 primary">
	  <span class="meter" style="width: 40%"></span>
	  <div class="indicator">
	  	<span class="ind-text">40% of Survey Completion</span>
	  </div>
	</div>
<?php endif; ?>

<?php if ((isset($progress) && $progress == 'P4') OR (isset($opted) && $opted == 'modular')): ?>
	<div class="progress small-12 primary">
	  <span class="meter" style="width: 60%"></span>
	  <div class="indicator">
	  	<span class="ind-text">60% of Survey Completion</span>
	  </div>
	</div>
<?php endif; ?>

<?php if (isset($progress) && $progress == 'P5'): ?>
	<div class="progress small-12 primary">
	  <span class="meter" style="width: 90%"></span>
	  <div class="indicator">
	  	<span class="ind-text">90% of Survey Completion</span>
	  </div>
	</div>
<?php endif; ?>

<?php if (isset($progress) && $progress == 'P6'): ?>
	<div class="progress small-12 primary">
	  <span class="meter" style="width: 100%"></span>
	  <div class="indicator">
	  	<span class="ind-text">100% of Survey Completion</span>
	  </div>
	</div>
<?php endif; ?>