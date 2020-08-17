
<?php 
	//session_start();
	include("include/functions.php");
    $obj = new functions();

	
	if(isset($_SESSION['username'])) { 
	
	$user_exists = $obj->userexists($_SESSION['username']);
	if($user_exists>0)
	{
    $user_profile = $obj->getUserProfile($_SESSION['username']);
	$who_is = "user";
	} 
	else
	{
		$user_profile = $obj->gettravelUserProfile($_SESSION['username']);
		$who_is = "travel";
	}
	}
	
	if(isset($_POST['profile_updated'])) {
	
	echo "<script>alert('Your Profile Successfully Updated')</script>";
	}
	
	
	 if(isset($_POST['firstname'])) { 
	
	 $obj->userRegisterEdit($_POST, $_FILES, $_SESSION['username']);
	
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

		<? if($who_is=="user") { ?>
<script>
    $().ready(function() {
        // validate the comment form when it is submitted
        $("#register-form1").validate({	
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
								url: "searchuserajaxsession1.php",
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
								url: "searchuserajaxsession.php",
								type: "post",
								data: {
									username: function() {
										return $("#username").val();
									}
								}
							}
				},
				entercaptcha: {
					required: true,
					equalTo:"#captchahidden"
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
				entercaptcha: {
					required: "Please Enter Captcha Code",
					entercaptcha:"Enter Above matching Captcha code"
				}
							
            }
			
						
			
        });
						
    });
</script>

<? } else { ?>


<script>
    $().ready(function() {
        // validate the comment form when it is submitted
        $("#register-form1").validate({	
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
								url: "travelsearchuserajaxsession1.php",
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
								url: "travelsearchuserajaxsession.php",
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
				dp: {
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
				dp: {
					required: "Please Upload Your Photo"
				}
				
							
            }
			
						
			
        });
						
    });
</script>

<? } ?>

		
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
						<section id="signup-form">
							<h2 class="ft-heading text-upper">Create New Account</h2>
							<form method="post" enctype="multipart/form-data" id="register-form1" name="register-form" >
								<fieldset>
									<ul class="formFields list-unstyled">
										<li class="row">
											<div class="col-md-6">
												<label>First Name <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="firstname" value="<?php echo $user_profile['firstname']?>" />
											</div>
                                            <div class="col-md-6">
												<label>Last Name <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="lastname" value="<?php echo $user_profile['lastname']?>" />
											</div>
                                            <div class="col-md-6">
												<label>Mobile <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="mobile" value="<?php echo $user_profile['mobile']?>" />
											</div>
                                            <div class="col-md-2">
												<label>Telephone <span class="required small"></span></label>
												<input type="text" maxLength="3" class="form-control" name="country_code" placeholder="Country code" value="<?php echo $user_profile['country_code']?>"/>
												<input type="hidden" name="who_is" value="<? echo $who_is; ?>">
											</div>
											
											  <div class="col-md-2">
												<label>&nbsp;&nbsp; <span class="required small"></span></label>
												<input type="text" maxLength="3" class="form-control" name="area_code"  placeholder="Area code" value="<?php echo $user_profile['area_code']?>"/>
											</div>
											
											 <div class="col-md-2">
												<label>&nbsp;&nbsp;<span class="required small"></span></label>
												<input type="text" maxLength="7" class="form-control" name="contact"  placeholder="Telephone no." value="<?php echo $user_profile['contact']?>"/>
											</div>
											
											
											<div class="col-md-6">
												<label>Email <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="email" value="<?php echo $user_profile['email']?>" id="email"  />
											</div>
                                            <div class="col-md-6">
												<label>Address<span class="required small">(Required)</span> </label>
												<input type="text" class="form-control" name="address" value="<?php echo $user_profile['address']?>" />
											</div>
                                            <div class="col-md-6">
												<label>City<span class="required small">(Required)</span> </label>
												<input type="text" class="form-control" name="city" value="<?php echo $user_profile['city']?>" />
											</div>
                                            <div class="col-md-6">
												<label>Country <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="country" value="<?php echo $user_profile['country']?>" />
											</div>
                                            <div class="col-md-6">
												<label>Pincode <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="pincode" value="<?php echo $user_profile['pincode']?>" />
											</div>
                                            <div class="col-md-6">
												<label>Username <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="username" value="<?php echo $user_profile['username']?>"  id="username"/>
											</div>
										</li>
										
										<li class="row">
											<div class="col-md-6">
												<label>Password <span class="required small">(Required)</span></label>
												<input type="text" class="form-control" name="password" value="<?php echo $user_profile['password']?>" />
											</div>
											
										</li>		

												
										
												
										<li class="row">
											<div class="col-md-6">
												<label>Want To change Your Photo <span class="required small"></span></label>
												<input type="file" class="form-control"  name="dp1"  />
											</div>
												<div class="col-md-6">
												<label>Your Photo: <span class="required small"></span></label>
												<?php
												$file_name = str_replace('', '-', strtolower( pathinfo($user_profile['dp'], PATHINFO_FILENAME)) );
												$ext = pathinfo($user_profile['dp'], PATHINFO_EXTENSION);
												?>
												<?php $facebook = mysql_query("select * from users where username='$_SESSION[username]'");
												      $is_facebook = mysql_fetch_array($facebook);
												?>
												<? if($file_name=="") { ?>
												<?php if($is_facebook['source']=="Facebook") { ?>
												<img src='http://graph.facebook.com/<?php echo $_SESSION['id']?>/picture?type=large' width="100" height="100px"/>
												<?php } else { ?>
												 <img src="images/download.jpg" width="100" height="100px">
												<?php } ?>
											   <?php } else { ?>
											 
											    <img src="admin/images/dp/<?php  echo $file_name."_large.".$ext;?>" width="100" height="100px">
												<? } ?>
											   
											</div>
										</li>		
										
										<li class="row">
											<div class="col-md-12">
												<input type="submit" class="btn btn-primary btn-lg text-upper" name="update_submit1" value="Register" />
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