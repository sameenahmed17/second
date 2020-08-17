<?php 
	session_start();
	include("include/functions.php");
    $obj = new functions();
	
	if(isset($_POST['submit'])) { 
	
	 $obj->carEnquiry($_POST);
	
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
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<script>
$(function() {
$( "#datepicker" ).datepicker();
});

$(function() {
$( "#datepicker1" ).datepicker();
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
		
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
  
  
    <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#enquiry-form").validate({
    
        // Specify the validation rules
        rules: {
            name: "required",
            lastname: "required",
            contact: "required",
            datepicker: "required",
            datepicker1: "required",
            no_of_pax: "required",
            vehicle_type: "required",
            arrival_city: "required",
            departure_city: "required",
            Itinerary: "required",
            email: {
                required: true,
                email: true
            },
            
            agree: "required"
        },
        
        // Specify the validation error messages
        messages: {
            name: "Please enter your first name",
            lastname: "Please enter your last name",
            contact: "Please enter your contact",
            datepicker: "Please select date",
            datepicker1: "Please select date",
            no_of_pax: "Please enter pax",
            vehicle_type: "Please select vehicle type",
            arrival_city: "Please enter city",
            departure_city: "Please enter city",
            Itinerary: "Please enter Itinerary",
           
            email: "Please enter a valid email address",
            agree: "Please accept our policy"
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
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
								<h1 class="text-upper"><?php echo $tour_info['nameof_tour']?></h1>
							</section>
							
							<!-- breadcrumbs -->
						  <section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="index.php">Home</a></li>
									<li><a href="#">car Enquiry</a></li>
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
                	
					<div class="shortcodes-columns">
						<h3>Find Amazing rates for Chauffer Driven Car Rental in India, with us you are assured of Clean vehicle, On Time Services, Courteous Driver and Transparent Billing.</h3>
						<h4>Chauffer Driven Car Rental
Enquiry Form
</h4>
						<div class="row">
							<div class="col-md-12">
							
                    <form id="enquiry-form" enctype="multipart/form-data" method="post"  name="enquiry-form">
  <table width="624" border="0" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" style="text-align:left;">
    
    <tr valign="top">
      <td width="175" align="left" >
       Name <span style="color:red;"><small>*</small></span>      </td>
      <td width="441" style="">
        <input id="name" name="name" value="" size="50"  type="text" />
        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
	<tr valign="top">
      <td width="175" align="left" >
       Email id <span style="color:red;"><small>*</small></span>      </td>
      <td width="441" style="">
        <input id="email" name="email" value="" size="50"  type="text" />
        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
  
	<tr valign="top">
      <td width="175" align="left" >
      Contact no<span style="color:red;"><small>*</small></span>      </td>
      <td width="441" style="">
        <input id="contact" name="contact" value="" size="50"  type="text" />
        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
    <tr valign="top">
      <td align="left" >
       Date of Travel<span style="color:red;"><small>*</small></span>      </td>
      <td style="">
        <input type="text" id="datepicker" name="datepicker">
       
        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
     <tr valign="top">
      <td align="left" >
   Date of Return<span style="color:red;"><small>*</small></span>      </td>
      <td style="">
        <input type="text" id="datepicker1" name="datepicker1">
       
        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
    
    
    
    <tr valign="top">
      <td align="left">
        No of Pax <span style="color:red;"><small>*</small></span>      </td>
      <td style="">
        <input type="text" id="no_of_pax" name="no_of_pax" cols="38" rows="8" >

        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
     <tr valign="top">
      <td align="left" >
        Vehicle Type:<span style="color:red;"><small>*</small></span>      </td>
      <td >
	   <select name="vehicle_type" >
							<option value="" selected="selected"> </option>
                            <option value="MERCEDES BENZ S-500">INDICA</option>
                            <option value="MERCEDES BENZ S-500">INNOVA</option>
                            <option value="MERCEDES BENZ S-500">MERCEDES BENZ S-500</option>
                            <option value="AUDI A8 L">AUDI A8 L</option>
							<option value="MERCEDES BENZ S-350">MERCEDES BENZ S-350</option>
                            <option value="MERCEDES BENZ E-350">MERCEDES BENZ E-350</option>
							<option value="AUDI A-6">AUDI A-6</option>
							<option value="HONDA ACCORD">HONDA ACCORD</option>
							<option value="TOYOTA CAMRY">TOYOTA CAMRY</option>
							<option value="NISSAN SUNNY">NISSAN SUNNY</option>
							<option value="TOYOTA COROLLA">TOYOTA COROLLA</option>
							<option value="HONDA CITY">HONDA CITY</option>
							<option value="TOYOTA ETIOS">TOYOTA ETIOS</option>
							<option value="AMBASSADOR">AMBASSADOR</option>
							<option value="SWIFT DZIRE">SWIFT DZIRE</option>
							<option value="TOYOTA LANDCRUISER PRADO">TOYOTA LANDCRUISER PRADO</option>
							<option value="TOYOTA FORTUNNER">TOYOTA FORTUNNER</option>
							<option value="TOYOTA INNOVA">TOYOTA INNOVA</option>
							<option value="VOLKSWAGEN MULTIVAN ">VOLKSWAGEN MULTIVAN </option>
							<option value="TEMPO TRAVELLER ">TEMPO TRAVELLER </option>
							<option value="LUXURY TEMPO TRAVELLER">LUXURY TEMPO TRAVELLER </option>
							<option value="VOLKSWAGEN CRAFTER">VOLKSWAGEN CRAFTER </option>
							<option value="TOYOTA COASTER">TOYOTA COASTER </option>
							<option value="18 SEATER MINI COACH ">18 SEATER MINI COACH </option>
							<option value="27 SEATER ">27 SEATER </option>
							<option value="35 SEATER ">35 SEATER </option>
							<option value="38 SEATER VOLVO ">38 SEATER VOLVO</option>
							<option value="42 SEATER VOLVO COACH ">42 SEATER VOLVO COACH </option>
							<option value="47 SEATER ">47 SEATER </option>
							
							
                        </select>
        

              </td>
    </tr>
	<tr valign="top">
      <td align="left" >
       Arrival City<span style="color:red;"><small>*</small></span>      </td>
      <td style="">
        <input type="text" id="arrival_city" name="arrival_city" cols="38" rows="8" >

        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
	<tr valign="top">
      <td align="left" >
        Departure city:<span style="color:red;"><small>*</small></span>      </td>
      <td style="">
        <input type="text" id="departure_city" name="departure_city" cols="38" rows="8" >

        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
	<tr valign="top">
      <td align="left" >
        Itinerary:<span style="color:red;"><small>*</small></span>      </td>
      <td style="">
        <textarea id="Itinerary" name="Itinerary" cols="38" rows="8" >
</textarea>
        <div style="padding-bottom:8px;color:#000000;"></div>      </td>
    </tr>
	
	
	
   
    
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="submit" id="submit" value="Submit " />   </td>
    </tr>
  </table>
</form>
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