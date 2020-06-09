<?php 
include('dbCon.php');
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "auction1");  
      $query = "SELECT * FROM user WHERE email = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">'; 
      while($row = mysqli_fetch_array($result))  
      {  
         
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Contact No.</label></td>  
                     <td width="70%">'.$row["phone"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">'.$row["address"].'</td>  
                </tr>  
                 
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;
/*
      $output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>Bidder Email</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
';

foreach($result as $row)
{

$status = '';
$current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
$current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
$user_last_activity = fetch_user_last_activity($row['email'], $connect);
if($user_last_activity > $current_timestamp)
{
$status = '<span class="label label-success">Online</span>';
}
else
{
$status = '<span class="label label-danger">Offline</span>';
}
 $output .= '
 <tr>
  <td>'.$row['email'].'</td>
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['ID'].'" data-tousername="'.$row['email'].'">Start Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output; */
 }  
 ?>