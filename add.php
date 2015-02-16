<?php
include ('includes/head.php');

$result = mysql_query("
	SELECT * 
	FROM users 
	WHERE id = '$user_id'
	");
	
while($row = mysql_fetch_array($result))
  {
	
$manager = $row['manager'];
}

?> 
	<h1>Add Daily PM</h1>
</p>
<form name="add" method="post" action="index.php">
<h2>title: <INPUT TYPE="text" NAME="title" size="75" value=""><br />
	
	<?php

	if ($manager == "1")
	{
	echo "Name: <select name='user_id'>";
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
	}
	echo "</select>";	

	}
	else 
	{ 
		echo "<input type='hidden' name='user_id' value='";
		echo  $user_id;
		echo  "'>";
		echo "<br />";	


		}
	?>
<br />


date:	<script>DateInput('day', true, 'YYYY-MM-DD')</script>
	
Project	<select name="project_id">	
<?php		
	$r2 = mysql_query("SELECT *
	FROM projects
	ORDER by id ASC
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
 
</select>

<br />
	
Importance: 1 most; 5 least<br />
<input type="radio" name="weight" value="1"> 1 
<input type="radio" name="weight" value="2"> 2 
<input type="radio" name="weight" value="3"> 3 
<input type="radio" name="weight" value="4"> 4 
<input type="radio" name="weight" value="5"> 5<br>
 
<input type="hidden" name="updated_at" value="<?php date(); ?>"><br />

<INPUT TYPE="submit" name="submit" value="submit">
</form>

	 
    <!-- footer area -->
<?php
include ("includes/footer.php");
?>
