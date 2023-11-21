<?php 
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();
include 'Modules/ClassLoading.php';
$con = new ClassLoading();
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'public/head.php';?>
    <body>
  	 <?php include 'public/Admin_nav.php'?>
    <!-- END nav -->
	  
			<style>
			div#v-pills-tabContent {
				width: 100%;
			}
            </style>
			
      <section class="ftco-section2 ftco-menu">
    	<div class="container">
		  <?php 
		for ($FoodType = 1; $FoodType <= 2; $FoodType++) {
			if($FoodType==1){
				 $FoodTypeDes='Main';
				 				 
				 echo '<h3 class="mb-3">Main Foods</h3>';
			}else{
				
				 echo '<h3 class="mb-3">Sub Foods</h3>';
				$FoodTypeDes='Sub';
			}
			
			?>
    		<div class="row d-md-flex">
			
	    		<div class="col-lg-12 ftco-animate ">
				
		    	 <div class="row">
				 
				 
				 
					  <div class="col-md-12 nav-link-wrap mb-5">
						<div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						
						 <?php  
							$xNav=0;
							$Result_FoodCategory1=$con->Select_FoodCategory();
							if(!empty($Result_FoodCategory1)) {
								foreach ($Result_FoodCategory1 as $row) {
									$CategoryID=$row['ID'];
									$CategoryNo=$row['CategoryNo'];
									$Description=$row['Description'];
									$xNav++;
									if($xNav==1){
											?>
											
							<a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#<?php echo $FoodTypeDes.'-'.$CategoryNo;?>" role="tab" aria-controls="v-pills-1" aria-selected="true"><?php echo $Description;?></a>
											<?php
										}else{
											?>
											
											  
											  
 <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#<?php echo $FoodTypeDes.'-'.$CategoryNo;?>" role="tab" aria-controls="v-pills-2" aria-selected="false"><?php echo $Description;?></a>
											<?php
										}
								}
							}
						  ?>
						
			
						</div>
					  </div>
					  
					  
					  
					  

		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

					
					
					
					 <?php  
					$xPanal=0;
					$Result_FoodCategory2=$con->Select_FoodCategory();
					if(!empty($Result_FoodCategory2)) {
						foreach ($Result_FoodCategory2 as $row) {
							$CategoryID=$row['ID'];
							$CategoryNo=$row['CategoryNo'];
							$Description=$row['Description'];
							$xPanal++;
					      	if($xPanal==1){
									?>
									 
								 <div class="tab-pane fade show active" id="<?php echo $FoodTypeDes.'-'.$CategoryNo;?>" role="tabpanel" aria-labelledby="v-pills-1-tab">
									<?php
								}else{
									?>
									  
							 <div class="tab-pane fade" id="<?php echo $FoodTypeDes.'-'.$CategoryNo;?>" role="tabpanel" aria-labelledby="v-pills-2-tab">
									<?php
								}
								?>
								 	<div class="row">
									<div class="col-md-12">
									  <table class="table-order" style="width:100%" border="1">
										  <thead>
											<tr>
											  <th scope="col">#</th>
											  <th scope="col">Code</th>
											  <th scope="col">Image</th>
											  <th scope="col">Name</th>
											  <th scope="col">Price</th>
											  <th scope="col">Qty</th>
											  <th scope="col">SubFoodID</th>
											  <th scope="col">Add Sub Food</th>
											  <th scope="col">Edit</th>
											
											</tr>
										  </thead>
										  <tbody>
										  
										  <?php  
										  //$FoodType=1;
										  $No=1;
										  $Result_FoodItems=$con->Select_FoodItemsMain($CategoryID,$FoodType);
											if(!empty($Result_FoodItems)) {
												foreach ($Result_FoodItems as $row) {
													$ID=$row['ID'];
													$MenuItemNo=$row['MenuItemNo'];
													$FoodName=$row['FoodName'];
													$FoodImage=$row['FoodImage'];
													$Price=$row['Price'];
													$SubID=$row['SubID'];
													$Qty=$row['Qty'];
													?>
													<tr>
													  <th scope="row"><?php echo $No++;?></th>
													  <td><?php echo $MenuItemNo;?></td>
													  <td>
													  <a href="SubFoodAdd.php?FoodID=<?php echo $ID;?>&FoodcatID=<?php echo $CategoryID;?>">
													      <img class="orderimg" src="<?php echo $FoodImage;?>">
													  </a>
													  </td>
													  <td><?php echo $FoodName;?></td>
													  <td><?php echo $Price;?></td>
													  <td><?php echo $Qty;?></td>
													  <td><?php echo $SubID;?></td>
													  <td>  <a href="SubFoodAdd.php?FoodID=<?php echo $ID;?>&FoodcatID=<?php echo $CategoryID;?>">Add sub food</a></td>
													  <td><a href="FoodItemsUI.php?FoodID=<?php echo $ID;?>">Edit</a></td>
													  
													</tr>
													<?php
													
													
												}
											}
										  ?>
											
										<!---
											<tr>
											 
											  <td colspan="8"></td>
											 
											  <td>550.00</td>
											</tr>----->
										  </tbody>
										</table>
								  </div>
								  </div>
								  </div>
								<?php
						}
					}
					?>
				
					
					

		            </div>
		          </div>
		        </div>
				
				
				
				
		      </div>
		    </div>
			
			<?php
		}
		
		
		?>
    	</div>
    </section>
	
	
	
			


    <?php include 'public/footer.php';?>
    <?php include 'public/scripts.php';?>
    
  </body>
</html>