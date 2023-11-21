<?php
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();
if(isset($_GET['DeleteID'])){
	$DeleteID=$_GET['DeleteID'];
	$status=$_GET['status'];
	
	if($status=='Delete'){
		
		$query = "DELETE FROM `tblorderheader` WHERE `OrderID`='".$DeleteID."'";
		$Result_orderheaddelete = $db_handle->deleteQuery($query);
		
		$query = "DELETE FROM `tblorderitem` WHERE `OrderID`='".$DeleteID."'";
		$Result_orderitemdelete = $db_handle->deleteQuery($query);
		
	}elseif($status=='Done'){
		$query = "UPDATE `tblorderheader` SET `Status`='Done' WHERE `OrderID`='".$DeleteID."'";
		$Result_orderitemdelete = $db_handle->updateQuery($query);
		
	}
	
	
		
		
		header("Location: checkout.php");
	
}

?>