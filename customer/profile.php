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
    $userid=$_SESSION["userid"];
    $sql="SELECT * FROM `user` WHERE `admin`=0 AND `ID`=$userid";
    $result=$con->query($sql);
    if($result->num_rows>0){
    	foreach($result as $row){
    		$email=$row["email"];
    		$name=$row["name"];
    		$address=$row["address"];
    		$phone=$row["phone"];
    		$image=$row["image"];
    		//echo($email);
    	}
    }
	
	$sql2="SELECT SUM(amount) as amount FROM `deposit` WHERE userID='$userid' AND role=1";
	$result1=$con->query($sql2);
    if($result1->num_rows>0){
    	foreach($result1 as $row1){
    		 $amount=$row1["amount"];
    	}
    }else{
		$amount='0';
		
	}
if($amount==""){
	$amount="0.00";
}

?>


<div class="container" style="margin-top: 100px; margin-bottom: 100px; background-color: #F0E6E6; width: 100%; padding: 20px;">
   <?php if(isset($_SESSION["ok"])){
	echo($_SESSION["ok"]);
	unset($_SESSION["ok"]);
} ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="container">
            <div class="row my-2">
                <form action="profileChecker.php?id=<?=$userid?>&&img=1" method="post" enctype="multipart/form-data" >
                    <div class="col-lg-4 order-lg-1 text-center" style="border: 1px solid #ececec; padding: 10px;">
                       <?php
						if(isset($image) && $image !=""){
							 
						?>
                        <img src="../img/userimg/<?=$image?>" class="mx-auto img-fluid img-circle d-block" style="max-height: 150px;" alt="user">
                        <?php
						}else {
						
						?>
                       <img src="//placehold.it/150" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                     <?php }
                        ?>
                        <h6 class="mt-2">Upload a different photo</h6>
                        <label class="custom-file">
                            <input type="file" id="file" class="custom-file-input" name="fileToUpload">
                            <span class="custom-file-control">Choose file</span>
                        </label>
                        <div>
                        	<input type="submit" value="Upload" class="btn btn-primary">
                        </div>
                    </div>
				</form>
                  <form action="profileChecker.php?id=<?=$userid?>&&img=0" method="post" >
                    <div class="col-lg-8 order-lg-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                            </li>
                               <li class="nav-item btn-secondary" style="float: right; right: 16%;    margin-top: -13px; background-color: blanchedalmond;">
                                <a data-target="#profile" data-toggle="tab" class="nav-link active"><h4>Deposit Balance:  <label style="font-family: Cambria,Times New Roman; font-stretch: expanded;"><?=$amount?></label>  INR</h4></a>
                            </li>
                            
                        </ul>
                        <div class="tab-content py-4">
                            <div class="tab-pane active" id="profile">
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Name</label>
                                    <div class="col-lg-9">
                                        <input name="name" class="form-control" type="text" value="<?=$name?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Email</label>
                                    <div class="col-lg-9">
                                        <input name="email" class="form-control" type="email" value="<?=$email?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                    <div class="col-lg-9">
                                        <input name="address" class="form-control" type="text" value="<?=$address?>"  >
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">phone</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="number" value="<?=$phone?>" name="phone">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="submit" class="btn btn-primary" value="Save Changes" name="Submit">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>
                

                <form action="profileChecker.php?id=<?=$userid?>&&img=2" method="post" >
                    <div class="col-lg-8 order-lg-2">
                        <ul class="nav nav-tabs">
                            <li class="nav-item active">
                                <a href="" data-target="#password" data-toggle="tab" class="nav-link active">Change Password</a>
                            </li>

                            
                        </ul>
                        <div class="tab-content py-4">
                            <div class="tab-pane active" id="password">
                                
                              
                            <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> Change Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="" name="pass">
                                    </div>
                                </div> 
                                  <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"> Repeat Password</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="password" value="" name="repeatpass">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <input type="reset" class="btn btn-secondary" value="Cancel">
                                        <input type="submit" class="btn btn-primary" value="Save Changes" name="Submit">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>


 <!-- Footer Section -->
 <?php

 include( "../footer.php" );
 ?>
 <!-- Footer Section /- -->