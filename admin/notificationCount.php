 <?php

 include( "../dbCon.php" );
 $con = connection();
 if ( session_status() == PHP_SESSION_NONE ) {
 	session_start();
 }
	 $userID = $_SESSION["userid"];
 





 ?>

 <?php
 
	  
 
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
 
 