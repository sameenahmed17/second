<?php 
	session_start();
	include("include/functions.php");
    $obj = new functions();
	if(isset($_GET['id'])) {
		
		$checking_for_maintour = $obj->checkMaintour($_GET['id']);
		if($checking_for_maintour>0){ 
			echo "<script>window.location='search-main.php?id=$_GET[id]'</script>";
		} else {
			$tour_info = $obj->getTourInfo($_GET['id']);
		}
	}
	
	if(isset($_GET['day'])) {
		$day = $_GET['day'];
		$month = $_GET['month'];
		$year = $_GET['year'];
		
		$date = $day."-".$month."-".$year;
		$date = date('d-m-Y',strtotime($date));
		
		$sql_availability = $obj->query("select * from availability where d='$day' and m='$month' and y='$year' and tour_id='$_GET[id]'");
		$availability = $obj->fetch($sql_availability);	
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>India Tours & Things to Do in India</title>
		
		<!-- meta description -->
		<meta name="description" content="Tours, things to do, sightseeing tours, day trips and more from SeeinIndia. Find and book city tours, helicopter tours, day trips, show tickets, sightseeing day tours, popular activities and things to do in India" />
		
		<!-- meta keywords -->
		<meta name="keywords" content="Tours, things to do, sightseeing tours, day trips and more from SeeinIndia. Find and book city tours, helicopter tours, day trips, show tickets, sightseeing day tours, popular activities and things to do in India" />
		
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
		<link rel="stylesheet" href="css/colorbox.css" type="text/css">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script type="text/javascript" src="js/jquery.colorbox.js"></script>
		 <script>
		$(document).ready(function() {
			$('.moreinfo1').colorbox({iframe:true,width:'80%',height:'80%' ,onClosed:function(){ location.reload(true); }});
		});
	</script>
	
<link href="SpryAssetsn/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<script src="SpryAssetsn/SpryTabbedPanels.js" type="text/javascript"></script>	
	
<link rel="stylesheet" type="text/css" href="calendern/tcal.css" />
<script type="text/javascript" src="calendern/tcal.js"></script>

<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>
	<!--<script type="text/javascript" src="js/jquery.min.js"></script>-->
	<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript">
  	function submitform(Form) { 
	
		//alert("hi");
		var x=document.getElementById('adult').value;
		//var y=document.getElementById('adult').value;
		//alert(x);
		if(x=='None')
		{
			alert("Please select atleast no of Persons or Group");
			return false;
		}
		if(Form.adult.value=='None') {
			alert("Please select number of adults / child for the trip");
			return false;
		}else if(parseInt(Form.adult.value) > parseInt(Form.a_avail.value)) {
			alert("The number of adults you have selected is greater than current availability. Please select proper value using check availability tab");
			return false;
		}
		
		if(parseInt(Form.child.value) > parseInt(Form.c_avail.value)) {
			alert("The number of child you have selected is greater than current availability. Please select proper value using check availability tab");
			return false;
		}
	}
	
</script>
<script>
function searchvalue(x)
{ 	
	$("#test").show();
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
function gettext(x)
{
	y=$("#div"+x).text();
	$("#test").hide();
	$("#searchtext").val(y);
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
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56111840-1', 'auto');
  ga('send', 'pageview');

</script>
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
			<? $tour_slider = $obj->getTourSlider($_GET['id']); ?>
			<!-- START #page-header -->
			<div id="header-banner">
				<div class="banner-overlay">
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper"><?php echo $tour_info['nameof_tour']?></h1>
							</section>
							
							<!-- breadcrumbs -->
							<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="index.php">Home</a></li>
									<!--li><a href="#">Tour Details</a></li-->
									<li><a href="<?php echo $tour_slider['city'] ?>-city"><?php echo $tour_slider['city'] ?></a></li>
									<li><a href="#"><?php echo $tour_info['nameof_tour']?></a></li>
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
                                	<br/>
                                    <div class="carousel">
                                        <ul class="slides">
										<? //$slider = mysql_fetch_array($tour_slider); ?>
									     <? for($i=1;$i<=15;$i++) { ?>
											<? if($tour_slider['picturegallery'.$i]!="") { ?>
												<li><img class="img-responsive" src="admin/images/cityplace/<?php echo $tour_slider['picturegallery'.$i]?>" style="width:840px;height:320px" alt="See In India" /></li>
											<? } ?>
										 <? } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- Slider -->
                        </div><!-- Left Part -->
                        
                        <aside id="sidebar" class="col-md-3"><!-- Right Part -->
                        	
                            <!-- START .tour-plan -->
                            <form action="search.php" method="post" name="search" onsubmit="return validate();">                       
                                <div class="top-fields">
                                    <div class="input-field col-md-12"><input  id="searchtext" type="text" placeholder="Where to go?"  name="where_to_go" onkeyup="searchvalue(this.value);" <? if(isset($_GET['id'])) { ?> value="<?php echo $tour_info['nameof_tour']?>" <? } ?>/><div id="test"></div></div>
                                    <!--<div class="input-field col-md-3"><input type="text" placeholder="2. What to do?" /></div>-->
                                    <div class="input-field col-md-12 schedule">
                                        <input type="text" class="date-picker"  <? if(isset($_GET['id'])) { ?>  value="<?php echo $tour_info['from_date']?>" <? } ?> placeholder="From When?" data-date="11-12-2012" data-date-format="dd-mm-yyyy"  name="from_date"/>
                                        <i class="calendar-icon"></i>
                                        <input type="text" class="date-picker"  <? if(isset($_GET['id'])) { ?>  value="<?php echo $tour_info['to_date']?>" <? } ?> placeholder="Till When?" data-date="12-12-2012" data-date-format="dd-mm-yyyy" name="to_date"/>
                                    </div>
                                </div>
                                <div class="bottom-fields">
                                    <div class="submit-btn col-md-6">
                                        <input type="submit" value="Search"  name="search_tours_submit" />
                                    </div>
                                </div>
                            </form>
                            <!-- END .tour-plan -->
								<? if(!isset($_GET['day'])) { ?>
									<div class="submit-btn col-md-12">
										<a href="indexa.php?tid=<?php echo $_GET['id']; ?>" class="moreinfo1"><input type="submit" value="Check Availability"  name="search_tours_submit" /></a>
                                    </div> 
								<? } ?>
							
								<? if(isset($_GET['month'])) { ?>
									<form id="form2" name="form2" method="post" action="my-cart.php">
										<div class="submit-btn col-md-6">
											<b>Selected Date:</b>
										</div>
										<div class="submit-btn col-md-6">
											<input type="hidden" name="tid" id="tid" value="<?php echo $_GET['id']; ?>" />
											<input type="hidden" name="a_avail" value="<?php echo $availability['adults_availability'] ?>">		
											<input type="text"  readonly  name="date" value="<? echo $date; ?>" />
										</div> 
									
									
						<div class="submit-btn col-md-12">
									
                       <a href="indexa.php?tid=<?php echo $_GET['id']; ?>" class="moreinfo1"><input type="submit" value="Change Date"  name="search_tours_submit" /></a>
                                    </div> 
									
						<div class="submit-btn col-md-18">
						<div class="submit-btn col-md-6 styled-select">
						<?
										if($tour_info['tour_type']=='Per Vehicle') {
											echo 'Vehicle';
										}
										if($tour_info['tour_type']=='Per Person') {
											echo 'Adult';
										}
										if($tour_info['tour_type']=='Per Group') {
											echo 'Group';
										}
						?>
						 <?php if(!empty($adult_age['from_age'])) { ?> (
                                  <?php echo(($adult_age['is_height']=='Yes') ? 'Height' : 'Age') ?> <?php echo $adult_age['from_age'] ?> - <?php echo $adult_age['to_age'] ?>) <?php } ?>
						</br>
							<select name="adult" id="adult">
							<option value="None" style="background:#666;" >Select</option>
							<? for($i=1; $i<=$availability['adults_availability']; $i++) { ?>
							 <option value="<?php echo $i ?>"><?php echo $i ?></option>
							<? } ?> 
							</select>
						</div>
						
						
						<div class="submit-btn col-md-6 styled-select">
							 <?php if($tour_info['tour_type']!='Per Vehicle' and $tour_info['tour_type']!='Per Group') { ?>
							 	<input type="hidden" name="c_avail" value="<?php echo (empty($availability['child_availability'])?'0':$availability['child_availability']) ?>">
							&nbsp;Child<?php if(!empty($child_age['from_age'])) { ?>(<?php echo(($child_age['is_height']=='Yes') ? 'Height' : 'Age') ?> <?php echo $child_age['from_age'] ?> - <?php echo $child_age['to_age'] ?>)<?php } ?>
							<select name="child">
								<option value="0" selected="selected">Select</option>
								<?php  for($j=1; $j<=$availability['child_availability']; $j++){ ?>
									<option value="<?php echo $j ?>"><?php echo $j ?></option>
								<?php } ?>
							</select>
							<? } ?>
						</div>
						
						<div class="submit-btn col-md-12">
							<?php echo $tour_info['tour_criteria']; ?>
						</div>
						
						<div class="submit-btn col-md-6">
							<input type="hidden" name="price" id="price" value="<?php echo $tour_info['price'] ?>" />
							<input type="submit" value="Book Now"  name="Book"  onclick="return submitform(document.form1)"/>
						</div>
						
						</div>	
						</form>
									<? } ?>
									
									
                        </aside><!-- Right Part -->
                        
						<div class="clearfix"></div>
                        
                        <div class="col-md-6"><!-- Discription Left -->
                        	<div class="col-md-12 ft-item">
                            	<div class="post-desc">
                                    <h4>DESCRIPTION</h4>
                                    <p><?php echo $tour_info['longdescription']?></p>
                                </div>
                            </div>
                            <div class="col-md-12 ft-item">
                            	<div class="post-desc">
                                    <h4>TOUR TIMING AND SHARING/OCCUPANCY BASIS</h4>
                                    <p>Duration: <? echo $tour_info['duration']; ?></p>
									 <p>Tour Criteria: <? echo $tour_info['tour_criteria']; ?></p>
									 <p>Departure Time:  <? echo "From ".$tour_info['timehh'].":".$tour_info['timemm']." To ".$tour_info['tohh'].":".$tour_info['tomm']."<br/>";  ?></p>
                                </div>
                            </div>
							<?php if($tour_info['itinerary']!="") { ?>
							<div class="col-md-12 ft-item">
                            	<div class="post-desc">
                                    <h4>ITINERARY</h4>
									<?php $explode = explode("@!",$tour_info['itinerary']);?>
									<?php $count = count($explode); ?>
									<?php for($i=0;$i<$count;$i++) { ?>
                                    <p>Day <?php echo $j=$i+1; ?>: <? echo $explode[$i]; ?></p>
									<?php } ?>
									
                                </div>
                            </div>
							<?php } ?>
                            <div class="col-md-12 ft-item">
                            	<div class="post-desc">
                                    <h4>IMPORTANT NOTE</h4>
                                    <p><?php echo $tour_info['importantnote']?></p>
									
                                </div>
                            </div>
							
							<?php if($tour_info['hotel']!="") { ?>
							
							 <div class="col-md-12 ft-item">
                            	<div class="post-desc">
                                    <h4>MORE INFORMATION</h4>
                                    <p>Used Hotels: <? echo $tour_info['hotel']?></p>
                                   
                                </div>
                            </div>
							<?php } ?>
                        </div><!-- Discription Left -->
                        
                        <div class="col-md-6"><!-- Discription Right -->
                        	<div class="col-md-12 ft-item">
                            	<div class="post-desc">
                                    <h4>TOUR INCLUDES</h4>
                                    <p><?php echo $tour_info['inclusions']?></p>
									<h5>OTHER PERSONALIZED REQUESTS</h5>
									<p><?php echo $tour_info['exclusions']?></p>
                                </div>
                            </div>
                            <div class="col-md-12 ft-item">
                            	<div class="post-desc">
									<h4>TOUR EXCLUDES AND VOUCHER INFORMATION</h4>
                                    <p><?php echo $tour_info['redemption']?></p>
                                </div>
                            </div>
                            <div class="col-md-12 ft-item">
                            	<div class="post-desc">
									<h4>CANCELLATION POLICY</h4>
									<p><?php echo $tour_info['cancellationpolicy']?></p>
								</div>
                            </div>
                        </div><!-- Discription Right -->                 
                        
                        <div class="col-md-12 ft-item">
						<? $related_tours = $obj->getRelatedTours($_GET['id']); ?>
							<?if($related_tours['select_tours']!="") { ?>
							<? $no_of_selected_tours = explode(",",$related_tours['select_tours']); ?>
							<? $count = count($no_of_selected_tours);?>
							
                        	<h2 class="ft-heading text-upper">Related Tours</h2>
							
							<? for($i=0;$i<$count;$i++) { 
								$home = $obj->getRelatedTours($no_of_selected_tours[$i]);
								$tour = str_replace(' ', '-',$home['nameof_tour']); 
								$lower_tour= strtolower( $tour);
								$seo_url_tour_info=$obj->getStaticUrl($home['id'],$lower_tour);
								?>
                        	<div class="col-md-3">
							<a href="<?php echo $seo_url_tour_info; ?>">
                                <div class="ft-item">
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
                                        <span class="ft-offer text-upper">Prices Starting From Rs <?php echo $home['price']?></span>
                                    </div>
                                    <div class="ft-foot-ex">
                                        <span class="ft-date text-upper alignleft">28 December 2013</span>
                                        <span class="ft-temp alignright">17&#730;c</span>
                                    </div>
                                </div>
                                </a>
                              </div>
							  
							 <? } ?> 
                           
                          <? } ?> 
                          
                        </div>
                        
					</div>					
				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START footer -->
				<?php include 'header/bottom-footer.php';?>
			<!-- END footer -->
		</div>
		<!-- END #wrapper -->
		
		<!-- javascripts -->
		
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