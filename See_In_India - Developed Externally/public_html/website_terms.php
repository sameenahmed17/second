<?php 
	session_start();
	include("include/functions.php");
    $obj = new functions();
	
	
	
	
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
										
										<li><a href="car_rental.php">car rental india</a></li>
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
									<li><a href="#">About Us</a></li>
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
                	
					<div class="shortcodes-columns" style="text-align:justify">
						<h2>Website Terms of Use</h2>
                        
                        Seeinindia, Inc. ("Seeinindia," "we," "us," "our") provides its services (described below) to you

through its website located at www.Seeinindia.com (the "Site") and through its mobile applications 

and related services (collectively, such services, including any new features and applications, and the 

Site, the "Service(s)"), subject to the following Terms of Service (as amended from time to time, the 

"Terms of Service"). We reserve the right, at our sole discretion, to change or modify portions of these 

Terms of Service at any time. If we do this, we will post the changes on this page and will indicate at 

the top of this page the date these terms were last revised. We will also notify you, either through 

the Services user interface, in an email notification or through other reasonable means. Any such 

changes will become effective no earlier than fourteen (14) days after they are posted, except that 

changes addressing new functions of the Services or changes made for legal reasons will be effective 

immediately. Your continued use of the Service after the date any such changes become effective 

constitutes your acceptance of the new Terms of Service.<br>
In addition, when using certain services, you will be subject to any additional terms applicable to such 

services that may be posted on the Service from time to time, including, without limitation, the Privacy 

Policy located at http://Seeinindia.com/policy. All such terms are hereby incorporated by reference into 

these Terms of Service.<br><br>
<h3>Access and Use of the Service</h3>
<strong>Services Description:</strong><br>
The Service an online platform that connects locals who have unique knowledge of and experience 

with a particular travel destination or activity ("Providers") with travelers seeking to receive services

related to such destinations and activities ("Travelers"). Some Providers ("Guides") lead experiences on 

the ground, and other Providers ("Insiders") help with travel planning. Through the Services, Providers 

may create and post profiles ("Profiles") that provide information about the Provider's knowledge and 

experience, and may make themselves available to offer certain services to Travelers at a particular 

destination (each such service, an "Experience"). Travelers may select Providers (or may request that 

Seeinindia attempt to connect them to a Provider) to provide the Traveler with an Experience.<br>
<br>
<strong>Platform Nature of the Services:</strong><br>
Seeinindia makes available a platform for Travelers and Providers to meet online and arrange for

Experiences. Seeinindia is not an operator of tours, activities or Experiences, nor is it a provider of tours 

or activities, and Seeinindia does not own, sell, resell, furnish, provide, manage and/or control any 

transportation or tour services. Seeinindia's responsibilities are limited to: (i) facilitating the availability 

of the Services; (ii) serving as the limited agent of each Provider for the purpose of accepting payments 

from Travelers on behalf of the Provider; and (iii) in certain instances, booking lodging accommodations 

on behalf of Travelers as detailed below. <br>
YOU UNDERSTAND AND AGREE THAT SEEININDIA IS NOT A PARTY TO ANY AGREEMENTS ENTERED 

INTO BETWEEN PROVIDERS AND TRAVELERS, NOR IS SEEININDIA AN AGENT OR INSURER. THE SERVICES 

ARE INTENDED TO BE USED TO FACILITATE THE CONNECTIONS BETWEEN PROVIDERS AND TRAVELERS. 

SEEININDIA CANNOT AND DOES NOT CONTROL THE CONTENT CONTAINED IN ANY PROFILES AND THE 

CONDITION, LEGALITY OR SUITABILITY OF ANY EXPERIENCES. SEEININDIA HAS NO CONTROL OVER THE 

CONDUCT OF PROVIDERS, TRAVELERS AND OTHER USERS OF THE SERVICES OR ANY EXPERIENCES, 

AND DISCLAIMS ALL LIABILITY IN THIS REGARD. ACCORDINGLY, THE PLANNING OR PARTAKING OF ANY 

EXPERIENCESARE AT THE PROVIDER'S AND/OR TRAVELER'S OWN RISK.<br>
<br>
<strong>Your Registration Obligations:</strong>
<br>
You may be required to register with Seeinindia in order to access and use certain features of the

Service. If you choose to register for the Service, you agree to provide and maintain true, accurate, 

current and complete information about yourself as prompted by the Service's registration form. 

Registration data and certain other information about you are governed by our Privacy Policy. If you 

are under 13 years of age, you are not authorized to use the Service, with or without registering. In 

addition, if you are under 18 years old, you may use the Service, with or without registering, only with 

the approval of your parent or guardian.<br>
<br>
<strong>Member Account, Password and Security:</strong><br>
You are responsible for maintaining the confidentiality of your password and account, if any, and are 

fully responsible for any and all activities that occur under your password or account. You agree to (a) 

immediately notify Seeinindia of any unauthorized use of your password or account or any other breach 

of security, and (b) ensure that you exit from your account at the end of each session when accessing 

the Service. Seeinindia will not be liable for any loss or damage arising from your failure to comply with 

this Section.<br>
<br>
<strong>Modifications to Service:</strong><br>
Seeinindia reserves the right to modify or discontinue, temporarily or permanently, the Service (or any 

part thereof) with or without notice. You agree that Seeinindia will not be liable to you or to any third 

party for any modification, suspension or discontinuance of the Service.<br>
<br>
<strong>General Practices Regarding Use and Storage:</strong><br>
You acknowledge that Seeinindia may establish general practices and limits concerning use of the 

Service, including without limitation the maximum period of time that data or other content will be 

retained by the Service and the maximum storage space that will be allotted on Seeinindia's servers on 

your behalf. You agree that Seeinindia has no responsibility or liability for the deletion or failure to store 

any data or other content maintained or uploaded by the Service. You acknowledge that Seeinindia 

reserves the right to terminate accounts that are inactive for an extended period of time. You further 

acknowledge that Seeinindia reserves the right to change these general practices and limits at any time, 

in its sole discretion, with or without notice.<br>
<br>
<strong>Mobile Services:</strong><br>
The Service may includes certain services that are available via a mobile device, including (i) the ability 

to upload content to the Service via a mobile device, (ii) the ability to browse the Service and the Site 

from a mobile device and (iii) the ability to access certain features through an application downloaded 

and installed on a mobile device (collectively, the "Mobile Services"). To the extent you access the 

Service through a mobile device, your wireless service carrier's standard charges, data rates and other 

fees may apply. In addition, downloading, installing, or using certain Mobile Services may be prohibited 

or restricted by your carrier, and not all Mobile Services may work with all carriers or devices. By using 

the Mobile Services, you agree that we may communicate with you regarding Seeinindia and other 

entities by SMS, MMS, text message or other electronic means to your mobile device and that certain 

information about your usage of the Mobile Services may be communicated to us. In the event you 

change or deactivate your mobile telephone number, you agree to promptly update your Seeinindia 

account information to ensure that your messages are not sent to the person that acquires your old 

number.<br>
<br>
<strong>Provider Obligations:</strong><br>
As a Provider, you may create Profiles that showcase your experience, activities you can lead, and the 

type of Experiences you can help Travelers plan. You acknowledge and agree that you are responsible 

for your Profiles and your own acts and omissions and are also responsible for the acts and omissions 

of any individuals who are present during the Experience at your request or invitation, excluding the 

Traveler (and the individuals the Traveler invites to the Experience, if applicable). You agree to comply 

with the Seeinindia Provider Guidelines available at = link_to <a href="#">"www.community.Seeinindia.com"</a><br>
You understand and agree that Seeinindia does not act as an insurer or as a contracting agent for you

as a Provider. If a Traveler requests your expertise for a Experience and participates in your Experience, 

any agreement you enter into with such Traveler is between you and the Traveler and Seeinindia is not a 

party thereto. Notwithstanding the foregoing, Seeinindia serves as your limited authorized agent:<br>
for the purpose of accepting payments from Travelers on your behalf, and is responsible for 

transmitting such payments to you, subject to these Terms of Service, and for the purpose of booking 

online lodging and accommodations ("Seeinindia Bookings")<br>
You are responsible for all other bookings, including without limitation on-the-ground arrangements, 

tours or experiences you host, restaurants and similar bookings.<br>
You represent and warrant that your Profile and your planning of and/or guidance on any Experience:<br>
will not breach any agreements you have entered into with any third parties (such as any agreements 

with or rules of employers or local tourism agencies)<br>
will (a) be in compliance with all applicable laws, tax requirements, and rules and regulations that may 

apply to any such Experience, including, but not limited to, tourism, tour guide licensing laws, and other 

laws governing events and tours of public spaces and other venues and (b) not conflict with the rights of 

third parties.<br>
Please note that Seeinindia assumes no responsibility for any Provider's or Traveler's compliance with 

any applicable laws, rules and regulations. Seeinindia reserves the right, at any time and without prior 

notice, to remove or disable access to any Profile for any reason, including Profiles that Seeinindia, in its 

sole discretion, considers to be objectionable for any reason, in violation of these Terms or otherwise 

harmful to the Services.<br>
Seeinindia recommends that Providers and Travelers obtain appropriate insurance for their Experiences.

Please review any insurance policy that you may have for your Experience carefully, and in particular 

please make sure that you are familiar with and understand any exclusions to, and any deductibles that 

may apply for, such insurance policy, including, but not limited to, whether or not your insurance policy 

will cover the actions or inactions of Travelers (and the individuals the Traveler invites to the Experience, 

if applicable) while participating in your Experience.<br>
<br>
<strong>No Endorsement:</strong><br>
Seeinindia does not endorse any Experiences. In addition, although these Terms require users to 

provide accurate information, we do not attempt to confirm, and do not confirm, any user's purported 

identity. You are responsible for determining the identity and suitability of others who you contact via 

the Services. We will not be responsible for any damage or harm resulting from your interactions with 

other users. By using the Services, you agree that any legal remedy or liability that you seek to obtain for 

actions or omissions of other users or other third parties will be limited to a claim against the particular 

user or other third parties who caused you harm and you agree not to attempt to impose liability on, 

or seek any legal remedy from Seeinindia with respect to such actions or omissions. Accordingly, we 

encourage you to communicate directly with other users via the Services regarding any bookings or Trips 

made by you. This limitation shall not apply to any claim by a Provider against Seeinindia regarding (i) 

the remittance of payments received from a Traveler by Seeinindia on behalf of a Provider or (ii) the 

failure of Seeinindia to book a Seeinindia Booking for which the Traveler provided accurate booking 

information, which instead shall be subject to the limitations described in the section below entitled<br>
<br>
<i>"Limitation of Liability".</i><br>
<h3>Conditions of Use</strong></h3><br>

<strong>Bookings and Financial Terms for Providers:</strong><br>
	1. GUIDES (Providers who lead activities). Except in the case of a Pre-Approved Event (as defined below), 

if you are a Guide and a booking is requested for your Experience via the Services, you will be required 

to either confirm or reject the booking within the specified timeframe (which is generally within 24-

48 hours of when the booking is requested, as determined by Seeinindia in its sole discretion) or the 

booking request will be automatically cancelled. If you are unable to confirm or decide to reject a 

booking of an Experience within the specified timeframe, any amounts collected by Seeinindia for the 

requested booking will be refunded to the applicable Traveler's credit card and any pre-authorization of 

such credit card will be released. You may be able to create a Listing that is pre-scheduled for a specific 

time and date, where the Traveler's booking may be automatically confirmed (a "Pre-Approved Event"). 

When a booking is requested via the Services, we may share with you the first and last name of the 

Traveler who has requested the booking and a link to the Traveler's Seeinindia Account profile page.<br>
The fees displayed in each Listing are comprised of the Experience Fees (defined below) and the Traveler 

Fees (defined below). Where applicable, Taxes may be charged in addition to the Experience Fees and 

Traveler Fees. The Experience Fees, the Traveler Fees and applicable Taxes are collectively referred 

to in these Terms as the "Total Fees". The amounts due and payable by a Traveler solely relating to a 

Guide's Experience are the "Experience Fees". Please note that it is the Guide and not Seeinindia which 

determines the Experience Fees. The Traveler Fees are added to the Experience Fees to calculate the 

Total Fees (which will also include applicable Taxes) displayed in the applicable Listing. Seeinindia will 

collect the Total Fees at the time of booking confirmation (i.e. when the Guide confirms the booking 

within the specified timeframe) and will initiate payment of the Experience Fees (less Seeinindia's 

Guide Fees (defined below)) to the Guide within 24 hours of when the Traveler arrives at the applicable 

Experience (except to the extent that a refund is due to the Traveler). However, please note that we will 

not be responsible for delays in remitting Experience Fees, which can vary based on the bank, currency, 

location, etc.<br>
The fees displayed in each Listing are comprised of the Experience Fees (defined below) and the Traveler 

Fees (defined below). Where applicable, Taxes may be charged in addition to the Experience Fees and 

Traveler Fees. The Experience Fees, the Traveler Fees and applicable Taxes are collectively referred 

to in these Terms as the "Total Fees". The amounts due and payable by a Traveler solely relating to a 

Guide's Experience are the "Experience Fees". Please note that it is the Guide and not Seeinindia which 

determines the Experience Fees. The Traveler Fees are added to the Experience Fees to calculate the 

Total Fees (which will also include applicable Taxes) displayed in the applicable Listing. Seeinindia will 

collect the Total Fees at the time of booking confirmation (i.e. when the Guide confirms the booking 

within the specified timeframe) and will initiate payment of the Experience Fees (less Seeinindia's 

Guide Fees (defined below)) to the Guide within 24 hours of when the Traveler arrives at the applicable 

Experience (except to the extent that a refund is due to the Traveler). However, please note that we will 

not be responsible for delays in remitting Experience Fees, which can vary based on the bank, currency, 

location, etc.<br>
In the event that actual prices for bookings have increased since the quoted price, Providers must 

contact the Traveler informing them of the price increase and requesting their permission to add the 

additional cost to the total fees charged to the Traveler.<br>
Each Provider hereby appoints Seeinindia as the Provider's limited agent solely for the purpose of 

collecting payments made by Travelers on behalf of the Provider. Each Provider agrees that payment 

made by a Traveler to Seeinindia shall be considered the same as a payment made directly to the 

Provider and the Provider will make the Experience available to Traveler in the agreed upon manner as if 

the Provider has received the payment. In accepting appointment as the limited authorized agent of the 

Provider, Seeinindia assumes no liability for any acts or omissions of the Provider.<br>
Each Provider hereby appoints Seeinindia as the Provider's limited agent solely for the purpose of 

collecting payments made by Travelers on behalf of the Provider. Each Provider agrees that payment 

made by a Traveler to Seeinindia shall be considered the same as a payment made directly to the 

Provider and the Provider will make the Experience available to Traveler in the agreed upon manner as if 

the Provider has received the payment. In accepting appointment as the limited authorized agent of the 

Provider, Seeinindia assumes no liability for any acts or omissions of the Provider.
<br>
<br>
<strong>Bookings and Fees for Travelers:</strong><br>
Travelers that wish to request the assistance of a Provider via the Services should provide the necessary 

information to Seeinindia regarding the Traveler's desired experiences, preferences and budget. 

Seeinindia will endeavor to match the Traveler with a Provider with experience in the Traveler's desired 

areas, and will connect the Traveler with a Provider in the event Seeinindia finds a match.<br>
For trips, Seeinindia is responsible for booking hotels and other lodging and accommodations that 

may be booked online ("Seeinindia Bookings"); the Provider is responsible for all other bookings 

("Provider Bookings"). As part of the Booking, Travelers may be required to enter into an agreement 

(including releases) with the Provider, and the Traveler agrees to accept any terms, conditions, rules 

and restrictions associated with the Itinerary imposed by the Provider. Traveler acknowledges and 

agrees that Seeinindia is not a party to any agreement between the Traveler and Provider, and that, 

with the exception of its payment obligations and obligations related to Seeinindia Bookings hereunder, 

Seeinindia disclaims all liability arising from or related to any such agreements. Traveler acknowledges 

and agrees that, notwithstanding the fact that Seeinindia is not a party to any agreements between 

Traveler and the Provider, Seeinindia acts as the Provider's payment agent for the limited purpose of 

accepting payments from Traveler on behalf of the Provider. Upon Traveler's payment of amounts 

to Seeinindia which are due to the Provider, Traveler's payment obligation to the Provider for such 

amounts is extinguished, and Seeinindia is responsible for remitting such amounts, less Seeinindia's fees 

and commissions, to the Provider. In the event that Seeinindia does not remit any such amounts to a 

Provider, such Provider will have recourse only against Seeinindia.<br>
	Please note that the actual amount charged by third parties for various items in the Itinerary may differ 

from the price quoted in the Booking, as prices may fluctuate before each booking is confirmed. If the 

actual prices are higher than the Total Fees, the Provider will contact you to request your permission 

prior to booking.<br>
<br>
<strong>Cancellations and Refunds:</strong><br>
1. GUIDES (Providers who lead activities). These terms and conditions govern the Seeinindia Traveler 

Refund Policy (the "Traveler Refund Policy") available to Travelers who book and pay for an Experience 

listed by a Guide through the Seeinindia platform (the "Site") and suffer a Travel Issue and the 

obligations of the Guide associated with the Traveler Refund Policy.<br>

Travel Issue.<br>
<strong>A "Travel Issue" means any one of the following:</strong><br>
The Guide of the Experience (i) cancels a reservation within 24 hours before the scheduled start of the 

reservation, (ii) fails to arrive for the Experience within 20 minutes of the scheduled start time, or (iii) 

fails to provide the Traveler with the reasonable ability to access the Experience (e.g., by allowing the 

Traveler access to the space in which the Experience will happen or begin if applicable).<br>
The description of the Experience in the listing on the Site is materially inaccurate with respect to (i) 

the duration of the Experience, (ii) the content of the Experience (including but not limited to the stated 

activities or sites, as applicable), or (iii) the physical location of the Experience. c) During the Traveler's 

Experience, conditions do not meet safety or health hazards that would be reasonably expected, given 

the nature of the particular Experience, in Seeinindia's judgment.<br>
<br>
<strong>The Traveler Refund Policy.</strong><br>
If you are a Traveler and suffer a Travel Issue, we agree, at our discretion, to either (i) reimburse you up 

to the amount paid by you through the Site, as determined by Seeinindia in our discretion, depending 

on the nature of the Travel Issue suffered or (ii) use our reasonable efforts to find and book you another 

Experience which in our determination is reasonably comparable to the Experience described in your 

original reservation in terms of content and quality. For clarity, in the event the alternative Experience 

is of a higher price than the former, you may be responsible for any difference in price. In the event the 

alternative Experience is of a lower price, you may be entitled to a partial refund for the difference. All 

determinations of Seeinindia with respect to the Traveler Refund Policy, including without limitation the 

size of any refund, shall be final and binding on the Travelers and Guides.<br>
<br>
<strong>Conditions to Claim a Travel Issue.</strong>
<br>
Only a Traveler may submit a claim for a Travel Issue. If you are a Traveler, in order to submit a valid 

claim for a Travel Issue and receive the benefits with respect to your reservation, you are required to 

meet each of the following conditions:<br>
You must report the Travel Issue to Seeinindia in writing (at contactus@Seeinindia.com) or via 

telephone and provide us with information (including evidence) about the Experience and the 

circumstances of the Travel Issue within 24 hours after the start of your reservation, and must respond 

to any requests by us for additional information or cooperation on the Travel Issue;<br>
You must report the Travel Issue to Seeinindia in writing (at contactus@Seeinindia.com) or via 

telephone and provide us with information (including evidence) about the Experience and the 

circumstances of the Travel Issue within 24 hours after the start of your reservation, and must respond 

to any requests by us for additional information or cooperation on the Travel Issue;<br>
You must have used reasonable efforts to try to remedy the circumstances of the Travel Issue with the 

Guide prior to making a claim for a Travel Issue (and you must provide evidence of having done so).<br>
Minimum Quality Standards, Guide Responsibilities and Reimbursement to Traveler.<br>
If you are a Guide, you are responsible for ensuring that the Experiences you list on the Site meet 

minimum quality standards regarding adequacy of the description on the Site, safety, health, and do not 

present a Traveler with Travel Issues. Throughout the Experience, Guides should be available in order to 

try, in good faith, to resolve Traveler issues.<br>
If you are a Guide, you are responsible for ensuring that the Experiences you list on the Site meet 

minimum quality standards regarding adequacy of the description on the Site, safety, health, and do not 

present a Traveler with Travel Issues. Throughout the Experience, Guides should be available in order to 

try, in good faith, to resolve Traveler issues.<br><br>
<strong>Conditions to Claim a Travel Issue.</strong><br>
Only a Traveler may submit a claim for a Travel Issue. If you are a Traveler, in order to submit a valid 

claim for a Travel Issue and receive the benefits with respect to your reservation, you are required to 

meet each of the following conditions:<br>
You must report the Travel Issue to Seeinindia in writing (at contactus@Seeinindia.com) or via 

telephone and provide us with information (including evidence) about the Experience and the 

circumstances of the Travel Issue within 24 hours after the start of your reservation, and must respond 

to any requests by us for additional information or cooperation on the Travel Issue;<br>
You must not have directly or indirectly caused the Travel Issue (through your action, omission or 

negligence); and<br>
You must have used reasonable efforts to try to remedy the circumstances of the Travel Issue with the 

Guide prior to making a claim for a Travel Issue (and you must provide evidence of having done so).<br>
If you are a Guide, you are responsible for ensuring that the Experiences you list on the Site meet 

minimum quality standards regarding adequacy of the description on the Site, safety, health, and do not 

present a Traveler with Travel Issues. Throughout the Experience, Guides should be available in order to 

try, in good faith, to resolve Traveler issues.<br>
If you are a Guide, and if (i) Seeinindia determines that a Traveler has suffered a Travel Issue related 

to an Experience listed by you and (ii) Seeinindia either reimburses that Traveler any amount up to the 

amount paid by the Traveler through the Site for the Experience or provides an alternative Experience 

to the Traveler, you agree to reimburse Seeinindia up to the amount paid by Seeinindia within 30 days 

of Seeinindia's request. All determinations of Seeinindia with respect to the Traveler Refund Policy, 

including without limitation the size of any refund to the Traveler, shall be final and binding on the 

Travelers and Guides. You also agree that in order for you to reimburse Seeinindia up to the amount 

paid by Seeinindia, Seeinindia may off-set or reduce any amounts owed by Seeinindia to you by this 

amount. If the Traveler is rescheduled to an alternative Experience, you may lose part or all of the 

Experience Fee payment for the booking and you may be responsible for reasonable additional costs 

incurred to reschedule the Traveler to the alternative Experience.<br>
The rights of the Travelers under the Traveler Refund Policy supersede the cancellation policy that 

otherwise applies to a particular Experience. If you dispute the Travel Issue you may notify us in writing 

(contactus@seeinindia.com) or via telephone and provide us with information (including evidence) 

disputing the claims regarding the Travel Issue, provided you must have used reasonable and good faith 

efforts to try to remedy the Travel Issue with the Traveler prior to disputing the Travel Issue claim (and 

you must provide evidence of having done so). You agree that all determinations of Seeinindia with 

respect to the Travel Issue shall be final and binding on the Travelers and Guides regardless of your 

submission of a dispute against such Travel Issue. In the event of one or more<br>
The rights of the Travelers under the Traveler Refund Policy supersede the cancellation policy that 

otherwise applies to a particular Experience. If you dispute the Travel Issue you may notify us in writing 

(contactus@seeinindia.com) or via telephone and provide us with information (including evidence) 

disputing the claims regarding the Travel Issue, provided you must have used reasonable and good faith 

efforts to try to remedy the Travel Issue with the Traveler prior to disputing the Travel Issue claim (and 

you must provide evidence of having done so). You agree that all determinations of Seeinindia with 

respect to the Travel Issue shall be final and binding on the Travelers and Guides regardless of your 

submission of a dispute against such Travel Issue. In the event of one or more<br>
<br>
<strong>General Provisions.</strong><br>
(a) No Assignment/No Insurance. This Traveler Refund Policy is not intended to constitute an offer to 

insure, does not constitute insurance or an insurance contract, does not take the place of insurance 

obtained or obtainable by the Traveler, and the Traveler has not paid any premium in respect of the 

Traveler Refund Policy. The benefits provided under this Traveler Refund Policy are not assignable or 

transferable by you. (b) Modification or Termination. Seeinindia reserves the right to modify or 

terminate this Traveler Refund Policy, at any time, in its sole discretion, and without prior notice. (c) If 

Seeinindia modifies this Traveler Refund Policy, we will post the modification on the Site or provide you 

with notice of the modification and Seeinindia will continue to process all claims for Travel Issues made 

prior to the effective date of the modification. (d) Entire Agreement and Definitions. This Traveler 

Refund Policy constitutes the entire and exclusive understanding and agreement between Seeinindia 

and you regarding the Traveler Refund Policy and supersedes and replaces any and all prior oral or 

written understandings or agreements between Seeinindia and you regarding the Traveler Refund 

Policy. Capitalized terms not otherwise defined herein shall have the meaning set forth in the Seeinindia 

Terms of Service. Controlling Law. This Traveler Refund Policy will be interpreted in accordance with the 

laws of the Mumbai Jurisdiction only, without regard to its conflict-of-law provisions. (e) Limitation of 

Liability. IN NO EVENT WILL SEEININDIA'S AGGREGATE LIABILITY ARISING OUT OF OR IN CONNECTION 

WITH THIS SEEININDIA POLICY TERMS, EXCEED THE AMOUNT OF THE EXPERIENCE FEES COLLECTED BY 

SEEININDIA FROM THE TRAVELER. SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR 

LIMITATION OF LIABILITY FOR CONSEQUENTIAL OR INCIDENTAL DAMAGES, SO THE ABOVE LIMITATION 

MAY NOT APPLY TO YOU. YOU ACKNOWLEDGE AND AGREE THAT, BY POSTING A LISTING OR BOOKING 

AN EXPERIENCE OR OTHERWISE USING THE SITE, SERVICES AS A GUIDE OR TRAVELER, YOU ARE 

INDICATING THAT YOU HAVE READ, AND THAT YOU UNDERSTAND AND AGREE TO BE BOUND BY THESE 

POLICY TERMS.<br>
<br>
Cancellation due to outside factors.<br>
Certain Experiences may depend on factors outside either party's control, such as weather ("Outside 

Factors"). The Provider has the discretion as to whether Outside Factors will prevent the Experience 

from taking place. As a Provider, if you need to cancel an Experience due to Outside Factors, you must 

contact the Traveler and Seeinindia (at contactus@seeinindia.com) as early as possible. Subject to the 

Traveler's consent, the Provider and the Traveler may choose to reschedule the Experience for another 

date. If the Experience cannot be rescheduled, the Traveler should contact Seeinindia so we may assist 

in finding a replacement Experience. For clarity, in the event the alternative Experience is of a higher 

price than the former, you may be responsible for any difference in price. In the event the alternative 

Experience is of a lower price, you may be entitled to a partial refund for the difference. As a Traveler, 

if you have contacted Seeinindia as provided above and Seeinindia is unable to find you a replacement 

Experience, Seeinindia may refund the Total Fees for such booking to the applicable Traveler within a 

commercially reasonable time of the cancellation.<br>
<br>
<strong>Taxes:</strong><br>
You understand and agree that you are solely responsible for determining your applicable tax reporting 

requirements in consultation with your tax advisors. Seeinindia cannot and does not offer tax-related 

advice to any users of the Services. Additionally, please note that each Provider is responsible for 

determining local indirect taxes and for including any applicable taxes to be collected or obligations 

relating to applicable taxes within Itineraries.<br>
<br>
<strong>User Conduct:</strong><br>
You are solely responsible for all code, video, images, information, data, text, software, music, sound,

photographs, graphics, messages or other materials ("content") that you upload, post, publish or 

display (hereinafter, "upload") or email or otherwise use via the Service. The following are examples of 

the kind of content and/or use that is illegal or prohibited by Seeinindia. Seeinindia reserves the right 

to investigate and take appropriate legal action against anyone who, in Seeinindia's sole discretion, 

violates this provision, including without limitation, removing the offending content from the Service, 

suspending or terminating the account of such violators and reporting you to the law enforcement 

authorities. You agree to not use the Service to:<br>
Email or otherwise upload any content that (i) infringes any intellectual property or other proprietary 

rights of any party; (ii) you do not have a right to upload under any law or under contractual or 

fiduciary relationships; (iii) contains software viruses or any other computer code, files or programs 

designed to interrupt, destroy or limit the functionality of any computer software or hardware or 

telecommunications equipment; (iv) poses or creates a privacy or security risk to any person; (v) 

constitutes unsolicited or unauthorized advertising, promotional materials, commercial activities and/

or sales, "junk mail," "spam," "chain letters," "pyramid schemes," "contests," "sweepstakes," or any 

other form of solicitation; (vi) is unlawful, harmful, threatening, abusive, harassing, tortious, excessively 

violent, defamatory, vulgar, obscene, pornographic, libelous, invasive of another's privacy, hateful 

racially, ethnically or otherwise objectionable; or (vii) in the sole judgment of Seeinindia, is objectionable 

or which restricts or inhibits any other person from using or enjoying the Service, or which may expose 

Seeinindia or its users to any harm or liability of any type;<br>
Interfere with or disrupt the Service or servers or networks connected to the Service, or disobey any 

requirements, procedures, policies or regulations of networks connected to the Service; or<br>
Violate any applicable local, state, national or international law, or any regulations having the force of 

law;<br>
Violate any applicable local, state, national or international law, or any regulations having the force of 

law;<br>
Solicit personal information from anyone under the age of 18;<br>
Harvest or collect email addresses or other contact information of other users from the Service 

by electronic or other means for the purposes of sending unsolicited emails or other unsolicited 

communications;<br>
Advertise or offer to sell or buy any goods or services for any business purpose that is not specifically 

authorized;<br>
Further or promote any criminal activity or enterprise or provide instructional information about 

illegal activities; or<br>
Further or promote any criminal activity or enterprise or provide instructional information about 

illegal activities; or<br>
Offer, as a Provider, any Experiences that you do not yourself have permission to provide (without 

limiting the foregoing, you will not list Experiences as a Provider if you are serving in the capacity of an 

agent for a third party);<br>
Offer, as a provider, any Experience that may not be provided pursuant to the terms and conditions of 

an agreement with a third party;<br>
When acting as a Traveler or otherwise, recruit or otherwise solicit any Provider or other user of the 

Services to join third party services or websites that are competitive to Seeinindia, without Seeinindia's 

prior written approval;<br>
Use the Services to find a Provider or Traveler and then complete a booking of an Experience 

transaction independent of the Services, whether or not you do so in order to circumvent the obligation 

to pay any Service Fees related to Seeinindia's provision of the Services; or<br>
As a Provider, submit any Profile or Itinerary with a false or misleading price information.<br>
<br>
<strong>Special Notice for International Use; Export Controls:</strong>
<br>
Software (defined below) available in connection with the Service and the transmission of applicable 

data, if any, is subject to India export controls. No Software may be downloaded from the Service or 

otherwise exported or re-exported in violation of India export laws. Downloading or using the Software 

is at your sole risk. Recognizing the global nature of the Internet, you agree to comply with all local 

rules and laws regarding your use of the Service, including as it concerns online conduct and acceptable 

content.<br>
<br>
<strong>Commercial Use:</strong><br>
Unless otherwise expressly authorized herein or in the Service, you agree not to display, distribute, 

license, perform, publish, reproduce, duplicate, copy, create derivative works from, modify, sell, resell, 

exploit, transfer or upload for any commercial purposes, any portion of the Service, use of the Service, 

or access to the Service. The Service is for your personal use.<br>
Intellectual Property Rights<br>

<br>
<strong>Service Content, Software and Trademarks:</strong>
<br>
You acknowledge and agree that the Service may contain content or features ("Service Content") that 

are protected by copyright, patent, trademark, trade secret or other proprietary rights and laws. Except 

as expressly authorized by Seeinindia, you agree not to modify, copy, frame, scrape, rent, lease, loan, 

sell, distribute or create derivative works based on the Service or the Service Content, in whole or in 

part, except that the foregoing does not apply to your own User Content (as defined below) that you 

legally upload to the Service. In connection with your use of the Service you will not engage in or use 

any data mining, robots, scraping or similar data gathering or extraction methods. Any use of the Service 

or the Service Content other than as specifically authorized herein is strictly prohibited. The technology 

and software underlying the Service or distributed in connection therewith is the property of Seeinindia, 

our affiliates and our partners (the "Software"). You agree not to copy, modify, create a derivative work 

of, reverse engineer, reverse assemble or otherwise attempt to discover any source code, sell, assign, 

sublicense, or otherwise transfer any right in the Software. Any rights not expressly granted herein are 

reserved by Seeinindia.<br>
The Seeinindia name and logos are trademarks and service marks of Seeinindia (collectively the 

"Seeinindia Trademarks"). Other Seeinindia, product, and service names and logos used and displayed 

via the Service may be trademarks or service marks of their respective owners who may or may not 

endorse or be affiliated with or connected to Seeinindia. Nothing in this Terms of Service or the Service 

should be construed as granting, by implication, estoppel, or otherwise, any license or right to use any of 

Seeinindia Trademarks displayed on the Service, without our prior written permission in each instance. 

All goodwill generated from the use of Seeinindia Trademarks will inure to our exclusive benefit.<br>
<br>
<strong>Third Party Material:</strong><br>
Under no circumstances will Seeinindia be liable in any way for any content or materials of any third 

parties (including users), including, but not limited to, for any errors or omissions in any content, or for 

any loss or damage of any kind incurred as a result of the use of any such content. You acknowledge that 

Seeinindia does not have a duty to pre-screen content, but that Seeinindia and its designees will have 

the right (but not the obligation) in their sole discretion to refuse or remove any content that is available 

via the Service. Without limiting the foregoing, Seeinindia and its designees will have the right to remove 

any content that violates these Terms of Service or is deemed by Seeinindia, in its sole discretion, to be 

otherwise objectionable. You agree that you must evaluate, and bear all risks associated with, the use of 

any content, including any reliance on the accuracy, completeness, or usefulness of such content.<br>
<br>
<strong>User Content Transmitted Through the Service:</strong>
<br>
With respect to the content or other materials you upload through the Service or share with other users

or recipients (collectively, "User Content"), you represent and warrant that you own all right, title and 

interest in and to such User Content, including, without limitation, all copyright and rights of publicity 

contained therein. By uploading any User Content you hereby grant and will grant Seeinindia and its 

affiliated companies a nonexclusive, worldwide, royalty free, fully paid up, transferable, sublicensable, 

perpetual, irrevocable license to copy, display, upload, perform, distribute, store, modify and otherwise 

use your User Content in connection with the operation of the Service or the promotion, advertising or 

marketing thereof, in any form, medium or technology now known or later developed.<br>
You acknowledge and agree that any questions, comments, suggestions, ideas, feedback or other 

information about the Service ("Submissions"), provided by you to Seeinindia are non-confidential 

and Seeinindia will be entitled to the unrestricted use and dissemination of these Submissions for any 

purpose, commercial or otherwise, without acknowledgment or compensation to you.<br>
You acknowledge and agree that Seeinindia may preserve content and may also disclose content if 

required to do so by law or in the good faith belief that such preservation or disclosure is reasonably 

necessary to: (a) comply with legal process, applicable laws or government requests; (b) enforce these 

Terms of Service; (c) respond to claims that any content violates the rights of third parties; or (d) 

protect the rights, property, or personal safety of Seeinindia, its users and the public. You understand 

that the technical processing and transmission of the Service, including your content, may involve (a) 

transmissions over various networks; and (b) changes to conform and adapt to technical requirements 

of connecting networks or devices.<br>
<br>
<strong>Third Party Websites:</strong><br>
The Service may provide, or third parties may provide, links or other access to other sites and 

resources on the Internet. Seeinindia has no control over such sites and resources and Seeinindia is 

not responsible for and does not endorse such sites and resources. You further acknowledge and agree 

that Seeinindia will not be responsible or liable, directly or indirectly, for any damage or loss caused 

or alleged to be caused by or in connection with use of or reliance on any content, events, goods or 

services available on or through any such site or resource. Any dealings you have with third parties 

found while using the Service are between you and the third party, and you agree that Seeinindia is not 

liable for any loss or claim that you may have against any such third party.<br><br>

<strong>Social Networking Services:</strong><br>
You may enable or log in to the Service via various online third party services, such as social media 

and social networking services like Facebook or Twitter ("Social Networking Services"). By logging in or 

directly integrating these Social Networking Services into the Service, we make your online experiences 

richer and more personalized. To take advantage of this feature and capabilities, we may ask you to 

authenticate, register for or log into Social Networking Services on the websites of their respective 

providers. As part of such integration, the Social Networking Services will provide us with access to 

certain information that you have provided to such Social Networking Services, and we will use, store 

and disclose such information in accordance with our Privacy Policy. For more information about the<br>
implications of activating these Social Networking Services and Seeinindia's use, storage and disclosure 

of information related to you and your use of such services within Seeinindia (including your friend lists 

and the like), please see our Privacy Policy. However, please remember that the manner in which Social 

Networking Services use, store and disclose your information is governed solely by the policies of such 

third parties, and Seeinindia shall have no liability or responsibility for the privacy practices or other 

actions of any third party site or service that may be enabled within the Service.<br>
<br>
In addition, Seeinindia is not responsible for the accuracy, availability or reliability of any information, 

content, goods, data, opinions, advice or statements made available in connection with Social 

Networking Services. As such, Seeinindia is not liable for any damage or loss caused or alleged to be 

caused by or in connection with use of or reliance on any such Social Networking Services. Seeinindia 

enables these features merely as a convenience and the integration or inclusion of such features does 

not imply an endorsement or recommendation.<br>
<br>
<strong>Indemnity and Release:</strong><br>
You agree to release, indemnify and hold Seeinindia and its affiliates and their officers, employees, 

directors and agent harmless from any from any and all losses, damages, expenses, including reasonable 

attorneys' fees, rights, claims, actions of any kind and injury (including death) arising out of or relating to 

your use of the Service, any User Content, your connection to the Service, your violation of these Terms 

of Service or your violation of any rights of another<br><br>
<strong>Disclaimer of Warranties:</strong><br>
YOUR USE OF THE SERVICE IS AT YOUR SOLE RISK. THE SERVICE IS PROVIDED ON AN "AS IS" AND "AS 

AVAILABLE" BASIS. SEEININDIA EXPRESSLY DISCLAIMS ALL WARRANTIES OF ANY KIND, WHETHER 

EXPRESS, IMPLIED OR STATUTORY, INCLUDING, BUT NOT LIMITED TO THE IMPLIED WARRANTIES OF 

MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT.<br>
SEEININDIA MAKES NO WARRANTY THAT (I) THE SERVICE WILL MEET YOUR REQUIREMENTS, (II) THE 

SERVICE WILL BE UNINTERRUPTED, TIMELY, SECURE, OR ERROR-FREE, (III) THE RESULTS THAT MAY BE 

OBTAINED FROM THE USE OF THE SERVICE WILL BE ACCURATE OR RELIABLE, OR (IV) THE QUALITY OF 

ANY PRODUCTS, SERVICES, INFORMATION, OR OTHER MATERIAL PURCHASED OR OBTAINED BY YOU 

THROUGH THE SERVICE WILL MEET YOUR EXPECTATIONS.<br>
<br>
<strong>Limitation of Liability:</strong><br>
YOU EXPRESSLY UNDERSTAND AND AGREE THAT SEEININDIA WILL NOT BE LIABLE FOR ANY INDIRECT, 

INCIDENTAL, SPECIAL, CONSEQUENTIAL, EXEMPLARY DAMAGES, OR DAMAGES FOR LOSS OF PROFITS 

INCLUDING BUT NOT LIMITED TO, DAMAGES FOR LOSS OF GOODWILL, USE, DATA OR OTHER 

INTANGIBLE LOSSES (EVEN IF SEEININDIA HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES), 

WHETHER BASED ON CONTRACT, TORT, NEGLIGENCE, STRICT LIABILITY OR OTHERWISE, RESULTING 

FROM: (I) THE USE OR THE INABILITY TO USE THE SERVICE; (II) THE COST OF PROCUREMENT OF 

SUBSTITUTE GOODS AND SERVICES RESULTING FROM ANY GOODS, DATA, INFORMATION OR SERVICES 

PURCHASED OR OBTAINED OR MESSAGES RECEIVED OR TRANSACTIONS ENTERED INTO THROUGH 

OR FROM THE SERVICE; (III) UNAUTHORIZED ACCESS TO OR ALTERATION OF YOUR TRANSMISSIONS 

OR DATA; (IV) STATEMENTS OR CONDUCT OF ANY THIRD PARTY ON THE SERVICE; OR (V) ANY OTHER 

MATTER RELATING TO THE SERVICE. IN NO EVENT WILL SEEININDIA'S TOTAL LIABILITY TO YOU FOR ALL 

DAMAGES, LOSSES OR CAUSES OF ACTION EXCEED THE AMOUNT YOU HAVE PAID SEEININDIA FOR THE 

SIGHTSEEING OR PACKAGE BOOKED.<br>
SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF CERTAIN WARRANTIES OR THE LIMITATION 

OR EXCLUSION OF LIABILITY FOR INCIDENTAL OR CONSEQUENTIAL DAMAGES. ACCORDINGLY, SOME OF 

THE ABOVE LIMITATIONS SET FORTH ABOVE MAY NOT APPLY TO YOU. IF YOU ARE DISSATISFIED WITH 

ANY PORTION OF THE SERVICE OR WITH THESE TERMS OF SERVICE, YOUR SOLE AND EXCLUSIVE REMEDY 

IS TO DISCONTINUE USE OF THE SERVICE.<br><br>
<strong>Termination:</strong><br>
You agree that Seeinindia, in its sole discretion, may suspend or terminate your account (or any part 

thereof) or use of the Service and remove and discard any content within the Service, for any reason, 

including, without limitation, for lack of use or if Seeinindia believes that you have violated or acted 

inconsistently with the letter or spirit of these Terms of Service. Any suspected fraudulent, abusive 

or illegal activity that may be grounds for termination of your use of Service, may be referred to 

appropriate law enforcement authorities. Seeinindia may also in its sole discretion and at any time 

discontinue providing the Service, or any part thereof, with or without notice. You agree that any 

termination of your access to the Service under any provision of this Terms of Service may be effected 

without prior notice, and acknowledge and agree that Seeinindia may immediately deactivate or delete 

your account and all related information and files in your account and/or bar any further access to such 

files or the Service. Further, you agree that Seeinindia will not be liable to you or any third party for any 

termination of your access to the Service.<br><br>
<strong>User Disputes:</strong><br>
You agree that you are solely responsible for your interactions with any other user in connection

with the Service and Seeinindia will have no liability or responsibility with respect thereto. Seeinindia 

reserves the right, but has no obligation, to become involved in any way with disputes between you and 

any other user of the Service.<br><br>
<strong>General:</strong><br>
These Terms of Service constitute the entire agreement between you and Seeinindia and govern your 

use of the Service, superseding any prior agreements between you and Seeinindia with respect to the 

Service. You also may be subject to additional terms and conditions that may apply when you use 

affiliate or third-party services, third-party content or third-party software. These Terms of Service will 

be governed by the laws of the Mumbai Jurisdiction without regard to its conflict of law provisions. With 

respect to any disputes or claims not subject to arbitration, as set forth above, you and Seeinindia agree 

to submit to the personal and exclusive jurisdiction of Mumbai. The failure of Seeinindia to exercise or 

enforce any right or provision of these Terms of Service will not constitute a waiver of such right or 

provision. If any provision of these Terms of Service is found by a court of competent jurisdiction to be 

invalid, the parties nevertheless agree that the court should endeavor to give effect to the parties' 

intentions as reflected in the provision, and the other provisions of these Terms of Service remain in full 

force and effect. You agree that regardless of any statute or law to the contrary, any claim or cause of 

action arising out of or related to use of the Service or these Terms of Service must be filed within one 

(1) year after such claim or cause of action arose or be forever barred. A printed version of this 

agreement and of any notice given in electronic form will be admissible in judicial or administrative 

proceedings based upon or relating to this agreement to the same extent and subject to the same 

conditions as other business documents and records originally generated and maintained in printed 

form. You may not assign this Terms of Service without the prior written consent of Seeinindia, but 

Seeinindia may assign or transfer this Terms of Service, in whole or in part, without restriction. The 

section titles in these Terms of Service are for convenience only and have no legal or contractual effect. 

Notices to you may be made via either email or regular mail. The Service may also provide notices to 

you of changes to these Terms of Service or other matters by displaying notices or links to notices 

generally on the Service.<br><br>






						<div class="row">
							
								
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