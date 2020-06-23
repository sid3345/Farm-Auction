  <?php
 
include("../dbCon.php");
		$con=connection();
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}

date_default_timezone_set("Asia/Kolkata");
$today=date("Y-m-d");

$query="SELECT email FROM user WHERE ID = '".$_SESSION['userid']."'";
$result2=$con->query( $query);
if ( $result2->num_rows > 0 ) {
	foreach ( $result2 as $row ) {
		$uemail=$row['email'];
	}
}


$userID=$_SESSION["userid"];
$sql="SELECT vehicle.ID as VID,vehicle.name,vehicle.email,vehicle.EndDate,vehicle.image,vehicle.price as `baseprice`, vehicle.status , bidder.biddingTime,MAX(bidder.price) as `bidprice`, bidder.confirmbid FROM `bidder` INNER JOIN vehicle ON vehicle.ID=bidder.vehicleID INNER JOIN user ON bidder.userID=user.ID WHERE user.ID='$userID' GROUP BY bidder.vehicleID ORDER BY `bidder`.`biddingTime` DESC";
$result = $con->query( $sql );
	if ( $result->num_rows > 0 ) {
		foreach ( $result as $row ) {
			$active = '';
			$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
			$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
		
			$user_last_activity = fetch_user_last_activity($row['email'],$con);
			if($user_last_activity > $current_timestamp)
			{
			$active = '<span class="label label-success">Online</span>';
			}
			else
			{
			$active = '<span class="label label-danger">Offline</span>';
			}
			$enddate=$row["EndDate"];
			$bidprice=$row["bidprice"];
			$vehicleID=$row["VID"];
			$confirmbid=$row["confirmbid"];
			$status=$row["status"];

?>
	<tr style="text-align: center;">
        <td style="cursor:pointer; color:#00008B; text-decoration:none;" onclick="location.href='cropdetail.php?id=<?php echo $vehicleID ?>'"><?=$row["name"]?></td>
        <td><?=$row["email"]?></td>
		
		<td><?=$row["EndDate"]?></td>
        <!-- <td><img style="max-width: 200px; max-height: 200px;" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["image"]?>" ></td> -->
        <td><?=$row["baseprice"]?></td>
        <td><?=$row["bidprice"]?></td>
        <td> <?=$row["biddingTime"]?></td>
        <td> <?php	$sql2="SELECT MAX(price) as 'topbidprice' FROM `bidder` WHERE vehicleID='$vehicleID'";
				$result2 = $con->query( $sql2 );
					if ( $result2->num_rows > 0 ) {
						foreach ( $result2 as $row2 ) {
								$topbidPrice=$row2["topbidprice"];
				
						}
					}
				 if($today>$enddate ){
			 
				if($topbidPrice>$bidprice){
					echo("Lose");}
				elseif($status==0){echo("Bidding closed by authority");}
				else{ ?> <a href="<?=$_SESSION["directory"]?>customer/winner.php?id=<?=$vehicleID?>"><?php echo("Win"); if ($confirmbid==1){echo("(Confirmed)");} ?></a>   <?php }
				;}elseif($status==0){echo("Bidding closed by authority");}
				else{echo("Bid in Progress");} ?></td>
		<td><?php echo $active.' '.count_unseen_message($row['email'], $uemail, $con) ?></td>
		<!--Below ID is vehicle ID.  
		<<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="<?php echo $row['ID'] ?>" data-tousername="<?php echo $row['email'] ?>">Start Chat</button></td>
			
		<td><?php echo $active ?></td> -->
			<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="<?php echo $row['VID'] ?>" data-tousername="<?php echo $row['email'] ?>" <?php if($topbidPrice!=$bidprice){ ?> title='You can chat with seller only if you are highest bidder' onclick="not_top_bidder()" disabled<?php } ?> >Start Chat</button> </td>
      </tr>
      
      
   <?php  } 
	}else{echo("......NO BIDDING DATA.......");} ?>

<script>
function not_top_bidder() {
  alert("You need to be highest bidder to chat with seller");
}
</script>

<!-- Dont move below code -->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>