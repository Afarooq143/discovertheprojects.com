<div class="content-page">
    <div class="content">           
        <div class="container-fluid">  
        	<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Units</h1>
                        <ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Dashboard</li>
							<li class="breadcrumb-item active">Units</li>
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
							<h3><i class="fa fa-file"></i> <?php echo $title; ?> Units</h3>
						</div>								
						<div class="card-body">							
						 <?php if($this->session->flashdata('query-msg')){ ?>
	                                <div class="alert <?php echo $this->session->flashdata('query-class') ; ?>" role="alert">
	                                    <?php echo $this->session->flashdata('query-msg'); ?>
	                                </div>
                         <?php  } ?>											
							<form method="post" action="<?php echo base_url(INDEX_PHP.'ftcinternational/unitadd');?>" data-parsley-validate novalidate>
								<?php if(isset($singleRecord->id)){ ?>
                                    <input type="hidden" name="updateid" value="<?php echo $singleRecord->id; ?>">
                                <?php } ?>  


								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-left">
                    <div class="form-group">
                      <label for="courseName">Course Name<span class="text-danger">*</span></label>
                      <select name="course_id" data-parsley-trigger="change"   class="form-control" id="course_id" required onchange="getType(this.value)">
                       	<option value="">Select Course</option>
                        	<?php
                            if(isset($courses)){														
                              $i = 1;
                              foreach ($courses as $value) {
														    // if($singleRecord->id == $value->id)
															   //   continue;
                                $selected = '';
                                if(isset($singleRecord->course_id) && $singleRecord->course_id == $value->id){
                                    $selected = 'selected';
                                }
												  ?> 
                                <option value="<?php echo $value->id; ?>" <?php echo $selected;?>><?php echo $value->course; ?></option>
												  <?php
														  }
													 }
											    ?>  
                      </select>
                    </div>
                    <div class="course col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5" style="color: red; padding-left: 15px;">
                      <?php echo form_error('course'); ?>    
                    </div>
                  </div>
                
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-right">
                    <div class="form-group">
                        <label for="courseCategory">Subject<span class="text-danger">*</span></label>
                        <select name="category_id" data-parsley-trigger="change"   class="form-control" id="category_id" required>
                    		<option value="">Select</option> 
                        <?php
                            if(isset($category_types)){                            
                              $i = 1;
                              foreach ($category_types as $value) {
                                // if($singleRecord->id == $value->id)
                                 //   continue;
                                $selected = '';
                                if(isset($singleRecord->category_id) && $singleRecord->category_id == $value->id){
                                    $selected = 'selected';
                                }
                          ?> 
                                <option value="<?php echo $value->id; ?>" <?php echo $selected;?>><?php echo $value->category_name; ?></option>
                          <?php
                              }
                           }
                          ?>                               	
                        </select>
                    </div>
                     <div class="category col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5" style="color: red; padding-left: 15px;">
                    	<?php echo form_error('category_id'); ?>    
                    	</div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                         <label for="courseCategory">Unit <span class="text-danger">*</span></label>
                        <input type="text" name="unit" data-parsley-trigger="change" required placeholder="Unit" class="form-control" id="unit" value="<?php echo isset($singleRecord->unit)? $singleRecord->unit : '' ?> ">
                       
                    </div>
                      <?php echo form_error('unit'); ?> 
                  </div>
                  <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 pull-right">
                    <div class="form-group">
                         <label for="courseCategory">Sub-Unit</label>
                        <input type="text" name="sub_unit" placeholder="Sub-Unit" class="form-control" id="sub_unit" value="<?php //echo isset($singleRecord->sub_unit)? $singleRecord->sub_unit : '' ?> ">
                    </div>
                      <?php //echo form_error('sub_unit'); ?> 
                  </div> -->
                </div>
                 <div class="clearfix"></div>
	                            <div class="input_fields_wrap">
		                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
										<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-left">
	                                        <div class="form-group">
	                                        	<?php if(isset($sub_units[0]->subunits_id)){
	                                        	 ?>
				                                    <input type="hidden" name="updateSubunitid" value="<?php echo $sub_units[0]->subunits_id; ?>">
				                                <?php } ?>  

	                                            <label for="categoryName">Sub Unit<span class="text-danger">*</span></label>
	                                            <input id="subunitName" name="subunit_name[]" type="text" placeholder="Sub Unit" required class="form-control" value="<?php echo isset($sub_units[0]->subunit_name) ? $sub_units[0]->subunit_name : ""; ?>">
	                                        </div>
	                                    </div>
	                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-right">
	                                        <div class="form-group">
	                                        	<label for="categoryName">Add More</label><br>
	                                           <button class="btn btn-success add_subunit_button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add More Sub Unit"><i class="fa fa-plus"></i></button>
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="clearfix"></div>
	                                <?php if(isset($sub_units) && count($sub_units)>0){
	                                		for($i=1; $i < count($sub_units); $i++){
	                                ?>

	                                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
			                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pull-left">
			                                    <div class="form-group">
			                                          <label for="subunitName">Sub Unit</label>
			                                          <input id="subunitName" name="subunit_name[]" type="text" placeholder="Sub Unit" required class="form-control" value="<?php echo isset($sub_units[$i]->subunit_name) ? $sub_units[$i]->subunit_name : ""; ?>">
			                                      
			                                            <label for="subunitName">Remove</label><br>
			                                             <button class="btn btn-danger remove_subunit"><i class="fa fa-times"></i></button>
	                                           </div>
	                                            <?php //echo form_error('subunit_name[]'); ?> 
                                 			</div>
                                  		</div>
	                                <?php 	} 
	                            	}
	                                ?>
                            	</div>
								<div class="clearfix"></div>
                                <div class="form-group text-right m-b-0">
                                	<input type="submit" value="<?php echo isset($singleRecord->id) ? 'Update': 'Add'; ?>" class="btn btn-primary" name="submit">
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
							<h3><i class="fa fa-table"></i> View Units</h3>
						</div>							
						<div class="card-body">							
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-hover display">
									<thead>
										<tr>
											<th>S No</th>
											<th>Course Name</th>
											<th>Subject</th>
											<th>Unit</th>
											<th>Status</th>
											<th>Options</th>
										</tr>
									</thead>									
									<tbody>
									<?php
		                                if(isset($allUnits)){
		                                    $i = 1;
		                                    foreach ($allUnits as $value) {
		                            ?>
		                                    <tr class="odd gradeX">
		                                        <td><?php echo $i++; ?></td>	
		                                        <td><?php echo $value->course; ?></td>
		                                        <td><?php echo $value->category_name; ?></td>
		                                        <td><?php echo $value->unit; ?></td>
		                                        <td> <?php echo $value->status == 1 ? "Active" : "Inactive" ; ?></td>
		                                        <td>                                     
		                                            <a href="<?php echo base_url(INDEX_PHP.'ftcinternational/unitadd/'.$value->id); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Unit"><i class="fa fa-pencil"></i></a>  &nbsp; &nbsp;&nbsp;&nbsp;
		                                            <a class="btn btn-danger deleteConfirm" href="<?php echo base_url(INDEX_PHP.'ftcinternational/delete_unit/'.$value->id); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Unit"><i class="fa fa-trash"></i></a>
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