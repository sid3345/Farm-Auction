<?php include("../header.php");
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>login.php";
</script>
	<?php
}
?>




<div class="container">
  <h2>TOP BIDDERS</h2> 
          
  <table class="table table-striped">
    <thead>
      <tr style="text-align-last: center;">
        <th>Bidder Name</th>
        <th>Crop Name</th>
        <th>Bidding End Date</th>
        <th>Image</th>
        <th>Base price</th>
        <th>top bid price</th>
        <th>Bid Time</th>
      </tr>
    </thead>
    <tbody style="text-align-last: center;">
     <?php
		$Sql="SELECT user.name as userName ,vehicle.ID as VID, vehicle.name, vehicle.EndDate,vehicle.image, vehicle.price, bidder.price as bidprice, bidder.biddingTime as biddingTime FROM bidder INNER JOIN vehicle ON bidder.vehicleID=vehicle.ID INNER JOIN user ON bidder.userID=user.ID WHERE (bidder.vehicleID, bidder.price) IN (SELECT bidder.vehicleID, MAX(bidder.price) from bidder group by bidder.vehicleID) AND status=1 and active=0 ORDER BY `bidder`.`price` DESC";
		
		$result1 = $con->query( $Sql );
			if ( $result1->num_rows > 0 ) {
			foreach ( $result1 as $row ) {
		
		?>
      <tr>
        <td><?=$row["userName"]?></td>
        <td style="cursor:pointer; color:#00008B; text-decoration:none;" onclick="location.href='cropdetail.php?id=<?php echo $row['VID'] ?>'"><?=$row["name"]?></td>
        <td><?=$row["EndDate"]?></td>
        <td><img style="max-width: 200px; max-height: 200px;" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["image"]?>" ></td>
        <td><?=$row["price"]?></td> 
        <td><?=$row["bidprice"]?></td>
        <td><?=$row["biddingTime"]?></td>
      </tr>
       <?php } } ?>
    </tbody>
  </table>
</div>












































	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>D
	<!-- Footer Section /- -->