<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller to perform all admin task
*/
class Ftcinternational extends My_Controller
{ 
  
  // var $globalPermissionToCompany = array();
  // var $globalPermissionToDepartment = array();    
  // var $globalPermissionToLeadStatus = array(); 
  // var $globalPermissionToLeadFollowUp = array(); 
  // var $globalPermissionToLeadSource = array(); 
  // var $globalPermissionToLeadRank = array(); 
  // var $globalPermissionToDestination = array(); 
  // var $globalPermissionToRegion = array(); 
  // var $globalPermissionToCampaign = array();
  // var $globalPermissionToLead = array(); 
  // var $globalPermissionToUser = array(); 
  // var $GLOBAL_ADMIN_LOGIN_STATUS   =''; 
  function __construct( )
  {
    parent::__construct();
    if( !$this->session->userdata('id'))
      return redirect('ftclogin');

    $this->load->model('Ftc_model');
    $this->load->library('form_validation');
    $this->load->helper('common_helper');
  }

  public function check_admin_login(){
    $Admin_userId = $this->session->userdata('Admin_userId');
    if($Admin_userId ==''){
      redirect(base_url(INDEX_PHP."admin/login"));
    }
  }

   /**
   * 
   * To admin home page
   *
   * @return html
   */
  function index(){
    // $this->check_admin_login();

    // $Admin_userId = $this->session->userdata('Admin_userId');
    // view to load
     $data['class']      = "dashboard";
     $data['header']         = "admin/header";
     $data['menu']           = "admin/menu";
     $data['main']           = "admin/home";
     $data['footer']         = "admin/footer";    
     $this->load->view('admin/templates.php', $data);
    //$this->load->view('admin/home.php');
  }

   /**
   * 
   * To admin login
   *
   * @return html
   */
  public function login()
  {
    echo 'getting';
    //$this->load->view('login');
    // $data        =   array();
    // $data['main']    = "admin/login";
    // $this->load->library('form_validation');
    // $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
    // $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

    // if($this->form_validation->run() == FALSE)
    // {
    //   $this->load->view('login_page',$data);
    // }else{
    //  redirect(base_url(INDEX_PHP."admin/index"));
    // }
  }
   /**
   * 
   * To admin logout
   *
   * @return null
   */
  public function logout()
  {
    $sessionId=$this->session->userdata('session_id');
    $this->session->unset_userdata('Admin_userId');
    $this->session->unset_userdata('Admin_userFullName');
    $this->session->unset_userdata('Admin_userEmail');
    session_destroy();
    redirect(base_url(INDEX_PHP."admin/login"));
  }



  /*  ################################################################
      #######           Methods of Courses Start Here           ######
      ################################################################ */ 

 /*
 * @param integer $id  description
 * @return html
 */
  public function coursesadd($id=''){
  //   $this->check_admin_login();
     if(isset($_POST['submit'])){
        //echo "<pre>";
        //print_r($_POST);exit;
       $this->form_validation->set_rules('course', 'Course Name', 'required|trim');
       $this->form_validation->set_rules('category_type', 'Course Category', 'required|trim');
       $this->form_validation->set_rules('category_name[]', 'Course Name', 'required|trim');

       if($this->form_validation->run() == FALSE){
       }else{
        $data_form['course']            = $this->input->post('course');
        $data_form['category_type']     = $this->input->post('category_type');
        $categories                     = $this->input->post('category_name');

        if($this->input->post('updateid')){
         
          $categories_id                     = $this->input->post('updateCategoryid');
          for($i=0; $i<count($categories); $i++) {
            $categoryidArray = explode(',', $categories_id);
            $user_data_form['id'] = $categoryidArray[$i];
            $user_data_form['category_name'] = $categories[$i];
            $this->Ftc_model->updateData($user_data_form, 'ftc_course_category_master');
          }

          $data_form['id'] = $this->input->post('updateid');
          if($this->Ftc_model->updateData($data_form, 'ftc_courses_master')){
            $this->session->set_flashdata("query-msg","Data is updated successfully.");
            $this->session->set_flashdata("query-class","alert-success");
          }else{
            $this->session->set_flashdata("query-msg","Data is not updated. Please try again.");
            $this->session->set_flashdata("query-class","alert-danger");
          }
        }else{
          $category_ids = '';
          foreach ($categories as $category) {
            //print_r($categories);exit;
            $user_data_form['category_name'] = $category;
            if($category_id = $this->Ftc_model->addDataId($user_data_form, 'ftc_course_category_master')){            
              $category_ids.= $category_id.',';
            }
          }
          $data_form['category_id'] = rtrim($category_ids, ',');
          if($this->Ftc_model->addData($data_form, 'ftc_courses_master`')){
            $this->session->set_flashdata("query-msg","Data is added successfully.");
            $this->session->set_flashdata("query-class","alert-success");
          }else{
            $this->session->set_flashdata("query-msg","Data is not added. Please try again.");
            $this->session->set_flashdata("query-class","alert-danger");
          } 
        }
        return redirect(base_url(INDEX_PHP."ftcinternational/coursesview"));
      }
    }        
        // Check for edit data
    $data['title']          = 'Add';
  $data['singleRecord'] = array();
  if($id){
    $data['singleRecord'] = $this->Ftc_model->get_single_course_info($id);
    $data['course_category'] = $this->Ftc_model->getCourseCategories($id);
    $data['title']          = 'Edit';
  }
  //echo'<pre>';
  //print_r($data['course_category']);exit;
        // Get all records of company
  $data['allCourses']     = $this->Ftc_model->get_all_records('ftc_courses_master');
  $data['action'] = 'add';
  $data['class']          = "courses";
  $data['header']         = "admin/header";
  $data['menu']           = "admin/menu";
  $data['main']           = "admin/courses";
  $data['footer']         = "admin/footer";   
  $this->load->view('admin/templates.php', $data);
}

public function coursesview(){
  $data['allCourses']     = $this->Ftc_model->get_all_records('ftc_courses_master');
  $data['action'] = 'view';
  $data['class']          = "courses";
  $data['header']         = "admin/header";
  $data['menu']           = "admin/menu";
  $data['main']           = "admin/courses";
  $data['footer']         = "admin/footer";   
  $this->load->view('admin/templates.php', $data);
  }

   /*
   * @param integer $id  description
   * @return html
   */
  function delete_course($id = NULL){
    if($id){
      if($this->Ftc_model->delete_course_categories($id)){
        $this->session->set_flashdata("query-msg","Data is deleted successfully.");
        $this->session->set_flashdata("query-class","alert-success");
      }else{
        $this->session->set_flashdata("query-msg","Data is not deleted. Please try again.");
        $this->session->set_flashdata("query-class","alert-danger");
      }
    }
    return redirect(base_url(INDEX_PHP."ftcinternational/coursesview"));
  }


   /*  ################################################################
      #######           Methods of Courses Start Here           ######
      ################################################################ */ 

 /*
 * @param integer $id  description
 * @return html
 */
  public function unitadd($id=''){
  //   $this->check_admin_login();
     if(isset($_POST['submit'])){
        // echo "<pre>";
        // print_r($_POST);exit;
       $this->form_validation->set_rules('course_id', 'Course Name', 'required|trim');
       $this->form_validation->set_rules('category_id', 'Course Category', 'required|trim');
       $this->form_validation->set_rules('unit', 'Unit', 'required|trim');
       //$this->form_validation->set_rules('subunit_name[]', 'Sub Unit', 'required|trim');

       if($this->form_validation->run() == FALSE){
       }else{
        $data_form['course_id']         = $this->input->post('course_id');
        $data_form['category_id']       = $this->input->post('category_id');
        $data_form['unit']              = $this->input->post('unit');
        $subunits                       = $this->input->post('subunit_name');

        if($this->input->post('updateid')){
         
          $subunits_id  = $this->input->post('updateSubunitid');
          for($i=0; $i<count($subunits); $i++) {
            $subunitIdArray = explode(',', $subunits_id);
            $subunit_data_form['id'] = $subunitIdArray[$i];
            $subunit_data_form['subunit_name'] = $subunits[$i];
            $this->Ftc_model->updateData($subunit_data_form, 'ftc_sub_units_master');
          }

          $data_form['id'] = $this->input->post('updateid');
          if($this->Ftc_model->updateData($data_form, 'ftc_units_master')){
            $this->session->set_flashdata("query-msg","Data is updated successfully.");
            $this->session->set_flashdata("query-class","alert-success");
          }else{
            $this->session->set_flashdata("query-msg","Data is not updated. Please try again.");
            $this->session->set_flashdata("query-class","alert-danger");
          }
        }else{
          $subunits_ids = '';
          foreach ($subunits as $unit) {
            //print_r($categories);exit;
            $subunit_data_form['subunit_name'] = $unit;
            if($subunit_id = $this->Ftc_model->addDataId($subunit_data_form, 'ftc_sub_units_master')){            
              $subunits_ids.= $subunit_id.',';
            }
          }
          $data_form['subunits_id'] = rtrim($subunits_ids, ',');
          if($this->Ftc_model->addData($data_form, 'ftc_units_master`')){
            $this->session->set_flashdata("query-msg","Data is added successfully.");
            $this->session->set_flashdata("query-class","alert-success");
          }else{
            $this->session->set_flashdata("query-msg","Data is not added. Please try again.");
            $this->session->set_flashdata("query-class","alert-danger");
          } 
        }
        return redirect(base_url(INDEX_PHP."ftcinternational/unitview"));
      }
    }        
        // Check for edit data
    $data['title']          = 'Add';
  $data['singleRecord'] = array();
  if($id){
    $data['singleRecord'] = $this->Ftc_model->get_single_info('ftc_units_master', $id);
     $data['category_types'] = $this->Ftc_model->get_all_records('ftc_course_category_master');
     $data['sub_units'] = $this->Ftc_model->getSubUnits($id);
     //print_r($data['sub_units']);exit;

    $data['title']          = 'Edit';
  }
  //echo'<pre>';
  //print_r($data['course_category']);exit;
        // Get all records of company
  $data['courses'] = $this->Ftc_model->get_all_records('ftc_courses_master');
  $data['allUnits']     = $this->Ftc_model->get_all_records('ftc_units_master');
  $data['action'] = 'add';
  $data['class']          = "units";
  $data['header']         = "admin/header";
  $data['menu']           = "admin/menu";
  $data['main']           = "admin/units";
  $data['footer']         = "admin/footer";   
  $this->load->view('admin/templates.php', $data);
}

public function unitview(){
  $data['allUnits']     = $this->Ftc_model->get_all_units();
  $data['action'] = 'view';
  $data['class']          = "units";
  $data['header']         = "admin/header";
  $data['menu']           = "admin/menu";
  $data['main']           = "admin/units";
  $data['footer']         = "admin/footer";   
  $this->load->view('admin/templates.php', $data);
  }

   /*
   * @param integer $id  description
   * @return html
   */
  function delete_unit($id = NULL){
    if($id){
      if($this->Ftc_model->delete_units($id)){
        $this->session->set_flashdata("query-msg","Data is deleted successfully.");
        $this->session->set_flashdata("query-class","alert-success");
      }else{
        $this->session->set_flashdata("query-msg","Data is not deleted. Please try again.");
        $this->session->set_flashdata("query-class","alert-danger");
      }
    }
    return redirect(base_url(INDEX_PHP."ftcinternational/unitview"));
  }


  function getUnit(){
    $dataArray = '';
    $id = $_POST['id'];
    $data = $this->Ftc_model->getUnits($id);
    //print_r($data);
    echo json_encode($data);
  }

  function getSubUnit(){
    $dataArray = '';
    $id = $_POST['id'];
    $data = $this->Ftc_model->getSubUnits($id);
    //print_r($data);
    echo json_encode($data);
  }



 /* ################################################################
    #######           Methods of Courses End Here             ######
    ################################################################ */ 




  /*  ################################################################
      #######           Methods of Questions Start Here         ######
      ################################################################ */ 

 /*
 * @param integer $id  description
 * @return html
 */
  public function questionsadd($id=''){
  //   $this->check_admin_login();
   // echo "<pre>";
   $data['class']      = "questions";
     if(isset($_POST['submit'])){
        
        //print_r($_POST);exit;
       $this->form_validation->set_rules('course_id', 'Course Name', 'required|trim');
       $this->form_validation->set_rules('category_id', 'Category', 'required|trim');
       $this->form_validation->set_rules('unit_id', 'Unit', 'required|trim');
       $this->form_validation->set_rules('subunit_id', 'Sub Unit', 'required|trim');
       $this->form_validation->set_rules('question_type', 'Question', 'required|trim');
       $this->form_validation->set_rules('question', 'Question', 'required|trim');
       $this->form_validation->set_rules('option_a', 'Option A', 'required|trim');
       $this->form_validation->set_rules('option_b', 'Option B', 'required|trim');
       $this->form_validation->set_rules('explaination', 'Explaination', 'required|trim');


       if($this->form_validation->run() == FALSE){
       }else{
        $data_form['course_id']             = $this->input->post('course_id');
        $data_form['category_id']           = $this->input->post('category_id');
        $data_form['unit_id']               = $this->input->post('unit_id');
        $data_form['subunit_id']            = $this->input->post('subunit_id');
        $data_form['question_type']         = $this->input->post('question_type');
        $data_form['question']              = $this->input->post('question');
        $data_form['option_a']              = $this->input->post('option_a');
        $data_form['option_b']              = $this->input->post('option_b');
        $data_form['option_c']              = $this->input->post('option_c');
        $data_form['option_d']              = $this->input->post('option_d');
        $data_form['option_e']              = $this->input->post('option_e');
        $data_form['explaination']          = $this->input->post('explaination');
        $data_form['answer']                = $this->input->post('answer');
        //print_r($data_form);exit;
        if($this->input->post('updateid')){         
          $data_form['id'] = $this->input->post('updateid');
          if($this->Ftc_model->updateData($data_form, 'ftc_questions_master')){
            $this->session->set_flashdata("query-msg","Data is updated successfully.");
            $this->session->set_flashdata("query-class","alert-success");
          }else{
            $this->session->set_flashdata("query-msg","Data is not updated. Please try again.");
            $this->session->set_flashdata("query-class","alert-danger");
          }
        }else{

          if($this->Ftc_model->addData($data_form, 'ftc_questions_master`')){
            $this->session->set_flashdata("query-msg","Data is added successfully.");
            $this->session->set_flashdata("query-class","alert-success");
          }else{
            $this->session->set_flashdata("query-msg","Data is not added. Please try again.");
            $this->session->set_flashdata("query-class","alert-danger");
          } 
        }
        return redirect(base_url(INDEX_PHP."ftcinternational/questionsview"));
      }
    }        

    $data['title']          = 'Add';
        // Check for edit data
  $data['singleRecord'] = array();
  if($id){
    $data['title']          = 'Edit';
    $data['singleRecord'] = $this->Ftc_model->get_single_info('ftc_questions_master', $id);
    $data['category_types'] = $this->Ftc_model->get_all_records('ftc_course_category_master');
    $data['units'] = $this->Ftc_model->get_all_records('ftc_units_master');
    $data['sub_units'] = $this->Ftc_model->get_all_records('ftc_sub_units_master');
  }

  $data['courses'] = $this->Ftc_model->get_all_records('ftc_courses_master');
  $data['allQuestions'] = $this->Ftc_model->get_all_Questions();

  $data['action'] = 'add';
  $data['header']         = "admin/header";
  $data['menu']           = "admin/menu";
  $data['main']           = "admin/questions";
  $data['footer']         = "admin/footer";   
  $this->load->view('admin/templates.php', $data);
}

 public function questionsview(){
    $data['courses']        = $this->Ftc_model->get_all_records('ftc_courses_master');
    $data['allQuestions']   = $this->Ftc_model->get_all_Questions();
    $data['class']          = "questions";
    $data['action']         = 'view';
    $data['header']         = "admin/header";
    $data['menu']           = "admin/menu";
    $data['main']           = "admin/questions";
    $data['footer']         = "admin/footer";   
    $this->load->view('admin/templates.php', $data);
  }


function getQuestionType(){
  $dataArray = '';
  $id = $_POST['id'];
  $data = $this->Ftc_model->getCourseCategories($id);
  echo json_encode($data);
}

function getQuestionDetails(){
  $dataArray = '';
  $id = $_POST['id'];
  $data = $this->Ftc_model->get_question_info($id);
  echo json_encode($data);
}


function users(){
   $data['allUsers']        = $this->Ftc_model->get_all_users();
    $data['class']          = "users";
    $data['action']         = 'view';
    $data['header']         = "admin/header";
    $data['menu']           = "admin/menu";
    $data['main']           = "admin/users";
    $data['footer']         = "admin/footer";   
    $this->load->view('admin/templates.php', $data);
}


   /*
   * @param integer $id  description
   * @return html
   */
  function delete_questions($id = NULL){
    if($id){
      if($this->Ftc_model->delete_data('ftc_questions_master', $id)){
        $this->session->set_flashdata("query-msg","Data is deleted successfully.");
        $this->session->set_flashdata("query-class","alert-success");
      }else{
        $this->session->set_flashdata("query-msg","Data is not deleted. Please try again.");
        $this->session->set_flashdata("query-class","alert-danger");
      }
    }
    return redirect(base_url(INDEX_PHP."ftcinternational/questionsview"));
  }


 /* ################################################################
    #######           Methods of Questions End Here           ######
    ################################################################ */ 




 /*  ################################################################
     #######           Methods of Tests Start Here             ######
     ################################################################ */ 

 /*
 * @param integer $id  description
 * @return html
 */
  public function addtests($id=''){
  //   $this->check_admin_login();
   // echo "<pre>";
   $data['class']      = "tests";
     if(isset($_POST['submit'])){
        
        //print_r($_POST);exit;
       $this->form_validation->set_rules('course_id', 'Course Name', 'required|trim');
       $this->form_validation->set_rules('category_id', 'Category', 'required|trim');
       //$this->form_validation->set_rules('question_type', 'Question', 'required|trim');
       // $this->form_validation->set_rules('question', 'Question', 'required|trim');
       $this->form_validation->set_rules('test_time', 'Time', 'required|trim');


       if($this->form_validation->run() == FALSE){
       }else{
        $data_form['course_id']             = $this->input->post('course_id');
        $data_form['category_id']           = $this->input->post('category_id');
        $data_form['questions']              = implode( ",", $this->input->post('question'));
        $data_form['test_code']             = $this->input->post('test_code');
        $data_form['test_time']             = $this->input->post('test_time');
      
        if($this->input->post('updateid')){         
          $data_form['id'] = $this->input->post('updateid');
          if($this->Ftc_model->updateData($data_form, 'ftc_test_master')){
            $this->session->set_flashdata("query-msg","Data is updated successfully.");
            $this->session->set_flashdata("query-class","alert-success");
          }else{
            $this->session->set_flashdata("query-msg","Data is not updated. Please try again.");
            $this->session->set_flashdata("query-class","alert-danger");
          }
        }else{

          if($this->Ftc_model->addData($data_form, 'ftc_test_master')){
            $this->session->set_flashdata("query-msg","Data is added successfully.");
            $this->session->set_flashdata("query-class","alert-success");
          }else{
            $this->session->set_flashdata("query-msg","Data is not added. Please try again.");
            $this->session->set_flashdata("query-class","alert-danger");
          } 
        }
        return redirect(base_url(INDEX_PHP."ftcinternational/viewtests"));
      }
    }        
    $data['title']          = 'Add';
        // Check for edit data
  $data['singleRecord'] = array();
  if($id){
    $data['title']          = 'Edit';
    $data['singleRecord'] = $this->Ftc_model->get_single_info('ftc_questions_master', $id);
    $data['category_types'] = $this->Ftc_model->get_all_records('ftc_course_category_master');
   // print_r($data['category_types']);
  }
  //print_r($data['singleRecord']);exit;
        // Get all records of company
  $data['courses'] = $this->Ftc_model->get_all_records('ftc_courses_master');



  //$data['allQuestions'] = $this->Ftc_model->get_all_Questions();
  $data['action'] = 'add';
  $data['header']         = "admin/header";
  $data['menu']           = "admin/menu";
  $data['main']           = "admin/tests";
  $data['footer']         = "admin/footer";   
  $this->load->view('admin/templates.php', $data);
}

  public function viewtests(){
    $data['allTests'] = $this->Ftc_model->get_all_tests();
    $data['class']      = "tests";
    $data['action'] = 'view';
    $data['header']         = "admin/header";
    $data['menu']           = "admin/menu";
    $data['main']           = "admin/tests";
    $data['footer']         = "admin/footer";   
    $this->load->view('admin/templates.php', $data);
  }

function getQuestions(){
  //print_r($_POST);exit;
  $dataArray = '';
  $course_id = $_POST['course_id'];
  $category_id = $_POST['category_id'];
  $data = $this->Ftc_model->get_questions($course_id, $category_id);
  //print_r($data);
  echo json_encode($data);
}

function getTestDetails(){
   //print_r($_POST);exit;
  $dataArray = '';
  $id = $_POST['id'];
  $data = $this->Ftc_model->get_tests($id);
  //print_r($data);
  echo json_encode($data);
}

function delete_tests($id = NULL){
    if($id){
      if($this->Ftc_model->delete_data('ftc_test_master', $id)){
        $this->session->set_flashdata("query-msg","Data is deleted successfully.");
        $this->session->set_flashdata("query-class","alert-success");
      }else{
        $this->session->set_flashdata("query-msg","Data is not deleted. Please try again.");
        $this->session->set_flashdata("query-class","alert-danger");
      }
    }
    return redirect(base_url(INDEX_PHP."ftcinternational/viewtests"));
  }

  function userStatus(){
    $id = $_POST['id'];
    $status = $_POST['status'];
    $data = $this->Ftc_model->updateUserStatus($id, $status);
    echo $data;
  }

}



