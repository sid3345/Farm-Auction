<?php include("../fheader.php");
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>home.php";
</script>
	<?php
}
?>


<div class="container">
  <h2>User Info</h2> 
          
  <table class="table table-striped">
    <thead>
      <tr style="text-align-last: center;">
        <th>User name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody style="text-align-last: center;">

    
     <?php
        //checking user 
      $check=false;
      $userName = $_GET['userName'];
      $sql="SELECT name,email,phone,address, active FROM user WHERE admin=0 AND name='$userName'";
      $result = $con->query( $sql );
  
     if ( $result->num_rows > 0 ) {
        foreach ( $result as $row ) {
      
    ?>
        <tr>
          <td><?=$row["name"]?></td>
          <td><?=$row["email"]?></td>
          <td><?=$row["phone"]?></td>
          <td><?=$row["address"]?></td>
                
          <?php
        if($row["active"]==1){
          #echo("Block");
          ?>
          <td><?="Blocked"?></td>
          <?php
          $check=true;
        }else{
          #echo("Unblock");
          ?>
          <td><?="Active"?></td>
          <?php
          $check=false;
        }
        ?></td>
      </tr>
       <?php } } ?>
    </tbody>
  </table>
</div>



	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>D
	<!-- Footer Section /- -->