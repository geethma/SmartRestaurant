<?php
class FoodItem
{
	public function Insert_FoodItemsMain($Foodcode,$FoodCategory,$FoodName,$targetPath,$FoodPrice,$Foodtype,$SubFoodType,$qty,$Description)
	{
	    $db_handle = new DBController();
		$query = "INSERT INTO `tblfoodmenuitem`(`SubID`, `MenuItemNo`, `FoodCatID`, `FoodName`, `FoodImage`, `Price`,`FoodType`,`SubFoodType`,`Qty`,`Description`) 
		VALUES ('','".$Foodcode."','".$FoodCategory."','".$FoodName."','".$targetPath."','".$FoodPrice."','".$Foodtype."','".$SubFoodType."','".$qty."','".$Description."')";
		$Result_FoodItems = $db_handle->insertQuery($query);
		return $Result_FoodItems;
	}
   	public function Update_FoodItems($Main_Food_ID,$selected)
	{
	    $db_handle = new DBController();
		$query = "UPDATE `tblfoodmenuitem` SET `SubID`='".$selected."' WHERE `ID`='".$Main_Food_ID."'";
		$UpdateResult_FItems = $db_handle->updateQuery($query);
		return $UpdateResult_FItems;
	}
	public function Update_FoodItems2($Foodcode,$FoodCategory,$FoodName,$targetPath2,$FoodPrice,$Foodtype,$SubFoodType,$FoodID,$qty,$Description)
	{
	    $db_handle = new DBController();
		//$query = "UPDATE `tblfoodmenuitem` SET `SubID`='".$selected."' WHERE `ID`='".$Main_Food_ID."'";
		$query = "UPDATE `tblfoodmenuitem` SET `SubFoodType`='".$SubFoodType."',`FoodType`='".$Foodtype."',`MenuItemNo`='".$Foodcode."',`FoodCatID`='".$FoodCategory."',`FoodName`='".$FoodName."',`Price`='".$FoodPrice."',`Qty`='".$qty."',`FoodImage`='".$targetPath2."',`Description`='".$Description."' WHERE `ID`='".$FoodID."'";
		$UpdateResult_FItems2 = $db_handle->updateQuery($query);
		return $UpdateResult_FItems2;
	}
}

?>