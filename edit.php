<?php
include ('includes/head.php');
?> 
	<h1>Edit Daily</h1>

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
$user_id = $row['user_id'];
}
// echo $id;
?>

</p>
<form name="test" size= "100" method="post" action="index.php">
<h2>title: <INPUT TYPE="text" NAME="title" size= "100" value="<?php echo $title ?>"><br />
	
	Importance: 1 -5 <br />
	<input type="radio" name="weight" value="1"> 1 
	<input type="radio" name="weight" value="2"> 2 
	<input type="radio" name="weight" value="3"> 3 
	<input type="radio" name="weight" value="4"> 4 
	<input type="radio" name="weight" value="5"> 5<br>
date:	<script>DateInput('day', true, 'YYYY-MM-DD')</script>


<input type="hidden" name="id" value="<?php echo $id ?>"><br />
 User: 
<input type="hidden" name="user_id" value="<?php echo $user_id ?>"><br />

<INPUT TYPE="submit" name="submit4" value="submit">
</form>

<?php
include ("includes/footer.php");
?>