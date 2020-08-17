<?php
	include('database.php');
	class functions extends Database
    {
		var $image;
		var $image_type;
		var $imageDir = '../images/gallery/';
		
		
		
		public function getLogin($data)
		{
			$username=mysql_real_escape_string($data['username']);
			$password=mysql_real_escape_string($data['password']);
			$result=$this->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
			$row = mysql_num_rows($result);
			if($row>0)
			{
				session_start();
				$_SESSION['username'] = $username;
				echo "<script type=\"text/javascript\" src=\"js/jquery.min.js\"></script>
			<script type=\"text/javascript\" src=\"js/jquery.colorbox.js\"></script>
			<script type=\"text/javascript\">
				parent.$.fn.colorbox.close();
			</script>";
			
				echo"<form name='login' action='./index.php' method='post'>
				     <input type='hidden' name='success'>
					</form>";
				echo "<script>document.login.submit()</script>";
			}
			else
			{
				echo"<form name='login' action='./login.php' method='post'>
				     <input type='hidden' name='failed'>
					</form>";
				echo "<script>document.login.submit()</script>";
			}
		}
		
		
		public function gettravelLogin($data)
		{
			$username=mysql_real_escape_string($data['username']);
			$password=mysql_real_escape_string($data['password']);
			$result=$this->query("SELECT * FROM traveldetails WHERE username = '$username' AND password = '$password' AND is_loggedin='Yes'");
			$row = mysql_num_rows($result);
			if($row>0)
			{
				session_start();
				$_SESSION['username'] = $username;
				echo "<script type=\"text/javascript\" src=\"js/jquery.min.js\"></script>
			<script type=\"text/javascript\" src=\"js/jquery.colorbox.js\"></script>
			<script type=\"text/javascript\">
				parent.$.fn.colorbox.close();
			</script>";
			
				echo"<form name='login' action='./index.php' method='post'>
				     <input type='hidden' name='success'>
					</form>";
				echo "<script>document.login.submit()</script>";
			}
			else
			{
				echo"<form name='login' action='./travel-login.php' method='post'>
				     <input type='hidden' name='failed'>
					</form>";
				echo "<script>document.login.submit()</script>";
			}
		}
		
		
		
		public function getBannerImages()
		{
			$res = $this->query("select * from banner_images");
			return $result = $this->fetch($res);
		}
		
		public function getCityImages($city)
		{
			$res = $this->query("select * from city_images where city='$city'");
			
			return $result = $this->fetch($res);
			
		}
		
		
		public function getBannerImages1()
		{
			$res = $this->query("select * from banner_images1");
			return $result = $this->fetch($res);
		}
		
		public function getHomeDestination()
		{
			return $this->query("select * from tours where show_home='Yes' AND activities='yes' ORDER BY sort_order ASC");
		
		}
		
		
		public function getHomeDestinationneed()
		{
			return $this->query("select * from tours where show_home='Yes' AND more_day='yes' ORDER BY sort_order ASC");
		
		}
		
		public function userexists($username)
		{
			$result  = $this->query("select * from users where username='$username'");
			return $row = mysql_num_rows($result);
		}
		
		public function userRegister($data, $files)
		{
			$firstname = mysql_real_escape_string($data['firstname']);
			$lastname = mysql_real_escape_string($data['lastname']);
			$mobile = mysql_real_escape_string($data['mobile']);
			$country_code = mysql_real_escape_string($data['country_code']);
			$area_code = mysql_real_escape_string($data['area_code']);
			$contact = mysql_real_escape_string($data['contact']);
			$email = mysql_real_escape_string($data['email']);
			$address = $data['address'];
			$city = mysql_real_escape_string($data['city']);
			$country = mysql_real_escape_string($data['country']);
			$pincode = mysql_real_escape_string($data['pincode']);
			$username = mysql_real_escape_string($data['username']);
			$password = mysql_real_escape_string($data['password']);
			$source = "website";
			
			$image_details = array(
				 'large' => array(
					'width' => 200,
					'suffix' => 'large'
				), 
				
				'small' => array(
					'width' => 70,
					'suffix' => 'small'
				)
			);
			$image = $files['dp']['name'];
			$img1 = str_replace('A-Z','a-z',$image);
			$img = str_replace(' ','_',$img1);
			$img_dir = 'admin/images/dp/';
			$image_name = $this->uploadProductImage($files['dp'], mb_strtolower($firstname), $image_details, $img_dir);
			
			$this->query("INSERT INTO `users` (`dp`, `firstname`, `lastname`, `mobile`, `country_code`, `area_code`, `contact`, `email`, `address`, `city`, `country`, `pincode`, `username`, `password`, `source`) VALUES ('$image_name', '$firstname', '$lastname', '$mobile', '$country_code', '$area_code', '$contact', '$email', '$address', '$city', '$country', '$pincode', '$username', '$password', '$source')");
			
			 
			//Email 
			$subject = "Seeinindia - Registration";	
			$to="contactus@seeinindia.com";
			$from="info@seeinindia.com";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: See in india '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
			$mybody="Thankyou for registering in seeininda.com. </br> Your Login  Credential is as follows:</br> Username:". $username. " and Password:".$password;
			mail($to, $subject, $mybody, $headers);
			
			//Email
			
			
			session_start();
			$_SESSION['username'] = $username;
			echo"<form name='login' action='./index.php' method='post'>
				     <input type='hidden' name='success'>
					</form>";
				echo "<script>document.login.submit()</script>";
			
			
			
		}
				
		public function carEnquiry($data)
		{
			 $name = mysql_real_escape_string($data['name']);
			
			$contact = mysql_real_escape_string($data['contact']);

			$email = mysql_real_escape_string($data['email']);
			
			$date_of_travel = mysql_real_escape_string($data['datepicker']);
			$date_of_return = mysql_real_escape_string($data['datepicker1']);
			$no_of_pax = mysql_real_escape_string($data['no_of_pax']);
			$vehicle_type = mysql_real_escape_string($data['vehicle_type']);
			$arrival_city = mysql_real_escape_string($data['arrival_city']);
			$departure_city = mysql_real_escape_string($data['departure_city']);
			$Itinerary = mysql_real_escape_string($data['Itinerary']);
			
			
			
			$this->query("INSERT INTO `car_enquiry` (`name`, `email`, `contact`, `date_of_travel`, `date_of_return`, `no_of_pax`, `vehicle_type`, `arrival_city`, `departure_city`,`Itinerary`) VALUES ('$name','$email','$contact','$date_of_travel','$date_of_return','$no_of_pax','$vehicle_type','$arrival_city','$departure_city','$Itinerary')");
			
		
			//Email 
			$subject = "Chauffer Driven Car Rental-Enquiry";	
			$to="contactus@seeinindia.com";
			$from=$email;
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: See in india '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
			$mybody="<table>
			<tr><td>name:</td><td>".$name."</td></tr>
			<tr><td>email:</td><td>".$email."</td></tr>
			<tr><td>date_of_travel:</td><td>".$date_of_travel."</td></tr>
			<tr><td>date_of_return:</td><td>".$date_of_return."</td></tr>
			<tr><td>no_of_pax:</td><td>".$no_of_pax."</td></tr>
			<tr><td>vehicle_type:</td><td>".$vehicle_type."</td></tr>
			<tr><td>arrival_city:</td><td>".$arrival_city."</td></tr>
			<tr><td>departure_city:</td><td>".$departure_city."</td></tr>
			<tr><td>Itinerary:</td><td>".$Itinerary."</td></tr>
					
			</table>";
			mail($to, $subject, $mybody, $headers);
			}
		
		public function aboutUs($data){
			 $name = mysql_real_escape_string($data['name']);
			
			 $contact = mysql_real_escape_string($data['contact']);

			 $email = mysql_real_escape_string($data['email']);
			
			$comment = mysql_real_escape_string($data['comment']);
			
			
			
			$subject = "Contact us";	
			$to="contactus@seeinindia.com";
			$from="info@seeinindia.com";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: See in india '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
			$mybody="<table>
			<tr><td>name:</td><td>".$name."</td></tr>
			<tr><td>email:</td><td>".$email."</td></tr>
			<tr><td>contact:</td><td>".$contact."</td></tr>
			<tr><td>comment:</td><td>".$comment."</td></tr>
			</table>";
			mail($to, $subject, $mybody, $headers);
		}
		
		public function traveluserRegister($data, $files)
		{
			$firstname = mysql_real_escape_string($data['firstname']);
			$lastname = mysql_real_escape_string($data['lastname']);
			$mobile = mysql_real_escape_string($data['mobile']);
			$country_code = mysql_real_escape_string($data['country_code']);
			$area_code = mysql_real_escape_string($data['area_code']);
			$contact = mysql_real_escape_string($data['contact']);
			$email = mysql_real_escape_string($data['email']);
			$address = $data['address'];
			$city = mysql_real_escape_string($data['city']);
			$country = mysql_real_escape_string($data['country']);
			$pincode = mysql_real_escape_string($data['pincode']);
			$username = mysql_real_escape_string($data['username']);
			$password = mysql_real_escape_string($data['password']);
			$source = "Travel";
			
			$image_details = array(
				 'large' => array(
					'width' => 200,
					'suffix' => 'large'
				), 
				
				'small' => array(
					'width' => 70,
					'suffix' => 'small'
				)
			);
			$image = $files['dp']['name'];
			$img1 = str_replace('A-Z','a-z',$image);
			$img = str_replace(' ','_',$img1);
			$img_dir = 'admin/images/dp/';
			$image_name = $this->uploadProductImage($files['dp'], mb_strtolower($firstname), $image_details, $img_dir);
			
			$this->query("INSERT INTO `traveldetails` (`dp`, `firstname`, `lastname`, `mobile`, `country_code`, `area_code`, `contact`, `email`, `address`, `city`, `country`, `pincode`, `username`, `password`, `source`, `is_loggedin`) VALUES ('$image_name', '$firstname', '$lastname', '$mobile', '$country_code', '$area_code', '$contact', '$email', '$address', '$city', '$country', '$pincode', '$username', '$password', '$source', 'No')");
			
			 
			//Email 
			$subject = "Seeinindia - Registration";	
			$to="contactus@seeinindia.com";
			$from="info@seeinindia.com";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: See in india '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
			$mybody="Thankyou for registering in seeininda.com. </br> Your Login  Credential is as follows:</br> Username:". $username. " and Password:".$password;
			mail($to, $subject, $mybody, $headers);
			//Email
			
			
			echo"<form name='login1' action='./travel-login.php' method='post'>
				     <input type='hidden' name='success_reg'>
					</form>";
				echo "<script>document.login1.submit()</script>"; 
			
			
			
		}
		
		
		public function getUserProfile($username)
		{
			$res = $this->query("select * from users where username='$username'");
			return $this->fetch($res);
		
		}
		
			public function gettravelUserProfile($username)
		{
			$res = $this->query("select * from traveldetails where username='$username'");
			return $this->fetch($res);
		
		}
		
		public function hometours($type)
		{
			return $this->query("select * from home_tours where tour_type='$type'");
		}
		
		public function getTour($tour_id)
		{
			$result =  $this->query("select * from tours where id='$tour_id'");
			return $res = $this->fetch($result);
			
		}
		
		public function userRegisterEdit($data, $files, $session_username)
		{
			
			 $firstname = mysql_real_escape_string($data['firstname']);
			
			$lastname = mysql_real_escape_string($data['lastname']);
			$mobile = mysql_real_escape_string($data['mobile']);
			$country_code = mysql_real_escape_string($data['country_code']);
			$area_code = mysql_real_escape_string($data['area_code']);
			$contact = mysql_real_escape_string($data['contact']);
			$email = mysql_real_escape_string($data['email']);
			$address = $data['address'];
			$city = mysql_real_escape_string($data['city']);
			$country = mysql_real_escape_string($data['country']);
			$pincode = mysql_real_escape_string($data['pincode']);
			$username = mysql_real_escape_string($data['username']);
			$password = mysql_real_escape_string($data['password']);
		   $who_is=$data['who_is'];
		 
			
			$image_details = array(
				 'large' => array(
					'width' => 200,
					'suffix' => 'large'
				), 
				
				'small' => array(
					'width' => 70,
					'suffix' => 'small'
				)
			);
		
		
			
			if($who_is=="user") {
			
			 if(!empty($files['dp1']['name'])) { 
		    $image = $files['dp1']['name'];
		
			//die();
			
			$img1 = str_replace('A-Z','a-z',$image);
			$img = str_replace(' ','_',$img1);
			$img_dir = 'admin/images/dp/';
			$image_name1 = $this->uploadProductImage($files['dp1'], mb_strtolower($username), $image_details, $img_dir);
			$this->query("UPDATE users SET `dp`='$image_name1' WHERE username = '$session_username'");
			//echo "UPDATE users SET `dp`='$image_name1' WHERE username = '$session_username'";
			//die();
			
		
								}
		
		
			$this->query("UPDATE users SET `firstname`='$firstname', `lastname`='$lastname', `mobile`='$mobile', `country_code`='$country_code', `area_code`='$area_code', `contact`='$contact', `email`='$email', `address`='$address', `city`='$city', `country`='$country', `pincode`='$pincode', `username`='$username', `password`='$password' WHERE username = '$session_username'");
			}
			if($who_is=="travel") {
			
			 if(!empty($files['dp1']['name'])) { 
		    $image = $files['dp1']['name'];
		
			
			$img1 = str_replace('A-Z','a-z',$image);
			$img = str_replace(' ','_',$img1);
			$img_dir = 'admin/images/dp/';
			$image_name1 = $this->uploadProductImage($files['dp1'], mb_strtolower($username), $image_details, $img_dir);
			
			
			$this->query("UPDATE traveldetails SET `dp`='$image_name1' WHERE username = '$session_username'");
		
		}
			
			$this->query("UPDATE traveldetails SET `firstname`='$firstname', `lastname`='$lastname', `mobile`='$mobile', `country_code`='$country_code', `area_code`='$area_code', `contact`='$contact', `email`='$email', `address`='$address', `city`='$city', `country`='$country', `pincode`='$pincode', `username`='$username', `password`='$password' WHERE username = '$session_username'");
			
			}
			 
			 
			 	//Email 
			$subject = "Seeinindia - Profile Updated";	
			$to="contactus@seeinindia.com";
			$from="info@seeinindia.com";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: See in india '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
			$mybody="You have updated your profile. </br> Your Login  Credential is as follows:</br> Username:". $username. " and Password:".$password;
			mail($to, $subject, $mybody, $headers);
			
			//Email
			 
			 
			 
			session_start();
			$_SESSION['username'] = $username; 
			
			 echo"<form name='login' action='./edit-profile.php' method='post'>
				     <input type='hidden' name='profile_updated'>
					</form>";
				echo "<script>document.login.submit()</script>"; 
			
		}
		
		
		public function getTourInfo($tour_id)
		{
			$res = $this->query("select * from tours where id='$tour_id'");
			return $this->fetch($res);
		}
		public function getRelatedTours($tour_id)
		{
			$res = $this->query("select * from tours where id='$tour_id'");
			return $this->fetch($res);
		}
		
		public function checkMaintour($tour_id)
		{
			$res = $this->query("select * from tours where main_tour = '$tour_id'");
			return $result = mysql_num_rows($res);
		}
		
		public function getTourSlider($tour_id)
		{
			$res =  $this->query("select * from tours where id='$tour_id'");
			return $result = $this->fetch($res);
		}
		public function getMaintour($tour_id)
		{
			return  $this->query("select * from tours where main_tour='$tour_id'");
		}
		
		public function searchTours($data)
		{
			$where = $data['where_to_go'];
			$from_date = $data['from_date'];
			$to_date = $data['to_date'];
		  $query="select * from tours where city LIKE '%$where%' OR nameof_tour LIKE '%$where%' OR shortdescription LIKE '%$where%' OR longdescription LIKE '%$where%' AND from_date BETWEEN '$from_date' AND '$to_date' AND show_home='Yes'";
		 // die();
		 return $this->query($query);
		}
		
		public function searchToursheaders($data)
		{
			$where = $data['search_header'];
			  $query="select * from tours where city LIKE '%$where%' OR nameof_tour LIKE '%$where%' OR shortdescription LIKE '%$where%' OR longdescription LIKE '%$where%' OR states LIKE '%$where%' AND show_online='Yes'  AND from_date BETWEEN '$from_date' AND '$to_date'";
			 return $this->query($query);
		}
		
		public function comment($data, $userid)
		{
			$comments=$data['comments'];
			$this->query("INSERT INTO  reviews(`user_id`, `comments`, `show_home`) VALUES('$userid', '$comments', 'no')");
			echo "<script>alert('Your Review Successfully Posted. Thankyou!!')</script>";
		}
		
		public function getReview()
		{
			return $this->query("select * from reviews where show_home='yes'");
		}
		
		public function getUserid($username)
		{
			$result = $this->query("select * from users where username='$username'");
			$row = mysql_num_rows($result);
			if($row==1)
			{
				//echo "user";
				return $this->fetch($result);
			} 
			else 
			{
				//echo "travel";
				$travel = $this->query("select * from traveldetails where username='$username'");
				return $this->fetch($travel);
				
			}
		
		}
		
		
		function load($filename) {
			$image_info = getimagesize($filename);
			$this->image_type = $image_info[2];
			if( $this->image_type == IMAGETYPE_JPEG ) {
				$this->image = imagecreatefromjpeg($filename);
			} elseif( $this->image_type == IMAGETYPE_GIF ) {
				$this->image = imagecreatefromgif($filename);
			} elseif( $this->image_type == IMAGETYPE_PNG ) {
				$this->image = imagecreatefrompng($filename);
			}
		}
		
		function save($filename, $image_type=IMAGETYPE_JPEG, $compression=90, $permissions=null) {
			if( $image_type == IMAGETYPE_JPEG ) {
				imagejpeg($this->image,$filename,$compression);
			} elseif( $image_type == IMAGETYPE_GIF ) {
				imagegif($this->image,$filename);
			} elseif( $image_type == IMAGETYPE_PNG ) {
				imagepng($this->image,$filename);
			}
			if( $permissions != null) {
				chmod($filename,$permissions);
			}
		}
		
		function output($image_type=IMAGETYPE_JPEG) {
			if( $image_type == IMAGETYPE_JPEG ) {
				imagejpeg($this->image);
			} elseif( $image_type == IMAGETYPE_GIF ) {
				imagegif($this->image);
			} elseif( $image_type == IMAGETYPE_PNG ) {
				imagepng($this->image);
			}
		}
		function getWidth() {
			return imagesx($this->image);
		}
		function getHeight() {
			return imagesy($this->image);
		}
		
		function resizeToHeight($height) {
			$ratio = $height / $this->getHeight();
			$width = $this->getWidth() * $ratio;
			$this->resize($width,$height);
		}
	 
		function resizeToWidth($width) {
			$ratio = $width / $this->getWidth();
			$height = $this->getheight() * $ratio;
			$this->resize($width,$height);
		}
	 
		function scale($scale) {
			$width = $this->getWidth() * $scale/100;
			$height = $this->getheight() * $scale/100;
			$this->resize($width,$height);
		}
		
		function resize($width,$height) {
			$new_image = imagecreatetruecolor($width, $height);
			imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
			$this->image = $new_image;
		}
		
		function uploadProductImage($file, $name, $image_details, $img_dir) {   			
			$file_name = str_replace('', '-', strtolower( pathinfo($file['name'], PATHINFO_FILENAME)) );
			$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
			$this->load($file["tmp_name"]);
			
			foreach($image_details as $key => $value) {
				$this->resizeToWidth($value['width']);
				$img_dir.$file_name.'_'.$value['suffix'].'.'.$ext;
				$this->save($img_dir.$name.'_'.$value['suffix'].'.'.$ext);
			}
			return $name.'.'.$ext;
		}
	
		function upload($file, $image_details) {		
			$file_name = str_replace('', '-', strtolower( pathinfo($file['name'], PATHINFO_FILENAME)) );
			$ext = pathinfo($file['name'], PATHINFO_EXTENSION);
			$this->load($file["tmp_name"]);
			
			foreach($image_details as $key => $value) {
				$this->resizeToWidth($value['width']);
				$this->save($this->imageDir.$file_name.'_'.$value['suffix'].'.'.$ext);
			}
			
			return $file_name.'.'.$ext;
		}
	} 
?>