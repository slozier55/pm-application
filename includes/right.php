<div id="note">
	<?php


	$result = mysql_query("SELECT name
			FROM users 
			WHERE  id = '$user_id'")
	or die(mysql_error());  

	$row = mysql_fetch_array( $result ); 

	echo "<h2>".$row['name']. "</h2>";

	?>
 <a href="index.php"> Home Cal </a>
		<br />
	<h2> Add New </h2>
<a href="add.php">Daily Task</a> <br />
<a href="add_notes.php">Note</a><br />
<a href="addwhen_ever.php">Whenever</a><br />
<hr />
<!-- ********************** Notes ***********************  -->
<h2> MY Notes </h2>
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
<hr /><br />

<!-- ********************** When Ever Works ***********************  -->
<h2> My Whenever  </h2>

	
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
	<hr /><br />
<?php include ("includes/cal.php"); ?>
<hr />

Key: BaseCamp; (E)dit (D)elete (C)opy

</div>
