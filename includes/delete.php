<?php
$user_id = ($_COOKIE["id"]);
include ('log.php');
include ('links.php');

	$id = ($_REQUEST['did']);
echo $id;

	
// delete DAYWORKS
$conn=mysql_connect("localhost:33066","hg","hg");
mysql_select_db("pm");

	$query="DELETE FROM day_works 
	WHERE id='$id'";
$result = mysql_query($query);

echo "Deleted, Now go Home";
?>

<a href="/daily/dailypm/">Home</a>