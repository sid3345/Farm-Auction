<?php


   require('dbCon.php');


   $sql = "SELECT * FROM sub_category
         WHERE ID LIKE '%".$_GET['id']."%'"; 


   $result = $con->query($sql);


   $json = [];
   while($row = $result->fetch_assoc()){
        $json[$row['id']] = $row['name'];
   }


   echo json_encode($json);
?>