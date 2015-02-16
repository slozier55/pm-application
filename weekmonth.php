<?php 
function getWeekRange(&$start_date, &$end_date, $offset=0) { 
        $start_date = ''; 
        $end_date = '';    
        $week = date('W'); 
        $week = $week - $offset; 
        $date = date('Y-m-d'); 
        
        $i = 0; 
        while(date('W', strtotime("-$i day")) >= $week) {                        
            $start_date = date('Y-m-d', strtotime("-$i day")); 
            $i++;        
        }    
            
        list($yr, $mo, $da) = explode('-', $start_date);    
        $end_date = date('Y-m-d', mktime(0, 0, 0, $mo, $da + 6, $yr)); 
} 
    
    function getMonthRange(&$start_date, &$end_date, $offset=0) { 
        $start_date = ''; 
        $end_date = '';    
        $date = date('Y-m-d'); 
        
        list($yr, $mo, $da) = explode('-', $date); 
        $start_date = date('Y-m-d', mktime(0, 0, 0, $mo - $offset, 1, $yr)); 
        
        $i = 2; 
        
        list($yr, $mo, $da) = explode('-', $start_date); 
        
        while(date('d', mktime(0, 0, 0, $mo, $i, $yr)) > 1) { 
            $end_date = date('Y-m-d', mktime(0, 0, 0, $mo, $i, $yr)); 
            $i++; 
        } 
} 

getWeekRange($start, $end); 

$ws= $start;
$we = $end;
echo "Start" . $ws; 
echo "End" . $we; 
// getMonthRange($start, $end); 
//echo "$start $end"; 

?>

http://www.weberdev.com/get_example-4722.html