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
	date_default_timezone_set("Asia/Dhaka");
	$today=date("Y-m-d");
	$userID=$_SESSION["userid"];
	$Type=$_GET["Type"];
	 
	
	
	
	
	
	$sql="INSERT INTO `confirmbid`(  `vehicleID`, `date`, `userID`,`type`,`price`, `role`) VALUES ('$vid','$today','$userID', '$Type','$cost',0)";
	if($con->query($sql)){
		echo("Thanks to confirm your auction.");
		
		$sql2="UPDATE `bidder` SET `confirmbid`=1 WHERE `userID`='$userID' AND `vehicleID`='$vid'";
		$con->query($sql2);
		
		date_default_timezone_set("Asia/Dhaka");
		$set=strtotime("+1 weeks");
		$setdate=date("Y-m-d",$set);
	 
		
		$to=$_SESSION["useremail"];
		$sub="Bidding Confirmation";
		$content="Thank you for confirming your delivery choice. We will deliver the crop on ".$setdate.". You can give money on bank. <br> <h3>Bank Information </h3> <br> ACC name: Sheikh parvez mahamud <br> Acc no: 255.105.7696 <br> Bank name: Central Bank of India <br> <br> For more information you can contact us via mobile or email. Thank you once again.";
		
		sendmail($to,$sub,$content);
		if(isset($_SESSION["email"])){echo($_SESSION["email"]);}
	
	}else{
		echo("database error");
	}
}
//email
		
		

?> 