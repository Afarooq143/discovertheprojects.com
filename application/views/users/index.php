

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
						<a href="#"><img src="<?php echo base_url()?>assets/user-assets/images/ass.png"></a>
					</div>
					<div class="images-Access">
						<a href="#"><img src="<?php echo base_url()?>assets/user-assets/images/info.png"></a>
					</div>
					<div class="images-Access">
						<a href="#"><img src="<?php echo base_url()?>assets/user-assets/images/notifications.png"></a>
					</div>
					<div class="images-Access" style="padding-bottom: 20px;" >
						<a href="#"><img src="<?php echo base_url()?>assets/user-assets/images/demos.png"></a>
					</div>
			   </div>
		    </div>

			<div class="col-md-10">
				<div class="CMA-Review">
					<div class="">
						<div class="review-systems">
         					<div class="review-systems-block single-review" id="demo_div">
                                <div class="review-systems-content">
                                    <div class="review-systems-button" >
				                      <a class="review-systems-link fdemo" href="#" data = "0">
				                        <img class="review-systems-img" src="<?php echo base_url()?>assets/user-assets/images/cma.png">
				                        <div class="review-systems-name">Free Demo</div>
				                      </a>
				                    </div>
				                   <div class="review-systems-button">
				                      <a class="review-systems-link fdemo" href="#" data = "1" >
				                        <img class="review-systems-img" src="<?php echo base_url()?>assets/user-assets/images/cma.png">
				                        <div class="review-systems-name">Purchase</div>
				                      </a>
				                  </div>

		            			 </div>
		        			 </div>
                        </div>

                        <div class="review-systems" style="display: none;" id="course_div">
         					<div class="review-systems-block single-review">
                               <?php if(isset($get_courses)){?>
                              
                                <div class="review-systems-content">
                                 <?php foreach($get_courses as $value){?>
                                    <div class="review-systems-button" >
				                      <a class="review-systems-link fcourse" href="#"  data = "<?php echo $value->id;?>">
				                        <div class="review-systems-name"><?php echo $value->course;?></div>
				                      </a>
				                    </div>
				                <?php }?>

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


