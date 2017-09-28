<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
	<head> 
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,800,700,600,300' rel='stylesheet' type='text/css'>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8" /> 
		<title><?php bloginfo('name'); ?></title> 
		<?php wp_head(); ?>
		<meta name="description" content="Americas Diabetes Challenge"> 
		<meta name="keywords" content="Americas Diabetes Challenge">
		<script type="text/javascript" src="/wp-includes/js/jquery/jquery.js"></script>
		<!-- Added for fancybox tpl -->
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
		
		<link href="/wp-includes/js/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" /> 

		<!-- <script type="text/javascript" src="/wp-includes/js/fancybox/jquery.fancybox.pack.js"></script> -->
		<script type="text/javascript" src="/wp-includes/js/fancybox/jquery.fancybox.js"></script>

		<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" /> 

 		<!-- Cloud-hosted JW Player -->
 		<script src="http://jwpsrv.com/library/bzH+guAtEeKgexIxOQulpA.js"></script>

		<script type="text/javascript">
			jQuery(document).ready(function($) 
			{
				/* Videos on ADC Voices page */
				if ($("#voices-patient-video-1").length) {
					jwplayer("voices-patient-video-1").setup({
					        // file: "http://wpc.230d.edgecastcdn.net/00230D/gci/adc/TM 60 v13 20150421-HD 1080p.mov",
					        file: "http://wpc.230d.edgecastcdn.net/00230D/gci/adc/TM60v13HD640360.mp4",
					        image: "/images/video1_thumb.jpg",
					        width: 320,
					        height: 180
					});					
				}
				
				if ($("#voices-patient-video-2").length) {
					jwplayer("voices-patient-video-2").setup({
					        file: "http://wpc.230d.edgecastcdn.net/00230D/gci/adc/Diabetes Challenge V9B DGA Final Web.mp4",
					        image: "/images/video2_thumb.jpg",
					        width: 320,
					        height: 180
					});					
				}
				
				$(".missiondownload").click(function() {
					var href = $(this).prop("href");
					var filename = href.match(/.*\/(.*)$/)[1];
					switch (filename) {
						case 'mission1.pdf':
							$.ajax({
								url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION1DL_1?"
								,dataType: 'jsonp'
							})
							break;
						case 'mission2.pdf':
							$.ajax({
								url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION2DL_1?"
								,dataType: 'jsonp'
							})
							break;
						case 'mission3.pdf':
							$.ajax({
								url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION3DL_1?"
								,dataType: 'jsonp'
							})
							break;
						default:
							break;
					}
				});

				$(".fancybox").fancybox(
					{'titlePosition':'inside'
						,'transitionIn':'none'
						,'transitionOut':'none'
						,'width': 100 // 997
						,'height': 500  // 527
						,'autoSize':'false' // was 'autoDimensions'
						,'padding':'0'
						,'afterLoad': function(current, previous) {
							switch(current.href) {
								case '#mission1box':
									$.ajax({
										url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION1_1?"
										,dataType: 'jsonp'
									})
									break;
								case '#mission2box':
									$.ajax({
										url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION2_1?"
										,dataType: 'jsonp'
									})
									break;
								case '#mission3box':
									$.ajax({
										url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION3_1?"
										,dataType: 'jsonp'
									})
									break;
								case '#video1':
									$('.fancybox-skin').css("background-image", "url(/images/popup_nodl.png)"); 
									jwplayer("videoPlayer1").play(true);
									break;
								case '#video2':
									$('.fancybox-skin').css("background-image", "url(/images/popup_nodl.png)"); 
									jwplayer("videoPlayer2").play(true);
									break;
								case '#video3':
									$('.fancybox-skin').css("background-image", "url(/images/popup_nodl.png)"); 
									jwplayer("videoPlayer3").play(true);
									break;
								default:
									// console.info('header.php ' + current.href);
							}
							return true;
						}
					});  

				$(".fancybox-voices").fancybox(
					{'titlePosition':'inside'
						,'transitionIn':'none'
						,'transitionOut':'none'
						,'width': 100 // 997
						,'height': 500  // 527
						,'autoSize':'false' // was 'autoDimensions'
						,'padding':'0'
						,'tpl': 
							{
								wrap     : '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox2-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
								image    : '<img class="fancybox-image" src="{href}" alt="" />',
								iframe   : '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0"' + ($.browser.msie ? ' allowtransparency="true"' : '') + '></iframe>',
								error    : '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
								closeBtn : '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"></a>',
								next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
								prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
							}							
					});  

				$(".fancybox-missions").fancybox(
					{'titlePosition':'inside'
						,'transitionIn':'none'
						,'transitionOut':'none'
						,'width': 100 // 997
						,'height': 500  // 527
						,'autoSize':'false' // was 'autoDimensions'
						,'padding':'0'
						,'afterLoad': function(current, previous) {
							switch(current.href) {
								case '#mission1box':
									$.ajax({
										url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION1_1?"
										,dataType: 'jsonp'
									})
									break;
								case '#mission2box':
									$.ajax({
										url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION2_1?"
										,dataType: 'jsonp'
									})
									break;
								case '#mission3box':
									$.ajax({
										url: "http://iact.atdmt.com/iaction/cbnjnv_ADCACCEPTMISSION3_1?"
										,dataType: 'jsonp'
									})
									break;
								case '#video1':
									$('.fancybox-skin').css("background-image", "url(/images/popup_nodl.png)"); 
									jwplayer("videoPlayer1").play(true);
									break;
								case '#video2':
									$('.fancybox-skin').css("background-image", "url(/images/popup_nodl.png)"); 
									jwplayer("videoPlayer2").play(true);
									break;
								case '#video3':
									$('.fancybox-skin').css("background-image", "url(/images/popup_nodl.png)"); 
									jwplayer("videoPlayer3").play(true);
									break;
								default:
									// console.info('header.php ' + current.href);
							}
							return true;
						}
					});  
			});
		</script>
		<script type="text/javascript" src="//siterecruit.comscore.com/sr/americadiabetes/broker.js"></script>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/style.css" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/media.css" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/nav.css" />
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/navtheme.css" />
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/modal.js"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/validation.js"></script>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/placeholders.min.js"></script>
	</head> 
<?php
$pagename = get_query_var('pagename');
if($pagename=="")
{
	$pagename = "home";
}
?>
	<body class="<?php echo $pagename?>"> 
<!-- HEADER START--> 
		<div id="headerwrapper">
			<div id="header"> 
				<div id="logo"><a href="<?php bloginfo('url'); ?>"><img src="/images/logo.png" alt="Americas Diabetes Challenge" style="width:25%; padding-bottom:50px; border: none;" /></a></div> 
				<div class="headerlinks" style="position: absolute; left: 320px; top: 35px;">
											
						<a href="http://www.facebook.com/americasdiabeteschallenge" target="_fb" style="margin-right: 1px;">
						<div class="image"><img src="/images/facebook.png" style="width: 80%;"/></div><div class="text">Find us on Facebook</div></a>
					</a>
					<a href="http://twitter.com/intent/tweet?text=I just shared my story with %23AmericasDiabetesChallenge. Share yours today: http://bit.ly/1QJAshw" target="_tweet" class="twitter-share-button" data-lang="en" style="margin-right: 1px;">
						<div class="image"><img src="/images/twitter.png" style="width: 80%;"/></div><div class="text">Share on Twitter</div></a>
					</a>
<a href="#" data-toggle="modal" data-target="#resourceModal" style="margin-right: 1px;outline: none;">
<div class="image"><img src="/images/icon_resources.png" style="height:40px;margin-right:25px;"/></div></a>
<!--					
<a href="http://www.desafiandoladiabetes.com" style="margin-right:-125px; padding-left:0px"><img src="/images/icon_espanol.png" style="width:45%;"/></a>
-->
				</div>
				<div class="navigation"> 
					<?php 
						wp_nav_menu( array( 'menu' => 'header') );
					?>
				</div>
			</div> 
		</div>

		<div id="resourceModal" class="modal fade" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header"><a class="close" href="#" data-dismiss="modal">×</a></div>
					<div class="modal-body">
<center><h2><b>America’s Diabetes Challenge educational materials are available for download below:</b></h2></center>

<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="100">
<h2>Infographics:</h2>
</td>
<td width="150" align="center">
<a href="/pdf/Infographic.pdf" target="_blank"><img src="/images/thumb_adcinfographic_english2.png" height="150"></a>
</td>
<td width="150" align="center">
<a href="/pdf/Infographic_Spanish.pdf" target="_blank"><img src="/images/thumb_adcinfographic_spanish2.png" height="150"></a>
</td>
</tr>
<tr><td></td><td align="center"><!-- English --></td><td align="center">Spanish version</td></tr>
</table>

<BR>
<!--
<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="200">
<h2>Flier:</h2>
</td>
<td>
<a href="/pdf/Flier.pdf" target="_blank"><img src="/images/thumb_aatoolkit2.png" height="150"></a>
</td>
</tr>
</table>
-->
<BR>

<table border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="100">
<h2>Brochure:</h2>
</td>
<td align="center width="220">
<a href="/pdf/Brochure.pdf" target="_blank"><img src="/images/thumb_campaignbrochure_english2.png" height="50"></a>
</td>
<td align="center" width="220">
<a href="/pdf/Brochure_Spanish.pdf" target="_blank"><img src="/images/thumb_campaignbrochure_spanish2.png" height="50"></a>
</td>
</tr>
<td></td><td align="center"><!-- English --></td><td align="center">Spanish version</td>
</table>

<BR>

<table width="500" border="0" cellpadding="0" cellspacing="0">
<tr>
<td width="200">
<h2>Posters:</h2>
</td>
<td width="200">
<a href="/pdf/Poster_1.pdf" target="_blank"><img src="/images/thumb_tmcgraw_poster2.png" height="150"></a>
</td>
<td width="200">
<a href="/pdf/Poster_2.pdf" target="_blank"><img src="/images/thumb_sepatha_poster2.png" height="150"></a>
</td>
<td width="200">
<a href="/pdf/Poster_3.pdf" target="_blank"><img src="/images/thumb_campaignsinage2.png" height="150"></a>
</td>
</tr>
</table>
<BR>
To request additional materials, please email <a href="mailto:AmericasDiabetesChallenge@gcihealth.com">AmericasDiabetesChallenge@gcihealth.com</a>
				</div>
				</div>
			</div>
		</div>
<!-- HEADER END -->
<!-- MAIN CONTENT START --> 