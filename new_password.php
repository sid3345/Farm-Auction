<?php
include("header.php");

	?>
	
	
	<?php
		if(isset($_POST["submit"])){
			if(isset($_GET["id"])){
			$email=$_GET["id"];
			}
			
			$password=md5($_POST["pass"]);
			$Confirm_password=md5($_POST["confirm_pass"]);
			$code=$_POST["code"];
			if(isset($code)&& $_SESSION["code"]==$code){
				if($password==$Confirm_password){
					$sql="UPDATE user SET password='$password' WHERE email = '$email'";
					// If you are using UPDATE in query then its always TRUE.
					//echo($sql);exit();
						if($con->query($sql)==True){
							$message="Update password successfully 123";
							#echo($message);
							unset($_SESSION["code"]);
							$_SESSION["code"]="djbjsbdjkdhuhewbkb2j32y392ybchery3t7fevwhytr837gvhjsdvfyu3t7qchdb";
						}else{
							$message="database error";
							echo($message);
						}

					$sql="UPDATE farmer SET password='$password' WHERE email = '$email'";
					//echo($sql);exit();
						if($con->query($sql)){
							$message="Update password successfully ";
							#echo($message);
							unset($_SESSION["code"]);
							$_SESSION["code"]="djbjsbdjkdhuhewbkb2j32y392ybchery3t7fevwhytr837gvhjsdvfyu3t7qchdb";
						}else{
							$message="database error";
							//echo($message);
						}
					$message="Your password is changed, please login with your new password.";
					//echo($message);
				}else{
					$message="password dont matched";
					//echo($message);
				}
					 
			}else{
				
				$message="Sorry!! Security code don't matched";
					//echo($message);
			}
			
		};


?>
	

	
 
<link href="css/newpass.css" rel="stylesheet">
 

<body>
	<div >
		<div>
			<?php if(isset($message)){ ?>
			<div class="alert alert-success" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>
					<?=$message?>
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
	<div class="container panel panel-primary "  id="ContainerBody"  style="margin-top: 100px; margin-bottom: 100px; background-color: aliceblue;">
		<form style="margin-top: 20px;" class="row" method="post" action="" enctype="multipart/form-data">
		<div class="form-group">
			<div class="form-inline">
				<label class="panel-heading" for="lbl1" id="lbl">Enter the new password</label>
			<input class="input-group-lg form-control"   type="password"	name="pass" id="lbl1"  required placeholder="*****"><br>
			</div>
			<div class="form-inline">
			<label class="panel-heading" for="lbl2" id="lbl" style="padding-right: 5px;">Enter the same password</label>
			<input class="input-group-lg form-control" id="inputpass" type="password" id="lbl2"	name="confirm_pass"   required placeholder="*****"><br>
			</div>
			<div class="form-inline">
			<label class="panel-heading" for="lbl3" id="lbl">Enter the security code</label>
			<input class="input-group-lg form-control" id="inputpass" type="text"	name="code"  id="lbl3"  required placeholder="12345"> <br>
			</div>
			<input class=" btn btn-success btn-lg" type="submit" name="submit" value="Confirm" style="margin-left: 5%; margin-top: 1%;">
		</div>
			
		</form>
		<br><br>
	</div>
		
	</div>

</body>

<?php
include("footer.php");

	?>