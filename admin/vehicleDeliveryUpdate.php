<?php  
 include("../dbCon.php");
	 	$con=connection();

?>

<?php
	if(isset($_GET["ID"])){
		$id = $_GET["ID"];
		$Sql="UPDATE `confirmbid` SET  `role`= 1 WHERE ID=$id";
		if ($con->query($Sql)){
				echo("Delivery is confirmed");
			 }else{
				echo("database error");
			}
	}
	?>