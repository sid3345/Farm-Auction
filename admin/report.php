 <!--<meta http-equiv="Refresh" content="10"> -->
<?php include("../header.php");
 		if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"]) && $_SESSION["role"]!="1")){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}

?>



<div class="container-fluid container">
  <h1 style="text-align-last: center;">Dashboard</h1>
  
  <div class="row">
    <div class="col-sm-3 " style="background-color:lavender;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `user` WHERE admin=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `user` WHERE admin=0 AND active=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Total Users</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Active </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Deactive </label> 
   <?=$deactive_user;?></h4>
    </div>

	<div class="col-sm-3 " style="background-color:red;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `farmer` WHERE admin=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `farmer` WHERE admin=0 AND active=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Total Farmers</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Active </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Deactive </label> 
   <?=$deactive_user;?></h4>
    </div>


    <div class="col-sm-3 " style="background-color:orange;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `vehicle`";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `vehicle` WHERE status=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Total Crops</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Active </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Deactive </label> 
   <?=$deactive_user;?></h4>
    </div>
    <div class="col-sm-3 " style="background-color:lavender;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `confirmbid`";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `confirmbid` WHERE role=1";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Deliverable</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Delivered </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Undelivered </label> 
   <?=$deactive_user;?></h4>
    </div>
    <div class="col-sm-3 col-md-3" style="background-color:aquamarine;">
    	<?php
		$sql5="SELECT COUNT(ID) as num FROM `bidder`";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $totaluser=$row["num"];

					}
				}
		$sql5="SELECT COUNT(ID) as num FROM `bidder` WHERE confirmbid=0";
		$result=$con->query($sql5);
				if($result->num_rows>0){
					foreach($result as $row){
					 $active_user=$row["num"];

					}
				}
		$deactive_user=$totaluser-$active_user;
		?>
   <h2><label>Total Bid</label></h2>
   <h1 style="display: block;position: absolute;float: left; margin: inherit;"><?=$totaluser;?></h1>
   <h4 style="float: right; margin: 0px;"><label>Bidding </label> <?=$active_user;?></h4><br/>
   <h4 style="float: right;margin-top: 0px; display: inherit;margin-left: 87px;"><label>Confirm bid </label> 
   <?=$deactive_user;?></h4>
    </div>
  </div>
</div>

 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<?php
	
	$sql="SELECT vehicle.name , COUNT(bidder.vehicleID) as num FROM bidder INNER JOIN vehicle on vehicle.ID=bidder.vehicleID GROUP BY bidder.vehicleID";

$Product = [];
				$result=$con->query($sql);
				if($result->num_rows>0){
					foreach($result as $row){

						 
						$Product[] = array("y" => $row["num"], "label" => $row["name"] ); 

					}
				}
 
	
	
	//print json_encode($buyProduct);
	?>
	
 
<!-- vehicle bidding count -->
<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Crop Bidding Count"
	},
	axisY: {
		title: "Bidding"
	},
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.##",
		dataPoints: <?php echo json_encode($Product, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div class="container">
	



<?php
	date_default_timezone_set("Asia/Kolkata");
	$today=date("Y-m-d");
	$Product2=[];
	if(isset($_POST["hidName"])){
		$checkdate=($_POST["hidName"]);
		$sql2="SELECT vehicle.name, MAX(bidder.price) as price FROM `bidder` INNER JOIN vehicle ON vehicle.ID=bidder.vehicleID WHERE bidder.biddingTime > '$checkdate' GROUP BY bidder.vehicleID";
		
		$result1 = $con->query( $sql2 );
			if ( $result1->num_rows > 0 ) {
				foreach ( $result1 as $row ) {
					$Product2[] = array("y" => $row["price"], "label" => $row["name"] ); 
				}
			}
	}else{
		$endDate=strtotime("-1 weeks");
		$endDate=date("Y-m-d",$endDate);
		$sql2="SELECT vehicle.name, MAX(bidder.price) as price FROM `bidder` INNER JOIN vehicle ON vehicle.ID=bidder.vehicleID WHERE bidder.biddingTime > '$endDate' GROUP BY bidder.vehicleID";
		
		$result1 = $con->query( $sql2 );
			if ( $result1->num_rows > 0 ) {
				foreach ( $result1 as $row ) {
					$Product2[] = array("y" => $row["price"], "label" => $row["name"] ); 
				}
			}
	}
	
	
	//revenue 
	
	$sql3="SELECT vehicle.name, bidder.price, vehicle.price as baseprice FROM `bidder` INNER JOIN vehicle ON vehicle.ID=bidder.vehicleID WHERE bidder.confirmbid=1";
	
$Product3 = [];
				$result=$con->query($sql3);
				if($result->num_rows>0){
					foreach($result as $row){
						$bidprice=$row["price"];
						$baseprice=$row["baseprice"];
						 $finalprice=$bidprice-$baseprice;
						$Product3[] = array("y" => $finalprice, "label" => $row["name"] ); 

					}
				}
	
?>

<!-- Check Bidding price of the vehicle -->
<div style="background-color: #D1CACA; margin-top: 10%;">

	<h2 style="text-align: center;">Check Bidding price of the crop </h2>
	<div class="col-xs-4" style="margin-bottom: 50px;">
	<form action="" method="post" id="formpost">
		<input class="form form-control " type="date" id="checkbid" name="Date" onChange="createChart()" value="<?php if(isset($_POST["hidName"])){ echo($_POST["hidName"]);} ?>">
	</div>
	<input class="form form-control " type="hidden" id="check" name="hidName" >
	</form>
	</div>
	
</div>
<div class="container" id="chart2" style="height: 370px; width: 100%; margin-bottom: 10%;"></div>
<div id="chartContainer" style="height: 370px; width: 100%; margin-top: 10%; margin-bottom: 10%;"></div>
<div id="revenueChart" style="height: 370px; width: 100%; margin-top: 10%; margin-bottom: 10%;"></div>
	 

</div>

 <script>

		 function createChart(){
			 var checkdate=$("#checkbid").val();
			 $("#check").val(checkdate);
			 $("#formpost").submit();
			 
		 }
		 var chart = new CanvasJS.Chart("chart2", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Top bidding price of crop <?php if(!isset($_POST["hidName"])){ echo("(Last 7 days )");} ?> " 
	},
	axisY: {
		title: "Price (INR)"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.##",
		dataPoints: <?php echo json_encode($Product2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

		   
		   
		   
		   
		   
//revenue
	var chart2 = new CanvasJS.Chart("revenueChart", {
	animationEnabled: true,
	title:{
		text: "Revenue Chart of Crop Auction"
	},
	axisY: {
		title: "Revenue (in INR)",
		 
		suffix:  "INR"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0 INR",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($Product3, JSON_NUMERIC_CHECK); ?>
	}]
});
 
chart2.render();
		   
</script>  

</body>
</html>       

 
  
    	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>D
	<!-- Footer Section /- -->      