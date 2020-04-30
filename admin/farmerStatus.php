<?php
include("../dbCon.php");
		$con=connection();
	 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	//updating famer status	 
if(isset($_GET["ID"])){
	$id=$_GET["ID"];
	$sql="UPDATE `farmer` SET  `active`=0 WHERE `ID`=$id";
	if(mysqli_query($con, $sql)){
		echo("successfully done");
	}
		
}
if(isset($_GET["ActiveID"])){
	$id=$_GET["ActiveID"];
	$sql="UPDATE `farmer` SET  `active`=1 WHERE `ID`=$id";
	if(mysqli_query($con, $sql)){
		echo("successfully done");
	}
		
}
?>