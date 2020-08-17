<?php 
	session_start();
	include("include/functions.php");
    $obj = new functions();
	
	//functionality
	$sql = mysql_query("select * from checkout where id='$_REQUEST[id]'");
	$details = mysql_fetch_array($sql);
	
	$booking_id = time();
	//mysql_query("update checkout set booking_id='$booking_id' where id='$x[id]'");
	mysql_query("update checkout set booking_id='$booking_id' where id='$_REQUEST[id]'");
	
	$sql_tours = mysql_query("select * from tours where id='$details[tour_id]'");
	$tours = mysql_fetch_array($sql_tours);
	
	if($tours['tour_type'] == 'Per Person') {
		$type = 'Traveler';
	}
	
	if($tours['tour_type'] == 'Per Vehicle') {
		$type = 'Vehicle';
	}
	
	if($tours['tour_type'] == 'Per Group') {
		$type = 'Group';
	}
	
	$sql_supplier = mysql_query("select * from suppliersadmin where id='$tours[supplier_id]'");
	$supplier = mysql_fetch_array($sql_supplier);
	
	//$check=mysql_query("select * from users where username='$_SESSION[MM_Username]'");
	$check=mysql_query("select * from users where username='$details[username]'");
	$rows=mysql_num_rows($check);
	if($rows>0)
	{
	$sql_users = mysql_query("select * from users where id='$details[userid]' and username='$details[username]'");
	$users = mysql_fetch_array($sql_users);
	$_SESSION['MM_Username']=$users['username'];
	} else
	{
	$sql_users = mysql_query("select * from traveldetails where id='$details[travel_id]' and username='$details[username]'");
	$users = mysql_fetch_array($sql_users);
	$_SESSION['MM_Username']=$users['username'];
	}
	
	
	$wishlist_id = explode(',', $details['wishlist_id']);
	foreach($wishlist_id as $i) {
		$sql_wishlist = "select * from wishlist where id='$i'";
		$query = mysql_query($sql_wishlist);
		$result_wishlist = mysql_fetch_array($query);
		$date_wish = $result_wishlist['date'];
		$tourid = $result_wishlist['tour_id'];
		$adult = $result_wishlist['adult'];
		$child = $result_wishlist['child'];
		
		$date = date('j-n-Y', strtotime($date_wish));
		$explode_date = explode("-",$date);
		
		$sql_avail = mysql_query("select * from availability where tour_id='$tourid' and d='$explode_date[0]' and m='$explode_date[1]' and y='$explode_date[2]'");
		
		$row_avail = mysql_fetch_array($sql_avail);
		$avail_id = $row_avail['id'];
		$a_adult = $row_avail['adults_availability'];
		$a_child = $row_avail['child_availability'];
		
		$adult_update = $a_adult - $adult;
		$child_update = $a_child - $child;
		
		$sql_update = mysql_query("update availability set adults_availability = '$adult_update',child_availability='$child_update' where id='$avail_id'");
	}
	
	
	
	//functionality
	
	// coupon in email
	
	$mybody.='<div class="main">';
	
	$mybody.='<table width="70%" border="0" cellspacing="5" cellpadding="5" align="center">
			 <tr>
			 <td align="center" valign="middle"><h2>Thank you for booking a tour with us. </h2></td>
			 </tr>';
			  
	$mybody.='<tr>
			  <td>
			  <div class="first">
			  <table width="100%" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			  <td>';
	 $mybody.='<table width="100%" border="0" cellspacing="0" cellpadding="0">
		     <tr>
			 <td width="46%">Name of the Traveller</td>
			 <td width="3%">:</td>
			 <td width="51%">'.$users['firstname'].' '.$users['lastname'].'</td>
		     </tr>';
                                     
	$mybody.='<tr>
		   <td>Name of the tour</td>
		   <td>:</td>
		   <td>'.$tours['nameof_tour'].'</td>
	       </tr>';
                                      
	  $mybody.='<tr>
		  <td>No of '. $type.'</td>
		  <td>:</td>
		  <td>'.($adult + $child).'</td>
	     </tr>';
                                      
	  $mybody.='<tr>
		 <td>Date Selected</td>
		 <td>:</td>
	     <td>'.$date_wish.'</td>
         </tr>';
	 $mybody='<tr>
		<td>Reference No</td>
		<td>:</td>
		<td>'.$booking_id.'</td>
	    </tr>';
                                      
     $mybody='<tr>
		<td>Event Location</td>
		<td>:</td>
		<td>'.$tours['departurepoint'].'</td>
	    </tr>';
	
	  $mybody.='<tr>
		<td>Supplier Name</td>
		<td>:</td>
		<td>'.$tours['companyname'].'</td>
	   </tr>
	   <tr>
		<td>Supplier contact no.</td>
		<td>:</td>
		<td>'.$supplier['mobile'].'</td>
	   </tr>';
		  
        if($details['userid']!="") {
	  $mybody.='<tr>
		<td>Amount</td>
		<td> 	:</td>
		<td>'.$details['total_price'].'/- Only</td>
	  </tr>';
								  } 
		$mybody.='<tr>
		<td>Tour Type</td>
		<td>:</td>
		<td>.'.$tours['tour_type'].'</td>
		</tr>
		</table>

		</td>
		<td><table width="30%" border="0" cellspacing="0" cellpadding="0">
		<tr>
		<td><img src="images/logo123.png" width="123" height="55" /></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>
		<tr>
		<td><img src="images/barcode.png" width="123" height="55" /></td>
		</tr>
		<tr>
		<td>&nbsp;</td>
		</tr>';
		
		$mybody.='<tr>
		<td align="center" valign="middle">'.$booking_id .'</td>
		</tr>
		</table>
		</td>
		</tr>
		</table>
		</div>
		</td>
		</tr>
		<tr>
		<td>';
   	                  
					  $mybody.='<div class="second">
                    	<h4>Passenger Details</h4>
                        <ul>';
						
						if($details['userid']!="")
								{
										$sql_passenger = mysql_query("select * from passenger_details where checkout_id='$details[id]' and userid='$details[userid]'");
										$i = 1;
										while($passenger = mysql_fetch_array($sql_passenger)) {
                                    	 $mybody.="<li>".$i++.". ".$passenger['fname']." ".$passenger['lname']."</li>";
										}
								} else
								{
										$sql_passenger = mysql_query("select * from passenger_details where checkout_id='$details[id]' and travelid='$details[travel_id]'");
										$i = 1;
										while($passenger = mysql_fetch_array($sql_passenger)) {
										$mybody.="<li>".$i++.". ".$passenger['fname']." ".$passenger['lname']."</li>";
										}
								
								}
						
						

					$mybody.='</ul>
					<h4>Description</h4>
					<p><img src="adminimages/cityplace/'.$tours['picturegallery1'].'" width="204" height="134" /><strong>Voucher Information : </strong>You can present either a paper or an electronic voucher for this activity. <br /><br />
					<strong>Additional Info:</strong>'. strip_tags($tours['importantnote']).' <br />
					<br />
					<strong>Signature:<br />
					X</strong> ';
					
					
					$mybody.='<div class="middle">This voucher is not valid until signed by the Lead Traveler listed above, and presented at the start of the tour, attraction or activity along with valid photo identification bearing the name of the Lead Traveler.</div>

					<p><strong>Inclusions:</strong><br />
					'.$tours['inclusions'].'
					</p>
					</div>
					</td>
					</tr>
					<tr>
					<td>&nbsp;</td>
					</tr>
					<tr>
					<td>&nbsp;</td>
					</tr>
					</table>
					</div>';
	
//	echo $mybody;

	
	// coupon in email
	
	
	
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>See In India</title>


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
		
		
		
<link href="css/voucher.css" rel="stylesheet" type="text/css" />
</head>



<?/* echo $mybody;
die(); */

?>
<body>
	<!-- START #top-header -->
					<?php include 'header/top-header.php'; ?>
				<!-- END #top-header -->
	
	<!-- START header -->
	
			<header>
				
				
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
	<div id="wrapper">
    	<div class="main">
	    <table width="70%" border="0" cellspacing="5" cellpadding="5" align="center">
              <tr>
                <td align="center" valign="middle"><h2>Thank you for booking a tour with us. </h2></br><h4>You will a also a receive this coupon in your registered email id.</h4></td>
              </tr>
              <!--tr>
                <td align="center" valign="middle"><a href="#"><img src="images/print_button.png" width="87" height="36" /></a></td>
              </tr-->
              <tr>
                <td>
                	<div class="first">
                    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td>
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                      <tr>
                                        <td width="46%">Name of the Traveller</td>
                                        <td width="3%">:</td>
                                        <td width="51%"><?php echo $users['firstname'].' '.$users['lastname'] ?></td>
                                      </tr>
                                      <tr>
                                        <td>Name of the tour</td>
                                        <td>:</td>
                                        <td><?php echo $tours['nameof_tour'] ?></td>
                                      </tr>
                                      <tr>
                                        <td>No of <?php echo $type ?></td>
                                        <td>:</td>
                                        <td><?php echo ($adult + $child) ?> </td>
                                      </tr>
                                      <tr>
                                        <td>Date Selected</td>
                                        <td>:</td>
                                        <td><?php echo $date_wish ?></td>
                                      </tr>
                                      <tr>
                                        <td>Reference No</td>
                                        <td>:</td>
                                        <td> <?php echo $booking_id ?></td>
                                      </tr>
                                      <tr>
                                        <td>Event Location</td>
                                        <td>:</td>
                                        <td><?php echo $tours['departurepoint'] ?></td>
                                      </tr>
                                      <tr>
                                        <td>Supplier Name</td>
                                        <td>:</td>
                                        <td><?php echo $tours['companyname'] ?></td>
                                      </tr>
                                      <tr>
                                        <td>Supplier contact no.</td>
                                        <td>:</td>
                                        <td><?php echo $supplier['mobile'] ?></td>
                                      </tr>
									    <?php if($details['userid']!="") { ?>
                                      <tr>
                                        <td>Amount</td>
                                        <td> 	:</td>
                                        <td> <?php echo $details['total_price'] ?>/- Only</td>
                                      </tr>
									  <? } ?>
                                      <tr>
                                        <td>Tour Type</td>
                                        <td>:</td>
                                        <td><?php echo $tours['tour_type'] ?></td>
                                      </tr>
                                    </table>

                            </td>
                            <td><table width="30%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td><img src="images/logo123.png" width="123" height="55" /></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td><img src="images/barcode.png" width="123" height="55" /></td>
                                  </tr>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td align="center" valign="middle"><?php echo $booking_id ?></td>
                                  </tr>
                                </table>
                                </td>
                          </tr>
                        </table>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
   	  <div class="second">
                    	<h4>Passenger Details</h4>
                        <ul>
						<?php 
						if($details['userid']!="")
								{
										$sql_passenger = mysql_query("select * from passenger_details where checkout_id='$details[id]' and userid='$details[userid]'");
										$i = 1;
										while($passenger = mysql_fetch_array($sql_passenger)) {
                                    		echo "<li>".$i++.". ".$passenger['fname']." ".$passenger['lname']."</li>";
										}
								} else
								{
										$sql_passenger = mysql_query("select * from passenger_details where checkout_id='$details[id]' and travelid='$details[travel_id]'");
										$i = 1;
										while($passenger = mysql_fetch_array($sql_passenger)) {
                                    		echo "<li>".$i++.". ".$passenger['fname']." ".$passenger['lname']."</li>";
										}
								
								}
						
						?>
                       	  <!--li>Jagi Rajesh</li>
                          <li>Jagi Bhupati</li>
                          <li>Jagi Munny</li>
                          <li>Jagi Ramesh</li-->
                        </ul>
                        <h4>Description</h4>
                <p><img src="adminimages/cityplace/<?php echo $tours['picturegallery1'] ?>" width="204" height="134" /><strong>Voucher Information : </strong>You can present either a paper or an electronic voucher for this activity. <br /><br />
	<strong>Additional Info:</strong><?php echo strip_tags($tours['importantnote']) ?> <br />
    <br />
<strong>Signature:<br />
X</strong> 
		    <div class="middle">This voucher is not valid until signed by the Lead Traveler listed above, and presented at the start of the tour, attraction or activity along with valid photo identification bearing the name of the Lead Traveler.</div>
                
                <p><strong>Inclusions:</strong><br />
<?php echo $tours['inclusions'] ?>
            </p>
                </div>
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table>
        </div>
		
		
    </div>
	<!-- START footer -->
				<?php include 'header/bottom-footer.php';?>
			<!-- END footer -->
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