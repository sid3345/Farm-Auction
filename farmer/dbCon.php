<?php

//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=auction1", "root", "");

date_default_timezone_set('Asia/Kolkata');

function fetch_user_last_activity($email, $connect)
{
 $query = "
 SELECT * FROM login_details 
 WHERE user_id = '$email' 
 ORDER BY last_activity DESC 
 LIMIT 1
 ";
 $result = mysqli_query($connect, $query);
 foreach($result as $row)
 {
  return $row['last_activity'];
 }
}

?>