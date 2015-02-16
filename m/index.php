<?php
$user_id = ($_COOKIE["id"]);
include ('../includes/log.php');
include ('../includes/db.php');
include ('../includes/submit.php');
?>
<html>
    <head>
        <title>Daily PM   </title>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        <link rel="stylesheet" type="text/css" href="iphone.css" media="only screen and (max-width: 480px)" />
        <link rel="stylesheet" type="text/css" href="desktop.css" media="screen and (min-width: 481px)" />
        <!--[if IE]> 
        <link rel="stylesheet" type="text/css" href="explorer.css" media="all" /> 
        <![endif]-->
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="iphone.js"></script>
    </head>
    <body>
	
	<?php
require_once('links.php');
?>

<div id="content">   

<?php



$result = mysql_query("
	SELECT * 
	FROM users 
	WHERE id = '$user_id'
	");
	
while($row = mysql_fetch_array($result))
  {

$manager = $row['manager'];
if   ($row['manager'] == "1")
{ 
	$result = mysql_query("
		SELECT DISTINCT day 
		FROM day_works
		WHERE day >= CURDATE()  
		ORDER by day ASC
		");

	while($row = mysql_fetch_array($result))
	  {

	$day = $row['day'];
	if   ($row['day'] == date("Y-m-d"))
	echo "<h2>Today</h2>";

	else
	{ 
	echo "<h2>" . date("l n/d",strtotime("$day")) . "</h2>\n";
	}
	//  sub query needs this parameter
	 $a = $day;
	// echo $a;
	echo "<table border='1' width='400'><tr align='left'  >";
	echo "<th width='100'>Title</th> <th width='50'>Basecamp </th><th width='50'>Person </th>
	<th width='50'>Do </th></tr>";
	 $r2 = mysql_query("SELECT user_id, day_works.project_id, day_works.id AS dayworksid, title, description, day, project_id, projects.id, projects.basecamp_id, users.name AS username
	 FROM day_works, projects, users 
	 WHERE  day = '$a' AND day_works.project_id = projects.id AND users.id = day_works.user_id 
	ORDER by title ASC");
	 while ($row2 = mysql_fetch_array($r2)) {

		echo "<tr align='left' >";

	echo "<td>". $row2['title']  . "</td>";
	echo "<td><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>Go to Project</a></td>";
	echo "<td>". $row2['username']  . "</td>";
	
	echo "<td><a href='../edit.php?id=" . $row2['dayworksid'] . "'>Edit</a> | ";
	echo "<a href='../delete.php?did=" . $row2['dayworksid'] . "'>Delete </a> | ";
	echo "<a href='../copy.php?id=" . $row2['dayworksid'] . "'>Copy </a> ";
	echo "</td>";
	 // echo   $row2['description'];
	 }
	echo "</tr></table>"; 
	 }
}
else
{echo "<h2>worker</h2>\n";

// ***************************************************************************** worker 
		
// echo $user_id;

$result = mysql_query("
	SELECT DISTINCT day 
	FROM day_works
	WHERE day >= CURDATE()  AND user_id = '$user_id'
	ORDER by day ASC
	");

while($row = mysql_fetch_array($result))
  {

$day = $row['day'];
if   ($row['day'] == date("Y-m-d"))
echo "<h2>Today</h2>";

else
{ 
echo "<h2>" . date("l n/d",strtotime("$day")) . "</h2>\n";
}
//  sub query needs this parameter
 $a = $day;
// echo $a;
echo "<table border='1' width='400'><tr align='left'>";
echo "<th width='100'>Title</th> <th width='50'>Basecamp </th><th width='50'>Person </th>
<th width='100'>Do </th></tr>";
 $r2 = mysql_query("SELECT user_id, day_works.project_id, day_works.id AS dayworksid, title, description, day, project_id, projects.id, projects.basecamp_id, users.name AS username
 FROM day_works, projects, users 
 WHERE  day = '$a' AND day_works.project_id = projects.id AND users.id = day_works.user_id AND user_id = '$user_id'
ORDER by title ASC");
 while ($row2 = mysql_fetch_array($r2)) {
		
	echo "<tr align='left' >";
	
echo "<td>". $row2['title']  . "</td>";
echo "<td><a href='https://huntandgather.basecamphq.com/projects/" . $row2['basecamp_id'] . "' target='_blank'>Go to Project</a></td>";
echo "<td>". $row2['username']  . "</td>";
echo "<td><a href='../edit.php?did=" . $row2['dayworksid'] . "'>Edit</a> | ";
echo "<a href='../delete.php?did=" . $row2['dayworksid'] . "'>Delete </a> | ";
echo "<a href='../copy.php?cid=" . $row2['dayworksid'] . "'>Copy </a> ";
echo "</td>";
 }
echo "</tr></table>"; 
 }
}
}
?>


</p>
<hr/ >
<!-- ********************** When Ever Works ***********************  -->
<p><strong> My Whenever Works </strong>
	<a href="addwhen_ever.php">Add New</a>
<?php 
$result2 = mysql_query("SELECT * 
	FROM whenever_works
	WHERE user_id = '$user_id' AND done = 'NO'
	ORDER by created_at ASC
	");

while($row3 = mysql_fetch_array($result2))
  {

echo "<p>" . $row3['title']  . "  ";
echo "<a href='../wheneverdelete.php?did=" . $row3['id'] . "'>Delete </a> | ";
echo "<a href='../wheneverdone.php?did=" . $row3['id'] . "'>Done </a> </p> ";
}


?>
<hr />
<!-- ********************** Notes ***********************  -->
<p><strong> Mi Notas </strong>
<a href="add_notes.php">Add New</a></p>
<?php 
$result2 = mysql_query("SELECT * 
	FROM notes
	WHERE user_id = '$user_id'
	ORDER by created_at ASC
	");

while($row3 = mysql_fetch_array($result2))
  {

echo "<p>" . $row3['detail']  . "  ";
echo "<a href='../notesdelete.php?did=" . $row3['id'] . "'>Delete </a> </p> ";
}


?>
   </div>

		    <div id="footer">
                <ul>

                </ul>
                <p class="subtle"> Hunt and Gather</p>
            </div>
        </div>
    </body>
</html>
