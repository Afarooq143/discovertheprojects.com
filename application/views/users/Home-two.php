<!DOCTYPE html>
<html>
<head>
	<title> Demo </title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts/js/fa-regular.min.js">
	<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/mathjs/3.17.0/math.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/user-assets/font-awesome.min.css">
	<link href="<?php echo base_url()?>assets/user-assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/user-assets/css/style.css" rel="stylesheet">
</head>
<body>
<header id="header">
	<div class="container">
		<div classs="rwo">
			<div class="col-md-3">
				<div class="logo">
					<img src="<?php echo base_url()?>assets/user-assets/images/logo-1.png">
				</div>
			</div>
			<div class="col-md-3">
				<h4 style="padding: 35px;">Personal Classroom</h4>
			</div>
			<div class="col-md-6">
				<div class="menu">
					<ul class="menu-ul one">
						<li><a href="#">Home</a></li>
						<li><a href="#">View Cart</a></li>
						<?php if($this->session->userdata('email')){?>
						<li><a href="<?php echo base_url('index.php/Ftcuser/logout');?>">Logout</a></li>
						<?php }else {?>
						<li><a href="<?php echo base_url();?>">Login</a></li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>

<div class="" style="padding-top: 70px;">
	<div class="container">
		<div class="rwo">
			<div class="col-md-12">
				<div class=" account text-center">
					
				</div>
			</div>
		</div>
	</div>
</div>


<div class="">
	<div class="container">
		<div class="rwo">
			<div class="col-md-2">
				<div class="" style="background-color: #137cc0; width: 125px;">
				<div class="images-Access one">
					<a href="#"><img src="images/ass.png"></a>
				</div>
				<div class="images-Access">
					<a href="#"><img src="images/info.png"></a>
				</div>
				<div class="images-Access">
					<a href="#"><img src="images/notifications.png"></a>
				</div>
					<div class="images-Access" style="padding-bottom: 20px;">
					<a href="#"><img src="images/demos.png"></a>
				</div>
			</div>
			</div>

			<div class="col-md-10">
				<div class="CMA-Review">
					<div class="Please-review">
						<h3 style="font-weight: 700;">Welcome New Gleim Customer!</h3>
						<small>Please select from the buttons below.</small>
					</div>
					<div class="">
						<div class="review-systems">
         					<div class="review-systems-block single-review">
            
				               <div class="">
				                  <span ></span>
				                  
				               </div>
           					 <div class="review-systems-content-two">
               
		                  <div class="review-systems-button two">
		                     <a class="review-systems-link two" href="#">
		                        <img class="review-systems-img-two" src="images/free-demo.png">
		                        <div class="review-systems-name-two">FREE</div>
		                        <span class="review-systems-name-two">DEMO</span>
		                     </a>
		                  </div>
            			 </div>
            			  <div class="review-systems-content-two">
               
		                  <div class="review-systems-button two">
		                     <a class="review-systems-link two" href="#">
		                        <img class="review-systems-img-two" src="images/key.png">
		                        <span class="review-systems-name-two">Register</span>
		                        <span class="review-systems-name-two">Access</span>
		                        <span class="review-systems-name-two">Codes</span>
		                     </a>
		                  </div>
            			 </div>
        			 </div>
      
  					 </div>
					</div>
				</div>

			<div class="online-courses">
            	<a href="#" class="online-courses-link single-OL">
               <div class="online-courses-name">Free CMA Exam Questions for Part 2</div>
            	</a>
         </div>

			</div>
		</div>
	</div>
</div>

<?php $this->load->view('users/include/footer');?>