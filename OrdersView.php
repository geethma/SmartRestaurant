<?php 
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();

if(isset($_GET['OrderID'])){
	$OrderID=$_GET['OrderID'];
	
}
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'public/head.php';?>
    <body>
  	<?php include 'public/Admin_nav.php'?>
  
   
   <section class="ftco-section2 ftco-menu">
    	<div class="container">
   
   
    <div class="card-body">
		<table class="table-order" style="width:100%" border="1">
			<tr>
				  <th >Invoice NO</th>
				  <th>Table No</th>
				  <th>SubTotal</th>
				  <th>Discount</th>
				  <th>Totale</th>
				  
				  <th>Name</th>
				  <th>Phone</th>
				  <th>Email</th>
				  <th>Status</th>
			</tr>
            <?php 
			$No=1;
			$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderheader` WHERE `ID`='".$OrderID."'");
			if (!empty($Orders_result)) {
				foreach ($Orders_result as $row) {
					
					$dbID=$row['ID']; 
					$dbOrderNo=$row['OrderID']; 
					$TableNo=$row['TableNo']; 
					$Totale=$row['Totale']; 
					$CusName=$row['CusName']; 
					$CusPhone=$row['CusPhone']; 
					$CusEmail=$row['CusEmail']; 
					$SubTotal=$row['SubTotal']; 
					$Discount=$row['Discount']; 
					$Status=$row['Status']; 
				 ?>
				 
				  <tr>
					 
					  <td><?php echo $dbOrderNo;?></td>
					  <td><?php echo $TableNo;?></td>
					  <td><?php echo $SubTotal;?></td>
					  <td><?php echo $Discount;?></td>
					  <td><?php echo $Totale;?></td>
					  <td><?php echo $CusName;?></td>
					  <td><?php echo $CusPhone;?></td>
					  <td><?php echo $CusEmail;?></td>
					  <td>
					  <?php 
					  if($Status=='Pendding'){
						  ?>
						  <a href="Order_Status.php?OrderID=<?php echo $dbOrderNo;?>&status=<?php echo $Status;?>"><button class="btnconfirm btn btn-white btn-outline-white ">Process</button></a>
						  <?php
					  }elseif($Status=='Processing'){ //Delivering
						   ?>
						  <a href="Order_Status.php?OrderID=<?php echo $dbOrderNo;?>&status=<?php echo $Status;?>"><button class="btnconfirm btn btn-white btn-outline-white ">Delivery</button></a>
						  <?php
					  }else{
						  ?>
						<button class="btnconfirm btn btn-white btn-outline-white ">Delivering</button>
						  <?php
					  }
					  
					  ?>
					  
					  <button class="btnreject btn btn-white btn-outline-white ">reject</button>
					  
					  </td>
					 
					</tr>
				 <?php
				}
			}
			?>
                   
        </table>
		</div>
		<div class="card-body">
		  
		<table class="table-order" style="width:100%" border="1">
            <tr>
                  <th >Food Code</th>
				  <th>Name</th>
				  <th>Price</th>
				  <th>Qty</th>
				  <th>Image</th>
				  <th>Sub Image</th>
			</tr>
            <?php 
				$No=1;
				$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderitem` WHERE `OrderID`='".$dbOrderNo."'");
				if (!empty($Orders_result)) {
					foreach ($Orders_result as $row) {
						
						$dbFoodItemID=$row['ID']; 
						$FoodCode=$row['FoodCode']; 
						$Name=$row['Name']; 
						$Price=$row['Price']; 
						$Qty=$row['Qty']; 
						$Image=$row['Image']; 
						$SubfoodID=$row['SubfoodID']; 
					 
					 ?>
					 
					  <tr>
						 
						  <td><?php echo $FoodCode;?></td>
						  <td><?php echo $Name;?></td>
						  <td><?php echo $Price;?></td>
						  <td><?php echo $Qty;?></td>
						  <td><img class="orderimg2" src="<?php echo $Image;?>"></td>
						  <td><?php echo $SubfoodID;?></td>
						  
						 
						</tr>
					 <?php
					}
				}
				?>
        </table>
		</div>
		</div>
	</section>

 <?php include 'public/footer.php';?>
 <?php include 'public/scripts.php';?>
    
  </body>
</html>