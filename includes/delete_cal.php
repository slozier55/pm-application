<?php
include ('head.php');

$result = mysql_query("
	SELECT * 
	FROM users 
	WHERE id = '$user_id'
	");
	
while($row = mysql_fetch_array($result))
  {

	$result = mysql_query("
		SELECT DISTINCT day 
		FROM day_works
		WHERE day >= CURDATE()  
		ORDER by day ASC
		");

	while($row = mysql_fetch_array($result))
	  {

	$day = $row['day'];
	if   ($row['day'] == date("Y-m-d"))
	echo "<h2>Today</h2>";

	else
	{ 
	echo "<h2>" . date("l n/d",strtotime("$day")) . "</h2>\n";
	}
	//  sub query needs this parameter
	 $a = $day;
	// echo $a;
	echo "<table border='1' width='700'><tr align='left'  >";
	echo "<th width='300'>Title</th> <th width='100'>Basecamp </th><th width='100'>Person </th>
	<th width='200'>Edit | Delete | Copy </th></tr>";
	 $r2 = mysql_query("SELECT user_id, day_works.project_id, day_works.id AS dayworksid, title, description, day, project_id, projects.id, projects.basecamp_id, users.name AS username
	 FROM day_works, projects, users 
	 WHERE  day = '$a' AND day_works.project_id = projects.id AND users.id = day_works.user_id 
	ORDER by title ASC");
	 while ($row2 = mysql_fetch_array($r2)) {

		echo "<tr align='left' >";

	echo "<td>". $row2['title']  . "</td>";
	echo "<td><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>Go to Project</a></td>";
	echo "<td>". $row2['username']  . "</td>";
	
	echo "<td><a href='edit.php?id=" . $row2['dayworksid'] . "'>Edit</a> | ";
	echo "<a href='delete.php?did=" . $row2['dayworksid'] . "'>Delete </a> | ";
	echo "<a href='copy.php?id=" . $row2['dayworksid'] . "'>Copy </a> ";
	echo "</td>";
	 // echo   $row2['description'];
	 }
	echo "</tr></table>"; 
	 }

}

//echo "a is " . $a;

?>


<?php 
function showMonth($month, $year)
{
$date = mktime(12, 0, 0, $month, 1, $year);
$daysInMonth = date("t", $date);
// calculate the position of the first day in the calendar (sunday = 1st column, etc)
$offset = date("w", $date);
$new_month_display = date("F", $date);
$new_year_display = date("Y", $date);
$num_month = date("n", $date);
$num_year = date("y", $date);
$rows = 1;
$today = date(d);
?>
<table border="0">
<tr>
<td><input type='button' value=' < ' onClick="window.location.href='index.php?month_display=<?php echo $num_month-1; ?>&year_display=<?php echo $num_year=$num_year; ?>'"> </td>
<td width=110><center><?php echo $new_month_display . " " . $new_year_display ?></center></td>
<td><input type='button' value=' > ' onClick="window.location.href='index.php?month_display=<?php echo $num_month+1; ?>&year_display=<?php echo $num_year=$num_year; ?>'"></td>
</tr>
</table> 

<?php

echo "<table width= '600' border=\"0\">\n";
echo "\t<tr><th>S</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th></tr>";
echo "\n\t<tr>";



for($i = 1; $i <= $offset; $i++)
{
	echo "<td></td>";
}



for($day = 1; $day <= $daysInMonth; $day++)
{
	if( ($day + $offset - 1) % 7 == 0 && $day != 1)
	{
		echo "</tr>\n\t<tr>";
		$rows++;
	}
	if($day == $today)
	{
	echo "<td>" . "<date.php?gdate=" . $num_year . "-" . $num_month . "-" . $day . "'>  <SPAN style='BACKGROUND-COLOR:#C0C0C0'>$day</SPAN>
	<br />" . $row2['title']. $a.  "</a>" . "</td>";
	}
	else
	echo "<td>" . "<a href='date.php?gdate=" . $num_year . "-" . $num_month . "-" . $day . "'> $day 	<br />" 

	
	. $row2['title'] . "</a>" . "</td>";
}
while( ($day + $offset) <= $rows * 7)
{
	echo "<td></td>";
	$day++;
}

echo "</tr>\n";
echo "</table>\n";
}

?>

<?php
/* $nextWeek = time() + (7 * 24 * 60 * 60);
                   // 7 days; 24 hours; 60 mins; 60secs
$now=  date('Y-m-d') ."\n";

echo 'Now:       '. $now ."\n";


echo 'Next Week: '. date('Y-m-d', $nextWeek) ."\n";
// or using strtotime():
echo 'Next Week: '. date('Y-m-d', strtotime('+2 week')) ."\n";


//for ($day = 1; $day <= 5; $day++) {
 //   echo $now;
//}

*/
$rows = 1;

echo '<table><tr>';
$start = strtotime("last Monday") ;
$day = date("d", $start);
$month = date("m", $start);
echo $month; 
for($i = $day; $i < ($day+5); $i++){
    echo '<td>'. $month . "/". $i . '</td>';
    if(($i + 1) % $rows == 0){
        echo '</tr></table>';
    }
}
echo "<br />";
echo "day" . $day;
$start = ($day+1) ;
$day = date("d", $start);
$month = date("m", $start);
echo $month; 
for($i = $day; $i < ($day+5); $i++){
    echo '<td>'. $month . "/". $i . '</td>';
    if(($i + 1) % $rows == 0){
        echo '</tr></table>';
    }
}

/*
function wdays($strTime = NULL){
    $arrWeekend = array("6","7"); // saturday and sunday
    $strTime = (is_null($strTime)) ? strtotime("+9 days") : $strTime;
    if(in_array(date("N", $strTime), $arrWeekend)){
        return wdays(strtotime("+1 day", $strTime));
    }
    else {
        return $strTime;
    }
}




$start = wdays();

// $start = strtotime("next Friday") ;
$day = date("d", $start);
$month = date("m", $start);
echo $month; 
for($i = $day; $i < ($day+5); $i++){
    echo '<td>'. $month . "/". $i . '</td>';
    if(($i + 1) % $rows == 0){
        echo '</tr><tr>';
    }
}



echo '</tr></table>';
echo "date" .date('y-m-d', 1278907209);

echo "<br />";
// echo "this Monday";
$start = strtotime("last Monday") ;
echo "<br />";
// echo $start;
echo "<br />";
// echo ($start+1);
$rows = 1;
for($i = $start; $i < ($start+2); $i++){
	$i =$i;
    echo '<td>Out'. $i . '<br /></td>';
    
        echo '</tr><tr>';
   
}
echo "<br />";
echo "works".date("Y-m-d",$i);

echo "<br />";


echo "<br />";
*/
?>



<?php 
if($_GET['month_display']=="" AND $_GET['year_display']==""){
$new_month_display = date(m);
$new_year_display = date(y);
}
else{
$new_month_display = $_GET['month_display'];
$new_year_display = $_GET['year_display'];
}
	showMonth($new_month_display, $new_year_display);
?>

