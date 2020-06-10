<?php 
     include("../fheader.php");
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>home.php";
</script>
	<?php
}
?>

<?php




    $userid=$_SESSION["userid"];
    $sql="SELECT * FROM `farmer` WHERE `admin`=0 AND `ID`=$userid";
    $result=$con->query($sql);
    if($result->num_rows>0){
    	foreach($result as $row){
			$email=$row["email"];
		}
  }

?>

<div class="container">
  <h2>TOP BIDDERS</h2> 
  <table id='status' class="table table-striped">
    <thead>
      <tr style="text-align-last: center;">
        <th>Bidder Name</th>
        <th>Bidder Email</th>
        <th>Crop Name</th>
        <th>Bidding End Date</th>
        
        <th>Base Price</th>
        <th>Top Bid Price</th>
        <th>Bid Time</th>
        <th>Active</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody style="text-align-last: center;">
     <?php
		$Sql="SELECT user.ID, user.name as userName, user.email as uemail ,vehicle.ID as VID, vehicle.name, vehicle.EndDate,vehicle.image, vehicle.price, bidder.price as bidprice, bidder.biddingTime as biddingTime, bidder.email FROM bidder INNER JOIN vehicle ON bidder.vehicleID=vehicle.ID INNER JOIN user ON bidder.userID=user.ID WHERE (bidder.vehicleID, bidder.price) IN (SELECT bidder.vehicleID, MAX(bidder.price) from bidder group by bidder.vehicleID) AND status=1 and active=0 ORDER BY `bidder`.`price` DESC";


          $result1 = $con->query( $Sql );
			if ( $result1->num_rows > 0 ) {
			foreach ( $result1 as $row ) {


                    $active = '';
                    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
               
                    $user_last_activity = fetch_user_last_activity($row['uemail'],$con);
                    
                    if($user_last_activity > $current_timestamp)
                    {
                    $active = '<span class="label label-success">Online</span>';
                    }
                    else
                    {
                    $active = '<span class="label label-danger">Offline</span>';
                    }
                    
        if ($row["email"]==$email){
          
		?>
      <tr>
        <td><?=$row["userName"]?></td>
        <td><input type="button" name="view" value="<?php echo $row["uemail"]; ?>" id="<?php echo $row["uemail"]; ?>" class="btn btn-info btn-xs view_data" /></td>
        <td style="cursor:pointer; color:#00008B; text-decoration:none;" onclick="location.href='cropdetail.php?id=<?php echo $row['VID'] ?>'"><?=$row["name"]?></td>
        <td><?=$row["EndDate"]?></td>
        
        <td><?=$row["price"]?></td> 
        <td><?=$row["bidprice"]?></td>
        <td><?=$row["biddingTime"]?></td>
        <td>  <?php echo $active.' '.count_unseen_message($row['uemail'], $email, $con) ?> </td>
		<td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="<?php echo $row['ID'] ?>" data-tousername="<?php echo $row['uemail'] ?>">Start Chat</button></td>
      </tr>
       <?php } }} ?>
    </tbody>
  </table>
</div>


	<!-- Footer Section -->
	<?php

	include("../footer.php");
	?>
  <!-- Footer Section /- -->
  <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Bidder Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                    
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="user_model_details"></div>
 <script>  
 $(document).ready(function(){  

     setInterval(function(){
        update_last_activity();
        //fetch_user();
        update_chat_history_data();
     }, 5000);


      var updater = setInterval(function () {
        $('table#status').load('ftopBidder.php table#status', update=true);          
      }, 5000);
     
     $(document).on('click', '.view_data', function(){ 
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"select.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });    

// You have to write update_last_activity() function on every page to get latest activity
      function update_last_activity()
        {
            $.ajax({
                url:"update_last_activity.php",
                success:function()
                {

                }
            })
        }


        function make_chat_dialog_box(to_user_id, to_user_name)
 {
  var modal_content = '<div id="user_dialog_'+to_user_id+'" class="user_dialog" title="You have chat with '+to_user_name+'">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin:14px; padding:16px;" class="chat_history" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group">';
  modal_content += '<textarea name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control"></textarea>';
  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button type="button" name="send_chat" id="'+to_user_id+'" class="btn btn-info send_chat">Send</button></div></div>';
  $('#user_model_details').html(modal_content);
 }

 $(document).on('click', '.start_chat', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');

//below ajax remove notification when message gets seen 
  $.ajax({
   url:"remove_notification.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(){
    
   }
  })

  make_chat_dialog_box(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:400
  });
  $('#user_dialog_'+to_user_id).dialog('open');
 });


/* Below code is for Insert message */

$(document).on('click', '.send_chat', function(){
  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).val();
  if (chat_message.length >0){
  $.ajax({
   url:"insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    $('#chat_history_'+to_user_id).html(data);
   }
  })
  }
 });


 function fetch_user_chat_history(to_user_id)
 {
  $.ajax({
   url:"fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);
   }
  })
 }

 function update_chat_history_data()
 {
  $('.chat_history').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history(to_user_id);
  });
 }

 });  
 </script>

<!--
<script> 
$(document).ready(function(){

 fetch_user();

 function fetch_user()
 {
  $.ajax({
   url:"fetch_user.php",
   method:"POST",
   success:function(data){
    $('#user_details').html(data);
   }
  })
 }
 
});  
</script>
-->

<!-- Dont move below code -->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
