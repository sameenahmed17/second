<?
	session_start();
	include("include/functions.php");
    $obj = new functions();
	
	
	$sid = $_SESSION['session_id'];
	if(isset($_REQUEST['date'])) {
		$dates = $_REQUEST['date'];
		$adult = $_REQUEST['adult'];
		$child = $_REQUEST['child'];
		$tid = $_REQUEST['tid'];
		$price = $_REQUEST['price'];
		$sid = $_SESSION['session_id'];
	
		$sql = "insert into wishlist(session_id, tour_id, price, adult, child, date) values ('$sid', '$tid', '$price', '$adult', '$child', '$dates')";
		//die();
		$obj->query($sql);
		$wid = mysql_insert_id();
	}
	
	$sql = "select * from wishlist where id = '$wid'";
	$result = $obj->query($sql);
	
	$sql1 = "select * from wishlist where id = '$wid'";
	$result1 = $obj->query($sql);
	
	$wishs = mysql_fetch_array($result1);
	
	$tour_sql = $obj->query("select * from tours where id='$wishs[tour_id]'");
	$trs = mysql_fetch_array($tour_sql);
	
	if($trs['tour_type'] == 'Per Person') {
		$type = 'Adults';
	}
	
	if($trs['tour_type'] == 'Per Vehicle') {
		$type = 'Vehicle';
	}
	
	if($trs['tour_type'] == 'Per Group') {
		$type = 'Group';
	}
	
	if(isset($_REQUEST['firstname'])) {
		$id = array();
		foreach($_REQUEST['id'] as $i) {
			$sql_wishlist = $obj->query("select * from wishlist where id='$i'");
			$result_wishlist = mysql_fetch_array($sql_wishlist);
			$date_wish = $result_wishlist['date'];
			$tourid = $result_wishlist['tour_id'];
			$adult = $result_wishlist['adult'];
			$child = $result_wishlist['child'];
			$explode_date = explode("-",$date_wish);
			
			$sql_avail = $obj->query("select * from availability where tour_id='$tourid' and d='$explode_date[0]' and m='$explode_date[1]' and y='$explode_date[2]'");
			
			$row_avail = mysql_fetch_array($sql_avail);
			$avail_id = $row_avail['id'];
			$a_adult = $row_avail['adults_availability'];
			$a_child = $row_avail['child_availability'];
			
			$adult_update = $a_adult - $adult;
			$child_update = $a_child - $child;
			
			$sql_update = $obj->query("update availability set adults_availability = '$adult_update',child_availability='$child_update' where id='$avail_id'");
		}
		
		if($payment == 'paypal') {
			$obj->query("delete from wishlist where id='$_SESSION[session_id]'");
			session_destroy();
			header("location: http://www.direcpay.com/");
		}
		if($payment == 'cash') {
			$obj->query("delete from wishlist where id='$_SESSION[session_id]'");
			session_destroy();
			header("location: thankyou.php");
		}
	}

	$sql_select = $obj->query("select * from wishlist where session_id = '$_SESSION[session_id]'");
	$count = mysql_num_rows($sql_select);

	$sql_tours = $obj->query("select * from tours where id='$tid'");
	$tours = mysql_fetch_array($sql_tours);
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
				
		<link href="css/form.css" rel="stylesheet" type="text/css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

		<script src="js/jquery.validate.js"></script>	
		
		<!--for pop-->
		<!--link href="forpop/styles.css" rel="stylesheet" type="text/css" /-->

		<!--script type="text/javascript" src="forpop/css-pop.js"></script-->
<!--for pop-->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56111840-1', 'auto');
  ga('send', 'pageview');

</script>

<script>
    $().ready(function() {
        // validate the comment form when it is submitted
        $("#detailsform").validate({	
            rules: {
                firstname: {
                    required: true,
                   
                },
				lname: {
					required: true,
				},
				email:
				{
					required: true,
					email:true,
					 remote: {
								<? if(isset($_SESSION['username'])) { ?>
								url: "searchuserajaxsession1.php",
								<? } else { ?>
								url: "searchuserajax1.php",
								<? } ?>
								type: "post",
								data: {
									username: function() {
										return $("#email").val();
									}
								}
							}
				},
				mobile: {
					required:true,
					number: true,
				},
				address: {
					required: true,
				},
				country: {
					required:true,
				},
				city:{
					required: true,
				},
				pincode:{
					required:true,
					number:true,
				},
				condition:{
					required: true,
				},
				payment_credit:{
					required:true,
				}
				  
            },
            messages: {				
                firstname: {
                    required:"Please Enter Your First Name"
                   // email: "Please Enter a Valid Email Address",
                },
				lname:{
					required: "Please Enter Your Last Name"
				},
				email:{
					required:"Please Enter Email",
					email:"Please Enter Valid Email",
					remote: "Email Already Exists",
				},
				mobile: {
					required:"Please Enter Mobile No",
					number:"Please enter Digits",
				},
				address: {
					required: "Please Enter Your Address",
				},
				country:{
					required: "Please Select Country",
				},
				city: {
					required: "Please Enter Your city name",
				},
				pincode:{
					required: "Please Enter your ZipCode",
					number: "Please Enter digits",
				},
				condition:{
					required: "Please Agree Terms & Condition"
				},
				payment_credit:{
					required:"Please select Payment Type"
				}
            },
			
						
			
        });
						
    });
</script>

<script>
function traveldetails()
{
	//alert("sdaf");
	
	var chks = document.getElementsByName('pass_fname[]');
		var hasChecked = false;
		for (var i = 0; i < chks.length; i++)
		{
			if (chks[i].value=='')
			{
				
				hasChecked = true;
				break;
			}
		}
		//return hasChecked;
		if(hasChecked==true)
		{
			alert("Please Enter All Travel Passenger First Name");
			return false;
		}
		
		var chks1 = document.getElementsByName('pass_lname[]');
		var hasChecked1 = false;
		for (var i = 0; i < chks1.length; i++)
		{
			if (chks[i].value=='')
			{
				hasChecked1 = true;
				break;
			}
		}
		//return hasChecked;
		
		if(hasChecked1==true)
		{
			alert("Please Enter All Travel Passenger Last Name");
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
			
			<!-- START #page-header -->
			<div id="header-banner">
				<div class="banner-overlay">
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper">Payment Details</h1>
							</section>
							
							<!-- breadcrumbs -->
							<?php $seo_url=$obj->getStaticUrl($trs['id'], $trs['nameof_tour']); ?>
							<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="index.php">Home</a></li>
									<li class="active"><a href="<?php echo str_replace(' ','-',$trs['city']); ?>-city"><?php echo $trs['city']; ?></a></li>
									<li class="active"><a href="<?php echo $seo_url; ?>"><?php echo $trs['nameof_tour']; ?></a></li>
									<li class="active">Payment Details</li>
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
					<!-- START #page -->
					<div id="page">
						<form action="pay.php" method="post" id="detailsform">
						<!-- START #contactForm -->
						<section id="signup-form">
							<h2 class="ft-heading text-upper">Payment Details</h2>
                                <div class="table-container-outer">
                                <div class="table-container-fade"></div>
                                <div class="table-container">
                                    <table class="list-style-box">
                                        <tbody>
                                            <tr>
                                                <td><strong>Name of tour</strong></td>
                                                <td><strong>Date</strong></td>
                                                <td><strong><? echo $type; ?></strong></td>
                                                <td><strong>Child</strong></td>
                                                <td><strong>Total Price</strong></td>
                                                <td>&nbsp;</td>
                                            </tr>
											 <?php
												$grand = array();
												$passenger = array();
											while ($row_result = mysql_fetch_array($result)) {
												$sql_select = $obj->query("select * from tours where id='$row_result[tour_id]'");
												$row = mysql_fetch_assoc($sql_select);
											?>
                                            <tr>
												<input type="hidden" name="id[]" value="<?php echo $row_result['id']; ?>" />
                                                <td><?php echo $row['nameof_tour']; ?></td>
                                                <td><?php echo $row_result['date']; ?></td>
                                                <td>
													<?php echo $row_result['adult'];
														array_push($passenger, $row_result['adult']);
													?>
												</td>
                                                <td>
													<?php echo $row_result['child'];
														array_push($passenger, $row_result['child']);
													?>
												</td>
                                                <td>
													<?php
													$dates = $row_result['date'];
													$dates = date("j-n-Y", strtotime($dates));
													$exp = explode("-",$dates);
													$price = $obj->query("select * from pricing where tour_id='$row_result[tour_id]' and d='$exp[0]' and m='$exp[1]' and y='$exp[2]'");
													$row_price = mysql_fetch_array($price);
													$a_price = $row_price['adults_price'];
													$c_price = $row_price['child_price'];
													$t_price = ($row_result['adult']*$a_price) + ($row_result['child']*$c_price);
													echo $t_price;
													array_push($grand,$t_price);
													?>
												</td>
                                                <td><a href="deletecart.php?id=<?php echo $row_result['id']; ?>">Delete</a></td>
                                            </tr>
											<?php } ?>
                                            <tr>
                                                <td><!--strong>*Additional 2.5% has been added as a processing fee</strong--></td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
													 <?php
														
														$g_total = 0;
														$total_pass = 0;
														foreach($grand as $key=>$value) {
															$g_total = $g_total + $value;
														}
														foreach($passenger as $key=>$value) {
															$total_pass = $total_pass + $value;
														}
													?>
                                                <td><strong>Tour Amount:</strong></td>
                                                <td><?php echo (($g_total)); ?></td>
												<input type="hidden" name="tour_amt" value="<?php echo (($g_total)); ?>">
                                                <td>&nbsp;</td>
                                            </tr>
                                            <!--tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td><strong>Processing Fee:</strong></td>
                                                <td><?php// echo number_format((($g_total)+(($g_total/100)*2.5)) - $g_total,2);
													//$processing_amt = (($g_total)+(($g_total/100)*2.5));
													?></td>
													<input type="hidden" name="processing_fee" value="<?php echo number_format((($g_total)+(($g_total/100)*2.5)) - $g_total,2); ?>">
                                                <td>&nbsp;</td>
                                            </tr-->
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td><strong>Service Tax:</strong></td>
											  <?php $processing_amt = $g_total;?>
                                              <td><?php echo number_format((($processing_amt)+(($processing_amt/100)*4.54)) - $processing_amt, 2); ?></td>
											 <input type="hidden" name="service_tax" value="<?php echo number_format((($processing_amt)+(($processing_amt/100)*4.54)) - $processing_amt, 2); ?>">
                                              <td>&nbsp;</td>
                                            </tr>
											
											<?php $result=$obj->query("select * from traveldetails where username='$_SESSION[username]'");
											$restravel=mysql_fetch_array($result);
											if(($restravel['source']=='Travel') and isset($_SESSION['username'])) {
											?>
												<tr>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td><strong>Agent Commission:</strong></td>
													<?php $comm=$row['travelagent_commission']; 
														$final=($comm * $g_total)/100;
													?>
													<td><?php echo $final; ?></td>
													<input type="hidden" name="service_tax" value="<?php echo number_format((($processing_amt)+(($processing_amt/100)*4.54)) - $processing_amt, 2); ?>">
													<td>&nbsp;</td>
												</tr>
									
											<? } ?>
                                            <tr>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td>&nbsp;</td>
                                              <td><strong>Grand Total:</strong></td>
                                              <td><?php echo number_format((($processing_amt)+(($processing_amt/100)*4.54)-($final)),2,'.','')." Rs."; ?></td>
											  <input type="hidden" id="total2" name="total2" value="<?php echo number_format(((($processing_amt)+(($processing_amt/100)*4.54)-($final))),2,'.',''); ?>" />
                                              <td>&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div></div>
                                <!--form action="pay.php" method="post" id="detailsform"-->
                                <div class="col-md-6 no-padding padding-rgt">
                                	<div class="table-container-outer">
                                    <div class="table-container-fade"></div>
                                    <div class="table-container">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td width="50%"><strong>Travellers Details</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="order-list list-style list-style-box no-padding">                                            
                                                            <div class="col-md-12">
                                                                <br>
																<?php
																  $result=$obj->query("select * from users where username='$_SESSION[username]'");
																  
																  $row = mysql_num_rows($result);
																  if($row>0)
																  {
																	$res=mysql_fetch_array($result);
																  }
																  else {
																	$result=$obj->query("select * from traveldetails where username='$_SESSION[username]'");
																	$res = mysql_fetch_array($result);
																  }
																?>
																<? 	if($tours['tour_type'] == 'Per Person') { ?>
																<? for($pass=1; $pass<=$total_pass; $pass++) { ?>
                                                                <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="pass_fname[]" value="<? echo $res['firstname']; ?>" placeholder="First Name" />
																</div>
																 <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="pass_lname[]" value="<? echo $res['lastname']; ?>" placeholder="Last Name" />
																</div>
																<? } } else {   ?>
																<? for($pass=1; $pass<=($tours['max_persons']*$total_pass); $pass++) { ?>
																   <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="pass_fname[]"  placeholder="First Name" />
																</div>
																 <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="pass_lname[]" placeholder="Last Name" />
																</div>
																<? } } ?>
																
																
                                                                <!--div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="lname" value="" placeholder="Last Name" /></div>
                                                                <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="name" value="" placeholder="First Name" /></div>
                                                                <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="lname" value="" placeholder="Last Name" /></div>
                                                                <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="name" value="" placeholder="First Name" /></div>
                                                                <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="lname" value="" placeholder="Last Name" /></div>
                                                                <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="name" value="" placeholder="First Name" /></div>
                                                                <div class="col-md-6 bot-margin padding-rgt">
                                                                <input type="text" class="form-control" name="lname" value="" placeholder="Last Name" /></div-->            
                                                            </div>                                                    
															<div class="clearfix"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div></div>
                                </div>
                                <div class="col-md-6 no-padding">
                                	<div class="table-container-outer">
                                    <div class="table-container-fade"></div>
                                    <div class="table-container">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td width="50%"><strong>Payment Details</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-md-12 list-style-box">
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>First Name <span class="required small">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="text" class="form-control" name="firstname" value="<?php if($restravel['source']=='Travel') { echo $restravel['firstname']; } else { echo $res['firstname']; } ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>Last Name <span class="required small">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="text" class="form-control" name="lname" value="<?php if($restravel['source']=='Travel') { echo $restravel['lastname']; } else { echo $res['lastname']; } ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>Email Address <span class="required small">*</span></label>
                                                                </div>
                                                            </div>
															
															<? if(isset($_SESSION['username'])) { ?>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="text" class="form-control" id="emailexists" name="email" value="<?php if($restravel['source']=='Travel') { echo $restravel['email']; } else { echo $res['email']; } ?>" />
                                                                </div>
                                                            </div>
															<? } else {  ?>
															<div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="text" class="form-control" id="email" name="email" value="" />
                                                                </div>
                                                            </div>
															<? } ?>
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>Mobile <span class="required small">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="text" class="form-control" name="mobile" value="<?php if($restravel['source']=='Travel') { echo $restravel['mobile']; } else { echo $res['mobile']; } ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>Contact No <span class="required small">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-3 no-padding bot-margin">
                                                                    <input type="text" maxlength="3" class="form-control" name="country_code" value="<?php if($restravel['source']=='Travel') { echo $restravel['country_code']; } else { echo $res['country_code']; } ?>" placeholder="Country Code"/>
                                                                </div> 
																<div class="col-md-1 no-padding bot-margin"></div>
																 <div class="col-md-3 no-padding bot-margin">
                                                                    <input type="text" maxlength="3" class="form-control" name="area_code" value="<?php if($restravel['source']=='Travel') { echo $restravel['area_code']; } else { echo $res['area_code']; } ?>" placeholder="Area Code"/>
                                                                </div>
																<div class="col-md-1 no-padding bot-margin"></div>
																 <div class="col-md-4 no-padding bot-margin">
                                                                    <input type="text" maxlength="8" class="form-control" name="contact" value="<?php if($restravel['source']=='Travel') { echo $restravel['contact']; } else { echo $res['contact']; } ?>" placeholder="Telephone no."/>
                                                                </div>
																
                                                            </div>
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>Address <span class="required small">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <textarea name="address" class="form-control" cols="45" rows="5"><?php if($restravel['source']=='Travel') { echo $restravel['address']; } else { echo $res['address']; } ?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>Country</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
																<input type="text" class="form-control" name="country" value="<?php if($restravel['country']=='Travel') { echo $restravel['country']; } else { echo $res['country']; } ?>">
                                                                    <!--select class="form-control" name="country">
                                                                        <option value="">Select One</option>
																		<option value="india"<?php if(($res['country']=='india') or ($restravel['country']=='india')) { ?> selected="selected"<?php } ?>>India</option>
																		<option value="other" <?php if(($res['country']=='other')  or ($restravel['country']=='other')) { ?> selected="selected"<?php } ?>>Other</option>
                                                                    </select-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>City <span class="required small">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="text" class="form-control" name="city" value="<?php if($restravel['source']=='Travel') { echo $restravel['city']; } else { echo $res['city']; } ?>" />
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>Pin Code <span class="required small">*</span></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="text" class="form-control" name="pincode" value="<?php if($restravel['source']=='Travel') { echo $restravel['pincode']; } else { echo $res['pincode']; } ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>Payment Method <span class="required small">*</span></label>
																	<!--input type="radio" checked="checked" name="payment_credit" value="Credit-Debit"-->
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="radio" name="payment_credit" class="form-control" value="Credit-Debit" />
                                                                    <img src="img/icons/visanew.jpg" border="0">
                                                                    <img src="img/icons/mastercard.jpg" border="0">
                                                                    <img src="img/icons/american_express.jpg" border="0">
                                                                    <img src="img/icons/netbanking.jpg" border="0">
                                                                </div>
                                                            </div>
															
															 <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>OR</label>
																	<!--input type="radio" checked="checked" name="payment_credit" value="Credit-Debit"-->
                                                                </div>
                                                            </div>
															
															 <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="radio" name="payment_credit" class="form-control" value="Paypal" />
                                                                    <img src="img/download (1).jpg" border="0" width="200" height="50">
                                                                   
                                                                </div>
                                                            </div>
															
															
                                                            <div class="col-md-3 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <label>&nbsp;</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <div class="col-md-12 no-padding bot-margin">
                                                                    <input type="checkbox" name="condition" class="form-control" value="" />
                                                                    By clicking on this box, you hereby agree to all the purchase and Terms and Conditions of See In India
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3 no-padding bot-margin">&nbsp;</div>
                                                            <div class="col-md-9 no-padding bot-margin">
                                                                <input type="submit" class="btn btn-primary btn-lg text-upper" name="submit" value="Book Your Tour" onclick="return traveldetails();"/><br>
                                                                <span class="required small">*Your email will never published.</span>
																</br>
																<span><a style="cursor:pointer" onclick="javascript:void window.open('popbox.php','1418043417924','width=500px,height=200px,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;"> “What happens when you Book the Tour?”</a></span>
                                                            </div>                                                            
                                                            <div class="clearfix"></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div></div>
                                </div>   
							</form>
						</section>
						<!-- END #contactForm -->
					</div>
					<!-- END #page -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START footer -->
			<?php include 'header/bottom-footer.php';?>
			<!-- END footer -->
		</div>
		<!-- END #wrapper -->

				
		<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<!--script type="text/javascript" src="js/jquery.min.js"></script-->
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->
        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script src="js/jquery.flexslider-min.js"></script>        
        <script type="text/javascript">
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