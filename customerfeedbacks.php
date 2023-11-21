<?php 
include 'Controller.php';
include 'Modules/ClassLoading.php';
$con = new ClassLoading();
$name='';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'public/head.php';?>
    <body>
  	<?php include 'public/nav.php';?>
    <section class="ftco-section2 ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate">
					<?php  
					if(isset($_GET['submit'])){
					   $feedback = $_GET['comment'];
					   $name = $_GET['name'];
					   $Result_Feedbck=$con->Insert_Feedback($feedback,$name);
					}
					$Result_Feedbckload=$con->Select_Feedback();
					  //echo date_format($date, 'g:ia \o\n l jS F Y');
					if($Result_Feedbckload!=''){
					?>
					   <h3 class="mb-5"><?php echo count($Result_Feedbckload);?> Comments</h3>
					<?php 
					}
					?>
					<ul class="comment-list">
					<?php 
					if(!empty($Result_Feedbckload)) {
						foreach ($Result_Feedbckload as $row) {
							$FeedbackID=$row['ID'];
							$FeedbackDes=$row['Description'];
							$FeedbackUsername=$row['Username'];
							$Feedbackdatetime=$row['datetime'];
							$date = date('Y/m/d H:i:s');
							?>
							 <li class="comment">
							  <div class="vcard bio">
								<img src="images/default.png" alt="Image placeholder">
							  </div>
							  <div class="comment-body">
								<h3><?php echo  $FeedbackUsername;?></h3>
								<div class="meta"><?php echo $Feedbackdatetime;?></div>
								<p><?php echo $FeedbackDes;?></p>
								<p><a href="#" class="reply" hidden>Reply</a></p>
							  </div>
							</li>
							<?php
							
						}
					}
				  	?>
					</ul>
					<!-- END comment-list -->
					<div class="comment-form-wrap pt-5">
					<h3 class="mb-5">Leave a comment</h3>
					<form class="form-contact comment_form" action="customerfeedbacks.php" id="commentForm">
						<div class="form-group">
							<label for="name">Name *</label>
							<input type="text" class="form-control" value=" <?php   if(isset($_SESSION['Username'])!=''){ echo $_SESSION['Username'];  }  ?>" name="name" id="name" required>
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea  name="comment" id="comment" cols="30" rows="7" class="form-control" required></textarea>
						</div>
						<div class="form-group">
							<input type="submit"  name="submit"  value="Post Comment" class="btn py-3 px-4 btn-primary">
						</div>
					</form>
					</div>
                </div> <!-- .col-md-8 -->
				<div class="col-md-4 sidebar ftco-animate" hidden>
				   	<div class="sidebar-box ftco-animate" hidden>
					  <div class="categories">
						<h3>Categories</h3>
						<li><a href="#">Tour <span>(12)</span></a></li>
						<li><a href="#">Hotel <span>(22)</span></a></li>
						<li><a href="#">Coffee <span>(37)</span></a></li>
						<li><a href="#">Drinks <span>(42)</span></a></li>
						<li><a href="#">Foods <span>(14)</span></a></li>
						<li><a href="#">Travel <span>(140)</span></a></li>
					  </div>
					</div>
					<div class="sidebar-box ftco-animate">
					  <h3>Recent Blog</h3>
					  <div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
						<div class="text">
						  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						  <div class="meta">
							<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
							<div><a href="#"><span class="icon-person"></span> Admin</a></div>
							<div><a href="#"><span class="icon-chat"></span> 19</a></div>
						  </div>
						</div>
					  </div>
					  <div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
						<div class="text">
						  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						  <div class="meta">
							<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
							<div><a href="#"><span class="icon-person"></span> Admin</a></div>
							<div><a href="#"><span class="icon-chat"></span> 19</a></div>
						  </div>
						</div>
					  </div>
					  <div class="block-21 mb-4 d-flex">
						<a class="blog-img mr-4" style="background-image: url(images/image_3.jpg);"></a>
						<div class="text">
						  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
						  <div class="meta">
							<div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
							<div><a href="#"><span class="icon-person"></span> Admin</a></div>
							<div><a href="#"><span class="icon-chat"></span> 19</a></div>
						  </div>
						</div>
					  </div>
					</div>
					<div class="sidebar-box ftco-animate" hidden>
					  <h3>Tag Cloud</h3>
					  <div class="tagcloud">
						<a href="#" class="tag-cloud-link">dish</a>
						<a href="#" class="tag-cloud-link">menu</a>
						<a href="#" class="tag-cloud-link">food</a>
						<a href="#" class="tag-cloud-link">sweet</a>
						<a href="#" class="tag-cloud-link">tasty</a>
						<a href="#" class="tag-cloud-link">delicious</a>
						<a href="#" class="tag-cloud-link">desserts</a>
						<a href="#" class="tag-cloud-link">drinks</a>
					  </div>
					</div>
					<div class="sidebar-box ftco-animate" hidden>
					  <h3>Paragraph</h3>
					  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
					</div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
    <?php include 'public/footer.php';?>
    <?php include 'public/scripts.php';?>
  </body>
</html>