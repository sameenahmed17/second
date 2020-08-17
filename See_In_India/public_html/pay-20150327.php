<?php 
		//error_reporting();
		session_start();
		include("include/functions.php");
		$obj = new functions();
	
	
		$pass_fname = array();
		$pass_lname = array();
		foreach($_REQUEST['pass_fname'] as $pf){
			array_push($pass_fname, $pf);
		}
		foreach($_REQUEST['pass_lname'] as $pl){
			array_push($pass_lname, $pl);
		}
		$size = sizeof($pass_fname);
	
	if(isset($_REQUEST['firstname'])) {
		$id = array();
		$wishlist_id = implode(',', $_REQUEST['id']);
		foreach($_REQUEST['id'] as $i) {
			$sql_wishlist = "select * from wishlist where id='$i'";
			$query = $obj->query($sql_wishlist);
			$result_wishlist = mysql_fetch_array($query);
			$date_wish = $result_wishlist['date'];
			$tourid = $result_wishlist['tour_id'];
			$adult = $result_wishlist['adult'];
			$child = $result_wishlist['child'];
		}
		$fname = $_REQUEST['firstname'];
		$lname = $_REQUEST['lname'];
		$email = $_REQUEST['email'];
		$mobile = $_REQUEST['mobile'];
		$country_code = $_REQUEST['country_code'];
		$area_code = $_REQUEST['area_code'];
		$contact = $_REQUEST['contact'];
		$addr = $_REQUEST['address'];
		$country = $_REQUEST['country'];
		$city = $_REQUEST['city'];
		$pincode = $_REQUEST['pincode'];
		$total = $_REQUEST['total'];
		$gtotal = $_REQUEST['total2'];
		
		$tour_amt = $_REQUEST['tour_amt'];
		$processing_fee = $_REQUEST['processing_fee'];
		$service_tax = $_REQUEST['service_tax'];
		
		//$sid = $_SESSION['session_id'];
		$sid = time();
		
		$transaction = time();
		$sql_users = $obj->query("select * from users where username='$_SESSION[username]'");
		
		$sql_users1 =$obj->query("select * from traveldetails where username='$_SESSION[username]'");


		if((mysql_num_rows($sql_users) == 0) and (mysql_num_rows($sql_users1) == 0)) {
		
			function randomuser($len = 8)
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
			$username=randomuser(10);
			

		
		//$username=$fname.$lname;
			$obj->query("insert into users(firstname, lastname, mobile, country_code, area_code, contact, email, address, city, country, pincode, username, password,source) values('$fname', '$lname', '$mobile', '$country_code', '$area_code', '$contact', '$email', '$addr', '$city', '$country', '$pincode', '$username', '$transaction','Website')");
			
			
			$userid = mysql_insert_id();
			
			$_SESSION['username'] = $username;
			
			
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
			 
			$mybody = "Your new account for seeindia.com has been created. Your credentials are: <br/> Username: ".$username."<br /> Password: ".$transaction.". You can change your username and password by login to seeinindia.com";
	
			// $to = 'info@newlinerestumping.com.au'.','.'mshaw@policrete.com.au';
			// $to = 'bhavik@innovins.com'.','.'atul@innovins.com';
			$to = $email;
			//$email = "noreply@tikona.in";
			//$email = $_POST['email'];
			
			$msg1 = 'Website Enquiry';
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
		else {
			if(mysql_num_rows($sql_users)>=1)
			{
			
			
			
			
			$obj->query("update users set firstname='$fname', lastname='$lname', mobile='$mobile', country_code='$country_code',  area_code='$area_code', contact='$contact', email='$email',  address='$addr',  city='$city', country='$country', pincode='$pincode' where username='$_SESSION[username]'");
			$user = mysql_fetch_array($sql_users);
			$userid = $user['id'];
			//$_SESSION['MM_Username'] = $email;
			$_SESSION['username'] = $user['username'];
			}
			else{
			$obj->query("update traveldetails set firstname='$fname', lastname='$lname', mobile='$mobile', country_code='$country_code',  area_code='$area_code', contact='$contact', email='$email',  address='$addr',  city='$city', country='$country', pincode='$pincode' where username='$_SESSION[username]'");
			
			$user = mysql_fetch_array($sql_users1);
			$userid = $user['id'];
			//$_SESSION['MM_Username'] = $email;
			$_SESSION['username'] = $user['username'];
			}
		}
		
		$to_session=$obj->query("select * from users where username='$_SESSION[username]'");
		$user_session=mysql_fetch_array($to_session);
		$totravel_session=$obj->query("select * from traveldetails where username='$_SESSION[username]'");
		$travel_session=mysql_fetch_array($totravel_session);
		if(($user_session['username']!="") and ($travel_session['username']==""))
		{
		
		$obj->query("insert into checkout(firstname, lastname, email, address, mobile, country_code, area_code, contact, country, city, pincode, price, processing_fee, service_tax, total_price,trid, tour_id, userid, username, wishlist_id, session_id) values('$fname','$lname','$email','$addr','$mobile', '$country_code', '$area_code', '$contact', '$country','$city','$pincode', '$tour_amt', '$processing_fee', '$service_tax','$gtotal','$transaction', '$tourid', '$userid', '$_SESSION[username]', '$wishlist_id', '$sid')");
		$uid = mysql_insert_id();	
		$select = $obj->query("select * from checkout where id='$uid'");
		$details = mysql_fetch_array($select);
		for($j=0; $j<$size; $j++) {
		$sql_insert = "insert into passenger_details(fname, lname, checkout_id, userid) values('$pass_fname[$j]', '$pass_lname[$j]', '$details[id]', '$userid')";
		$obj->query($sql_insert);
		}
		}
		else
		{
		$obj->query("insert into checkout(firstname, lastname, email, address, mobile, country_code, area_code, contact, country, city, pincode, price, processing_fee, service_tax, total_price,trid, tour_id, travel_id, username, wishlist_id, session_id) values('$fname','$lname','$email','$addr','$mobile', '$country_code', '$area_code', '$contact', '$country','$city','$pincode', '$tour_amt', '$processing_fee', '$service_tax','$gtotal','$transaction', '$tourid', '$userid', '$_SESSION[username]', '$wishlist_id', '$sid')");
		$uid = mysql_insert_id();	
		$select = $obj->query("select * from checkout where id='$uid' and travel_id='$userid'");
		$details = mysql_fetch_array($select);
		for($j=0; $j<$size; $j++) {
		$sql_insert = "insert into passenger_details(fname, lname, checkout_id, travelid) values('$pass_fname[$j]', '$pass_lname[$j]', '$details[id]', '$userid')";
		$obj->query($sql_insert);
		}
		}
		//mysql_query("delete from wishlist where session_id='$_SESSION[session_id]'");
		//@session_destroy();

		/* if($user_session['username']!="")
		{
		$select = mysql_query("select * from checkout where id='$uid'");
		$details = mysql_fetch_array($select);
		}
		
		if($travel_session['username']!="")
		{
		$select = mysql_query("select * from checkout where travel_id='$uid'");
		$details = mysql_fetch_array($select);
		}
		 */
	}
	
	else if(isset($_SESSION['username'])) {
		$id = array();
		$wishlist_id = implode(',', $_REQUEST['id']);
		foreach($_REQUEST['id'] as $i) {
			$sql_wishlist = "select * from wishlist where id='$i'";
			$query = $obj->query($sql_wishlist);
			$result_wishlist = mysql_fetch_array($query);
			$date_wish = $result_wishlist['date'];
			$tourid = $result_wishlist['tour_id'];
			$adult = $result_wishlist['adult'];
			$child = $result_wishlist['child'];
		}
		//$username = $_SESSION['MM_Username'];
		
		$sql = $obj->query("select * from users where username = '$_SESSION[username]'");
		//$users = mysql_fetch_array($sql);
		$rows=mysql_num_rows($sql);
		if($rows>0)
		{
			$users = mysql_fetch_array($sql);
		}
		else{
			$sql1 = $obj->query("select * from traveldetails where username = '$_SESSION[username]'");
			$users = mysql_fetch_array($sql);
		}
		$firstname = $users['firstname'];
		$lastname = $users['lastname'];
		$email = $users['email'];
		$mobile = $users['mobile'];
		$country_code = $users['country_code'];
		$area_code = $users['area_code'];
		$contact = $users['contact'];
		$addr = $users['address'];
		$country = $users['country'];
		$city = $users['city'];
		$pincode = $users['pincode'];
		$total = $_REQUEST['total'];
		$gtotal = $_REQUEST['total2'];
		$sid = $_SESSION['session_id'];
		$transaction = time();
		
		$obj->query("insert into checkout(firstname,lastname,email,address,mobile, country_code, area_code, contact, country,city,pincode, price, processing_fee, service_tax, total_price,trid, tour_id, userid, username, wishlist_id, session_id) values('$firstname','$lastname','$email','$addr','$mobile', '$country_code', '$area_code', '$contact', '$country','$city','$pincode', '$tour_amt', '$processing_fee', '$service_tax', '$gtotal','$transaction', '$tourid', '$users[id]', '$_SESSION[username]', '$wishlist_id', '$sid')");
		$cid = mysql_insert_id();

		/*mysql_query("delete from wishlist where session_id='$_SESSION[session_id]'");
		@session_destroy();*/
		
		$select = $obj->query("select * from checkout where id='$cid'");
		$details = mysql_fetch_array($select);
	}
	
	/* for($j=0; $j<$size; $j++) {
		$sql_insert = "insert into passenger_details(fname, lname, checkout_id) values('$pass_fname[$j]', '$pass_lname[$j]', '$details[id]')";
		mysql_query($sql_insert);
	} */
	
	$orderno = time();
	
	?>
	
	
	<?php
	//echo"<script>window.location='mycoupon.php?id=".$details['id']."'</script>";
	
	//echo"<script>window.open('mycoupon.php?id=".$details['id']."','_blank')</script>";
	
	/* echo "<form name='couponqq' method='post' action='mycoupon.php'>";
	echo "<input type='hidden' name='id' id='sads' value='".$details['id']."'>";
	echo "</form>";
	//die();
	echo "<script>document.couponqq.submit()</script>"; */
	
	
	
	
	
	
	
	?>
	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="dpEncodeRequest.js"></script>
<script>
	function encodeTxnRequest()
	{
		<?php if($_POST['payment_credit'] == 'Credit-Debit') { ?>
			document.ecom.requestparameter.value = encodeValue(document.ecom.requestparameter.value);
			document.ecom.submit();
		<?php } ?>
		<?php if($_POST['payment_credit'] == 'Paypal') { ?>
			//document.paypal.requestparameter.value = encodeValue(document.paypal.requestparameter.value);
			document.paypal.submit();
		<?php } ?>
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

<body bgcolor="#ADD8E6" onload="encodeTxnRequest();">

<?php if($_POST['payment_credit'] == 'Credit-Debit') { ?>
      <form name="ecom" method="post" action="https://www.timesofmoney.com/direcpay/secure/dpMerchantTransaction.jsp" onSubmit="encodeTxnRequest();">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle">
    <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top"><table width="1000" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="305" align="left" valign="middle"><br />
<!--img src="images/logo.gif" width="305" height="77" usemap="#Map" border="0" /-->
<map name="Map" id="Map">
  <area shape="rect" coords="1,14,257,72" href="index.php" />
</map></td>
            <td width="156" align="left" valign="top">&nbsp;</td>
            <td width="539" align="right" valign="middle">
            	
                
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top">
         
        	<table width="1000" border="0" cellspacing="0" cellpadding="0">
             
            </table>
        </td>
      </tr>
     
		
            	<tr><td>&nbsp;</td></tr>
				<tr>
                	<input type="hidden" name="custName" value="<?php echo $details['firstname']." ".$details['lastname']; ?>">
                    <input type="hidden" name="custAddress" value="<?php echo $details['address']; ?>">
                    <input type="hidden" name="custCity" value="Mumbai">
                    <input type="hidden" name="custState" value="Maharashtra">
                    <input type="hidden" name="custPinCode" value="<?php echo $details['pincode'] ?>">
                    <input type="hidden" name="custCountry" value="IN">
                    <input type="hidden" name="custPhoneNo1" value="<?php echo $details['country_code'] ?>">
                    <input type="hidden" name="custPhoneNo2" value="<?php echo $details['area_code'] ?>">
                    <input type="hidden" name="custPhoneNo3" value="<?php echo $details['contact'] ?>">
                    <input type="hidden" name="custMobileNo" value="<?php echo $details['mobile']; ?>">
                    <input type="hidden" name="custEmailId" value="<?php echo $details['email']; ?>">
                    <input type="hidden" name="deliveryName" value="<?php echo $details['firstname']." ".$details['lastname']; ?>">
                    <input type="hidden" name="deliveryAddress" value="<?php echo $details['address']; ?>">
                    <input type="hidden" name="deliveryCity" value="<?php echo $details['city']; ?>">
                    <input type="hidden" name="deliveryState" value="Maharashtra">
                    <input type="hidden" name="deliveryPinCode" value="<?php echo $details['pincode'] ?>">
                    <input type="hidden" name="deliveryCountry" value="IN">
                    <input type="hidden" name="deliveryPhNo1" value="<?php echo $details['country_code'] ?>">
                    <input type="hidden" name="deliveryPhNo2" value="<?php echo $details['area_code'] ?>">
                    <input type="hidden" name="deliveryPhNo3" value="<?php echo $details['contact'] ?>">
                    <input type="hidden" name="deliveryMobileNo" value="<?php echo $details['mobile']; ?>">
                    <input type="hidden" name="otherNotes" value="test transaction for direcpay">
                    <input type="hidden" name="editAllowed" value="Y">
                    <input type="hidden" name="requestparameter" value="201202131000004|DOM|IND|INR|<?php echo $gtotal ?>|<?php echo $orderno ?>|NULL|http://innovins.co.in/demo/seeinindia.com/website/mycoupon.php?id=<?php echo $details['id'] ?>|http://innovins.co.in/demo/seeinindia.com/website/account-failed.php|DirecPay">
                	<td align="center">
	                	
                        <!--input type="image" src="images/order_btn.jpg" name="submit2" value="submit"onclick="return submitform(document.form1);" /-->
                    </td>
                </tr>
                </table>
                
                </td>
                </tr>
			</table>
            </form>
       <?php } 
	   
	   if($_POST['payment_credit'] == 'Paypal') {
				
				function currency($val) {
					$amount = $val;
					
					$url = 'http://www.google.com/ig/calculator?hl=en&q=' . $amount . 'USD=?INR';
					$ch = curl_init();
					$timeout = 0;
					curl_setopt ($ch, CURLOPT_URL, $url);
					curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch,  CURLOPT_USERAGENT , "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT  6.1)");
					curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
					$rawdata = curl_exec($ch);
					curl_close($ch);
					$data = explode('"', $rawdata);
					$data = explode(' ', $data['3']);
					$var = $data['0'];
					return round($var,3);
					/*$data = json_decode($rawdata, true);
					$tmp = explode(' ', $data['rhs']);
					return floatval($tmp[0]);*/
				}
				//$amt = currency($gtotal);
				
				function currency_convert($Amount,$currencyfrom,$currencyto)
				{
					$buffer=file_get_contents('http://finance.yahoo.com/currency-converter');
					preg_match_all('/name=(\"|\')conversion-date(\"|\') value=(\"|\')(.*)(\"|\')>/i',$buffer,$match);
					$date=preg_replace('/name=(\"|\')conversion-date(\"|\') value=(\"|\')(.*)(\"|\')>/i','$4',$match[0][0]);
					unset($buffer);
					unset($match);
					$buffer=file_get_contents('http://finance.yahoo.com/currency/converter-results/'.$date.'/'.$Amount.'-'.strtolower($currencyfrom).'-to-'.strtolower($currencyto).'.html');
					preg_match_all('/<span class=\"converted-result\">(.*)<\/span>/i',$buffer,$match);
					$match[0]=preg_replace('/<span class=\"converted-result\">(.*)<\/span>/i','$1',$match[0]);
					unset ($buffer);
					return $match[0][0];
				}
				//$converted_value = currency_convert($gtotal,"INR","USD");
				
				
				$converted_value = number_format($gtotal*0.016,2,'.','');
				/*echo $converted_value;
				exit;*/
	   ?>
       <form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="paypal">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="travelysis@gmail.com">
            <input type="hidden" name="item_name" value="Tour">
            <input type="hidden" name="item_number" value="<?php echo $orderno ?>">
            <input type="hidden" name="amount" value="<?php echo $converted_value;?>">
            <input type="hidden" name="first_name" value="<?php echo $details['firstname']; ?>">
            <input type="hidden" name="last_name" value="<?php echo $details['lastname']; ?>">
            <input type="hidden" name="address1" value="<?php echo $details['address']; ?>">
            <input type="hidden" name="address2" value="<?php echo $details['address']; ?>">
            <input type="hidden" name="city" value="<?php echo $details['city']; ?>">
            <input type="hidden" name="state" value="<?php echo $details['city']; ?>">
            <input type="hidden" name="zip" value="<?php echo $details['pincode']; ?>">
            <input type="hidden" name="email" value="<?php echo $details['email']; ?>">
            <input type="hidden" name="return" value="http://innovins.co.in/demo/seeinindia.com/website/mycoupon.php?id=<?php echo $details['id'] ?>">
  			<input type="hidden" name="cancel_return" value="http://innovins.co.in/demo/seeinindia.com/website/">
            
        </form>
        
       

        
       <?php } ?>
	   


</body>
</html>
	