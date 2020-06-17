<?php
	include("fheader.php");
//include("dbCon.php");
	//	$con=connection();
?>
 

        <!-- Site Wraper -->
        <div class="wrapper">


        
            <!-- START SLIDER -->
            <section class="clearfix">
                <div  id="mega-slider" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#mega-slider" data-slide-to="0" class="active"></li>
                        <li data-target="#mega-slider" data-slide-to="1"></li>
                        <li data-target="#mega-slider" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active beactive">
                            <img src="img/brand/brand1.jpg" alt="..." style="width: 100%; height: 10%;">
                            <div class="carousel-caption">
                                <h2>Welcome to Crop Auction</h2>
                               
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/brand/live-024049.jpg" alt="..." style="width: 100%; height: 10%;">
                            <div class="carousel-caption">
                                <h2>All kinds of Crops</h2>
                                 
                            </div>
                        </div>
                        <div class="item">
                            <img src="img/brand/brand3.jpg" alt="..." style="width: 100%; height: 10%;">
                            <div class="carousel-caption">
                                <h2>BID The crop</h2>
                                
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#mega-slider" role="button" data-slide="prev">
                    </a>
                    <a class="right carousel-control" href="#mega-slider" role="button" data-slide="next">
                    </a>
                </div>
            </section>
            <!-- END SLIDER -->





            <!-- START NEW  -->
            <section class="home-main-contant-style2 dip-bg-style dip-style bg-white">
                <div class="container">  
                    <div class="widget">
                        <h6 class="text-uppercase bottom-line">New crops</h6>
                    </div>
                    <div class="row">
                        <div class="new-product slider">
                           <?php
							 
							 
								$sql="SELECT vehicle.*, catagory.name as catname FROM `vehicle` INNER JOIN catagory ON catagory.ID=vehicle.catagory WHERE vehicle.`status` =1 ORDER BY `vehicle`.`ID` DESC";
							 
							
							$result = $con->query( $sql );
								if ( $result->num_rows > 0 ) {
									foreach ( $result as $row ) {
										$ID=$row["ID"];
										$name=$row["name"];
										$type=$row["type"];
                                        $catagory=$row["catname"];
                                        $startDate=$row["startDate"];
										$EndDate=$row["EndDate"];
										$image=$row["image"];
										$price=$row["price"];
							?>
                            <div class="col-md-4 item">
                                <div class="products grid-product">
                                    <div class="product-grid-inner">
                                        <div class="product-grid-img">
                                            <ul class="product-labels">
                                                <li><?php  date_default_timezone_set("Asia/Kolkata");
										
										$nowDate=date("Y-m-d");
										 
										if(($nowDate > $EndDate) || ($startDate > $EndDate)) {
											echo("Bidding Expired");
										}else{
											echo("Bidding Allowed");
										}
												?></li>
                                            </ul>
                                          <a href="#" class="product-grid-img-thumbnail">
											<img style="width: 335px; height: 190px; " src="<?=$_SESSION["directory"]?>img/vehicle/<?=$image?>" alt="img" class="img-responsive primary-img" />
											<img src="<?=$_SESSION["directory"]?>img/vehicle/<?=$image?>" alt="img" class="img-responsive socendary-img" />
										</a>
                                            
											<div class="product-grid-atb text-center"><a class="" href="<?=$_SESSION["directory"]?>farmer/cropdetail.php?id=<?=$ID?>">View Details</a>
											</div>
                                        </div>
										<div class="product-grid-caption text-center">
											<h6><a class="p-grid-title" href="<?=$_SESSION["directory"]?>farmer/cropdetail.php?id=<?=$ID?>"><?=$name?></a></h6>
											<h4>Base Price:<strong><?=$price?></strong> INR</h4>
											
												<?php
											$sql2="SELECT MAX(price) FROM `bidder` WHERE vehicleID='$ID'";
										$result2 = $con->query( $sql2 );
											if ( $result2->num_rows > 0 ) {
									
									
									foreach ( $result2 as $row ) {
									$bidPrice=$row["MAX(price)"];
									}}
											?>
											<h5>Bid Price:<strong><?=$bidPrice?></strong> INR</h5>
											<div class="pro-size"><label>Type: <span><?=$type?></span> </label>
											<div><label>Catagory: <span><?=$catagory?></span> </label></div>
											</div>
											
											<a class="btn btn-product cd-cart-btn" href="<?=$_SESSION["directory"]?>farmer/cropdetail.php?id=<?=$ID?>"> BID</a>
										</div>
                                   
                                    </div>
                                </div>
                            </div>
                            	
                            	
                            	<?php
							 		}
								}
							 

							?>

                        </div>
                    </div>
                </div>
            </section>
            <!-- END NEW  -->



          




            <!-- START Featured  -->
            <section class="home-main-contant-style3 col-grid-style bg-white">
                <div class="container">
                    <div class="widget">
                        <h6 class="text-uppercase bottom-line">Top bidding products</h6>
                    </div>
                    <div class="row clearfix">
                      <div class="new-product slider">
                           <?php
							 
						  
						  $sql3="SELECT MAX(price), vehicleID FROM `bidder` GROUP by vehicleID ORDER BY MAX(price) DESC";
						  $result3 = $con->query( $sql3 );
								if ( $result3->num_rows > 0 ) {
									
									
									foreach ( $result3 as $row ) {
										$maxprice=$row["MAX(price)"];
										$VeID=$row["vehicleID"];
										
										$sql="SELECT vehicle.*, catagory.name as catname FROM `vehicle` INNER JOIN catagory ON catagory.ID=vehicle.catagory WHERE vehicle.`status` =1 AND vehicle.ID= '$VeID' ORDER BY `vehicle`.`ID` DESC";
							 
							
										$result = $con->query( $sql );
											if ( $result->num_rows > 0 ) {
									
									
									foreach ( $result as $row ) {
										$ID=$row["ID"];
										$name=$row["name"];
										$type=$row["type"];
                                        $catagory=$row["catname"];
                                        $startDate=$row["startDate"];
										$EndDate=$row["EndDate"];
										$image=$row["image"];
										$price=$row["price"];
								
						
							?>
                            <div class="col-md-4 item">
                                <div class="products grid-product">
                                    <div class="product-grid-inner">
                                        <div class="product-grid-img">
                                            <ul class="product-labels">
                                                <li><?php  date_default_timezone_set("Asia/Kolkata");
										
										$nowDate=date("Y-m-d");
										 
										if(($nowDate > $EndDate) || ($startDate > $EndDate)) {
											echo("Bidding Expired");
										}else{
											echo("Bidding Allowed");
										}
												?></li>
                                            </ul>
                                          <a href="#" class="product-grid-img-thumbnail">
											<img style="width: 335px; height: 190px; " src="<?=$_SESSION["directory"]?>img/vehicle/<?=$image?>" alt="img" class="img-responsive primary-img" />
											<img src="<?=$_SESSION["directory"]?>img/vehicle/<?=$image?>" alt="img" class="img-responsive socendary-img" />
										</a>
                                            
											<div class="product-grid-atb text-center"><a class="" href="<?=$_SESSION["directory"]?>farmer/cropdetail.php?id=<?=$ID?>">View Details</a>
											</div>
                                        </div>
										<div class="product-grid-caption text-center">
											<h6><a class="p-grid-title" href="<?=$_SESSION["directory"]?>farmer/cropdetail.php?id=<?=$ID?>"><?=$name?></a></h6>
											<h4>Base Price:<strong><?=$price?></strong> INR</h4>
											 											
											<h5>Bid Price:<strong><?=$maxprice?></strong> INR</h5>
											<div class="pro-size"><label>Type: <span><?=$type?></span> </label>
											<div><label>Catagory: <span><?=$catagory?></span> </label></div>
											</div>
											
											<a class="btn btn-product cd-cart-btn" href="<?=$_SESSION["directory"]?>farmer/cropdetail.php?id=<?=$ID?>"> BID</a>
										</div>
                                   
                                    </div>
                                </div>
                            </div>
                            	
                            	
                            	<?php
							 		}
								}
							 
								}
								}
							 
							?>

                        </div>
                      
                      
                      
                    </div>
                </div>
            </section>
           
            <section class="home-main-contant-style3 bg-white">
                <div  class="parallax-block parallaxBg">
                    <div class="container">
                        <div class="parallax-block-text">
                            <p>We are happy! <br> <span class="color-green">Thanks for checking out our website.</span></p>
                        </div>
                        
                    </div>
                </div>
            </section>
         

<?php
	include("footer.php");
?>