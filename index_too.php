<?php
$browser = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
if ($browser == true)  { header("Location: mindex.php");  }
else
?>
<?php
include ('includes/head.php');
include ('includes/submit.php');
?>

<?php
$today = strtotime("today") ;
$today = date("Y-m-d", $today);

$result = mysql_query("SELECT name
		FROM users 
		WHERE  id = '$user_id'")
or die(mysql_error());  

$row = mysql_fetch_array( $result ); 

?>
<h1> Daily PM</h1>
<?php 	
$result = mysql_query("
	SELECT * 
	FROM users 
	WHERE id = '$user_id'
	");
	
while($row = mysql_fetch_array($result))
  {
	
$manager = $row['manager'];
$team_id = $row['team_id'];

if   ($row['manager'] == "1")
{ echo "Manager View";
	echo "\n <table border='1' width='750'><tr> \n";
	
	if ($dayofweek == "Monday")
	{$start = strtotime("Monday");}
	else 
		{$start = strtotime("last Monday");}


	$day = date("j", $start);
	
	$month = date("m", $start);
	$year = date("Y", $start);
	$dayofweek = date("l");
	$whole = $year ."-". $month . "-" . $day;

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
	
	elseif ($whole == '2010-08-13') {
		echo "><h1><a href='date.php?date=" . $whole . "'>Friday the 13th</a></h1>";
	}
	
	
	else {
		echo "><h1><a href='date.php?date=" . $whole . "'>" . $month . "-" . $i. "</a></h1>";
	}


	$r2 = mysql_query("SELECT DISTINCT name, day AS dday
		FROM users, day_works
			WHERE  day = '$whole' AND users.id = day_works.user_id
		ORDER by name ASC ");

	while ($row2 = mysql_fetch_array($r2)) { 
	
	
		$name= $row2['name'];
		
// 	echo $whole . " " . $dday;	
		
		
			echo "<br /><h2>    " . $name. "</h2>\n";
	$dday= $row2['dday'] ;
	if ($whole == $dday) 
	{
	$r3 = mysql_query("SELECT *
	 			FROM day_works, users 
	 			WHERE day = '$whole' AND users.id = day_works.user_id AND name ='$name'
			ORDER by weight ASC");
	 	while ($row3 = mysql_fetch_array($r3)) {
	echo "- " . $row3['title']. "<br />\n"; 
}
	  }
	// 	else {echo $month . "-" . $i;}
	}
	echo "</td>";
	echo "\n";
	}
	echo "</tr></table>\n<br />";
	

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
// echo $whole;
	for($i = $day; $i < ($day+2); $i++){
		if ($i<10)
		$whole = $year ."-". $month . "-0" . $i;
		elseif ($i<31)
		$whole = "";
		else 
		$whole = $year ."-". $month . "-" . $i;
		echo  "\n<td width='150'"; 
	if ($today == $whole){
	echo "bgcolor='#CCC'";
	echo "><h1><a href='date.php?date=" . $whole. "'>Today</a></h1>";
	}
	else {
		echo "><h1><a href='date.php?date=" . $whole . "'>" . $month . "-" . $i. "</a></h1>";
	}


	$r2 = mysql_query("SELECT DISTINCT name, day AS dday
		FROM users, day_works
			WHERE  day = '$whole' AND users.id = day_works.user_id
		ORDER by name ASC ");

	while ($row2 = mysql_fetch_array($r2)) { 
		//echo "<table>"; 
		//echo "<tr>\n"; 
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
	echo $row3['title']. "<br />\n"; 
	}
	  }
		else {echo $month . "-" . $i;}
	}
	echo "</td>";
	echo "\n";
	}
	echo "</tr></table>\n";

}

// ***********************************************  worker  ***************************************************** 

elseif ($team_id == "3")
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=teams.php">';    
	   exit;
}
else
{ 	
	

	echo "<table border='1' width='750'> <tr>";
	
	if ($$dayofweek == "Monday")
	{$start = strtotime("Monday");}
	else 
		{$start = strtotime("last Monday");}
	$day = date("j", $start);
	$month = date("m", $start);
	$year = date("Y", $start);

	for($i = $day; $i < ($day+5); $i++){

		if ($i<10)
		$whole = $year ."-". $month . "-0" . $i;
		else 
		$whole = $year ."-". $month . "-" . $i;
		echo  "<br><td width='150'"; 
		if ($today == $whole){
		echo "bgcolor='gray'";
		echo "><h1><a href='date.php?date=" . $whole. "'>Today</a></h1>";
	}
		else {
			echo "><h1><a href='date.php?date=" . $whole . "'>" . $month . "-" . $i. "</a></h1>";
		}
		$r2 = mysql_query("SELECT day AS dday, user_id, day_works.project_id, day_works.id AS dayworksid, title, description, project_id, projects.id, projects.basecamp_id, users.name AS username
	 			FROM day_works, projects, users 
	 			WHERE  day = '$whole' AND day_works.project_id = projects.id AND users.id = day_works.user_id AND users.id = '$user_id'
			ORDER by username ASC");
	 	while ($row2 = mysql_fetch_array($r2)) {

	$dday= $row2['dday'] ;
// echo $dday;
// echo $whole;
	if ($whole == $dday) 
	{echo "<br>" . $row2['title'];
	echo "<br /><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>BC | </a>";
		echo "<a href='edit.php?id=" . $row2['dayworksid'] . "'>E</a> | ";
		echo "<a href='delete.php?did=" . $row2['dayworksid'] . "'>D </a> | ";
	echo "<a href='copy.php?cid=" . $row2['dayworksid'] . "'>C </a> ";
	}

	// else {echo $month . "-" . $i;}

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
		if ($i<10)
		$whole = $year ."-". $month . "-0" . $i;
		else 
		$whole = $year ."-". $month . "-" . $i;
		echo  "<br><td width='150'"; 
		if ($today == $whole){
		echo "bgcolor='gray'";
		echo "><h1>Today " . $month . "-" . $i. "</h1>";
	}
		else {
			echo "><h1><a href='date.php?date=" . $whole . "'>" . $month . "-" . $i. "</a></h1>";
		}
		$r2 = mysql_query("SELECT day AS dday, user_id, day_works.project_id, day_works.id AS dayworksid, title, description, project_id, projects.id, projects.basecamp_id, users.name AS username
	 			FROM day_works, projects, users 
	 			WHERE  day = '$whole' AND day_works.project_id = projects.id AND users.id = day_works.user_id AND users.id = '$user_id'
			ORDER by username ASC");
	 	while ($row2 = mysql_fetch_array($r2)) {

			$dday= $row2['dday'] ;
			$title = $row2['title'] ;   
			if ($whole == $dday) 
			{echo "<br>" . $row2['title'];
			echo "<br /><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>BC | </a>";
				echo "<a href='edit.php?id=" . $row2['dayworksid'] . "'>E</a> | ";
				echo "<a href='delete.php?did=" . $row2['dayworksid'] . "'>D </a> | ";
			echo "<a href='copy.php?cid=" . $row2['dayworksid'] . "'>C </a> ";
			}
	else {echo $month . "-" . $i;}
	}
	}
	echo "</tr></table>\n";
}
}

?>


<!-- footer area -->
<?php
include ("includes/right.php");
include ("includes/footer.php");
?>
