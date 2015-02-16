<?php
$user_id = ($_COOKIE["id"]);
include ('log.php');
include ('links.php');

	$did = ($_REQUEST['did']);
echo $id;

	
// delete DAYWORKS
$conn=mysql_connect("localhost:33066","hg","hg");
mysql_select_db("pm");

	$query="DELETE FROM notes 
	WHERE id=$did AND user_id = $user_id";
$result = mysql_query($query); 

echo "Deleted, Now go Home";
?>

<a href="/daily/dailypm/">Home</a>