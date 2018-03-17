
<div class="padding-top" style="padding-top: 80px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class=" account text-center">
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="images-Access-mina"  style="background-color: #137cc0; padding: 10px 0px 30px; ">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="height-vh-one">
				<div class="images-Access one col-md-3">
					<a href="#"><img src="<?php echo base_url();?>assets/user-assets/images/ass.png"></a>
				</div>
				<div class="images-Access col-md-3">
					<a href="#"><img src="<?php echo base_url();?>assets/user-assets/images/info.png"></a>
				</div>
				<div class="images-Access col-md-3">
					<a href="#"><img src="<?php echo base_url();?>assets/user-assets/images/notifications.png"></a>
				</div>
					<div class="images-Access col-md-3"">
					<a href="#"><img src="<?php echo base_url();?>assets/user-assets/images/demos.png"></a>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>	


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="CMA-Review">
				<div class="">
					<div class="x two">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<?php
								//print_r($this->session->userdata()); 
									echo $this->session->userdata('course');
								?>
							</div>
							<div class="panel-body">
	         					<div class="review-systems-block single-review">
	         						<?php 
	         						print_r($categories);
	         						for($i=0; $i<count($categories); $i++){

	         						?>
					                  	<div class="col-md-2">
		           					 		<div class="review-systems-content-two">
					                  		<h1><?php echo $categories[$i]->course; ?></h1>
						                     	<a class="review-systems-link-two img" href="#">
							                        <!-- <i class="fab fa-black-tie" ></i> -->
						                       		<div class="img-course"> <img src="<?php echo base_url();?>assets/user-assets/images/course.png"></div>
						                       		<!-- <form method="post" action="<?php echo base_url('index.php/ftcuser/testprepration');?>">
						                       			<input type="hidden" name="course_id" value="<?php echo $categories[$i]->course_id; ?>">
						                       			<input type="hidden" name="course" value="<?php echo $categories[$i]->course; ?>">


						                       			<input type="hidden" name="category_id" value="<?php echo $categories[$i]->category_id; ?>">
						                       			<input type="hidden" name="category_name" value="<?php echo $categories[$i]->category_name; ?>"> -->
						                       			<a href="<?php echo base_url('index.php/ftcuser/testprepration/'.base64_encode($categories[$i]->category_id));?>">
							                        	<div class="review-systems-name-two"><?php echo $categories[$i]->category_name; ?></div></a>
							                    	<!-- </form> -->
						                     	</a>
						                  	</div>
		            			 		</div>
		            			  	<?php } ?>
	        			 		</div>
	        			 	</div>
	        			</div>
			 		</div>
				</div>
			</div>
		</div>
	</div>
</div>

