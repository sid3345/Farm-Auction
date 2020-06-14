<?php include("../fheader.php"); ?>
<?php
	if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"]) && $_SESSION["role"]!="0")){
	?>
<script>
	alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>login.php";
</script>
	<?php
}
?>	
<?php
//include("../dbCon.php");
	//	$con=connection();


// Select data from database
$GetID=$_GET["id"];

$sql3="SELECT * FROM `vehicle` WHERE `ID`='$GetID'";
$result3 = $con->query( $sql3 );
	if ( $result3->num_rows > 0 ) { 
		foreach ( $result3 as $row ) {
			$name=$row["name"];
			$type=$row["type"];
			$catagory=$row["catagory"];
			$startDate=$row["startDate"];
			$EndDate=$row["EndDate"];
            $price=$row["price"];
		}
	}



if(isset($_POST["submit"])){
		
	
	$okFlag=TRUE;
	
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="please type  name.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["price"]) || $_REQUEST["price"]==''){
			$message="please type base price.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["startDate"]) || ($_REQUEST["startDate"])==''){
			$message="please type  startDate.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST['EndDate']) || ($_REQUEST['EndDate'] == '')){
				$message .= 'Please type  End Date.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['type']) || ($_REQUEST['type'] == '')){
				$message .= 'Please insert crop type.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['catagory']) || ($_REQUEST['catagory'] == '')){
			$message .= 'Please Select catagory.<br>';
			$okFlag = FALSE;
		}
	
	
	
	
	if($okFlag){

		$name=$_REQUEST["name"];
		 
		$startDate=$_REQUEST["startDate"];
		$EndDate=$_REQUEST["EndDate"];
		$catagory=$_REQUEST["catagory"];
		$type=$_REQUEST["type"];
		$price=$_REQUEST["price"];


		$sql="UPDATE `vehicle` SET `name`='$name',`type`='$type',`catagory`='$catagory',`startDate`='$startDate',`EndDate`='$EndDate',`price`='$price' WHERE `ID`='$GetID'";
		
		if($con->query($sql)){
			?>
			<script>
			if (window.confirm("Press OK to Continue.")) {
			  window.location.href = "Addcropdetail.php?id=<?=$row["ID"]?>";
			}
			</script>;
			<?php
			$_SESSION["msg"]="Successfully update crop";
		}
		else{
			$_SESSION["msg"]="database error.";
		};
		
	}
	
	
}


?>

	<div style="background: #333; padding-top: 200px; padding-bottom: 50px;">
		<div class="container">
			<div class="row">
				<div style="color: aliceblue;" class="login-check">
					<div class="checkout-form" >

						<?php if(isset($_SESSION["msg"])){ ?>
							<div class="alert alert-success" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong> <?=$_SESSION["msg"]?></strong>
							</div>
							<script>
								window.setTimeout(function() {
								    $(".alert").fadeTo(500, 0).slideUp(500, function(){
								        $(this).remove(); 
								    });
								}, 4000);
							</script>
							
						<?php
							unset($_SESSION["msg"]);
							}
						
						?>


						<form action="" method="post" enctype="multipart/form-data">
							<div class="  form-group col-md-12">
								<h3 >Add Crop</h3>
								<div class="billing-field">

									<div class="col-md-6 form-group">
										<label> Crop Name</label>
										<input type="text" class="form-control" name="name" value="<?=$name?>"  required/>
									</div>
									<div class="col-md-6 form-group">
										<label>Base Price</label>
										<input type="number" class="form-control" name="price" value="<?=$price?>"  required/>
									</div>

									

										<div class="col-md-6 form-group">
										<label>start Date</label>
										<input type="date" class="form-control" name="startDate" value="<?=$startDate?>" required id="datePicker"/>
									</div>

									<div class="col-md-6 form-group">
										<label>End Date</label>
										<input type="date" class="form-control" name="EndDate" value="<?=$EndDate?>" required/>
									</div>
									
									<div class="col-md-6 form-group">
										<label>Type</label>
										<select class="form-control" name="type" required id="Type" onChange="SelectCatagory()">
											<option value="Vegetable">Vegetable</option>
										<option value="Fruit">Fruit</option>
										</select>
									</div>

									<div class="col-md-6 form-group">
										<label>Category</label>
										<select class="form-control" name="catagory" required id="Catagory">

										</select>
									</div>

									<script>
									function SelectCatagory(){
										//$("#Type").on('change',function(){ 
										var value= $("#Type").val();
											$.get('<?=$_SESSION["directory"]?>admin/AddVehiclecatagory.php',{Count:value},function(data){
											$("#Catagory").html(data);
												
										});
									}
											
									setTimeout(function(){SelectCatagory();},1000);
									</script>
								
							
								<div>
									<input style="   min-width: 100px; margin-left: 45%;" class="btn btn-success" type="submit" value="Update" name="submit"/>
									 
								</div>
								
							</div>
							
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
	
	
																		

	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>D
	<!-- Footer Section /- -->
	




