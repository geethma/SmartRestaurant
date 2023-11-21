<?php 
include 'Controller.php';
include 'Modules/ClassLoading.php';
$con = new ClassLoading();
$CusPhoneDB='';
$CusNameDB='';
$CusEmailDB='';
$TableNoDB='';
?>
<!DOCTYPE html>
<html lang="en">
     <?php include 'public/head.php';?>
    <body>
  	 <?php include 'public/nav.php';?>
	 <?php 
	//----------- Creat Invoice Number 
    $Orders_count = $db_handle->runQuery("SELECT * FROM `tblorderheader`");
	if (!empty($Orders_count)) {
	    $InvoiceNo=count($Orders_count)+1;
	}else{
		$InvoiceNo=1;
	}
	
	//------- save data
	if(isset($_SESSION["Customer_Phone"])){
		$Customer_Phone=$_SESSION["Customer_Phone"];
		$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderheader` WHERE `CusPhone`='".$Customer_Phone."'  ORDER BY `tblorderheader`.`ID` DESC");
		if (!empty($Orders_result)) {
			foreach ($Orders_result as $row) {
				//$dbID=$row['ID']; 
				//$dbOrderNo=$row['OrderID']; 
				$CusPhoneDB=$row['CusPhone']; 
				$CusNameDB=$row['CusName']; 
				$CusEmailDB=$row['CusEmail']; 
				$TableNoDB=$row['TableNo']; 
			
			}
		}
	}
	?>
    <script>
	function myFunction(){
		window.location = "index.php";
	}
	
	
	
	var totale =0;
	function showEditBox(editobj,id) {
			$('#frmAdd').hide();
			$(editobj).prop('disabled','true');
			var currentMessage = $("#message_" + id + " .message-content").html();
			var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
			$("#message_" + id + " .message-content").html(editMarkUp);
		}
		function cancelEdit(message,id) {
			$("#message_" + id + " .message-content").html(message);
			$('#frmAdd').show();
		}
	function cartAction(action,product_code,Price) {
			
			var queryString = "";
			
			//console.log(Price);
		txttotal = $("#txttotal").val();
		
		
		
		console.log(totale);
		if(action != "") {
			switch(action) {
				case "add":
					queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val();
					
						
				break;
				case "remove":
					queryString = 'action='+action+'&code='+ product_code;
					
						
					
				break;
				case "empty":
					queryString = 'action='+action;
				break;
			}	 
		}
		jQuery.ajax({
		url: "ajax_action.php",
		data:queryString,
		type: "POST",
		success:function(data){
			$("#cart-item").html(data);
			if(action != "") {
				switch(action) {
					case "add":
					
					
						FPrice = parseFloat(Price);
						totale = parseFloat(totale);
						totale = totale+FPrice;
						var AllTot = 'Rs '+totale.toFixed(2);
						
						if(isNaN(AllTot)) {var AllTot = '00.00';}
						//$(".totale").text(AllTot);
					//	$("#add_"+product_code).hide();
					//	$("#added_"+product_code).show();
					
					console.log('add');
					break;
					case "remove":
						//$("#add_"+product_code).show();
					  //  $("#added_"+product_code).hide();
					  location.reload();
					  console.log('remove');
					  FPrice = parseFloat(Price);
						txttotal = parseFloat(txttotal);
						totale = txttotal-FPrice;
						var AllTot = 'Rs '+totale.toFixed(2);
						console.log(txttotal)
						console.log(FPrice)
						console.log(AllTot)
						//if(isNaN(AllTot)) {var AllTot = '00.00';}
						$(".totale").text(AllTot);
					break;
					case "empty":
					//$(".btnAddAction").show();
				   //  $(".btnAdded").hide();
				    // location.reload();
					window.location.href="index.php";
				     var AllTot = 'Rs 00.00';
	                 $(".totale").text(AllTot);
					 $(".cart-qt").text('0');
					 $(".cus_order_box").hide();
					 $(".cart-box-desktop").css("display", "none");
					 $(".cart-box-mobite").css("display", "none");
					break;
				}	 
			}
		},
		error:function (){}
		});
	}
	</script>

    <script>
	  //---------------- Transer 
	  $(document).ready(function (e) {
	   $('.sendbtn').click(function(){
	   	  
	   var cusName =$("#cusName").val();
	   var CusAddress =$("#CusAddress").val();
	   var CusPhone =$("#CusPhone").val();
	   var CusEmail =$("#CusEmail").val();
	   var InvoiceNo =$("#InvoiceNo").val();
	   var tableNo =$("#tableNo").val();
	   var Totale =$("#Totale").val();
	   	   
       var phonenocount = CusPhone.length;
	   
	   
	  // var onenumbercount =   phcount(CusPhone);
	  // console.log(onenumbercount);
	   if(cusName=='' || CusPhone=='' || tableNo==''){
		   
		   if(cusName==''){
			  //alert('Pleace enter Name'); 
			  $(".cusnamealert").fadeIn(100).html('<font color="red">Enter Name</font>');
              $(".cusnamealert").fadeIn().delay(2000).fadeOut();
			  $("#cusName").focus().css("border-bottom", "1px solid #f30909");
		   }
		   if(cusName!='' && CusPhone==''){
			   //alert('Pleace enter Phone');
			   $(".Cusphonealert").fadeIn(100).html('<font color="red">Enter Phone No</font>');
               $(".Cusphonealert").fadeIn().delay(2000).fadeOut();
			   $("#CusPhone").focus().css("border-bottom", "1px solid #f30909");
		   }
		   if(cusName!='' && CusPhone!='' && tableNo==''){
			   //alert('Pleace enter Table No');
			    $(".CusTablealert").fadeIn(100).html('<font color="red">Select Table No</font>');
               $(".CusTablealert").fadeIn().delay(2000).fadeOut();
			   $("#tableNo").focus().css("border-bottom", "1px solid #f30909");
		   }
		   	   
		   
	   }else{
	   
	    
	    if(phonenocount==10){
		 // console.log('yes 1'); 
	    
	    $(".order-details").hide();
	    $(".thanks").show();
	    var pass ='pass';
	    var dataString = 'OrderInsert='+ pass +'&cusName='+cusName+'&CusAddress='+CusAddress+'&CusPhone='+CusPhone+'&CusEmail='+CusEmail+'&InvoiceNo='+InvoiceNo+'&tableNo='+tableNo+'&Totale='+Totale;
		
		$.ajax({
			type: "POST",
			url: "process.php",
			data:dataString,
			cache: false,
			success: function(html){
			$("#Result_sendorder").html(html);
					location.reload();		
			}
		});
		
	   }else{
		       $(".Cusphonealert").fadeIn(100).html('<font color="red">Invalid Phone No</font>');
               $(".Cusphonealert").fadeIn().delay(2000).fadeOut();
			   $("#CusPhone").focus().css("border-bottom", "1px solid #f30909");
		       //console.log('No 2'); 
	    }
	   }
			
     });
    });
</script>






	     <section class="ftco-section2 ftco-degree-bg">
			<div class="container">
			<div class="row">
			    <div class="col-md-4 ftco-animate">
					<h4 class="head">Customer details</h4>
					<div class="line">
					<span class="lable">Name<span style="color:red">*</span></span>
					<?php 
					 if(isset($_SESSION['Username'])!=''){
						//echo $_SESSION['Username'];
						?>
						<span class="order_value">:&nbsp;<input type="text" id="cusName" class="cusName form-input2" disabled  value="<?php 	echo $_SESSION['Username']; ?>"><div class="cusnamealert"></div></span>
						<?php
					}else{
							?>
						<span class="order_value">:&nbsp;<input type="text" id="cusName" class="cusName form-input2"  value="<?php 	echo $CusNameDB; ?>"><div class="cusnamealert"></div></span>
						<?php
					}
					?>
					
					
					</div>
					<div style="display:none" class="line">
					<span class="lable">Address</span>
					<span class="order_value">:&nbsp;<input type="text" id="CusAddress" class="CusAddress form-input2"  ></span>
					</div>
					 <div class="line">
					<span class="lable">Phone<span style="color:red">*</span></span>
					<span class="order_value">:&nbsp;<input type="text" id="CusPhone" class="CusPhone form-input2" onkeypress="return isNumberKey(event)" maxlength="10"  value="<?php   if(isset($_SESSION['PhoneNo'])!=''){
						 echo $_SESSION['PhoneNo'];
					 }else{
						 echo $CusPhoneDB;
					 }
					 ?>"><div class="Cusphonealert"></div></span>
					</div>
					  <div class="line">
					<span class="lable">Email</span>
					<span class="order_value">:&nbsp;<input type="text" id="CusEmail" class="CusEmail form-input2"  value="<?php 
					 if(isset($_SESSION['Email'])!=''){
						 echo $_SESSION['Email'];
					 }else{
						 echo $CusEmailDB;
					 } ?>"></span>
					</div>
				</div>
				
				<div class="col-md-3 ftco-animate">
				 
					<div class="sidebar-box ftco-animate">
					  <div class="categories">
					 
						<input type="hidden" name="InvoiceNo" id="InvoiceNo" value="IN00<?php echo $InvoiceNo;?>">
						<li><a href="#" class="text-c2">Order No <span class="text-c2">IN00<?php echo $InvoiceNo;?></span></a></li>
						<li><a href="#" class="text-c2">Payment <span class="text-c2"><?php 
							if(isset($_SESSION["item_total"])){
								echo 'Rs '.number_format($_SESSION["item_total"],2);
							}else{
								echo 'Rs 00.00 ';
							}
							?></span></a></li>
						<li><a href="#" class="text-c2">Table No <span  class="text-c2">
						
						
							<select  id="tableNo" class="tableNo form-input2">
							<?php 
							if($TableNoDB!=''){
								?><option value="<?php echo $TableNoDB;?>"><?php echo $TableNoDB;?></option><?php
							}else{
								?><option value="">Select table No</option><?php
							}
							?>
							
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
							<div class="CusTablealert"></div>
						</span></a></li>
						
						
					  </div>
					</div>
				</div>
				<div class="col-md-1 ftco-animate">
				</div>
				
				<div class="col-md-4 ftco-animate">
							<?php 
							
				//if(isset($Total)){
					echo '<button class="sendbtn btn btn-white btn-outline-white ln-btn"> <a class="backtomenubtn" >Send Order</a></button>';
				//}else{
					//echo '<button  disabled class="sendbtn btn btn-white btn-outline-white ln-btn disable">Send Order</button>';
				//}
				?>		
				  
					   <a class="backtomenubtn" onclick="return myFunction();" ><div class="btn btn-white btn-outline-white ln-btn">Back to Menu</div></a>
					
				  
					
					  <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');"><div class="btn btn-white btn-outline-white ln-btn">Empty Cart</div></a>
					
		
				</div>
				
				
				
			</div>
			</div>
		</section>
		
		
		
		
	
		
		
<?php 
$item_total=0;
if(isset($_SESSION["cart_item"])){
?>
	<section class="ftco-section2 ftco-degree-bg cus_order_box">
        <div class="container">
		    <?php
				$No=1;	
				$subfoodcount=0;						
				foreach ($_SESSION["cart_item"] as $item){
					$SubID='';
					$SubFoodImage='';
					$subfoodcount='';
					$SubFoodName='';
					$SubfoodIDs='';
					$SubFoodID='';
					$SubID=$item["SubFood"];
					if($SubID!=''){
						$SubfoodIDs = explode (",", $SubID);  
						$subfoodcount =count($SubfoodIDs);
					}
					
					?>
					<div class="row checkout-row">
						<div class="col-md-1 sidebar ftco-animate">
						
						<a onClick="cartAction('remove','<?php echo $item["code"]; ?>','<?php echo $item["price"];?>')" class="btnRemoveAction cart-action"><span class="icon-trash"></span></a>
						</div>
						<div class="col-md-3 sidebar ftco-animate">
						
							<p>
								<img src="<?php echo $item["img"];?>" alt="" class="img-fluid">
							</p>
						</div>
						<div class="col-md-5 ftco-animate">
						 <h4 class="mb-3"><?php echo $item["code"]; ?> <?php echo $item["name"]; ?></h4>
						 
						 
						 	<?php 
									//echo  '<br>subid'.$SubID;
									$No=1;
									for ($x = 0; $x < $subfoodcount; $x++) {
										$SubFoodID = $SubfoodIDs[$x];
										
										$Result_FoodItems2=$con->Select_FoodItemsMain2($SubFoodID);
										//print_r ($Result_FoodItems2);
										if(!empty($Result_FoodItems2)) {
											foreach ($Result_FoodItems2 as $row) {
												$SubID=$row['ID'];
												$SubFoodName=$row['FoodName'];
												$SubFoodImage=$row['FoodImage'];
												//$SubPrice=$row['Price'];
												//$SubFoodType=$row['SubFoodType'];
												
												?>
								                 <p class="mb-3 text"><?php echo $No++;?>. <?php echo $SubFoodName;?></p>												
												<?php
											 }
										}
									}
									
									
									
									?>
						 
						  
						
						</div>
						 
						<div class="col-md-3 ftco-animate">
							<div class="sidebar-box ftco-animate">
							  <div class="categories">
								
								<li><a href="#" class="text-c2">Price <span class="text-c2">Rs <?php echo $item["price"]; ?></span></a></li>
								<li><a href="#" class="text-c2">Qty <span  class="text-c2"><?php echo $item["quantity"]; ?></span></a></li>
								
								<li><a href="#"  class="text-c2">Tatal <span  class="text-c2"> Rs <?php echo $item["price"]*$item["quantity"]; ?></span></a></li>
								<li><a href="#"  class="text-c2">Discount <span  class="text-c2">00.00</span></a></li>
							  </div>
							</div>
						
						
						
						  
						</div>

					</div>
			
					<?php
						$item_total += ($item["price"]*$item["quantity"]);		
				}
			
                        $Discount=0;
					    $Total = $item_total-$Discount;
						$_SESSION["item_total"]=$Total;
							?>
							
							<input type="hidden" name="txttotal" value="<?php echo $Total;?>" id="txttotal">
							
							
							
				<div class="row checkout-row">
					<div class="col-md-9 sidebar ftco-animate">
					</div>
					<div class="col-md-3 sidebar ftco-animate">
					    <div class="sidebar-box ftco-animate">
							<div class="categories">
								
								<li><a href="#" class="text-c2">Sub Totale <span class="text-c2">Rs <?php if(isset($item_total)){echo number_format($item_total,2);}else{echo '00.00';} ?></span></a></li>
								<input type="hidden" name="subTotale" value="<?php if(isset($item_total)){echo number_format($item_total,2);}else{echo '00.00';} ?>" id="subTotale">
								
								
								
									
								<li><a href="#" class="text-c2">Discount <span  class="text-c2"><?php if(isset($Discount)){echo number_format($Discount,2);}else{ echo '00.00';}?></span></a></li>
								
								<li><a href="#"  class="text-c2">Totle <span  class="text-c2"> Rs <?php if(isset($Total)){ echo number_format($Total,2); }else{echo '00.00';} ?></span></a></li>
								<input type="hidden" name="Totale" value="<?php if(isset($Total)){echo number_format($Total,2);}else{echo '00.00';} ?>" id="Totale">
								
								
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>

<?php 

}
?>



<?php
//---------------------------------
if(isset($_SESSION["Customer_Phone"])){
	$Customer_Phone=$_SESSION["Customer_Phone"];
	?>
	<section class="ftco-section2 ftco-degree-bg">
		<div class="container">
			<?php 
			$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderheader` WHERE `CusPhone`='".$Customer_Phone."'  ORDER BY `tblorderheader`.`ID` DESC");
			if (!empty($Orders_result)) {
				foreach ($Orders_result as $row) {
					//$dbID=$row['ID']; 
					$dbOrderNo=$row['OrderID']; 
					$CusPhone=$row['CusPhone']; 
					$Status=$row['Status']; 
					$Status2=$row['Status']; 
					?>
					<div class="row checkout-row">
						<div class="col-md-4 sidebar ftco-animate">
						<h4>Invoice No : <?php echo $dbOrderNo;?></h4>
					    </div>
						<div class="col-md-7 sidebar ftco-animate">
						    <div class="thanks <?php echo $Status;?>">
					  		<span >Thanks You , Your order is <?php echo $Status;?>.</span>
						</div>
					    </div>
						
						<div class="col-md-1 sidebar ftco-animate">
						   	  <?php 
							  if($Status2=='Pendding'){
								  ?>
								   <a href="Order_delete.php?DeleteID=<?php echo $dbOrderNo;?>&status=Delete"><button class="btnclose btn btn-white btn-outline-white ln-btn">Delete</button></a>
								  <?php
							  }elseif($Status2=='Delivering'){
								   ?>
								   <a href="Order_delete.php?DeleteID=<?php echo $dbOrderNo;?>&status=Done"><button class="btnclose btn btn-white btn-outline-white ln-btn">Done</button></a>
								  <?php
							  }
							  ?>
					    </div>
						
				
							 
						
					</div>
					<?php
					$No=1;
					
					$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderitem` WHERE `OrderID`='".$dbOrderNo."'");
					if (!empty($Orders_result)) {
						foreach ($Orders_result as $row) {
							$subfoodcount='';
							$SubfoodID='';
							$dbFoodItemID='';
							$FoodCode='';
							$SubfoodIDs='';
							$dbFoodItemID=$row['ID']; 
							$FoodCode=$row['FoodCode']; 
							$Name=$row['Name']; 
							$Price=$row['Price']; 
							$Qty=$row['Qty']; 
							$Image=$row['Image']; 
							$SubfoodID=$row['SubfoodID']; 
							
							if($SubfoodID!=''){
								$SubfoodIDs = explode (",", $SubfoodID);  
								$subfoodcount =count($SubfoodIDs);
							}
					        ?>
							<div class="row checkout-row">
								<div class="col-md-4 sidebar ftco-animate">
								
									<p>
										<img src="<?php echo $row['Image'];?>" alt="" class="img-fluid">
									</p>
								</div>
								<div class="col-md-5 ftco-animate">
								 <h4 class="mb-3"><?php echo $row['FoodCode']; ?> <?php echo $row['Name']; ?></h4>
								 
								 
									<?php 
											//echo  '<br>subid'.$SubfoodID;
												$No=1;
											for ($x = 0; $x < $subfoodcount; $x++) {
												$SubFoodID = $SubfoodIDs[$x];
												
												$Result_FoodItems2=$con->Select_FoodItemsMain2($SubFoodID);
												//print_r ($Result_FoodItems2);
												if(!empty($Result_FoodItems2)) {
													foreach ($Result_FoodItems2 as $row) {
														$SubID=$row['ID'];
														$SubFoodName=$row['FoodName'];
														$SubFoodImage=$row['FoodImage'];
														//$SubPrice=$row['Price'];
														//$SubFoodType=$row['SubFoodType'];
														
														?>
														 <p class="mb-3 text"><?php echo $No++;?>. <?php echo $SubFoodName;?></p>												
														<?php
													 }
												}
											}
											
											
											
											?>
								 
								  
								
								</div>
								 
								<div class="col-md-3 ftco-animate">
									<div class="sidebar-box ftco-animate">
									  <div class="categories">
										
										<li><a href="#" class="text-c2">Price <span class="text-c2">Rs <?php echo $row['Price']; ?></span></a></li>
										<li><a href="#" class="text-c2">Qty <span  class="text-c2"><?php echo $row['Qty']; ?></span></a></li>
										
										<li><a href="#"  class="text-c2">Tatal <span  class="text-c2"> Rs <?php echo $row['Price']*$row['Qty']; ?></span></a></li>
										<li><a href="#"  class="text-c2">Discount <span  class="text-c2">00.00</span></a></li>
									  </div>
									</div>
								
								
								
								  
								</div>

							</div>
							<?php
					     }
					}
					//-------------------  end      
			    }
			}
			?>	
		</div>
	</section>
	<?php
}
?>

 <?php include 'public/footer.php';?>
 <?php include 'public/scripts.php';?>
 
    
  </body>
</html>