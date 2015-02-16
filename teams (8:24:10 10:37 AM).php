<?php
include ('includes/head.php');
if ($_REQUEST["teamid"] == "Development" ) 
$team = "1";
elseif ($_REQUEST["teamid"] == "Design") 
$team = "2";
else
$team = "0";

$today = strtotime("today") ;
$today = date("Y-m-d", $today);

?> 
<h1>Teams <?php echo $_REQUEST['teamid']; ?></h1>



<?php
	
if ($team == "0")
{
/*  - -------------------------------------------------    begin first week  */

echo "\n <table border='1' width='750'><tr> \n";

if ($dayofweek == "Monday")
{$start = strtotime("Monday");}
else 
	{$start = strtotime("last Monday");}

$day = date("j", $start);
$month = date("m", $start);
$year = date("Y", $start);
$dayofweek = date("l");
$whole = $year ."-". $month . "-" . $i;

for($i = $day; $i < ($day+5); $i++){
		if ($i<10)
		$whole = $year ."-". $month . "-0" . $i;
		else 
		$whole = $year ."-". $month . "-" . $i;
	echo  "\n<td width='150'"; 
if ($today == $whole){
echo "bgcolor='#CCC'";

echo "><h1><a href='date.php?date=" . $whole. "'>Today</a></h1>";
}
else {
	echo "<h1><a href='date.php?date=" . $whole . "'>" . $month . "-" . $i. "</a></h1>";
}


$r2 = mysql_query("SELECT DISTINCT name, day AS dday
	FROM users, day_works
		WHERE  day = '$whole' AND users.id = day_works.user_id
	ORDER by name ASC ");

while ($row2 = mysql_fetch_array($r2)) { 
	$name= $row2['name'];
	echo "<br /><h2>" . $name. "</h2>\n";
$dday= $row2['dday'] ;
if ($whole == $dday) 
{
$r3 = mysql_query("SELECT *
 			FROM day_works, users 
 			WHERE day = '$whole' AND users.id = day_works.user_id AND name ='$name'
		ORDER by weight ASC");
 	while ($row3 = mysql_fetch_array($r3)) {
echo "- " . $row3['title']. "<br />\n"; }
	

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
	{$start = strtotime("Monday");}
	else 
		{$start = strtotime("last Monday");}

	$day = date("j", $start);
	$month = date("m", $start);
	$year = date("Y", $start);
	$dayofweek = date("l");
	$whole = $year ."-". $month . "-" . $i;

	for($i = $day; $i < ($day+5); $i++){
			if ($i<10)
			$whole = $year ."-". $month . "-0" . $i;
			else 
			$whole = $year ."-". $month . "-" . $i;
		echo  "\n<td width='150'"; 
	if ($today == $whole){
	echo "bgcolor='#CCC'";

echo "><h1><a href='date.php?date=" . $whole. "'>Today</a></h1>";
	}
	else {
		echo "<h1><a href='date.php?date=" . $whole . "'>" . $month . "-" . $i. "</a></h1>";
	}
echo "$team_id";

	$r2 = mysql_query("SELECT DISTINCT name, day AS dday, team_id
		FROM users, day_works
			WHERE  day = '$whole' AND users.id = day_works.user_id AND team_id = '$team'
		ORDER by name ASC ");

	while ($row2 = mysql_fetch_array($r2)) { 
	
		$name= $row2['name'];
		echo "<br /><h2>" . $name. "</h2>\n";
	$dday= $row2['dday'] ;
	if ($whole == $dday) 
	{
	$r3 = mysql_query("SELECT *
	 			FROM day_works, users 
	 			WHERE day = '$whole' AND users.id = day_works.user_id AND name ='$name' AND team_id = '$team'
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
$whole = $year ."-". $month . "-" . $i;

for($i = $day; $i < ($day+2); $i++){
		if ($i<10)
		$whole = $year ."-". $month . "-0" . $i;
		else 
		$whole = $year ."-". $month . "-" . $i;
	echo  "\n<td width='150'"; 
if ($today == $whole){
echo "bgcolor='#CCC'";

echo "><h1><a href='date.php?date=" . $whole. "'>Today</a></h1>";
}
else {
	echo "<h1><a href='date.php?date=" . $whole . "'>" . $month . "-" . $i. "</a></h1>";
}


$r2 = mysql_query("SELECT DISTINCT name, day AS dday
	FROM users, day_works
		WHERE  day = '$whole' AND users.id = day_works.user_id
	ORDER by name ASC ");

while ($row2 = mysql_fetch_array($r2)) { 

	$name= $row2['name'];
	echo "<br /><h2>" . $name. "</h2>\n";
$dday= $row2['dday'] ;
if ($whole == $dday) 
{
$r3 = mysql_query("SELECT *
 			FROM day_works, users 
 			WHERE day = '$whole' AND users.id = day_works.user_id AND name ='$name'
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
	$whole = $year ."-". $month . "-" . $i;

	for($i = $day; $i < ($day+5); $i++){
			if ($i<10)
			$whole = $year ."-". $month . "-0" . $i;
			else 
			$whole = $year ."-". $month . "-" . $i;
		echo  "<br>\n<td width='150'"; 
	if ($today == $whole){
	echo "bgcolor='#CCC'";

echo "><h1><a href='date.php?date=" . $whole. "'>Today</a></h1>";
	}
	else {
		echo "<h1><a href='date.php?date=" . $whole . "'>" . $month . "-" . $i. "</a></h1>";
	}
echo "$team_id";

	$r2 = mysql_query("SELECT DISTINCT name, day AS dday, team_id
		FROM users, day_works
			WHERE  day = '$whole' AND users.id = day_works.user_id AND team_id = '$team'
		ORDER by name ASC ");

	while ($row2 = mysql_fetch_array($r2)) { 
	
		$name= $row2['name'];
		echo "<br /><strong>" . $name. "</strong><br>\n";
	$dday= $row2['dday'] ;
	if ($whole == $dday) 
	{
	$r3 = mysql_query("SELECT *
	 			FROM day_works, users 
	 			WHERE day = '$whole' AND users.id = day_works.user_id AND name ='$name' AND team_id = '$team'
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

