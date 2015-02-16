<?php
require_once('../cal/includes/db.php');
?>
<html>
    <head>
        <title>Harvard Arts   </title>
        <meta name="viewport" content="user-scalable=no, width=device-width" />
        <link rel="stylesheet" type="text/css" href="iphone2.css" media="only screen and (max-width: 480px)" />
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
   <h2> Office for the Arts at Harvard </h2>
 <p>Supports Student Involvement in the Arts.</p>
 <img src="images/apple-touch-icon-precomposed.png">
 <p> Make Art!</p>
 
 <h2> Upcoming Events</h2>
 <?php		
// nested query 
// get the distinct date
 
 $r = mysql_query("SELECT DISTINCT Date_Performance
 FROM 9events INNER JOIN 9performances ON 9events.EVENT_ID = 9performances.EVENT_ID
 WHERE Date_Performance >= CURDATE() AND flag_calendar = 'yes' 
 ORDER BY Date_Performance ASC 
 LIMIT 20
 ");
while($row = mysql_fetch_array($r)){

// output date only
$Date_Performance = $row['Date_Performance'];

if   ($row['Date_Performance'] == date("Y-m-d"))
  echo "<h4>Today</h4>";
  
 else
 { 
 echo "<h4>" . date("l n/d",strtotime("$Date_Performance")) . "</h4>\n";
}


//  sub query needs finds events within the date


  $r2 = mysql_query("SELECT   9events.EVENT_ID, 9performances.EVENT_ID, TIME_FORMAT(Time_Performance, '%l:%i %p') AS FTime, flag_calendar, Date_Performance, 
 DATE_FORMAT(Run_StartDate, '%c/%e') AS FRun_StartDate, DATE_FORMAT(Run_EndDate, '%c/%e') AS FRun_EndDate, Time_Performance, Name, PresentingName,
 ShortDescription, ImageFilename,
 9events.Space_ID, 9spaces.Space_ID, SPACE_NAME
 FROM 9events, 9spaces, 9performances
 WHERE flag_calendar = 'yes' AND Date_Performance >= CURDATE() AND Date_Performance = '$Date_Performance' 
 AND 9events.Space_ID = 9spaces.Space_ID AND 9events.EVENT_ID = 9performances.EVENT_ID 
ORDER BY Time_Performance ASC");
 while ($row2 = mysql_fetch_array($r2)) {
		
echo "<h3>" . $row2['Name'] . " " . $row2['FTime'] .  "</h3>";

  echo  "<em>" . $row2['SPACE_NAME']. "</em>";
	
// If there is an image show it
if ($row2["ImageFilename"] == "NULL" ) 
echo "";
else
 {
 echo "<img align ='right' width='100' 	 src='http://www.ofa.fas.harvard.edu/event_images/";
 echo $row2['ImageFilename'];
 echo "'>";
}	
 echo  "<br/>" . $row2['ShortDescription'];

// need a details page
echo " &nbsp; <a href='details.php?ID=" . $row2['EVENT_ID'] . "'>More</a>" ;

 }
 }
?>
</div>
           
		    <div id="footer">
                <ul>
                
                </ul>
                <p class="subtle"> Office for the Arts at Harvard</p>
            </div>
        </div>
    </body>
</html>     
