<?php include("../header.php"); ?>
<?php
if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"])&& $_SESSION["role"]==0)){
	?>
<script>
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>	
<?php
#include("../dbCon.php");
	$con=connection();


 if(isset($_GET["id"])){
	$vehicleID=$_GET["id"];
	$updateChecking=false;
	 
	$sql3="SELECT * FROM `vehicledetails` WHERE `vehicleID`='$vehicleID' AND `updateStatus`= 1";
	$result = $con->query( $sql3 );
	if ( $result->num_rows > 0 ) {
		$updateChecking=true;
		foreach ( $result as $row ) {
			$description=$row["description"];

			$name=$row["name"];
			$type=$row["type"];
			$harvest_date=$row["harvest_date"];
			$weight=$row["weight"];
			$region=$row["region"];
			$Season=$row["Season"];
			$State=$row["State"];
			$soil_type=$row["soil_type"];
			$temperature=$row["temperature"];
			 
					}
				}
	
}


if(isset($_POST["submit"])){
		
	
	$okFlag=TRUE;
		$message="";
	
		if(!isset($_REQUEST["Temperature"]) || $_REQUEST["Temperature"]==''){
			$message="Please enter  temperature.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="Please enter name.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["type"]) || ($_REQUEST["type"])==''){
			$message="Please enter  type.";
			$okFlag=FALSE;
		}

		if(!isset($_REQUEST['harvest_date']) || ($_REQUEST['harvest_date'] == '')){
				$message .= 'Please enter  Harvest Date.<br>';
				$okFlag = FALSE;
			}

		if(!isset($_REQUEST['weight']) || ($_REQUEST['weight'] == '')){
			$message .= 'Please enter weight.<br>';
			$okFlag = FALSE;
		}

		if(!isset($_REQUEST['Region']) || ($_REQUEST['Region'] == '')){
				$message .= 'Please insert region.<br>';
				$okFlag = FALSE;
			}
		if(!isset($_REQUEST['Season']) || ($_REQUEST['Season'] == '')){
			$message .= 'Please Select season.<br>';
			$okFlag = FALSE;
		}
	
	// image upload
			
			$target_dir = "../img/vehicle/";
			$newName=date('YmdHis_');
			$newName .=basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir.$newName;
		
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$message= "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 200000000) {
				$message= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$message = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$message = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$message = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					
				} else {
					$message = "Sorry, there was an error uploading your file.";
				}
			}
			
	// image upload
			
			$target_dir = "../img/vehicle/";
			$newName2=date('YmdHis_');
			$newName2 .=basename($_FILES["fileToUpload_2"]["name"]);
			$target_file = $target_dir.$newName2;
		
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload_2"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$message= "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload_2"]["size"] > 200000000) {
				$message= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$message = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$message = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload_2"]["tmp_name"], $target_file)) {
					$message = "The file ". basename( $_FILES["fileToUpload_2"]["name"]). " has been uploaded.";
					
				} else {
					$message = "Sorry, there was an error uploading your file.";
				}
			}
			
	// image upload
			
			$target_dir = "../img/vehicle/";
			$newName3=date('YmdHis_');
			$newName3 .=basename($_FILES["fileToUpload_3"]["name"]);
			$target_file = $target_dir.$newName3;
		
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload_3"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$message= "File is not an image.";
					$uploadOk = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$message = "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload_3"]["size"] > 200000000) {
				$message= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$message = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$message = "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload_3"]["tmp_name"], $target_file)) {
					$message = "The file ". basename( $_FILES["fileToUpload_3"]["name"]). " has been uploaded.";
					
				} else {
					$message = "Sorry, there was an error uploading your file.";
				}
			}
				
	 
	if($okFlag){
	
		$getID=$_GET["id"];
		$name=$_REQUEST["name"];
		 
		$type=$_REQUEST["type"];
		$harvest_date=$_REQUEST["harvest_date"];
		$weight=$_REQUEST["weight"];
		$Season=$_REQUEST["Season"];
		$Region=$_REQUEST["Region"];
		$state=$_REQUEST["State"];
		$soil_type=$_REQUEST["soil_type"];
		$Temperature=$_REQUEST["Temperature"];
		$description=$_REQUEST["description"];
		$image=$newName;
		$image2=$newName2;
		$image3=$newName3;

		if($updateChecking==true){
		$sql="UPDATE `vehicledetails` SET  `description`='$description',`name`='$name',`type`='$type', `weight`='$weight',`harvest_date`='$harvest_date',`region`='$Region',`Season`='$Season',`State`='$state',`soil_type`='$soil_type',`temperature`='$Temperature',`updateStatus`=1 WHERE `vehicleID`='$getID'";
		
		$sql2="UPDATE `vehicleimage` SET  `name`='$image',`name2`='$image2',`name3`='$image3' WHERE `vehicleID`='$getID'";
		}else{
			$sql="INSERT INTO `vehicledetails`( `vehicleID`, `description`, `name`, `type`, `weight`, `harvest_date`, `region`, `Season`, `State`, `soil_type`, `temperature`,`updateStatus`) VALUES ('$getID','$description','$name','$type','$weight','$harvest_date','$Region','$Season','$state','$soil_type','$Temperature',1)";
			
		$sql2="INSERT INTO `vehicleimage`(  `vehicleID`, `name`, `name2`, `name3`) VALUES ( '$getID','$image','$image2','$image3')";
		}
		 
		 
		if(($con->query($sql)) && ($con->query($sql2))){
			$_SESSION["msg"]="Successfully update crop";
		}else{
			$_SESSION["msg"]="database error.";
		};
		
	}		
}


?>

	<div style="background: #333;">
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
								<h3 ><?php if($updateChecking == true){echo("Update crop Details");}else{echo("Add crop Details");} ?></h3>
								<div class="billing-field">

									<div class="col-md-6 form-group">
										<label> Name</label>
										<input type="text" class="form-control" name="name" value=" <?php if(isset($name)){echo($name);} ?>"  required/>
									</div>
									<div class="col-md-6 form-group">
										<label>Type</label>
										<input type="text" class="form-control" name="type" value=" <?php if(isset($type)){echo($type);} ?>"   required/>
									</div>

									<div class="col-md-6 form-group">
										<label>Weight</label>
										<input type="text" class="form-control" name="weight" value=" <?php if(isset($weight)){echo($weight);} ?>"   required/>
									</div>

										<div class="col-md-6 form-group">
										<label>Harvest Date</label>
										<input type="date" class="form-control" name="harvest_date" value="<?php if(isset($harvest_date)){echo($harvest_date);} ?>" required  />
									</div>

									<div class="col-md-6 form-group">
										<label>Region</label>
										 <select class="form-control" name="Region" required>
											<option value="<?php if(isset($Region) && $Region=="North"){echo($Region); }else{echo("North");} ?>" <?php if(isset($Region) && $Region=="North"){ ?>selected <?php } ?>>North</option>
											
											<option value="<?php if(isset($Region)&& $Region=="East"){echo($Region); }else{echo("East");} ?>" <?php if(isset($Region)&& $Region=="East"){ ?>selected <?php } ?>>East</option>
											<option value="<?php if(isset($Region)&& $Region=="South"){echo($Region); }else{echo("South");} ?>" <?php if(isset($Region)&& $Region=="South"){ ?>selected <?php } ?> >South</option>
											<option value="<?php if(isset($Region)&& $Region=="West"){echo($Region); }else{echo("West");} ?>" <?php if(isset($Region)&& $Region=="West"){ ?>selected <?php } ?> >West</option>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>Season</label>
										<select class="form-control" name="Season" required>
											<option value="<?php if(isset($Season) && $Season =="Kharif"){echo($Season); }else{echo("Kharif");} ?>" <?php if(isset($Season)&& $Season =="Kharif"){ ?>selected <?php } ?> >Kharif</option>
											
											<option value="<?php if(isset($Season) && $Season =="Rabi"){echo($Season); }else{echo("Rabi");} ?>" <?php if(isset($Season)&& $Season =="Rabi"){ ?>selected <?php } ?>>Rabi</option>
											<option value="<?php if(isset($Season) && $Season =="Zaid"){echo($Season); }else{echo("Zaid");} ?>" <?php if(isset($Season)&& $Season =="Zaid"){ ?>selected <?php } ?>>Zaid</option>

											<option value="<?php if(isset($Season) && $Season =="Other"){echo($Season); }else{echo("Other");} ?>" <?php if(isset($Season)&& $Season =="Other"){ ?>selected <?php } ?>>Other</option>
											
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>State</label>
										<select class="form-control" name="State" required>
										<option value="">------------Select State------------</option>
										<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
										<option value="Andhra Pradesh">Andhra Pradesh</option>
										<option value="Arunachal Pradesh">Arunachal Pradesh</option>
										<option value="Assam">Assam</option>
										<option value="Bihar">Bihar</option>
										<option value="Chandigarh">Chandigarh</option>
										<option value="Chhattisgarh">Chhattisgarh</option>
										<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
										<option value="Daman and Diu">Daman and Diu</option>
										<option value="Delhi">Delhi</option>
										<option value="Goa">Goa</option>
										<option value="Gujarat">Gujarat</option>
										<option value="Haryana">Haryana</option>
										<option value="Himachal Pradesh">Himachal Pradesh</option>
										<option value="Jammu and Kashmir">Jammu and Kashmir</option>
										<option value="Jharkhand">Jharkhand</option>
										<option value="Karnataka">Karnataka</option>
										<option value="Kerala">Kerala</option>
										<option value="Lakshadweep">Lakshadweep</option>
										<option value="Madhya Pradesh">Madhya Pradesh</option>
										<option value="Maharashtra">Maharashtra</option>
										<option value="Manipur">Manipur</option>
										<option value="Meghalaya">Meghalaya</option>
										<option value="Mizoram">Mizoram</option>
										<option value="Nagaland">Nagaland</option>
										<option value="Orissa">Orissa</option>
										<option value="Pondicherry">Pondicherry</option>
										<option value="Punjab">Punjab</option>
										<option value="Rajasthan">Rajasthan</option>
										<option value="Sikkim">Sikkim</option>
										<option value="Tamil Nadu">Tamil Nadu</option>
										<option value="Tripura">Tripura</option>
										<option value="Uttaranchal">Uttaranchal</option>
										<option value="Uttar Pradesh">Uttar Pradesh</option>
										<option value="West Bengal">West Bengal</option>
										</select>
									</div>
									<div class="col-md-6 form-group">
										<label>Soil Type</label>
										<select class="form-control" name="soil_type" required>
											<option value="<?php if(isset($soil_type)){echo($soil_type); }else{echo("Clay");} ?>" <?php if(isset($soil_type)&& $soil_type=="Clay"){ ?>selected <?php } ?>>Clay</option>
											<option value="<?php if(isset($soil_type)){echo($soil_type); }else{echo("Sandy");} ?>" <?php if(isset($soil_type)&& $soil_type=="Sandy"){ ?>selected <?php } ?>>Sandy</option>
											<option value="<?php if(isset($soil_type)){echo($soil_type); }else{echo("Silty");} ?>" <?php if(isset($soil_type)&& $soil_type=="Silty"){ ?>selected <?php } ?>>Silty</option>
											<option value="<?php if(isset($soil_type)){echo($soil_type); }else{echo("Peaty");} ?>" <?php if(isset($soil_type)&& $soil_type=="Peaty"){ ?>selected <?php } ?>>Peaty</option>
											<option value="<?php if(isset($soil_type)){echo($soil_type); }else{echo("Chalky");} ?>" <?php if(isset($soil_type)&& $soil_type=="Chalky"){ ?>selected <?php } ?>>Chalky</option>
											<option value="<?php if(isset($soil_type)){echo($soil_type); }else{echo("Loamy");} ?>" <?php if(isset($soil_type)&& $soil_type=="Loamy"){ ?>selected <?php } ?>>Loamy</option>	
											<option value="<?php if(isset($soil_type)){echo($soil_type); }else{echo("Other");} ?>" <?php if(isset($soil_type)&& $soil_type=="Other"){ ?>selected <?php } ?>>Other</option>										 
										</select>
									</div>
										
										
									<div class="col-md-6 form-group">
										<label>Temperature Requirement</label>
										<select class="form-control" name="Temperature" required>
											<option value="<?php if(isset($Temperature)){echo($Temperature); }else{echo("15- 20 degree C");} ?>" <?php if(isset($Temperature)&& $Temperature=="15- 20 degree C"){ ?>selected <?php } ?> >15- 20 degree C</option>
											
											<option value="<?php if(isset($Temperature)){echo($Temperature); }else{echo("20- 25 degree C");} ?>" <?php if(isset($Temperature)&& $Temperature=="20- 25 degree C"){ ?>selected <?php } ?>>20- 25 degree C</option>
											
											<option value="<?php if(isset($Temperature)){echo($Temperature); }else{echo("25- 30 degree C");} ?>" <?php if(isset($Temperature)&& $Temperature=="25- 30 degree C"){ ?>selected <?php } ?>>25- 30 degree C</option>
											<option value="<?php if(isset($Temperature)){echo($Temperature); }else{echo("30- 35 degree C");} ?>" <?php if(isset($Temperature)&& $Temperature=="30- 35 degree C"){ ?>selected <?php } ?>>30- 35 degree C</option>
											<option value="<?php if(isset($Temperature)){echo($Temperature); }else{echo("35- 40 degree C");} ?>" <?php if(isset($Temperature)&& $Temperature=="35- 40 degree C"){ ?>selected <?php } ?>>35- 40 degree C</option>
											<option value="<?php if(isset($Temperature)){echo($Temperature); }else{echo("40- 45 degree C");} ?>" <?php if(isset($Temperature)&& $Temperature=="40- 45 degree C"){ ?>selected <?php } ?>>40- 45 degree C</option>
											 
										</select>
									</div>	
								
								<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control " name="fileToUpload"   />
									</div>
								 
								<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control " name="fileToUpload_2"   />
								</div>
								 
								<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control " name="fileToUpload_3"   />
								</div>
								<div class="col-lg-12 form-group">
										<label>Description</label>
										<textarea class="col-lg-12 form-control" name="description" rows="4"><?php if(isset($description)){echo($description);} ?></textarea>
									</div>
								<div class="col-md-3 form-group" >
									 <input  style="margin-left: 130%"   class="btn btn-success   form-control" type="submit" value="<?php if($updateChecking == true){echo("Update");}else{echo("Add");} ?>" name="submit"/> 
								</div>
								
						 
							
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
	?>
	<!-- Footer Section /- -->