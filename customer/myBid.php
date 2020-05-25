<?php
	include("../header.php");
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>


<div class="container">
  <h2>My Bidding List</h2>
     
  <table class="table table-hover">
    <thead >
      <tr style="text-align-last: center;">
        <th>Crop Name</th>
        <th>Bidding End Date</th>
        <th>Image</th>
        <th>Base Price</th>
        <th>Top Bid Price</th>
        <th>Bidding Time</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="myBid" style="text-align-last: center;">
      
    </tbody>
  </table>
</div>


<script>

 function myBID(){
		 
		 setInterval(function(){
			 	$.get('myBidCheck.php',function(data){
						$("#myBid").html(data);
					 
					});
			 
		 },1000);
	 }
myBID();

</script>














<?php
	include("../footer.php");
?>