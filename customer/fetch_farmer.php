<?php

//fetch_farmer.php

include('dbCon.php');

session_start();

$query = "
SELECT * FROM farmer 
WHERE email =(SELECT email from vehicle WHERE ID= '".$_SESSION['ID']."' )
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <td>Farmer Email</td>
  <td>Status</td>
  <td>Action</td>
 </tr>
';

foreach($result as $row)
{

 $output .= '
 <tr>
  <td>'.$row['email'].'</td>
  <td></td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['ID'].'" data-tousername="'.$row['email'].'">Start Chat</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>