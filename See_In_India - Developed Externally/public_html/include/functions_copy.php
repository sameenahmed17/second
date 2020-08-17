<?php
	error_reporting(0);
	include('database.php');
	class functions extends Database
    {
		var $image;
		var $image_type;
		var $imageDir = '../images/gallery/';
		
		//no of visitors
		public function getVisitors()
		{
		$this->query("insert into visitors(count)values('visited')");
		
		}
		
		public function getListingvisitors()
		{
			$this->query("insert into listing_visitors(visit)values('visited')");
		
		}
		public function getConsultantvisitors()
		{
			$this->query("insert into consultant_visitors(visit)values('visited')");
		
		}
		
		public function getListingsearches($what,$where)
		{
			$result=$this->query("select * from category where id='$what'");
			$res=mysql_fetch_array($result);
			$find=$res['name'];
			 if($what!='consultant')
			{
			
			$this->query("insert into listing_searches(what, keywords)values('$find', '$where')");
			}
		}
		
		public function getListingsearches1($where)
		{
			$this->query("insert into listing_searches(what,keywords)values('fullwebsite', '$where[site_search]')");
		}
		
		public function getConsultantearches($where)
		{
			$this->query("insert into consultant_searches(keywords)values('$where')");
		}
		
		/* public function getCOnsultantsearches1($where)
		{
			$this->query("insert into consultant_searches(keywords)values('$where[site_search]')");
		} */
		
		
		//no of visitors
		public function getEnquiry($data)
		{
			$this->query("insert into enquiry(name, email, queries, active, highlight) values('$data[name]', '$data[email]', '$data[question]', 'No', 'No')");
			echo "<script>alert('Thank you for enquiry.');</script>";
		}
		
		public function getQuery($email)
		{
			return $this->query("select * from  users where email='$email'");
		}	
		public function getQuery1($email,$session)
		{
			return $this->query("select * from  users where email='$email' and email <> '$session'");
		}
		
		public function getContactenquiry($data)
		{
			$this->query("insert into contact_enquiry(name, email, contact, queries) values('$data[name]', '$data[email]', '$data[contact]', '$data[comments]')");
			
			$subject = "Seatyourself - Enquiry";
	
			
			//$to="bhupati@innovins.com";
			$to="contact@seatyourself.in";
			$from="info@Seatyourseif.in";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Seatyourself '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
	
		
			
				
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
	 
		$mybody = "<table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Name: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['name']."</font>				</td>
			</tr>
			
			
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Phone No.: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['contact']."</font>				</td>
			</tr>
			       
            <tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Email ID: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['email']."</font>				</td>
			</tr>
			
		
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Questions </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['comments']."</font>				</td>
			</tr>
            
           
	</table>
	";
	
	
			
			
		
				mail($to, $subject, $mybody, $headers);
			
			
			
			echo "<script>alert('Thank you for enquiry. We will get back to you soon');</script>";
		}
		
		public function givenReview()
		{
			return $res=$this->query("select * from listing_reviews where highlight='Yes' and active='Yes'");
			
		}
		public function givenConsultantReview()
		{
			return $res=$this->query("select * from consultant_reviews where highlights='Yes' and active='Yes'");
			
		}
		public function nameOfreviewer($user_id)
		{
			$res=$this->query("select * from users where email='$user_id'");
			return $result=$this->fetch($res);
		
		}
		//to get Listing
		
		public function getContact()
		{
			$result=$this->query("select * from contact_us");
			return $res=$this->fetch($result);
		
		}
		public function getListing($what,$where,$price)
		{
		
			
			 $query="select * from listings where (`category_id`='$what') AND (`name` LIKE '$where' OR `location` = '$where' OR `address` LIKE '$where' OR min_price >= '$price' OR max_price <= '$price') AND `active`='Yes' ORDER BY sort_order";
			//die();
			
			$result=$this->query($query);
		
			return $result;
		
				
		}
		
		//to get Listing
		
		public function getSliderImages()
		{
			return $result = $this->query("select * from slider_image");
		
		}
		
		public function getBannertext()
		{
		$result = $this->query("select * from banner_text");
		return $res=$this->fetch($result);
		
		}
		public function siteSearch($data)
		{
		 $query="select * from listings where ( name LIKE '$data[site_search]%' OR services LIKE '$data[site_search]%' OR facility LIKE '$data[site_search]%' OR additional_info LIKE '$data[site_search]%' OR things_to_do LIKE '$data[site_search]%' OR location LIKE '$data[site_search]%') AND active='Yes' ORDER BY sort_order";
		//die();
			$result=$this->query($query);
			return $result;
		}
		
		public function getTestimonals()
		{
			$result=$this->query("select * from testimonals where show_home='Yes' LIMIT 0,2");
			return $result;
		
		}
		
		public function getMaxPrice()
		{
			$result=$this->query("select MAX(min_price) from listings");
			 return $res=$this->fetch($result);
			
		}
		
		public function getMaxPriceconsultant()
		{
			$result=$this->query("select MAX(min_price) from consultants");
			 return $res=$this->fetch($result);
			
		}
		
		public function getMaxPricepages($id)
		{
			$result=$this->query("select MAX(min_price) from listings where category_id='$id'");
			 return $res=$this->fetch($result);
			
		}
		
		public function getMinPrice()
		{
			$result=$this->query("select MIN(min_price) from listings");
			 return $res=$this->fetch($result);
			
		
		}
		public function getMinPriceconsultant()
		{
			$result=$this->query("select MIN(min_price) from consultants");
			 return $res=$this->fetch($result);
			
		
		}
		public function getMinPricepages($id)
		{
			$result=$this->query("select MIN(min_price) from listings where category_id='$id'");
			 return $res=$this->fetch($result);
			
		
		}
		
		public function getPubs()
		{
		$result=$this->query("select * from listings where category_id='2'");
			return $result;
			
		}
		
		public function getSalon()
		{
		$result=$this->query("select * from listings where category_id='1'");
			return $result;
			
		}
		
		public function getPlayground()
		{
		$result=$this->query("select * from listings where category_id='3'");
			return $result;
			
		}
		
		public function getConsultant()
		{
		$result=$this->query("select * from consultants");
			return $result;
			
		}
		public function homeList()
		{
				 $query="select * from listings where show_home='Yes' and top_recommend = 'No' LIMIT 0,3";
				return $result=$this->query($query);
		}
		
		public function topList()
		{
			 $query="select * from listings where show_home='Yes' and top_recommend ='Yes' LIMIT 0,3";
				return $result=$this->query($query);
		
		}
		public function getWhy()
		{
				 $query="select * from booking";
				 $result=$this->query($query);
				 return $res=$this->fetch($result);
		}
		
		public function viewAll()
		{
			 $query="select * from listings where top_recommend ='Yes' ORDER BY sort_order";
				return $result=$this->query($query);
		}
		
		//to get Listing Image
		
		public function getListimage($lid)
		{
			$query="select * from listing_images where listing_id='$lid'";
			$result=$this->query($query);
			$image=$this->fetch($result);
			return $image;
		
		}
		
		
		
		//to get Listing Image
		
		public function getListingName()
		{
			$query="select distinct(location) from listings";
			return $result=$this->query($query);
			
		}
		public function getListingNamepages($id)
		{
			$query="select distinct(location) from listings where category_id='$id'";
			return $result=$this->query($query);
			
		}
		
		public function getServices()
		{
			$query="select services from listings";
			return $result=$this->query($query);
		}
		public function getServicespages($id)
		{
			$query="select services from listings where category_id='$id'";
			return $result=$this->query($query);
		}
		public function getConsultantServices()
		{
			$query="select services from consultants";
			return $result=$this->query($query);
		
		}
		public function getPopularhotel()
		{
			$query="select * from listings where `top_recommend`='Yes' and ratings >= '4'";
			return $result=$this->query($query);
		
		}
		public function getPopularconsultant()
		{
			$query="select * from consultants where  ratings >= '4'";
			return $result=$this->query($query);
		
		}
		
		public function getpagescategories($id)
		{
			$query="select * from listings where category_id='$id' ORDER BY sort_order ASC";
			return $result=$this->query($query);
		
		}
		
		public function gettheirStars($tid)
		{
			$query="select AVG(ratings), MAX(ratings) from listing_ratings where `listing_id`='$tid'";
			 $result=$this->query($query);
			 return $res=$this->fetch($result);
		
		}
		public function getConsultantStars($tid)
		{
			$query="select AVG(ratings), MAX(ratings) from consultant_ratings where `consultant_id`='$tid'";
			 $result=$this->query($query);
			 return $res=$this->fetch($result);
		
		}
		//to get single Listing
			
			public function getListdetails($lid)
			{
			$query="select * from listings where id='$lid'";
			$result=$this->query($query);
			$list_result=$this->fetch($result);
			return $list_result;	
			}
			
			public function getDp($name)
			{
				$result=$this->query("select * from users where email='$name'");
				return $res=$this->fetch($result);
			}
			public function getConsultantdetails($lid)
			{
			$query="select * from consultants where id='$lid'";
			$result=$this->query($query);
			$list_result=$this->fetch($result);
			return $list_result;	
			}
		
		//to get single Listing

		public function getAbout()
		{
		$query="select * from about_us";
		$result=$this->query($query);
		return $list_result=$this->fetch($result);
		
		}
		
		
		
		public function getMaxreview($lid)
		{
			$result=$this->query("select MAX(ratings) from listing_ratings where listing_id='$lid'");
			return $max=$this->fetch($result);
		}
		public function getMaxreview1($lid)
		{
			$result=$this->query("select MAX(ratings) from consultant_ratings where consultant_id='$lid'");
			return $max=$this->fetch($result);
		}
		
		//to get Listing Gallery Image
		public function getListingImages($gallery_id)
		{
			$query="select * from listing_images where listing_id='$gallery_id'";
			$result=$this->query($query);
			return $result;	
		}
		
		public function getConsultantImages($gallery_id)
		{
			$query="select * from consultant_images where consultant_id='$gallery_id'";
			$result=$this->query($query);
			return $result;	
		}
		//to get Listing Gallery Image
		
		//get map
		public function getmap()
		{
			$query="select * from details where id='$id'";
			$result=$this->query($query);
			return $result;
		}
		
		public function getCategory() {
			return $this->query("select * from category order by id DESC");
		}
		
		
		
		//get map
		
		
		public function userRegister($data,$files)
		{
			
			$fname=$data['fname'];
			$lname=$data['lname'];
			$contact=$data['contact'];
			$email=$data['email'];
			$password=$data['password'];
			
			
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
			$image = $files['image']['name'];
			$img1 = str_replace('A-Z','a-z',$image);
			$img = str_replace(' ','_',$img1);
			$img_dir = 'admin/images/dp/';
			$image_name = $this->uploadProductImage($files['image'], $fname, $image_details, $img_dir);
			
			
			
			$this->query("INSERT INTO `users` (`fname`, `lname`, `contact`, `email`, `password`, `dp`,`active`) VALUES ('$fname', '$lname', '$contact', '$email', '$password', '$image_name', 'No');");
			
			/* session_start();
			$_SESSION['email']=$email; */
			
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
	 
	$mybody = "<table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Name: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$fname." ".$lname."</font>				</td>
			</tr>
			
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Phone No.: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$contact."</font>				</td>
			</tr>
			       
            <tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Email ID: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$email."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Password: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$password."</font>				</td>
			</tr>
            
           
	</table>
	";
	
		$subject = "Seatyourself - Registration"; 
		$subject1 = "Seatyourself - New Registration"; 
	
		//$to1="bhupati.jagi@gmail.com";
		$to1="info@seatyourself.in";
		$to=$email;
		$email1="info@Seatyourseif.in";
		$headers='MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Seatyourself '. "\r\n";
		//$headers .= 'To:'.$to. "\r\n";
		
	$mybody1="Your Registration for Seatyourself has been registered. You will receive an email from us on approval of your email id so that you can login to seatyourself.in. You login credentials are as follows:</br>";
	$mybody1.="Email: ".$email." Password: ".$password;
		
		mail($to, $subject, $mybody1, $headers);
		mail($to1, $subject1, $mybody, $headers);
			
		//header('location:index.php?profile=success');
		
		echo "<script>window.location='login.php?profile=success'</script>";
		}
		
		public function login($data)
		{
			$email=$data['email'];
			$password=$data['password'];
			 $query=$this->query("select * from users where `email`='$email' and `password`='$password' and active='Yes'");
			 
			
			 $row=mysql_num_rows($query);
			
			if($row==1)
			{	$result=$this->fetch($query);
				session_start();
				$_SESSION['email']=$result['email'];
				//header('location:index.php?profile=success');
				echo "<script>window.location='index.php?profile=success'</script>";
			}
			else 
			{
			//	header('location:login.php?profile=failed');
				echo "<script>window.location='login.php?profile=failed'</script>";
			}
		}
		
		public function getuserDetails($session_data)
		{
				 $query=$this->query("select * from users where `email`='$session_data'");
				 $result=$this->fetch($query);
				 return $result;
		
		}
		public function userUpdate($data,$session_data,$files)
		
		{
				$fname=$data['fname'];
				$lname=$data['lname'];
				$contact=$data['contact'];
				$email=$data['email'];
				$password=$data['password'];
				
				
				if(!empty($files['image']['name'])) {
				$image_details = array(
					'large' => array(
						'width' => 200,
						'suffix' => 'large'
					),
					
					'small' => array(
						'width' => 90,
						'suffix' => 'small'
					)
				);
				$dp_name=strtolower($fname);
				$image = $files['image']['name'];
				$img1 = str_replace('A-Z','a-z',$image);
				$img = str_replace(' ','_',$img1);
				$img_dir = 'admin/images/dp/';
				$image_name = $this->uploadProductImage($files['image'],$dp_name, $image_details, $img_dir);
				$this->query("update users set `dp`='$image_name' where `email`='$session_data'");
				
				}
			    $query1="update users set `fname`='$fname', lname='$lname', `contact`='$contact', `email`='$email', `password`='$password' where `email`='$session_data'";
				//die();
			
				if($this->query($query1))
				{	session_start();
					$_SESSION['email']=$email;
					
					//header('edit_profile.php?profile=success');
					echo "<script>window.location='edit_profile.php?profile=success'</script>";
				}
				else 
				{
				   // header('edit_profile.php?profile=failed');
				   echo "<script>window.location='edit_profile.php?profile=failed'</script>";
				}
				
		}
		
		public function newsletter($data)
		{
			$this->query("INSERT INTO `newsletter` (`email`) VALUES ('$data[email]')");
		
			
			
			$subject = "Seatyourself - Newsletter";
	
			
			$to="info@seatyourself.in";
			$from="info@Seatyourseif.in";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Seatyourself '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
			$mybody="You Email is register with seatyourself.in to receive latest news and new happenings newsletter of seatyourself.in";
			mail($to, $subject, $mybody, $headers);
			echo "<script>alert('Your subscription for newletter is Successfull');</script>";
		}
		
		
		//add Listing
		
		
		public function getRating($data, $session_data)
		{
			$session=$session_data;
			$this->query("INSERT INTO `listing_ratings` (`listing_id`, `ratings`, `user_id`) VALUES ('$data[listind_id]', '$data[score]', '$session');");
			$this->query("INSERT INTO `listing_reviews` (`listing_id`, `reviews`, `user_id`) VALUES ('$data[listind_id]', '$data[comments]', '$session');");
			
			$result=$this->query("select MAX(ratings) from listing_ratings where listing_id='$data[listind_id]'");
			$got=$this->fetch($result);
			$a=$got['MAX(ratings)'];
			$this->query("update listings set ratings='$a' where id='$data[listind_id]'");
			  echo "<script>window.location='detail.php?id=$data[listind_id]&success'</script>";
		}
		
		public function getConsultantRating($data, $session_data)
		{
			//$session=$session_data;
			$this->query("INSERT INTO `consultant_ratings` (`consultant_id`, `ratings`, `user_id`) VALUES ('$data[listind_id]', '$data[score]', '$session_data');");
			$this->query("INSERT INTO `consultant_reviews` (`consultant_id`, `reviews`, `user_id`) VALUES ('$data[listind_id]', '$data[comments]', '$session_data');");
			$result=$this->query("select MAX(ratings) from consultant_ratings where consultant_id='$data[listind_id]'");
			$got=$this->fetch($result);
			$a=$got['MAX(ratings)'];
			$this->query("update consultants set ratings='$a' where id='$data[listind_id]'");
			
			
			  echo "<script>window.location='consultant_detail.php?id=$data[listind_id]&success'</script>";
		}
		
		public function getAvg($lid)
		{
			$avg=$this->query("select user_id,AVG(ratings) from `listing_ratings` where `listing_id`='$lid'");
			
			return $result=$this->fetch($avg);
			
			
			
		
		}
		public function getConAvg($lid)
		{
			$avg=$this->query("select user_id,AVG(ratings) from `consultant_ratings` where `consultant_id`='$lid'");
			
			return $result=$this->fetch($avg);
			
			
			
		
		}
		
		public function getAllratings($lid)
		{
			$all=$this->query("select * from listing_reviews where `listing_id`='$lid'");
			return $row=mysql_num_rows($all);
			
		}
		
		public function getConAllratings($lid)
		{
			$all=$this->query("select * from consultant_reviews where `consultant_id`='$lid'");
			return $row=mysql_num_rows($all);
			
		}
		
		public function getListname($lid)
		{
				$name=$this->query("select * from listings where id='$lid'");
				return $result=$this->fetch($name);
		}
		
		public function getConname($lid)
		{
				$name=$this->query("select * from consultants where id='$lid'");
				return $result=$this->fetch($name);
		}
		
		public function oneStar($lid)
		{
			$onestar=$this->query("select * from listing_ratings where ratings='1' and listing_id='$lid'");
			return $row=mysql_num_rows($onestar);
		
		
		}
		public function twoStar($lid)
		{
			$twostar=$this->query("select * from listing_ratings where ratings='2' and listing_id='$lid'");
			return $row=mysql_num_rows($twostar);
		
		
		}
		
		public function threeStar($lid)
		{
			$threestar=$this->query("select * from listing_ratings where ratings='3' and listing_id='$lid'");
			return $row=mysql_num_rows($threestar);
		
		
		}
		public function fourStar($lid)
		{
			$fourStar=$this->query("select * from listing_ratings where ratings='4' and listing_id='$lid'");
			return $row=mysql_num_rows($fourStar);
		
		
		}
		
		public function getConsultantcat()
		{
			return $result=$this->query("select * from consultant_category");
		}
		public function getConsultantname()
		{
			return $result=$this->query("select distinct(location) from consultants");
		
		}
		public function getActivereviews()
		{
			return $result=$this->query("select * from enquiry where active='Yes'");
		
		}
		
		public function fiveStar($lid)
		{
			$fiveStar=$this->query("select * from listing_ratings where ratings='5' and listing_id='$lid'");
			return $row=mysql_num_rows($fiveStar);
		
		
		}
		
		public function getAllreviews($lid)
		{
			return $result=$this->query("select * from listing_reviews where listing_id='$lid' AND active='Yes' ORDER BY id DESC LIMIT 0,6");
			//return $reviews=$this->fetch($result);
		}
		public function getConAllreviews($lid)
		{
			return $result=$this->query("select * from consultant_reviews where consultant_id='$lid' AND active='Yes' ORDER BY id DESC LIMIT 0,6");
			//return $reviews=$this->fetch($result);
		}
		
		public function getReviewuser($user_id)
		{
			$result=$this->query("select * from users where email='$user_id'");
			return $users=$this->fetch($result);
		
		}
		
		
		
		public function oneStar1($lid)
		{
			$onestar=$this->query("select * from consultant_ratings where ratings='1' and consultant_id='$lid'");
			return $row=mysql_num_rows($onestar);
		
		
		}
		public function twoStar1($lid)
		{
			$twostar=$this->query("select * from consultant_ratings where ratings='2' and consultant_id='$lid'");
			return $row=mysql_num_rows($twostar);
		
		
		}
		
		public function threeStar1($lid)
		{
			$threestar=$this->query("select * from consultant_ratings where ratings='3' and consultant_id='$lid'");
			return $row=mysql_num_rows($threestar);
		
		
		}
		public function fourStar1($lid)
		{
			$fourStar=$this->query("select * from consultant_ratings where ratings='4' and consultant_id='$lid'");
			return $row=mysql_num_rows($fourStar);
		
		
		}
		public function fiveStar1($lid)
		{
			$fiveStar=$this->query("select * from consultant_ratings where ratings='5' and consultant_id='$lid'");
			return $row=mysql_num_rows($fiveStar);
		
		
		}
		public function addListings($data, $files)
		{	
			$category_id=$data['category_id'];
			$name=mysql_real_escape_string($data['name']);
			$location=mysql_real_escape_string($data['location']);
			$address=$data['address'];
			$contact=$data['contact'];
			$email=mysql_real_escape_string($data['email']);
			$minprice=mysql_real_escape_string($data['minprice']);
			$maxprice=mysql_real_escape_string($data['maxprice']);
			$fromtime=$data['fromtime'];
			$totime=$data['totime'];
			$services=$data['services'];
			$information=$data['information'];
			$top=$data['top'];
			
			$image_details = array(
				'large' => array(
					'width' => 200,
					'suffix' => 'large'
				),
				
				'small' => array(
					'width' => 90,
					'suffix' => 'small'
				)
			);
			$image = $files['image']['name'];
			$img1 = str_replace('A-Z','a-z',$image);
			$img = str_replace(' ','_',$img1);
			$img_dir = 'admin/images/listings/';
			$image_name = $this->uploadProductImage($files['image'], time(), $image_details, $img_dir);
			
			
			
			$query="INSERT INTO `listings` (`category_id`, `name`, `location`, `address`, `contact`, `email`, `min_price`, `max_price`, `image`, `store_from_timing`, `store_to_timing`, `services`, `additional_info`,  `top_recommend`, `show_home`, `active`) VALUES ('$category_id', '$name', '$location', '$address', '$contact', '$email', '$minprice', '$maxprice', '$image_name', '$fromtime', '$totime', '$services', '$information', '$top', 'No', 'No')";
			$this->query($query);
			
			
			$subject = "Seatyourself - Listings"; 
			$subject1 = "New Listing has been added by ".$name;
	
			$to1="info@seatyourself.in";
			//$to="bhupati@innovins.com";
			$to=$email;
			$from="info@Seatyourseif.in";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Seatyourself '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
	
		
			$mybody1="Your Listings has been Successfully added. As soon as our screening process is done we will publish your listings. Thank you.";
				mail($to, $subject, $mybody1, $headers);
			
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
	 
		$mybody = "<table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Name: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$name."</font>				</td>
			</tr>
			
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Phone No.: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$contact."</font>				</td>
			</tr>
			       
            <tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Email ID: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$email."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Address: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$address."</font>				</td>
			</tr>
            
           
	</table>
	";
	
	
	
			
		
			
			mail($to1, $subject1, $mybody, $headers);
			echo "<script>alert('Your Listing Successfull Submitted. Thank You.');</script>";
			
		}
		
		//add Listing
		
		
		public function getBooklisting($data)
		{
			$this->query("insert into book_listing(listing_id, name, email, contact, time_of_appointment, services) values('$data[listing_id]', '$data[name]', '$data[email]', '$data[contact]', '$data[time_of_appointment]', '$data[services]')");
			
			$want_listing=$this->query("select * from listings where id='$data[listing_id]'");
			$got_result=mysql_fetch_array($want_listing);
			
			$subject = "Seatyourself - Booked an Appointement"; 
			$subject1 = "Seatyourself - Booked an Appointment by ".$data['name'];
	
			$to1="info@seatyourself.in";
			//$to="bhupati@innovins.com";
			$to=$data['email'];
			$from="info@Seatyourseif.in";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Seatyourself '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
	
		
			$body="Your Appointement details are follows.<br/>";
				
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
	 
		$mybody = "<table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Name: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['name']."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Booked Appointement For: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$got_result['name']."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Phone No.: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['contact']."</font>				</td>
			</tr>
			       
            <tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Email ID: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['email']."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Time Of Appointement: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['time_of_appointment']."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Services Offered </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['services']."</font>				</td>
			</tr>
            
           
	</table>
	";
	
	
				$mybody1=$body.$mybody;
			
		
				mail($to, $subject, $mybody1, $headers);
			mail($to1, $subject1, $mybody, $headers);
		
			
			
			echo "<script>window.location='detail.php?id=$data[listing_id]&book=success#book'</script>";
		
		}
		
		public function getBookConsultant($data)
		{
			
			
		
		
			$this->query("insert into book_consultant(consultant_id, name, email, contact, time_of_appointment, services) values('$data[consultant_id]', '$data[name]', '$data[email]', '$data[contact]', '$data[time_of_appointment]', '$data[services]')");
			
			$want_listing=$this->query("select * from consultants where id='$data[consultant_id]'");
			$got_result=mysql_fetch_array($want_listing);
			
			$subject = "Seatyourself - Booked an Appointement"; 
			$subject1 = "Seatyourself - Booked an Appointment by ".$data['name'];
	
			$to1="info@seatyourself.in";
			//$to="bhupati@innovins.com";
			$to=$data['name'];
			$from="info@Seatyourseif.in";
			$headers='MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
			$headers .= 'From: Seatyourself '. "\r\n";
		//	$headers .= 'From:'.$from. "\r\n";
	
		
			$body="Your Appointement details are follows.<br/>";
				
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
	 
		$mybody = "<table cellpadding=\"".$table_cellpadding."\" cellspacing=\"".$table_cellspacing."\" bgcolor=\"".$table_background_color."\">
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Name: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['name']."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Booked Appointement For: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$got_result['name']."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Phone No.: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['contact']."</font>				</td>
			</tr>
			       
            <tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Email ID: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['email']."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Time Of Appointement: </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['time_of_appointment']."</font>				</td>
			</tr>
			
			<tr>
				<td valign=\"top\" bgcolor=\"".$table_left_column_color."\" nowrap><font face=\"".$table_left_column_font."\" size=\"".$table_left_column_font_size."\" color=\"".$table_left_column_font_color."\"><b>Services Offered </b></font></td>
				<td bgcolor=\"".$table_right_column_color."\"><font face=\"".$table_right_column_font."\" size=\"".$table_right_column_font_size."\" color=\"".$table_right_column_font_color."\">".$data['services']."</font>				</td>
			</tr>
            
           
	</table>
	";
	
	
				$mybody1=$body.$mybody;
			
		
				mail($to, $subject, $mybody1, $headers);
			mail($to1, $subject1, $mybody, $headers);
			
			
			
			
			echo "<script>window.location='consultant_detail.php?id=$data[consultant_id]&book=success#book'</script>";
		
		}
		
		public function getProceedconsultant($data)
		{
			//$flag=1;
			//$query="select * from listings ";
			
			$what=$data['what'];
			
			if($what!="")
			{	
				$flag=1;
				$query="WHERE";
			 $value=implode(",",$what);
			
				$query.=" category_id IN ($value)";
			}
			else 
			{
				$flag=0;
			}
			
			
			$location=$data['location'];
			
			if($location!="" and $flag==1)
			{
				$diff=1;
				$query.="AND";
				$query.=" location='$location'";
			}
			
			if($location!="" and $flag==0)
			{
				$diff=0;
				
				$location_flag=1;
				$query.="WHERE";
				$query.=" location='$location'";
			}
			
			$services=@implode(",",$data['services']);
			

				if($services!="" and $flag==0  and $flag!=1)
			{
				$a=1;
				$query.="WHERE";
				$query.=" services LIKE '%$services%'";
			}
			
			if($services!="" and $flag==0  and $location_flag==1)
			{
				$query.="OR";
				$query.=" services LIKE '%$services%'";
			}
			
			
			if($services!="" and $flag==1)
			{
				$diff3=3;
				$query.="OR";
				$query.=" services LIKE '%$services%'";
			}
			
			// $query="select * from listings where category_id IN ($value) AND location='$location' OR services='$services'";
			
		//	$price=$data['price'];
		$price=explode(" and ",$data['price']);
			if($price[0]!="" and $flag==1)
			{
				$query.="OR";
				$query.=" min_price BETWEEN '$price[0]' and '$price[1]'";
			
			}
			
			$star=implode(",",$data['star']);
			if($star!="" and $flag==1)
			{
				$query.="OR";
				$query.=" ratings IN ($star)";
			
			}
			
				if($price[0]!="" and $flag!=1)
			{
				$query.="WHERE";
				$query.=" min_price BETWEEN '$price[0]' and '$price[1]'";
			
			}
			
			$star=implode(",",$data['star']);
			if($star!="" and $flag!=1 and $a!=1)
			{
				$query.="WHERE";
				$query.=" ratings IN ($star)";
			
			}
			if($star!="" and $flag!=1 and $a==1)
			{
				$query.="OR";
				$query.=" ratings IN ($star)";
			
			}
			//$exact_query=str_replace('WHERE', 'where', $query);
			 $s=substr_count($query, 'WHERE');
			if($s>1)
			{
				/* echo $rev=strrpos($query,"WHERE");
				$no=$rev+5;
				echo $got=substr($query,$rev,5); */
				//echo str_replace('WHERE','OR',$got);
				//echo str_replace(substr($query,strrpos($query,"WHERE"),5),'OR',$query);
				 $q=str_replace('WHERE','OR',$query);
				//$q1=str_replace('')
				//echo $q1=str_replace("listings","listings WHERE",$q);
					$start="select * from listings where";
					$query1=$start.$q;
					$result=str_replace("whereOR","where",$query1);
			}
			else {
				$start="select * from consultants  ";
				$result=$start.$query;
			}
			
			//echo $result;
			$sort_order=" ORDER BY sort_order";
			$maximum=$result.$sort_order;
			//die();
			return $result1=$this->query($maximum);
		//die();
			
		}
		
		
		
		public function getProceedsearch($data)
		{
			//$flag=1;
			//$query="select * from listings ";
			
			$what=$data['what'];
			
			if($what!="")
			{	
				$flag=1;
				$query="WHERE";
			 $value=implode(",",$what);
			
				$query.=" category_id IN ($value)";
			}
			else 
			{
				$flag=0;
			}
			
			
			$location=$data['location'];
			
			if($location!="" and $flag==1)
			{
				$diff=1;
				$query.="AND";
				$query.=" location='$location'";
			}
			
			if($location!="" and $flag==0)
			{
				$diff=0;
				
				$location_flag=1;
				$query.="WHERE";
				$query.=" location='$location'";
			}
			
			$services=@implode(",",$data['services']);
			

				if($services!="" and $flag==0  and $flag!=1)
			{
				$a=1;
				$query.="WHERE";
				$query.=" services LIKE '%$services%'";
			}
			
			if($services!="" and $flag==0  and $location_flag==1)
			{
				$query.="OR";
				$query.=" services LIKE '%$services%'";
			}
			
			
			if($services!="" and $flag==1)
			{
				$diff3=3;
				$query.="OR";
				$query.=" services LIKE '%$services%'";
			}
			
			// $query="select * from listings where category_id IN ($value) AND location='$location' OR services='$services'";
			
		//	$price=$data['price'];
		$price=explode(" and ",$data['price']);
			if($price[0]!="" and $flag==1)
			{
				$query.="OR";
				$query.=" min_price BETWEEN '$price[0]' and '$price[1]'";
			
			}
			
			$star=implode(",",$data['star']);
			if($star!="" and $flag==1)
			{
				$query.="OR";
				$query.=" ratings IN ($star)";
			
			}
			
				if($price[0]!="" and $flag!=1)
			{
				$query.="WHERE";
				$query.=" min_price BETWEEN '$price[0]' and '$price[1]'";
			
			}
			
			$star=implode(",",$data['star']);
			if($star!="" and $flag!=1 and $a!=1)
			{
				$query.="WHERE";
				$query.=" ratings IN ($star)";
			
			}
			if($star!="" and $flag!=1 and $a==1)
			{
				$query.="OR";
				$query.=" ratings IN ($star)";
			
			}
			//$exact_query=str_replace('WHERE', 'where', $query);
			 $s=substr_count($query, 'WHERE');
			if($s>1)
			{
				/* echo $rev=strrpos($query,"WHERE");
				$no=$rev+5;
				echo $got=substr($query,$rev,5); */
				//echo str_replace('WHERE','OR',$got);
				//echo str_replace(substr($query,strrpos($query,"WHERE"),5),'OR',$query);
				 $q=str_replace('WHERE','OR',$query);
				//$q1=str_replace('')
				//echo $q1=str_replace("listings","listings WHERE",$q);
					$start="select * from listings where";
					$query1=$start.$q;
					$result=str_replace("whereOR","where",$query1);
			}
			else {
				$start="select * from listings  ";
				$result=$start.$query;
			}
			
			//echo $result;
			//die();
			$sort_order=" ORDER BY sort_order";
		    $maximum=$result.$sort_order;
			return $result1=$this->query($maximum);
		//die();
		
		}
		
		
		public function getProceedsearchpages($data)
		{
			$location=$data['location'];
			
			if($location!="" and $flag==1)
			{
				$diff=1;
				$query.="AND";
				$query.=" location='$location'";
			}
			
			if($location!="" and $flag==0)
			{
				$diff=0;
				
				$location_flag=1;
				$query.="WHERE";
				$query.=" location='$location'";
			}
			
			$services=@implode(",",$data['services']);
			

				if($services!="" and $flag==0  and $flag!=1)
			{
				$a=1;
				$query.="WHERE";
				$query.=" services LIKE '%$services%'";
			}
			
			if($services!="" and $flag==0  and $location_flag==1)
			{
				$query.="OR";
				$query.=" services LIKE '%$services%'";
			}
			
			
			if($services!="" and $flag==1)
			{
				$diff3=3;
				$query.="OR";
				$query.=" services LIKE '%$services%'";
			}
			
			// $query="select * from listings where category_id IN ($value) AND location='$location' OR services='$services'";
			
		//	$price=$data['price'];
		$price=explode(" and ",$data['price']);
			if($price[0]!="" and $flag==1)
			{
				$query.="OR";
				$query.=" min_price BETWEEN '$price[0]' and '$price[1]'";
			
			}
			
			$star=implode(",",$data['star']);
			if($star!="" and $flag==1)
			{
				$query.="OR";
				$query.=" ratings IN ($star)";
			
			}
			
				if($price[0]!="" and $flag!=1)
			{
				$query.="WHERE";
				$query.=" min_price BETWEEN '$price[0]' and '$price[1]'";
			
			}
			
			$star=implode(",",$data['star']);
			if($star!="" and $flag!=1 and $a!=1)
			{
				$query.="WHERE";
				$query.=" ratings IN ($star)";
			
			}
			if($star!="" and $flag!=1 and $a==1)
			{
				$query.="OR";
				$query.=" ratings IN ($star)";
			
			}
			//$exact_query=str_replace('WHERE', 'where', $query);
			 $s=substr_count($query, 'WHERE');
			if($s>1)
			{
				/* echo $rev=strrpos($query,"WHERE");
				$no=$rev+5;
				echo $got=substr($query,$rev,5); */
				//echo str_replace('WHERE','OR',$got);
				//echo str_replace(substr($query,strrpos($query,"WHERE"),5),'OR',$query);
				 $q=str_replace('WHERE','OR',$query);
				//$q1=str_replace('')
				//echo $q1=str_replace("listings","listings WHERE",$q);
					$start="select * from listings where";
					$query1=$start.$q;
					$result=str_replace("whereOR","where",$query1);
			}
			else {
				$start="select * from listings  ";
				$result=$start.$query;
			}
			
			//echo $result;
			//die();
			$sort_order=" AND (category_id='$data[hid]') ORDER BY sort_order";
		   $maximum=$result.$sort_order;
			//die();
			return $result1=$this->query($maximum);
			
			
			//$main="select * from listings ";
			/* $condition=" AND (category_id='$data[hid]')";
			  $main_query=$main." ".$query." ".$condition;
			//die();
			return $result=$this->query($main_query); */
		
		}
		
		
		
		
		
		
		
		
		
		//end 
		
		
		public function getProceedsearchpages1($data)
		{
			//$flag=1;
			//$query="select * from listings";
			$location=$data['location'];
			if($location!="")
			{
				$flag=1;
				$query="location='$location'";
			
			}
			else 
			{
				$flag=0;
			}
			
			//$price=$data['price'];
			$price=explode(" and ",$data['price']);
			/* if($price!="")
			{
				$query.="OR price BETWEEN '$price'";
			} */
			if($price[0]!="" and $flag==1)
			{
				$query.=" OR min_price BETWEEN '$price[0]' and '$price[1]' ";
			}
			if($price[0]!="" and $flag==0)
			{
				$query.=" min_price BETWEEN $price[0]' and '$price[1]' ";
			}
			
			$services=@implode(",",$data['services']);
			if($services!="" and $flag==1)
			{
				$query.=" OR services LIKE '$services%' ";
			}
			if($services!="" and $flag==0)
			{
				$query.="  services LIKE '$services%' ";
			}
			$star=implode(",",$data['star']);
			if($star!="" and $flag==1)
			{
				$query.=" OR ratings IN ('$star') ";
			}
			if($star!="" and $flag==0)
			{
				$query.=" ratings IN ('$star') ";
			}
			$main="select * from listings where ";
			$condition=" AND (category_id='$data[hid]')";
			  $main_query=$main." ".$query." ".$condition;
			//die();
			return $result=$this->query($main_query);
		
		}
		
		/*---pages---*/
		
		/*Image Upload*/
		public function image_details() {
			$options = array(
				'modal' => array(
					'width' => 1000,
					'suffix' => 'modal'
				),
				'large' => array(
					'width' => 600,
					'suffix' => 'large'
				),
				'medium' => array(
					'width' => 300,
					'suffix' => 'medium'
				),
				'small' => array(
					'width' => 90,
					'suffix' => 'small'
				)
			);
			return $options;
		}
		
		
		public function fromHomepage($data)
		{
			//$string=str_replace(" and ","'and'",$data['price']);
			$explode=explode(" and ",$data['price']);
			
			$main_query="select * from consultants where name LIKE '$data[where]%' OR location='$data[where]' OR min_price BETWEEN '$explode[0]' and '$explode[1]' AND active='Yes' ORDER BY sort_order";
			//die();
			return $result=$this->query($main_query);
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