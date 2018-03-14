<!DOCTYPE html>
<html>
<head>
	<title> Demo </title>
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
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<div class="menu">
					<h3>FTC-Mock Test Prepration</h3>
					<div class="col-md-7"></div>
					<div class="col-md-5 right">
						<div class="images-menu"><a href="#"><img src="<?php echo base_url()?>assets/user-assets/images/menu.png"></a></div>
						<!-- <i class="far fa-bars"></i>
						<i class="far fa-bars"></i>
						<i class="far fa-bars"></i> -->
						<a href="#"><h3 class="menu-in">Menu</h3></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="cma-text">
	<div class="container">
		<div class="rwo">
			<div class="col-md-6">
				<div class="cmo-heding">
					<h1>COM | Part 1</h1>
				</div>
			</div>
			<div class="col-md-6">
				<div class="cmo-button">
					<button>Back</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="create">
	<div class="container">
		<div class="rwo">
			<div class="col-md-3">
				<div class="meet-fild">
				  <form action = "<?php echo base_url('index.php/Ftcuser/test_preparation')?>"  method = "post">
					<div class="create-header">
						<h4 class="text-h4">Create A</h4>
						<h4>Practice Exam</h4>
					</div>
					<div class="create-text">
						<p> Practice exams stimlate a real exam environment. You will not knowwhich questions you have answeredcorrectly untill the session is graded     </p>
					</div>
					<div class="create-button">
						<button type="submit">Create One Now</button>	
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="meet-fild">
					<div class="create-header">
						<h4 class="text-h4">Creat A </h4>
						<h4>Study Session</h4>
					</div>
					<div class="create-text">
						<p> Study Session give you immediate feedback as you answer question   </p>
					</div>
					<div class="create-button twos">
						<button>Create One Now</button>	
					</div>
				</div>
			</div>
				<div class="col-md-3 two">
				<div class="meet-fild">
					<div class="create-header">
						<h4 class="text-h4">Performance </h4>
						<h4>Analysis</h4>
					</div>
					<div class="create-text">
						<p> View grade reports, session statistics, and history information of all previous sessions. You may also Create review sessions from History    </p>
					</div>
					<div class="create-button two">
						<button>View Now</button>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="Program-text">
	<div class="container">
		<div class="rwo">
			<div class="col-md-12">
				<div class="Program-button">
					<button>Program Feedback</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('users/include/footer');?>