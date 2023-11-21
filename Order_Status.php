<?php
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();
if(isset($_GET['OrderID'])){
	
	$OrderID=$_GET['OrderID'];
	$status=$_GET['status'];
	
	
	if($status=='Pendding'){
		$Update_status='Processing';
	}elseif($status=='Processing'){
		$Update_status='Delivering';
	}
	
	
		$query = "UPDATE `tblorderheader` SET `Status`='".$Update_status."' WHERE `OrderID`='".$OrderID."'";
		$Result_orderheaddelete = $db_handle->updateQuery($query);
		
		
		
		header("Location: Orders.php");
	
}

?>