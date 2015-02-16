


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
<table border="0" width="200">
<tr>
<td><h2><?php echo $new_month_display . " " . $new_year_display ?></h2> </td>
<td><input type='button' value=' < ' onClick="window.location.href='?month_display=<?php echo $num_month-1; ?>&year_display=<?php echo $num_year=$num_year; ?>'"></td>
<td>    <input type='button' value=' > ' onClick="window.location.href='?month_display=<?php echo $num_month+1; ?>&year_display=<?php echo $num_year=$num_year; ?>'"></td>
</tr>
</table> 

<?php

echo "<table width='200' border=\"0\">\n";
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
	echo "<td>" . "<a href='date.php?date=20" . $num_year . "-" . $num_month . "-" . $day . "'> <SPAN style='BACKGROUND-COLOR:#C0C0C0'>$day</SPAN></a>" . "</td>";
	}
	else
	echo "<td>" . "<a href='date.php?date=20" . $num_year . "-" . $num_month . "-" . $day . "'> $day</a>" . "</td>";
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
</body>
</html>
