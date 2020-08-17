<?php 
	session_start();
	include("include/functions.php");
    $obj = new functions();
	
	
/* 	ini_set("include_path", "."); 
	$mail->PluginDir = "/home/discover-hobby/www/phpmailer"; 
	require("class.phpmailer.php");  */
	
	$sleeptmp = 0; 
	
	$sid = $_SESSION['session_id'];
	
	$sql_booking = $obj->query("select * from checkout where id='$_GET[id]'");
	
	$booking = mysql_fetch_array($sql_booking);
	
	mysql_query("update checkout set cancelled='Yes' where id='$booking[id]'");
	
	$sql_tours = mysql_query("select * from tours where id='$booking[tour_id]'");
	$tours = mysql_fetch_array($sql_tours);
	
	$sql_wishlist = mysql_query("select * from wishlist where id='$booking[wishlist_id]'");
	$wishlist = mysql_fetch_array($sql_wishlist);
	
	$bookingdate = date('j-n-Y',strtotime($wishlist['date']));
	$explode = explode("-",$bookingdate);
	
	$sql_avail = mysql_query("select * from availability where d='$explode[0]' and m='$explode[1]' and y='$explode[2]' and tour_id='$booking[tour_id]'");
	$avail = mysql_fetch_array($sql_avail);
	$n_avail = $avail['adults_availability'] + $wishlist['adult'];
	$n_cavail = $avail['child_availability'] + $wishlist['child'];
	
	mysql_query("update availability set adults_availability='$n_avail', child_availability='$n_cavail' where id='$avail[id]'");
	
	$sql_supplier = mysql_query("select * from suppliersadmin where id='$tours[supplier_id]'");
	$supplier = mysql_fetch_array($sql_supplier);
	
	$sql_user = mysql_query("select * from users where id='$booking[userid]'");
	$users = mysql_fetch_array($sql_user);
	
	$booking_date = $wishlist['date'];
	$cancel_date = date('d-m-Y');
	
	$date_diff=strtotime($booking_date) - strtotime($cancel_date);
	
	$difference = ($date_diff/(60 * 60 * 24));
	// echo $difference;
	// exit;
	if($difference >= $tours['day1_from'] and $difference <= $tours['day1_to']) {
		$cancellation_diff = $tours['cancellation_day1'];
	}
	if($difference >= $tours['day2_from'] and $difference <= $tours['day2_to']) {
		$cancellation_diff = $tours['cancellation_day2'];
	}
	if($difference >= $tours['day3_from'] and $difference <= $tours['day3_to']) {
		$cancellation_diff = $tours['cancellation_day3'];
	}
	if($difference >= $tours['day4_from'] and $difference <= $tours['day4_to']) {
		$cancellation_diff = $tours['cancellation_day4'];
	}
	
	//	send Cancelled mail to user
	
	$mybody = 'Your booking for the tour'.$tours['nameof_tour'].'has been cancelled. The cancellation fee of '.$cancellation_diff.'% will be deducted.';
	$to =$users['email'];
	$email = "sameer.a@seeinindia.com";
	$msg = "";
	$msg1 = 'Website Enquiry';
	
	//Mail Body - Position, background, font color, font size...
	$body ='';
	//To send HTML mail, the Content-type header must be set:
	$headers='MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
	$headers .= 'From: See in India '.$email. "\r\n";
	$bodys .= "$mybody <br>";
	$subject = "See In India  - Cancel Booking"; 
	$body = $body . $bodys;
	mail($to, $subject, $body, $headers);
	
	
	//	send Cancelled mail
	
	
	//send email to supplier
	
	$mybody1 = 'Booking for the tour'.$tours['nameof_tour'].'has been cancelled by'.$users['firstname']. $users['lastname'].'. The cancellation fee of '.$cancellation_diff.'% will be charged for cancelling a booking tour.';
	$to1 =$tours['email'];
	$email1 = "sameer.a@seeinindia.com";
	$msg = "";
	$msg1 = 'Website Enquiry';
	
	//Mail Body - Position, background, font color, font size...
	$body ='';
	//To send HTML mail, the Content-type header must be set:
	$headers='MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
	$headers .= 'From: See in India '.$email1. "\r\n";
	$bodys .= "$mybody1 <br>";
	$subject = "See In India - Cancel Booking"; 
	$body = $body . $bodys;
	mail($to1, $subject, $body, $headers);
	
	
	//send email to supplier
	
	
	
	//send email to admin
	$mybody2 = 'Booking for the tour'.$tours['nameof_tour'].'has been cancelled by'.$users['firstname']. $users['lastname'].'. The cancellation fee of '.$cancellation_diff.'% will be charged for cancelling a booking tour.';
	$to1 ="info@seeindia.com";
	$email1 = "sameer.a@seeinindia.com";
	$msg = "";
	$msg1 = 'Website Enquiry';
	
	//Mail Body - Position, background, font color, font size...
	$body ='';
	//To send HTML mail, the Content-type header must be set:
	$headers='MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
	$headers .= 'From: See in India '.$email1. "\r\n";
	$bodys .= "$mybody2 <br>";
	$subject = "See In India - Cancel Booking"; 
	$body = $body . $bodys;
	mail($to1, $subject, $body, $headers);
	
	
	//send email to admin
	
	
	
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
									<li><a href="#">Cancelling a Tour</a></li>
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
						<h2>Booking Cancelled</h2>
						<div class="row">
							<div class="col-md-12">
								<div class="mid_container">
        
            <div><label for="telephone">Your booking for the tour has been successfully cancelled.</label></div>
        	
			<input type="hidden" id="total" name="total" value="<?php echo $g_total; ?>" />
        </div>
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