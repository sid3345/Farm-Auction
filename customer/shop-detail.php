 <?php
 include( "../header.php" );
include("../dbCon.php");
		$con=connection();
$vehicleID=$_GET["id"];
 ?>

            <!-- Start Breadcrumb -->
            <div class="page-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="title"><span>Shop Detail</span></h1>
                            <div class="breadcrumb">
                                <a href="http://localhost/auction/index.php">Home</a>
                                <span class="delimeter">/</span> 
                                <span class="current">Shop Detail</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Breadcrumb -->

            <section class="main-contain shop-product bg-white">
                <div class="container">
                    <div class="row">
                        <!--Image Block-->
                        <div class="signal-product-image">
                            <div class="col-md-6 col-sm-6 col-sm-12">
                                <div class="images cd-post-thumbnail">
                                    <div class="flexslider-wrap product-image-full-size">
                                        <div class="flexslider" id="main_slider">
                                            <div class="flex-viewport">
                                                <ul class="slides">
                                                   <?php
													$sql="SELECT * FROM `vehicleimage` WHERE `vehicleID`='$vehicleID'";
													$result1 = $con->query( $sql );
											if ( $result1->num_rows > 0 ) {
												foreach ( $result1 as $row ) {
													?>
                                                    <li itemtype="https://schema.org/Product" itemscope=""> 
                                                        <a class="cd-lightbox-image cd-lightbox-type-image" href="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name"]?>" title="">
                                                            <img title="" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name"]?>" alt="" ><i itemprop="image" class="fa fa-fw fa-expand"></i>
                                                        </a>
                                                    </li>
													<li itemtype="https://schema.org/Product" itemscope=""> 
                                                        <a class="cd-lightbox-image cd-lightbox-type-image" href="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name2"]?>" title="">
                                                            <img title="" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name2"]?>" alt="" ><i itemprop="image" class="fa fa-fw fa-expand"></i>
                                                        </a>
                                                    </li>
                                                      <li itemtype="https://schema.org/Product" itemscope=""> 
                                                        <a class="cd-lightbox-image cd-lightbox-type-image" href="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name3"]?>" title="">
                                                            <img title="" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name3"]?>" alt="" ><i itemprop="image" class="fa fa-fw fa-expand"></i>
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flexslider" id="main_thumbs">
                                        <div class="flex-viewport">
                                            <ul class="slides">
                                                <li itemtype="https://schema.org/Product" itemscope="">
                                                    <img title="" alt="" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name"]?>">
                                                </li>
                                                <li itemtype="https://schema.org/Product" itemscope="">
                                                    <img title="" alt="" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name2"]?>">
                                                </li>
                                                <li itemtype="https://schema.org/Product" itemscope="">
                                                    <img title="" alt="" src="<?=$_SESSION["directory"]?>img/vehicle/<?=$row["name3"]?>">
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
									<?php  } } ?>


                                </div>
                            </div>
                        </div>
                        <!--Image Block-->
                        
                        
                        <?php
						$sql2="SELECT * FROM `vehicle`";
						$result2 = $con->query( $sql2 );
							if ( $result2->num_rows > 0 ) {
								foreach ( $result2 as $row ) {
									$modelname=$row["name"];				
									$type=$row["type"];				
									$catagory=$row["catagory"];				
									$startDate=$row["startDate"];				
									$EndDate=$row["EndDate"];				
									$price=$row["price"];				
								}
							}
						?>
                        
                       
                        <div class="col-md-6 col-sm-6 col-sm-12">
                            <div class="shop-product-heading">
                                <h2><?=$modelname ?></h2>  
                            </div>

                            <ul class="list-inline product-ratings mb30">
                                <li><i class="rating-selected fa fa-star"></i></li>
                                <li><i class="rating-selected fa fa-star"></i></li>
                                <li><i class="rating-selected fa fa-star"></i></li>
                                <li><i class="rating fa fa-star"></i></li>
                                <li><i class="rating fa fa-star"></i></li>
                                <li class="product-review-list">
                                    <span>(1) <a href="#">Review</a> | <a href="#"> Add Review</a></span>
                                </li>
                            </ul>


                            <p class="mb15"><> </p><br>

                            <ul class="list-inline shop-product-prices mb30">
                                <li class="shop-red">$57.00</li>
                                <li class="line-through">$70.00</li>
                            </ul>

                            <h3 class="shop-product-title">Size</h3>
                            <ul class="list-inline product-size mb30">
                                <li>
                                    <input type="radio" id="size-1" name="size" checked>
                                    <label for="size-1">S</label>
                                </li>
                                <li>
                                    <input type="radio" id="size-2" name="size">
                                    <label for="size-2">M</label>
                                </li>
                                <li>
                                    <input type="radio" id="size-3" name="size">
                                    <label for="size-3">L</label>
                                </li>
                                <li>
                                    <input type="radio" id="size-4" name="size">
                                    <label for="size-4">XL</label>
                                </li>
                            </ul>

                            <h3 class="shop-product-title">Color</h3>
                            <ul class="list-inline product-color mb30">
                                <li>
                                    <input type="radio" id="color-1" name="color">
                                    <label class="color-one" for="color-1"></label>
                                </li>
                                <li>
                                    <input type="radio" id="color-2" name="color">
                                    <label class="color-two" for="color-2"></label>
                                </li>
                                <li>
                                    <input type="radio" id="color-3" name="color">
                                    <label class="color-three" for="color-3"></label>
                                </li>
                            </ul>

                            <h3 class="shop-product-title">Quantity</h3>
                            <div class="mb30">
                                <form name="f1" class="product-quantity">
                                    <button type='button' class="quantity-button" name='subtract' onclick='javascript: document.getElementById("qty").value--;' value="-">-</button>
                                    <input type='text' class="quantity-field" name='qty' value="1" id='qty'/>
                                    <button type='button' class="quantity-button" name='add' onclick='javascript: document.getElementById("qty").value++;' value='+'>+</button>
                                </form>
                                <button type="button" class="btn btn-product">Add to Cart</button>
                            </div>

                            <ul class="list-inline add-to-wishlist add-to-wishlist-brd">
                                <li class="wishlist-in">
                                    <i class="fa fa-heart"></i>
                                    <a href="#">Add to Wishlist</a>
                                </li>
                                <li class="compare-in">
                                    <i class="fa fa-exchange"></i>
                                    <a href="#">Add to Compare</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            
        <section class="spa-area spa-area-17">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="single-detail-product">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="widget-header style-08">
                                            <span class="sub-title style-03">POSTED 26/06/2016</span>
                                            <h3 class="widget-title style-05">MERCEDES BENZ</h3>
                                        </div>
                                        <ul class="spa-meta-data-single">
                                            <li><a href="#"><i class="fa fa-map-marker"></i>NEW YORK CITY, US</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-feed"></i>ADVERTISEMENT ID : 240042945</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-bookmark-o"></i>PREMIUM</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-user"></i>JULIANA DRUPINA</a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-star"></i>ADD TO FAVOURITE</a>
                                            </li>
                                        </ul>
                                            
                                        <div class="widget-header style-15">
                                            <span class="sub-title style-03">ABOUT THIS VEHICLE</span>
                                            <h3 class="widget-title style-05">VEHICLE SPECIFICATION</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>MAKE</td>
                                                            <td>FERRARI</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>MODEL</td>
                                                            <td>M-CLASS</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>CAR KILOMETERS</td>
                                                            <td>42.000 KM</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>BODY TYPE</td>
                                                            <td>SEDAN</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>STYLE/TRIM</td>
                                                            <td>SV PREMIUM</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>ENGINE</td>
                                                            <td>V-6 CYLINDER</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>FUEL TYPE</td>
                                                            <td>GASOLINE FUEL</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-6">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>YEAR</td>
                                                            <td>2011 - 2012</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>TRANSMISSION</td>
                                                            <td>M-CLASS</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>EXTERIOR</td>
                                                            <td>42.000 KM</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>INTERIOR</td>
                                                            <td>SEDAN</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>PASSENGERS</td>
                                                            <td>SV PREMIUM</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>CITY FUEL ECONOMY</td>
                                                            <td>V-6 CYLINDER</td>
                                                        </tr>
                                                        <tr>
                                                            <td><i class="fa fa-caret-right"></i>HWY FUEL</td>
                                                            <td>GASOLINE FUEL</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="widget-header style-15">
                                            <span class="sub-title style-03">VEHICLE DESCRIPTION</span>
                                            <h3 class="widget-title style-05">VEHICLE OVERVIEW</h3>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                                        <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                         
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>    
            
            
            
            
            
            <section class="main-contain dip-style">
                <div class="container">  
                        <div class="login-area mb30">
                    <div class="login-header">
                                <div class="login-details">
                                    <ul class="nav nav-tabs navbar-right">
                                        <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                                        <li><a data-toggle="tab" href="#size">Size</a></li>
                                          <li><a data-toggle="tab" href="#custom">Custom</a></li>
                                    </ul>
                                </div>
                        </div>

                    <div class="tab-content">
                 <!-- Description -->
                <div class="tab-pane fade in active" id="description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis aliquet. Morbi mollis mollis pellentesque. Aenean vitae erat velit. Maecenas urna sapien, dignissim a augue vitae, porttitor luctus urna.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis aliquet. Morbi mollis mollis pellentesque. Aenean vitae erat velit. Maecenas urna sapien, dignissim a augue vitae, porttitor luctus urna.</p><br>
                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam justo et nibh venenatis aliquet. Morbi mollis mollis pellentesque. Aenean vitae erat velit. Maecenas urna sapien, dignissim a augue vitae, porttitor luctus urna.</p>
                          </div>
                <!-- End Description -->
                
                  <!-- Size -->
                <div id="size" class="tab-pane">
                16" waist
                <br>
                34" inseam
                <br>
                10.5" front rise
                <br>
                8.5" knee
                <br>
                7.5" leg opening
                <br>
                <br>
                Measurements taken from size 30
                <br>
                Model wears size 31. Model is 6'2 
                </div>
               <!-- Size -->
                  
                <!-- Description -->
                <div class="tab-pane media-block" id="custom">
                    <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="video-block">
                                        <iframe width="540" height="360" src="https://www.youtube.com/embed/Vpg9yizPP_g"></iframe>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="video-block">
                                        <iframe width="540" height="360" src="https://www.youtube.com/embed/Vpg9yizPP_g"></iframe>
                                    </div>
                                </div>     
                    </div>
                <!-- End Description -->
                    </div>
        </div>
                        </div>
                    
               <div class="related-products-style-in-productp"> 
           <div class="widget">
                     <h6 class="text-uppercase bottom-line">Related Product</h6>
                    </div>
                   <div class="row">
        <div class="new-product slider">
                         <div class="col-md-4 item">
                            <div class="products grid-product">
                                <div class="product-grid-inner">
                                    <div class="product-grid-img">
                                        <ul class="product-labels">
                                            <li>Sale</li>
                                        </ul>
                                        <a href="#" class="product-grid-img-thumbnail">
                                            <img src="<?=$_SESSION["directory"]?>img/products/pro1.jpg" alt="img" class="img-responsive primary-img" />
                                            <img src="<?=$_SESSION["directory"]?>img/products/pro2.jpg" alt="img" class="img-responsive socendary-img" />
                                        </a>
                                        <div class="product-grid-atb text-center"><i class="fa fa-shopping-cart"></i><a class="" href="#">Add to Cart</a></div>
                                    </div>

                                    <div class="product-grid-caption text-center">
                                        <h4><a class="p-grid-title" href="<?=$_SESSION["directory"]?>customer/shop-detail.php">Printed Summer Dress</a></h4>
                                        <span class="price"><span class="old-price">$ 150,00</span> $ <span class="special-price">99,99</span></span>
                                        <ul class="list-inline add-to-wishlist">
                                            <li class="product-wishlist">
                                                <i class="fa fa-heart"></i>
                                                <a href="#">Add to Wishlist</a>
                                            </li>
                                            <li class="product-wishlist">
                                                <i class="fa fa-exchange"></i>
                                                <a href="#">Add to Compare</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 item">
                            <div class="products grid-product">
                                <div class="product-grid-inner">
                                    <div class="product-grid-img">
                                        <ul class="product-labels">
                                            <li>Sale</li>
                                        </ul>
                                        <a href="#" class="product-grid-img-thumbnail">
                                            <img src="<?=$_SESSION["directory"]?>img/products/pro3.jpg" alt="img" class="img-responsive primary-img" />
                                            <img src="<?=$_SESSION["directory"]?>img/products/pro4.jpg" alt="img" class="img-responsive socendary-img" />
                                        </a>
                                        <div class="product-grid-atb text-center"><i class="fa fa-shopping-cart"></i><a class="" href="#">Add to Cart</a></div>
                                    </div>

                                    <div class="product-grid-caption text-center">
                                        <h4><a class="p-grid-title" href="shop-detail.html">Printed Summer Dress</a></h4>
                                        <span class="price"><span class="old-price">$ 150,00</span> $ <span class="special-price">99,99</span></span>
                                        <ul class="list-inline add-to-wishlist">
                                            <li class="product-wishlist">
                                                <i class="fa fa-heart"></i>
                                                <a href="#">Add to Wishlist</a>
                                            </li>
                                            <li class="product-wishlist">
                                                <i class="fa fa-exchange"></i>
                                                <a href="#">Add to Compare</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 item">
                            <div class="products grid-product">
                                <div class="product-grid-inner">
                                    <div class="product-grid-img">
                                        <ul class="product-labels">
                                            <li>Sale</li>
                                        </ul>
                                        <a href="#" class="product-grid-img-thumbnail">
                                            <img src="img/products/pro5.jpg" alt="img" class="img-responsive primary-img" />
                                            <img src="img/products/pro6.jpg" alt="img" class="img-responsive socendary-img" />
                                        </a>
                                        <div class="product-grid-atb text-center"><i class="fa fa-shopping-cart"></i><a class="" href="#">Add to Cart</a></div>
                                    </div>

                                    <div class="product-grid-caption text-center">
                                        <h4><a class="p-grid-title" href="shop-detail.html">Printed Summer Dress</a></h4>
                                        <span class="price"><span class="old-price">$ 150,00</span> $ <span class="special-price">99,99</span></span>
                                        <ul class="list-inline add-to-wishlist">
                                            <li class="product-wishlist">
                                                <i class="fa fa-heart"></i>
                                                <a href="#">Add to Wishlist</a>
                                            </li>
                                            <li class="product-wishlist">
                                                <i class="fa fa-exchange"></i>
                                                <a href="#">Add to Compare</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 item">
                            <div class="products grid-product">
                                <div class="product-grid-inner">
                                    <div class="product-grid-img">
                                        <ul class="product-labels">
                                            <li>Sale</li>
                                        </ul>
                                        <a href="#" class="product-grid-img-thumbnail">
                                            <img src="img/products/pro7.jpg" alt="img" class="img-responsive primary-img" />
                                            <img src="img/products/pro8.jpg" alt="img" class="img-responsive socendary-img" />
                                        </a>
                                        <div class="product-grid-atb text-center"><i class="fa fa-shopping-cart"></i><a class="" href="#">Add to Cart</a></div>
                                    </div>

                                    <div class="product-grid-caption text-center">
                                        <h4><a class="p-grid-title" href="shop-detail.html">Printed Summer Dress</a></h4>
                                        <span class="price"><span class="old-price">$ 150,00</span> $ <span class="special-price">99,99</span></span>
                                        <ul class="list-inline add-to-wishlist">
                                            <li class="product-wishlist">
                                                <i class="fa fa-heart"></i>
                                                <a href="#">Add to Wishlist</a>
                                            </li>
                                            <li class="product-wishlist">
                                                <i class="fa fa-exchange"></i>
                                                <a href="#">Add to Compare</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 item">
                            <div class="products grid-product">
                                <div class="product-grid-inner">
                                    <div class="product-grid-img">
                                        <ul class="product-labels">
                                            <li>Sale</li>
                                        </ul>
                                        <a href="#" class="product-grid-img-thumbnail">
                                            <img src="img/products/pro9.jpg" alt="img" class="img-responsive primary-img" />
                                            <img src="img/products/pro10.jpg" alt="img" class="img-responsive socendary-img" />
                                        </a>
                                        <div class="product-grid-atb text-center"><i class="fa fa-shopping-cart"></i><a class="" href="#">Add to Cart</a></div>
                                    </div>

                                    <div class="product-grid-caption text-center">
                                        <h4><a class="p-grid-title" href="shop-detail.html">Printed Summer Dress</a></h4>
                                        <span class="price"><span class="old-price">$ 150,00</span> $ <span class="special-price">99,99</span></span>
                                        <ul class="list-inline add-to-wishlist">
                                            <li class="product-wishlist">
                                                <i class="fa fa-heart"></i>
                                                <a href="#">Add to Wishlist</a>
                                            </li>
                                            <li class="product-wishlist">
                                                <i class="fa fa-exchange"></i>
                                                <a href="#">Add to Compare</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 item">
                            <div class="products grid-product">
                                <div class="product-grid-inner">
                                    <div class="product-grid-img">
                                        <ul class="product-labels">
                                            <li>Sale</li>
                                        </ul>
                                        <a href="#" class="product-grid-img-thumbnail">
                                            <img src="img/products/pro11.jpg" alt="img" class="img-responsive primary-img" />
                                            <img src="img/products/pro12.jpg" alt="img" class="img-responsive socendary-img" />
                                        </a>
                                        <div class="product-grid-atb text-center"><i class="fa fa-shopping-cart"></i><a class="" href="#">Add to Cart</a></div>
                                    </div>

                                    <div class="product-grid-caption text-center">
                                        <h4><a class="p-grid-title" href="shop-detail.html">Printed Summer Dress</a></h4>
                                        <span class="price"><span class="old-price">$ 150,00</span> $ <span class="special-price">99,99</span></span>
                                        <ul class="list-inline add-to-wishlist">
                                            <li class="product-wishlist">
                                                <i class="fa fa-heart"></i>
                                                <a href="#">Add to Wishlist</a>
                                            </li>
                                            <li class="product-wishlist">
                                                <i class="fa fa-exchange"></i>
                                                <a href="#">Add to Compare</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
    </div>
                </div>
                     </div>  
            </section>
  <?php
 include( "../footer.php" );
 ?> 