<?php
include ('includes/head.php');
?> 
	<h1>Edit When </h1>

<?php

$id = ($_GET['id']);

$r1 = mysql_query("SELECT *
FROM day_works
WHERE id = $id
ORDER by title ASC
");

while ($row = mysql_fetch_array($r1)) {
$title = $row['title'];
$day = $row['day'];
$id = $row['id'];
}
// echo $id;
?>

</p>
<form name="test" size= "100" method="post" action="index.php">
title: <INPUT TYPE="text" NAME="title" value="<?php echo $title ?>"><br />
date: <input type="text" name="day" value="<?php echo $day ?>"><br />
date: <input type="hidden" name="id" value="<?php echo $id ?>"><br />
 User: 
<select name="user_id">	
<?php		

$r2 = mysql_query("SELECT *
FROM users
ORDER by name ASC
");

while ($row = mysql_fetch_array($r2)) {
$id = $row['id'];
$name = $row['name'];
echo "<option value='";
echo  $id;
echo  "'>" .  $name;
echo "</option>";	
}
?>


<INPUT TYPE="submit" name="submit4" value="submit">
</form>
 <!-- ><a href="edit.php?id=<?php echo urlencode($sel_record['id']); ?>" onclick="return confirm('Are you sure you want to delete?');"> Delete Record </a>  -->
    <!-- footer area -->
<?php
include ("includes/footer.php");
?>