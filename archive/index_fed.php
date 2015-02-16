<?php
include ('includes/head.php');
include ('includes/submit.php');
?>


<?php
	echo "<table border='1' width='700'><tr align='left'>";
	    echo '<td>';
	// echo $bog;

	$start = strtotime("last Monday") ;
	$day = date("d", $start);
	$month = date("m", $start);
	$year = date("Y", $start);
	// echo $month; 
	for($i = $day; $i < ($day+5); $i++){
	$whole = $year ."-". $month . "-" . $i;
echo $month . "-" . $i;

echo "</tr><tr><td>";
$r2 = mysql_query("SELECT day, title
	 FROM day_works
	 WHERE  day = '$a' 
	ORDER by title ASC");
	 while ($row2 = mysql_fetch_array($r2)) {

		$title = $row2['title'];
		if ($whole == $a) {echo $month . "-" . $i ."<br>nothin";}
		else {echo $month . "-" . $i;}
		
}


	echo "</td>";
		

	
	  	       
echo '</tr></table>';
 }

?>


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
