<?php 
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();

include 'Modules/ClassLoading.php';
//include 'ClassAdmin.php';
$con = new ClassLoading();
//$conAdmin = new ClassAdmin();

$dbFoodName='';
$dbPrice='';
$dbMenuItemNo='';
$dbFoodType='';
$dbFoodCatID='';
$FoodImage='';
$SubFoodType='';
$dbFoodID='';
$Description='';
$FoodDescription='';
$Qty=1;

if(isset($_GET["FoodID"])){
	$FoodID = $_GET["FoodID"];
	$FoodItem_edit = $db_handle->runQuery("SELECT * FROM `tblfoodmenuitem` WHERE `ID`='".$FoodID."'");
	if (!empty($FoodItem_edit)) {
		foreach ($FoodItem_edit as $row) {
			
			$dbFoodID=$row['ID']; 
			$dbFoodName=$row['FoodName']; 
			$dbPrice=$row['Price']; 
			$dbMenuItemNo=$row['MenuItemNo']; //FoodCode 
			$dbFoodType=$row['FoodType']; 
			$dbFoodCatID=$row['FoodCatID']; 
			$FoodImage=$row['FoodImage']; 
			$SubFoodType=$row['SubFoodType']; 
			$Qty=$row['Qty']; 
			$FoodDescription=$row['Description']; 
	
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'public/head.php';?>
    <body>
  	<?php include 'public/Admin_nav.php'?>
    <!-- END nav -->

	<script>
    $(document).ready(function (e) {
	 	$("#SubFoodTypeS").hide();
        $("#Foodtype").change(function(){
	    var Foodtype = $("#Foodtype").val();
		if(Foodtype=='2'){
			$(".Main").hide();
			$(".Sub").show();
			$("#SubFoodTypeS").show();
		}else{
			$(".Main").show();
			$(".Sub").hide();
			$("#SubFoodTypeS").hide();

		}
		$("#FoodCategory").val("");
	    //alert(Foodtype);
	});
		
	    //FoodCategory
	
	    $("#FoodCategory").change(function(){
	    var FoodCategoryID = $("#FoodCategory").val();
	    var Foodtype = $("#Foodtype").val();
		
		// if(FoodCategoryID=='1' && Foodtype=='1'){
			// Foodtype='M';
		// }else if(FoodCategoryID=='1' && Foodtype=='2'){
			// Foodtype='MS';
		// }
		var dataString = 'FoodCategoryID='+ FoodCategoryID +'&Foodtype='+ Foodtype ;
	    $.ajax({
			type: "POST",
			url: "FoodCodeProcess.php",
			data:dataString,
			cache: false,
			success: function(html){
			$("#Result_FoodCode").html(html);
			var created_foodcode=$("#created_foodcode").val();
			console.log(created_foodcode);
			$("#Foodcode").val(created_foodcode);
			}
		});
	  
		
	});
	
	
	
});
</script>
<style>
.form-control {
    height: 40px !important;
    background: transparent !important;
    color: rgba(255, 255, 255, 0.9) !important;
    font-size: 16px;
    border-radius: 0px;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: transparent !important;
    border: 1px solid rgba(255, 255, 255, 0.08) !important;
    padding-right: 0;
    padding-left: 0;
}
label {
    display: inline-block;
    margin-bottom: 0.5rem;
    color: white;
}
div#message {
    color: #5df341;
	 font-family: "Josefin Sans", Arial, sans-serif;
}

span#success {
    color: #f0ff00;
	 font-family: "Josefin Sans", Arial, sans-serif;
}
</style>
	  
    <section class="ftco-about d-md-flex">
        <div id="Result_FoodCode"></div> 
           <div class="one-half ftco-animate">
			<h3 class="mb-3">Food Items</h3>
			<form id="uploadimage" action="" autocomplete="off" method="post" enctype="multipart/form-data">
			
			    <input type="hidden" value="<?php echo $dbFoodID;?>" name="FoodID" id="FoodID">
			    <div class="form-group">
					<label for="exampleFormControlInput1">Food Type<span style="color:red">*</span></label>
					<select name="Foodtype" id="Foodtype"  class="form-control">
					<?php 
					if($dbFoodType!=''){
						if($dbFoodType=='1'){
							?>
							<option value="1">Main Food</option>
							 <option value="2">Sub Food</option>
							<?php
						}else{
							?>
							<option value="2">Sub Food</option>
							<option value="1">Main Food</option>
							<?php
						}
					}else{
						?>
						<option value="1">Main Food</option>
					    <option value="2">Sub Food</option>
						<?php
					}
					
					?>
					
					</select>
					
			    </div>
				<div class="form-group"  id="SubFoodTypeS">
				    <label for="exampleFormControlInput1">Sub Food Type<span style="color:red">*</span>(There are two type sub foods eg:rice and currey)</label>
				   	<select name="SubFoodType" id="SubFoodType" class="form-control">
					<?php 
					if($SubFoodType!=''){
						if($SubFoodType=='1'){
							?>
							<option value="1">First line</option>
					        <option value="0">Second line</option>
							<?php
							
						}else{
							?>
							<option value="0">Second line</option>
							<option value="1">First line</option>
					        
							<?php
						}
					}else{
						?>
						<option value="1">First line</option>
						<option value="0">Second line</option>
						<?php
					}
					
					?>
					
					</select>
			    </div>
				
			    <div class="form-group">
					<label for="exampleFormControlInput1">Food Category<span style="color:red">*</span></label>
					<select name="FoodCategory" id="FoodCategory"  class="form-control">
					
					
					<?php 
					
					if($dbFoodCatID!=''){
						$Result_FoodCategory2=$con->Select_FoodCategory2($dbFoodCatID);
							if(!empty($Result_FoodCategory2)) {
								foreach ($Result_FoodCategory2 as $row) {
									
									$CategoryID=$row['ID'];
									$CategoryNo=$row['CategoryNo'];
									$Description=$row['Description'];
									
									?>
									<option value="<?php echo $CategoryID?>"><?php echo $Description?></option>
									<?php
								}
							}
							$Result_FoodCategory=$con->Select_FoodCategory();
							if(!empty($Result_FoodCategory)) {
								foreach ($Result_FoodCategory as $row) {
									
									$CategoryID=$row['ID'];
									$CategoryNo=$row['CategoryNo'];
									$Description=$row['Description'];
									
									?>
									<option value="<?php echo $CategoryID?>"><?php echo $Description?></option>
									<?php
								}
							}
											
					}else{
						$Result_FoodCategory=$con->Select_FoodCategory();
						?><option value="">Select Category</option><?php
						if(!empty($Result_FoodCategory)) {
							foreach ($Result_FoodCategory as $row) {
								
								$CategoryID=$row['ID'];
								$CategoryNo=$row['CategoryNo'];
								$Description=$row['Description'];
								
								?>
								<option value="<?php echo $CategoryID?>"><?php echo $Description?></option>
								<?php
							}
						}
					}
					
					
				
					
					
					
					
					?>
					</select>
					<div class="FoodCategoryA"></div>
			   </div>
			    <div class="form-group">
				<label for="exampleFormControlInput1">Qty<span style="color:red">*</span></label>
				<input type="text" class="form-control" onkeypress="return isNumberKey(event)" maxlength="5" value="<?php echo $Qty;?>" name="qty" id="qty" placeholder="Food Qty">
				<div class="qtyA"></div>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlInput1">Food Code<span style="color:red">*</span></label>
				<input type="text" class="form-control" value="<?php echo $dbMenuItemNo;?>" name="Foodcode" id="Foodcode" placeholder="Food Code">
				<div class="FoodcodeA"></div>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlInput1">Food Name<span style="color:red">*</span></label>
				<input type="text" class="form-control" value="<?php echo $dbFoodName;?>" name="FoodName" id="FoodName" placeholder="Food Name">
				<div class="FoodNameA"></div>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlInput1">Food Price<span style="color:red">*</span></label>
				<input type="text" class="form-control" onkeypress="return isNumberKey(event)" maxlength="5" value="<?php echo $dbPrice;?>" name="FoodPrice" id="FoodPrice" placeholder="Food Price">
				<div class="FoodPriceA"></div>
			  </div>
			  <div class="form-group">
				<label for="exampleFormControlFile1">Food Image<span style="color:red">*</span></label>
				<input type="file" name="file" value="<?php echo $FoodImage;?>" id="file"  class=" btn btn-primary" />
				<input type="text" style="display:none" name="imagename" id="imagename" value="<?php echo $FoodImage;?>">
				<div class="fileA"></div>
			  </div>
			 	  
			   <div class="form-group">
				<label for="exampleFormControlInput1">Description<span style="color:red">*</span></label>
				   <textarea class="form-control w-100 input-border" name="Description" id="Description" cols="7" rows="5"
                                 placeholder="Enter Description" ><?php echo $FoodDescription;?></textarea>
				<div class="DescriptionA"></div>
			  </div>
			  
			  <div class="form-group">
			   <input type="submit" value="Upload" class="submit btn btn-primary" />
				<div id="message"></div>
			  </div>
			</form>
	</div>
	
	
	
	
	   <div class="one-half ftco-animate">
	
		
		<img src="<?php echo $FoodImage;?>" class="update-img">
		
			
	</div>
    
    </section>
	
	
	<script>
	var file='';
	$(document).ready(function (e) {
	
    $("#uploadimage").on('submit',(function(e) {
	///Foodtype
	var FoodCategory = $("#FoodCategory").val();
	var qty = $("#qty").val();
	var Foodcode = $("#Foodcode").val();
	var FoodName = $("#FoodName").val();
	var FoodPrice = $("#FoodPrice").val();
	var filename = $("#file").val();
	var imagename = $("#imagename").val();
	var FoodID = $("#FoodID").val();
	var Description = $("#Description").val();
	
	if(filename!=''){
		file=filename;
	}else{
		if(imagename!=''){
			file=imagename;
		}
	}
	
	// if(FoodID!=''){
		// if(imagename==''){
			// if(filename==''){
				// file='';
			// }else{
				// file=filename;
			// }
				
		// }else{
			// if(filename==''){
					// file=imagename;
			// }else{
				// file=filename;
			// }
			
		// }
	// }else{
		// if(filename==''){
			// file='';
		// }else{
			// file=filename;
		// }
	// }
	//alert(file);
	e.preventDefault();

	$("#message").empty();
	$('#loading').show();
	
	if(FoodCategory=='' || qty=='' || Foodcode=='' || FoodName=='' || FoodPrice=='' || file=='' || Description==''){
			if(FoodCategory==''){
				$(".FoodCategoryA").fadeIn(100).html('<font color="red">Select Food Category.</font>');
				$(".FoodCategoryA").fadeIn().delay(2000).fadeOut();
				document.getElementById('FoodCategory').focus();
			}
			if(FoodCategory!='' &&  qty==''){
				$(".qtyA").fadeIn(100).html('<font color="red">Enter Quntity</font>');
				$(".qtyA").fadeIn().delay(2000).fadeOut();
				document.getElementById('qty').focus();
			}
	        if(FoodCategory!='' &&  qty!='' &&  Foodcode==''){
				$(".FoodcodeA").fadeIn(100).html('<font color="red">Food Code</font>');
				$(".FoodcodeA").fadeIn().delay(2000).fadeOut();
				document.getElementById('Foodcode').focus();
			}
			if(FoodCategory!='' &&  qty!='' &&  Foodcode!='' && FoodName==''){
				$(".FoodNameA").fadeIn(100).html('<font color="red">Enter Food Name</font>');
				$(".FoodNameA").fadeIn().delay(2000).fadeOut();
				document.getElementById('FoodName').focus();
			}
			if(FoodCategory!='' &&  qty!='' &&  Foodcode!='' && FoodName!='' && FoodPrice==''){
				$(".FoodPriceA").fadeIn(100).html('<font color="red">Enter Price</font>');
				$(".FoodPriceA").fadeIn().delay(2000).fadeOut();
				document.getElementById('FoodPrice').focus();
			}
			if(FoodCategory!='' &&  qty!='' &&  Foodcode!='' && FoodName!='' && FoodPrice!='' && file==''){
				$(".fileA").fadeIn(100).html('<font color="red">Choose Food Image</font>');
				$(".fileA").fadeIn().delay(2000).fadeOut();
				document.getElementById('file').focus();
			}
			if(FoodCategory!='' &&  qty!='' &&  Foodcode!='' && FoodName!='' && FoodPrice!='' && file!='' && Description==''){
				$(".DescriptionA").fadeIn(100).html('<font color="red">Enter Description</font>');
				$(".DescriptionA").fadeIn().delay(2000).fadeOut();
				document.getElementById('Description').focus();
			}
	
	
	
	}else{
		
		//console.log('aaaa');
		$.ajax({
	url: "FoodItemsProcess.php", // Url to which the request is send
	type: "POST",             // Type of request to be send, called as method
	data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
	contentType: false,       // The content type used when sending data to the server.
	cache: false,             // To unable request pages to be cached
	processData:false,        // To send DOMDocument or non processed data file it is set to false
	success: function(data)   // A function to be called if request succeeds
	{
		$('#loading').hide();
		$("#message").html(data);
		
		 document.getElementById('FoodCategory').value='';
		 document.getElementById('qty').value='';
		 document.getElementById('Foodcode').value='';
		 document.getElementById('FoodName').value='';
		 document.getElementById('FoodPrice').value='';
		 document.getElementById('file').value='';
		 document.getElementById('Description').value='';
	}
	});
	}

	

	
	
	
	
	
	
	}));



// Function to preview image after validation
$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};

});
	
	</script>
<?php    include 'FoodItemsAjax.php'; ?>



 <?php include 'public/footer.php';?>
 <?php include 'public/scripts.php';?>
  </body>
</html>