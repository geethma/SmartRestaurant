<style>
.lablel_selected {
    color: #eac40b;
    font-weight: 100;
    font-size: 16px;
}
</style>
<?php 
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();
include 'FoodItemsClass.php';
include 'Modules/ClassLoading.php';
//include 'ClassAdmin.php';
$con = new ClassLoading();
$FoodItem_con = new FoodItem();

if(isSet($_POST['pass'])) {
	
		
	$selected=$_POST['selected'];
	$Main_Food_ID=$_POST['Main_Food_ID'];
	
	$UpdateResult_FItems=$FoodItem_con->Update_FoodItems($Main_Food_ID,$selected);
	
	
					$Result_FoodItems=$con->Select_FoodItemsMain2($Main_Food_ID);
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
										<input name="selector[]" checked id="ad_Checkbox<?php echo $ID;?>" class="ads_Checkbox" type="checkbox" value="<?php echo $ID;?>" />
										<label for="ad_Checkbox<?php echo $ID;?>"><?php echo $FoodName;?></label>
									</div>
									
									</p>
									
								</div>
								</span>
								<span class="menuno"><?php echo $MenuItemNo;?></span>
								<span class="menuname"> </span>
							
								
								
								</div>
								
								
								<?php
						
							}
						}
					}
				 
				   
		
}


if(isSet($_POST['pass2'])) {
	
	$selected=$_POST['selected'];
	$Main_Food_ID=$_POST['Main_Food_ID'];
	$Main_Cat_ID=$_POST['Main_Cat_ID'];
	echo 'aaaa - '.$Main_Food_ID;
	
	$UpdateResult_FItems=$FoodItem_con->Update_FoodItems($Main_Food_ID,$selected);
	?>
	
		<div class="row"> 
 
            
			    <?php 
				
				//$people = array("Peter", "Joe", "Glenn", "Cleveland");
			
				
					$Result_FoodItems=$con->Select_FoodItemsMain($Main_Food_ID,$Main_Cat_ID);
					if(!empty($Result_FoodItems)) {
						foreach ($Result_FoodItems as $row) {
							$ID=$row['ID'];
							$MenuItemNo=$row['MenuItemNo'];
							$FoodName=$row['FoodName'];
							$FoodImage=$row['FoodImage'];
							$SubID=$row['SubID'];
							
							
	
							
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
			<?php
	
}
	
?>