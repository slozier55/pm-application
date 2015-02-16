<?php
include ('includes/head.php');
if (isset($_GET["date"])){
$gdate = $_GET["date"]; }
else {
	$gdate = "2010-07-22";}

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

<h1><?php echo $ggdate; ?></h1>

<a href="date.php?date=<?php echo $num_year; ?>-<?php echo $num_month; ?>-<?php echo $num_day-1; ?>"> < </a>
 
<a href="date.php?date=<?php echo $num_year; ?>-<?php echo $num_month; ?>-<?php echo $num_day+1; ?>"> > </a> 

<a href="date.php?date=<?php echo $gdate; ?>"> All </a>
<a href="date.php?date=<?php echo $gdate; ?>&teamid=Design">Design </a>
<a href="date.php?date=<?php echo $gdate; ?>&teamid=Development">Dev </a>


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
		echo "<br /><H2>" . $name. "</H2>\n";
	$dday= $row2['dday'] ;
	
	$r3 = mysql_query("SELECT *, day_works.id AS dayworksid
	 			FROM day_works, users 
	 			WHERE day = '$gdate' AND users.id = day_works.user_id AND name ='$name' 
			ORDER by weight, title ASC");
	 	while ($row3 = mysql_fetch_array($r3)) {
	echo "- " .$row3['title']. "   \n"; 		
// 	echo "<br /><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>BC | </a>";
				echo "<a href='edit.php?id=" . $row3['dayworksid'] . "'>E</a> | ";
				echo "<a href='delete.php?did=" . $row3['dayworksid'] . "'>D </a> | ";
			echo "<a href='copy.php?cid=" . $row3['dayworksid'] . "'>C </a> <br />";}
	

}
	
	
?>
<!-- footer area -->
<?php
include ("includes/right.php");
include ("includes/footer.php");
?>

