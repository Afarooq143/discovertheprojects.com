<div class="content-page">
    <div class="content">           
        <div class="container-fluid">  
        	<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Courses</h1>
                        <ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Dashboard</li>
							<li class="breadcrumb-item active">Courses</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
				</div>
			</div>  
			 <?php if(isset($action) && $action=='add'){ ?>     	
			<div class="row">			
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">		
					<div class="card mb-3 panel">
						<div class="card-header panel-info">
							<h3><i class="fa fa-file"></i> <?php echo $title; ?> Courses</h3>
						</div>								
						<div class="card-body">							
						 <?php if($this->session->flashdata('query-msg')){ ?>
	                                <div class="alert <?php echo $this->session->flashdata('query-class') ; ?>" role="alert">
	                                    <?php echo $this->session->flashdata('query-msg'); ?>
	                                </div>
                         <?php  } ?>											
							<form method="post" action="<?php echo base_url(INDEX_PHP.'ftcinternational/coursesadd');?>" data-parsley-validate novalidate>
								<?php if(isset($singleRecord[0]->id)){ ?>
                                    <input type="hidden" name="updateid" value="<?php echo $singleRecord[0]->id; ?>">
                                <?php } ?>  


								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-left">
	                                    <div class="form-group">
	                                        <label for="courseName">Course Name<span class="text-danger">*</span></label>
	                                        <input type="text" name="course" data-parsley-trigger="change" required placeholder="Course Name" class="form-control" id="coueseName" value="<?php echo isset($singleRecord[0]->course) ? $singleRecord[0]->course : ""; ?>">
	                                    </div>
	                                </div>
	                                <div class="course col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5" style="color: red; padding-left: 15px;">
                                        <?php echo form_error('course'); ?>    
                                    </div>
	                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-right">
                                        <div class="form-group">
                                            <label for="courseCategory">Course Category<span class="text-danger">*</span></label>
                                            <!-- <input type="text" name="category" data-parsley-trigger="change" required placeholder="Enter Course Category" class="form-control" id="course"> -->
                                            <select name="category_type" data-parsley-trigger="change"   class="form-control" id="course" required>
                                            	
                                            	<option value="">Select</option>
                                            	<option value="Parts" <?php echo isset($singleRecord[0]->category_type) && $singleRecord[0]->category_type == 'Parts' ? 'selected' : '' ?> >Parts</option>
                                            	<option value="Subjects" <?php echo isset($singleRecord[0]->category_type) && $singleRecord[0]->category_type == 'Subjects' ? 'selected' : '' ?> >Subjects</option>
                                            	<option value="Papers" <?php echo isset($singleRecord[0]->category_type) && $singleRecord[0]->category_type == 'Papers' ? 'selected' : '' ?> >Papers</option>
                                            </select>
                                        </div>
                                         <div class="category col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5" style="color: red; padding-left: 15px;">
                                        	<?php echo form_error('category_type'); ?>    
                                    	</div>
	                                </div>
	                            </div>
	                            <div class="clearfix"></div>
	                            <div class="input_fields_wrap">
		                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-left">
	                                        <div class="form-group">
	                                        	<?php if(isset($course_category[0]->category_id)){ ?>
				                                    <input type="hidden" name="updateCategoryid" value="<?php echo $course_category[0]->category_id; ?>">
				                                <?php } ?>  

	                                            <label for="categoryName">Category Name<span class="text-danger">*</span></label>
	                                            <input id="categoryName" name="category_name[]" type="text" placeholder="Category Name (eg. Part 1, Subject Name, Paper Name)" required class="form-control" value="<?php echo isset($course_category[0]->category_name) ? $course_category[0]->category_name : ""; ?>">
	                                        </div>
	                                        <div class="category_name col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5" style="color: red; padding-left: 15px;">
	                                        	<?php echo form_error('category_name[]'); ?> 
	                                    	</div>
	                                    </div>
	                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-right">
	                                        <div class="form-group">
	                                        	<label for="categoryName">Add More</label><br>
	                                           <button class="btn btn-success add_field_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add More Category"><i class="fa fa-plus"></i></button>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="clearfix"></div>
	                                <?php if(isset($course_category) && count($course_category)>0){
	                                		for($i=1; $i < count($course_category); $i++){
	                                ?>

	                                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
			                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pull-left">
			                                    <div class="form-group">
			                                          <label for="categoryName">Category Name<span class="text-danger">*</span></label>
			                                          <input id="categoryName" name="category_name[]" type="text" placeholder="Category Name (eg. Part 1, Subject Name, Paper Name)" required class="form-control" value="<?php echo isset($course_category[$i]->category_name) ? $course_category[$i]->category_name : ""; ?>">
			                                      
			                                            <label for="categoryName">Remove</label><br>
			                                             <button class="btn btn-danger remove_field"><i class="fa fa-times"></i></button>
	                                           </div>
	                                            <?php echo form_error('category_name[]'); ?> 
                                 			</div>
                                  		</div>
	                                <?php 	} 
	                            	}
	                                ?>
                            	</div>
                                <div class="clearfix"></div>
										
                                <div class="form-group text-right m-b-0">
                                	<input type="submit" value="<?php echo isset($singleRecord[0]->id) ? 'Update': 'Add'; ?>" class="btn btn-primary" name="submit">
                                </div>

                            </form>										
						</div>														
					</div>				
                </div>		
			</div>
			<?php } else { ?>
			<div class="row" style="width:100% !important">
				<div class="col-md-12" >	
					<div class="card mb-3">
						<div class="card-header">
							<h3><i class="fa fa-table"></i> View Courses</h3>
						</div>							
						<div class="card-body">							
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-hover display">
									<thead>
										<tr>
											<th>S No</th>
											<th>Course Name</th>
											<th>Course Category</th>
											<th>Status</th>
											<th>Options</th>
										</tr>
									</thead>									
									<tbody>
									<?php
		                                if(isset($allCourses)){
		                                    $i = 1;
		                                    foreach ($allCourses as $value) {
		                            ?>
		                                    <tr class="odd gradeX">
		                                        <td><?php echo $i++; ?></td>
		                                        <td><?php echo $value->course; ?></td>
		                                        <td><?php echo $value->category_type; ?></td>
		                                        <td> <?php echo $value->status == 1 ? "Active" : "Inactive" ; ?></td>
		                                        <td>                                     
		                                            <a href="<?php echo base_url(INDEX_PHP.'ftcinternational/coursesadd/'.$value->id); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Course"><i class="fa fa-pencil"></i></a>  &nbsp; &nbsp;&nbsp;&nbsp;
		                                            <a class="btn btn-danger deleteConfirm" href="<?php echo base_url(INDEX_PHP.'ftcinternational/delete_course/'.$value->id); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Course"><i class="fa fa-trash"></i></a>
		                                        </td>
		                                    </tr>
		                            <?php
		                                    }
		                                }
		                            ?>  				
									</tbody>
								</table>
							</div>
						</div>							
					</div>					
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>