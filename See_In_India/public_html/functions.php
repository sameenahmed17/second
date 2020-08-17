<?php
/*******************************************************
* functions.php -
*	phpEventCalendar global include file
*******************************************************/

function auth($login = '', $passwd = '') 
{
	session_start();
	
}

# ###################################################################

function monthPullDown($month, $montharray)
{
	echo "<select name=\"month\" class=\"monthPullDown\">\n";

	$selected[$month - 1] = ' selected="selected"';

	for($i=0;$i < 12; $i++) {
		$val = $i + 1;
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$val\"$sel>$montharray[$i]</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function yearPullDown($year)
{
	echo "<select name=\"year\" class=\"monthPullDown\">\n";

	$selected[$year] = ' selected="selected"';
	$years_before_and_after = 0;
	$years_before_and_afterend = 1;
	$start_year = $year - $years_before_and_after;
	$end_year   = $year + $years_before_and_afterend;

	for($i=$start_year;$i <= $end_year; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function dayPullDown($day)
{
	echo "<select name=\"day\">\n";

	$selected[$day] = ' selected="selected"';

	for($i=1;$i <= 31; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function hourPullDown($hour, $namepre)
{
	echo "\n<select name=\"" . $namepre . "_hour\">\n";
	
	$selected[$hour] = ' selected="selected"';

	for($i=0;$i <= 12; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function minPullDown($min, $namepre)
{
	echo "\n<select name=\"" . $namepre . "_min\">\n";
	
	$selected[$min] = ' selected="selected"';

	for($i=0;$i < 60; $i+=5) {
		$disp_min = sprintf("%02d", $i);
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "\t<option value=\"$i\"$sel>$disp_min</option>\n";
	}

	echo "</select>\n\n";
}

# ###################################################################

function amPmPullDown($pm, $namepre)
{
	$sel = ' selected="selected"';
	$am  = null;
	if ($pm) { $pm = $sel; } else { $am = $sel; }

	echo "\n<select name=\"" . $namepre . "_am_pm\">\n";
	echo "	<option value=\"0\"$am>am</option>\n";
	echo "	<option value=\"1\"$pm>pm</option>\n";
	echo "</select>\n\n";
}

# ###################################################################

function javaScript()
{
?>
	<script language="javascript">
	function submitMonthYear() {
		document.monthYear.method = "post";
		document.monthYear.action = 
			"indexa.php?month=" + document.monthYear.month.value + 
			"&year=" + document.monthYear.year.value + "&tid=" + document.monthYear.tour_id.value;
		document.monthYear.submit();
	}
	
	function postMessage(day, month, year) {
		eval(
		"page" + day + " = window.open('eventform.php?d=" + day + "&m=" + 
		month + "&y=" + year + "', 'postScreen', 'toolbar=0,scrollbars=1," +
		"location=0,statusbar=0,menubar=0,resizable=1,width=340,height=400');"
		);
	}
	
	function openPosting(pId) {
		eval(
		"page" + pId + " = window.open('eventdisplay.php?id=" + pId + 
		"', 'mssgDisplay', 'toolbar=0,scrollbars=1,location=0,statusbar=0," +
		"menubar=0,resizable=1,width=340,height=400');"
		);
	}
	
	function loginPop(month, year) {
		eval("logpage = window.open('login.php?month=" + month + "&year=" + 
		year + "', 'mssgDisplay', 'toolbar=0,scrollbars=1,location=0," +
		"statusbar=0,menubar=0,resizable=1,width=340,height=400');"
		);
	}
	function closepop(day,month,year,tid) {
			opener.location = 
				"more_info.php?day=" + day + "&month=" + month + "&year=" + year + "&tid=" + tid;
			window.setTimeout('window.close()', 100);
		}
	</script>
<?php
}

# ###################################################################

function footprint($auth, $m, $y) 
{
	global $lang;

	echo "
	<br><br><span class=\"footprint\">
	phpEventGallery <span style=\"color: #666\">by ikemcg at </span> 
	<a href=\"http://www.ikemcg.com/pec\" target=\"new\">
	ikemcg.com</a><br />\n[ ";
	
	if ( $auth == 2 ) {
		echo "
		<a href=\"useradmin.php\">" . $lang['adminlnk'] . "</a> |
		<a href=\"login.php?action=logout&month=$m&year=$y\">" 
		. $lang['logout'] . "</a>";
	} elseif ( $auth == 1 ) {
		echo "
		<a href=\"useradmin.php?flag=changepw\">" . $lang['changepw'] . "</a> |
		<a href=\"login.php?action=logout&month=$m&year=$y\">"
		 . $lang['logout'] . " </a>";
	} else {
		echo "<a href=\"javascript:loginPop($m, $y)\">"
		. $lang['login'] . "</a>";
	}
	echo " ]</span>";
}

# ###################################################################

function scrollArrows($m, $y, $mid)
{
	switch($m)
	{
		case 1:
		$current_month="January";
		break;
		
		case 2:
		$current_month="February";
		break;
		
		case 3:
		$current_month="March";
		break;
		
		case 4:
		$current_month="April";
		break;
		
		case 5:
		$current_month="May";
		break;
		
		case 6:
		$current_month="June";
		break;
		
		case 7:
		$current_month="July";
		break;
		
		case 8:
		$current_month="August";
		break;
		
		case 9:
		$current_month="September";
		break;
		
		case 10:
		$current_month="October";
		break;
		
		case 11:
		$current_month="November";
		break;
		
		case 12:
		$current_month="December";
		break;
	}
	// set variables for month scrolling
	$nextyear  = ($m != 12) ? $y : $y + 1;
	$prevyear  = ($m != 1)  ? $y : $y - 1;
	$prevmonth = ($m == 1)  ? 12 : $m - 1;
	$nextmonth = ($m == 12) ? 1  : $m + 1;

	return "
	<span style=\"float:left; width:50px; margin:15px 0 10px 0px;\">
	<a href=\"indexa.php?tid=$_GET[tid]&month=" . $prevmonth . "&year=" . $prevyear . "\">
	<img src=\"img/icons/left-arrow-light.png\" border=\"0\" align=\"absmiddle\"></a>
	</span>
	
	<span style=\"float:right; width:0px; margin:15px 0 10px 0 ;\">
	<a href=\"indexa.php?tid=$_GET[tid]&month=" . $nextmonth . "&year=" . $nextyear . "\">
	<img src=\"img/icons/right-arrow-light.png\" border=\"0\" align=\"absmiddle\"></a>
	</span>
	";
}

# ###################################################################

function writeCalendar($month, $year)
{
	$str = getDayNameHeader();
	$eventdata = getEventDataArray($month, $year);

	# get first row position of first day of month.
	$weekpos = getFirstDayOfMonthPosition($month, $year);

	# get user permission level
	$auth = (isset($_SESSION['authdata'])) 
		? $_SESSION['authdata']['userlevel'] 
		: false;

	# get number of days in month
	$days = date("t", mktime(0,0,0,$month,1,$year));

	# initialize day variable to zero, unless $weekpos is zero
	if ($weekpos == 0) $day = 1; else $day = 0;
	
	# initialize today's date variables for color change
	$timestamp = mktime() + CURR_TIME_OFFSET * 3600;
	$d = date('j', $timestamp); 
	$m = date('n', $timestamp); 
	$y = date('Y', $timestamp);

	# lookup for testing whether day is today
	$today["$y-$m-$d"] = 1;

	# loop writes empty cells until it reaches position of 1st day of 
	# month ($wPos).  It writes the days, then fills the last row with empty 
	# cells after last day
	while($day <= $days) {
		$str .="<tr>\n";
		
		# write row
		for($i=0;$i < 7; $i++) {
			# if cell is a day of month
			if($day > 0 && $day <= $days) {
				# set css class today if cell represents current date
				$class = (isset($today["$year-$month-$day"])) ? 'today' : 'day';

				$str .= "
				<td class=\"{$class}_cell\" valign=\"top\">
				<span class=\"day_number\">\n";
				
				if ($auth) {
					$str .= "
					<a href=\"javascript: postMessage($day, $month, $year)\">
					$day</a>";
				} else {
					$str .= "$day";
				}	
				$str .= "</span><br>";
				
				if (isset($eventdata[$day]["avail"])) {
					// enforce title limit
					$eventcount = count($eventdata[$day]["avail"]);
	
					if (MAX_TITLES_DISPLAYED < $eventcount) {
						$eventcount = MAX_TITLES_DISPLAYED;
					}
					
					// write title link if day's postings 
					for($j=0;$j < $eventcount;$j++) {
						$date = ($day."-".$month."-".$year);
						$cdate = date('j-n-Y');
						$today_date = date('j-n-Y',strtotime($cdate."+".$eventdata[$day]['locking_period'][$j]." days"));
						$date_diff=strtotime($date) - strtotime($today_date);
						$difference = ($date_diff/(60 * 60 * 24));
						if($difference >= 0) {
							if($eventdata[$day]['tourtype'][$j] == 'Per Person') {
								/*$str .= "
								<span class=\"title_txt\">
								Adult Availability: ".$eventdata[$day]["avail"][$j] . "<br/>
								Child Availability: ".$eventdata[$day]["cavail"][$j] . "<br/><br/>"
								. "Adult Price: ".$eventdata[$day]["price"][$j] . "<br/>
								Child Price: ".$eventdata[$day]["cprice"][$j] . "<br/>";
								*/
								$str .= "
								<span class=\"title_txt\">
								Adult Price: ".$eventdata[$day]["price"][$j] . "<br/>
								Child Price: ".$eventdata[$day]["cprice"][$j] . "<br/>";
								//$str .= "<a href=\"javascript: closepop($day, $month, $year, $_GET[tid])\">SELECT DATE</a></span>";
								$str .= "<br><center><a href=\"tour-info.php?day=$day&month=$month&year=$year&id=$_GET[tid]\" target=\"_parent\" style=\"background:#000;  color:#FFF; padding:5px 10px; font-size:10px; font-weight:bold;\">SELECT DATE</a></center><br></span>";
								//$str .= "<br><center><a href=\"$day-$month-$year-$_GET[tid]\" target=\"_parent\" style=\"background:#000;  color:#FFF; padding:5px 10px; font-size:10px; font-weight:bold;\">SELECT DATE</a></center><br></span>";
							}
							if($eventdata[$day]['tourtype'][$j] == 'Per Vehicle') {
								/*$str .= "
								<span class=\"title_txt\">
								Vehicle Availability: ".$eventdata[$day]["avail"][$j] . "<br/>"
								. "Vehicle Price: ".$eventdata[$day]["price"][$j] . "<br/>";*/
								
								$str .= "
								<span class=\"title_txt\">Vehicle Price: ".$eventdata[$day]["price"][$j] . "<br/>";
								
									//$str .= "<a href=\"javascript: closepop($day, $month, $year, $_GET[tid])\">SELECT DATE</a></span>";
								$str .= "<br><center><a href=\"tour-info.php?day=$day&month=$month&year=$year&id=$_GET[tid]\" target=\"_parent\" style=\"background:#000;  color:#FFF; padding:5px 10px; font-size:10px; font-weight:bold;\">SELECT DATE</a></center><br></span>";
								//$str .= "<br><center><a href=\"$day-$month-$year-$_GET[tid]\" target=\"_parent\" style=\"background:#000;  color:#FFF; padding:5px 10px; font-size:10px; font-weight:bold;\">SELECT DATE</a></center><br></span>";
							}
							if($eventdata[$day]['tourtype'][$j] == 'Per Group') {
								/*$str .= "
								<span class=\"title_txt\">
								Group Availability: ".$eventdata[$day]["avail"][$j] . "<br/>"
								. "Group Price: ".$eventdata[$day]["price"][$j] . "<br/>";*/
								
								$str .= "
								<span class=\"title_txt\">Group Price: ".$eventdata[$day]["price"][$j] . "<br/>";
								
									//$str .= "<a href=\"javascript: closepop($day, $month, $year, $_GET[tid])\">SELECT DATE</a></span>";
								$str .= "<br><center><a href=\"tour-info.php?day=$day&month=$month&year=$year&id=$_GET[tid]\" target=\"_parent\" style=\"background:#000;  color:#FFF; padding:5px 10px; font-size:10px; font-weight:bold;\">SELECT DATE</a></center><br></span>";
								//$str .= "<br><center><a href=\"$day-$month-$year-$_GET[tid]\" target=\"_parent\" style=\"background:#000;  color:#FFF; padding:5px 10px; font-size:10px; font-weight:bold;\">SELECT DATE</a></center><br></span>";
							}
						}
					}
				}

				$str .= "</td>\n";
				$day++;
			} elseif($day == 0)  {
     			$str .= "
				<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
				$weekpos--;
				if ($weekpos == 0) $day++;
     		} else {
				$str .= "
				<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
			}
     	}
		$str .= "</tr>\n\n";
	}
	$str .= "</table>\n\n";
	return $str;
}

# ###################################################################

function getDayNameHeader()
{
	global $lang;

	// adjust day name order if weekstart not Sunday
	if (WEEK_START != 0) {
		for($i=0; $i < WEEK_START; $i++) {
			$tempday = array_shift($lang['abrvdays']);
			array_push($lang['abrvdays'], $tempday);
		}
	}

	$s = "<table width=\"100%\" cellpadding=\"7\" cellspacing=\"7\" style=\"border:10px solid #d6d6d6;\" >\n<tr>\n";

	foreach($lang['abrvdays'] as $day) {
		$s .= "\t<td class=\"column_header\">&nbsp;$day</td>\n";
	}

	$s .= "</tr>\n\n";
	return $s;
}

# ###################################################################

function getEventDataArray($month, $year)
{
	$eventdata = null;
	mysql_connect(DB_HOST, DB_USER, DB_PASS) or die(mysql_error());
	mysql_select_db(DB_NAME) or die(mysql_error());
	
	$sql = "SELECT * FROM availability WHERE m = $month AND y = $year and tour_id='$_GET[tid]'";
	$sql_price = "select * from pricing WHERE m = $month AND y = $year and tour_id='$_GET[tid]'";
	$sql_tours = mysql_query("select * from tours where id='$_GET[tid]'");
	$tour = mysql_fetch_assoc($sql_tours);
	$result = mysql_query($sql) or die(mysql_error());
	$result_price = mysql_query($sql_price);
	
	while($row = mysql_fetch_assoc($result)) {
		$day = $row["d"];
		$eventdata[$day]["id"][] = $row["id"];

		# set title string; limit char length and append ellipsis if necessary
		if($row["adults_availability"] <= 0) {
			$eventdata[$day]["avail"][] = "<strong>SOLD OUT</strong>";
		}
		else {
			$eventdata[$day]["avail"][] = $row["adults_availability"]; 
		}
		
		if($row["child_availability"] <= 0) {
			$eventdata[$day]["cavail"][] = "<strong>SOLD OUT</strong>";
		}
		else{
			$eventdata[$day]["cavail"][] = $row["child_availability"]; 
		}
		$eventdata[$day]['tourtype'][] = $tour['tour_type'];
		$eventdata[$day]['locking_period'][] = $tour['locking_period'];
		$avail = stripslashes($row["adults_availability"]);
		
		
		
	}
	while($row_price = mysql_fetch_assoc($result_price)) {
		$day = $row_price["d"];
		

		# set title string; limit char length and append ellipsis if necessary
		$eventdata[$day]["price"][] = $row_price["adults_price"]; 
		$eventdata[$day]["cprice"][] = $row_price["child_price"]; 
		
	}
	return $eventdata;
}

# ###################################################################

function getFirstDayOfMonthPosition($month, $year)
{
	$weekpos = date("w", mktime(0,0,0,$month,1,$year));

	// adjust position if weekstart not Sunday
	if (WEEK_START != 0) {
		if ($weekpos < WEEK_START) {
			$weekpos = $weekpos + 7 - WEEK_START;
		} else {
			$weekpos = $weekpos - WEEK_START;
		}
	}
	return $weekpos;
}

# ###################################################################

?>
