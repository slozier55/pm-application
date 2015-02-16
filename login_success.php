<?
session_start();
if(!session_is_registered(email)){
header("location:/daily/dailypm/main_login.php");
}
?>

<html>
<body>
<?php header("location:index.php"); ?>
</body>
</html>