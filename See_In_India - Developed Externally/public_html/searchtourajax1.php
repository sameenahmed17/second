<?php
session_start();
include("include/functions.php");
$obj = new functions();
$value=$_GET['value'];
//echo $value;
if($value=='')
{
	//echo "kdcvnkdn";

}else
{

//$query=mysql_query("select * from  tours where nameof_tour LIKE '$value%' and show_online='Yes' and main_tour is null");
$query=mysql_query("select DISTINCT(states) from  tours where states LIKE '$value%' and show_online='Yes' and main_tour is null");
//$result=mysql_fetch_array($query);
//print_r($result);
	$i=1;
while($result=mysql_fetch_array($query))
{

	echo "<b><div class='search_input' style='width:304px;height:28px;border-radius:3px;color:#595959;background:#fff;font-size:12px;border-bottom: 1px solid #D6D6D6;z-index:999;cursor:pointer;padding:5px 0 0 8px;' id='div".$i."' onclick='gettext(".$i.");'>".strtoupper($result['states'])."</div></b>";
	
$i++;
}
} 

?>