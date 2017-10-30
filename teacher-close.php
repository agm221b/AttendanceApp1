<?php

/**
 * @author gencyolcu
 * @copyright 2017
 */
 /*student details size 5*/
 
$dblink = mysql_connect('','','','');
mysql_select_db(hr);
//send fromm android intoo fileopen
$link = fopen('temp-register', 'r');
$sheet = array();
$i = 0;
$k = 0;
foreach($sheet as $i)
{
    $i = fgets($link);
    
}
//0=>0,1=>0,2=>1//
asort($sheet);
$final = array();
$j = 0;
while($j<5)
{
    $final[$j] = 0;
}

foreach($final as $k=>$m)
{
    //$j = 0;
    foreach($sheet as $val)
    {
        if($k == $val)
            $m = 1;    
    }
    
}
//$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ATTENDANCE";
//$rs = mysql_query($query);
//$row = mysql_fetch_row($rs);

$final[0] = $_POST['date'];// fetch date from android////////////

$sql = "insert into TABLE_NAME values("; ////ENTER TABLENAME EDIT AS YOU SEE FIT
$sql .= implode(',', $final);
$sql .= ")";
mysql_query($sql);

fclose($link);

unlink("temp_register.txt");

?>
