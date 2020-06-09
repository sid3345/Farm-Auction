<?php
//Connect to database
date_default_timezone_set('Asia/Kolkata');

function connection($setup=false){
	if($setup){	
	$con=new mysqli("localhost", "root", "");

	}else{
		$con=new mysqli("localhost", "root", "","auction1");
	}
	if($con->connect_error){
		die("Connection failed: ".$con->connect_error);
		
	}
	else {
		//echo("Connection successfully<br>");
		}
	return($con);	
}

function fetch_user_last_activity($email,$con)
{
 $query = " SELECT * FROM login_details WHERE user_id = '$email' ORDER BY last_activity DESC LIMIT 1";
 $result = $con ->query($query);
 foreach($result as $row)
 {
  return $row['last_activity'];
 }
}

// Below function shows notification for both

function count_unseen_message($from_user_id, $to_user_id, $con)
{
 $query = "
 SELECT * FROM chat_message 
 WHERE from_user_id = '$from_user_id' 
 AND to_user_id = '$to_user_id' 
 AND status = '1'
 ";
 $result = $con ->query($query);
 $count = $result->num_rows;
 $output = '';
 if($count > 0)
 {
  $output = '<span class="label label-success">'.$count.'</span>';
 }
 return $output;
}

?>

