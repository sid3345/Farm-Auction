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
 

?>

