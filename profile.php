<?php
?>
<?php
include ('includes/head.php');
$user_id = ($_COOKIE["id"]);
// update User 
if(isset($_POST['submit5'])){
	
	$password = $_POST['password'];
	$joy = $_POST['joy'];
	$query="UPDATE users SET password='$password', joy='$joy'
	WHERE id = $user_id";
$result = mysql_query($query);
echo "<h1>Updated!</h1>";
}
?>

<h1> Profile</h1>
<?php
	
$result = mysql_query("
	SELECT * 
	FROM users 
	WHERE id = '$user_id'
	");
	
while($row = mysql_fetch_array($result))
  {
	
$email = $row['email'];
$password = $row['password'];
$joy = $row['joy'];

}
?>
<form name="test" size= "100" method="post" action="profile.php">
<h2>Your Email: <INPUT TYPE="text" NAME="email" size= "50" value="<?php echo $email ?>"><br />
<h2>Change your Password <INPUT TYPE="text" NAME="password" size= "25" value="<?php echo $password ?>"><br />
<h2>Tell us your Greatest Joy: <INPUT TYPE="text" NAME="joy" size= "70" value="<?php echo $joy ?>"><br />
</select>
<INPUT TYPE="submit" name="submit5" value="update">
</form>


<!-- footer area -->
<?php
include ("includes/right.php");
include ("includes/footer.php");
?>
