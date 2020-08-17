<!DOCTYPE HTML>
<html>
<head>
<title>EaGLe(Shobii)'s PHP INBOX MAILER | PUBLIC </title>

<style type="text/css">
body
{
	background-image: url(data:image/jpeg;base64,=);
	background-repeat:no-repeat;
}

font
{
	font-family: 'Stencil Std', Tahoma, Arial, sans-serif ;
	font-size:13px;
	color:#7BD852;
}

.jjas
{
	font-size:30px;
	text-align:center;
}

table
{
	font:center;
}

div#qqwwdd
{
	width: 800px;
	position: relative;
	margin-left: auto; 
	margin-right: auto;
}

#result
{
	text-align: left ;  
	border-radius: 20px; 
	border:1px solid rgba(244, 241, 246, 1);
	padding:4px 8px; 
	line-height:16px; 
	background:1px solid rgba(146, 55, 210, 1); 
	margin:20px -144px 0px; 
}

.style2
{
	text-align: center ;
	font-weight: bold;
	font-family:'Wide Latin' , Tahoma, Arial, sans-serif  ;
	text-shadow: 10px 9px 6px rgba(29, 24, 119, 0.51);
	font-size: 50px;
}

.evalcode
{
	border:1px solid #0CF;
	background:#c0c0c0; 
	color:rgba(12, 15, 12, 1); 
	padding:2px;
	border:1px solid rgba(81, 159, 58, 1);
	font-size:11px;
	width:100%;
}

.evalcode:hover
{
	border:1px solid #2cadad;
}

.inputzbut
{
	font-size:11px;
	background:none repeat scroll 0% 0% rgba(0, 0, 0, 0.49);
	color:rgba(213, 64, 74, 1);
	margin:0 4px;
	border:1px solid rgba(180, 27, 27, 0.59); 
}

.inputzbut:hover
{
	border:1px solid #2cadad;
} 

.coode
{
	color:#12152A;
	background:#c0c0c0;
	border:1px solid #e6e6e6;
} 

.coode:hover
{
	border:1px solid #2cadad;
} 
</style>

</head><div id="qqwwdd"><div id="bv_Html1" style="position:absolute;left:23px;width:780px;height:169px;z-index:0;" align="left">
<?
$action    = $_POST['action'];
$from      = $_POST['from'];
$realname  = $_POST['realname'];
$subject   = $_POST['subject'];
$message   = $_POST['message'];
$emaillist = $_POST['emaillist'];
$addr      = getenv("REMOTE_ADDR");
$time = $_POST['time'];
if ($action == "send") {
    $message = urlencode($message);
    $message = ereg_replace("%5C%22", "%22", $message);
    $message = urldecode($message);
    $message = stripslashes($message);
    $subject = stripslashes($subject);
}
?>

<body text="#2cadad" font="Verdana, Arial, Helvetica, sans-serif"><div id="result">
<br /><br />
<div align="center" class="style2">Mailer By EaGLe(X ShoBII)</div>
<br /><br />
</div><div id="result">
<form name="form1" method="post" action="" enctype="multipart/form-data">
<table width="142" border="0">
<tr>
<td width="81"><div align="right">
<font color="#2cadad" size="-3">Your Email :</font>
</div>
</td>
<td width="219">
<font size="-3">
<input class="evalcode" name="from" value="<?php echo $from; ?>" size="30" />
</font>
</td><td width="212">
<div align="right">
<font color="#2cadad" size="-3">Your Name :</font>
</div>
</td>

<td width="278">
<font size="-3"><input class="evalcode" name="realname" value="<?php echo $realname; ?>" size="30" />
</font>
</td>
</tr>
<tr>
<td width="81"><div align="right"><font color="#2cadad" size="-3">Subject :</font></div></td>
<td colspan="3" width="703">
<font size="-3">
<input class="evalcode" name="subject" value="<? echo $subject;?>" size="91" />
</font>
</td>
</tr>
<tr>

<td width="12"><div align="right"><font color="#2cadad" size="-3">time :</font></div></td>
<td colspan="3" width="703">
<font size="-3">
<input class="evalcode" name="time" value="<? echo $time; ?>" size="12" />
</font>
</td>
</tr>

<tr valign="top"><td colspan="3" width="520">
<br>

</td><td width="278"><br><br><font color="#2cadad" size="-3">eMail Send To :</font></td></tr><tr valign="top"><td colspan="3" width="520" ><font size="-3">

<textarea class="coode" name="message" cols="80" rows="16">
<?php echo $message; ?>
</textarea><br />

<input type="hidden" name="action" value="send" />

</font><p><font size="-3">

<input type="submit" name="evalcodesubmit" class="inputzbut" value="Send eMails" style="width:120px;height:30px;" />
</font></td><td width="278"><font size="-3">

<textarea class="coode" name="emaillist" cols="45" rows="16"><?php echo $emaillist; ?>
</textarea></font></td></tr></table></form></div>

<p><center><span class="jjas"  > <a href="https://www.facebook.com/groups/paypalhackz/" >PayPal Hackz & Admin & Team &#169; </a><span></center></p>
<?



if ($action == "send") {
    if (!$from && !$subject && !$message && !$emaillist) {
        echo "Please complete all fields before sending your message.";
        exit;
    }
    $allemails = split("\n", $emaillist);
    $numemails = count($allemails);
    for ($xx = 0; $xx < 1; $xx++) {
        for ($x = 0; $x < $numemails; $x++) {
			$to = $allemails[$x];
            if ($to) {
                $to      = @ereg_replace(" ", "", $to);
                $target  = explode("@", $to);
				
                echo "[XBOOMBER & Pakking] ===> Sending To  $to.......";
                @flush();
				
				$header = "From: $realname <$from>\r\nReply-To: $from\r\n";
                $header .= "MIME-Version: 1.0\n";
				$header .= "Content-type: text/html; charset=iso-8859-1\n";
				$header .= "X-Mailer: Microsoft Office Outlook, Build 17.551210\n";
                $header .= "Content-Transfer-Encoding : 8bit\r\n\r\n";
				$header .= "$message\r\n\r\n";
				
				if(@mail($to, $subject, "", $header))
				{echo "<font color=green>OK<font><br>";}
				else
				{echo '<span style="color:red;">NO</span><br>';}
				
				if (empty($time))
				{
			sleep(0);
				}
				else
				{
			sleep($time);
				}
				
                @flush();
            }
        }
    }
}
?>

<h3 style="color:skyblue;size:30px;">ALL Credits To EaGLe(X ShobII)<br>
Facebook.com/eagle.panthera</h3>

</body>
</html>