
<?php 
	include("include/functions.php");
    $obj = new functions();

	if(isset($_POST['login_submit'])) { 
	
	 $submit=$obj->traveluserRegister($_POST, $_FILES);
	if($submit){
	echo "<script>alert('You have successfully logged in..');</script>";
	}
	}
	
	if(isset($_POST['success_reg'])) { 
	echo "<script>alert('You have successfully registered.We shall get back to you within 48 hours.');</script>";
	}
	
	
	
	if(isset($_POST['submit_login']))
	{
    $obj->gettravelLogin($_POST);
	}
	
	
	
	 function randomuser($len = 5)
		{
		   $user = '';
		   $lchar = 0;
		   $char = 0;
		   for($i = 0; $i < $len; $i++)
		   {
			   while($char == $lchar)
			   {
				   $char = rand(48, 109);
				   if($char > 57) $char += 7;
				   if($char > 90) $char += 6;
			   }
			   $user .= chr($char);
			   $lchar = $char;
		   }
		   return $user;
		}
		
		//Example of use:
		$newuser=randomuser(5);
	
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
        $("#register-form").validate({	
            rules: {
                firstname: {
                    required: true,
                   
                },
				lastname: {
					required: true,
				},
				mobile:{
					required: true,
				},
				email: {
					required :true,
					 email: true,
					 remote: {
								url: "travelsearchuserajax1.php",
								type: "post",
								data: {
									username: function() {
										return $("#email").val();
									}
								}
							}
				},
				address :{
					required: true,
				},
				city :{
					required: true,
				},
				country:
				{
					required: true,
				},
				pincode: {
					required: true,
				},
				username: {
					required: true,
					remote: {
								url: "travelsearchuserajax.php",
								type: "post",
								data: {
									username: function() {
										return $("#username").val();
									}
								}
							}
				},
				password:{
					required: true,
				},
				cpass: {
					equalTo: "#password"
                },
				entercaptcha: {
					required: true,
					equalTo:"#captchahidden"
				},
				dp1: {
					required: true,
				}
				
				
				
				
				  
            },
            messages: {				
                firstname: {
                    required:"Please Enter Your First Name"
                   // email: "Please Enter a Valid Email Address",
                },
				lastname: {
					required:"Please Enter Your Last Name"
				},
				mobile: {
					required: "Please Enter Your Mobile No."
				},
				email: {
					required: "Please Enter Your Email Id" ,
					email: "Please Enter Valid Email Address",
					remote: "Email Already Exists",
				},
				address: {
					required:"Please Enter Your Residence Address"
				},
				city: {
					required:"Please Enter Your City Name"
				},
				country: {
					required: "Please Enter Your Country Name"
				},
				pincode: {
					required: "Please Enter Your Pincode"
				},
				username: {
					required: "Please Enter Username",
					 remote: "Username Already Exists",
				},
				password: {
					required: "Please Enter Your Password"
				},
				cpass: {
					cpass: "Enter Re-Password Same as Password"
                },
				entercaptcha: {
					required: "Please Enter Captcha Code",
					entercaptcha:"Enter Above matching Captcha code"
				},
				dp1: {
					required: "Please Upload Your Photo"
				}
				
							
            }
			
						
			
        });
						
    });
</script>
<script>

function changecaptcha()
{
	//alert("dfj");
	captchacode = document.getElementById('entercaptcha').value;
	captchahidden = document.getElementById('captchahidden').value;
	//alert(captchahidden);
	c = document.getElementById('readcaptcha').value;
		//alert(c);
	if(captchacode != captchahidden)
	{
		
	
			window.location="register.php";
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
								<h1 class="text-upper">Registration Form</h1>
							</section>
							
							<!-- breadcrumbs -->
							<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="index.php">Home</a></li>
									<li class="active">Registration Form</li>
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
						
						<!-- START #contactForm -->
						<!-- START #contactForm -->
							<section id="signin-form">
								<h2 class="ft-heading text-upper">Log In</h2>
								<form action="" method="post">
									<fieldset>
										<ul class="formFields list-unstyled">
											<li class="row">
												<div class="col-md-6">
													<label>Username <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="username" value="" />
												</div>
												<div class="col-md-6">
													<label>Password <span class="required small">(Required)</span></label>
													<input type="password" class="form-control" name="password" value="" />
												</div>
											</li>
											<? if(isset($_POST['failed'])) { ?>
											<li>
											<b style="color:red">Login Failed..Please try again</b>
											
											</li>
											<? } ?>
											<li class="row">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary btn-lg text-upper" name="submit_login" value="Log In" />
													<span class="required small"></span>
												</div>
											</li>
										</ul>
									</fieldset>
								</form>
							</section>
							<!-- END #contactForm -->
							
							
						<section id="signup-form">
							<h2 class="ft-heading text-upper">Create New Account</h2>
							<form method="POST" enctype="multipart/form-data" id="register-form" name="register-form" >
								<fieldset>
									<ul class="formFields list-unstyled">
										<li class="row">
											<div class="col-md-6">
												<label>First Name <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="firstname" value="" />
											</div>
                                            <div class="col-md-6">
												<label>Last Name <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="lastname" value="" />
											</div>
                                            <div class="col-md-6">
												<label>Mobile <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="mobile" value="" />
											</div>
                                            <div class="col-md-2">
												<label>Telephone <span class="required small"></span></label>
												<input type="text" maxLength="3" class="form-control" name="country_code" value="" placeholder="Country code"/>
											</div>
											
											  <div class="col-md-2">
												<label>&nbsp;&nbsp; <span class="required small"></span></label>
												<input type="text" maxLength="3" class="form-control" name="area_code" value="" placeholder="Area code"/>
											</div>
											
											 <div class="col-md-2">
												<label>&nbsp;&nbsp;<span class="required small"></span></label>
												<input type="text" maxLength="7" class="form-control" name="contact" value="" placeholder="Telephone no."/>
											</div>
											
											
											<div class="col-md-6">
												<label>Email <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="email" value="" id="email" />
											</div>
                                            <div class="col-md-6">
												<label>Address<span class="required small">(Required)</span> </label>
												<input type="text" class="form-control" name="address" value="" />
											</div>
                                            <div class="col-md-6">
												<label>City<span class="required small">(Required)</span> </label>
												<input type="text" class="form-control" name="city" value="" />
											</div>
                                            <div class="col-md-6">
												<label>Country <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="country" value="" />
											</div>
                                            <div class="col-md-6">
												<label>Pincode <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="pincode" value="" />
											</div>
                                            <div class="col-md-6">
												<label>Username <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="username" value=""  id="username"/>
											</div>
										</li>
										
										<li class="row">
											<div class="col-md-6">
												<label>Password <span class="required small">(Required)</span></label>
												<input type="password" id="password" class="form-control" name="password" value="" />
											</div>
											<div class="col-md-6">
												<label>Confirm Password <span class="required small">(Required)</span></label>
												<input type="password" class="form-control" name="cpass" value="" />
											</div>
										</li>		

												
										<li class="row">
											<div class="col-md-6">
												<label>Captcha Code: <span class="required small"></span></label>
												<input type="text" class="form-control" readonly name="readcaptcha" id="readcaptcha" value="<?php echo $newuser; ?>" />
														<input type="hidden" name="captchahidden"  id="captchahidden" value="<?php echo $newuser; ?>"/>
											</div>
											<div class="col-md-6">
												<label>Please Enter Captcha Code <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="entercaptcha" id="entercaptcha" value="" onblur="changecaptcha();"/>
										
											</div>
										</li>		
										
												
										<li class="row">
											<div class="col-md-6">
												<label>Upload Your Photo </label>
												<input type="file" class="form-control"  name="dp" value="" />
											</div>
										</li>		
										
										<li class="row">
											<div class="col-md-12">
												<input type="submit" class="btn btn-primary btn-lg text-upper" name="login_submit" value="Register" />
												<span class="required small">*Your email will never published.</span>
											</div>
										</li>
									</ul>
								</fieldset>
							</form>
						</section>
						<!-- END #contactForm -->
					</div>
					<!-- END #page -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START footer -->
				
			<?php include 'header/bottom-footer1.php';?>
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