<?php   session_start();  ?>
<!DOCTYPE html>
<html lang="en">
  <?php include 'public/head.php';?>
  <body>
  	 <?php include 'public/nav.php'?>
    <!-- END nav -->

    
<div id="Result"></div>

    <section class="ftco-about d-md-flex">
    	
    	<div class="one-half ftco-animate">
        <div class="heading-section ftco-animate ">
          <h3 class="mb-3">Login</h3>
        </div>
        <div>
       
		  
          <form class="form-contact contact_form" action="" method="post" id="contactForm"
            novalidate="novalidate">
            <div class="row">
             
              <div class="col-sm-10">
                <div class="form-group">
                  <input class="form-control" name="usernametxt" id="usernametxt" type="text" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter Phone No'" placeholder='Enter Phone No'>
                </div>
              </div>
              <div class="col-sm-10">
                <div class="form-group">
                  <input class="form-control" name="passwordtxt" id="passwordtxt" type="password" onfocus="this.placeholder = ''"
                    onblur="this.placeholder = 'Enter password'" placeholder='Enter password'>
                </div>
              </div>
             </div>
            <div class="form-group mt-3">
              <button type="button" id="login" class="btn btn-primary py-3 px-4">Login</button>
            </div>
          </form>
       
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
	            alert("Please enter Username and password");
				
	        }else{
				$("#flash").show();
				$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
					
				$.ajax({
				type: "POST",
				url: "process.php",
				data: dataString,
				cache: false,
					success: function(html){
					  location.reload();	
					$("#Result").html(html);
						
					//window.location.href='index.php';
					//$("#flash").hide();
					}
		        });
	        }
	        return false;
	    });
		
		
		//btnRegistration
		 $(".btnRegistration").click(function() {
            //var element = $(this);
			
			//console.log('ssss');
			
	        var name = $("#name").val();
	        var Phone = $("#Phone").val();
	        var Password = $("#Password").val();
	        var email = $("#email").val();
	       
	        alert(name);
			
			var dataString = 'RegistrationName='+ name+'&Phone='+ Phone+'&Password='+ Password+'&email='+ email;
	  	  //  var dataString = 'companyName='+ companyName;
	        if(name=='' || Phone=='' || Password=='' || email==''){
	
	            alert("Please enter Username and password");
				
	        }else{
				$("#flash").show();
				$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;<span class="loading">Loading Comment...</span>');
					
				$.ajax({
				type: "POST",
				url: "process.php",
				data: dataString,
				cache: false,
					success: function(html){
					  location.reload();	
					$("#Result_Registion").html(html);
						
					//window.location.href='index.php';
					//$("#flash").hide();
					}
		        });
	        }
	        return false;
	    });
		
		
		
    });
</script>

  

 <?php include 'public/footer.php';?>
 <?php include 'public/scripts.php';?>
    
  </body>
</html>