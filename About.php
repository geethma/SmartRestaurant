<?php include 'Controller.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'public/head.php';?>
    <body>
  	<?php include 'public/nav.php'?>
    <section class="home-slider owl-carousel img cust" style="background-image: url(images/bg_1.jpg);">
		<div class="slider-item" style="background-image: url(images/About.jpg);">
			<div class="overlay"></div>
			<div class="container">
			  <div class="row slider-text justify-content-center align-items-center">

				<div class="col-md-7 col-sm-12 text-center ftco-animate">
					<h1 class="mb-3 mt-5 bread">Services</h1>
					<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Services</span></p>
				</div>

			  </div>
			</div>
		</div>
    </section>
    <section class="ftco-section ftco-services">
    	<div class="overlay"></div>
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Our Facilities</h2>
            <p>Our mission is to be our customers’ favorite place and way to eat and drink.</p>
            <p>Everything we do is about you. From chefs who create exciting new flavors, to crew members who know exactly how you want your drink – we prioritize what you need to get you on your way. We strive to keep you at your best, and we remain loyal to you, your tastes and your time. </p>
          </div>
        </div>
    		<div class="row">
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<img class="icon-about" src="images/icon/chat-bubble.png">
              	
              </div>
              <div class="media-body">
                <h3 class="heading">Standalone Restaurant</h3>
                <p>Allow your customers to order directly from your online food ordering system with multiple integrated payment portals.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
              	<img class="icon-about" src="images/icon/food.png">
              	
              </div>
              <div class="media-body">
                <h3 class="heading">Collect Orders in a Simple Way</h3>
                <p> Let your customers come to your platform easily, choose what they want, and make payments. Research shows that mismanaged food ordering systems irritate customers and some of them may even go away to your competitors.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-4 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="icon d-flex justify-content-center align-items-center mb-5">
			      <img class="icon-about" src="images/icon/food-and-restaurant.png">
			  </div>
              <div class="media-body">
                <h3 class="heading">Manage your Menu</h3>
                <p> This way, you will be able to manage your order better and without causing any dissonance.</p>
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