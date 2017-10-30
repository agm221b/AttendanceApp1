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
       $pass = $_POST['password']; //entered by student        //not sending password to PHP
		
		$sql = "select  * from student where roll = $ID "; 
		
        
        
		$result = mysqli_query($con,$sql);
        
        if(mysql_affected_rows($result) == 0)
        {
            die('ROLL NOT FOUND');
        }
        
		$list = array();
		 
		
		while ($row = mysqli_fetch_array($result,MYSQL_ASSOC))        //used to fetch the ResultSet and store in array format.
		{
			
			/*
                        $name = $row['name'];
			$email= $row['email_id'];
			$mobile = $row['mobile_no'];
			$address = $row['address'];
                        */
            $password=$row['password']; //----name of column in bold //password in database

			if($pass != $password)	//since I've already done checking in android
         //   {
         //       die('ENTER CORRECT PASSWORD');
         //   }
			array_push($list, array("ID"=>$ID,"password"=>$password));
				//$row = mysqli_fetch_array($result);
		}
			
		echo json_encode(array("list"=>$list));


?>
