<?php 
// include header file and checking authenticity
 include("../header.php");
	if((isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false) || (isset($_SESSION["role"]) && $_SESSION["role"]!="1")){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>

<style>
	.mainbody{
		margin-top: 10%; margin-bottom: 150px; border-radius: 43px 43px 43px 43px;
-moz-border-radius: 43px 43px 43px 43px;
-webkit-border-radius: 43px 43px 43px 43px;
border: 4px solid #b8a5b8; background: rgba(242,246,248,1);
background: -moz-linear-gradient(left, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 26%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(242,246,248,1)), color-stop(26%, rgba(216,225,231,1)), color-stop(51%, rgba(181,198,208,1)), color-stop(100%, rgba(224,239,249,1)));
background: -webkit-linear-gradient(left, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 26%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
background: -o-linear-gradient(left, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 26%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
background: -ms-linear-gradient(left, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 26%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
background: linear-gradient(to right, rgba(242,246,248,1) 0%, rgba(216,225,231,1) 26%, rgba(181,198,208,1) 51%, rgba(224,239,249,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f6f8', endColorstr='#e0eff9', GradientType=1 );
	}
</style>
<!-- main content -->
<div class="container mainbody" >
  
  <h2>Farmer list</h2>
           
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
		<th>State</th>
		<th>Pincode</th>
        <th>Status</th>
        <th>Action</th>
         
      </tr>
    </thead>
    <tbody id="tableBody">
      
    </tbody>
  </table>
</div>
<!-- include footer-->
<?php include("../footer.php"); ?>

<!-- javascript functions -->
<script>
setInterval(function(){$.get('farmerCheck.php',function(data){
						$("#tableBody").html(data);
					});},1000);
	
	function block(id){
				var r=confirm("do you want to unblock?");
				if(r==true){
					   
					$.get('farmerStatus.php',{ID:id},function(data){
						alert(data);
					});
				}
			}
	function unblock(id){
				var r=confirm("do you want to block?");
				if(r==true){
					   
					$.get('farmerStatus.php',{ActiveID:id},function(data){
						alert(data);
					});
				}
			}
</script>