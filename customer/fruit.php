 <?php
 include( "../header.php" );
//include("../dbCon.php");
	//	$con=connection();
 ?>


 <!-- START MAIN CONTAIN -->
<div class="main-contain">
	<div class="container">
		<div class="row">
			<aside>
				<div class="col-md-3 col-sm-12 col-xs-12 sidebar pull-right">
					<!-- CATEGORIES WIDGET -->
					<div class="widget mb30">
						<h6 class="text-uppercase bottom-line">Categories</h6>
						 
						<ul class="icons-list">
						<?php  
							$sql1="SELECT * FROM `catagory` WHERE type ='Fruit'";
							
							$result = $con->query( $sql1 );
								if ( $result->num_rows > 0 ) {
									foreach ( $result as $row ) {
							
							
							?>
							<li><a href="fruit.php?searchByCatName=<?=$row["name"]?>"><?=$row["name"]?> </a>
							</li>
							 
							<?php }} ?>
						</ul>
					</div>
					<!-- END CATEGORIES WIDGET -->
					 






				</div>
			</aside>

			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="row  hidden-xs">
					<div class="toolbar">
						<div class="col-sm-4 category-num">
							<h2>Fruit</h2>
							 
						</div>
					</div>
					<!--
					<div class="col-sm-8">
						<ul class="view-mode">
									
							<li class="sort-list-btn">
								<h6>Sort By :</h6>
								<div class="btn-group">
									<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                    Popularity <span class="caret"></span>
                                                </button>
								
									<ul class="dropdown-menu" role="menu">
										<li><a href="#">All</a>
										</li>
										<li><a href="#">Best Sales</a>
										</li>
										<li><a href="#">Top Last Week Sales</a>
										</li>
										<li><a href="#">New Arrived</a>
										</li>
									</ul>
								</div>
							</li>

						</ul>
					</div>
				</div>
				-->

				<div class="category-products col-grid-style">
					<div class="row clearfix">
						<div class="row clearfix">

							<?php
							if(isset($_GET["searchByCatName"])){
								$catName=$_GET["searchByCatName"];
								$sql="SELECT vehicle.*, catagory.name as catname FROM `vehicle` INNER JOIN catagory ON catagory.ID=vehicle.catagory WHERE catagory.name='$catName' AND vehicle.type='Fruit' AND vehicle.`status` =1 ORDER BY id DESC";
							 
							}else{
								$sql="SELECT vehicle.*, catagory.name as catname FROM `vehicle` INNER JOIN catagory ON catagory.ID=vehicle.catagory WHERE  vehicle.type='Fruit' AND vehicle.`status` =1 ORDER BY id DESC";
							}
							
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
										<div class="col-md-4 col-sm-6 col-xs-12">
								<div class="products grid-product mb30">
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
											<img style="width: auto; height: 190px; " src="<?=$_SESSION["directory"]?>img/vehicle/<?=$image?>" alt="img" class="img-responsive primary-img" />
											<img src="<?=$_SESSION["directory"]?>img/vehicle/<?=$image?>" alt="img" class="img-responsive socendary-img" />
										</a>
										
											<div class="product-grid-atb text-center"><a class="" href="<?=$_SESSION["directory"]?>customer/cropdetail.php?id=<?=$ID?>">View Details</a>
											</div>
										</div>

										<div class="product-grid-caption text-center">
											<h6><a class="p-grid-title" href="<?=$_SESSION["directory"]?>customer/cropdetail.php?id=<?=$ID?>"><?=$name?></a></h6>
											<h4>Base Price:<strong><?=$price?></strong> INR</h4>
													<?php
											$sql2="SELECT MAX(price) FROM `bidder` WHERE vehicleID='$ID'";
										$result2 = $con->query( $sql2 );
											if ( $result2->num_rows > 0 ) {
									
									
									foreach ( $result2 as $row ) {
									$bidPrice=$row["MAX(price)"];
									}} ?>
											<h5>Bid Price:<strong><?php if(!empty($bidPrice)){echo($bidPrice);}else{echo("No bidding yet");} ?></strong><?php if(!empty($bidPrice)){echo("INR");} ?></h5>
											<div class="pro-size"><label>Type: <span><?=$type?></span> </label>
											<div><label>Catagory: <span><?=$catagory?></span> </label></div>
											</div>
											
											<a class="btn btn-product cd-cart-btn" href="<?=$_SESSION["directory"]?>customer/cropdetail.php?id=<?=$ID?>"> BID</a>
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

			</div>
		</div>
		<!-- Start Pagination
		<div class="cd-pagination">
			<ul class="pagination">
				<li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				</li>
				<li class="active"><a href="#">1</a>
				</li>

				<li><a href="#">2</a>
				</li>
				<li><a href="#">3</a>
				</li>

				<li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
				</li>
			</ul>
		</div>
		 End Pagination-->
	</div>
</div>
 <!-- END MAIN CONTAIN -->









 <?php
 include( "../footer.php" );
 ?>