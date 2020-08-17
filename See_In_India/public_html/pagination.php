<?php
	
	 if(isset($_POST['search_tours_submit']) or isset($_GET['page'])) { 
	//$search_tour = $obj->searchTours($_POST);
	if(isset($_REQUEST['where_to_go'])){
		$where = $_REQUEST['where_to_go'];
	}else{
		$where = str_replace('-',' ',$_GET['city']);
	}
	$from_date = $_REQUEST['from_date'];
	$to_date = $_REQUEST['to_date'];
	 $query="select * from tours where  ( city LIKE '%$where%' OR states LIKE '%$where%' OR nameof_tour LIKE '%$where%' OR shortdescription LIKE '%$where%' OR longdescription LIKE '%$where%'  AND  from_date BETWEEN '$from_date' AND '$to_date' )   AND show_online='Yes'  ";

	$tour = $obj->query($query);
	  $total = mysql_num_rows($tour);
	}
	
	if(isset($_REQUEST['where_to_go'])){
		$where = $_REQUEST['where_to_go'];
	}else{
		$where = str_replace('-',' ',$_GET['city']);
	}
	
	$from_date = $_REQUEST['from_date'];
	$to_date = $_REQUEST['to_date'];

/* $sql = mysql_query("select * from tours"); 
$total = mysql_num_rows($sql); */

$adjacents = 3;
$targetpage = "search.php"; //your file name
$limit = 6; //how many items to show per page
$page = $_GET['page'];

if($page){ 
	$start = ($page - 1) * $limit; //first item to display on this page
}else{
	$start = 0;
}

/* Setup page vars for display. */
if ($page == 0) $page = 1; //if no page var is given, default to 1.
$prev = $page - 1; //previous page is current page - 1
$next = $page + 1; //next page is current page + 1
$lastpage = ceil($total/$limit); //lastpage.
$lpm1 = $lastpage - 1; //last page minus 1

$sql2 = "select * from tours where  ( city LIKE '%$where%' OR states LIKE '%$where%' OR nameof_tour LIKE '%$where%' OR shortdescription LIKE '%$where%' OR longdescription LIKE '%$where%' AND from_date BETWEEN '$from_date' AND '$to_date' )  AND show_online='Yes'  ";
$sql2 .= " limit $start ,$limit ";
//echo $sql2;

$sql_query = $obj->query($sql2); 
$search_tour = $obj->query($sql2);
$curnm = mysql_num_rows($sql_query);

/* CREATE THE PAGINATION */

$pagination = "";
if($lastpage > 1)
{ 
$pagination .= "<ul class='pagination'>";
if ($page > $counter+1) {
$pagination.= "<li><a href=\"$targetpage?page=$prev&where_to_go=$where&from_date=$from_date&to_date=$to_date\">prev</a></li>"; 
}

if ($lastpage < 7 + ($adjacents * 2)) 
{ 
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<li><a href='#' class='active'>$counter</a></li>";
else
$pagination.= "<li><a href=\"$targetpage?page=$counter&where_to_go=$where&from_date=$from_date&to_date=$to_date\">$counter</a></li>"; 
}
}
elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
{
//close to beginning; only hide later pages
if($page < 1 + ($adjacents * 2)) 
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$pagination.= "<li><a href='#' class='active'>$counter</a></li>";
else
$pagination.= "<li><a href=\"$targetpage?page=$counter&where_to_go=$where&from_date=$from_date&to_date=$to_date\">$counter</a></li>"; 
}
$pagination.= "<li>...</li>";
$pagination.= "<li><a href=\"$targetpage?page=$lpm1&where_to_go=$where&from_date=$from_date&to_date=$to_date\">$lpm1</a></li>";
$pagination.= "<li><a href=\"$targetpage?page=$lastpage&where_to_go=$where&from_date=$from_date&to_date=$to_date\">$lastpage</a></li>"; 
}
//in middle; hide some front and some back
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<li><a href=\"$targetpage?page=1&where_to_go=$where&from_date=$from_date&to_date=$to_date\">1</a></li>";
$pagination.= "<li><a href=\"$targetpage?page=2&where_to_go=$where&from_date=$from_date&to_date=$to_date\">2</a></li>";
$pagination.= "<li>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$pagination.= "<li><a href='#' class='active'>$counter</a></li>";
else
$pagination.= "<li><a href=\"$targetpage?page=$counter&where_to_go=$where&from_date=$from_date&to_date=$to_date\">$counter</a></li>"; 
}
$pagination.= "<li>...</li>";
$pagination.= "<li><a href=\"$targetpage?page=$lpm1&where_to_go=$where&from_date=$from_date&to_date=$to_date\">$lpm1</a></li>";
$pagination.= "<li><a href=\"$targetpage?page=$lastpage&where_to_go=$where&from_date=$from_date&to_date=$to_date\">$lastpage</a></li>"; 
}
//close to end; only hide early pages
else
{
$pagination.= "<li><a href=\"$targetpage?page=1&where_to_go=$where&from_date=$from_date&to_date=$to_date\">1</a></li>";
$pagination.= "<li><a href=\"$targetpage?page=2&where_to_go=$where&from_date=$from_date&to_date=$to_date\">2</a></li>";
$pagination.= "<li>...</li>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; 
$counter++)
{
if ($counter == $page)
$pagination.= "<li><a href='#' class='active'>$counter</a></li>";
else
$pagination.= "<li><a href=\"$targetpage?page=$counter&where_to_go=$where&from_date=$from_date&to_date=$to_date\">$counter</a></li>"; 
}
}
}

//next button
if ($page < $counter - 1) 
$pagination.= "<li><a href=\"$targetpage?page=$next&where_to_go=$where&from_date=$from_date&to_date=$to_date\">next</a></li>";
else
$pagination.= "";
$pagination.= "</ul>\n"; 
}


?>