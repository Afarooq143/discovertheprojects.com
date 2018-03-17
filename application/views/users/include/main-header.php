<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FTC International: Admin</title>
    <meta name="description" content="FTC International">
    <meta name="author" content="Discover The Projects - http://discovertheprojects.com">
    <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>/assets/images/logo/logo.png">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.0.6/css/all.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/user-assets/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/user-assets/css/fontawesome-one.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/user-assets/css/all.css">
	<link href="<?php echo base_url();?>/assets/user-assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>/assets/user-assets/css/style.css" rel="stylesheet">
</head>
<body>
	<header id="header">
		<div class="container">
			<div classs="row">
				<div class="col-md-3">
					<div class="logo">
						<img src="<?php echo base_url();?>assets/images/logo/logo.png">
					</div>
				</div>
				<div class="col-md-3" >
					<!-- <h4 style="padding: 35px;"></h4> -->
				</div>
				<div class="col-md-6">
					<div class="menu two" style="padding-top: 15px;">
						<ul class="menu-ul one two">
							<li><a href="#"><i class="fas fa-home" style="margin-right: 5px;"></i>Home</a></li>
							<li><a href="#"><i class="fas fa-cart-plus" style="margin-right: 5px;"></i>Cart</a></li>
							<li><a href="#"><i class="fas fa-cog" style="margin-right: 5px;"></i>services</a></li>
							<li><a href="<?php echo base_url('index.php/ftcinternational');?>"><i class="fas fa-sign-in-alt" style="margin-right: 5px;"></i>Admin Login</a></li>
							<?php if($this->session->userdata('email')){?>
								<button><i class="fas fa-user" style="font-size: 25px;"></i></button>

								<a href="<?php echo base_url('index.php/ftcuser/logout');?>"><i class="fas fa-sign-in-alt" style="margin-right: 5px;"></i>Logout</a>
							<?php } ?>
						</ul>

						<?php if($this->session->userdata('email')){?>
						<div class="col-md-5 right one">
							<div class="images-menu"><a href="#"><img src="<?php echo base_url();?>assets/user-assets/images/menu.png"></a></div>
							<!-- <i class="far fa-bars"></i>
							<i class="far fa-bars"></i>
							<i class="far fa-bars"></i> -->
							<a href="#"><h3 class="menu-in">Menu</h3></a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</header>

