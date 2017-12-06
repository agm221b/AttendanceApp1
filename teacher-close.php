
<?php

/**
 * @author gencyolcu
 * @copyright 2017
 */
 /*student details size 5*/
 
$dblink = mysqli_connect('localhost','root','','studreg');
if(!$dblink)
		{
			die("Connection Error");
		}

//send fromm android intoo fileopen
$link = fopen('temp_register.txt', 'r');
$sheet = array();
$i = 0;
$k = 0;
do{$sheet[$k] = 0;$k++;}while($k<5);
do
{
    $i = fgets($link);
	$sheet[(int)$i] = 1;
	echo "<script type='text/javascript'>alert($i);</script>";
	
		
}
while($i);

//0=>0,1=>0,2=>1//
//asort($sheet);
//$final = array();
$j = 0;
$q=1;
/*
while($j<5)
{
    $final[$j] = 0;
}	
*/

/*foreach($final as $k=>$m)
{
    //$j = 0;
    foreach($sheet as $val)
    {
        if($k == $val)
            $m = 1;    
    }
    
}*/
//$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = ATTENDANCE";
//$rs = mysql_query($query);
//$row = mysql_fetch_row($rs);

//$date= $_POST['date1'];// fetch date from android////////////

//$sheet[0] = $date1;
//$sheet[0]='1-11-17';

//echo "<script type='text/javascript'>$sheet[0]</script>";

//$sql = "insert into studreg values('$sheet[0]','$sheet[1]','$sheet[2]','$sheet[3]','$sheet[4]');";

date_default_timezone_set('Asia/Kolkata');
$sheet[0] = "".date("Y-m-d");


$sql = "insert into stdreg values(";
$sql .= implode(',', '$sheet');
$sql .= ");";

mysqli_query($dblink,$sql);

fclose($link);

unlink("temp_register.txt");

?>

