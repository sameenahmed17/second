<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta name="p:domain_verify" content="689b062b3b3291a7475030001204178a"/>
	<title></title>
	<?php javaScript() ?>
	<link rel="stylesheet" type="text/css" href="css/default.css">
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56111840-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<?php include('style.php') ?>
<body>
<table width="100%" cellpadding="0" cellspacing="0" border="0" align="center">
<tr>
	<td width="20"></td>
	<td width="24%">
		<?php echo $scrollarrows ?>
		<span class="date_header">
		&nbsp;<?php echo $lang['months'][$m-1] ?>&nbsp;<?php echo $y ?></span>
	</td>

	<!-- form tags must be outside of <td> tags -->
	<form name="monthYear">
	<td width="70%" align="right">
	<?php monthPullDown($m, $lang['months']); yearPullDown($y); ?>
    <input type="hidden" value="<?php echo $_GET['tid'] ?>" onClick="submitMonthYear()" name="tour_id">
	<input type="image" onClick="submitMonthYear()" class="btn-go" value="GO" align="middle">
	</td>
	</form>
    
</tr>

<tr>

	<td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
   
   
</tr>

<tr>
	<td>&nbsp;</td>
	<td colspan="3" bgcolor="#333">
	<?php echo writeCalendar($m, $y); ?></td>
    <td width="20"> </td>
</tr>
</table>
<map name="Map2" id="Map2">
  <area shape="rect" coords="21,55,271,91" href="mailto:info@chalopicnic.com" />
</map>
</body>
</html>
