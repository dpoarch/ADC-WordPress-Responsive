<!-- MAIN CONTENT END --> 
<!-- FOOTER START --> 
 		<?php 
			if (!is_page( 'ADC Voices' ))
			{?>
			<div id="footerwraper">
	 		<div id="footer">
 				<div class="footerleft">
	 				<div class="prtcode">
	 					<?php
	 						// 133 = ADC Voices
	 						//   8 = About T2D
	 						//  12 = AA and T2D
	 						if (($post->ID == 133) || ($post->ID == 8)) {
	 							echo "DIAB-1173911-0002 (04/16)";
	 						} elseif ($post->ID == 12) {
	 							echo "DIAB-1173911-0002 (04/16)";
	 						} else {
	 							echo "DIAB-1173911-0002 (04/16)";
	 						}
	 					?>
	 				</div>
 				</div>
<img src="/images/logo_footer_ada.png" style="margin-top:8px">
				<div class="footerright"></div>
				<div class="clear"></div>
			</div>
		</div>
		<?php
			}
			?>
<!-- FOOTER END --> 
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-50403558-1', 'americasdiabeteschallenge.com');
  ga('send', 'pageview');
 
</script>
<!-- Added for image map -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.rwdImageMaps.min.js"></script>
<script type="text/javascript">
		jQuery('img[usemap]').rwdImageMaps();
</script>
	</body> 
</html>