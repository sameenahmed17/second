<?php 
session_start();

?><head>

<script>
function validate1()
	{
	//alert('hi');
	 var search_header=document.forms["search_from_header"]["search_header"].value;
	//alert(search_header);
	 
		if((search_header==null || search_header==''))
		{
		return false;
		search.search_header.focus(); 
		
		}
	}
	</script>
	</head>


<div id="top-header">
					<div class="container">
						<div class="row top-row">
							<div class="col-md-6">
								<div class="left-part alignleft">
									<span class="contact-email small"><a href="mailto:contactus@seeinindia.com">contactus@seeinindia.com</a></span>
									<span class="contact-phone small">+91 712 6094333</span>
									<ul class="social-media header-social">
										<!--<li><a class="sm-yahoo" href="#"><span>Yahoo</span></a></li>-->
										<li><a class="sm-facebook" href="https://www.facebook.com/pages/Seeinindia/810475725669640" target="_blank"><span>Facebook</span></a></li>
										<li><a class="sm-twitter" href="https://twitter.com/seeinindia" target="_blank"><span>Twitter</span></a></li>
										<li><a class="sm-pinterest" href="http://www.pinterest.com/seeinindia/" target="_blank"><span>Pinterest</span></a></li>
										<li><a class="sm-wordpress" href="http://seeinindia.wordpress.com/" target="_blank"><span>Wordpress</span></a></li>
										<!--<li><a class="sm-linkedin" href="http://in.linkedin.com/pub/seein-india/a4/68a/672" target="_blank"><span>Linkedin</span></a></li>-->
										<li><a class="sm-youtube" href="http://www.youtube.com/watch?v=2rWzfHOCMLA" target="_blank"><span>youtube</span></a></li>
										<li><a class="sm-google" href="https://plus.google.com/115928427877200072580" target="_blank"><span>google</span></a></li>
									<li><a class="sm-app" href="https://play.google.com/store/apps/details?id=com.seeinindia.app" target="_blank"><span>Download our App</span></a></li>	
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-part" align="right" style="width:122%">
									<form onsubmit="return validate1();" action="search1.php"  name="search_from_header" method="post" >
										<fieldset class="alignright">
											<input type="text" name="search_header" class="search-input" value="" placeholder="Search.."  />
											<input type="submit" name="submit_header_search" class="search-submit" value="" />
										</fieldset>
									</form>
                                    
									<?php if(isset($_SESSION['username'])) { ?>
									<span class="top-link small">Hi,&nbsp;&nbsp;<?php echo $_SESSION['username']; ?></span>
									<span class="top-link small"><a href="review.php">Give us Review</a></span>
									<span class="top-link small"><a href="edit-profile.php">Edit Profile</a></span>
									<span class="top-link small"><a href="booking.php">View My Bookings</a></span>
									<span class="top-link small"><a href="logout.php">Logout</a></span>
									
									
									
									<?php } else { ?>
									<span style="float:right;">
									<span class="top-link small" align="right"><a href="login.php">Log In</a></span>
									<span class="top-link small"><a href="register.php">Register</a></span>
									</span>
									<?php  } ?>
									
								</div>
							</div>
						</div>
					</div>
				</div>