 <?php

 include( "../dbCon.php" );
 $con = connection();
 if ( session_status() == PHP_SESSION_NONE ) {
 	session_start();
 }
	 $userID = $_SESSION["userid"];

 ?>

 <?php
	
	 $sql = "SELECT notification.ID,`user`.name, vehicle.name as vname, vehicle.ID as VID FROM `notification` INNER JOIN `user` ON user.ID=notification.userID INNER JOIN vehicle ON vehicle.ID=notification.vehicleID WHERE notification.role=0";
	 $result1 = $con->query( $sql );
	 if ( $result1->num_rows > 0 ) {
		foreach ( $result1 as $row ) {
				$nid=$row["ID"];

			?>
			<li style="background-color: antiquewhite;">
				 <span><?php echo($row["name"])?> bidding for <strong><a href="<?=$_SESSION["directory"]?>farmer/cropdetail.php?id=<?php echo $row['VID'] ?>" onClick="removenoti(<?=$nid?>)"> <?php echo($row["vname"])?>  </a></strong> </span>
				 
			</li>
			<?php
		}
	 }

if(isset($_GET["RID"])){
	$removeID=$_GET["RID"];
	 
	$sql3="UPDATE `notification` SET `role`=1 WHERE ID='$removeID'";
	if ( $con->query($sql3) ) {
 		echo( "Successfully removed " );
 	} else {
 		echo( "database error" );
 	}
	
}
//remove all notification
if(isset($_GET["clAll"])){
	 
	$sql3="DELETE  FROM `notification`";
	if ( $con->query($sql3) ) {
 		echo( "Successfully removed " );
 	} else {
 		echo( "database error" );
 	}
	
}
if(isset($_GET["Count"])){
	 
$sql1="SELECT COUNT(ID) as num FROM `notification` WHERE role=0";
									$result4 = $con->query( $sql1 );
							if ( $result4->num_rows > 0 ) {
								foreach ( $result4 as $row ) {
									$num=$row["num"];
								}}
	echo($num);
	
}

 ?> 
 
 