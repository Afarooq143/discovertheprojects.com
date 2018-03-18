<div class="padding-top ses" style="padding-top: 130px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class=" account text-center">
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
							
	<form method="post" action="<?php echo base_url().'/index.php/ftcuser/create_test'; ?>">
		<input type="hidden" name="exam_type" value="<?php echo isset($exam_details['exam-type']) ? $exam_details['exam-type'] : '' ?>">
		<input type="hidden" name="course_id" value="<?php echo isset($exam_details['course_id']) ? $exam_details['course_id'] : ''; ?>">
		<input type="hidden" name="category_id" value="<?php echo isset($exam_details['category_id']) ? $exam_details['category_id'] : ''; ?>">
		<div class="row" style="min-height: 500px">
			<div class="col-md-12" id="Demo-test-one">
				<div class="Demo-mode">
					<div class="cma-pages">
						<h2>Demo Mode</h2>
						<div>
							<p><?php echo $this->session->userdata('course');?> is in Demo Mode. You only have access to the first study unit.</p>
							<p>You must purchase <?php echo $this->session->userdata('course');?> Mega Test Bank in order to acheive full access to all study units.</p>
							<p>Click the "Next" button below to continue to create session in Demo Mode</p>
						</div>
					</div>
					<hr style="border-bottom: 1px solid #007DC2; width: 95%; margin: 0 auto;">
					<div class="Cancel-next">
						<a href="javascript:void(0);" class="btn btn-primary" id="Cancel-button-one" onclick="return false"><i class="fa fa-times" style="margin-left: 5px;"></i>Cancel</a>
						<a href="javascript:void(0);" class="btn btn-primary" id="next-button-one" onclick="showTab('Demo-test-two')">Next <i class="fas fa-caret-right" style="margin-left: 5px;"></i></a>
					</div>
				</div>
			</div>

			<div class="col-md-12" id="Demo-test-two">
				<div class="Demo-mode">
					<div class="cma-pages-form two">
						<div>
							<h2>Create Practice Exam</h2>
						</div>
						<div class="min-text-container">
							<p>I want create my session using</p>
							<div class="col-md-12">
								<input type="radio" value="0" name="session_option" checked> The FTC suggestion approach <br/>
								<input type="radio" value="1" name="session_option"> Customize exam options(choose unique questions, source and more)
							</div>
						</div>
						<div class="col-md-12">
							<h5>Select topics you wish to study by clicking on them in the list below. </h5>
							<h5>Click on <i class="fas fa-caret-right"></i>  icon next to a Study Unit to expand a list of Subunits for that Study Unit and select them individually </h5>
						</div>
						<hr style="border-bottom: 1px solid #007DC2; width: 95%; margin: 0 auto;">
						<div class="Cancel-next-Deselect-min">
							<div class="Cancel-next Deselect">
								<a class="btn btn-primary" href="javascript:void(0);" id="selectAll" style="background: #5498d1 linear-gradient(to bottom, rgba(255, 255, 255, 0.3) 1%, rgb(0, 125, 194) 100%);
								color: #fff;margin-left:15px;">Select All</a>
							</div>

						</div>
						<div class="panel-group" id="accordion">

						<?php 
						if(isset($allunits)){
							$i=1;
							// echo '<pre>';
							//  print_r($allunits);
							//  echo '</pre>';
							foreach ($allunits as $units => $value) {
								$unit= explode('<$><$>', $units);
								
						?>
							<div class="panel panel-default" style=" border-radius: 3px;padding: 5px 20px; border: 0px;
							margin-left: 15px;">
								<div class="panel-heading" style="    background: #5498d1 linear-gradient(to bottom, rgba(255, 255, 255, 0.3) 1%, rgb(0, 125, 194) 100%);
								color: #fff;
								font-weight: 600;
								font-size: 17px;
								">
									<h4 class="panel-title">
										<input type="checkbox" class="checkSubUnits selectAll" name="Units[]" value="<?php echo $unit[1]; ?>" id="<?php echo $i; ?>">
										<a data-toggle="collapse" data-parent="#accordion"  href="#collapse<?php echo $i; ?>">
											<i class="fa fa-caret-right"></i><?php echo $unit[0]; ?></a>
									</h4>
								</div>
								<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
									<div class="panel-body">

										<?php for($j=0; $j<count($value); $j++){ ?>
										<h4 class="panel-title">
											<input type="checkbox" name="Unit[<?php echo $value[$j]->unit_id; ?>]" value="<?php echo $value[$j]->subunit_id; ?>" class="subUnits<?php echo $i; ?> selectAll">
											<a href="#"><?php echo $value[$j]->subunit_name; ?></a>
										</h4>
										<?php } ?>
									</div>
								</div>
							</div>

							<?php
							$i++;
							}
						}
						?>

						</div>

						<div class="Cancel-next Previous-Cancel">
							<a class="btn btn-primary" href="javascript:void(0)" id="Previous-button-two" onclick="showTab('Demo-test-one')"><i class="fas fa-caret-left" style="margin-right: 5px;"></i>Previous</a>
							<a class="btn btn-primary" href="javascript:void(0)" id="Cancel-button-two"><i class="fa fa-times" style="margin-right: 5px;"></i>Cancel</a>
							<a class="btn btn-primary" href="javascript:void(0);" id="next-button-two" onclick="showTab('Demo-test-three')">Next<i class="fas fa-caret-right" style="margin-left: 5px;"></i></a>
						</div>
					</div>
				</div>
			</div>


			<div class="col-md-12" id="Demo-test-three">
				<div class="Demo-mode">
					<div class="cma-pages Demo_Mode">
						<h2>Session Order </h2>
						<div class="min-text-container">
							<h3>In what order should these questions appear?</h3>
							<input type="radio" name="question_order" value="0" checked> In the standard FTC order<br/>
							<input type="radio" name="question_order" value="1"> In random order<br>
							<br/>
							<hr style="border-bottom: 1px solid #007DC2; width: 100%; margin: 5px 0px 15px;">
							<h3>In what order should the answer appear?</h3>
							<input type="radio" name="answer_order" value="0" checked> In the standard FTC order<br/>
							<input type="radio" name="answer_order" value="1"> In random order<br>
						</div>
					</div>
					<hr style="border-bottom: 1px solid #007DC2; width: 94%; margin: 0 auto;margin-top: 15px;">
					<div class="Cancel-next">
						<a class="btn btn-primary" href="javascript:void(0);" id="Previous-button-three" onclick="showTab('Demo-test-two')"><i class="fas fa-caret-left" style="margin-right: 5px;"></i>Previous</a>
						<a class="btn btn-primary" id="Cancel-button-three"><i class="fa fa-times" style="margin-right: 5px;"></i>Cancel</a>
						<a class="btn btn-primary" id="next-button-three" onclick="showTab('Demo-test-four')">Next<i class="fas fa-caret-right" style="margin-left: 5px;"></i></a>
					</div>
				</div>
			</div>

			<div class="col-md-12" id="Demo-test-four">
				<div class="Demo-mode">
					<div class="cma-pages Demo_Mode">
						<h2>Session Size</h2>
						<div class="min-text-container">							
							<p>Enter the number of questions you want for your session</p>
							<p>You may enter anything from one question upto the maximum number of questions</p>
							<hr style="border-bottom: 1px solid #007DC2; width: 96%; margin: 0 auto;margin-top: 15px;margin-bottom: 15px;">
							<div >
								<label style="vertical-align: bottom; margin-right: 15px;">Number of questions</label>
								<input type="number" value="5" name="question_limit"  class="form-control" style="; width: 40%; display: inline-block;"><p style=" display: inline-block; margin-left: 15px;">Minimum: 20 <br> Maximum: 100</p>
								<div class="previous-button-text">
									<button>Use Maximum Session Size</button>
								</div>
								<h4>We recomend sessions of 20 questions as the optimal size</h4>
							</div>
						</div>
					</div>
					<hr style="border-bottom: 1px solid #007DC2; width: 94%; margin: 0 auto;margin-top: 15px;">
					<div class="Cancel-next">
						<a  class="btn btn-primary" href="javascript:void(0)" id="Previous-button-four" onclick="showTab('Demo-test-three')"><i class="fas fa-caret-left" style="margin-right: 5px;"></i>Previous</a>
						<a class="btn btn-primary" href="javascript:void(0)" id="Cancel-button-four"><i class="fa fa-times" style="margin-right: 5px;"></i>Cancel</a>
						<a class="btn btn-primary"  id="next-button-four" onclick="showTab('Demo-test-five')">Next<i class="fas fa-caret-right" style="margin-left: 5px;"></i></a>
					</div>
				</div>
			</div>


			<div class="col-md-12" id="Demo-test-five">
				<div class="Demo-mode">
					<div class="cma-pages Demo_Mode">
						<h2>Exam Information</h2>
						<div class="min-text-container">


							<p> You have chosen to create a CMA Pratice Exam. This Practice Exam will emulate the Prometric testing environment</p>
							<p> The following optons are added by FTC and are not present in the actual vendour's testing environment:  </p>
							<div class="width-in-div-class">
								<p>The ability to discard your Exam without grading it </p>
								<p>The ability to run out of time and continue the Exam</p> 
								<p>The ability to review your exam after grading</p> 
							</div>

						</div>
					</div>

					<div class="Cancel-next">
						<a class="btn btn-primary" href="javascript:void(0);" id="Previous-button-five" onclick="showTab('Demo-test-four')"><i class="fas fa-caret-left" style="margin-right: 5px;"></i>Previous</a>
						<a class="btn btn-primary" href="javascript:void(0)" id="Cancel-button-five"><i class="fa fa-times" style="margin-right: 5px;"></i>Cancel</a>
						<button disabled class="btn btn-primary" id="next-button-five">Next<i class="fas fa-caret-right" style="margin-left: 5px;"></i></button>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>