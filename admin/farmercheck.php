 

  <?php
//connect DB link
include("../dbCon.php");
		$con=connection();
	 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
//checking user 
	$check=false;
		$sql="SELECT * FROM farmer where admin =0";
		$result = $con->query( $sql );
		if ( $result->num_rows > 0 ) {
			foreach ( $result as $row ) {
		 
	?>
      <tr>
        <td style="cursor:pointer; color:#00008B; text-decoration:none;" onclick="location.href='../customer/farmerlist_popup.php?userName=<?php echo $row['name'] ?>'"><?=$row["name"]?></td>
        <td><?=$row["email"]?></td>
        <td><?=$row["phone"]?></td>
        <td><?=$row["address"]?></td>
        <td><?=$row["state"]?></td>
        <td><?=$row["pincode"]?></td>
       
         
        <td><?php
			if($row["active"]==1){
				echo("Block");
				$check=true;
			}else{
				echo("Unblock");
				$check=false;
			}
			?></td>
    <!-- control user -->
        <td><span><a ><?php if($check==true) {?><img  data-toggle="tooltip" title="Deactive Item "  id="DeleteImg" style="max-height: 40px; max-width: 40px;" onClick="block(<?=$row["ID"]?>)" src="../img/icon/blocks.png"><?php }else{ ?>
        <img  data-toggle="tooltip" title="Active Item "  id="" style="max-height: 40px; max-width: 40px;" onClick="unblock(<?=$row["ID"]?>)" src="../img/icon/unblocks.png"> 
        <?php }
		  ?>
        </a></span>
        	 
        	
        </td>
      </tr>
     <?php }
		} ?>
 