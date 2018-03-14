<?php 
       $single_unit  = [];
       $get_units    = [];
       $i = 0;
       if(isset($get_unit)){
           foreach ($get_unit as $key => $value) {
           	  if($i == 1)
           	  $single_unit[]     =  $value;
           	  break;
           	  $i++;
           }

           foreach ($get_unit as $key => $value) {
           	 
           	  $get_units[]     =  $value->unit;
           	 
           	 
           }

       }
?>

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
		   
            <div class="col-md-12">
				<div class="CMA-Review">
					<div class="">
						 <div class="panel panel-primary">
						 	<div class="panel-heading">
						   	Course Name
						   </div>
						   <div class="panel-body">
						 <table class="table table-striped">
						   <thead>
						     <tr>
						       <th></th>
						       <th>FQ</th>
						       <th>MC</th>
						       <th>MC</th>
						       <th>Average Score</th>
						       <th>Average Score with Test prep</th>

						     </tr>
						   </thead>
						   <tbody>
                             <?php if(isset($get_unit)){ 
                              	$check = 0;
                              	foreach ($get_unit as $key => $value) {
                             ?>
						     <tr>
						       <td>
						       <?php if($check == 0){ ?>
						       		<a href="#"><?php echo $value->unit;?></a>

						       <?php 
						       		$check= $value->paid_status == 0 ? 1 : 0;
						       		}else{
						       	?>
						       	<span><?php echo $value->unit;?></span>
						       	<?php } ?>
						       </td>
						      
						       <td>N/A</td>
						       <td>N/A</td>
						       <td>N/A</td>
						       <td>N/A</td>
						       <td>N/A</td>

						     </tr>
						    <?php } } ?>
						  
						     
						   </tbody>
						 </table>
						 </div>
						</div>

						<div class="panel panel-primary">
						 	<div class="panel-heading">
						   	Final Review: Begin 1 week prior to your exam
						   </div>
						   <div class="panel-body">
						   	<ul>
						       	<li>Complete the Exam Rehearsal</li>
						           <li>Focous on your areas in <a href="<?php echo base_url('index.php/Ftcuser/preparation');?>">Test Prep</a></li>
						           <li>Click the "Next" button below to continue to create a session in Demo Mode.</li>
						       </ul>
						 	</div>
						 </div>
                        
                    </div>
				</div>
            </div>
		</div>
	</div>
</div>


