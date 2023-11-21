<?php 
include 'Controller.php';
include 'Modules/ClassLoading.php';
$con = new ClassLoading();
$categoryID='';
$txtsearch='';
if(isset($_GET['categoryID'])){
$categoryID=$_GET['categoryID'];
}

if(isset($_GET['searchbtn'])){
$txtsearch=$_GET['txtsearch'];
}

if(isset($_GET['categoryID'])){
$categoryID=$_GET['categoryID'];
}



?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'public/head.php';?>
	<script>

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
ItemQty=0;
//btnAdded2
function cartAction2(action,product_code,Price) {
	
	//console.log('aaaa');
	var selected = new Array();

	 //console.log(selected);
	var favorite = [];
	$.each($("input[name='mainID"+product_code+"']:checked"), function(){
		favorite.push($(this).val());
	});
//	alert("My favourite sports are: " + favorite.join(", "));
	
	var SubFood = favorite.join(", ");
    console.log(favorite);
	
	
	ItemQty = ItemQty + 1;
	
    //console.log('aaaaa - '+ ItemQty);
	var queryString = "";
	$(".cart-box").show();
	console.log(Price);
	FPrice = parseFloat(Price);
	totale = parseFloat(totale);
	totale = totale+FPrice;
	var AllTot = 'Rs '+totale.toFixed(2);
	$(".totale").text(AllTot);
	$(".cart-qt").text(ItemQty);
	console.log(totale);
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val()+'&SubFood='+SubFood;
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
				//	$("#add_"+product_code).hide();
				//	$("#added_"+product_code).show();
				break;
				case "remove":
					//$("#add_"+product_code).show();
				//	$("#added_"+product_code).hide();
				break;
				case "empty":
				//	$(".btnAddAction").show();
					//$(".btnAdded").hide();
				break;
			}	 
		}
	},
	error:function (){}
	});
}



function cartAction(action,product_code,Price,SubFood) {
	
	ItemQty = ItemQty + 1;
	
    //console.log('aaaaa - '+ ItemQty);
	var queryString = "";
	$(".cart-box").show();
	console.log(Price);
	FPrice = parseFloat(Price);
	totale = parseFloat(totale);
	totale = totale+FPrice;
	var AllTot = 'Rs '+totale.toFixed(2);
	$(".totale").text(AllTot);
	$(".cart-qt").text(ItemQty);
	console.log(totale);
	if(action != "") {
		switch(action) {
			case "add":
				queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val()+'&SubFood='+SubFood;
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
				//	$("#add_"+product_code).hide();
				//	$("#added_"+product_code).show();
				break;
				case "remove":
					//$("#add_"+product_code).show();
				//	$("#added_"+product_code).hide();
				break;
				case "empty":
				//	$(".btnAddAction").show();
					//$(".btnAdded").hide();
				break;
			}	 
		}
	},
	error:function (){}
	});
}

$( document ).ready(function() {
    $(".single_blog_img").click(function() {
        $(".menu_fixed").css("display", "none");
		//console.log("asadasdasd");
    });
	
	
	
	
	//checkboxClick
	$(".addtocart-box").click(function() {
	  var MainFoodID =$(this).attr('id');		
	  console.log(MainFoodID);
	  
		var selected = new Array();

			// //Reference the CheckBoxes and insert the checked CheckBox value in Array.
			// $(".checkboxsubFoodid-2 input[type=checkbox]:checked").each(function () {
				// selected.push(this.value);
			// });
  
           //console.log(selected);
		    var favorite = [];
            $.each($("input[name='mainID"+MainFoodID+"']:checked"), function(){
                favorite.push($(this).val());
            });
            alert("My favourite sports are: " + favorite.join(", "));
		   console.log(favorite);
 
	});

	
	
	
	
});


</script>
<style>

.modal-backdrop {
    position: relative;
    
   
}
.bg-secondary {
    background-color: #000000f5 !important;
}
.modal {
    position: fixed;
    top: 45px;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1050;
    display: none;
    overflow: hidden;
    outline: 0;
}
.modal-content {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgb(208, 164, 86);
    border-radius: 0.3rem;
    outline: 0;
}

@media only screen and (max-width: 768px) {
	.modal {
		position: fixed;
		top: 58px;
		right: 0;
		bottom: 0;
		left: 0;
		z-index: 1050;
		display: none;
		overflow: hidden;
		outline: 0;
	}
}
</style>
  <body>
 
  <?php include 'public/nav.php'?>
    <!-- END nav -->
<?php 
 if($categoryID=='1'){
	 ?><section class="home-slider owl-carousel img cust" style="background-image: url(images/Menu_banner_1.jpg);"><?php
 }elseif($categoryID=='7'){
	  ?><section class="home-slider owl-carousel img cust" style="background-image: url(images/Menu_banner_7.jpg);"><?php
 }elseif($categoryID=='5'){
	  ?><section class="home-slider owl-carousel img cust" style="background-image: url(images/Menu_banner_5.jpg);"><?php
 }elseif($categoryID=='6'){
	 ?><section class="home-slider owl-carousel img cust" style="background-image: url(images/Menu_banner_6.jpg);"><?php
 }elseif($categoryID=='8'){
	 ?><section class="home-slider owl-carousel img cust" style="background-image: url(images/Menu_banner_8.jpg);"><?php
 }elseif($categoryID=='4'){
	  ?><section class="home-slider owl-carousel img cust" style="background-image: url(images/Menu_banner_4.jpg);"><?php
 }
?>
    
    <div class="slider-item">
      	<div class="overlay"></div>
        <div class="container">
		
		    <div class="col-md-3 sidebar ftco-animate "></div>
		    <div class="col-md-6 sidebar ftco-animate ">
				<div class="sidebar-box search-box">
					  <form  class="search-form" action="Search.php" autocomplete="off">
						<div class="form-group">
							<div class="icon">
							<button type="submit" name="searchbtn" class="searchbtn">  <span class="icon-search"></span></button>
						    </div>
						  <input type="text" name="txtsearch" class="form-control" placeholder="Search...">
						  <input type="hidden" name="categoryID" class="form-control" value="<?php echo $categoryID;?>">
						</div>
					  </form>
				</div>
            </div>
			 <div class="col-md-3 sidebar ftco-animate "></div>
		</div>
    </div>

      

  
    </section>

<div id="cart-item"></div>

    <section class="ftco-menu">
    	<div class="container-fluid">
    		<div class="row d-md-flex">
	    		
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		       <?php //echo 'dddd - '.$txtsearch;?>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
						   <?php 
						  
						   //$FoodType=1;
						   $SubIDs='';
						   $SubfoodIDs='';
						    $Result_FoodItems=$con->Select_FoodItemsMain($categoryID,1);
							if(!empty($Result_FoodItems)) {
								foreach ($Result_FoodItems as $row) {
									$ID=$row['ID'];
									$MenuItemNo=$row['MenuItemNo'];
									$FoodName=$row['FoodName'];
									$FoodImage=$row['FoodImage'];
									$Price=$row['Price'];
									$SubIDs=$row['SubID'];
									$Description=$row['Description'];
									$subfoodcount='';
									//Sub Food type
									if($SubIDs!=''){
										$SubfoodIDs = explode (",", $SubIDs);  
										$subfoodcount =count($SubfoodIDs);
							        }
									
									?>
									<div class="col-md-3 text-center">
										<div class="menu-wrap">
				<a href="#" class="menu-img img mb-4" style="background-image: url(<?php echo $FoodImage;?>);" data-toggle="modal" data-target="#modal-<?php echo $ID; ?>"></a>
											<div class="text">
												<h4><a href="#"><?php echo $FoodName;?></a></h4>
												
												<p class="description"><?php echo $Description;?></p>
												<span class="item-qty" style="display:none"><span><?php echo $Price;?></span> x <span class="Item-qty-<?php echo $ID;?>">0</span> = <span class="Item-price-<?php echo $ID;?>">0</span></span>
												<p class="price"><span>LKR <?php echo $Price;?></span></p>
											
												
												
											
																<input type="hidden" class="fooditem-qty" id="qty_<?php echo $ID; ?>" name="quantity" value="1" size="2" />
																<?php
																	$in_session = "0";
																	if(!empty($_SESSION["cart_item"])) {
																		$session_code_array = array_keys($_SESSION["cart_item"]);
																		if(in_array($ID,$session_code_array)) {
																			$in_session = "1";
																		}
																	}
																?>
																	<p>
																<input type="button" id="add_<?php echo $ID; ?>" value="Add to cart" class="btn btn-white btn-outline-white" onClick = "cartAction('add','<?php echo $ID; ?>','<?php echo $Price;?>','<?php echo $SubIDs;?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> /></p>
																<input type="button" id="added_<?php echo $ID; ?>" value="Added" class="btnAdded" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
																
												
											</div>
										</div>
									</div>
									
									
									
									
									
									<div class="modal fade" id="modal-<?php echo $ID; ?>">
									<div class="modal-dialog">
									  <div class="modal-content bg-secondary">
										<div class="modal-header">
										  <h2 class="h2-mobile"><?php echo $MenuItemNo;?>  <?php echo $FoodName;?> <span class="head-price">Rs <?php  echo number_format($Price,2); ?></span></h2>
										  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span></button>
										</div>
										<div class="modal-body">
										
										<div class="row">
		       							    <div class="col-md-4">
												<p>
												  <img src="<?php echo $FoodImage;?>" alt="" class="img-fluid">
												</p>
												</div>				
												   
													<div class="col-md-8">
													<p><?php echo $Description;?></p>
													<?php 
													$SubID='';
													$SubFoodName='';
													$SubFoodImage='';
													$SubPrice='';

													$SubFoodID='';
													for ($x = 0; $x < $subfoodcount; $x++) {
														$SubFoodID = $SubfoodIDs[$x];
														//echo  '<br>subid'.$SubFoodID;
														$Result_FoodItems2=$con->Select_FoodItemsMain2($SubFoodID);
														//print_r ($Result_FoodItems2);
														if(!empty($Result_FoodItems2)) {
															foreach ($Result_FoodItems2 as $row) {
																$SubID=$row['ID'];
																$SubFoodName=$row['FoodName'];
																$SubFoodImage=$row['FoodImage'];
																$SubPrice=$row['Price'];
																$SubFoodType=$row['SubFoodType'];
																
																?>
																
														<div class="pricing-entry d-flex ftco-animate">
															<div class="img" style="background-image: url(<?php echo $SubFoodImage;?>);"></div>
															<div class="desc pl-3">
																<div class="d-flex text align-items-center">
																	<h3><span><?php echo $SubFoodName; ?></span></h3>
																	<span class="price"><?php echo number_format($SubPrice,2); ?></span>
																</div>
																<div class="d-block">
																	<p><input type="checkbox" name="mainID<?php echo $ID; ?>"   value="<?php echo $SubID;?>" checked> Remove</p>
																</div>
															</div>
														</div>
																<?php
															}
														}
													}
																					
													?>
													</div>
													</div>
        



								
										</div>
										<div class="modal-footer justify-content-between">
										  <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
										
										  	<input type="button" id="add2_<?php echo $ID; ?>" value="Add to cart" class="btn btn-white btn-outline-light" onClick = "cartAction2('add','<?php echo $ID; ?>','<?php echo $Price;?>')" <?php if($in_session != "0") { ?>style="display:none" <?php } ?> /></p>
																<input type="button" id="added2_<?php echo $ID; ?>" value="Added2" class="btnAdded2" <?php if($in_session != "1") { ?>style="display:none" <?php } ?> />
										  
										</div>
									  </div>
									  <!-- /.modal-content -->
									</div>
									<!-- /.modal-dialog -->
								  </div>
								  <!-- /.modal -->
									<?php
									
							    }    
							}
						   
						   ?>
						
		 
 
							
		              	</div>
		              </div>

		              

		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>

  
		
		
 <?php include 'public/footer.php';?>
 <?php include 'public/scripts.php';?>
    
  </body>
</html>