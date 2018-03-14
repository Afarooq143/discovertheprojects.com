<div class="content-page">
    <div class="content">           
        <div class="container-fluid">  
        	<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb-holder">
                        <h1 class="main-title float-left">Users</h1>
                        <ol class="breadcrumb float-right">
							<li class="breadcrumb-item">Dashboard</li>
							<li class="breadcrumb-item active">Users</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
				</div>
			</div>  
            <div class="row" style="width:100% !important">
                <div class="col-md-12" >    
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-table"></i> View Users</h3>
                        </div>                          
                        <div class="card-body"> 
                            <div class="alert alert-primary success" style="display:none;" role="alert">
                            </div>
                            <div class="alert alert-danger danger" style="display:none;" role="alert">
                            </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover display">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Country</th>
                                            <th>Zipcode</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                    <?php
                                        if(isset($allUsers)){
                                            $i = 1;
                                            foreach ($allUsers as $value) {
                                    ?>
                                            <tr class="odd gradeX">
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $value->first_name; ?></td>
                                                <td><?php echo $value->last_name; ?></td>
                                                <td><?php echo $value->email; ?></td>
                                                <td><?php echo $value->country_name; ?></td>     
                                                <td><?php echo $value->zipcode; ?></td>     
                                                <td> 
                                                     <input type="radio" name="status<?php echo $i; ?>"   class="status" id="<?php echo $value->id; ?>" value="0" <?php echo $value->status == 0 ? "Checked" : "" ; ?> > Inactive 


                                                    <input type="radio" name="status<?php echo $i; ?>"  class="status" id="<?php echo $value->id; ?>" value="1" <?php echo $value->status == 1 ? "Checked" : "" ; ?> >Active

                                                </td>
                                                <!-- <td>                                     
                                                    <a href="<?php //echo base_url(INDEX_PHP.'ftcinternational/coursesadd/'.$value->id); ?>" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Course"><i class="fa fa-pencil"></i></a>  &nbsp; &nbsp;&nbsp;&nbsp;
                                                    <a class="btn btn-danger deleteConfirm" href="<?php //echo base_url(INDEX_PHP.'ftcinternational/delete_course/'.$value->id); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Course"><i class="fa fa-trash"></i></a>
                                                </td> -->
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
        </div>
    </div>
</div>

