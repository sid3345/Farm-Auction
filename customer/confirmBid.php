<?php
include("../dbCon.php");
include("../email.php");
$con=connection();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

if(isset($_GET["cost"])){
	$cost=$_GET["cost"];
	$vid=$_GET["vid"];
	date_default_timezone_set("Asia/Kolkata");
	$today=date("Y-m-d");
	$userID=$_SESSION["userid"];
	$Type=$_GET["Type"];
	 
	$sqlF="SELECT name,email from vehicle where ID='$vid'";
	$result = $con->query( $sqlF );
	foreach($result as $row){
		$vname=$row["name"];
		$email=$row["email"];
	}
	
	
	
	
	$sql="INSERT INTO `confirmbid`(  `vehicleID`, `date`, `userID`,`type`,`price`, `role`) VALUES ('$vid','$today','$userID', '$Type','$cost',0)";
	if($con->query($sql)){
		echo("Thanks to confirm your auction.");
		
		$sql2="UPDATE `bidder` SET `confirmbid`=1 WHERE `userID`='$userID' AND `vehicleID`='$vid'";
		$con->query($sql2);
		
		date_default_timezone_set("Asia/Kolkata");
		$set=strtotime("+1 weeks");
		$setdate=date("Y-m-d",$set);
	 
		
		$to=$_SESSION["useremail"];
		$sub="Bidding Confirmation";
		$content="Thank you for confirming your delivery choice. We will deliver the crop on ".$setdate.". You can give money on bank. <br> <h3>Bank Information </h3> <br> account name: Crop Auction <br> Acc no: 255.105.7696 <br> Bank name: Central Bank of India <br> <br> For more information you can contact us via mobile or email. Thank you once again.";
		$contentF="".$to." confirmed bid on your crop-" .$vname." on ".$setdate.".";
		sendmail($to,$sub,$content);
		sendmail($email,$sub,$contentF);
		if(isset($_SESSION["email"])){echo($_SESSION["email"]);}
	
	}else{
		echo("database error");
	}
}
//email
		
		

?> 