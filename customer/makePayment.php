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


<?php
if(isset($_POST["submit"])){
	$userID=$_SESSION["userid"];
	$from=$_POST["payment"];
	$account=$_POST["account"];
	$amount=$_POST["amount"];
	$sql="INSERT INTO `deposit`(  `userID`, `paymentFrom`, `account`, `amount`, `role`) VALUES ('$userID','$from','$account','$amount',0)";
	if($con->query($sql)){
		$msg="Deposit information successfully submitted";
	}else{
		$msg="Database error";
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
	<div class="row">
		<div>
			 
			<h2>Payment information</h2>
			<form class="form-horizontal" action="" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="payment">Payment from: </label>
      <div class="col-sm-4">
       <select name="payment" id="payment" class="form-control">
					<option value="DBBL">SBI</option>
					<option value="DBBL online banking">HDFC</option>
					<option value="NexusPay">ICICI</option>
					<option value="Other">Other</option>
				</select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="acc">Account No:</label>
      <div class="col-sm-4">          
        <input type="number" class="form-control" id="acc" placeholder="Enter your account number" name="account">
      </div>
    </div>
    <div class="form-group">        
       <label class="control-label col-sm-2" for="amount">Amount:</label>
      <div class="col-sm-4">          
        <input type="number" class="form-control" id="amount" placeholder="Enter total amount (INR)" name="amount">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
      </div>
    </div>
  </form>
		</div>
	</div>
</div>










 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->