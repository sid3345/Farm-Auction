<?php

include('dbCon.php');
$con=connection();

$message = '';
if(isset($_GET['activation_code'])){
    $activation_code = $_GET['activation_code'];
}

if(isset($_GET['factivation_code'])){
    $factivation_code = $_GET['factivation_code'];
}



if(isset($activation_code))
{
 $sql = " SELECT * FROM user WHERE user_activation_code = '$activation_code' ";

 $result = $con->query($sql);
 
 if($result->num_rows > 0)
 {
  
  foreach($result as $row)
  {
   if($row['user_email_status'] == 'not verified')
   {
    $update_query = "UPDATE user SET user_email_status = 'verified' WHERE ID = '".$row['ID']."'";
    $result = $con->query($update_query);
    
    if(isset($result))
    {
     $message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="login.php">Login</a></label>';
    }
   }
   else
   {
    $message = '<label class="text-info">Your Email Address Already Verified</label>';
   }
  }
 }
 else
 {
  $message = '<label class="text-danger">Invalid Link</label>';
 }
}

if(isset($factivation_code))
{
 $sql = " SELECT * FROM farmer WHERE farmer_activation_code = '$factivation_code' ";

 $result = $con->query($sql);
 
 if($result->num_rows > 0)
 {
  
  foreach($result as $row)
  {
   if($row['farmer_email_status'] == 'not verified')
   {
    $update_query = "UPDATE farmer SET farmer_email_status = 'verified' WHERE ID = '".$row['ID']."'";
    $result = $con->query($update_query);
    
    if(isset($result))
    {
     $message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="login.php">Login</a></label>';
    }
   }
   else
   {
    $message = '<label class="text-info">Your Email Address Already Verified</label>';
   }
  }
 }
 else
 {
  $message = '<label class="text-danger">Invalid Link</label>';
 }
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Email Verification</title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  
  <div class="container">
   <h1 align="center"> Email Verification</h1>
  
   <h3><?php echo $message; ?></h3>
   
  </div>
 
 </body>
 
</html>
