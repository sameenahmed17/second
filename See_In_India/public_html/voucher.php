<?php 

	session_start();
	include("include/functions.php");
    $obj = new functions();




$sql = mysql_query("select * from checkout where id='$_GET[booking_id]'");
	$details = mysql_fetch_array($sql);
		
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
	
	
	if($details['userid']!="")
	{
	$sql_users = mysql_query("select * from users where id='$details[userid]'");
	$users = mysql_fetch_array($sql_users);
	}
	else
	{
	$sql_users = mysql_query("select * from traveldetails where id='$details[travel_id]'");
	$users = mysql_fetch_array($sql_users);
	}
	
	$sql_wishlist = "select * from wishlist where id='$details[wishlist_id]'";
	$query = mysql_query($sql_wishlist);
	$result_wishlist = mysql_fetch_array($query);
	$date_wish = $result_wishlist['date'];
	$tourid = $result_wishlist['tour_id'];
	$adult = $result_wishlist['adult'];
	$child = $result_wishlist['child'];

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css/voucher.css" rel="stylesheet" type="text/css" />
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56111840-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body onload="window.print();">
	<div id="wrapper">
    	<div class="main">
	    <table width="70%" border="0" cellspacing="5" cellpadding="5" align="center">
              <tr>
                <td align="center" valign="middle"><h2>Thank you for booking a tour with us.</h2></td>
              </tr>
              <tr>
                <td align="center" valign="middle"><a href="#"><img src="images/print_button.png" width="87" height="36" /></a></td>
              </tr>
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
                                        <td> <?php echo $tours['nameof_tour'] ?></td>
                                      </tr>
                                      <tr>
                                        <td>No of <?php echo $type ?></td>
                                        <td>:</td>
                                        <td> <?php echo ($adult + $child) ?></td>
                                      </tr>
                                      <tr>
                                        <td>Date Selected</td>
                                        <td>:</td>
                                        <td><?php echo $date_wish ?></td>
                                      </tr>
                                      <tr>
                                        <td>Reference No</td>
                                        <td>:</td>
                                        <td><?php echo $details['booking_id'] ?></td>
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
                                        <td><?php echo $details['total_price'] ?>/- Only</td>
                                      </tr>
									  <?php } ?>
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
                                    <td align="center" valign="middle"><?php echo $details['booking_id'] ?></td>
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

</body>
</html>