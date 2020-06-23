<!DOCTYPE html>
 <html lang="en">  
    
 <?php
	 include("dbCon.php");
		$con=connection();
	 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	 $_SESSION["directory"]="http://localhost/auction/";
	 if(!isset($_SESSION["isLogedIn"])){
	 $_SESSION["isLogedIn"]=false;
		 
	 }
?>
<head>
        <title>Crop Auction</title>
        <!-- META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

        <!-- FAVICON -->
        <link rel="shortcut icon" href="favicon.ico">

        <!-- BOOTSTRAP -->
       <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/bootstrap.min.css" media="all" />  
        <!-- FONT AWESOME -->
          <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/font-awesome.css" media="all" />
        <!--  STYLE -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/style.css">
     
        <!-- ANIMATE -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/animate.css">
        <!-- MAGNIFIC POPUP -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/magnific-popup.css">
        <!-- FLEXSLIDER -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>plugins/FlexSlider/jquery.flexslider.css">
        <!--  OWL CAROUSEL -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>plugins/owl-carousel/owl.carousel.css">
        <!-- OWL CAROUSEL THEME -->
        <link rel="stylesheet" href="<?=$_SESSION["directory"]?>plugins/owl-carousel/owl.theme.css">
        <!-- slick -->
        <link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>css/slick.css">
        <!-- slick-theme -->
        <link rel="stylesheet" type="text/css" href="<?=$_SESSION["directory"]?>css/slick-theme.css">
 
 	
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/flaticon.css" media="all" />
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/owl.carousel.css" media="all" />
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/owl.theme.css" media="all" />
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/woocommerce.css">
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/jquery-ui.css">
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/slider-pro.min.css">
    <link rel="stylesheet" href="<?=$_SESSION["directory"]?>css/starw.css" media="all" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- WEB FONTS -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        <link href="http://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet" property="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>


<body>
           <!-- Header -->
            <div class="header header-static">
                <!-- Topbar -->
                <div class="topbar">

                    <div class="container">
                        <div class="row">
                            
                            <div class="col-sm-12">
                               <div class="col-xs-3 custom-col-left form-group">
                            <div class="spa-search">
                                <form action="<?=$_SESSION["directory"]?>farmer/cropsearch.php" method="post">
                                    <input type="text" placeholder="search your keyword ..." value="" class="form-control input-group-lg" style="width: 150%" name="Search">
                                    <!--<button type="submit" class="spa-submit btn btn-default" name="serachButton"><i class="fa fa-search" aria-hidden="true"></i>
                                    </button>-->
                                </form>
                                
                            </div>
                        </div>

                                <ul class="list-inline topbar-right pull-right">
                                    <li>
                                    
                                      <?php   if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true) &&(isset($_SESSION["role"]) && $_SESSION["role"]=="0")){ ?>  
                                       <a href="<?=$_SESSION["directory"]?>farmer/fprofile.php">Account</a>
                                     <?php  } ?>
                                    </li>
                                    
                                    <li>
                                    <?php
										if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true)){ ?>
											<a href="<?=$_SESSION["directory"]?>logout.php" onclick="return confirm_alert(this);">Logout (<?php if(isset($_SESSION["username"])){echo($_SESSION["username"]);} ?>)</a>
									<?php	}else{ ?>
									 
                                    <a href="<?=$_SESSION["directory"]?>login.php">Login</a> | <a href="<?=$_SESSION["directory"]?>login.php">Register</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div><!--container-->
                </div>
                <!-- End Topbar -->

                <!-- Navbar -->
                <div class="navbar navbar-default mega-menu" role="navigation" style="background-color: white;">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".cd-navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?=$_SESSION["directory"]?>home.php">
                                <img id="logo-header" src="<?=$_SESSION["directory"]?>img/logo.png" alt="Logo" style="width: 150px; height: inherit;">
                            </a>
                        </div>

                        <!-- Shopping Cart -->
                        <div class="shop-badge badge-icons pull-right">
                            <a href="#"><i class="fa fa"> <img style="width: 30px" src="<?=$_SESSION["directory"]?>img/icon/notification.png" ></i></a>
                               <?php
								if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true) &&(isset($_SESSION["role"]) && $_SESSION["role"]=="0")){ ?>
                            <span class="badge badge-sea rounded-x"></span>
                            <div class="badge-open">
                            
								 
                                <ul class="list-unstyled mCustomScrollbar" data-mcs-theme="minimal-dark" id="watchlist">
                              
								<!-- ajax use here -->
                                </ul> </div>
                                <?php } ?>
                           <?php
								if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true) &&(isset($_SESSION["role"]) && $_SESSION["role"]=="1")){ 
								
								?>
								<span class="badge badge-sea rounded-x" id="count"></span>
                            <div class="badge-open">
								 <a onClick="clearall()">clear all</a>
                                <ul class="list-unstyled mCustomScrollbar" data-mcs-theme="minimal-dark" id="notification">
                              
								<!-- ajax use here -->
								</ul>
                               </div>
                                <?php } ?>
                           
                        </div>
                        <!-- End Shopping Cart -->

                        <div class="collapse navbar-collapse cd-navbar-collapse">
                            <!-- Nav Menu -->
                            <ul class="nav navbar-nav">

                                <!-- Pages -->
                                <li class="btn-product">
                                     
                                  
                                </li>
                                <!-- End Pages -->
								  

                                <!-- Promotion -->
                                <li class="dropdown">
                                   <?php   if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true) &&(isset($_SESSION["role"]) && $_SESSION["role"]=="1")){ ?>  
                                       <a  href="<?=$_SESSION["directory"]?>admin/report.php">
                                        Dashboard
                                    </a>
                                     <?php  }else{ ?> 
	 								  
                                       <a href="<?=$_SESSION["directory"]?>home.php">Home</a>
                                        
                                     <?php   }  ?>
 
                                </li>
                                <!-- End Promotion -->


                                <!-- Pages -->
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
                                        crop
                                    </a>
                                    <ul class="dropdown-menu">
										<?php
										if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true) &&(isset($_SESSION["role"]) && $_SESSION["role"]=="1")){ ?>
									 
                                       <li><a href="<?=$_SESSION["directory"]?>admin/Editcar.php">Vegetable</a></li>
                                        <li><a href="<?=$_SESSION["directory"]?>admin/EditBike.php">Fruit</a></li>
                                       <?php }else{  ?>
                                        <li><a href="<?=$_SESSION["directory"]?>farmer/editveggie.php">Vegetable</a></li>
                                        <li><a href="<?=$_SESSION["directory"]?>farmer/editfruit.php">Fruit</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <!-- End Pages -->

                            

                                <?php
									if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==true) &&(isset($_SESSION["role"]) && $_SESSION["role"]!="1")){ ?>
                                 <li class="btn-product">
                                    <a href="<?=$_SESSION["directory"]?>farmer/croplist.php"  >
                                       Crop List
                                    </a>
                                     
                                </li>

                                <li class="btn-product">
                                    <a href="<?=$_SESSION["directory"]?>farmer/Addcrop.php"  >
                                       Add Crop
                                    </a>
                                     
                                </li>

                                <li class="btn-product">
                                    <a href="<?=$_SESSION["directory"]?>farmer/ftopBidder.php"  >
                                        Bidder List
                                    </a>
                                     
                                </li>

                               <?php } ?>

                                 
                                <!-- End Promotion -->
								
                          

									 
                          


                            </ul>
                            <!-- End Nav Menu -->
                        </div>
                    </div>
                </div>
                <!-- End Navbar -->
            </div>
            <!-- End Header-->
            
     <script>
	 
		 
		 setInterval(function(){
			 var vid=1;
			 	$.get('<?=$_SESSION["directory"]?>customer/Addwatchlist.php',{ID:vid},function(data){
						$("#watchlist").html(data);
					});
			 
		 },1000);
	 function removeList(ID){
		$.get('<?=$_SESSION["directory"]?>customer/Addwatchlist.php',{removeID:ID},function(data){
						alert(data);
					});
	 }
	
		 function noti(){
			setInterval(function(){
				 $.get('<?=$_SESSION["directory"]?>admin/notification.php',function(data){
						//alert(data);
					 $("#notification").html(data);
					});
			},1000);
		 }
		 noti();
		 
function removenoti(id){
	$.get('<?=$_SESSION["directory"]?>admin/notification.php',{RID:id},function(data){
		//alert(data);
	});
	
}
	function clearall(){
		var c=2;
		$.get('<?=$_SESSION["directory"]?>admin/notification.php',{clAll:c},function(data){
		//alert(data);
	});
	}
	function notiC(){
		setInterval(function(){
			var count=0;
			$.get('<?=$_SESSION["directory"]?>admin/notificationCount.php',{Count:count},function(data){
		$("#count").html(data);
	});
			
		},1000);
	}
		 notiC();
		 
		 
	</script>


<script type="text/javascript">
function confirm_alert(node) {
    return confirm("Are you sure want to Logout?");
}
</script>