<link href="../css/styles pop-up.css" rel="stylesheet"> 

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
		$Sql="SELECT user.name as userName ,vehicle.ID as VID, vehicle.name, vehicle.EndDate,vehicle.image, vehicle.price, bidder.price as bidprice, bidder.biddingTime as biddingTime, bidder.email FROM bidder INNER JOIN vehicle ON bidder.vehicleID=vehicle.ID INNER JOIN user ON bidder.userID=user.ID WHERE (bidder.vehicleID, bidder.price) IN (SELECT bidder.vehicleID, MAX(bidder.price) from bidder group by bidder.vehicleID) AND status=1 and active=0 ORDER BY `bidder`.`price` DESC";
		

    $result1 = $con->query( $Sql );
			if ( $result1->num_rows > 0 ) {
			foreach ( $result1 as $row ) {
        if ($row["email"]==$email){
          
		?>
      <tr>
      <script defer src="../js/script pop-up.js"></script>  
      <body>
      <td> <button data-modal-target="#modal"><?=$row["userName"]?></button> </td>
      
      <div class="modal" id="modal">
        <div class="modal-header">
          <div class="title">Example Modal</div>
          <button data-close-button class="close-button">&times;</button>
        </div>
        <div class="modal-body">

        Lorem ipsum dolor sit amet consectetur

        ye bhi display nahi ho raha hay be box me.. :(
        
        agar box banke pop up aajaye toh fir ye neeche ka table box me daal sakte hay bc !!!  
                    
           <!-- <table class="table table-striped"> 
              <thead>
                <tr style="text-align-last: center;">
                  <th>User name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Address</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody style="text-align-last: center;">

              
              <?php /*
                  //checking user 
                $check=false;
                #$userName = $_GET['userName'];
                $userName= $row["userName"];
                $sql="SELECT name,email,phone,address, active FROM user WHERE admin=0 AND name='$userName'";
                $result = $con->query( $sql );
            
              if ( $result->num_rows > 0 ) {
                  foreach ( $result as $row1 ) {
                
              ?>
                  <tr>
                    <td><?=$row1["name"]?></td>
                    <td><?=$row1["email"]?></td>
                    <td><?=$row1["phone"]?></td>
                    <td><?=$row1["address"]?></td>
                          
                    <?php 
                  if($row1["active"]==1){
                    #echo("Block");
                    ?>
                    <td><?="Blocked"?></td>
                    <?php
                    $check=true;
                  }else{
                    #echo("Unblock");
                    ?>
                    <td><?="Active"?></td>
                    <?php
                    $check=false;
                  }
                  ?></td>
                </tr>
                <?php } } */ ?>
              </tbody>  -->
          </div>
        </div>
        <div id="overlay"></div>
        </body>
      
        <td style="cursor:pointer; color:#00008B; text-decoration:none;" onclick="location.href='cropdetail.php?id=<?php echo $row['VID'] ?>'"><?=$row["name"]?></td>
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
	?>D
	<!-- Footer Section /- -->