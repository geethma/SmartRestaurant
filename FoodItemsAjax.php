<script>
$(document).ready(function (e) {
	
	
// $("#uploadimage").on('submit',(function(e) {
// e.preventDefault();
// $("#message").empty();
// $('#loading').show();
// $.ajax({
// url: "FoodItemsProcess.php", // Url to which the request is send
// type: "POST",             // Type of request to be send, called as method
// data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
// contentType: false,       // The content type used when sending data to the server.
// cache: false,             // To unable request pages to be cached
// processData:false,        // To send DOMDocument or non processed data file it is set to false
// success: function(data)   // A function to be called if request succeeds
// {
	// $('#loading').hide();
	// $("#message").html(data);
// }
// });
// }));

// // Function to preview image after validation
// $(function() {
// $("#file").change(function() {
// $("#message").empty(); // To remove the previous error message
// var file = this.files[0];
// var imagefile = file.type;
// var match= ["image/jpeg","image/png","image/jpg"];
// if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
// {
// $('#previewing').attr('src','noimage.png');
// $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
// return false;
// }
// else
// {
// var reader = new FileReader();
// reader.onload = imageIsLoaded;
// reader.readAsDataURL(this.files[0]);
// }
// });
// });
// function imageIsLoaded(e) {
// $("#file").css("color","green");
// $('#image_preview').css("display", "block");
// $('#previewing').attr('src', e.target.result);
// $('#previewing').attr('width', '250px');
// $('#previewing').attr('height', '230px');
// };




//--------------------

    $('#Foodtype').change(function(){
		var Foodtype =$('#Foodtype').val();
		c
		if(Foodtype=='1'){
		 $('.Sub').hide();
        $('.Main').show();
		}else{
			 $('.Sub').show();
            $('.Main').hide();
		}
       
    });

   //sub food id insert 
  $('#save_SubFoodID').click(function(){
        var val = [];
        $(':checkbox:checked').each(function(i){
          val[i] = $(this).val();
			console.log(val);
			$("#subfoodIDlist").val(val);
			
			
			//var dataString = 'searchbranchKey='+ searchbranchKey ;
			$.ajax({
			type: "POST",
			url: "SubFoodItemsProcess.php",
			data:val,
			cache: false,
			success: function(html){
		  	$("#Result_subFoodId").html(html);
							//$("#CustomerName").css("background","#FFF");
			}
			});
			
			
 
        });
      });
	  
	  
	  
	  //---------------- Transer 
	  
	   $('#transerbtn').click(function(){
		   
		   
		   
		    var selected = new Array();
 
            //Reference the CheckBoxes and insert the checked CheckBox value in Array.
            $("#transer_menuId input[type=checkbox]:checked").each(function () {
                selected.push(this.value);
            });
 
            //Display the selected CheckBox values.
            if (selected.length > 0) {
                //alert("Selected values: " + selected.join(","));
            }
		   var pass ='true';
		   var Main_Food_ID =$("#Main_Food_ID").val();
		   var dataString = 'pass='+ pass +'&selected='+ selected +'&Main_Food_ID='+ Main_Food_ID;
    		console.log(selected);
			//var dataString = 'searchbranchKey='+ searchbranchKey ;
			$.ajax({
				type: "POST",
				url: "FoodMenuTransfer.php",
				data:dataString,
				cache: false,
				success: function(html){
				$("#Result_Transfer").html(html);
								//$("#CustomerName").css("background","#FFF");
				}
			});
			
			
 
        //});
      });
	  
	  //--------------END 
	  
	  

	  
	  
	  //--------------removebtn 
	   $('#removebtn').click(function(){
		   
		   console.log('aaaaa');
		   
		    var selected = new Array();
 
            //Reference the CheckBoxes and insert the checked CheckBox value in Array.
            $(".selectedFoodItem input[type=checkbox]:checked").each(function () {
                selected.push(this.value);
            });
 
            //Display the selected CheckBox values.
            if (selected.length > 0) {
               // alert("Selected values: " + selected.join(","));
            }
		   var pass2 ='true';
		   var Main_Food_ID =$("#Main_Food_ID").val();
		   var Main_Cat_ID =$("#Main_Cat_ID").val();
		   var dataString = 'pass2='+ pass2 +'&selected='+ selected +'&Main_Food_ID='+ Main_Food_ID+'&Main_Cat_ID='+ Main_Cat_ID;
    		console.log(selected);
			//var dataString = 'searchbranchKey='+ searchbranchKey ;
			$.ajax({
				type: "POST",
				url: "FoodMenuTransfer.php",
				data:dataString,
				cache: false,
				success: function(html){
				$(".Result_SelectedFItem").html(html);
								//$("#CustomerName").css("background","#FFF");
				}
			});
			
			
 
        //});
      });
	  
	  //--------------END 

});
</script>