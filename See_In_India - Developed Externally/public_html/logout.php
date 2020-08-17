<?php 

	session_start();
	
  include("include/functions.php");
	  $obj = new functions();
	  
	  session_destroy();
	  echo "<script>alert('You have Successfully Logged Out')</script>";
	  echo "<script>window.location='index.php'</script>";


?>