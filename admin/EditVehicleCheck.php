 

  <?php
include("../dbCon.php");
		$con=connection();
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	$check=false;
		$sql="SELECT * FROM `vehicle`";
		$result = $con->query( $sql );
		if ( $result->num_rows > 0 ) {
			foreach ( $result as $row ) {
		 
	?>
      <tr>
		<td style="cursor:pointer; color:#00008B; text-decoration:none;" onclick="location.href='../customer/cropdetail.php?id=<?php echo $row['ID'] ?>'"><?=$row["name"]?></td>
        <td><?=$row["type"]?></td>
        <td><?=$row["price"]?></td>
        <td><?=$row["startDate"]?></td>
        <td> <?php
			date_default_timezone_set("Asia/Kolkata");
			$nowDate=date("Y-m-d");
			$enddate=$row["EndDate"];
			if($nowDate > $enddate){
				?>
				<span style="background-color: #BF585A"><?=$enddate?></span>
					<?php
			}else{
				echo($enddate);
			}
			
			?>
      </td>
         <td><img style="max-height: 140px; max-width: 140px;" alt="<?=$row["image"]?>"  src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["image"]?>"></td>
        <td><?php
			if($row["status"]==1){
				echo("Active");
				$check=true;
			}else{
				echo("Deactive");
				$check=false;
			}
			?></td>
    
        <td><span><a ><?php if($check==true) {?><img  data-toggle="tooltip" title="Deactive Item "  id="DeleteImg" style="max-height: 40px; max-width: 40px;" onClick="remove(<?=$row["ID"]?>)" src="../img/icon/deactive.png"><?php }else{ ?>
        <img  data-toggle="tooltip" title="Active Item "  id="" style="max-height: 40px; max-width: 40px;" onClick="active(<?=$row["ID"]?>)" src="../img/icon/active.jpg"> 
        <?php }
		  ?>
        </a></span>
        	
        	
        </td>
      </tr>
     <?php }
		} ?>
 