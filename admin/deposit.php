<?php include("../header.php");
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>login.php";
</script>
	<?php
}


if(isset($_POST["submit"])){
	$id=$_POST["ID"];
	$sql="UPDATE `deposit` SET `role` = '1' WHERE `deposit`.`ID` ='$id'";
	if($con->query($sql)){
		$msg="Accept the payment";
	}else{
		$msg="database error";
	}
}

?>


<div class="container">
		<div>
			<?php if(isset($msg)){ ?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>
					<?=$msg?>
				</strong>
			</div>
			<script>
				window.setTimeout( function () {
					$( ".alert" ).fadeTo( 500, 0 ).slideUp( 500, function () {
						$( this ).remove();
					} );
				}, 8000 );
			</script>

			<?php

			}

			?>
		</div>
	<div>
		<table class=" table">
			<thead>
				<tr>
					<th>Email</th>
					<th>Payment From</th>
					<th>Account No</th>
					<th>Amount</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			<?php
$sql="SELECT deposit.*, user.email FROM `deposit` INNER JOIN user ON user.ID=deposit.userID ORDER BY `deposit`.`ID` DESC";
$result3 = $con->query( $sql );
							if ( $result3->num_rows > 0 ) {
								foreach ( $result3 as $row ) {
									$email=$row["email"];
									$paymentFrom=$row["paymentFrom"];
									$account=$row["account"];
									$amount=$row["amount"];
									$role=$row["role"];
									
									?>
				<tr>
					<td><?=$email?></td>			
					<td><?=$paymentFrom?></td>			
					<td><?=$account?></td>			
					<td><?=$amount?></td>			
					<form action="" method="post">
						<td><span><a><?php if($role==0) {?> <input class="btn btn-primary" type="submit" name="submit" value="Accept"> <input type="hidden" value="<?=$row["ID"] ?>" name="ID"> </a> <?php }else{ ?>
      			 <input class="btn btn-primary" type="submit" name="submit" value="Accept" disabled> 
        <?php }
		  ?>
        </span>
        	 
        	
        </td>
					</form>		
									
							<?php
								}
							}
?>

				</tr>
			</tbody>
		</table>
	</div>
</div>




 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->