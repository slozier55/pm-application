<?php
include ('includes/head.php');

$id = ($_REQUEST['did']);
// echo $id;

// delete wheneverworks

	$query="UPDATE whenever_works 
	SET DONE='YES'
	WHERE id='$id' AND user_id = '$user_id'";
$result = mysql_query($query);

echo "Good Work, Now go ";
?>

<a href="index.php">Home</a>