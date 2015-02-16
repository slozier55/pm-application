<?php
include ('includes/head.php');

// copy DAYWORKS
if(isset($_REQUEST['cid'])){
$cid = ($_REQUEST['cid']);
}
$result = mysql_query("
	SELECT *
	FROM day_works
	WHERE id = '$cid'
	");
while($row = mysql_fetch_array($result))
  {
$title = $row['title'];
$day = $row['day'];
$project_id = $row['project_id'];

}


?>
<form name="add" method="post" action="index.php?id=<?php echo $user_id ?>">
title: <INPUT TYPE="text" NAME="title" value="<?php echo $title ?>"><br />

<?php 



if(isset($day)) 
{ 
    	echo 'date: <INPUT TYPE="text" NAME="day" value="';
 		echo $day;
		echo '">'; 
} 
else 
{ 
    echo "date:	<script>DateInput('day', true, 'YYYY-MM-DD')</script>";
}	

?>
	
<INPUT TYPE="hidden" NAME="project_id" value="<?php echo $project_id ?>"><br />
<input type="hidden" name="user_id" value="<?php echo $user_id ?>"><br />
<input type="hidden" name="updated_at" value="<?php date(); ?>"><br />

<INPUT TYPE="submit" name="submit" value="submit">
</form>

<?php

include ("includes/footer.php");
?>
