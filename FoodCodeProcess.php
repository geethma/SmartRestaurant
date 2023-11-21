<?php 
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();



$FoodCodeNo='';

if(isSet($_POST['FoodCategoryID'])) {
		
    $FoodCategoryID=$_POST['FoodCategoryID'];
    $Foodtype=$_POST['Foodtype'];
	
	$FoodCode_array = $db_handle->runQuery("SELECT * FROM `tblfoodmenuitem` WHERE `FoodCatID`='". $FoodCategoryID."' AND `FoodType`='".$Foodtype."'");
	if (!empty($FoodCode_array)) { 
	//echo '$FoodCode_array - '.$FoodCode_array;
	  $FoodCodeNo=count($FoodCode_array)+1;
	  
	 // echo 'aaa - '.$FoodCodeNo;
	}else{
		  $FoodCodeNo=1;
	}
	
	
	 if($FoodCategoryID=='1' && $Foodtype=='1'){
		 $FoodCodeS='M';
	 }elseif($FoodCategoryID=='1' && $Foodtype=='2'){
		  $FoodCodeS='MS';
	 }elseif($FoodCategoryID=='4' && $Foodtype=='1'){
		  $FoodCodeS='D';
	 }elseif($FoodCategoryID=='4' && $Foodtype=='2'){
		 $FoodCodeS='DS';
	 }elseif($FoodCategoryID=='5' && $Foodtype=='1'){
		  $FoodCodeS='B';
	 }elseif($FoodCategoryID=='5' && $Foodtype=='2'){
		  $FoodCodeS='BS';
	 }elseif($FoodCategoryID=='6' && $Foodtype=='1'){
		  $FoodCodeS='P';
	 }elseif($FoodCategoryID=='6' && $Foodtype=='2'){
		  $FoodCodeS='PS';
	 }elseif($FoodCategoryID=='7' && $Foodtype=='1'){
		 $FoodCodeS='F';
	 }elseif($FoodCategoryID=='7' && $Foodtype=='2'){
		 $FoodCodeS='FS';
	 }elseif($FoodCategoryID=='8' && $Foodtype=='1'){
		 $FoodCodeS='I';
	 }elseif($FoodCategoryID=='8' && $Foodtype=='2'){
		 $FoodCodeS='IS';
	 }
	 
	$FoodCode = $FoodCodeS.'00'.$FoodCodeNo;
	?>
	<input type="hidden" value="<?php echo $FoodCode;?>" id="created_foodcode">
	<?php

}
?>