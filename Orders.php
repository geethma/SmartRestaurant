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
<style>
div#v-pills-tabContent {
    width: 100%;
}
</style>
    
	<section class="ftco-section2 ftco-menu">
    	<div class="container">
    		<div class="row d-md-flex">
	    		<div class="col-lg-12">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Pendding</a>

		              <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Processing</a>

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Delivering</a>

		              <a class="nav-link" id="v-pills-4-tab" data-toggle="pill" href="#v-pills-4" role="tab" aria-controls="v-pills-4" aria-selected="false">Done</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		             <div class="tab-content ftco-animate" id="v-pills-tabContent">
		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">
		              		<div class="col-md-12">
		              			 	<table class="table-order" style="width:100%" border="1">
									  <tr>
										  <th><a href="View-Orders.html">ID</a></th>
										  <th>InviceNo</th>
										  <th>table No</th>
										  <th>Totale</th>
										  <th> Name</th>
										  <th> Phone</th>
										  <th> Email</th>
										  <th> Date Time</th>
										  <th> Status</th>
										  <th>View</th>
									  </tr>

									 <?php 
												$No=1;
												$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderheader` WHERE `Status`='Pendding'");
												if (!empty($Orders_result)) {
													foreach ($Orders_result as $row) {
														
														$dbID=$row['ID']; 
														$OrderID=$row['OrderID']; 
														$TableNo=$row['TableNo']; 
														$Totale=$row['Totale']; 
														$CusName=$row['CusName']; 
														$CusPhone=$row['CusPhone']; 
														$CusEmail=$row['CusEmail']; 
														$DateTime=$row['DateTime']; 
														$Status=$row['Status']; 
														?>
														
															<tr>
															  <td><?php echo $No++;?></td>
															  <td><?php echo $OrderID;?></td>
															  <td><?php echo $TableNo;?></td>
															  <td><?php echo $Totale;?></td>
															  <td><?php echo $CusName;?></td>
															  <td><?php echo $CusPhone;?></td>
															  <td><?php echo $CusEmail;?></td>
															  <td><?php echo $DateTime;?></td>
															  <td><?php echo $Status;?></td>
															  
															  <td><a href="OrdersView.php?OrderID=<?php echo $dbID;?>">View</a></td>
															 
															</tr>

														<?php
													}
												}
												?>
											   
								</table>
		              		</div>
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
		                <div class="row">
		                      	<div class="col-md-12">
		              			 	<table class="table-order" style="width:100%" border="1">
									  <tr>
										  <th><a href="View-Orders.html">ID</a></th>
										  <th>InviceNo</th>
										  <th>table No</th>
										  <th>Totale</th>
										  <th> Name</th>
										  <th> Phone</th>
										  <th> Email</th>
										  <th> Date Time</th>
										  <th> Status</th>
										  <th>View</th>
									  </tr>

									 <?php 
												$No=1;
												$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderheader` WHERE `Status`='Processing'");
												if (!empty($Orders_result)) {
													foreach ($Orders_result as $row) {
														
														$dbID=$row['ID']; 
														$OrderID=$row['OrderID']; 
														$TableNo=$row['TableNo']; 
														$Totale=$row['Totale']; 
														$CusName=$row['CusName']; 
														$CusPhone=$row['CusPhone']; 
														$CusEmail=$row['CusEmail']; 
														$DateTime=$row['DateTime']; 
														$Status=$row['Status']; 
														?>
														
															<tr>
															  <td><?php echo $No++;?></td>
															  <td><?php echo $OrderID;?></td>
															  <td><?php echo $TableNo;?></td>
															  <td><?php echo $Totale;?></td>
															  <td><?php echo $CusName;?></td>
															  <td><?php echo $CusPhone;?></td>
															  <td><?php echo $CusEmail;?></td>
															  <td><?php echo $DateTime;?></td>
															  <td><?php echo $Status;?></td>
															  
															  <td><a href="OrdersView.php?OrderID=<?php echo $dbID;?>">View</a></td>
															 
															</tr>

														<?php
													}
												}
												?>
											   
								</table>
		              		</div>
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">
		              		   	<div class="col-md-12">
		              			 	<table class="table-order" style="width:100%" border="1">
									  <tr>
										  <th><a href="View-Orders.html">ID</a></th>
										  <th>InviceNo</th>
										  <th>table No</th>
										  <th>Totale</th>
										  <th> Name</th>
										  <th> Phone</th>
										  <th> Email</th>
										  <th> Date Time</th>
										  <th> Status</th>
										  <th>View</th>
									  </tr>

									 <?php 
												$No=1;
												$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderheader` WHERE `Status`='Delivering'");
												if (!empty($Orders_result)) {
													foreach ($Orders_result as $row) {
														
														$dbID=$row['ID']; 
														$OrderID=$row['OrderID']; 
														$TableNo=$row['TableNo']; 
														$Totale=$row['Totale']; 
														$CusName=$row['CusName']; 
														$CusPhone=$row['CusPhone']; 
														$CusEmail=$row['CusEmail']; 
														$DateTime=$row['DateTime']; 
														$Status=$row['Status']; 
														?>
														
															<tr>
															  <td><?php echo $No++;?></td>
															  <td><?php echo $OrderID;?></td>
															  <td><?php echo $TableNo;?></td>
															  <td><?php echo $Totale;?></td>
															  <td><?php echo $CusName;?></td>
															  <td><?php echo $CusPhone;?></td>
															  <td><?php echo $CusEmail;?></td>
															  <td><?php echo $DateTime;?></td>
															  <td><?php echo $Status;?></td>
															  
															  <td><a href="OrdersView.php?OrderID=<?php echo $dbID;?>">View</a></td>
															 
															</tr>

														<?php
													}
												}
												?>
											   
								</table>
		              		</div>
		              	</div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-4" role="tabpanel" aria-labelledby="v-pills-4-tab">
		                <div class="row">
		              		<div class="col-md-12">
		              			 	<table class="table-order" style="width:100%" border="1">
									  <tr>
										  <th><a href="View-Orders.html">ID</a></th>
										  <th>InviceNo</th>
										  <th>table No</th>
										  <th>Totale</th>
										  <th> Name</th>
										  <th> Phone</th>
										  <th> Email</th>
										  <th> Date Time</th>
										  <th> Status</th>
										  <th>View</th>
									  </tr>

									 <?php 
												$No=1;
												$Orders_result = $db_handle->runQuery("SELECT * FROM `tblorderheader` WHERE `Status`='Done'");
												if (!empty($Orders_result)) {
													foreach ($Orders_result as $row) {
														
														$dbID=$row['ID']; 
														$OrderID=$row['OrderID']; 
														$TableNo=$row['TableNo']; 
														$Totale=$row['Totale']; 
														$CusName=$row['CusName']; 
														$CusPhone=$row['CusPhone']; 
														$CusEmail=$row['CusEmail']; 
														$DateTime=$row['DateTime']; 
														$Status=$row['Status']; 
														?>
														
															<tr>
															  <td><?php echo $No++;?></td>
															  <td><?php echo $OrderID;?></td>
															  <td><?php echo $TableNo;?></td>
															  <td><?php echo $Totale;?></td>
															  <td><?php echo $CusName;?></td>
															  <td><?php echo $CusPhone;?></td>
															  <td><?php echo $CusEmail;?></td>
															  <td><?php echo $DateTime;?></td>
															  <td><?php echo $Status;?></td>
															  
															  <td><a href="OrdersView.php?OrderID=<?php echo $dbID;?>">View</a></td>
															 
															</tr>

														<?php
													}
												}
												?>
											   
								</table>
		              		</div>
		              	</div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section>


 <?php include 'public/footer.php';?>
 <?php include 'public/scripts.php';?>
    
  </body>
</html>