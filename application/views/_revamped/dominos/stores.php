<!DOCTYPE html>
<html>
<head>
	<?php $this->load->view('includes/new_header');?>
</head>
<body>

	<div class="wrapper">
		<?php $this->load->view('includes/new_profilebar');
		$this->load->view('includes/new_navbar');?>

		<div class="container">

			<h3 class="dir-head">
				<span><!--
					--><a href="<?php echo base_url('');?>">Home</a> /  <!--
				--></span> Store Location
			</h3>

			<div class="row">
				
				<div class="col-md-4">
					<div class="stores">
						<label>Filter by State </label>
						<select class="states">
							<option value="selangor">Selangor</option>
							<option value="kuala_lumpur">Kuala Lumpur</option>
						</select>

						<div class="stores_list">
							<ul></ul>
						</div><!--  close -->
					</div><!-- stores close -->
				</div><!-- col-md-4 close -->
				<div class="col-md-8">
					<div class="store_detail">

						<h3>Ampang Point</h3>

						<h4>Business Hours</h4>
						<p>11am - 11pm</p>

						<h4>Phone</h4>
						<p> (619) 234-0785 </p>

						<h4>Store Address</h4>
						<a href="#" class="btn btn-action btn-lg pull-right">Get Direction</a>
						<p class="store_address">Lot G-19, Ground Floor Ampang Point Shopping Centre Jln Memanda 3, Ampang Point 68000 Ampang, Selangor</p>

						<h4>Map</h4>
						<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Ampang+Point+Shopping+Centre+Jalan+Mamanda+3,+Ampang+Point+68000+Ampang,+Selangor&amp;aq=&amp;sll=3.159542,101.75786&amp;sspn=0.064961,0.117416&amp;ie=UTF8&amp;hq=Ampang+Point+Shopping+Centre+Jalan+Mamanda+3,+Ampang+Point+68000+Ampang,+Selangor&amp;hnear=&amp;radius=15000&amp;t=m&amp;ll=3.175996,101.751595&amp;spn=0.082271,0.109863&amp;z=12&amp;output=embed"></iframe>
					</div><!-- store_detail close -->
				</div><!-- col-md-8 close -->

			</div><!-- row close -->			
		</div><!-- container close -->

	</div>

	<?php $this->load->view('includes/new_bottom');
	$this->load->view('includes/footer');?>

	<script type="text/javascript">
		$(document).ready(function() {
			
			$('.stores_list ul').on( "click", 'li', function() {
				$('.stores_list ul li').removeClass('current');
				$(this).addClass('current');
				$('.store_detail h3').html( $(this).text());

			});
		
			$('.states').change( function() {
				var state = $(this).find("option:selected").val();
				getStoreList(state);
			});

			function getStoreList(state) {
	 			$.ajax({
					url: "<?php echo base_url();?>assets/js/stores.json",
					dataType: 'json',
					success: function( results ) {

						$('.stores_list ul li').remove();

						if (state == 'selangor')
							results = results.selangor;
						else
							results = results.kuala_lumpur;

						$.each(results, function( i, stores ) {
							$('.stores_list ul').append( "<li><h3>" + stores.title + "</h3></li>" );
							$('.stores_list ul li').delay( 500 ).slideDown( 200 );
						});
					}
				});
			}
			
			getStoreList('selangor');

		});
	</script>
</body>
</html>

<?php
/* End of file landing_view.php */
/* Location: ./application/views/home/landing_view.php */
/* By: Taufan Arsyad */
?>