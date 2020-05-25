<?php 
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>login.php";
</script>
	<?php
}
?>

<div class="container" style="margin-top: 100px; margin-bottom: 100px; background-color: #F0E6E6; width: 100%; padding: 20px;">
   <?php if(isset($_SESSION["ok"])){
	echo($_SESSION["ok"]);
	unset($_SESSION["ok"]);
} ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="container">
            <div class="row my-2">