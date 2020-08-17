<?php
//require_once('Connections/chalopicnic.php');
//	mysql_select_db($database_chalopicnic, $chalopicnic);
if(isset($_POST['btn']) and ($_POST['btn']!='')) {
		$email = $_POST['email'];
	
		
			$result=mysql_query("select * from newsletter where email='$email'");
		 $res=mysql_fetch_array($result);
			if($res['email']!="")
			{
				echo "<script>alert('You are Already Subscribed for newsletter');</script>";
			}
			else {
			mysql_query("insert into newsletter(email) values('$email')");
		echo '<script type="text/javascript">alert("You are successfully subscribed to the newsletter")</script>';
		}
	}
?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56111840-1', 'auto');
  ga('send', 'pageview');

</script>
<script>
		function valid()
{   
//alert("sfh");
var x=document.getElementById('emailvalid').value;
//alert(x);
var atpos=x.indexOf("@");
var dotpos=x.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
  {
  alert("Not a valid e-mail address");
 // window.location="index.php";
  return false;
  }
}
	
	
	</script>

<!-- START footer -->
			<footer>
				<!-- START #ft-footer -->
				<div id="ft-footer">
					<div class="footer-overlay">
						<div class="container">
							<div class="row">
								<!-- testimonials -->                                
                                        <section class="col-md-6"> 
                                        <div class="carousel">
										<? $review = $obj->getReview();?>
											<ul class="slides">
										<? while($review_result = mysql_fetch_array($review)) { ?>	
                                        		<li>                                           
                                                    <h3>Testimonials</h3>
                                                    <p><? echo $review_result['comments']?></p>
													<? $user_id = $obj->getUserid($review_result['user_id']); ?>
													<label><span class="required small"></span></label>
													<?php
													$file_name = str_replace('', '-', strtolower( pathinfo($user_id['dp'], PATHINFO_FILENAME)) );
													$ext = pathinfo($user_id['dp'], PATHINFO_EXTENSION);
													?>
                                                    <div class="tl-author">
                                                        <span class="tl-author-img">
															<? if($file_name!="") { ?>
                                                            <img class="img-circle" src="admin/images/dp/<?php  echo $file_name."_small.".$ext;?>" alt="Testimonial Author" />
															<?php } else { ?>
															  <img class="img-circle" src="images/download.jpg" width="90" height="80">
															 <?php } ?>
                                                        </span>
                                                        <span class="tl-author-title"><? echo $user_id['firstname']." ". $user_id['lastname'];?></span>
                                                        
                                                    </div>
                                            	</li>
										<? } ?>		
                                                <!--li>                                           
                                                    <h3>Testimonials1</h3>
                                                    <p>Tortor turpis. Proin. Dolor. Auctor arcu, habitasse mid placerat magna? Dis ac, adipiscing? Cras mus dolor sit a? 
                                                    Platea eros dictumst ridiculus sed phasellus, rhoncus magnis a pellentesque pulvinar duis purus risus tristique 
                                                    ultricies natoque, nec! Natoque natoque cum? Nec, placerat sociis! Sit ut, scelerisque? placerat sociis! Sit ut, 
                                                    scelerisque? Urna ut aliquam duis et scelerisque,</p>
                                                    <div class="tl-author">
                                                        <span class="tl-author-img">
                                                            <img class="img-circle" src="img/tl-author-photo1.jpg" alt="Testimonial Author" />
                                                        </span>
                                                        <span class="tl-author-title">Jassem Elrakesh</span>
                                                        <span class="tl-author-desc">Visited Barcelona recently</span>
                                                    </div>
                                            	</li>
                                                <li>                                           
                                                    <h3>Testimonials2</h3>
                                                    <p>Tortor turpis. Proin. Dolor. Auctor arcu, habitasse mid placerat magna? Dis ac, adipiscing? Cras mus dolor sit a? 
                                                    Platea eros dictumst ridiculus sed phasellus, rhoncus magnis a pellentesque pulvinar duis purus risus tristique 
                                                    ultricies natoque, nec! Natoque natoque cum? Nec, placerat sociis! Sit ut, scelerisque? placerat sociis! Sit ut, 
                                                    scelerisque? Urna ut aliquam duis et scelerisque,</p>
                                                    <div class="tl-author">
                                                        <span class="tl-author-img">
                                                            <img class="img-circle" src="img/tl-author-photo2.jpg" alt="Testimonial Author" />
                                                        </span>
                                                        <span class="tl-author-title">Jassem Elrakesh</span>
                                                        <span class="tl-author-desc">Visited Barcelona recently</span>
                                                    </div>
                                            	</li-->
                                            </ul>
											<div class="btn btn-primary text-upper">Subscribe for Newsletter &nbsp;&nbsp;&nbsp;
											<form name="news" method="Post" action="" onsubmit="return valid();">
											<input type="email" name="email"  id="emailvalid">
											<input type="submit" name="btn" value="Submit">
											</form>
											</div>
                                        </div>
                                        </section>
                                        
								
								<!-- twitter -->
								<section class="col-md-6">
									<h3 class="tw-feeds">Twitter Feeds</h3>
									<p><a class="twitter-timeline"  href="https://twitter.com/seeinindia" data-widget-id="516811887241990145">Tweets by @seeinindia</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
								</section>
							</div>
						</div>
					</div>
				</div>
				<!-- END #ft-footer -->
				
				<!-- START #ex-footer -->
				<div id="#ex-footer">
					<div class="container">
						<div class="row">
							<nav class="col-md-12">
								<ul class="footer-menu">
									<!--<li><a href="#">Best Rate Guarntee</a></li>
									<li><a href="#">Careers</a></li>-->
									<li><a href="website_terms.php">Website Terms of Use</a></li>
									<li><a href="privacy_statement.php">Privacy Statement</a></li>
									<li><a href="travel-login.php">Travel Agent Login</a></li>
                                    <li class="last-item">
										<a href=" https://play.google.com/store/apps/details?id=com.seeinindia.app" target="_blank">
											<img src="images/getinongoogleplay.jpg" alt="Download App from Play Store" width="100"/>
										</a>
									</li>
									<!--<li class="last-item"><a href="#">Top Destinations</a></li>-->
								</ul>
							</nav>
							
							<div class="foot-boxs">
								<div class="foot-box col-md-4 text-right">
									<span>Stay Connected</span>
									<ul class="social-media footer-social">
										<!--<li><a class="sm-yahoo" href="#"><span>Yahoo</span></a></li>-->
										<li><a class="sm-facebook" href="https://www.facebook.com/pages/Seeinindia/810475725669640" target="_blank"><span>Facebook</span></a></li>
										<li><a class="sm-twitter" href="https://twitter.com/seeinindia" target="_blank"><span>Twitter</span></a></li>
										<li><a class="sm-pinterest" href="http://www.pinterest.com/seeinindia/" target="_blank"><span>Pinterest</span></a></li>
										<!--<li><a class="sm-linkedin" href="http://in.linkedin.com/pub/seein-india/a4/68a/672" target="_blank"><span>Linkedin</span></a></li>-->
										<li><a class="sm-wordpress" href="http://seeinindia.wordpress.com/" target="_blank"><span>Wordpress</span></a></li>
										<li><a class="sm-youtube" href="http://www.youtube.com/watch?v=2rWzfHOCMLA" target="_blank"><span>youtube</span></a></li>
										<li><a class="sm-google" href="https://plus.google.com/115928427877200072580" target="_blank"><span>Google Plus</span></a></li>
										
									</ul>
								</div>
								<div class="foot-box foot-box-md col-md-4">
									<span class="contact-email"> <a href="mailto:contactus@seeinindia.com">contactus@seeinindia.com</a></span>
									<span class="contact-phone">+91 712 6094333</span>
								</div>
								<div class="foot-box col-md-4">
									<span class="">&copy; 2014 See In India. All Rights Reserved.</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END #ex-footer -->
			</footer>
			<!-- END footer -->