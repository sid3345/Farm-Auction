<?php
 include( "../header.php" );
 	if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"]) && $_SESSION["role"]!="1")){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
 ?> 
 
<div class="container" style="background-color: #F9EFEF; margin-bottom: 200px; margin-top: 50px;">
  <h2 >Crop delivery list</h2>
   <hr style="border: solid 1px #6C6667;">
          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Bidder Email</th>
        <th>Vehicle Name</th>
        <th>Confirm Date</th>
        <th>Image</th>
        <th>Total price</th>
        <th>Type</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
     <?php
		$Sql="SELECT confirmbid.ID,vehicle.name, vehicle.image, user.email, confirmbid.date, confirmbid.type, confirmbid.price, confirmbid.role FROM `confirmbid` INNER JOIN vehicle ON vehicle.ID=confirmbid.vehicleID INNER JOIN user ON user.ID=confirmbid.userID";
		
		$result1 = $con->query( $Sql );
			if ( $result1->num_rows > 0 ) {
			foreach ( $result1 as $row ) {
		
		?>
      <tr>
        <td><?=$row["email"]?></td>
        <td><?=$row["name"]?></td>
        <td><?=$row["date"]?></td>
        <td><img style="max-width: 200px; max-height: 200px;" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["image"]?>" ></td>
        <td><?=$row["price"]?></td> 
        <td><?=$row["type"]?></td>
        <td><?php if($row["role"]==0){?> <img onClick="confirm(<?=$row["ID"]?>)" style="max-width: 40px; max-height: 40px;" src="<?=$_SESSION["directory"]?>img/icon/active.jpg" > <?php }else{  ?> <img  style="max-width: 40px; max-height: 40px;" src="<?=$_SESSION["directory"]?>img/icon/deactive.png" > <span>Confirmed</span> <?php } ?></td>
      </tr>
       <?php } } ?>
    </tbody>
  </table>
</div>


 

  <?php
 include( "../footer.php" );
 ?> 
 
 <script>

function confirm(id){
	$.get('cropDeliveryUpdate.php',{ID:id},function(data){
		window.location.href="cropDelivery.php";
						alert(data);
				});
	 
}

</script>
