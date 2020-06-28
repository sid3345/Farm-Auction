<?php

include("../dbCon.php");
include("../email.php");
 
$con=connection();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

if(isset($_GET["vid"])){
	$vid=$_GET["vid"];
	$userID=$_SESSION["userid"];
	$sql="SELECT * FROM `bidder` WHERE vehicleID !='$vid' AND userID ='$userID' ORDER BY `ID` ASC";
	$result3 = $con->query( $sql );
		if ( $result3->num_rows > 0 ) {
		echo("you cannot spend the deposit money because you already bid another crop.");
			
		}else{
			echo("ok");
		}
}

?>