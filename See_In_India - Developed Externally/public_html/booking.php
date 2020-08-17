<?php 
	session_start();
	include("include/functions.php");
    $obj = new functions();
	
	
	$sql_user = mysql_query("select * from users where username='$_SESSION[username]' and (source='Website' or source='Facebook')");
		
		$user = @mysql_fetch_array($sql_user);
		$rows=@mysql_num_rows($sql_user);
		if($rows>0)
		{
		$sql_booking = mysql_query("select * from checkout where userid='$user[id]' and booking_id is not null");
		
	   }
	else
	{
		$sql_user1 = mysql_query("select * from traveldetails where username='$_SESSION[username]' and source='Travel'");
		
		$user1 = @mysql_fetch_array($sql_user1);
		
		$rows1=@mysql_num_rows($sql_user1);
		if($rows1>0)
		{
		$sql_booking = mysql_query("select * from checkout where travel_id='$user1[id]' and booking_id is not null");
		}
		
	
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
		
		
<!--script>
	function popup(day, month, year) {
		eval(
		"page" + day + " = window.open('indexa.php?tid=" + day + "&m=" + 
		month + "&y=" + year + "', 'postScreen', 'toolbar=0,scrollbars=1," +
		"location=0,statusbar=0,menubar=0,resizable=1,width=750,height=750');"
		);
	}
</script-->


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
		}
		
		else if(parseInt(Form.adult.value) > parseInt(Form.a_avail.value)) {
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
	function print_booking(booking_id) {
		//alert(booking_id);
		eval(
		"page" + booking_id + " = window.open('voucher.php?booking_id=" + booking_id + "', 'postScreen', 'toolbar=0,scrollbars=1," +
		"location=0,statusbar=0,menubar=0,resizable=1,width=950,height=550');"
		);
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
										<li><a href="index.php">One Day Tours</a></li>
										<!--<li><a href="#">Activities</a></li>-->
										<li><a href="need-more.php">Need More Than A day</a></li>
										<li><a href="#">Trekking</a></li>										
										<li><a href="#">Educational Tours</a></li>
										<li><a href="about.php">About Us</a></li>
                                        <li><a href="contact.php">24/7 Support</a></li>
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
								<h1 class="text-upper"><?php echo $tour_info['nameof_tour']?></h1>
							</section>
							
							<!-- breadcrumbs -->
						  <section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="index.php">Home</a></li>
									<li><a href="#">Booking</a></li>
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
                    		
                            <div class="shortcodes-columns">
						<h2>RETRIEVE BOOKING PROCESS</h2>
						<div class="row">
							<div class="col-md-12">
								<p>This is where your Bookings, Itineraries, and print of confirmation voucher with seeinindia.com 
                                resides from the booking date till 30 days post tour end date Do contact our Customer Care team with 
                                Booking-related question on 912225186779. </p>
							</div>
						</div>		
				
						
						<div class="col-md-12">
						<div class="row" style="background:#e8e8e8;">
							<div class="col-md-2">
								<h5>Name Of Traveler</h5>
								
							</div>
							<div class="col-md-2">
								<h5>No of Travelers</h5>
								
							</div>
							<div class="col-md-2">
								<h5>Name Of Tour</h5>
								
							</div>
							<div class="col-md-2">
								<h5>Amount Paid For Booking </h5>
								
							</div>
							<div class="col-md-2">
								<h5>Cancel Booking</h5>
								
							</div>
							<div class="col-md-2">
								<h5>Retrieve Booking</h5>
								
							</div>
							</div>
							
							<?php
					$grand = array();
					$passenger = array();
					while ($booking = @mysql_fetch_array($sql_booking)) {
						$sql_select = mysql_query("select * from tours where id='$booking[tour_id]'");
						$row = mysql_fetch_assoc($sql_select);
						
						$sql_wishlist = mysql_query("select * from wishlist where id='$booking[wishlist_id]'");
						$wishlist = mysql_fetch_array($sql_wishlist);
						
						$booking_date = $wishlist['date'];
						$cancel_date = date('d-m-Y');
						
						$date_diff=strtotime($booking_date) - strtotime($cancel_date);
						$difference = ($date_diff/(60 * 60 * 24));
				?>
				
							<?php if($difference >= 0) { ?>
							<div class="row" style="background:#e8e8e8;">
							<div class="col-md-2">
								<h5><?php echo $booking['firstname']; ?></h5>
								
							</div>
							<div class="col-md-2">
								<h5><?php echo $wishlist['adult'] + $wishlist['child']; ?></h5>
								
							</div>
							<div class="col-md-2">
								<h5><?php echo $row['nameof_tour']; ?></h5>
								
							</div>
							<div class="col-md-2">
								<h5><?php echo $booking['total_price']." Rs."; ?></h5>
								
							</div>
							<div class="col-md-2">
							<?php if($booking['cancelled'] == 'No') { ?>
								<h5><a href="cancellation-process.php?id=<?php echo $booking['id']; ?>"><img src="images/cancel_btn.png" oncontextmenu="return false;"/></a></h5>
							<?php } else { echo "Booking Cancelled"; } ?> 	
								
							</div>
							<div class="col-md-2">
								<?php if($booking['cancelled'] == 'No') { ?>
								<h5><span onclick="print_booking(<?php echo $booking['id'] ?>)">Print</span></h5>
								<?php } ?>
								
							</div>	
								
							</div>
							
							<?php  }  } ?>
						</div>
						</div>
					</div>
                        
                        
                        
                        
                        
                        
                        
                        <!-- Left Part -->
                        
                        <!-- Right Part -->
                        
						<div class="clearfix"></div>
                        
                        <!-- Discription Left -->
                        
                        <!-- Discription Right -->                 
                        
                        
                        
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