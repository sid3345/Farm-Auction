<?php include("../fheader.php"); ?>
<?php
if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"])&& $_SESSION["role"]==1)){
	?>
<script>
	location.href="<?=$_SESSION["directory"]?>home.php";
</script>
	<?php
}
?>
<!--
<script type="text/javascript">
	$.noConflict(true); // <-- true removes the reference to jQuery aswell.
</script>	-->

<!--put your map api javascript url with key here-->
<script src="https://apis.mapmyindia.com/advancedmaps/v1/zmu2tzu3bz6ltcjewcfdd5xaagcw8agj/map_load?v=1.2"></script>
<link rel="stylesheet" href="../css/jquery-ui.min.css" />

<script type="text/javascript" src="../js/jquery.min_map.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min_map.js"></script>

<style>

.loading{
	background-image: url(loading.gif);
	background-position: right center;
	background-repeat: no-repeat;
}
.ui-autocomplete .highlight {
	text-decoration: underline;
}
.ui-autocomplete{
}
/*marker text span css*/
.my-div-span{
position: absolute;left:1.5em;right: 1em;top:1.4em;bottom:2.5em;font-size:9px;font-weight:bold;width:1px;color:black;
}
.tab-details{
width:300px;padding:3px;font-size: 11px;text-align:left
}
.tab-details th{
white-space:nowrap
}
.details-header{
padding: 0 12px;color:green;font-size:13px;
}
.details-list{
list-style-type:decimal;color:green; padding:2px 2px 0 30px;
}
#result{
border-top: 1px solid #e9e9e9;padding:10px; margin-top: 12px;
}
#suggestdetail{
border-bottom: 1px solid #e9e9e9;display: none
}
#result{
	border-top: 1px solid #e9e9e9;padding:10px; margin-top: 12px;
}
#suggestdetail{
	border-bottom: 1px solid #e9e9e9;display: none
}
.txt-search{
	width: 254px;margin-right: 10px;padding:5px;border:1px solid #ddd;color:#555;   
}
</style>
					

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
			$Region=$row["Region"];
			$Season=$row["Season"];
			$State=$row["State"];
			$soil_type=$row["soil_type"];
			$temperature=$row["temperature"];
			 
					}
				}
	
	$sql4="SELECT * FROM `vehicle` WHERE `ID`='$vehicleID' AND `Status`= 1";
	$result = $con->query( $sql4 );
	if ( $result->num_rows > 0 ) {
		foreach ( $result as $row ) {

			$name=$row["name"];
			$type=$row["type"];
			 
					}
				}

	$sql5="SELECT * FROM `vehicleimage` WHERE `vehicleID`='$vehicleID'";
	$result = $con->query( $sql5 );
	if ( $result->num_rows > 0 ) {
		foreach ( $result as $row ) {

			$photo=$row["name"];
			$photo2=$row["name2"];
			$photo3=$row["name3"];

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
			$newName="$vehicleID" . "_1_";
			$newName .=basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir.$newName;
			if(!empty($_FILES["fileToUpload"]["name"])){
			$uploadOk1 = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk1 = 1;
				} else {
					$SESSION["message1"]= "File is not an image.";
					$uploadOk1 = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$SESSION["message1"] = "Sorry, file name already exists. Please change the name of 1st file.";
				$uploadOk1 = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 200000000) {
				$SESSION["message1"]= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk1 = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$SESSION["message1"] = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk1 = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk1 == 0) {
				$SESSION["message1"] .= "";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$SESSION["message1"] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					
				} else {
					$SESSION["message1"] = "Sorry, there was an error uploading your file.";
				}
			}
		}	
			
	// image upload
			
			$target_dir = "../img/vehicle/";
			//$newName=date('YmdHis_');
			$newName2="$vehicleID" . "_2_";
			$newName2 .=basename($_FILES["fileToUpload_2"]["name"]);
			$target_file = $target_dir.$newName2;
			if(!empty($_FILES["fileToUpload_2"]["name"])){
			$uploadOk2 = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload_2"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk2 = 1;
				} else {
					$SESSION["message2"]= "File is not an image.";
					$uploadOk2 = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$SESSION["message2"] = "Sorry, file name already exists. Please change the name of 2nd file.";
				$uploadOk2 = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload_2"]["size"] > 200000000) {
				$SESSION["message2"]= "Sorry, your file is too large. upload image within 2MB";
				$uploadOk2 = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$SESSION["message2"] = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk2 = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk2 == 0) {
				$SESSION["message2"] .= "";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload_2"]["tmp_name"], $target_file)) {
					$SESSION["message2"] = "The file ". basename( $_FILES["fileToUpload_2"]["name"]). " has been uploaded.";
					
				} else {
					$SESSION["message2"] = "Sorry, there was an error uploading your file.";
				}
			}
		}
			
	// image upload
			
			$target_dir = "../img/vehicle/";
			$newName3="$vehicleID" . "_3_";
			$newName3 .=basename($_FILES["fileToUpload_3"]["name"]);
			$target_file = $target_dir.$newName3;
			if(!empty($_FILES["fileToUpload_3"]["name"])){
			$uploadOk3 = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			
				$check = getimagesize($_FILES["fileToUpload_3"]["tmp_name"]);
				if($check !== false) {
					//echo "File is an image - " . $check["mime"] . ".";
					$uploadOk3 = 1;
				} else {
					$SESSION["message3"]= "File is not an image.";
					$uploadOk3 = 0;
				}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				$SESSION["message3"] = "Sorry, file name already exists. Please change the name of 3rd file.";
				$uploadOk3 = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload_3"]["size"] > 200000000) {
				$SESSION["message3"] = "Sorry, your file is too large. upload image within 2MB";
				$uploadOk3 = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$SESSION["message3"] = "Sorry, only jpg, JPEG, png & GIF files are allowed.";
				$uploadOk3 = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk3 == 0) {
				$SESSION["message3"] .= "";
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload_3"]["tmp_name"], $target_file)) {
					$SESSION["message3"] = "The file ". basename( $_FILES["fileToUpload_3"]["name"]). " has been uploaded.";
					
				} else {
					$SESSION["message3"] = "Sorry, there was an error uploading your file.";
				}
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
		
		if (substr($image,-4)== ".jpg" and $uploadOk1==1) {
		$sql21="UPDATE `vehicleimage` SET  `name`='$image' WHERE `vehicleID`='$getID'";
		$con->query($sql21);
		}

		if (substr($image2,-4)== ".jpg" and $uploadOk2==1) {
		$sql22="UPDATE `vehicleimage` SET  `name2`='$image2' WHERE `vehicleID`='$getID'";
		$con->query($sql22);
		}

		if (substr($image3,-4)== ".jpg" and $uploadOk3==1) {
		$sql23="UPDATE `vehicleimage` SET  `name3`='$image3' WHERE `vehicleID`='$getID'";
		$con->query($sql23);
		}

		}


		else{
		$sql="INSERT INTO `vehicledetails`( `vehicleID`, `description`, `name`, `type`, `weight`, `harvest_date`, `region`, `Season`, `State`, `soil_type`, `temperature`,`updateStatus`) VALUES ('$getID','$description','$name','$type','$weight','$harvest_date','$Region','$Season','$state','$soil_type','$Temperature',1)";
		$sql2="INSERT INTO `vehicleimage`(  `vehicleID`) VALUES ( '$getID')";
		$con->query($sql2);

		if (substr($image,-4)== ".jpg" and $uploadOk1==1) {
			$sql21="UPDATE `vehicleimage` SET  `name`='$image' WHERE `vehicleID`='$getID'";
			$con->query($sql21);
			}
			
		if (substr($image2,-4)== ".jpg" and $uploadOk2==1) {
			$sql22="UPDATE `vehicleimage` SET  `name2`='$image2' WHERE `vehicleID`='$getID'";
			$con->query($sql22);
			}
	
		if (substr($image3,-4)== ".jpg" and $uploadOk3==1) {
			$sql23="UPDATE `vehicleimage` SET  `name3`='$image3' WHERE `vehicleID`='$getID'";
			$con->query($sql23);
			}
	
		}
		 
		 
		if($con->query($sql)){
			
			$_SESSION["msg"]="Successfully update crop details.";
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
							  <strong> <?=$_SESSION["msg"]?></strong></br>

							  <?php if(isset($SESSION["message1"])){?>
							  <strong> <?=$SESSION["message1"]?></strong></br>
							  <?php
							  unset($SESSION["message1"]);
							}
							?>
							  <?php if(isset($SESSION["message2"])){?>
							  <strong> <?=$SESSION["message2"]?></strong></br>
							  <?php
							  unset($SESSION["message2"]);
							}
							?>
							  <?php if(isset($SESSION["message3"])){?>
							  <strong> <?=$SESSION["message3"]?></strong>
							  <?php
							  unset($SESSION["message3"]);
							}
							?>
							</div>
							<script>
								window.setTimeout(function() {
								    $(".alert").fadeTo(5009, 0).slideUp(5009, function(){
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
								<?php if($updateChecking == TRUE){echo("Update crop Details");}else{echo("Add crop Details");} ?>
								<div class="billing-field">

									<div class="col-md-6 form-group">
										<label> Name</label>
										<input type="text" class="form-control" name="name" value=" <?php if(isset($name)){echo($name);} ?>"  required/>
									</div>
									<div class="col-md-6 form-group">
										<label>Type</label>
										<select class="form-control" name="type" value=" <?php if(isset($type)){echo($type);} ?>" required >
											<option value="Vegetable">Vegetable</option>
										<option value="Fruit">Fruit</option>
										</select>
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
										<select class="form-control" name="State" id='state_' required>
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

									<div id="menu">
										<label>Region</label>
												<input class="form-control"  name="Region" id="autocomplete" type="text" placeholder="Address or location"
													onkeypress="if (event.which == 13 || event.keyCode == 13)
																result()" required>					
											<div id="result"></div>
											<div id="suggestdetail" ></div>
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
										<br>
										<?php
											if(isset($photo) && $photo !=""){
							 
										?>
                        				<img src="../img/vehicle/<?=$photo?>" class="mx-auto img-fluid img d-block" style="height: 150px; width:260px; margin-bottom:10px" alt="user">
                        				<?php
											}
										?>
										<input type="file" class="form-control " name="fileToUpload" />
								</div>
								 
								<div class="col-md-6 form-group">
										<label>Image</label>
										<br>
										<?php
											if(isset($photo2) && $photo2 !=""){
							 
										?>
                        				<img src="../img/vehicle/<?=$photo2?>" class="mx-auto img-fluid img d-block" style="height: 150px; width:260px; margin-bottom:10px" alt="user">
                        				<?php
											}
										?>
										<input type="file" class="form-control " name="fileToUpload_2"   />
								</div>
								 
								<div class="col-md-6 form-group">
										<label>Image</label>
										<br>
										<?php
											if(isset($photo3) && $photo3 !=""){
							 
										?>
                        				<img src="../img/vehicle/<?=$photo3?>" class="mx-auto img-fluid img d-block" style="max-height: 150px; width:260px; margin-bottom:10px" alt="user">
                        				<?php
											}
										?>
										<input type="file" class="form-control " name="fileToUpload_3"   />
								</div>

								<div class="col-md-12 form-group">
										<label>Description</label>
										<textarea class="form-control" name="description" rows="4"><?php if(isset($description)){echo($description);} ?></textarea>
								</div>
								
								<div class="col-md-3 form-group" >
									 <input  style="margin-left: 170% ; margin-top:10%"   class="btn btn-success   form-control" type="submit" value="<?php if($updateChecking == true){echo("Update");}else{echo("Add");} ?>" name="submit"/> 
								</div>
							
								</div>
									
								</div>
						</form>
					 </div>
				</div>	
			</div>
		</div>
	</div>

<script>	
/***autosuggest function.***/
$(function () {
	$("#autocomplete").keypress(function(){
		$('#autocomplete').addClass('loading');
	})
	$("#autocomplete").autocomplete({
		delay: 500,
		minLength: 0,
		source: function (request, response) {
			if ($("#autocomplete").val().length > 0) {
			/*	if(current_lat=='' || current_lng=='')
				{
					var map_center = map.getCenter();
					current_lat = map_center.lat;
					current_lng = map_center.lng;
				}*/
				$.ajax({
					type: "GET",
					dataType: 'text',
					url: "getResponse.php",
					async: false,
					data: {
						query: JSON.stringify($(autocomplete).val().replace(/\s/g, "+")),
						STATE: JSON.stringify($('#state_').find(":selected").text().replace(/\s/g, "+")),
						//STATE: JSON.stringify(<php echo $_REQUEST["State"]?>),

						//current_lng :JSON.stringify(current_lng),
						//current_lat :JSON.stringify(current_lat)
					},
					success: function (result) {
						hideLoader();
						//remove_markers();
						var resdata = JSON.parse(result);
						console.log(resdata);
						if (resdata.status == 'success') {
							var jsondata = JSON.parse(resdata.data);

							result_string = '<div class="details-header">Auto Suggested Pois</div><div style="font-size: 13px"><ul class = "details-list">';
							/*success*/
							if (typeof jsondata.suggestedLocations!="undefined") {
								var m = (jsondata.suggestedLocations);
								var c = 0;
								var array = $.map(jsondata.suggestedLocations, function (item) {
									var param = '';
									var address = item["placeAddress"];
									if (c >= 0) {
										param = (c + "|" + item["longitude"] + "|" + item["latitude"] + "|" + item["type"] + "|" + item["placeAddress"] + "|" + item["eLoc"]);
									}
									c = c + 1;
									result_string += '<li>' + address + '</li>';
									return{
										label: item["placeAddress"],
										placeName: item["placeName"],
										url: param
									}
								});
								response(array);
								showDiv("suggestdetail");
								clearDiv("suggestdetail");
								clearDiv("result");
							}
							/*handle the error codes and put the responses in divs*/
							else {
								hideLoader();
								var error_response = "No result found."
								hideDiv("suggestdetail");
								document.getElementById('ui-id-1').style.display = "none";
								document.getElementById('result').innerHTML = error_response;/***put response result in div**/
								return{
									label: '0'
								}
							}
						} else {
							var error_message = resdata.data;
							/***put response result in div****/
							document.getElementById('result').innerHTML = error_message;
							hideDiv("suggestdetail");
							$('#ui-id-1').hide();
						}
					}
				});
			} else {
				/**clear autosuggest**/
				$('#autocomplete').autocomplete('close').val('');

				/**hide loader**/
				hideLoader();
				$("#autocomplete").val("");
				clearDiv("suggestdetail");
				hideDiv("suggestdetail");

				document.getElementById('result').innerHTML = "Please type any location in the search box.";
				//remove_markers();
			}
		},
		/*
		focus: function (event, ui) {
			//prevent autocomplete from updating the textbox
			event.preventDefault();
		},*/
		select: function (event, ui) {
			isselected = 1;
			//event.preventDefault();
			details = [];
			var val = ui.item.url;
			var res = val.split("|");
			if (res.length >= 0) {
				var content = new Array();
				if (res[3] != '')
					content.push('<tr><th>Type</th><td width="10px">:</td><td>' + res[3] + '</td></tr>');
				if (res[4] != '')
					content.push('<tr><th>Formatted Address</th><td width="10px">:</td><td>' + res[4] + '</td></tr>');
				if (res[5] != '')
					content.push('<tr><th>Place Id</th><td width="10px">:</td><td>' + res[5] + '</td></tr>');
				details.push(content.join(""));

				/***put autosuggest result in div***/
				document.getElementById('result').innerHTML = '<table class="tab-details">' + details[0] + '</table>';

				/***display markers***/
				//show_markers(1, new L.LatLng(res[2], res[1]), 0);

			} else {
				hideLoader();
				//remove_markers();
			}
		}
	}).data("ui-autocomplete")._renderItem = function (ul, item) {
		var $a = $("<a></a>").append("<span style='font-weight: 650 !important;'>"+item.placeName+"</span><br>"+item.label);
		return $("<li style='border-bottom:1px solid #f1efef !important;'></li>").append($a).appendTo(ul);
	};
});

function result() {
	if (isselected == 0) {
		var menu = $("#autocomplete").autocomplete("widget");
		$(menu[0].children[0]).click();
		console.log($(menu[0].children[0]).text());
		document.getElementById('autocomplete').value = $(menu[0].children[0]).text();
		document.getElementById('suggestdetail').innerHTML = result_string + '</ul></div>';
	}
}

function hideLoader() {
	/**hide loader**/
	$("#autocomplete").removeClass("loading");
}
function showLoader() {
	$("#autocomplete").addClass("ui-autocomplete-loading");
}
function clearDiv(id) {
	document.getElementById(id).innerHTML = "";
}
function showDiv(id) {
	document.getElementById(id).style.display = "block";
}
function hideDiv(id) {
	document.getElementById(id).style.display = "none";
}
$(function () {
	$(document).on('click', 'input[type=text]', function () {
		this.select();
	});
});
</script>																	

<!-- Footer Section -->
<?php

include("../footer.php");
?>

<link rel="stylesheet" href="../css/jquery-ui.min.css" />

<script type="text/javascript" src="../js/jquery.min_map.js"></script>
<script type="text/javascript" src="../js/jquery-ui.min_map.js"></script>
<!-- Footer Section /- -->