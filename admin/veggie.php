 <?php
 include( "../header.php" );
	if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"]) && $_SESSION["role"]!="1")){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
 if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
 ?>


 <!-- START MAIN CONTAIN -->
<div class="main-contain">
	<div class="container">
		<div class="row">
		   <div>
                              <?php if(isset($_SESSION["msgg"])) {?>
								<div class="alert alert-success" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong><?=$_SESSION["msgg"]?></strong>
								</div>
								<script>
									window.setTimeout(function() {
									    $(".alert").fadeTo(500, 0).slideUp(500, function(){
									        $(this).remove(); 
									    });
									}, 4000);
								</script>
								
							<?php
								unset($_SESSION["msgg"]);
								}
							
							?>
              </div>
              
			<aside>
				<div class="col-md-3 col-sm-12 col-xs-12 sidebar pull-right">
					<!-- CATEGORIES WIDGET -->
					<div class="widget mb30">
						<div>
							<h6 class="text-uppercase bottom-line">Categories</h6>
						 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"> add catagory </button>
						   
						 
						</div> 
						<br>
						<ul class="icons-list">
						<?php  
							$sql1="SELECT * FROM `catagory` WHERE type ='Vegetable'";
							
							$result = $con->query( $sql1 );
								if ( $result->num_rows > 0 ) {
									foreach ( $result as $row ) {
							
							
							?>
							<li><a href="veggie.php?searchByCatName=<?=$row["name"]?>"><?=$row["name"]?> </a>
								<span onClick="deletecatagory(<?=$row["ID"]?>)"><img style="height: 20px; float: right; cursor:pointer;" src="<?= $_SESSION["directory"]?>img/icon/delete.png"></span>
							</li>
							 
							<?php }} ?>
						</ul>
					</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="addcatagory.php" method="post">
     	 <div class="modal-body form">
			  <label>Name: </label>
			   <input name="catagory"  class="form-control">
			   <label>Type: </label>
			   <select name="type" class="form-control">
				<option value="Fruit">Fruit</option>
				<option value="Vegetable">Vegetable</option>
			   </select>
		  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="AddCat" class="btn btn-primary " value="Save">
      </div>
      </form>
    </div>
  </div>
</div>
				</div>
			</aside>

			<div class="col-md-9 col-sm-12 col-xs-12">
				<div class="row  hidden-xs">
					<div class="toolbar">
						<div class="col-sm-4 category-num">
							<h2>Vegetables</h2>
							 
						</div>
					</div>
					
				</div>

				<div class="category-products col-grid-style">
					<div class="row clearfix">
						<div class="row clearfix">

							<?php
							if(isset($_GET["searchByCatName"])){
								$catName=$_GET["searchByCatName"];
								$sql="SELECT vehicle.*, catagory.name as catname FROM `vehicle` INNER JOIN catagory ON catagory.ID=vehicle.catagory WHERE catagory.name='$catName'";
							 
							}else{
								
								$sql="SELECT vehicle.*, catagory.name as catname FROM `vehicle` INNER JOIN catagory ON catagory.ID=vehicle.catagory WHERE vehicle.`status` =1 AND vehicle.type='Vegetable'";
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
										<!--	<h5>Bid Price:<strong><?=$price?></strong> INR</h5>  -->
											<div class="pro-size"><label>Type: <span><?=$type?></span> </label>
											<div><label>Catagory: <span><?=$catagory?></span> </label></div>
											</div>
											
											
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

<script>

function deletecatagory(id){
	var chk=confirm("do you want to delete");
	if(chk==true){
		location.href="<?=$_SESSION["directory"]?>admin/addcatagory.php?Cat_id="+id;
	}
}

</script>