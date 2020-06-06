<?php
	include("../header.php");
//include("../dbCon.php");
//		$con=connection();


$userID=$_SESSION["userid"];
$vehicleID=$_GET["id"];
$sql="SELECT vehicle.image, bidder.price FROM `vehicle` INNER JOIN bidder on vehicle.ID=bidder.vehicleID WHERE vehicle.ID='$vehicleID' AND bidder.userID='$userID'";
$result = $con->query( $sql );
	if ( $result->num_rows > 0 ) {
		foreach ( $result as $row ) {
			$image=$row["image"];
			$bidprice=$row["price"];
			
		}
	}

$checkconfirm=false;
 
$sql2="SELECT * FROM `confirmbid` WHERE `vehicleID`=$vehicleID AND `userID`= $userID";

$result = $con->query($sql2);
	if ( $result->num_rows > 0 ) {
		$checkconfirm=true;
		 
	}


	$sql3="SELECT SUM(amount) as amount FROM `deposit` WHERE userID='$userID' AND role=1";
	$result1=$con->query($sql3);
    if($result1->num_rows>0){
    	foreach($result1 as $row1){
    		 $amount=$row1["amount"];
    	}
    }else{
		$amount='0';
		
	}
if($amount==""){
	$amount="0.00";
}


?>

<style>
	#heading{background: rgba(255,255,255,1);
background: -moz-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(95,215,236,1) 50%, rgba(255,255,255,1) 100%);
background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(255,255,255,1)), color-stop(50%, rgba(95,215,236,1)), color-stop(100%, rgba(255,255,255,1)));
background: -webkit-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(95,215,236,1) 50%, rgba(255,255,255,1) 100%);
background: -o-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(95,215,236,1) 50%, rgba(255,255,255,1) 100%);
background: -ms-radial-gradient(center, ellipse cover, rgba(255,255,255,1) 0%, rgba(95,215,236,1) 50%, rgba(255,255,255,1) 100%);
background: radial-gradient(ellipse at center, rgba(255,255,255,1) 0%, rgba(95,215,236,1) 50%, rgba(255,255,255,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ffffff', GradientType=1 );}
	.payment{
		border-radius: 39px 38px 38px 38px;
-moz-border-radius: 39px 38px 38px 38px;
-webkit-border-radius: 39px 38px 38px 38px;
border: 7px double #735873;
		
		background: rgba(183,222,237,1);
background: -moz-linear-gradient(-45deg, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 24%, rgba(33,180,226,1) 78%, rgba(183,222,237,1) 100%);
background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(183,222,237,1)), color-stop(24%, rgba(113,206,239,1)), color-stop(78%, rgba(33,180,226,1)), color-stop(100%, rgba(183,222,237,1)));
background: -webkit-linear-gradient(-45deg, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 24%, rgba(33,180,226,1) 78%, rgba(183,222,237,1) 100%);
background: -o-linear-gradient(-45deg, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 24%, rgba(33,180,226,1) 78%, rgba(183,222,237,1) 100%);
background: -ms-linear-gradient(-45deg, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 24%, rgba(33,180,226,1) 78%, rgba(183,222,237,1) 100%);
background: linear-gradient(135deg, rgba(183,222,237,1) 0%, rgba(113,206,239,1) 24%, rgba(33,180,226,1) 78%, rgba(183,222,237,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b7deed', endColorstr='#b7deed', GradientType=1 );
	}
</style>

<div class="container" style="min-height: 500px;">
	<div class="row">
		<div style=" margin-top: 60px;" id="heading">
			<h1 style="text-align: center; color: crimson; ">Congratulations </h1>
			<h3 style="text-align: center;">For winning the crop </h3>
			<h4 style="text-align: center;">Winning Price: <?=$bidprice?> INR</h4>
			
		</div>
		<div>
				<img src="../img/vehicle/<?=$image?>" style="max-height:600px; max-width: 600px; align-content: center; display: block;    margin-left: auto; margin-right: auto;" class="center">
		</div>
		<div >
			<div style="margin-top: 50px;">
			<div style="text-align: justify;">
				<h3 style="text-decoration: underline; margin-bottom: 30px;">Payment</h3>
				<strong>Bidders from the India: The only accepted payment methods for bidders are Net Banking and hand cash during delivery. We currently accept hand cash up to INR 5,00,000. All payments INR 5,00,000 or more must be made via Net Banking. </strong>

				<p> A Net Banking is an electronic transfer of funds initiated by your bank. Following a winning bid, an email will be sent detailing the final amounts due, to be paid via Net Banking within 72 hours of receipt. If not paid, within 72 hours you acknowledge and agree to possible forfeiture of any fees and goods. To learn more about Net Bankings, please read the FAQ on Net Bankings for Crop.</p>
				<p> 
				Crop Auction currently does not accept international credit cards, credit cards or PayPal based outside of the India, as a form of payment.</p>
			</div>
			
			<div class="payment" style=" display: flow-root;">
				<div class="form-group" style="margin: 15px;">
					<form class="form-inline">
					<label>Select delivery type: </label>
						<select class="form-control " id="deliveryOption">
							<option value="From Office Delivery">Take Away Yourself</option>
							<option value="Home Delivery">Home Delivery</option>
						</select>
						
					</form>
					<div style="margin-top: 20px;"><input type="checkbox" id="deamount" onClick="amountfuction()"> Minimize the deposit amount</div>
				</div>
				<div style="float: right;"  >
					     <div class="col-sm-12  ">
                                <ul style="font-size: 20px;">
                                    <li>
                                       <span>Delivery cost: <label id="deliveryCost" > </label> INR</span>
                                         
                                         
                                    </li> 
                                  
                                    <li>
                                        <span>Bidding cost:<label id="biddingCost"> <?=$bidprice?>  </label>  INR </span>
                                    
                                    </li>
                                    <li>
                                        <span style="display: none;" id="mainCheck">Deposit amount (-):<label id="depositCost"> <?=$amount?>  </label>  INR </span>
                                    	<input type="hidden" id="checking" value="">
                                    </li>
                                    <hr>
                                    <li class="divider"></li>
                                    <li class="total-price">
                                     <span>Total cost: 	&nbsp; <label id="TotalCost" >  </label>  INR</span>
                                         
                                    </li>
                                </ul>
                                 
                                  <button id="confirm" style="margin: 15px;" class="btn btn-product pull-right" <?php  if($checkconfirm ==true){?> disabled data-toggle="tooltip" data-placement="top"  title="You already confimed your choice!" <?php } ?>>Confirm</button>
                            </div>
				</div>
			</div>
			</div>
			
		</div>
		<div style="display: block;position: inherit;margin-top: 5%; margin-bottom: 5%;">
				<div>
					<h3 style="text-decoration: underline;">Legal Notice:</h3>
					<label>The winning bidder must have a picture ID at the time of pick up. If the winning bidder elects to have a third party pick up the vehicle, the third party must have a picture ID, a letter from the winning bidder authorizing the party to pick up the vehicle and a copy of the winning bidder’s driver’s license.</label>
					<p>Vehicles may not be driven off the lot except with a dealer plate affixed. By law, vehicles are not permitted to be parked on or to drive on the streets of India without registration and plates registered to the vehicle. If the buyer cannot obtain the required registration and plates prior to pick up, they should have the vehicle towed at their own expense. The buyer should have the vehicle towed at their own expense.</p>
					<label>Condition: </label><span>Untested - Sold As-Is</span>
					<label>Storage fees begin accruing immediately after the grace period has ended. Storage fees are charged per calendar day INCLUDING Saturday and Sunday (i.e. if the grace period expires on a Friday, storage will begin to accrue Saturday and each day until the vehicle is picked up.</label>
					Storage rates quoted are effective only for purchased vehicles through the date of pick up or ownership transfer. The storage facility sets all other fees at their sole discretion. 500 INR will be charged as storage rate per day.
			<h3 style="text-decoration: underline;">Buyers Responsibility:</h3>
				<p>
					<strong>The BUYER will receive an email notification from Crop Auction following the close of an auction.</strong> After fraud verification and payment settlement, we will email the BUYER instructions for retrieving the ASSET from the Will-Call Location listed above.
					<br>
					All applicable shipping, logistics, transportation, customs, fees (storage/gate/title/registration/smog/other), taxes, export/import activities and all associated costs are the sole responsibility of the BUYER. No shipping, customs, export or import assistance is available from Crop Auction.
					<br>
					When applicable for a given ASSET, BUYER bears responsibility for determining motor vehicle registration requirements in the applicable jurisdiction as well as costs, including any fees, registration fees, taxes, etc., owed as a result of BUYER registering an ASSET; for example, BUYER bears sole responsibility for all title/registration/smog and other such fees.
					<br>
					BUYER is responsible for all storage fees at time of pick-up. See above under Legal notice for specific requirements for this asset, but generally assets must be picked up the fixed date of payment otherwise additional storage fees will be applied.
				</p>
			</div>
				
			</div>
	</div>
</div>




<?php
	include("../footer.php");
?>






<script>
	var depositPrice;
	var amountcheck=$("#deamount");
			 if(amountcheck.prop('checked')==true){
			 depositPrice=parseInt($("#depositCost").text());
			 }else{
				 depositPrice=0;
			 }
		
			var value=0;
		var bidprice=parseInt($("#biddingCost").text());
		var check=false;
		
		$("#deliveryOption").on('change',function(){
			check=true;
			if(amountcheck.prop('checked')==true){
			 depositPrice=parseInt($("#depositCost").text());
			 }else{
				 depositPrice=0;
			 }
			if($("#deliveryOption").val()== "Home Delivery"){
					
		if(bidprice <=100000){
			value= (bidprice*1)/100;
		}else if(bidprice >100000 && bidprice <=1000000){
			value= (bidprice*.5)/100;
		}else if(bidprice >1000000 && bidprice <=10000000){
			value= (bidprice*.3)/100;
		}else if(bidprice >10000000 && bidprice <=20000000){
			value= (bidprice*.15)/100;
		}else{
			value= (bidprice*.1)/100;
		}
		value=parseInt(value);
		$("#deliveryCost").text(value);
		
		$("#TotalCost").text((value+bidprice)-depositPrice).toFixed(2);
			}else{
				$("#deliveryCost").text(0.00);
		$("#TotalCost").text(bidprice-depositPrice).toFixed(2);
			}
		
		});
  if(check==false){
	  $("#deliveryCost").text(0.00);
	  $("#TotalCost").text(bidprice-depositPrice);
  }		

		
		$("#confirm").click(function(){
		$("#confirm").attr("disabled", true);
			var cost=$("#TotalCost").text();
			var id=<?php echo($_GET["id"]); ?>;
			var type=$("#deliveryOption").val();
			$.get('confirmBid.php',{cost:cost, vid:id,Type:type},function(data){
						alert($.trim(data));
				 
			});
		})
		
		
	
		
		
 
	
		function amountfuction(){
			var amountcheck=$("#deamount");
			 if(amountcheck.prop('checked')==true){
				 depositPrice=parseInt($("#depositCost").text());
				 var id=<?php echo($_GET["id"]); ?>;
				$.get('depositminimize.php',{vid:id},function(data){
						alert($.trim(data));
				 $("#checking").val(data);
					$("#deamount").prop('checked',false);
					var cc= $.trim($("#checking").val());
				if(cc=="ok"){
					 $("#mainCheck").show();
					
					var cost=parseInt($("#biddingCost").text());
					$("#TotalCost").text(value +cost-depositPrice).toFixed(2);
				}
			});
			 }else{
				 $("#mainCheck").hide();
				 var cost=parseInt($("#biddingCost").text());
					$("#TotalCost").text(cost+value).toFixed(2);
			 }
		}


</script>