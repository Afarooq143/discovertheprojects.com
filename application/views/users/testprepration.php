
<div class="cma-text">
	<div class="container">
		<div class="rwo">
			<div class="col-md-6">
				<div class="cmo-heding">
<?php 
	print_r($category);
?>

					<h1><?php echo $this->session->userdata('course').':'. $category[0]->category_name ;?></h1>
				</div>
			</div>
			<div class="col-md-6">
				<div class="cmo-button">
					<button>Back</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="create">
	<div class="container">
		<div class="rwo">
			<div class="col-md-3">
				<div class="meet-fild">
					<div class="create-header">
						<h4 class="text-h4">Create A</h4>
						<h4>Practice Exam</h4>
					</div>
					<div class="create-text">
						<p> Practice exams stimlate a real exam environment. You will not knowwhich questions you have answeredcorrectly untill the session is graded     </p>
					</div>
					<div class="create-button">
						<form method="post" action="<?php echo base_url('index.php/ftcuser/create_session');?>">
							<input type="hidden" name="exam-type" value="practice">
							<input type="hidden" name="course_id" value="<?php echo $this->session->userdata('course_id'); ?>">
							<input type="hidden" name="category_id" value="<?php echo $category[0]->id ?>">
							<button type="submit" name="createSession">Create One Now</button>
						</form>	
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="meet-fild">
					<div class="create-header">
						<h4 class="text-h4">Creat A </h4>
						<h4>Study Session</h4>
					</div>
					<div class="create-text">
						<p> Study Session give you immediate feedback as you answer question   </p>
					</div>
					<div class="create-button twos">
						<form method="post" action="<?php echo base_url('index.php/ftcuser/create_session');?>">
							<input type="hidden" name="exam-type" value="study">
							<input type="hidden" name="course_id" value="<?php echo $this->session->userdata('course_id'); ?>">
							<input type="hidden" name="category_id" value="<?php echo $category[0]->id ?>">
							<button type="submit" name="createSession">Create One Now</button>
						</form>	
					</div>
				</div>
			</div>
				<div class="col-md-3 two">
				<div class="meet-fild">
					<div class="create-header">
						<h4 class="text-h4">Performance </h4>
						<h4>Analysis</h4>
					</div>
					<div class="create-text">
						<p> View grade reports, session statistics, and history information of all previous sessions. You may also Create review sessions from History    </p>
					</div>
					<div class="create-button two">
						<button>View Now</button>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>