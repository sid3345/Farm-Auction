<?php include("../fheader.php");
 ?>
<?php
if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"])&& $_SESSION["role"]==1)){
	?>
<script>
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


<?php
//include("../dbCon.php");
	//	$con=connection();
if(isset($_POST["submit"])){
		
	
	$okFlag=TRUE;
	
		if(!isset($_REQUEST["name"]) || $_REQUEST["name"]==''){
			$message="please type your name.";
			$okFlag=FALSE;
		}

		if(!isset($_REQUEST["email"]) || $_REQUEST["email"]==''){
			$message="please type your email.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST["startDate"]) || ($_REQUEST["startDate"])==''){
			$message="please type startDate.";
			$okFlag=FALSE;
		}
		if(!isset($_REQUEST['EndDate']) || ($_REQUEST['EndDate'] == '')){
				$message .= 'Please type End Date.<br>';
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
		$email=$_REQUEST["email"];
		$startDate=$_REQUEST["startDate"];
		$EndDate=$_REQUEST["EndDate"];
		$catagory=$_REQUEST["catagory"];
		$type=$_REQUEST["type"];
		$price=$_REQUEST["price"];
		$image=$newName;


		$sql="INSERT INTO `vehicle`(  `name`, `type`,`email`, `catagory`, `startDate`, `EndDate`, `image`,`price`, `status`) VALUES ( '$name','$type','$email','$catagory','$startDate','$EndDate','$image','$price','1')";
		
		if($con->query($sql)){
			
    $userid=$_SESSION["userid"];
    $sql="SELECT * FROM `vehicle` ORDER BY ID DESC LIMIT 1";
    $result=$con->query($sql);
    if($result->num_rows>0){
    	foreach($result as $row){
			$ID=$row["ID"];
		}
	}
	?>
	  <script>
	  if (window.confirm("Press OK to Continue.")) {
		window.location.href = "Addcropdetail.php?id=<?=$row["ID"]?>";
	  }

	  </script>;
	  <?php
			$_SESSION["msg"]="Successfully added product. Check CROP List to add further details.";
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
							  <strong>Success!</strong> <?=$_SESSION["msg"]?><br>

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
										<input type="text" class="form-control" name="name"  required/>
									</div>

									<div class="col-md-6 form-group">
										<label>Image</label>
										<input type="file" class="form-control " name="fileToUpload" required />
									</div>

									<div class="col-md-6 form-group">
										<label> Email</label>
										<input type="text" class="form-control" name="email"  value="<?=$email?>" readonly />
									</div>

										<div class="col-md-6 form-group">
										<label>Start Date</label>
										
										<input type="text" class="form-control" name="startDate" value="<?php echo date("Y-m-d")?>" readonly>

										<!--<input type="date" class="form-control" name="startDate" id="txtDate" required/> -->
										</div>

										<script>
										$(function(){
										var dtToday = new Date();
										
										var month = dtToday.getMonth() + 1;
										var day = dtToday.getDate();
										var year = dtToday.getFullYear();
										if(month < 10)
											month = '0' + month.toString();
										if(day < 10)
											day = '0' + day.toString();
										
										var maxDate = year + '-' + month + '-' + day;
										//alert(maxDate);
										$('#txtDate').attr('min', maxDate);
										$('#txtDate1').attr('min', maxDate);
									});
									</script>
									

									<div class="col-md-6 form-group">
										<label>End Date</label>
										<input type="date" class="form-control" name="EndDate" id="txtDate1" required/>
									</div>
									<div class="col-md-6 form-group">
										<label>Base Price</label>
										<input type="number" class="form-control" name="price" required/>
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
									
									<!--
								<div class="col-md-6 form-group">
										<label>Category</label>
										<select class="form-control" name="catagory" required  id="Catagory"> 
										<option value="">--- Select Category ---</option>
										
										<?php
										/*

											require('../dbCon.php');
											if (session_status() == PHP_SESSION_NONE) {
												session_start();
												}
											$con=connection();

											$sql1 = "SELECT * FROM catagory"; 
											$result1 = $con->query($sql1);
											while($row = $result1->fetch_assoc()){
												echo "<option value='".$row['ID']."'>".$row['name']."</option>";
											}
										*/
											?>										
										</select>
										
										-->

										<!--
										<script>
										$( "select[name='catagory']" ).change(function () {
											var stateID = $(this).val();


											if(stateID) {


												$.ajax({
													url: "ajaxpro.php",
													dataType: 'Json',
													data: {'id':stateID},
													success: function(data) {
														$('select[name="city"]').empty();
														$.each(data, function(key, value) {
															$('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
														});
													}
												});


											}else{
												$('select[name="city"]').empty();
											}
										});
										</script>

									-->
									</div>
							
								</div>
								<div>
									<input style="   min-width: 100px; margin-left: 45%;" class="btn btn-success" type="submit" value="Add" name="submit"/> </br>
									<!--<button  style=" min-width: 100px; margin-left: 45%;" class="btn btn-success" onclick="location.href='Addcropdetail.php';">Next</button>
									 -->
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