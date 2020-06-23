 <?php
 include( "../header.php" );
//include("../dbCon.php");
	$con=connection();
 ?>


 <!-- START MAIN CONTAIN -->
<div class="main-contain">
	<div class="container">
		<div class="row">
			<aside>
				<div class="col-md-3 col-sm-12 col-xs-12 sidebar pull-right">
				
					 





				</div>
			</aside>

			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="row  hidden-xs">
					<div class="toolbar">
						<div class="col-sm-6 category-num">
							<h2>Search Result</h2>
							 
						</div>
					</div>
					
				</div>

				<div class="category-products col-grid-style">
					<div class="row clearfix">
						<div class="row clearfix">

							<?php
							
							if(isset($_POST["Search"])){
								$Name=$_POST["Search"];
								$sql="SELECT  vehicle.*, catagory.name as catname FROM `vehicle` INNER JOIN catagory ON catagory.ID=vehicle.catagory WHERE vehicle.name LIKE '%$Name%'";
							 
						
							
							$result = $con->query($sql);
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
											<div><label>Category: <span><?=$catagory?></span> </label></div>
											</div>
											
											<a class="btn btn-product cd-cart-btn" href="<?=$_SESSION["directory"]?>customer/cropdetail.php?id=<?=$ID?>"> BID</a>
										</div>
									</div>
								</div>
							</div>	
									
									
							
							

							 
								 
							
								<?php
							 		}
								}else{
									echo("No result...");
								}
							 	}

							?>

						</div>
					</div>
				</div>

			</div>
		</div>
	
	</div>
</div>
 <!-- END MAIN CONTAIN -->









 <?php
 include( "../footer.php" );
 ?>