<? 
$user_id = ($_COOKIE["id"]);
include ('log.php');
include ('db.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Daily PM</title>

<link rel = "stylesheet" type="text/css" href="css/sitewide.css" >

<script type="text/javascript" src="js/ts_picker.js"></script>
<script type="text/javascript" src="js/mootools.js"></script>
<script type="text/javascript" src="js/cal.js"></script>

</head>
<body>

<?php
include ('mlinks.php');
?>	
	<div id="time">
