<?
	session_start();
	include("include/functions.php");
	
    $obj = new functions();
	
	if(isset($_POST['search_tours_submit'])) { 
	$extra = "activities";
	}
	
	if(isset($_POST['search_tours_submit_need'])) { 
	$extra = "more_day";
	}
	
	//include("pagination.php");
	/* if(isset($_POST['search_tours_submit'])) { 
	$search_tour = $obj->searchTours($_POST);
	echo $rows = mysql_num_rows($search_tour);
	} */
	
	
	if(isset($_POST['submit_header_search']))
	{
		$extra='more_day';
		$search_tour = $obj->searchToursheaders($_POST);
		 $rows = mysql_num_rows($search_tour);
		
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
		<!-- responsive stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
		<!-- Load Fonts via Google Fonts API -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
        <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<script>
function validate()
	{
	//alert('hi');
	 var where_to_go=document.forms["search"]["where_to_go"].value;
	 
	 var from_date=document.forms["search"]["from_date"].value; 
	 var to_date=document.forms["search"]["to_date"].value; 
	 //alert(prod);
	 
		if((where_to_go==null || where_to_go=='') && (from_date==null || from_date=='') && (to_date==null || to_date==''))
		{
		search.where_to_go.focus(); 
		return false;
		}
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
			
			<!-- START #page-header -->
			<div id="header-banner">
				<div class="banner-overlay">
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper">Tour LIST</h1>
							</section>
							
							<!-- breadcrumbs -->
						  <section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="index.php">Home</a></li>
									<li><a href="#">Search Tours</a></li>
								</ol>
							</section>
						</div>
					</div>
				</div>
			</div>
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
                    	
                        <div class="col-md-9"><!-- Left Part -->
                        	<div  class="col-md-12"><!-- Slider -->
                            	<div class="ft-item">
                                	<br>
                                    <div class="carousel">
                                        <ul class="slides">
											<?php $banner_images = $obj->getBannerImages();?>
											<? for($i=1;$i<=15;$i++) { ?>
											<? if($banner_images['img'.$i]!="") { ?>
                                            <li><img class="img-responsive" src="admin/images/banner/<?php echo $banner_images['img'.$i]?>" style="width:840px;height:320px" alt="See In India" /></li>
											<? } ?>
											<? } ?>
                                            <!--li><img class="img-responsive" src="img/list-view/list2.jpg" alt="See In India" /></li>
                                            <li><img class="img-responsive" src="img/list-view/list3.jpg" alt="See In India" /></li>
                                            <li><img class="img-responsive" src="img/list-view/list4.jpg" alt="See In India" /></li>
                                            <li><img class="img-responsive" src="img/list-view/list5.jpg" alt="See In India" /></li>
                                            <li><img class="img-responsive" src="img/list-view/list6.jpg" alt="See In India" /></li-->
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- Slider -->
                            
							<? while($home = mysql_fetch_array($search_tour)) { ?>
							
                        	<div class="col-md-4">
                               <a href="tour-info.php?id=<?php echo $home['id']?>"> <div class="ft-item">
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
											<? if($home['transfer']=="yes") { ?>
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
                                        <h4 class="ft-title text-upper"><a href="tour-info.php?id=<?php echo $home['id']?>"><?php echo substr($home['nameof_tour'],0,20); ?></a></h4>
                                        <span class="ft-offer text-upper">Prices Starting From Rs <?php echo $home['price']?> </span>
                                    </div>
                                    <div class="ft-foot-ex">
                                        <span class="ft-date text-upper alignleft">28 December 2013</span>
                                        <span class="ft-temp alignright">17&#730;c</span>
                                    </div>
                                </div></a>
                            </div>
                              <? } ?>  
                            
                        </div><!-- Left Part -->
                        
                        <aside id="sidebar" class="col-md-3"><!-- Right Part -->
                        	
                            <!-- START .tour-plan -->
                           <form action="search.php" method="post" name="search" onsubmit="return validate();">                       
                                <div class="top-fields">
                                    <div class="input-field col-md-12"><input type="text" placeholder="Where to go?"  name="where_to_go" <? if(isset($_POST['search_tours_submit']) or (isset($_POST['search_tours_submit_need']))) { ?> value="<? echo $_POST['where_to_go']?>" <? } ?>/></div>
                                    <!--<div class="input-field col-md-3"><input type="text" placeholder="2. What to do?" /></div>-->
                                    <div class="input-field col-md-12 schedule">
                                        <input type="text" class="date-picker"  <? if(isset($_POST['search_tours_submit'])  or (isset($_POST['search_tours_submit_need']))) { ?>  value="<? echo $_POST['from_date']?>" <? } ?> placeholder="From When?" data-date="11-12-2012" data-date-format="dd-mm-yyyy"  name="from_date"/>
                                        <i class="calendar-icon"></i>
                                        <input type="text" class="date-picker"  <? if(isset($_POST['search_tours_submit'])  or (isset($_POST['search_tours_submit_need']))) { ?>  value="<? echo $_POST['to_date']?>" <? } ?> placeholder="Till When?" data-date="12-12-2012" data-date-format="dd-mm-yyyy" name="to_date"/>
                                    </div>
                                </div>
                                <div class="bottom-fields">
                                    <div class="submit-btn col-md-6">
                                        <input type="submit" value="Search"  <?php if(isset($_POST['search_tours_submit'])) { ?> name="search_tours_submit"  <?php } else { ?> name="search_tours_submit_need" <?php } ?>/>
                                    </div>
                                </div>
                            </form>
                            <!-- END .tour-plan -->
                            
                        </aside><!-- Right Part -->
                        
						<div class="clearfix"></div>
					</div>
					<!-- START .pagination -->
					
					<!--ul class="pagination">
						<li><a href="#">&lsaquo;</a></li>
						<li class="active"><a href="search.php">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">&rsaquo;</a></li>
					</ul-->
					<? echo $pagination; ?>
					
					<!-- END .pagination -->
				</div>
			</div>
			<!-- END .main-contents -->
			
				<?php include 'header/bottom-footer.php';?>
		</div>
		<!-- END #wrapper -->
		
		<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->
        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script src="js/jquery.flexslider-min.js"></script>
        <script type="text/javascript">
			$(document).ready(function() {			
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

	</body>
</html>