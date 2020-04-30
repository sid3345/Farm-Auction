<?php
include("../dbCon.php");
		$con=connection();
	 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	//updating user status	 
if(isset($_GET["ID"])){
	$id=$_GET["ID"];
	$sql="UPDATE `user` SET  `active`=0 WHERE `ID`=$id";
	if(mysqli_query($con, $sql)){
		echo("successfully done");
	}
		
}
if(isset($_GET["ActiveID"])){
	$id=$_GET["ActiveID"];
	$sql="UPDATE `user` SET  `active`=1 WHERE `ID`=$id";
	if(mysqli_query($con, $sql)){
		echo("successfully done");
	}
		
}
?>