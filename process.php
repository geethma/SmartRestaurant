<?php 
session_start(); 
//Open DB Controller
require_once("Controller/dbcontroller.php");
$db_handle = new DBController();

include 'Modules/ClassLoading.php';
$con = new ClassLoading();


    if(isset($_POST['usernametxt']))
    {
	  	$usernametxt=$_POST['usernametxt'];
	    $passwordtxt=$_POST['passwordtxt'];
	    $query = "SELECT * FROM `tbluser` WHERE `PhoneNo`='".$usernametxt."' AND `Password`='". $passwordtxt."'";
		//echo '$query - '.$query;
		$Result_User = $db_handle->runQuery($query);
		if(!empty($Result_User)) {
			echo 'Welcome to Smart Restaurant......';
		   foreach ($Result_User as $row) {
			$Username=$row['Name'];
			$Password=$row['Password'];
			$UserRoleID=$row['UserRoleID'];
			$UserRoleID=$row['UserRoleID'];
			$PhoneNo=$row['PhoneNo'];
			$Email=$row['Email'];
			
			$_SESSION['Username'] = $Username;
			$_SESSION['Password'] = $Password;
			$_SESSION['UserRoleID'] = $UserRoleID;
			$_SESSION['PhoneNo'] = $PhoneNo;
			$_SESSION['Email'] = $Email;
			// $Email=$row['Email'];
			// $WebSite=$row['WebSite'];
			// $ContactNo=$row['ContactNo'];
			// $StatusId=$row['StatusId'];
			//header('Location: index.php');
		   }
		   ?>
		   <input type="hidden" id="loginresult" value="1">
		   <?php
	    }else{
			  ?>
		   <input type="hidden" id="loginresult" value="2">
		   <?php
			echo 'Incorrect username  or password';
		}
		
	}
	
	//RegistrationName
	 if(isset($_POST['RegistrationName']))
    {
	     $Name=$_POST['RegistrationName'];
	     $Phone=$_POST['Phone'];
	     $Password=$_POST['Password'];
	     $email=$_POST['email'];
	     //Insert head
		 $Result_Registration=$con->Insert_Registration($Name,$Phone,$Password,$email);
		 
		 echo 'Registration successfuly.';
		 
	}
	
	
	
	
	if(isset($_POST['OrderInsert']))
    {
		$cusName=$_POST['cusName'];
		$CusAddress=$_POST['CusAddress'];
		$CusPhone=$_POST['CusPhone'];
		$CusEmail=$_POST['CusEmail'];
		$tableNo=$_POST['tableNo'];
		$InvoiceNo=$_POST['InvoiceNo'];
		$Totale=$_POST['Totale'];
		
		//Insert head
		 $Result_OrderHead=$con->Insert_OrderHead($InvoiceNo,$tableNo,$cusName,$CusAddress,$CusPhone,$CusEmail,$Totale);
		//Insert Item 
		foreach ($_SESSION["cart_item"] as $item){
			
			$name=$item["name"];
			$code=$item["code"];
			$quantity=$item["quantity"];
			$price=$item["price"];
			$img=$item["img"];
			$SubFood=$item["SubFood"];
			$Result_OrderItem=$con->Insert_OrderItem($InvoiceNo,$name,$code,$quantity,$price,$img,$SubFood);
			$_SESSION["Customer_Phone"]=$CusPhone;
			$_SESSION["Username"]=$cusName;
		       	unset($_SESSION["cart_item"]);   
		       	unset($_SESSION["item_total"]);   
		}
		
	}
?>

<script>
    // $(document).ready(function(){
		// $("#searchcustomer").keyup(function(){
			// var searchcustomerKey = $(this).val();
			// var dataString = 'searchcustomerKey='+ searchcustomerKey ;
			// $.ajax({
			// type: "POST",
			// url: "ProcessCustomer.php",
			// data:dataString,
			// cache: false,
			// success: function(html){
		  	// $("#Result_search").html(html);
							// //$("#CustomerName").css("background","#FFF");
			// }
			// });
		// });
		
		// $('#formEmployee').validate({// initialize the plugin
                    // rules: {
                        // customerName: {
                            // required: true
                        // },
                        // customerAddress: {
                            // required: true
                        // },
                        // contactNo: {
                            // required: true,
                            // minlength: 10
                        // }
                    // },
                    // submitHandler: function (form) { // for demo
                      //  alert('valid form submitted'); // for demo
						
                      // myFunction();
                      //  $( "#formEmployee" ).submit();
                        // return false; // for demo
                    // }
                // });
				
				
			
    // $("#contactNo").keydown(function (e) {
		
        // // Allow: backspace, delete, tab, escape, enter and .
        // if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // // Allow: Ctrl+A, Command+A
            // (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // // Allow: home, end, left, right, down, up
            // (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // // let it happen, don't do anything
                 // return;
        // }
        // // Ensure that it is a number and stop the keypress
        // if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            // e.preventDefault();
        // }
    // });

				
		
		
	});
</script>

     <script type="text/javascript">
	
		
		
		
		
			
	// $(document).ready(function (e) {
// $("#uploadimage").on('submit',(function(e) {
// e.preventDefault();
// //alert('s');
// $("#message").empty();
// $('#loading').show();
// $.ajax({
// url: "ProcessCustomer.php", // Url to which the request is send
// type: "POST",             // Type of request to be send, called as method
// data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
// contentType: false,       // The content type used when sending data to the server.
// cache: false,             // To unable request pages to be cached
// processData:false,        // To send DOMDocument or non processed data file it is set to false
// success: function(data)   // A function to be called if request succeeds
// {
// $('#loading').hide();
// $("#Result_customer").html(data);

    // window.location.href='UICustomer.php';


// }
// });
// }));
// });





// //Delete 
	// $(function() {
	// $(".delete").click(function(){
	// var element = $(this);
	// var del_id = element.attr("id");
	// //alert(del_id);
	// var info = 'id_Delete=' + del_id;
	// if(confirm("Are you sure you want to delete this?"))
		// //document.getElementById('Description').focus();
	// {
	 // $.ajax({
	   // type: "POST",
	   // url: "ProcessCustomer.php",
	   // data: info,
	   // success: function(html){
		    // $("#result_delete").html(html);
			// document.getElementById('Description').focus();
	 // }
	 // });
	  // $(this).parents("#show").animate({ backgroundColor: "#003" }, "slow")
	  // .animate({ opacity: "hide" }, "slow");
	// }
	// return false;
	// });
	// });
	
	
	
	
	
	
	  // $(document).ready(function() {

        // $("#BTNsaveUsertask").click(function() {
            // alert('aa');
            // var Roleid = $("#Roleid").val();
            // var privilege = $("#privilege").val();

            // var taskRegistration = 'taskRegistration';

            // var dataString = 'taskRegistration=' + taskRegistration + '&Roleid=' + Roleid + '&privilege=' + privilege;

            // if (Roleid == '' || privilege == '')
            // {
                // if (Roleid == '') {
                    // $(".alertRole").fadeIn(100).html('<font color="red">Please Select user role and user task</font>');
                    // $(".alertRole").fadeIn().delay(2000).fadeOut();
                    // document.getElementById('Roleid').focus();
                // } else if (Role != '' && privilege == '') {
                    // $(".Privileges").fadeIn(100).html('<font color="red">Enter privilege for user</font>');
                    // $(".Privileges").fadeIn().delay(2000).fadeOut();
                    // document.getElementById('privilege').focus();
                // }

            // }
            // else
            // {
                // $("#flash").show();
                // $("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');

                // $.ajax({
                    // type: "POST",
                    // url: "process2.php",
                    // data: dataString,
                    // cache: false,
                    // success: function(html) {

                        // $("#uploadFormLayer").html(html);

                        // window.location.reload();

                        // document.getElementById('Roleid').value = '';
                        // document.getElementById('privilege').value = '';


                        // $("#flash").hide();
                    // }
                // });
            // }
            // return false;
        // });
    // });
	
	
	
	
	// $query = "INSERT INTO `tblcustomer`(`CustomerId`, `Name`, `Address`, `ContactNo`, `Email`, `CreatedDate`, `DeleteDate`, `GenderId`) 
		// VALUES ('$CusID','$customerName','$customerAddress','$contactNo','$email','$DateTime','','$genderId')";
		// $Result_gender = $db_handle->insertQuery($query);
		
		
		
		
		// $query = "UPDATE `tblcustomer` SET `Name`='$customerName',`Address`='$customerAddress',`ContactNo`='$contactNo',
				// `Email`='$email',`GenderId`='$genderId'
				// WHERE `CustomerId`='$CustomerID'";

		// //echo $query;
		// $Result_tbluser_Update = $db_handle->insertQuery($query);
		
		
		
		
		
		// $query = "DELETE FROM `tbluser` WHERE `CustomerId`='$id_Delete'";
		// //echo $query;
		// $Result_user_Delete = $db_handle->deleteQuery($query);

          </script>
		  