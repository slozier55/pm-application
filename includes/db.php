<?php
$con = mysql_connect("localhost:3066","pm","g!@77hoLT");
// local is hg hg
if (!$con)
  {
  die('Could not connect man: ' . mysql_error());
  }

mysql_select_db("pm", $con);

?>
