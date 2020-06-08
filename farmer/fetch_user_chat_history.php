<?php

//fetch_user_chat_history.php

include('dbCon.php');

session_start();

// Below query fetches email from database

$query="SELECT email FROM user WHERE ID = '".$_POST["to_user_id"]."'";
$statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $email= $row['email'];
 }

 $query="SELECT email FROM Farmer WHERE ID = '".$_SESSION['userid']."'";
 $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $uemail= $row['email'];
  }
  
  echo fetch_user_chat_history($uemail, $email, $connect);

?>