<div class="content-page">
  <div class="content">           
    <div class="container-fluid">  
    	<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
            <h1 class="main-title float-left">Tests</h1>
            <ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Dashboard</li>
							<li class="breadcrumb-item active">Tests</li>
            </ol>
            <div class="clearfix"></div>
          </div>
				</div>
			</div>  
      <?php if(isset($action) && $action=='add') {  ?>	
			<div class="row">			
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">		
					<div class="card mb-3 panel">
						<div class="card-header panel-info">
							<h3><i class="fa fa-file"></i> Add Tests</h3>
						</div>								
						<div class="card-body">							
						  <?php if($this->session->flashdata('query-msg')){ ?>
                <div class="alert <?php echo $this->session->flashdata('query-class') ; ?>" role="alert">
                    <?php echo $this->session->flashdata('query-msg'); ?>
                </div>
              <?php  } ?>											
							<form method="post" action="<?php echo base_url(INDEX_PHP.'ftcinternational/addtests');?>" data-parsley-validate novalidate>
								<?php
                if(isset($singleRecord->id)){ ?>
                    <input type="hidden" name="updateid" value="<?php echo $singleRecord->id; ?>">
                <?php } ?> 
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
									<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-left">
                    <div class="form-group">
                      <label for="courseName">Course Name<span class="text-danger">*</span></label>
                      <select name="course_id" data-parsley-trigger="change"   class="form-control" id="course_id" required onchange="getType(this.value)">
                       	<option value="">Select</option>
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
                </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-right">
                    <div class="form-group">
                        <label for="courseCategory">Category<span class="text-danger">*</span></label>
                        <select name="category_id" data-parsley-trigger="change"   class="form-control categories" id="category_id" required>
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
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-left">
                      <div class="form-group">
                        <label for="Time">Time<span class="text-danger">*</span></label>
                        <input type="text" name="test_time" data-parsley-trigger="change"   class="form-control timePicker" required id="test_time"/>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-right">
                    <div class="form-group">
                      <label for="Time">Test Code<span class="text-danger">*</span></label>
                      <input type="text" name="test_code" data-parsley-trigger="change"   class="form-control" required id="test_code" placeholder="e.g(CorseName01)" />
                    </div>
                  </div>
                <div class="clearfix"></div>
                
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">            
                    <div class="card mb-3">
                      <div class="card-header">
                        <h3><i class="fa fa-table"></i> Questions</h3>
                      </div>
                      <div class="card-body questions">
                        No Questions Selected
                      </div>
                    </div>
                  </div> 
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
							<h3><i class="fa fa-table"></i> View Tests</h3>
						</div>							
						<div class="card-body">
              <?php if($this->session->flashdata('query-msg')){ ?>
                <div class="alert <?php echo $this->session->flashdata('query-class') ; ?>" role="alert">
                    <?php echo $this->session->flashdata('query-msg'); ?>
                </div>
              <?php  } ?> 							
							<div class="table-responsive">
								<table id="example1" class="table table-bordered table-hover display">
									<thead>
										<tr>
											<th>#</th>
                      <th>Test Code</th>
											<th>Course Name</th>
											<th>Course Category</th>											
                      <th>Status</th>
                      <th>Time</th>                      
											<th>Options</th>
										</tr>
									</thead>									
									<tbody>
									<?php
                        if(isset($allTests)){
                            $i = 1;
                            foreach ($allTests as $value) {
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $value->test_code; ?></td>
                                <td><?php echo $value->course; ?></td>
                                <td><?php echo $value->category_name; ?></td>
                                <td> <?php echo $value->status == 1 ? "Active" : "Inactive" ; ?></td>
                                <td><?php echo $value->test_time; ?></td>
                                <td>  
                                 <span data-toggle="modal" data-target="#customModal"> 
                                  <a href="#custom-modal" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Test" onclick="getTestDetails(<?php echo $value->id; ?>);" title="View Test"><i class="fa fa-desktop"></i></a></span> &nbsp; &nbsp;          
                                 <!--  <a class="btn btn-success"  href="<?php //echo base_url(INDEX_PHP.'ftcinternational/addtests/'.$value->id); ?>"><i class="fa fa-pencil"></i></a>  &nbsp; &nbsp;&nbsp;&nbsp; -->
                                  <a class="btn btn-danger" href="<?php echo base_url(INDEX_PHP.'ftcinternational/delete_tests/'.$value->id); ?>"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Test"><fa class="fa fa-trash"></fa></a>
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
      <div class="card-body">
        <div class="modal fade custom-modal" id="customModal" tabindex="-1" role="dialog" aria-labelledby="customModal" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Questions</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body"  id="questionDetails2">
            
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
          </div>
        </div>      
      </div>
      <?php } ?>
		</div>
	</div>
</div>

<script type="text/javascript">
  function checkAll(){
  alert('hi');
}
</script>