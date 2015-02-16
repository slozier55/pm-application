<?php
include ('includes/head.php');

	$did = ($_REQUEST['did']);
echo $id;

	
// delete DAYWORKS
	$query="DELETE FROM whenever_works
	WHERE id=$did AND user_id = $user_id" ;
$result = mysql_query($query); 

echo "Deleted, Now go Home";
?>

<a href="/">Home</a>