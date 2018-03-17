<div style="background: linear-gradient(#248cb1, #7a79c9);">
	<div class="cma-text-t">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class=" account text-center">

					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="form-Registration">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p style="color: red"><?php echo $this->session->flashdata('Login'); ?></p>
					<div class="form">
						<form id="form" method="post" action="<?php echo base_url('index.php/ftcuser/login');?>">
							<div class="loginBoxFull">
								<div class="header-Login">Login</div>
								<div class="loginInput">
									<input type="text" name="email" class="hoverRed" id="email" placeholder="Email Address">
									<input type="password" name="password" class="hoverRed passwordBox" id="password" placeholder="Password">
								</div>
									<span><?php echo form_error('email'); ?></span>
									<span><?php echo form_error('password'); ?></span>
								<button class="sm_darkBlueButton">SIGN IN</button>
								<small class="Forgot-password">
									<a href="#">Forgot your password?</a>
								</small>  
								<div class="Remember-email">
									<input type="checkbox" class="rememberlogin" id="remember_login">
									<label class="cancelLabel">Remember Email</label>
									<input type="checkbox" class="preserveSession" id="preserve_session">
									<label class="cancelLabel">Keep Me Logged In</label>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="col-md-6">
					<div class="Registration-form whiteContainer container-fluid card card-signup" id="registerForm">
						<div class="border-radius">
							<div class="header header-primary text-center">Account Registration</div>
							<?php echo $this->session->flashdata('register'); ?>
							<form class="form-border" method="post" action="<?php echo base_url();?>">
								<div class="content-form col-md-12" style="padding-right:0px;">
									<div class="col-md-1">
										<i class="fa fa-user"></i>
									</div>
									<div class="col-md-6">
										<input type="text" name="first_name" placeholder="First Name" style="width: 100%;">
										<?php echo form_error('first_name'); ?> 
									</div>
									<div class="col-md-5">
										<input type="text" name="last_name" placeholder="Last Name" style="width: 100%;">
										<?php echo form_error('last_name'); ?>
									</div>
								</div>

								<div class="content-form col-md-12" style="padding-right:0px;">
									<div class="col-md-1">
										<i class="fa fa-envelope"></i>
									</div>
									<div class="col-md-6" >
										<input type="text" name="re_email" placeholder="Email" style="width: 100%;">
										<?php echo form_error('re_email'); ?>
									</div>
									<div class="col-md-5" >
										<input type="text" name="phone" placeholder="Phone" style="width: 100%;">
											<?php echo form_error('phone'); ?>
									</div>
								</div>
								<div class="content-form col-md-12" style="padding-right: 0px;">
									<div class="col-md-1">
										<i class="fa fa-key"></i>
									</div>
									<div class="col-md-6">
										<input type="password" name="re_password" placeholder="Password" style="width: 100%;">
										<?php echo form_error('re_password'); ?>
									</div>
									<div class="col-md-5">
										<input type="text" name="con_password" placeholder="Confirm Password" style="width: 100%;">
										<?php echo form_error('con_password'); ?>
									</div>
								</div>
								
								<div class="content-form col-md-12">
									<div class="#">
										<div class="col-md-1">
											<i class="fa fa-home"></i>
										</div>
										<div class="col-md-11" style="padding-right: 0px;">
											<input type="text" name="address" placeholder="Address" style="width: 100%;">
											<?php echo form_error('address'); ?>
										</div>
									</div>
								</div>
								<div class="content-form col-md-12">
									<div class="#">
										<div class="col-md-1">
											<i class="fa fa-book"></i>
										</div>
										<div class="col-md-11" style="padding-right: 0px;">
											<input type="text" name="qualification" placeholder="Qualification" style="width: 100%;">
											<?php echo form_error('qualification'); ?>
										</div>
									</div>
								</div>
								<div class="content-form col-md-12">
									<div class="#">
										<div class="col-md-1">
											<i class="fa fa-map-marker"></i>
										</div>
										<div class="col-md-11" style="padding-right: 0px;">
											<select id="course_id" name="course_id" class="form-control border " autocomplete="country-name" x-autocompletetype="country"  style="width: 100%; display: inline-block; border:0px;border-radius: 0px;padding: 0px 5px;color: #000;background: #eeeeee;">
												<option>Select Course</option>
												<?php if($allCourses){
							  							foreach($allCourses as $course => $value){?>
	                           							<option value="<?php echo $value->id;?>"><?php echo $value->course;?></option>
	                         					<?php } 
	                         					} ?>
											</select>
										</div>
											<?php echo form_error('course_id'); ?>
									</div>
								</div>
								<div class="content-form col-md-12">
									<div class="#">
										<div class="col-md-1">
											<i class="fa fa-map-marker"></i>
										</div>
										<div class="col-md-11" style="padding-right: 0px;">
											<select id="country" name="country_id" class="form-control border " autocomplete="country-name" x-autocompletetype="country"  style="width: 100%; display: inline-block; border:0px;border-radius: 0px;padding: 0px 5px;color: #000;background: #eeeeee;">
												<option >Select Country</option>
												<?php if($get_all_country){
							  							foreach($get_all_country as $key => $value){?>
	                           							<option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
	                         					<?php } 
	                         					} ?>
											</select>
										</div>
											<?php echo form_error('country_id'); ?>
									</div>
								</div>
								<div class="content-form col-md-12">
									<div class="#">
										<div class="col-md-1">
											<i class="fa fa-map-marker"></i>
										</div>
										<div class="col-md-11" style="padding-right: 0px;">
											<select id="state_id" name="state_id" class="form-control border " autocomplete="state_id" x-autocompletetype="state_id"  style="width: 100%; display: inline-block; border:0px;border-radius: 0px;padding: 0px 5px;color: #000;background: #eeeeee;">
												<option >Select State</option>
												
											</select>
										</div>
											<?php echo form_error('state_id'); ?>
									</div>
								</div>
								<div class="content-form col-md-12">
									<div class="#">
										<div class="col-md-1">
											<i class="fa fa-map-marker"></i>
										</div>
										<div class="col-md-11" style="padding-right: 0px;">
											<div class="#">
												<input type="text" name="zipcode" placeholder="ZIP/Postal" style="width: 100%; border: 0px solid #ccc;padding: 7px 5px;">
											</div>
											<?php echo form_error('zipcode'); ?>
										</div>
									</div>
								</div>
								
								<!-- <div class="content-form col-md-12">
									<div class="#">
										<div class="col-md-1">
											<i class="fa fa-map-marker"></i>
										</div>
										<div class="col-md-11" style="padding-right: 0px;">
											<select id="couCode" name="couCode" class="form-control border " autocomplete="country-name" x-autocompletetype="country"  style="width: 100%; display: inline-block; border:0px;border-radius: 0px;padding: 0px 5px;color: #000;background: #eeeeee;">
												<option value="AF">Select State</option>
												<option value="AX">ALAND ISLANDS</option>
												<option value="AL">ALBANIA</option>
												<option value="DZ">ALGERIA</option>
												<option value="AS">AMERICAN SAMOA</option>
												<option value="AD">ANDORRA</option>
											</select>
										</div>
									</div>
								</div> -->
								<div class="content-form col-md-12 button">
									<div class="#">
										<button type="submit" name="register_submit">Sign Up</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>