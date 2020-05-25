 <?php

 include( "../dbCon.php" );
 $con = connection();
 if ( session_status() == PHP_SESSION_NONE ) {
 	session_start();
 }
	 $userID = $_SESSION["userid"];

 if ( isset( $_GET["VID"] ) ) {
 	$vehicleID = $_GET[ "VID" ];
 	 
	 
	 
	 $sql2="SELECT * FROM `watchlist` WHERE vehicleID='$vehicleID' AND userID ='$userID'";
	  $result11 = $con->query($sql2);
	 if ( $result11->num_rows > 0 ) {
		 echo("Already in watch list");
	 }else{
 	$sql = "INSERT INTO `watchlist`(  `vehicleID`, `userID`) VALUES ( '$vehicleID','$userID')";

 	if ( $con->query( $sql ) ) {
 		echo( "Successsfully added to watch list" );
 	} else {
 		echo( "database error" );
 	}
 }
}





 ?>

 <?php
if(isset($_GET["ID"])){
	  

	
	 $sql = "SELECT vehicle.ID, vehicle.name, vehicle.image FROM `vehicle` INNER JOIN watchlist ON watchlist.vehicleID=vehicle.ID WHERE watchlist.userID='$userID'";
	 $result1 = $con->query( $sql );
	 if ( $result1->num_rows > 0 ) {
		foreach ( $result1 as $row ) {


			?>
			<li>
				<img src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["image"]?>" alt="img">
				<button type="button" class="close"><a onClick="removeList(<?=$row["ID"]?>)">×</a></button>
				<div class="overflow-h">
					<span><a href="<?=$_SESSION["directory"]?>customer/watchlist.php?id=<?=$row["ID"]?>"><?=$row["name"]?></a></span>

				</div>
			</li>
			<?php
		}
	 }
}


if(isset($_GET["removeID"])){
	$removeID=$_GET["removeID"];
	
	$sql3="DELETE FROM `watchlist` WHERE `vehicleID`='$removeID' AND `userID`='$userID'";
	if ( $con->query($sql3) ) {
 		echo( "Successsfully remove from watch list" );
 	} else {
 		echo( "database error" );
 	}
	
}








 ?>