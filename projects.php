<?php
include ('includes/head.php');
?> 
	<h1>Projects</h1>

	<?php		


$r2 = mysql_query("SELECT *
	FROM projects
	ORDER by name ASC
	");

while ($row2 = mysql_fetch_array($r2)) {
echo "<table>";
echo "<tr>";
 echo   "<td>" . $row2['name'] . " &nbsp;</td>" ;
 echo    "<td> " .$row2['basecamp']  . "</td>";

 echo    "<td> &nbsp;<a target ='_blank' href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "'> Basecamp</a></td>";
	
	echo "</tr>";	
 }
echo "</table>";
?>


<!-- footer area -->

<?php
include ("includes/right.php");
include ("includes/footer.php");
?>