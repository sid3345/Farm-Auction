<?php include("../fheader.php");
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>home.php";
</script>
	<?php
}
?>

<?php
    $userid=$_SESSION["userid"];
    $sql="SELECT * FROM `farmer` WHERE `admin`=0 AND `ID`=$userid";
    $result=$con->query($sql);
    if($result->num_rows>0){
    	foreach($result as $row){
			$email=$row["email"];
		}
  }

?>

  

<div class="container">
  <h2>TOP BIDDERS</h2> 
          
  <table class="table table-striped">
    <thead>
      <tr style="text-align-last: center;">
        <th>Bidder Name</th>
        <th>Bidder Email</th>
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
		$Sql="SELECT user.name as userName, user.email as uemail ,vehicle.ID as VID, vehicle.name, vehicle.EndDate,vehicle.image, vehicle.price, bidder.price as bidprice, bidder.biddingTime as biddingTime, bidder.email FROM bidder INNER JOIN vehicle ON bidder.vehicleID=vehicle.ID INNER JOIN user ON bidder.userID=user.ID WHERE (bidder.vehicleID, bidder.price) IN (SELECT bidder.vehicleID, MAX(bidder.price) from bidder group by bidder.vehicleID) AND status=1 and active=0 ORDER BY `bidder`.`price` DESC";


    $result1 = $con->query( $Sql );
			if ( $result1->num_rows > 0 ) {
			foreach ( $result1 as $row ) {
        if ($row["email"]==$email){
          
		?>
      <tr>
        <td><?=$row["userName"]?></td>
        <td><input type="button" name="view" value="<?php echo $row["uemail"]; ?>" id="<?php echo $row["uemail"]; ?>" class="btn btn-info btn-xs view_data" /></td>
        <td><?=$row["name"]?></td>
        <td><?=$row["EndDate"]?></td>
        <td><img style="max-width: 200px; max-height: 200px;" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["image"]?>" ></td>
        <td><?=$row["price"]?></td> 
        <td><?=$row["bidprice"]?></td>
        <td><?=$row["biddingTime"]?></td>
      </tr>
       <?php } }} ?>
    </tbody>
  </table>
</div>



	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>
  <!-- Footer Section /- -->
  <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Bidder Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>