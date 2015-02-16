<?php
include ('includes/mhead.php');
$today = strtotime("today") ;
$today = date("Y-m-d", $today);
if (isset($_GET["date"])){
$gdate = $_GET["date"]; }
else {
	$gdate = $today;}

$ggdate = date("l | d M Y ", strtotime($gdate));

$bdate = explode("-", $gdate);
$num_year = $bdate[0];
$num_month = $bdate[1];
$num_day = $bdate[2];
if ($_REQUEST["teamid"] == "Development" ) 
$team = "1";
elseif ($_REQUEST["teamid"] == "Design") 
$team = "2";
else
$team = "0";


?> 
<div id="iphone"><H6>
<?php echo $ggdate; ?>
<br />
<a href="mindex.php?date=<?php echo $num_year; ?>-<?php echo $num_month; ?>-<?php echo $num_day-1; ?>"> < </a>
 
<a href="mindex.php?date=<?php echo $num_year; ?>-<?php echo $num_month; ?>-<?php echo $num_day+1; ?>"> > </a> 

<a href="mindex.php?date=<?php echo $gdate; ?>"> All </a>
<a href="mindex.php?date=<?php echo $gdate; ?>&teamid=Design">Design </a>
<a href="mindex.php?date=<?php echo $gdate; ?>&teamid=Development">Dev </a>


<br />
	<?php
if ($team == '0')
{$where = "day = '$gdate' AND users.id = day_works.user_id";}
else 
{$where = "day = '$gdate' AND users.id = day_works.user_id AND team_id = $team";}

	$r2 = mysql_query("SELECT DISTINCT name, day AS dday
		FROM users, day_works
			WHERE  $where
		ORDER by name ASC ");

	while ($row2 = mysql_fetch_array($r2)) { 
	
		$name= $row2['name'];
		echo "<br />" . $name. "\n";
	$dday= $row2['dday'] ;
	
	$r3 = mysql_query("SELECT *
	 			FROM day_works, users 
	 			WHERE day = '$gdate' AND users.id = day_works.user_id AND name ='$name'
			ORDER by weight, title ASC");
	 	while ($row3 = mysql_fetch_array($r3)) {
	echo "<li>" .$row3['title']. "<br />\n"; }

}	
	
?>
</H6>
</div>

