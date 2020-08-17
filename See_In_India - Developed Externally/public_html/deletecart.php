
<?php

	session_start();
	include("include/functions.php");
    $obj = new functions();
	
	
	if($_GET['id']) {
		$id = $_GET['id'];
	}
	
	$sid = $_SESSION['session_id'];
	$sql = "delete from wishlist where id = '$id'";
	$result = $obj->query($sql);
	header("location: my-cart.php");
?>