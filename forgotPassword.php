<?php
include("header.php");
include("email.php");

if(isset($_POST["submit"])){
	$to = $_POST["email"];
$subject = "Password recovery";
$message = "";

$sql="SELECT * FROM `user` WHERE email='$to'";
	
$result=$con->query($sql);

$sqlF="SELECT * FROM `farmer` WHERE email='$to'";
	
$resultF=$con->query($sqlF);


		if($result->num_rows > 0 || $resultF->num_rows > 0){
			
			if($result->num_rows > 0) {
				foreach($result as $row){
					$email=$row["email"];
				}
			}

			if($resultF->num_rows > 0) {
				foreach($resultF as $row){
					$email=$row["email"];
				}
			}

	$_SESSION["code"] = substr(md5(uniqid(rand(),1)),3,10);
			//echo($_SESSION["password"]);exit();
	$message="your security code is <strong> ".$_SESSION["code"]."</strong><br>"."Please don't share your password with others."."http://localhost/auction/new_password.php?id=".$email;
	$confirmMsg="Security code is send to your email.kindly check the mail";
	
sendmail($to,$subject,$message);
}else{
			$confirmMsg="Email is not valid, please enter the  registered valid mail.<br>";
		}
	
}
?>


<link href="css/forgotpassword.css" rel="stylesheet" />
 

<body>
	<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
		<div>
			<?php if(isset($confirmMsg)){ ?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>
					<?=$confirmMsg?>
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
		<div class="">
			<div class="panel">
				<form method="post" action="" enctype="multipart/form-data">
				<div class="panel-heading" id="heading"><label>Enter the valid registered email</label></div>
				<div class="form-group col-md-4"><input class="form-control" type="email"	name="email" placeholder="example@gmail.com" required><br></div>


				<div class="panel-body" style="display: contents"><input class="btn btn-success" type="submit" name="submit" value="Send Email"></div>
		</form>
		<br><br>
			</div>
		</div>
	</div>

</body>
 

<?php include("footer.php"); ?>