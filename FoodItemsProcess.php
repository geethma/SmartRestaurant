<?php 
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();
include 'FoodItemsClass.php';
$FoodItem_con = new FoodItem();
$Description='';
    if(isSet($_POST['Foodcode'])) {
		$targetPath2='';	
		$FoodID=$_POST['FoodID'];
		$Foodcode=$_POST['Foodcode'];
		$FoodCategory=$_POST['FoodCategory'];
		$FoodName=$_POST['FoodName'];
		$FoodPrice=$_POST['FoodPrice'];
		$Foodtype=$_POST['Foodtype'];
		$SubFoodType=$_POST['SubFoodType'];
		$qty=$_POST['qty'];
		$Description=$_POST['Description'];
		$targetPath2=$_POST['imagename'];
	
	//echo 'Foodcode - '.$Foodcode;
	}
	

	if(isset($_FILES["file"]["type"]))
	{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
		
		// if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
		// ) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
		// && in_array($file_extension, $validextensions)) {
			if ($_FILES["file"]["error"] > 0)
			{
			    echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
			}
			else
			{
				if (file_exists("upload/" . $_FILES["file"]["name"])) {
				    echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
				}
				else
				{
					$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "img/food_item/".$_FILES['file']['name']; // Target path where file is to be stored
					$targetPath2 = "img/food_item/".$_FILES['file']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
					
					//echo "<span id='success'>Food Item Add Successfully...!!</span><br/>";
					//echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
					//echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
					//echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
					//echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
					//echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
				}
			}
		// }
		// else
		// {
		    // echo "<span id='invalid'>***Invalid file Size or Type***<span>";
		// }
	}
	if($FoodID!=''){
		$Result_FoodItems=$FoodItem_con->Update_FoodItems2($Foodcode,$FoodCategory,$FoodName,$targetPath2,$FoodPrice,$Foodtype,$SubFoodType,$FoodID,$qty,$Description);
		echo "<span id='success'>Food Item Update Successfully...!!</span><br/>";
	}else{
	   $Result_FoodItems=$FoodItem_con->Insert_FoodItemsMain($Foodcode,$FoodCategory,$FoodName,$targetPath2,$FoodPrice,$Foodtype,$SubFoodType,$qty,$Description);
	   echo "<span id='success'>Food Item Add Successfully...!!</span><br/>";
	 //  print_r ($Result_FoodItems);
	}		
?>