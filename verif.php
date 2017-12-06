<?php

/**
 * @author gencyolcu
 * @copyright 2017
 */

        $con = mysqli_connect("localhost","root","") or die("Connection Error");;
	
		
		
	$dbstatus = mysqli_select_db($con,"attendance") or die("Database not found");;
		
		
		//////////////////////////////////////////// I'll send an ID, you just search for it in the table, and return the password with a name value pair

                //fetch ID as namevaluepair parameter 'ID' into $ID
                
        $ID = $_POST['ID']; //entered by student in login page
        $pass = $_POST['password']; //entered by student //not sending password to PHP
	$filename = "temp_store_status.txt";
	$handle = fopen($filename,'w');
	$val = 0;
	fwrite($handle, $val);
		
	$sql = "select  id, password from student where roll = $ID "; 
		
        
        
	$result = mysqli_query($con,$sql);
        
        if(mysql_affected_rows($result) == 0)
        {
            die('ROLL NOT FOUND');
        }
        
		
		 
		
	while ($row = mysqli_fetch_array($result,MYSQL_ASSOC))        //used to fetch the ResultSet and store in array format.
	{
			
			
        	if( ($pass == $row['password']) && ($ID == $row['id']) )
		{
				
			$val = 1;
			fwrite($handle, $val);
			fclose($handle);
		}

			
	}
			
		

?>
