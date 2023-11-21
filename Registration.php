<?php   session_start();  ?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'public/head.php';?>
    <body>
  	<?php include 'public/nav.php'?>
    <section class="ftco-about d-md-flex">
      	<div class="one-half ftco-animate">
			<div class="heading-section ftco-animate ">
			  <h3 class="mb-3">Login</h3>
			</div>
			<div>
			<form class="form-contact contact_form" autocomplete="off" action="" method="post" id="contactForm"
				novalidate="novalidate">
				<div class="row">
				 
				  <div class="col-sm-10">
					<div class="form-group">
					  <input class="form-control" onkeypress="return isNumberKey(event)" maxlength="10" name="usernametxt" id="usernametxt" type="text" onfocus="this.placeholder = ''"
						onblur="this.placeholder = 'Enter Phone No'" placeholder='Enter Phone No'>
						<div class="phoneNalert"></div>
					</div>
				  </div>
				  <div class="col-sm-10">
					<div class="form-group">
					  <input class="form-control" name="passwordtxt" id="passwordtxt" type="password" onfocus="this.placeholder = ''"
						onblur="this.placeholder = 'Enter password'" placeholder='Enter password'>
						<div class="passwordLalert"></div>
					</div>
				  </div>
				 </div>
				<div class="form-group mt-3">
					<?php 
					if(isset($_SESSION['Username'])!=''){
					  ?>
					    <button type="button" id="login" disabled class="btn btn-primary py-3 px-4">Login</button>
					  <?php
					}else{
						  ?>
					     <button type="button" id="login" class="btn btn-primary py-3 px-4">Login</button>
					  <?php
					}
					?>
				</div>
			</form>
			<?php 
			if(isset($_SESSION['Username'])!=''){
			  ?>
			   <div class="login-welcom-msg"><div id="Result">Welcome to Smart Restaurant......</div></div>
			  <?php
			}else{
			  ?>
			   <div class="login-welcom-msg"><div id="Result"></div></div>
			  <?php
			}
			?>
			</div>
        </div>
		<div class="one-half ftco-animate">
			<div class="heading-section ftco-animate ">
			  <h3 class="mb-3">Registration</h3>
			</div>
            <div>
				<form class="form-contact contact_form" autocomplete="off" action="" method="post" id="contactForm"
					novalidate="novalidate">
					<div class="row">
					 
					  <div class="col-sm-10">
						<div class="form-group">
						  <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
							onblur="this.placeholder = 'Enter Username'" placeholder='Enter  Name'>
							<div class="namealert"></div>
							
						</div>
					  </div>
					   <div class="col-sm-10">
						<div class="form-group">
						  <input class="form-control" maxlength="10" name="Phone" onkeypress="return isNumberKey(event)" id="Phone" type="text" onfocus="this.placeholder = ''"
							onblur="this.placeholder = 'Enter Phone'" placeholder='Enter Phone number'>
							<div class="phonealert"></div>
							
						</div>
					  </div>
					  <div class="col-sm-10">
						<div class="form-group">
						  <input class="form-control" name="Password" id="Password" type="Password" onfocus="this.placeholder = ''"
							onblur="this.placeholder = 'Enter Password'" placeholder='Enter  Password'>
							<div class="Passwordalert"></div>
						</div>
					  </div>
					   <div class="col-sm-10">
						<div class="form-group">
						  <input class="form-control" name="RePassword" id="RePassword" type="Password" onfocus="this.placeholder = ''"
							onblur="this.placeholder = 'Enter Re-Password'" placeholder='Enter  Re-Password'>
							<div class="RePasswordalert"></div>
						</div>
					  </div>
						<div class="col-sm-10">
						<div class="form-group">
						  <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
							onblur="this.placeholder = 'Enter email address'" placeholder='Enter email address'>
							<div class="Emailalert"></div>
						</div>
					  </div>
						
					   
					 </div>
					<div class="form-group mt-3">
					  <button type="submit" class="btn btn-primary py-3 px-4 btnRegistration">Submit</button>
					</div>
				</form>
				<div id="Result_Registion" class="login-welcom-msg"></div>
  			</div>
    	</div>
    </section>
    <script>
	$(document).ready(function(){
		
        $("#login").click(function() {
            //var element = $(this);
			
			 var usernametxt = $("#usernametxt").val();
	        var passwordtxt = $("#passwordtxt").val();
	        
			
	       
					
			var dataString = 'usernametxt='+ usernametxt+'&passwordtxt='+ passwordtxt;
	  	  //  var dataString = 'companyName='+ companyName;
	        if(usernametxt=='' || passwordtxt==''){
				if(usernametxt==''){
					$(".phoneNalert").fadeIn(100).html('<font color="red">Enter Phone Number</font>');
                    $(".phoneNalert").fadeIn().delay(2000).fadeOut();
					document.getElementById('usernametxt').focus();
				}
				if(usernametxt!='' && passwordtxt==''){
					$(".passwordLalert").fadeIn(100).html('<font color="red">Enter Password</font>');
                    $(".passwordLalert").fadeIn().delay(2000).fadeOut();
					document.getElementById('passwordtxt').focus();
					
				}
	            
				
	        }else{
			
				//$("#flash").show();
				//$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
					
				$.ajax({
				type: "POST",
				url: "process.php",
				data: dataString,
				cache: false,
					success: function(html){
					 // location.reload();	
					// alert('asdasdsa');
					$("#Result").html(html);
						// document.getElementById('usernametxt').value='';
						// document.getElementById('passwordtxt').value='';
					 var loginresult = $("#loginresult").val();
					  if(loginresult=='1'){
						  location.reload();	
						 document.getElementById('usernametxt').value='';
						 document.getElementById('passwordtxt').value='';
					  }else{
						  
					  }
					}
		        });
	        }
	        return false;
	    });
		
		//btnRegistration
		 $(".btnRegistration").click(function() {
           		
	        var name = $("#name").val();
	        var Phone = $("#Phone").val();
	        var Password = $("#Password").val();
	        var email = $("#email").val();
	        var RePassword = $("#RePassword").val();
	          var phonenocount = Phone.length;
			  
			  console.log(phonenocount);
	        if(phonenocount!=10){
				var Phonvalidat='invalid';
			}
	        		
			var dataString = 'RegistrationName='+ name+'&Phone='+ Phone+'&Password='+ Password+'&email='+ email;
	  	    //var dataString = 'companyName='+ companyName;
	        if(name=='' || Phone=='' || Password==''  || RePassword=='' || Phonvalidat=='invalid'){
	            if(name==''){
					$(".namealert").fadeIn(100).html('<font color="red">Enter Name</font>');
                    $(".namealert").fadeIn().delay(2000).fadeOut();
					  document.getElementById('name').focus();
				}
	            if(name!='' && Phone==''){
					$(".phonealert").fadeIn(100).html('<font color="red">Enter Name</font>');
                    $(".phonealert").fadeIn().delay(2000).fadeOut();
					document.getElementById('Phone').focus();
				}
				if(name!='' && Phone!='' && Password==''){
					$(".Passwordalert").fadeIn(100).html('<font color="red">Enter Password</font>');
                    $(".Passwordalert").fadeIn().delay(2000).fadeOut();
					document.getElementById('Password').focus();
				}
				if(name!='' && Phone!='' && Password!='' && RePassword==''){
					$(".RePasswordalert").fadeIn(100).html('<font color="red">Enter Re-Password</font>');
                    $(".RePasswordalert").fadeIn().delay(2000).fadeOut();
					document.getElementById('RePassword').focus();
				}
				if(name!='' && Phone!='' && Password!='' && RePassword!='' && Phonvalidat=='invalid'){
					$(".phonealert").fadeIn(100).html('<font color="red">Invalid Phone Number</font>');
                    $(".phonealert").fadeIn().delay(2000).fadeOut();
					document.getElementById('Phone').focus();
				}
				
	        }else{
				
				if(email!=''){
									
					function validateEmail(email) {
					  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
					  return re.test(email);
					}

				
				    var email = $("#email").val();
				
				    if (validateEmail(email)) {
					
					 var emailcheck = "true";
					} else {
						var emailcheck = "false";
						 
						$(".Emailalert").fadeIn(100).html('<font color="red">'+email + ' is not valid </font>');
						$(".Emailalert").fadeIn().delay(2000).fadeOut();
						document.getElementById('email').focus();
					}
				   
								
				}else{
					 var emailcheck = "true";
				}
				
				if(Password==RePassword){
					
					if(emailcheck=="true"){
									
						$.ajax({
						type: "POST",
						url: "process.php",
						data: dataString,
						cache: false,
							success: function(html){
							//  location.reload();	
							$("#Result_Registion").html(html);
								 document.getElementById('name').value='';
								 document.getElementById('Phone').value='';
								 document.getElementById('Password').value='';
								 document.getElementById('RePassword').value='';
								 document.getElementById('email').value='';
							
							}
						});
				    }
				}else{
					$(".RePasswordalert").fadeIn(100).html('<font color="red">Not match Password</font>');
                    $(".RePasswordalert").fadeIn().delay(2000).fadeOut();
				}
					
				
	        }
	        return false;
	    });
	});
</script>
 <?php include 'public/footer.php';?>
 <?php include 'public/scripts.php';?>
  </body>
</html>