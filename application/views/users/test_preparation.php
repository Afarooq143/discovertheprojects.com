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
			<div class="create">
		<div class="container">
			<div class="rwo">
				 <div class="panel panel-primary">
	 	<div class="panel-heading">
	   	Demo Mode
	   </div>
	   <div class="panel-body">
	   	<ul>
	       	<li>CIA Test Prep is in Demo mode. You will only have access to the first study unit.</li>
	           <li>You must purchase CIA Test Prep in order to receive full access to all study units.</li>
	           <li>Click the "Next" button below to continue to create a session in Demo Mode.</li>
	       </ul>
	       <div class="create-button two ">
				<center><button>Next</button>	 <button>Cancel</button></center>	
			</div>
			
	 	</div>
	 </div>
			</div>
		</div>
	</div>
		</div>
	</div>
</div>

<?php $this->load->view('users/include/footer');?>