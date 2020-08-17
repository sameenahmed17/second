<?php 
	
	include("include/functions.php");
    $obj = new functions();
	
	
	if(isset($_POST['submit_login']))
	{
    $obj->getLogin($_POST);
	}
	
	
	
	//facebook login
	
		//facebook
//session_start();
require 'facebook-php-sdk-master/src/facebook.php';
// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
  'appId'  => '1392416921048854',
  'secret' => '25ab2341baf370265160f1120d41cce2',
  // 'fields' => 'username',
  'cookie' => TRUE
  
));

// Get User ID
$user = $facebook->getUser();

// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
	
	
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}
// Login or logout url will be needed depending on current user state.
if ($user) {
			
			session_start();
			$_SESSION['email']=$user_profile['email'];
			 $_SESSION['username'] = $user_profile['email'];
			 $_SESSION['id'] = $user_profile['id'];
			
			//$username = $user_profile['username'];
			$username = $user_profile['email'];
			//$sql_users = mysql_query("select * from users where username='$_SESSION[username]'");
			$sql_users = mysql_query("select * from users where email='$_SESSION[username]'");
		
			 $_SESSION['username'];
		if(mysql_num_rows($sql_users) == 0 or mysql_num_rows($sql_users)==null) {			
			
			
			$firstname=$user_profile['first_name'];
			$lastname=$user_profile['last_name'];
			//$password="1234";
					
			//echo $lastname;
			//echo $firstname;
		    // $username=$_SESSION['MM_Username'];
			$transaction = time();
			mysql_select_db($database_chalopicnic, $chalopicnic);
			mysql_query("insert into users(firstname,lastname,email,username,source) values('$firstname','$lastname','$_SESSION[email]','$_SESSION[username]','Facebook')");
			//echo "insert into users(email,username,password)values('$email','$username','$password')";
			//$userid = mysql_insert_id();
			
			$table_cellpadding = "5";
			$table_cellspacing = "1";
			$table_background_color = "#000000";
			$table_left_column_color = "#ececec";
			$table_left_column_font = "arial";
			$table_left_column_font_size = "2";
			$table_left_column_font_color = "#000000";
			$table_right_column_color = "#ffffff";
			$table_right_column_font = "arial";
			$table_right_column_font_size = "2";
			$table_right_column_font_color = "#000000";
			 
			$mybody = "Your new account for seeinindia has been created. Your credentials are: <br/> Username: ".$_SESSION['username']."<br /> Password: ".$transaction;
	        // echo $mybody;
			// $to = 'info@newlinerestumping.com.au'.','.'mshaw@policrete.com.au';
			// $to = 'bhavik@innovins.com'.','.'atul@innovins.com';
			$to = $user_profile['email'];
			//echo $to;
			//$email = "noreply@tikona.in";
			//$email = $_POST['email'];
			
			$msg1 = 'Website Registration';
			$from = 'info@seeinindia.com';
			
			//Mail Body - Position, background, font color, font size...
			$body ='';
			//To send HTML mail, the Content-type header must be set:
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.$from. "\r\n";
			$bodys .= "$mybody <br>";
			$subject = "See In India - Account Created";
			$body = $body . $bodys;
			mail($to, $subject, $body, $headers);
			
} 
  header("location: index.php");
}
else {
  $statusUrl = $facebook->getLoginStatusUrl();
  $loginUrl = $facebook->getLoginUrl(array(
	'scope' => 'email'
  ));
}

// This call will always work since we are fetching public data.
//$naitik = $facebook->api('/naitik');
	
	
	//facebook login
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
								<h1 class="text-upper">Log In</h1>
							</section>
							
							<!-- breadcrumbs -->
							<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="index.php">Home</a></li>
									<li class="active">Log In</li>
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
						<!-- START #page -->
						<div id="page" class="col-md-12">					
							<!-- START #contactForm -->
							<section id="signin-form">
								<h2 class="ft-heading text-upper">Log In</h2>
								<form action="" method="post">
									<fieldset>
										<ul class="formFields list-unstyled">
											<li class="row">
												<div class="col-md-4">
													<label>Username <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="username" value="" />
												</div>
												<div class="col-md-4">
													<label>Password <span class="required small">(Required)</span></label>
													<input type="password" class="form-control" name="password" value="" />
													
												
												</div> 
												<div class="col-md-3" style="margin-top:22px;"> <span style="font-weight:bold;font-size:20px;">OR</span>&nbsp; &nbsp;&nbsp;
											   <a href="<?php echo $loginUrl; ?>"><img src="images/face_login.png" width="196" height="40"></a></div>
											
												
												
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
						</div>
						<!-- END #page -->					
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START footer -->
			<?php include 'header/bottom-footer.php';?>
		</div>
		<!-- END #wrapper -->
				
		<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
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