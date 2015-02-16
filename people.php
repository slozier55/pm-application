<?php
include ('includes/head.php');
?> 
<h1>People</h1>

<?php

$r2 = mysql_query("SELECT email, users.team_id, teams.id, users.name AS username, teams.name AS teamname, manager FROM users, teams WHERE users.team_id = teams.id ORDER by username ASC ");

while ($row2 = mysql_fetch_array($r2)) { echo "<table>"; echo "<tr>"; echo "<td>" . $row2['username'] . "</td>" ; echo "<td>" .$row2['email'] . "</td>"; echo "<td>" . $row2['teamname'] . "</td>"; echo "<td>" . "</td>" ;

 echo "</tr>"; } echo "</table>";

?>

<!-- footer area -->
<?php
include ("includes/right.php");
include ("includes/footer.php");
?>

