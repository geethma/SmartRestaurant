<?php
session_start();
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();
$item_Qty=0;
$item_total=0;
$_SESSION["item_Qty"]=0;
//$Totale=0;
if(!empty($_POST["action"])) {
	
	//echo 'aaa - '.$_POST["code"];
	
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblfoodmenuitem WHERE ID='" . $_POST["code"] . "'");
			
			$itemArray = array($productByCode[0]["MenuItemNo"]=>array('name'=>$productByCode[0]["FoodName"], 'code'=>$productByCode[0]["MenuItemNo"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["Price"],'img'=>$productByCode[0]["FoodImage"],'FoodID'=>$productByCode[0]["ID"],'SubFood'=>$_POST["SubFood"]));
			
			// $ItemPrice = $_POST["quantity"]*$productByCode["Price"];
			// $Totale=$Totale+$ItemPrice;
			// $_SESSION["totale"]=$ItemPrice;
			//print_r ($itemArray);
			
			if(!empty($_SESSION["cart_item"])) {
				
				if(array_key_exists($productByCode[0]["MenuItemNo"],$_SESSION["cart_item"])) {
					//echo 'ok ----------- ';
					foreach($_SESSION["cart_item"] as $k => $v) {
						//echo '2 - '.$k.'<br>';
							if($productByCode[0]["MenuItemNo"] == $k){
								//echo '2 - '.$k.'<br>';
								//echo '1 - '.$productByCode[0]["MenuItemNo"].'<br>';
								
								$_SESSION["cart_item"][$k]["quantity"] = $_SESSION["cart_item"][$k]["quantity"]+$_POST["quantity"];
								
								$_SESSION["item_Qty"]=$_SESSION["cart_item"][$k]["quantity"]+$_POST["quantity"];
								
								}
					}
					
				} else {
					//echo 'no ----------- ';
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
					//$_SESSION["item_Qty"]=$_SESSION["item_Qty"]+1;
					
				}
			} else {
				
				$_SESSION["cart_item"] = $itemArray;
				//$_SESSION["item_Qty"]=$_SESSION["item_Qty"]+1;
				
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
		
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_POST["code"] == $k)
						unset($_SESSION["cart_item"][$k]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
					
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
		unset($_SESSION["item_total"]);
		unset($_SESSION["item_Qty"]);
		
	break;		
}
}




if(!empty($_SESSION["cart_item"])) {
foreach ($_SESSION["cart_item"] as $item){
	$item_total += ($item["price"]*$item["quantity"]);		
	$item_Qty +=$item["quantity"];
}
    $Discount=0;
	$Total = $item_total-$Discount;
	$_SESSION["item_total"]=$Total;
	
	$_SESSION["item_Qty"]=$item_Qty;
}else{
	unset($_SESSION["item_total"]);
		unset($_SESSION["item_Qty"]);
}

//print_r ($_SESSION["cart_item"]);
?>
	
					
				
			