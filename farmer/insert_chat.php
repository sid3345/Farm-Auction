<?php

//insert_chat.php

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


$data = array(
 ':to_user_id'  => $email,
 ':from_user_id'  => $uemail,
 ':chat_message'  => $_POST['chat_message'],
 ':status'   => '1'
);

$query = "
INSERT INTO chat_message 
(to_user_id, from_user_id, chat_message, status) 
VALUES (:to_user_id, :from_user_id, :chat_message, :status)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 echo fetch_user_chat_history($uemail, $email, $connect);
}

?>