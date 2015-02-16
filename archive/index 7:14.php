<?php
include ('includes/head.php');
include ('includes/submit.php');
?>


<?php

$result = mysql_query("
	SELECT * 
	FROM users 
	WHERE id = '$user_id'
	");
	
while($row = mysql_fetch_array($result))
  {

$manager = $row['manager'];
if   ($row['manager'] == "1")
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
	//  sub query needs this parameter
	 $a = $day;
	echo "Date from Q" .$a;
	echo "<br />";
	echo "<table border='1' width='700'><tr align='left'>";
	
	echo $bog;

	$start = strtotime("last Monday") ;
	$day = date("d", $start);
	$month = date("m", $start);
	$year = date("Y", $start);
	// echo $month; 
	for($i = $day; $i < ($day+5); $i++){
	$whole = $year ."-". $month . "-" . $i;
	    echo '<td>'; 


	
	
	 $r2 = mysql_query("SELECT user_id, day_works.project_id, day_works.id AS dayworksid, title, description, day, project_id, projects.id, day, projects.basecamp_id, users.name AS username
	 FROM day_works, projects, users 
	 WHERE  day = '$a' AND day_works.project_id = projects.id AND users.id = day_works.user_id 
	ORDER by title ASC");
	 while ($row2 = mysql_fetch_array($r2)) {


     $title = $row2['title'];

	if ($whole == $a) {echo $month . "-" . $i ."<br>$title";}
	else {echo $month . "-" . $i;}
	
	
	
	echo "</td>";
	
	 
	
	
	}
	  	        }
echo '<td></tr>';
	 }
}
else
{echo "<h2>worker</h2>\n";

// ***************************************************************************** worker 
		
// echo $user_id;

$result = mysql_query("
	SELECT DISTINCT day 
	FROM day_works
	WHERE day >= CURDATE()  AND user_id = '$user_id'
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
echo "<table border='1' width='650'><tr align='left'  >";
echo "<th width='300'>Title</th> <th width='100'>Basecamp </th><th width='100'>Person </th><th width='200'>Do </th></tr>";
 $r2 = mysql_query("SELECT user_id, day_works.project_id, day_works.id AS dayworksid, title, description, day, project_id, projects.id, projects.basecamp_id, users.name AS username
 FROM day_works, projects, users 
 WHERE  day = '$a' AND day_works.project_id = projects.id AND users.id = day_works.user_id AND user_id = '$user_id'
ORDER by title ASC");
 while ($row2 = mysql_fetch_array($r2)) {
		
	echo "<tr align='left' >";
echo "<td>". $row2['day']  . "</td>";	
echo "<td>". $row2['title']  . "</td>";
echo "<td><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>Go to Project</a></td>";
echo "<td>". $row2['username']  . "</td>";
echo "<td><a href='edit.php?did=" . $row2['dayworksid'] . "'>Edit</a> | ";
echo "<a href='delete.php?did=" . $row2['dayworksid'] . "'>Delete </a> | ";
echo "<a href='copy.php?cid=" . $row2['dayworksid'] . "'>Copy </a> ";
$rows = 1;

//$bog = "$row2['days']";
echo $bog;

$start = strtotime("last Monday") ;
$day = date("d", $start);
$month = date("m", $start);
$year = date("Y", $start);
// echo $month; 
for($i = $day; $i < ($day+5); $i++){
$whole = $year ."-". $month . "-" . $i;
    echo '<td>'; 
if ($whole == $bog) {echo $month . "-" . $i ."<br>a";}
else {echo $month . "-" . $i;}
	echo '  </td>';
	  	        }
echo '<td></tr>';
  

echo '<tr>';
$start = strtotime("next Monday") ;
$day = date("d", $start);
$month = date("m", $start);
$year = date("Y", $start);
// echo $month; 
for($i = $day; $i < ($day+5); $i++){
    $whole = $year ."-". $month . "-" . $i;
	    echo '<td>'; 
	if ($whole == $bog) {echo $month . "-" . $i ."<br>a";}
	else {echo $month . "-" . $i;}
		echo '  </td>';
	}
		    echo '</tr></table>';


echo "</td>";
 }
echo "</tr></table>"; 
 }



}
}

// include ('includes/cal.php');
?>

<?php
$rows = 1;

$bog = "$a";
echo $bog;
echo '<table><tr align="top">';
$start = strtotime("last Monday") ;
$day = date("d", $start);
$month = date("m", $start);
$year = date("Y", $start);
// echo $month; 
for($i = $day; $i < ($day+5); $i++){
$whole = $year ."-". $month . "-" . $i;
    echo '<td>'; 
if ($whole == $bog) {echo $month . "-" . $i ."<br>a";}
else {echo $month . "-" . $i;}
	echo '  </td>';
	  	        }
echo '<td></tr></table>';
  

echo '<table><tr>';
$start = strtotime("next Monday") ;
$day = date("d", $start);
$month = date("m", $start);
$year = date("Y", $start);
// echo $month; 
for($i = $day; $i < ($day+5); $i++){
    $whole = $year ."-". $month . "-" . $i;
	    echo '<td>'; 
	if ($whole == $bog) {echo $month . "-" . $i ."<br>a";}
	else {echo $month . "-" . $i;}
		echo '  </td>';
	}
		    echo '</tr></table>';
 
?>

</p>
<hr/ >


<!-- ********************** When Ever Works ***********************  -->
<p><strong> My Whenever Works </strong>
	<a href="addwhen_ever.php">Add New</a>
<?php 



$result2 = mysql_query("SELECT * 
	FROM whenever_works
	WHERE user_id = '$user_id' AND done = 'NO'
	ORDER by created_at ASC
	");

while($row3 = mysql_fetch_array($result2))
  {

echo "<p>" . $row3['title']  . "  ";
echo "<a href='wheneverdelete.php?did=" . $row3['id'] . "'>Delete </a> | ";
echo "<a href='wheneverdone.php?did=" . $row3['id'] . "'>Done </a> </p> ";
}


?>
<hr />
<!-- ********************** Notes ***********************  -->
<p><strong> Mi Notas </strong>
<a href="add_notes.php">Add New</a></p>
<?php 
$result2 = mysql_query("SELECT * 
	FROM notes
	WHERE user_id = '$user_id'
	ORDER by created_at ASC
	");

while($row3 = mysql_fetch_array($result2))
  {

echo "<p>" . $row3['detail']  . "  ";
echo "<a href='notesdelete.php?did=" . $row3['id'] . "'>Delete </a> </p> ";
}


?>
    <!-- footer area -->
<?php
include ("includes/footer.php");
?>
