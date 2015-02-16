<?php
include ('includes/head.php');
if ($_REQUEST["teamid"] == "Development" ) 
$team = "1";
elseif ($_REQUEST["teamid"] == "Design") 
$team = "2";
else
$team = "0";

$today = strtotime("today") ;
$today_stamp = $today;
$today = date("Y-m-d", $today);


$one_day = 86400;

?> 
<h1>Teams <?php echo $_REQUEST['teamid']; ?></h1>

<?php
	
if ($team == "0")
{
/*  - -------------------------------------------------    begin first week  */

echo "\n <table border=\"1\" width=\"750\"><tr> \n";

if ($dayofweek == "Monday")
{$start = strtotime("Monday");}
else 
	{$start = strtotime("last Monday");}

$day = date("j", $start);
$month = date("m", $start);
$year = date("Y", $start);
$dayofweek = date("l");
$date_val = $year ."-". $month . "-" . $i;

$end = $start + (4 * $one_day);

for($date = $start; $date <= $end; $date += $one_day){
	$attr = ($today_stamp == $date) ? 'bgcolor="#CCC"' : '';	
	echo  "\n<td width='150' $attr"; 
	$date_val = date('Y-m-d', $date);
	$label = ($date == $today_stamp) ? 'Today' : date('m-d', $date);
	echo "<h1><a $attr href=\"date.php?date=$date_val\">$label</a></h1>";


$r2 = mysql_query("SELECT DISTINCT name, day AS dday
	FROM users, day_works
		WHERE  day = '$date_val' AND users.id = day_works.user_id
	ORDER by name ASC ");

while ($row2 = mysql_fetch_array($r2)) { 
	$name= $row2['name'];
	echo "<br /><h2>" . $name. "</h2>\n";
$dday= $row2['dday'] ;
if ($date_val == $dday) 
{
$r3 = mysql_query("SELECT *
 			FROM day_works, users 
 			WHERE day = '$date_val' AND users.id = day_works.user_id AND name ='$name'
		ORDER by weight ASC");
 	while ($row3 = mysql_fetch_array($r3)) {
echo "- " . $row3['title']. "<br />\n"; }
	

  }
	else {echo date('m-d', $date);}
}
echo "</td>";
echo "\n";
}
echo "</tr></table>\n";
}
else
{
	
	echo "\n <table border='1' width='750'><tr> \n";

	if ($dayofweek == "Monday")
	{$start = strtotime("Monday");}
	else 
		{$start = strtotime("last Monday");}

	$day = date("j", $start);
	$month = date("m", $start);
	$year = date("Y", $start);
	$dayofweek = date("l");
	$date_val = $year ."-". $month . "-" . $i;
	
	$end = $start + (4 * $one_day);

	for($date = $start; $date <= $end; $date += $one_day){
		$attr = ($today_stamp == $date) ? 'bgcolor="#CCC"' : '';	
		echo  "\n<td width='150' $attr";

		$date_val = date('Y-m-d', $date);
		$label = ($date == $today_stamp) ? 'Today' : date('m-d', $date);
		echo "<h1><a href=\"date.php?date=$date_val\">$label</a></h1>";
		
echo "$team_id";

	$r2 = mysql_query("SELECT DISTINCT name, day AS dday, team_id
		FROM users, day_works
			WHERE  day = '$date_val' AND users.id = day_works.user_id AND team_id = '$team'
		ORDER by name ASC ");

	while ($row2 = mysql_fetch_array($r2)) { 
	
		$name= $row2['name'];
		echo "<br /><h2>" . $name. "</h2>\n";
	$dday= $row2['dday'] ;
	if ($date_val == $dday) 
	{
	$r3 = mysql_query("SELECT *
	 			FROM day_works, users 
	 			WHERE day = '$date_val' AND users.id = day_works.user_id AND name ='$name' AND team_id = '$team'
			ORDER by weight ASC");
	 	while ($row3 = mysql_fetch_array($r3)) {
	echo "- " . $row3['title']. "<br />\n"; }


	  }
//		else {echo $month . "-" . $i;}
	}
	echo "</td>";
	echo "\n";
	}
	echo "</tr></table>\n";	
	
	
	
}
/*  - -------------------------------------------------    end first week  */

/*  - -------------------------------------------------    begin 2nd week  */

if ($team == "0")
{
/*  - -------------------------------------------------    begin 2nd week  */

echo "<br />\n <table border='1' width='750'><tr> \n";

if ($dayofweek == "Monday")
{$start = strtotime("next Monday");}
else 
	{$start = strtotime("next Monday");}

$day = date("j", $start);
$month = date("m", $start);
$year = date("Y", $start);
$dayofweek = date("l");
$date_val = $year ."-". $month . "-" . $i;

$end = $start + (4 * $one_day);

for($date = $start; $date <= $end; $date += $one_day){
	$attr = ($today_stamp == $date) ? 'bgcolor="#CCC"' : '';	
	echo  "\n<td width='150' $attr";

	$date_val = date('Y-m-d', $date);
	$label = ($date == $today_stamp) ? 'Today' : date('m-d', $date);
	echo "<h1><a href=\"date.php?date=$date_val\">$label</a></h1>";


$r2 = mysql_query("SELECT DISTINCT name, day AS dday
	FROM users, day_works
		WHERE  day = '$date_val' AND users.id = day_works.user_id
	ORDER by name ASC ");

while ($row2 = mysql_fetch_array($r2)) { 

	$name= $row2['name'];
	echo "<br /><h2>" . $name. "</h2>\n";
$dday= $row2['dday'] ;
if ($date_val == $dday) 
{
$r3 = mysql_query("SELECT *
 			FROM day_works, users 
 			WHERE day = '$date_val' AND users.id = day_works.user_id AND name ='$name'
		ORDER by weight ASC");
 	while ($row3 = mysql_fetch_array($r3)) {
echo "" . $row3['title']. "<br />\n"; }
	

  }
	else {echo $month . "-" . $i;}
}
echo "</td>";
echo "\n";
}
echo "</tr></table>\n";
}
else
{
	
	echo "\n <table border='1' width='750'><tr> \n";

	if ($dayofweek == "Monday")
	{$start = strtotime("next Monday");}
	else 
		{$start = strtotime("next Monday");}

	$day = date("j", $start);
	$month = date("m", $start);
	$year = date("Y", $start);
	$dayofweek = date("l");
	$date_val = $year ."-". $month . "-" . $i;
	
	$end = $start + (4 * $one_day);

	for($date = $start; $date <= $end; $date += $one_day){
		$attr = ($today_stamp == $date) ? 'bgcolor="#CCC"' : '';	
		echo  "\n<td width='150' $attr";

		$date_val = date('Y-m-d', $date);
		$label = ($date == $today_stamp) ? 'Today' : date('m-d', $date);
		echo "<h1><a href=\"date.php?date=$date_val\">$label</a></h1>";
		
		echo "$team_id";

	$r2 = mysql_query("SELECT DISTINCT name, day AS dday, team_id
		FROM users, day_works
			WHERE  day = '$date_val' AND users.id = day_works.user_id AND team_id = '$team'
		ORDER by name ASC ");

	while ($row2 = mysql_fetch_array($r2)) { 
	
		$name= $row2['name'];
		echo "<br /><strong>" . $name. "</strong><br>\n";
	$dday= $row2['dday'] ;
	if ($date_val == $dday) 
	{
	$r3 = mysql_query("SELECT *
	 			FROM day_works, users 
	 			WHERE day = '$date_val' AND users.id = day_works.user_id AND name ='$name' AND team_id = '$team'
			ORDER by weight ASC");
	 	while ($row3 = mysql_fetch_array($r3)) {
	echo "" . $row3['title']. "<br />\n"; }


	  }
	//	else {echo $month . "-" . $i;}
	}
	echo "</td>";
	echo "\n";
	}
	echo "</tr></table>\n";	
	
	
	
}

/*  - -------------------------------------------------    end 2nd week  */

?>

<!-- footer area -->
<?php
include ("includes/right.php");
include ("includes/footer.php");
?>

