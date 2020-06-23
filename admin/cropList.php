<?php include("../header.php");
	if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"]) && $_SESSION["role"]!="1")){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>




<div class="container" style="background: #CDC6C6; margin-bottom: 150px; margin-top: 30px;">
  <h2>Crop List</h2>
             
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Type</th>
        <th>Base Price</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Image</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="tableBody">
   
    </tbody>
  </table>
</div>





	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>D
	<!-- Footer Section /- -->
	
	
	<script>
			setInterval(function(){$.get('EditVehicleCheck.php',function(data){
						$("#tableBody").html(data);
					});},1000);
		//$(document).ready(function(){
			function remove(id){
				var r=confirm("do you want to deactive?");
				if(r==true){
					   
					$.get('removeVehicle.php',{ID:id},function(data){
						alert(data);
					});
				}
			}	
		function active(id){
				var r=confirm("do you want to active?");
				if(r==true){
					   
					$.get('removeVehicle.php',{ActiveID:id},function(data){
						alert(data);
					});
				}
			}
		//})

</script>
	