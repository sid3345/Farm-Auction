 <?php
	include("header.php");
?>
      
     <!-- Start Breadcrumb -->
            <div class="page-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="title"><span>Login/Register</span></h1>
                            <div class="breadcrumb">
                                <a href="index.php">Home</a>
                                <span class="delimeter">/</span> 
                                <a href="login.php">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->
            
            
            <section class="main-contain bg-white" style="margin-bottom: 200px;">
                <div class="container">
    <div class="login-area">
                    <div class="login-header">
                                <div class="login-details">
                                    <ul class="nav nav-tabs navbar-right">
                                        <li><a data-toggle="tab" href="#register">Buyer Register</a></li>
                                        <li><a data-toggle="tab" href="#farmer">Farmer register</a></li>
                                        <li class="active"><a data-toggle="tab" href="#login">Login</a></li>
                                    </ul>
                                </div>
                        </div>

                        <div class="tab-content">
                        <div id="farmer" class="tab-pane">
                           <div class="login-inner">
                                <div class="title">
                                    <h1>Welcome to <span>Farmer's Register</span></h1>
                                </div>
                                <div>
                                	<?php if(isset($_SESSION["msg"])){ ?>
								<div class="alert alert-success" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong><?=$_SESSION["msg"]?></strong>
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
                                </div>
                                <div class="login-form">
                                    <form method="post"  action="loginCheck.php">
                                        <div class="form-details">
                                            <label class="user">
                                                <input type="text" name="Fname" placeholder="Full Name" id="Fusername" required>
                                            </label> 
                                            <label class="user">
                                                <input type="text" name="Fphone" placeholder="Mobile Number" id="Fphone" required>
                                            </label>
                                            <label class="mail">
                                                <input type="email" name="Femail" placeholder="Email Address" id="Fmail" required>
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="Fpass" placeholder="Password" id="Fpassword" required>
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="FR_pass" placeholder="Confirm Password" id="Fpassword" required>
                                            </label>
                                             <label class="user">
                                                <input type="text" name="Faddress" placeholder="Address" id="Faddress" required>
                                            </label>
                                            <label class="user">
                                                <input type="text" name="state" placeholder="State" id="state" required>
                                            </label>
                                            <label class="user">
                                                <input type="text" name="pincode" placeholder="Pin code" id="pincode" required>
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn" name="Fregisubmit" onsubmit="">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                    
                        <div id="register" class="tab-pane">
                           <div class="login-inner">
                                <div class="title">
                                    <h1>Welcome to <span>Register</span></h1>
                                </div>
                                <div>
                                	<?php if(isset($_SESSION["msg"])){ ?>
								<div class="alert alert-success" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong><?=$_SESSION["msg"]?></strong>
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
                                </div>
                                <div class="login-form">
                                    <form method="post"  action="loginCheck.php">
                                        <div class="form-details">
                                            <label class="user">
                                                <input type="text" name="name" placeholder="Full Name" id="username" required>
                                            </label> 
                                            <label class="user">
                                                <input type="text" name="phone" placeholder="Mobile Number" id="phone" required>
                                            </label>
                                            <label class="mail">
                                                <input type="email" name="email" placeholder="Email Address" id="mail" required>
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="pass" placeholder="Password" id="password" required>
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="R_pass" placeholder="Confirm Password" id="password" required>
                                            </label>
                                             <label class="user">
                                                <input type="text" name="address" placeholder="Address" id="address" required>
                                            </label>
                                        </div>
                                        <button type="submit" class="form-btn" name="regisubmit" onsubmit="">Register</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        


                        <div id="login" class="tab-pane fade in active">
                            <div class="login-inner">
                                  <div class="title">
                                    <h1>Welcome to <span>Login</span></h1>
                                </div>
                                <div class="login-inner">
            <label style="color: red"> <?php if(isset($_SESSION["message"])){echo($_SESSION["message"]); unset($_SESSION["message"]);} ?> </label><br>                    
			<label style="color: red"> <?php if(isset($_SESSION["wrong"])){echo($_SESSION["wrong"]); unset($_SESSION["wrong"]);} ?> </label><br>
			<label style="color: red;"><?php if(isset($_SESSION["loginChk"]) && ($_SESSION["loginChk"]>=3)){
			echo("You have try ".$_SESSION["loginChk"]." times already and cannot try more than 5 time. So only ".(5-$_SESSION["loginChk"])." times you can try to login.<br>");}
				if(isset($_SESSION["loginChk"]) && ($_SESSION["loginChk"]>=5)){echo("Please restart your browser");}
 			?></label><br>
		</div>
                                <div class="login-form">
                                    <form action="loginCheck.php" method="post">
                                        <div class="form-details">
                                            <label class="user">
                                                <input type="text" name="username" placeholder="Email" id="username" required>
                                            </label>
                                            <label class="pass">
                                                <input type="password" name="passsword" placeholder="Password" id="password" required>
                                            </label>
                                        </div>
                                        <input type="submit" class="form-btn btn-success" name="loginSubmit"   value="Login" <?php if(isset($_SESSION["loginChk"]) && ($_SESSION["loginChk"]>=5)){ ?>disabled <?php } ?>  />
                                    </form>
                                    <a style="display: block;float: right;margin: 0px;padding-right: 21%;margin-top: 10px; " href="<?=$_SESSION["directory"]?>forgotpassword.php">forgot password? </a>
                                </div>
                            </div>
                        </div>
            </section>
            
 

<?php
	include("footer.php");
?>          