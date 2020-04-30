 <?php
	 include("../dbCon.php");
		$con=connection();
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
if(isset($_GET["review"])){
	$review=$_GET["review"];
	$ID=$_GET["vid"];
	 $userID=$_SESSION["userid"];
$sql="INSERT INTO `review`(  `userID`,`vehicleID`, `comment`) VALUES ( '$userID','$ID','$review')";
if($con->query($sql)){
	echo("Thanks for giving your opinions");
}else{
	echo("database error");
}
}



if(isset($_GET["check"])){
	$ID=$_GET["ID"];
	//exit();
$sql2="SELECT review.comment, user.name FROM `review` INNER JOIN user ON user.ID=review.userID WHERE review.vehicleID= '$ID' ";
$result=$con->query($sql2);
	if($result->num_rows > 0){
			foreach($result as $row){
			$name=$row["name"];
			$comment=$row["comment"];
			?>
				
				
				 
            		 <h4 style="color: darkblue; margin-top: 30px;" ><?=$name?></h4>
            			<span><?=$comment?></span>
            		 
            		 
            	 
				
				
				
				
				
				
				
			<?php	
				
				
			}
	}

}



?>