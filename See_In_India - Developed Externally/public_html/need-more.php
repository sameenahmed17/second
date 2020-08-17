<?php
	session_start();
	include("include/functions.php");
    $obj = new functions();
	
	if(isset($_POST['success'])) {
		echo "<script>alert('You have successfully logged in..')</script>";
	}
	
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>See In India</title>
		
		<!-- meta description -->
		<meta name="description" content="YOUR META DESCRIPTION GOES HERE" />
		
		<!-- meta keywords -->
		<meta name="keywords" content="YOUR META KEYWORDS GOES HERE" />
		
		<!-- meta viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
		<!-- favicon -->
		<link rel="icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		
		<!-- bootstrap 3 stylesheets -->
		<link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" />
		<!-- template stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />

		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="all" />
		<!-- responsive stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />

		<!-- Load Fonts via Google Fonts API -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
		
		
		
<script>
function searchvalue(x)
{ 	//alert(x);
	$("#test").show();
	//alert(x);
	$.ajax({
	method:"GET",
  url: "searchtourajax.php?value="+x,
  success: function( result ){
								$("#test").html(result);
							 }
						
});

}

</script>
<script>
function validate()
	{
	
	 var where_to_go=document.forms["search"]["where_to_go"].value;
	 
	 var from_date=document.forms["search"]["from_date"].value; 
	 var to_date=document.forms["search"]["to_date"].value; 
	 //alert(prod);
	 
		if((where_to_go==null || where_to_go==''))
		{
		search.where_to_go.focus(); 
		return false;
		}
	}
	</script>
<script>
function gettext(x)
{
 
 y=$("#div"+x).text();
 // alert(y);
	//document.getElementById('search').value=y;
	$("#test").hide();
	$("#searchtext").val(y);
	//window.location="tour-info.php?id="+x;
	//alert(x);

}
</script> 

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56111840-1', 'auto');
  ga('send', 'pageview');

</script>

	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			<!-- START header -->
			<header>
				<!-- START #top-header -->
				<?php include 'header/top-header.php'; ?>
				<!-- END #top-header -->
				
				<!-- START #main-header -->
				<div id="main-header">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<a id="site-logo" href="index.php">
                                	<!--See In India-->
									<img src="img/logo.png" alt="See In India" />
								</a>
							</div>
							<div class="col-md-9">
								<nav class="main-nav">
									<span>MENU</span>
									<ul id="main-menu">
										<?php include 'header/sub-menu.php';?>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<!-- END #main-header -->
			</header>
			<!-- END header -->
			
			<!-- START #main-slider -->
			<div id="main-slider">
				<div id="content-slider">
					<ul>
						<?php $banner_images = $obj->getBannerImages1();?>
						<?php for($i=1;$i<=15;$i++) { ?>
						<? if($banner_images['img'.$i]!="") { ?>
						<!-- START Slide 1 -->
						<li data-transition="fade" data-slotamount="5" data-masterspeed="700">
							<img src="admin/images/banner/<?php echo $banner_images['img'.$i]?>" alt="Slider Image 1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
						
							
							<!-- LAYER NR. 1 -->
							<div class="caption caption-yellow sft stt headline text-upper"
								data-x="20"
								data-y="150"
								data-speed="600"
								data-start="2000"
								data-easing="Power3.easeOut"
								data-endspeed="400"
								data-endeasing="Power4.easeIn"
								data-captionhidden="off"
								style="z-index:6;font-size:18px;"><?php if($banner_images['yellow_text'.$i]!="") { echo $banner_images['yellow_text'.$i]; } ?>
							</div>
							
							<!-- LAYER NR. 2 -->
							<div class="caption caption-white sfr stl slider-heading text-upper"
								data-x="20"
								data-y="185"
								data-speed="1000"
								data-start="1800"
								data-easing="Power2.easeOut"
								data-endspeed="600"
								data-endeasing="Power3.easeIn"
								data-captionhidden="off"
								style="z-index:6;font-size:48px; "><?php if($banner_images['white_text'.$i]!="") { echo $banner_images['white_text'.$i]; } ?>
							</div>
							
							<!-- LAYER NR. 3 -->
							<div class="caption caption-black sfb stb headline text-upper"
								data-x="20"
								data-y="263"
								data-speed="600"
								data-start="1500"
								data-easing="Power4.easeOut"
								data-endspeed="500"
								data-endeasing="Power1.easeIn"
								data-captionhidden="off"
								style="z-index:6"><?php echo $banner_images['description'.$i]?>
							</div>
						</li>
						<? } ?>
						<?php  } ?>
						<!-- END Slide 1 -->
						
						
						<!-- END Slide 4 -->
					</ul>
				</div>
				<div id="slider-overlay"></div>
			</div>
			<!-- END #main-slider -->
			

			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container" id="home-page">

					<!-- START .tour-plan -->
					<form class="plan-tour" action="search.php" method="post" name="search" onsubmit="return validate();"> 
						<div class="plan-banner"><span>PLAN YOUR</span><h4>DREAM <span>TOUR</span></h4></div>
						<div class="top-fields">
							<div class="input-field col-md-4"><input type="text" id="searchtext" placeholder="Where to go?"  name="where_to_go" onkeyup="searchvalue(this.value);"/><div id="test"></div></div>
							<!--<div class="input-field col-md-3"><input type="text" placeholder="2. What to do?" /></div>-->
							<div class="input-field col-md-8 schedule">
								<input type="text" class="date-picker" value="" placeholder="From When?" data-date="11-12-2012" data-date-format="dd-mm-yyyy"  name="from_date"/>
								<i class="calendar-icon"></i>
								<input type="text" class="date-picker" value="" placeholder="Till When?" data-date="12-12-2012" data-date-format="dd-mm-yyyy" name="to_date"/>
							</div>
						</div>
						<div class="bottom-fields">
							<div class="submit-btn col-md-2">
								<input type="submit" value="Search"  name="search_tours_submit_need"/>
							</div>
						</div>
					</form>
					<!-- END .tour-plan -->
					
					<h2 class="ft-heading text-upper">Amazing Destinations</h2>

					<div class="carousel">
						<ul class="slides">
							<li>
								<div class="row">
									<?php $home_destination = $obj->getHomeDestinationneed();?>
									<?php while($home = mysql_fetch_array($home_destination)) { 
											$tour = str_replace(' ', '-',$home['nameof_tour']); 
											$lower_tour= strtolower( $tour);
											$seo_url_tour_info=$obj->getStaticUrl($home['id'],$lower_tour);
									?>
									<div class="col-md-3">
										<a href="<?php echo $seo_url_tour_info; ?>"><div class="ft-item">
											<span class="ft-image">
										<? if($home['picturegallery1']!="") { ?>	
                                      <img src="admin/images/cityplace/<?php echo $home['picturegallery1']?>" alt="featured Scroller" style="width:270px;height:137px"/>
									  <? } else { ?>
									  <img src="img/no-images-3.jpg" alt="featured Scroller" style="width:270px;height:137px"/>
									  <? } ?>
											</span>
											<div class="ft-data">
											<? if($home['hotel']!="") { ?>
												<a class="ft-hotel text-upper">Hotel</a>												
											<? } ?>
											<? if($home['meals']=="yes") { ?>
												<a class="ft-tea text-upper" >Meals</a>
											<? } ?>	
											<? if($home['transfers']=="yes") { ?>
                                                <a class="ft-car text-upper" >Transfer</a>
											<?} ?>	
											<? if($home['entrance']=="yes") { ?>
                                                <a class="ft-entrance text-upper" >Entrance</a>												
											<? } ?>	
											<? if($home['guide']=="yes") { ?>
												<a class="ft-guid text-upper" >Guide</a>
											<? } ?>	
											<? if($home['equipment']=="yes") { ?>
                                                <a class="ft-equipment text-upper" >Equipment</a>
											<? } ?>	
												
											</div>
											<div class="ft-foot">
												<h4 class="ft-title text-upper"><a href="<?php echo $seo_url_tour_info; ?>"><?php echo substr($home['nameof_tour'],0,20); ?></a></h4>
												<span class="ft-offer text-upper">Prices Starting From Rs <?php echo $home['price']?> </span>
											</div>
											<div class="ft-foot-ex">
												<span class="ft-date text-upper alignleft">28 December 2013</span>
												<span class="ft-temp alignright">17&#730;c</span>
											</div>
										</div></a>
									</div>
									<?php } ?>
									
									
								</div>
							</li>
						</ul>  	
					</div>

				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START .main-contents .bom-contents -->
			<? $content = $obj->query("select * from tour_type");?>
			<? $content_result = $obj->fetch($content);?>
			<div class="main-contents bom-contents">
				<div class="container">
					<h2 class="text-center text-upper">Type of Activity</h2>
					<p class="headline text-center">India is a heaven for Sightseeing and Activities be it Summer or Winter,  come See In India the Places with us which has so much to See and Do</p>
					
					<div class="row">
						<!-- START featured destination 1 -->
						<a href="beach-activity">
							<section class="col-md-3 fd-column">
								<div class="featured-dest">
									<span class="fd-image">
										<img class="img-circle" src="admin/images/dp/<? echo $content_result['beach_image']?>" alt="Featured Destination" />
									</span>
									<h3 class="text-center text-upper">Beach</h3>
									<p class="text-center"><?echo substr($content_result['beach'],0,150);?></p>
									<span class="btn-center">
										<a class="btn btn-primary text-upper" href="beach-activity" title="Search">View More</a>
									</span>
								</div>
							</section>
						</a>
						<!-- END featured destination 1 -->
						
						<!-- START featured destination 2 -->
						<a href="romantic-activity">
							<section class="col-md-3 fd-column">
								<div class="featured-dest">
									<span class="fd-image">
										<img class="img-circle" src="admin/images/dp/<? echo $content_result['romantic_image']?>" alt="Featured Destination" />
									</span>
									<h3 class="text-center text-upper">Romantic</h3>
									<p class="text-center"><?echo substr($content_result['romantic'],0,150);?></p>
									<span class="btn-center">
										<a class="btn btn-primary text-upper" href="romantic-activity" title="Search">View More</a>
									</span>
								</div>
							</section>
						</a>
						<!-- END featured destination 2 -->
						
						<!-- START featured destination 3 -->
						<a href="amazing-activity">
							<section class="col-md-3 fd-column">
								<div class="featured-dest">
									<span class="fd-image">
										<img class="img-circle" src="admin/images/dp/<? echo $content_result['amazing_image']?>" alt="Featured Destination" />
									</span>
									<h3 class="text-center text-upper">Amazing</h3>
									<p class="text-center"><?echo substr($content_result['amazing'],0,150);?></p>
									<span class="btn-center">
										<a class="btn btn-primary text-upper" href="amazing-activity" title="Search">View More</a>
									</span>
								</div>
							</section>
						</a>
						<!-- END featured destination 3 -->
						
						<!-- START featured destination 4 -->
						<a href="fun-activity">
							<section class="col-md-3 fd-column">
								<div class="featured-dest">
									<span class="fd-image">
										<img class="img-circle" src="admin/images/dp/<? echo $content_result['fun_image']?>" alt="Featured Destination" />
									</span>
									<h3 class="text-center text-upper">Fun</h3>
									<p class="text-center"><?echo substr($content_result['fun'],0,150);?></p>
									<span class="btn-center">
										<a class="btn btn-primary text-upper" href="fun-activity" title="Search">View More</a>
									</span>
								</div>
							</section>
						</a>
						<!-- END featured destination 4 -->
					</div>
				</div>
			</div>
			<!-- END .main-contents .bom-contents -->
			
			<?php include 'header/bottom-footer.php';?>
		</div>
		<!-- END #wrapper -->

		<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script src="js/jquery.flexslider-min.js"></script>
		<script src="js/script.js"></script>
		<script src="js/jquery.minimalect.min.js" type="text/javascript"></script>
		
		<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
		<script type="text/javascript" src="js/rs-plugin/js/jquery.plugins.min.js"></script>
		<script type="text/javascript" src="js/rs-plugin/js/jquery.revolution.min.js"></script>

		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->


		<script type="text/javascript">
		$(document).ready(function() {
			// revolution slider
			revapi = $("#content-slider").revolution({
				delay: 15000,
				startwidth: 1170,
				startheight: 920,
				hideThumbs: 10,
				fullWidth: "on",
				fullScreen: "off",
				fullScreenOffsetContainer: "",
				navigationVOffset: 320
			});
			
			// initilize datepicker
			$(".date-picker").datepicker();
		});


	    $(window).load(function(){
	      $('.carousel').flexslider({
			animation: "fade",
			animationLoop: true,
			controlNav: false,	
		    maxItems: 1,
			pausePlay: false,
			mousewheel:true,
			start: function(slider){
			  $('body').removeClass('loading');
			}
	      });
	    });


		</script>
		<script>
		$(document).ready(function(){
			$("#adults").minimalect({ theme: "bubble", placeholder: "Select" });
			$("#kids").minimalect({ theme: "bubble", placeholder: "Select" });
		});
		</script><!--- SELECT BOX -->
	</body>
</html>