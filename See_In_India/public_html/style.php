<?php //require_once('Connections/chalopicnic.php'); ?>
<?php
	/* mysql_select_db($database_chalopicnic, $chalopicnic);
	$sql = mysql_query("select * from main_banner");
	$image = mysql_fetch_array($sql); */
	
	include("include/functions.php");
    $obj = new functions();
	
	
	
?>
<?php
	/* $file_name = str_replace('', '-', strtolower( pathinfo($image['image'], PATHINFO_FILENAME)) );
	$ext = pathinfo($image['image'], PATHINFO_EXTENSION); */
?>
<style>
	body{
		background:url(images/main_image/<?php echo $file_name."_modal.".$ext; ?>) no-repeat;
		margin-left: 0px;
		margin-top: 0px;
		margin-right: 0px;
		margin-bottom: 0px;
		background-position:center top;
		background-position:center top;
		background-attachment:fixed;
	}
</style>