<?php
include("../dbCon.php");
		$con=connection();
if(isset($_GET["ID"])){
	$id=$_GET["ID"];
	$sql="UPDATE `vehicle` SET  `status`=0 WHERE `ID`=$id";
	if($con->query($sql)){
		echo("successful");
	}
		
}
if(isset($_GET["ActiveID"])){
	$id=$_GET["ActiveID"];
	$sql="UPDATE `vehicle` SET  `status`=1 WHERE `ID`=$id";
	if($con->query($sql)){
		echo("successful");
	}
		
}
?>