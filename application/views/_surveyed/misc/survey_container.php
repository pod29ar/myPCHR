<?php $this->load->view('include/progress_tab'); ?>

<div class="row"><div class="small-12 columns">
	<?php if ($survey == '1'): ?>

		<h1>Welcome to the survey</h1>
		<div id="surveyMonkeyInfo" class="survey-frame"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=5to4IaKAFhQEuOVIkUtFOA_3d_3d"> </script></div></div>

	<?php elseif ($survey == '2'): ?>

		<h1>Survey for Non-Longform Design</h1>
		<div id="surveyMonkeyInfo" class="survey-frame"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=3fgEi9LVbzGWRU2RGeQnAg_3d_3d"> </script></div></div>

	<?php elseif ($survey == '3'): ?>

		<h1>Survey for Longform Design</h1>
		<div id="surveyMonkeyInfo"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=9VRaQzJkBy4CGN5xtZA4yA_3d_3d"> </script></div></div>

	<?php elseif ($survey == '4'): ?>

		<h1>Last Survey - Comparison and Demography</h1>
		<div id="surveyMonkeyInfo" class="survey-frame"><div><script src="https://www.surveymonkey.com/jsEmbed.aspx?sm=scBVxIloyC6BzvhvuLuoVA_3d_3d"> </script></div></div>

	<?php endif; ?>
</div></div>

<div id="bummer" class="row" style="display:none"><div class="small-12 columns">
	<div class="text-center survey-frame">
		<h1>Bummer</h1>
		<p>It seems like something went wrong along the way.<br>Kindly reload the page, please.</p>
		<p>Thank you.</p>
	</div>
</div></div>

<?php if (isset($link) && ! empty($link)): ?>
	<div class="row"><div class="small-8 small-centered columns">
		<div class="row">

			<div class="small-8 columns text-center">
				<p>The page above may take up to 30 (thirty) seconds to load, please be patient. <i>Please do not click on the link "Learn More" above.</i></p>
				<p>A link will appear beside shortly.<br><strong>Please click the link only if you have FINISHED the survey above</strong></p>
			</div>

			<div class="small-4 columns">
				<a id="nexstep" href="<?php echo $link;?>" class="button bigss-button">Next Step <i class="fa fa-arrow-right"></i></a>
			</div>

		</div>
	</div></div>
<?php endif; ?>