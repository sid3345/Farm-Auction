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

$userid=$_SESSION["userid"];
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
            $photo=$row["image"];
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
	
	// image upload
			
	$target_dir = "../img/vehicle/";
	//$newName=date('YmdHis_');
	$newName="$userid";
	$newName .=basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir.$newName;
	if(!empty($_FILES["fileToUpload"]["name"])){
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			$SESSION["message"]= "File is not an image.";
			$uploadOk = 0;
		}
	
	// Check if file already exists
	if (file_exists($target_file)) {
		$SESSION["message"] = "Sorry, file name already exists. Please change the name of file.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 200000000) {
		$SESSION["message"]= "Sorry, your file is too large. upload image within 2MB";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		$SESSION["message"] = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		$SESSION["message"] .= "";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$SESSION["message"] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			
		} else {
			$SESSION["message"] = "Sorry, there was an error uploading your file.";
		}
	}
}	
			
	
	
	
	
	if($okFlag){

		$name=$_REQUEST["name"];
		 
		$startDate=$_REQUEST["startDate"];
		$EndDate=$_REQUEST["EndDate"];
		$catagory=$_REQUEST["catagory"];
		$type=$_REQUEST["type"];
		$price=$_REQUEST["price"];
		$image=$newName;


		$sql="UPDATE `vehicle` SET `name`='$name',`type`='$type',`catagory`='$catagory',`startDate`='$startDate',`EndDate`='$EndDate',`price`='$price' WHERE `ID`='$GetID'";
		
		if (substr($image,-4)== ".jpg" and $uploadOk==1) {
			$sql21="UPDATE `vehicle` SET  `image`='$image' WHERE `ID`='$GetID'";
			$con->query($sql21);
			}

		if($con->query($sql)){
			$_SESSION["msg"]="Successfully update crop";
		}else{
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
							  <strong> <?=$_SESSION["msg"]?></strong></br>
							
							  <?php if(isset($SESSION["message"])){?>
							  <strong> <?=$SESSION["message"]?></strong></br>
							  <?php
							  unset($SESSION["message"]);
							}
							?>

							</div>
							<script>
								window.setTimeout(function() {
								    $(".alert").fadeTo(500, 0).slideUp(500, function(){
								        $(this).remove(); 
								    });
								}, 8000);
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
								
								
								<div class="col-md-6 form-group">
										<label>Image</label>
										<br>
										<?php
											if(isset($photo) && $photo !=""){
							 
										?>
                        				<img src="../img/vehicle/<?=$photo?>" class="mx-auto img-fluid  d-block" style="max-height: 150px; width:260px; margin-bottom:10px" alt="user">
                        				<?php
											}
										?>
										<input type="file" class="form-control " name="fileToUpload" />
								</div>
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
	




