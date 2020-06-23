 <?php
 include( "../header.php" );
//include("../dbCon.php");
	//	$con=connection();

 ?>
 

<div class="container">
  <h2>Watch List</h2>
          
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th>Crop Name</th>
        <th>Bidding End Date</th>
        <th>Image</th>
        <th>Base price</th>
       
      </tr>
    </thead>
    <tbody>
     <?php
		$userID=$_SESSION["userid"];
		$Sql="SELECT vehicle.ID ,vehicle.name, vehicle.image,vehicle.price,vehicle.EndDate FROM `vehicle` INNER JOIN watchlist ON watchlist.vehicleID=vehicle.ID WHERE watchlist.userID='$userID'";
		
		$result1 = $con->query( $Sql );
			if ( $result1->num_rows > 0 ) {
			foreach ( $result1 as $row ) {
		
		?>
      <tr>
        
        <td><a href="<?=$_SESSION["directory"]?>customer/cropdetail.php?id=<?=$row["ID"]?>"><?=$row["name"]?></a></td>
        <td><?=$row["EndDate"]?></td>
        <td><a href="<?=$_SESSION["directory"]?>customer/cropdetail.php?id=<?=$row["ID"]?>"><img style="max-width: 200px; max-height: 200px;" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["image"]?>" ></a> </td>
        <td><?=$row["price"]?></td> 
       
      </tr>
       <?php } } ?>
    </tbody>
  </table>
</div>



































  <?php
 include( "../footer.php" );
 ?> 
 