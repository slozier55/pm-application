<?php
include ('includes/head.php');
if ($_REQUEST["teamid"] == "Development" ) 
$team = "1";
elseif ($_REQUEST["teamid"] == "Design") 
$team = "2";
else
$team = "0";

?> 

<?php

$result = mysql_query("SELECT name
		FROM users 
		WHERE  id = '$user_id'")
or die(mysql_error());  

$row = mysql_fetch_array( $result ); 

echo "Welcome,  ".$row['name'];

?>


	<h1>Teams and Peoples <?php echo $_REQUEST['teamid']; ?></h1>

	<?php
	$today = strtotime("today") ;
	$today = date("Y-m-d", $today);
	
/* You don't need me  		
$r2 = mysql_query("
	SELECT DISTINCT teams.name AS teamname
	FROM teams
	ORDER by teamname ASC
	");

while ($row2 = mysql_fetch_array($r2)) {
echo "<table>";
echo "<tr>";
 echo    "<td><a href='teams.php?teamid=" . $row2['teamname'] . "'>" . $row2['teamname'] . "</a></td>" ;
	echo "</tr>";	
 }
echo "</table>";
*/
		
if ($_REQUEST["teamid"] == "Development" ) 
$team = "1";
elseif ($_REQUEST["teamid"] == "Design") 
$team = "2";
else
$team = "0";

if ($team == "0")
{
	echo "<table border='1' width='750'> <tr>";
	if ($$dayofweek = "Monday")
	{$start = strtotime("Monday");}
	else 
		{$start = strtotime("last Monday");}
	$day = date("d", $start);
	$month = date("m", $start);
	$year = date("Y", $start);
	// echo $month; 
	for($i = $day; $i < ($day+5); $i++){
		$whole = $year ."-". $month . "-" . $i;
		echo  "<br><td width='150'"; 
	if ($today == $whole){
	echo "bgcolor='gray'";
	echo "><h1>Today</h1>";
	}
	else {
		echo "<h1>" . $month . "-" . $i. "</h1>";
	}
		$r2 = mysql_query("SELECT day AS dday, user_id, day_works.project_id, day_works.id AS dayworksid, title, description, project_id, projects.id, projects.basecamp_id, users.name AS username
	 			FROM day_works, projects, users 
	 			WHERE  day = '$whole' AND day_works.project_id = projects.id AND users.id = day_works.user_id
			ORDER by username ASC");
	 	while ($row2 = mysql_fetch_array($r2)) {

	$dday= $row2['dday'] ;

	if ($whole == $dday) 
	{echo "<br>" . $row2['username']. "<br> " .  $row2['title'];
	echo "<br /><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>BC | </a>";
		echo "<a href='edit.php?id=" . $row2['dayworksid'] . "'>E</a> | ";
		echo "<a href='delete.php?did=" . $row2['dayworksid'] . "'>D </a> | ";
	echo "<a href='copy.php?id=" . $row2['dayworksid'] . "'>C </a> ";
	}

	else {echo $month . "-" . $i;}

	}
	}
	echo "</tr></table>\n";

	echo "<table border='1' width='750'><tr>";
	$start = strtotime("next Monday") ;
	$day = date("d", $start);
	$month = date("m", $start);
	$year = date("Y", $start);
	for($i = $day; $i < ($day+5); $i++){
		$whole = $year ."-". $month . "-" . $i;
		echo  "<br><td width='150'"; 
	if ($today == $whole){
	echo "bgcolor='gray'";
	echo "><h1>Today</h1>";
	}
	else {
		echo "<h1>" . $month . "-" . $i. "</h1>";
	}
		$r2 = mysql_query("SELECT day AS dday, user_id, day_works.project_id, day_works.id AS dayworksid, title, description, project_id, projects.id, projects.basecamp_id, users.name AS username
	 			FROM day_works, projects, users 
	 			WHERE  day = '$whole' AND day_works.project_id = projects.id AND users.id = day_works.user_id 
			ORDER by username ASC");
	 	while ($row2 = mysql_fetch_array($r2)) {

			$dday= $row2['dday'] ;
			$title = $row2['title'] ;   
	if ($whole == $dday) 
	{echo "<br>" . $row2['username']. "<br> " .  $row2['title'];
		echo "<br /><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>BC | </a>";
			echo "<a href='edit.php?id=" . $row2['dayworksid'] . "'>E</a> | ";
			echo "<a href='delete.php?did=" . $row2['dayworksid'] . "'>D </a> | ";
		echo "<a href='copy.php?id=" . $row2['dayworksid'] . "'>C </a> ";
		}

	else {echo $month . "-" . $i;}

	}
	}
	echo "</tr></table>\n";
	}

else
{

echo "<table border='1' width='750'> <tr>";
if ($$dayofweek = "Monday")
{$start = strtotime("Monday");}
else 
	{$start = strtotime("last Monday");}
$day = date("d", $start);
$month = date("m", $start);
$year = date("Y", $start);
// echo $month; 
for($i = $day; $i < ($day+5); $i++){
	$whole = $year ."-". $month . "-" . $i;
	echo  "<br><td width='150'"; 
if ($today == $whole){
echo "bgcolor='gray'";
echo "><h1>Today: " . $month . "-" . $i. "</h1>";
}
else {
	echo "<h1>" . $month . "-" . $i. "</h1>";
}
	$r2 = mysql_query("SELECT day AS dday, user_id, day_works.project_id, day_works.id AS dayworksid, title, description, project_id, projects.id, projects.basecamp_id, users.name AS username
 			FROM day_works, projects, users 
 			WHERE  day = '$whole' AND day_works.project_id = projects.id AND users.id = day_works.user_id AND users.team_id = '$team'
		ORDER by username ASC");
 	while ($row2 = mysql_fetch_array($r2)) {

$dday= $row2['dday'] ;

if ($whole == $dday) 
{echo "<br>" . $row2['username']. "<br> " .  $row2['title'];
echo "<br /><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>BC | </a>";
	echo "<a href='edit.php?id=" . $row2['dayworksid'] . "'>E</a> | ";
	echo "<a href='delete.php?did=" . $row2['dayworksid'] . "'>D </a> | ";
echo "<a href='copy.php?id=" . $row2['dayworksid'] . "'>C </a> ";
}

else {echo $month . "-" . $i;}

}
}
echo "</tr></table>\n";

echo "<table border='1' width='750'><tr>";
$start = strtotime("next Monday") ;
$day = date("d", $start);
$month = date("m", $start);
$year = date("Y", $start);
// echo $month; 
for($i = $day; $i < ($day+5); $i++){
	$whole = $year ."-". $month . "-" . $i;
	echo  "<br><td width='150'"; 
if ($today == $whole){
echo "bgcolor='gray'";
echo "><h1>Today: " . $month . "-" . $i. "</h1>";
}
else {
	echo "<h1>" . $month . "-" . $i. "</h1>";
}
	$r2 = mysql_query("SELECT day AS dday, user_id, day_works.project_id, day_works.id AS dayworksid, title, description, project_id, projects.id, projects.basecamp_id, users.name AS username
 			FROM day_works, projects, users 
 			WHERE  day = '$whole' AND day_works.project_id = projects.id AND users.id = day_works.user_id AND users.team_id = '$team'
		ORDER by username ASC");
 	while ($row2 = mysql_fetch_array($r2)) {

		$dday= $row2['dday'] ;
		$title = $row2['title'] ;   
		{echo "<br>" . $row2['username']. "<br> " .  $row2['title'];
		echo "<br /><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>BC | </a>";
			echo "<a href='edit.php?id=" . $row2['dayworksid'] . "'>E</a> | ";
			echo "<a href='delete.php?did=" . $row2['dayworksid'] . "'>D </a> | ";
		echo "<a href='copy.php?id=" . $row2['dayworksid'] . "'>C </a> ";
		}

}
}
echo "</tr></table>\n";
}

?>

</p>

  
<!-- footer area -->
<?php
include ("includes/right.php");
include ("includes/footer.php");
?>

