<?php
include ('includes/head.php');

	$id = ($_REQUEST['did']);
// echo $id;

	
// delete DAYWORKS
	$query="DELETE FROM day_works 
	WHERE id='$id'";
$result = mysql_query($query);

echo "<h2>Deleted, now you can go <a href='/'>Home</a></h2>";
?>

