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

 $query="SELECT email FROM farmer WHERE ID = '".$_SESSION['userid']."'";
 $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
   $uemail= $row['email'];
  }

  $query = "
  UPDATE chat_message 
  SET status = '0' 
  WHERE from_user_id = '".$email."' 
  AND to_user_id = '".$uemail."' 
  AND status = '1'
  ";
  $statement = $connect->prepare($query);
  $statement->execute();

?>