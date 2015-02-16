<?php
$host="localhost:3306"; // Host name
$username="hg"; // Mysql username
$password="hg"; // Mysql password
$db_name="pm"; // Database name
$tbl_name="users"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form
$email=$_POST['email'];
$password=$_POST['password'];

// To protect MySQL injection 
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM $tbl_name WHERE email='$email' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);
// If result matched $email and $password, table row must be 1 row
while($row = mysql_fetch_array($result))
  {

$id= $row['id'];
setcookie("id", $id);
}
if($count==1){
// Register $email, $mypassword and redirect to file "login_success.php"
session_register("email");
session_register("password");
header("location:/daily/dailypm/index.php");
}
else {
echo "Wrong Username or Password";
}
?>