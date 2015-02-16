<?php
// insert DAYWORKS
if(isset($_POST['submit'])){

	$title = $_POST['title'];
	$day = $_POST['day'];
	$duser_id = $_POST['user_id'];  // avoid collision with cookie
		$weight = $_POST['weight'];
		$project_id = $_POST['project_id'];
		$updated_at = $_POST['updated_at'];
	$query="INSERT into day_works (title,day,user_id,weight,project_id, updated_at) values ('$title','$day','$duser_id','$weight','$project_id'
		,'$updated_at')";
$result = mysql_query($query);
}

// insert WHENEVER
if(isset($_POST['submit2'])){


	$user_id = $_POST['user_id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
		$done = $_POST['done'];
	$query="INSERT into whenever_works (user_id,title,description,done) values ('$user_id','$title','$description','$done')";
$result = mysql_query($query);
}


// insert NOTES
if(isset($_POST['submit3'])){
	$user_id = $_POST['user_id'];
	$detail = $_POST['detail'];
	$query="INSERT into notes (user_id,detail) values ('$user_id','$detail')";
$result = mysql_query($query);
}

// update/ edit DAILY 

if(isset($_POST['submit4'])){
	$title = $_POST['title'];
	$day = $_POST['day'];
	$nuser_id = $_POST['user_id'];
	$weight = $_POST['weight'];
	$id = $_POST['id'];
	$query="UPDATE day_works SET title='$title', day='$day', user_id='$nuser_id', weight='$weight'
	WHERE id = $id";
$result = mysql_query($query);

}
?>