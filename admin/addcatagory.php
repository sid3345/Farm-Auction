
 
<?php
   //catagory add

	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
include("../dbCon.php");
		$con=connection();

if(isset($_POST["AddCat"])){
	 $C_Name=$_REQUEST["catagory"];
	 $C_type=$_REQUEST["type"];
	$sql1="INSERT INTO `catagory`( `name`, `type`) VALUES ('$C_Name','$C_type')";
	//echo($sql1);
	//exit();
	if($con->query($sql1)){
		$_SESSION["msgg"]="Successfully added";
		header("location:Editcar.php");
	}else{
		
		$_SESSION["msgg"]="database error.";
		header("location:Editcar.php");
	}
}
if(isset($_POST["AddBike"])){
	 $C_Name=$_REQUEST["catagory"];
	 $C_type=$_REQUEST["type"];
	$sql1="INSERT INTO `catagory`( `name`, `type`) VALUES ('$C_Name','$C_type')";
	//echo($sql1);
	//exit();
	if($con->query($sql1)){
		$_SESSION["msgg"]="Successfully added";
		header("location:EditBike.php");
	}else{
		
		$_SESSION["msgg"]="database error.";
		header("location:EditBike.php");
	}
}


if(isset($_GET["Cat_id"])){
	$id=$_GET["Cat_id"];
	 
	 
	$sql="DELETE FROM `catagory` WHERE `ID`=$id";
	if($con->query($sql)){
		$_SESSION["msgg"]="Successfully remove";
		header("location:Editcar.php");
	}else{
		
		$_SESSION["msgg"]="Cannot delete the category item.";
		header("location:Editcar.php");
	}
}
if(isset($_GET["bike_id"])){
	$id=$_GET["bike_id"];
	 
	 
	$sql="DELETE FROM `catagory` WHERE `ID`=$id";
	if($con->query($sql)){
		$_SESSION["msgg"]="Successfully remove";
		header("location:EditBike.php");
	}else{
		
		$_SESSION["msgg"]="Cannot delete the category item.";
		header("location:EditBike.php");
	}
}



?>