<?php session_start();  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Smart Restaurant</title>
	 <link rel="icon" href="images/dinner.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="style/fonts1.css" rel="stylesheet">
    <link href="style/fonts2.css" rel="stylesheet">

    <link rel="stylesheet" href="style/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="style/animate.css">
    
    <link rel="stylesheet" href="style/owl.carousel.min.css">
    <link rel="stylesheet" href="style/owl.theme.default.min.css">
    <link rel="stylesheet" href="style/magnific-popup.css">

    <link rel="stylesheet" href="style/aos.css">

    <link rel="stylesheet" href="style/ionicons.min.css">

    <link rel="stylesheet" href="style/bootstrap-datepicker.css">
    <link rel="stylesheet" href="style/jquery.timepicker.css">

    
    <link rel="stylesheet" href="style/flaticon.css">
    <link rel="stylesheet" href="style/icomoon.css">
    <link rel="stylesheet" href="style/style.css">
	<style>
	.featured {
		margin-top: -314px;
		border-top: 1px solid rgba(255, 255, 255, 0.1);
	}
	.col-md-12.col-sm-12.text-center.ftco-animate.fadeInUp.ftco-animated {
		top: -92px;
	}
	.banner-text{
	font-size:20px !important;
	}


	.featured .featured-menus .menu-img {
		width: 120px;
		height: 120px;
		margin: 0 auto;
		margin-bottom: 10px;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		-ms-border-radius: 50%;
		border-radius: 3%;
	}

	@media only screen and (max-width: 768px) {
		 .col-md-12.col-sm-12.text-center.ftco-animate.fadeInUp.ftco-animated {
		top: -200px;
	}
	
	
	.featured {
		/* left: 119px; */
		position: absolute;
		margin-top: -445px;
		/* border-top: 1px solid rgba(255, 255, 255, 0.1); */
	}
	
	
	
	.featured .featured-menus .menu-img {
		width: 59px;
		height: 59px;
		margin: 0 auto;
		margin-bottom: 10px;
		-webkit-border-radius: 50%;
		-moz-border-radius: 50%;
		-ms-border-radius: 50%;
		border-radius: 3%;
	}
	
	
	.row.menu-mobile .col-md-2 {
		width: 45%;
	}
	.row.menu-mobile .col-md-2 h3 {
		color:white;
	}
	.owl-carousel.home-slider .slider-item .slider-text .subheading {
		font-size: 49px;
		color: #c8a97e;
		font-weight: normal;
		font-family: "Great Vibes", cursive;
		margin-bottom: 0;
		line-height: 1;
	}
	
	
	
}





.cart-box {
		background-color: red;
		padding: -3px 0px 0px 0px;
		position: absolute;
		top: 0px;
		width: 113px;
		padding: 37px 31px 51px 0px;
		border-radius: 0px 0px 21px 19px;
	}

	.cart-box p.cart-totale {
		color: white;
		position: absolute;
		font-size: 18px;
		top: 44px;
		width: 100%;
	   
		text-align: center;
		font-family: "Josefin Sans", Arial, sans-serif;
	}

	.cart-box span {
		position: absolute;
		color: white;
		top: 10px;
		font-size: 28px;
		width: 100%;
		text-align: center;
	}
	p.cart-qt {
		font-size: 15px;
		position: absolute;
		top: -7px;
		right: 31px;
		width: 18px;
		height: 18px;
		background-color: black;
		border-radius: 7px;
		text-align: center;
	}
	@media only screen and (max-width: 768px) {
		.cart-box {
			background-color: #ff000000;
			padding: -3px 0px 0px 0px;
			position: absolute;
			top: 7px;
			width: 38px;
			/* padding: 20px 20px 22px 0px; */
			/* border-radius: 35px 35px 35px 39px; */
			/* color: red !important; */
			margin-left: -15px;
		}

		.cart-box p.cart-totale {
			display: none;
			color: white;
			position: absolute;
			font-size: 18px;
			top: 44px;
			width: 100%;
			text-align: center;
			font-family: "Josefin Sans", Arial, sans-serif;
		}
		p.cart-qt {
			font-size: 15px;
			position: absolute;
			top: -12px;
			right: -6px;
			width: 18px;
			height: 18px;
			background-color: #ea0b0b;
			border-radius: 7px;
			text-align: center;
		}
		.cart-box-mobite{
			display:block !important;
		}
		.cart-box-desktop{
			display:none !important;
		}

	}
	.cart-box-mobite{
		display:none;
	}
	.cart-box-desktop{
		display:block;
	}
	</style>
  </head>
  <body>
    <div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+94 234 098 222</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">smartrestaurantl@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><span>Open hours:</span> <span>Monday - Sunday</span> <span>8:00AM - 9:00PM</span></p>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Smart Restaurant</a>
		  
		  
		  <span class="cart-box-mobite">
			<a href="checkout.php">
				<?php 
				if(isset($_SESSION["item_total"])){
					?> <div class="cart-box" style="display:block"><?php
				}else{
					?> <div class="cart-box" style="display:none"><?php
				}
				?>
					
				<P class="cart-totale totale">
				<?php 
				if(isset($_SESSION["item_total"])){
					echo 'Rs '.number_format($_SESSION["item_total"],2);
				}else{
					echo 'Rs 00.00 ';
				}
				?>
				</P>
				<span class="icon-shopping-cart"><p class="cart-qt"><?php  if(isset($_SESSION["item_Qty"])){ echo $_SESSION["item_Qty"]; }?></p></span>
				</div>
			</a>
		</span>
		  
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="icon icon-menu"></span>  Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	       <ul class="navbar-nav ml-auto">
	       
	                 	<li class="nav-item"><a href="About.php" class="nav-link">About Us</a></li>
				<li class="nav-item"><a href="customerfeedbacks.php" class="nav-link">Customers Feedback</a></li>
					<?php 
					if(isset($_SESSION['UserRoleID'])!=''){
						if($_SESSION['UserRoleID']=='1'){
							?>
							   <li class="nav-item">
									<a class="nav-link" href="Orders.php"><i class="fa fa-user"> </i><?php echo $_SESSION['Username'];?></a>
								</li>
							<?php
						}else{
							?>
							<li class="nav-item">
								<a class="nav-link" href="checkout.php"><i class="fa fa-user"> </i> <?php echo $_SESSION['Username'];?></a>
							</li>
							<?php
						}
						?>
							<li class="nav-item">
								<a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"> </i>Logout</a>
							</li>
						<?php
					}else{
							if(isset( $_SESSION['Username'])!=''){
						?>
						<li class="nav-item">
							<a class="nav-link" href="checkout.php"><i class="fa fa-user"> </i>
							   <?php 
							
									echo   $_SESSION['Username'];
								?>
							</a>
						</li>
						<?php
						
						}
						?>
						<li class="nav-item">
							<a class="nav-link" href="Registration.php"><i class="fas fa-sign-in-alt"> </i>Login</a>
						</li>
						<?php
					}
					?>
					
					<?php 
					if(isset($_SESSION["item_total"])){
						?>
						<li class="nav-item cart-box-desktop">
							<a href="checkout.php">
								<?php 
								if(isset($_SESSION["item_total"])){
									?>
									<div class="cart-box" style="display:block"><?php
								}else{
									?> 
									<div class="cart-box" style="display:none"><?php
								}
								?>
									<P class="cart-totale totale">
									<?php 
									if(isset($_SESSION["item_total"])){
										echo 'Rs '.number_format($_SESSION["item_total"],2);
									}else{
										echo 'Rs 00.00 ';
									}
									?>
									</P>
									<span class="icon-shopping-cart"><p class="cart-qt"><?php  if(isset($_SESSION["item_Qty"])){ echo $_SESSION["item_Qty"]; }?></p></span>
								</div>
							</a>
						</li>
						<?php
						
					}
					
					?>
				
	         
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider owl-carousel js-fullheight">
      <div class="slider-item js-fullheight" style="background-image: url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate" >
            	<span class="subheading">Smart Restaurant</span>
              <h1 class="mb-4 banner-text" >Best Restaurant</h1>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text js-fullheight justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate" >
            	<span class="subheading">Smart Restaurant</span>
              <h1 class="mb-4 banner-text" >Nutritious &amp; Tasty</h1>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item js-fullheight" style="background-image: url(images/bg_3.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate" >
            	<span class="subheading">Smart Restaurant</span>
              <h1 class="mb-4 banner-text" >Delicious Specialties</h1>
            </div>

          </div>
        </div>
      </div>
	   <div class="slider-item js-fullheight" style="background-image: url(images/bg_5.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-12 col-sm-12 text-center ftco-animate" >
            	<span class="subheading">Smart Restaurant</span>
              <h1 class="mb-4 banner-text" >Delicious Specialties</h1>
            </div>

          </div>
        </div>
      </div>
	  
	  
	  
    </section>
    <section class="ftco-section ftco-no-pt ftco-no-pb">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="featured">
    					<div class="row menu-mobile">
    						<div class="col-md-2">
    							<a href="Menu.php?categoryID=1"><div class="featured-menus ftco-animate">
								  <div class="menu-img img" style="background-image: url(images/C_1.jpg);"></div>
								  <div class="text text-center">
								      <h3>Main Course</h3>  
								  </div>
			                      </div>
						        </a>
    						</div>
    						<div class="col-md-2">
    						<a href="Menu.php?categoryID=7"><div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/C_2.jpg);"></div>
			              <div class="text text-center">
		                  <h3>Short Course </h3>
				              
			              </div>
			            </div></a>
    						</div>
    						<div class="col-md-2">
    							<a href="Menu.php?categoryID=8"><div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/C_3.jpg);"></div>
			              <div class="text text-center">
		                  <h3>Soup & Salad</h3>
				             
			              </div>
			            </div></a>
    						</div>
    						<div class="col-md-2">
    				<a href="Menu.php?categoryID=4">	<div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/C_4.jpg);"></div>
			              <div class="text text-center">
		                  <h3>Dessert</h3>
				             
			              </div>
			            </div></a>
    					</div>
						
						<div class="col-md-2">
    							<a href="Menu.php?categoryID=5"><div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/C_5.jpg);"></div>
			              <div class="text text-center">
		                  <h3>Drink</h3>
				           
			              </div>
			            </div></a>
    					</div>
						<div class="col-md-2">
    							<a href="Menu.php?categoryID=6"><div class="featured-menus ftco-animate">
			              <div class="menu-img img" style="background-image: url(images/C_6.jpg);"></div>
			              <div class="text text-center">
		                  <h3>Pizza</h3>
				              
			              </div>
			            </div></a>
    					</div>
						
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>
	

	



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="script/jquery.min.js"></script>
  <script src="script/jquery-migrate-3.0.1.min.js"></script>
  <script src="script/popper.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
  <script src="script/jquery.easing.1.3.js"></script>
  <script src="script/jquery.waypoints.min.js"></script>
  <script src="script/jquery.stellar.min.js"></script>
  <script src="script/owl.carousel.min.js"></script>
  <script src="script/jquery.magnific-popup.min.js"></script>
  <script src="script/aos.js"></script>
  <script src="script/jquery.animateNumber.min.js"></script>
  <script src="script/bootstrap-datepicker.js"></script>
  <script src="script/jquery.timepicker.min.js"></script>
  <script src="script/scrollax.min.js"></script>

  <script src="script/main.js"></script>
    
  </body>
</html>