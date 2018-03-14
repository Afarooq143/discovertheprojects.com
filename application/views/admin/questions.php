<div class="content-page">
  <div class="content">           
    <div class="container-fluid">  
      <div class="row">
        <div class="col-xl-12">
          <div class="breadcrumb-holder">
            <h1 class="main-title float-left">Questions</h1>
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item active">Questions</li>
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
              <h3><i class="fa fa-file"></i> <?php echo $title; ?> Questions</h3>
            </div>                
            <div class="card-body">             
             <?php if($this->session->flashdata('query-msg')){ ?>
                <div class="alert <?php echo $this->session->flashdata('query-class') ; ?>" role="alert">
                    <?php echo $this->session->flashdata('query-msg'); ?>
                </div>
             <?php  } ?>                      
              <form method="post" action="<?php echo base_url(INDEX_PHP.'ftcinternational/questionsadd');?>" data-parsley-validate novalidate>
                <?php
                if(isset($singleRecord->id)){ ?>
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
                        <select name="category_id" data-parsley-trigger="change"   class="form-control" id="category_id" required onchange="getUnit(this.value);">
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
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-left">
                    <div class="form-group">
                         <label for="units">Unit <span class="text-danger">*</span></label>
                          <select name="unit_id" data-parsley-trigger="change"   class="form-control" id="unit_id" required onchange="getSubUnits(this.value)">
                               <option value="">Select</option> 
                                <?php
                                    if(isset($units)){                            
                                      $i = 1;
                                      foreach ($units as $value) {
                                        // if($singleRecord->id == $value->id)
                                         //   continue;
                                        $selected = '';
                                        if(isset($singleRecord->unit_id) && $singleRecord->unit_id == $value->id){
                                            $selected = 'selected';
                                        }
                                  ?> 
                                        <option value="<?php echo $value->id; ?>" <?php echo $selected;?>><?php echo $value->unit; ?></option>
                                  <?php
                                      }
                                   }
                                  ?>                                
                        </select>
                       
                    </div>
                      <?php echo form_error('unit'); ?> 
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pull-right">
                    <div class="form-group">
                         <label for="courseCategory">Sub-Unit</label>
                        <select name="subunit_id" data-parsley-trigger="change"   class="form-control" id="subunit_id" required >
                               <option value="">Select</option> 
                                <?php
                                    if(isset($sub_units)){                            
                                      $i = 1;
                                      foreach ($sub_units as $value) {
                                        // if($singleRecord->id == $value->id)
                                         //   continue;
                                        $selected = '';
                                        if(isset($singleRecord->subunit_id) && $singleRecord->subunit_id == $value->id){
                                            $selected = 'selected';
                                        }
                                  ?> 
                                        <option value="<?php echo $value->id; ?>" <?php echo $selected;?>><?php echo $value->subunit_name; ?></option>
                                  <?php
                                      }
                                   }
                                  ?>                                
                        </select>
                    </div>
                      <?php echo form_error('sub_unit'); ?> 
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                         <label for="courseCategory">Question Type <span class="text-danger">*</span></label>
                        <!-- <input type="text" name="category" data-parsley-trigger="change" required placeholder="Enter Course Category" class="form-control" id="course"> -->
                        <select name="question_type" data-parsley-trigger="change"   class="form-control" id="question_type" required>
                          
                          <option value="">Select</option>
                          <option value="MCQ Type" <?php echo isset($singleRecord->question_type) && $singleRecord->question_type == 'MCQ Type' ? 'selected' : '' ?> >MCQ Type</option>
                          <option value="Long Type" <?php echo isset($singleRecord->question_type) && $singleRecord->question_type == 'Long Type' ? 'selected' : '' ?> >Long Type</option>
                          
                        </select>
                    </div>
                    <div class="question_type col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5" style="color: red; padding-left: 15px;">
                      <?php echo form_error('question_type'); ?> 
                    </div>
                  </div>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                         <label for="courseCategory">Question <span class="text-danger">*</span></label>
                         <textarea name="question" id="question" rows="3" cols="10" class="form-control" data-parsley-trigger="change"  required=""><?php echo isset($singleRecord->question) ? $singleRecord->question : ''; ?></textarea>
                    </div>
                      <?php echo form_error('question'); ?>
                  </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Option A <span class="text-danger">*</span></label>
                      <textarea name="option_a" id="option_a" rows="3" cols="10" class="form-control" data-parsley-trigger="change"  required=""><?php echo isset($singleRecord->option_a) ? $singleRecord->option_a : ''; ?></textarea>
                    </div>
                  </div>
                </div>


                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Option B <span class="text-danger">*</span></label>
                      <textarea name="option_b" id="option_b" rows="3" cols="10" class="form-control" data-parsley-trigger="change"  required=""><?php echo isset($singleRecord->option_b) ? $singleRecord->option_b : ''; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Option C</label>
                      <textarea name="option_c" id="option_c" rows="3" cols="10" class="form-control" ><?php echo isset($singleRecord->option_c) ? $singleRecord->option_c : ''; ?></textarea>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Option D</label>
                      <textarea name="option_d" id="option_d" rows="3" cols="10" class="form-control" data-parsley-trigger="change"><?php echo isset($singleRecord->option_d) ? $singleRecord->option_d : ''; ?></textarea>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Option E</label>
                      <textarea name="option_e" id="option_e" rows="3" cols="10" class="form-control" ><?php echo isset($singleRecord->option_e) ? $singleRecord->option_e : ''; ?></textarea>
                    </div>
                  </div>
                </div>

                <div class="clearfix"></div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                      <label>Explaination</label>
                      <textarea name="explaination" id="explaination" rows="3" cols="10" class="form-control" data-parsley-trigger="change"  required=""><?php echo isset($singleRecord->explaination) ? $singleRecord->explaination : ''; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="form-group">
                         <label for="courseCategory">Answer <span class="text-danger">*</span></label>
                        <!-- <input type="text" name="category" data-parsley-trigger="change" required placeholder="Enter Course Category" class="form-control" id="course"> -->
                        <select name="answer" data-parsley-trigger="change"   class="form-control" id="answer" required onchange="checkValue(this.value);">
                          
                          <option value="">Select</option>
                          <option value="option_a" <?php echo isset($singleRecord->answer) && $singleRecord->answer == 'option_a' ? 'selected' : '' ?> >Option A</option>
                          <option value="option_b" <?php echo isset($singleRecord->answer) && $singleRecord->answer == 'option_b' ? 'selected' : '' ?> >Option B</option>
                           <option value="option_c" <?php echo isset($singleRecord->answer) && $singleRecord->answer == 'option_c' ? 'selected' : '' ?> >Option C</option>
                            <option value="option_d" <?php echo isset($singleRecord->answer) && $singleRecord->answer == 'option_d' ? 'selected' : '' ?> >Option D</option>
                             <option value="option_e" <?php echo isset($singleRecord->answer) && $singleRecord->answer == 'option_e' ? 'selected' : '' ?> >Option E</option>
                          
                        </select>
                    </div>
                    <div class="question_type col-lg-offset-3 col-md-offset-3 col-sm-offset-4 col-xs-offset-5" style="color: red; padding-left: 15px;">
                      <?php echo form_error('question_type'); ?> 
                    </div>
                  </div>
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
              <h3><i class="fa fa-table"></i> View Questions</h3>
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
                      <th>S No</th>
                      <th>Question</th>
                      <th>Course Name</th>
                      <th>Course Category</th>  
                      <!-- <th>Unit</th>      
                      <th>Sub Unit</th>    -->            
                      <th>Status</th>                      
                      <th>Options</th>
                    </tr>
                  </thead>                  
                  <tbody>
                  <?php
                        if(isset($allQuestions)){
                            $i = 1;
                            foreach ($allQuestions as $value) {
                    ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i++; ?></td>
                                <td style="width: 35%"><?php echo $value->question; ?></td>
                                <td><?php echo $value->course; ?></td>
                                <td><?php echo $value->category_name; ?></td>
                                <!-- <td><?php //echo $value->unit; ?></td>
                                <td><?php //echo $value->subunit_name; ?></td> -->
                                <td> <?php echo $value->status == 1 ? "Active" : "Inactive" ; ?></td>
                                <td style="width: 20%">  
                                  <span data-toggle="modal" data-target="#customModal"> 
                                  <a href="#custom-modal" class="btn btn-primary"  data-toggle="tooltip" data-placement="top" title="View Question" onclick="getQuestionDetails(<?php echo $value->id; ?>);"><i class="fa fa-desktop"></i></a></span>
                                  <a  class="btn btn-secondary"  href="<?php echo base_url(INDEX_PHP.'ftcinternational/questionsadd/'.$value->id); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Question"><i class="fa fa-pencil"></i></a> 
                                  <a  class="btn btn-danger deleteConfirm" href="<?php echo base_url(INDEX_PHP.'ftcinternational/delete_questions/'.$value->id); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Question"><fa class="fa fa-trash"></fa></a>
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
            <h5 class="modal-title" id="exampleModalLabel2">Question Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body"  id="questionDetails">
            
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