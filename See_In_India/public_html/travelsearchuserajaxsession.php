<?php
	session_start();
	include("include/functions.php");
    $obj = new functions();
	$value=$_REQUEST['username'];
//echo $value;

//	$query=mysql_query("select * from  users where username= '$value'");
	$query=$obj->query("select * from  traveldetails where username= '$value' AND username <> '$_SESSION[username]'");
	$query1=$obj->query("select * from  users where username= '$value'");

	if (mysql_num_rows($query) <= 0 and mysql_num_rows($query1) <= 0){
	$valid = 'true';} // username available
	else{
	$valid = 'false'; // username unavailable
	}
	echo $valid;

?>