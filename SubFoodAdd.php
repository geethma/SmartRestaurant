<?php 
//include 'Controller.php';
include 'Modules/ClassLoading.php';
$con = new ClassLoading();
$FoodID='';
$FoodcatID='';
$FoodType=2;
$FoodID=$_GET["FoodID"];
$FoodcatID=$_GET["FoodcatID"];
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'public/head.php';?>
    <body>
  	<?php include 'public/Admin_nav.php'?>
		<style>
	
button.btn.btn-info.remove {
    background: #f53e2f;
    /* top: -12px; */
	    position: absolute;
    top: 86px;
}	
.column {
    width: 49.2%;
   
    margin: 1px;
}
.column1 {
    width: 98.6%;
    /* background: #e29e5b8f; */
    margin: 1px;
    border: 1px solid;
}
span.menuimg img {
    width: 50px;
    height: 50px;
    border: 2px solid #aba4a4;
}
.col-6.box-6{
    border: 1px solid #c3b5b5;
    border-radius: 4%;
	height: 450px;
	  font-family: "Josefin Sans", Arial, sans-serif;
}
.col-5.box-5 {
    border: 1px solid #c3b5b5;
    border-radius: 4%;
	  font-family: "Josefin Sans", Arial, sans-serif;
}	
	
    img.imgsize2 {
		height: 100px;
		width: auto;
	}
.subimg {
    display: inline-block;
    height: 37px;
    width: 153px;
    overflow: hidden;
    margin-top: 5px;
}

img.orderimg {
    max-width: 100%;
}

button.sendbtn {
    background-color: #ec835a;
    padding: 3px 46px 3px 55px;
    font-size: medium;
    font-family: inherit;
}
.container2 {
    margin-left: 16px;
    margin-right: 16px;
}
button.btn.btn-warning.addbtn.mb-2 {
    background-color: #ff8642c7;
}
body {
    padding-top: 0px;
}
input.ads_Checkbox {
    top: 13px;
    /* width: 17px; */
    position: absolute;
}



.checkbox input[type="checkbox"] {
    opacity: 0;
}

.checkbox label {
    position: relative;
    display: inline-block;
    
    /*16px width of fake checkbox + 6px distance between fake checkbox and text*/
    padding-left: 22px;
}

.checkbox label::before,
.checkbox label::after {
    position: absolute;
    content: "";
    
    /*Needed for the line-height to take effect*/
    display: inline-block;
}

/*Outer box of the fake checkbox*/
.checkbox label::before{
    height: 16px;
    width: 16px;
    
    border: 1px solid;
    left: 0px;
    
    /*(24px line-height - 16px height of fake checkbox) / 2 - 1px for the border
     *to vertically center it.
     */
    top: 3px;
}

/*Checkmark of the fake checkbox*/
.checkbox label::after {
    height: 5px;
    width: 9px;
    border-left: 2px solid;
    border-bottom: 2px solid;
    
    transform: rotate(-45deg);
    
    left: 4px;
    top: 7px;
}

/*Hide the checkmark by default*/
.checkbox input[type="checkbox"] + label::after {
    content: none;
}

/*Unhide on the checked state*/
.checkbox input[type="checkbox"]:checked + label::after {
    content: "";
}

footer {
    position: fixed;
    height: 100px;
    bottom: 0;
    width: 100%;
}
button.btn.btn-info.transer {
    position: absolute;
    top: 143px;
    background-color: #ff8642;
}
.lablel_selected {
   /* color: #ea680b;
    font-weight: 800;
    font-size: 16px;*/
	  font-family: "Josefin Sans", Arial, sans-serif;
}
button.btn.btn-info.remove {
    background: #b91818;
    /* top: -12px; */
    position: absolute;
    top: 234px;
    width: 82px;
}
button.btn.btn-info.refresh {
    position: absolute;
    top: 159px;
}

span.transerbtn {
    position: absolute;
    font-size: 51px;
    top: 165px;
}
span.removebtn {
    font-size: 51px;
    position: absolute;
    top: 249px;
    left: 25px;
}






@media only screen and (max-width: 768px) {
	.col-6.box-6 {
		width: 100% !important;
		border: 1px solid #c3b5b5;
		border-radius: 4%;
		height: 450px;
		font-family: "Josefin Sans", Arial, sans-serif;
			max-width: 100% !important;
			flex: auto;
	}
	
	.col-5.box-5 {
		border: 1px solid #c3b5b5;
		border-radius: 4%;
		font-family: "Josefin Sans", Arial, sans-serif;
		max-width: 100% !important;
			flex: auto;
	}
	
	.col-1.icon-trans {
		height: 110px;
	}
	
	span.removebtn {
		font-size: 51px;
		position: absolute;
		top: 30px;
		left: 225px;
	}
	span.transerbtn {
		position: absolute;
		font-size: 51px;
		top: 29px;
		left: 82px;
		transform: rotate(89deg);
		-ms-transform: rotate(20deg);
	}
}
</style>
    <section class="ftco-about d-md-flex">
      	 <!-- Page Content -->
		 
    <div class="container">
		<div class="row">
	        <div class="col-12"><br></div>
			<div class="col-6 box-6">
			<h4>Main Food</h4>
			<div class="row selectedFoodItem" id="Result_Transfer">
			
				   <?php 
					$Result_FoodItems=$con->Select_FoodItemsMain2($FoodID);
					if(!empty($Result_FoodItems)) {
						foreach ($Result_FoodItems as $row) {
							$ID=$row['ID'];
							$MenuItemNo=$row['MenuItemNo'];
							$FoodName=$row['FoodName'];
							$FoodImage=$row['FoodImage'];
							$SubID=$row['SubID'];
							///echo 'aaaaaaaaa - '.$FoodName;
							?>
							<div class="column1">
								<span class="menuimg"><img src="<?php echo $FoodImage;?>" ></span>
								<span class="menuno"><?php echo $MenuItemNo;?></span>
								<span class="menuname"> - <?php echo $FoodName;?></span>
							</div>
							<?php
					
						}
					}
				   ?>
						
				<?php 
				    $ProductIDs_arr = explode (",", $SubID);  
				    $countpro = count($ProductIDs_arr);
					for ($x = 0; $x < $countpro; $x++) {
						//echo '<br>'.$ProductIDs_arr[$x];
					
						$Result_FoodItems=$con->Select_FoodItemsMain2($ProductIDs_arr[$x]);
						if(!empty($Result_FoodItems)) {
							foreach ($Result_FoodItems as $row) {
								$ID=$row['ID'];
								$MenuItemNo=$row['MenuItemNo'];
								$FoodName=$row['FoodName'];
								$FoodImage=$row['FoodImage'];
								
								///echo 'aaaaaaaaa - '.$FoodName;
								?>
								<div class="column">
								<span class="menuimg"><img src="<?php echo $FoodImage;?>" >
								<div class="subimg">
									
									<p>
									<div class="checkbox">
										<input  checked id="ad_Checkbox<?php echo $ID;?>" class="ads_Checkbox" type="checkbox" value="<?php echo $ID;?>" />
										<label for="ad_Checkbox<?php echo $ID;?>"><?php echo $FoodName;?></label>
									</div>
									
									</p>
									
								</div>
								</span>
								<span class="menuno"><?php echo $MenuItemNo;?></span>
								<span class="menuname"></span>
							
								
								
								</div>
								
								
								<?php
						
							}
						}
					}
				   ?>
				   
		
		
	
			</div>
			</div>
			<div class="col-1 icon-trans">
			    <span class="icon icon-backward transerbtn transer" id="transerbtn"></span>
			  <span  id="removebtn"><span class="icon icon-trash removebtn remove"></span></span>
			    
			</div>
			<div class="col-5 box-5 Result_SelectedFItem" id="transer_menuId">
			<h4>Sub Food List</h4>
			<div class="row"> 
 
            
			    <?php 
				
				//$people = array("Peter", "Joe", "Glenn", "Cleveland");
			
				
					$Result_FoodItems=$con->Select_FoodItemsMain($FoodcatID,$FoodType);
					if(!empty($Result_FoodItems)) {
						foreach ($Result_FoodItems as $row) {
							$ID=$row['ID'];
							$MenuItemNo=$row['MenuItemNo'];
							$FoodName=$row['FoodName'];
							$FoodImage=$row['FoodImage'];
							
							
							
	
							
							?>
						    <div class="column">
								<span class="menuimg"><img src="<?php echo $FoodImage;?>" >
									<div class="subimg">
										<p>
										<div class="checkbox">
										   <?php  
										   $ProductIDs_arr = explode (",", $SubID);  
											if (in_array($ID, $ProductIDs_arr))
											{
											 // echo "Match found";
											 ?>
											 <input  checked id="ad_Checkbox2<?php echo $ID;?>" class="ads_Checkbox" type="checkbox" value="<?php echo $ID;?>" />
											<label class="lablel_selected" for="ad_Checkbox2<?php echo $ID;?>"><?php echo $FoodName;?></label>
												<span class="menuno lablel_selected"><?php echo $MenuItemNo;?></span>
											<?php
											 
											}else{
											  //echo "Match not found";
											?>
											 <input   id="ad_Checkbox2<?php echo $ID;?>" class="ads_Checkbox" type="checkbox" value="<?php echo $ID;?>" />
											<label for="ad_Checkbox2<?php echo $ID;?>"><?php echo $FoodName;?></label>
												<span class="menuno"><?php echo $MenuItemNo;?></span>
											<?php
											 
											  
											}
										   ?>
											
											
										</div>
										
										</p>
										
									</div>
								</span>
							
							
													
							</div>
							<?php
					
						}
					}
								
				   ?>
			
			</div>
			
			
						</div>

		</div>
		<div class="row">
			<div class="col-12">
			    <input type="hidden"  name="Main_Food_ID" id="Main_Food_ID" value="<?php echo $FoodID;?>">
			    <input type="hidden" name="Main_Cat_ID" id="Main_Cat_ID" value="<?php echo $FoodType;?>">
			 
		       
			</div>
		</div>
    </div>
  <!-- /.container -->
<?php    include 'FoodItemsAjax.php'; ?>
    </section>

 <?php include 'public/footer.php';?>
 <?php include 'public/scripts.php';?>
  </body>
</html>