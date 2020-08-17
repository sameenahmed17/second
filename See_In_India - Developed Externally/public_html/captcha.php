 <?php function randomuser($len = 5)
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
		echo $newuser=randomuser(5);
		
		?>