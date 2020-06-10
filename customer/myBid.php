<?php
	include("../header.php");
	if(isset($_SESSION["isLogedIn"]) && $_SESSION["isLogedIn"]==false){
	?>
<script>
	//alert("Please login first...");
	location.href="<?=$_SESSION["directory"]?>index.php";
</script>
	<?php
}
?>



<div class="container">
  <h2>My Bidding List</h2>
  <table class="table table-hover">
    <thead >
      <tr style="text-align-last: center;">
        <th>Crop Name</th>
        <th>Farmer Email</th>
        <th>Bidding End Date</th>
        <!-- <th>Image</th> -->
        <th>Base Price</th>
        <th>My Bid Price</th>
        <th>Bidding Time</th>
        <th>Status</th>
        <th>Active</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="myBid" style="text-align-last: center;">
      
    </tbody>
  </table>
</div>
<!-- Below Div Popup Dynamic Chat Box -->
<div id="user_model_details"></div>
<!--
<script>

 function myBID(){
		 
		 setInterval(function(){
			 	$.get('myBidCheck.php',function(data){
						$("#myBid").html(data);
					 
					});
			 
		 },1000);
	 }
myBID();

</script>
-->
<script>  

$(document).ready(function(){

 fetch_user();

 setInterval(function(){
  update_last_activity();
  fetch_user();
  update_chat_history_data();
 },5000);


 function fetch_user()
 {
  $.ajax({
   url:"myBidCheck.php",
   method:"POST",
   success:function(data){
    $('#myBid').html(data);
   }
  })
 }

 function update_last_activity()
 {
  $.ajax({
   url:"update_last_activity.php",
   success:function()
   {

   }
  })
 }
 /* Below function is for dynamic chat box */
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







<?php
	include("../footer.php");
?>