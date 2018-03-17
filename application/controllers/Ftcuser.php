<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* Controller to perform all admin task
*/
class Ftcuser extends CI_Controller
{	
	

  function __construct( )
  {
    parent::__construct();
         /* if( !$this->session->userdata('id'))
            return redirect('ftclogin');
         */
            $this->load->model('Ftc_Front_model');
            $this->load->library('form_validation');
            $this->load->helper('common_helper');

          }

          function  check_user_login()
          {
            if(!$this->session->userdata('email')){
             return redirect('Ftcuser');      

           }

         }


         function index(){

          if(isset($_POST['register_submit']))
          {
        // echo "<pre>";
        // print_r($_POST);exit;
            $this->form_validation->set_rules('first_name', 'First Name', 'required|trim');
            $this->form_validation->set_rules('last_name', 'Last', 'required|trim');
            $this->form_validation->set_rules('re_email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required|trim|numeric');
            $this->form_validation->set_rules('re_password', 'Password', 'required|trim');
            $this->form_validation->set_rules('con_password', 'Confirm password', 'required|trim|matches[re_password]');
            $this->form_validation->set_rules('address', 'Address', 'required|trim');
            $this->form_validation->set_rules('qualification', 'Qualification', 'required|trim');
            $this->form_validation->set_rules('course_id', 'Course', 'required|trim');
            $this->form_validation->set_rules('country_id', 'Country', 'required|trim');
            $this->form_validation->set_rules('state_id', 'City', 'required|trim');
            $this->form_validation->set_rules('zipcode', 'Zipcode', 'required|trim|numeric');
            if($this->form_validation->run() == FALSE){                
            }else{                       
              $data['first_name']       = $this->input->post('first_name');
              $data['last_name']        = $this->input->post('last_name');
              $data['email']            = $this->input->post('re_email');
              $data['password']         = md5($this->input->post('password'));
              $data['phone']            = $this->input->post('phone');
              $data['address']          = $this->input->post('address');
              $data['qualification']    = $this->input->post('qualification');
              $data['country_id']       = $this->input->post('country_id');
              $data['state_id']       = $this->input->post('state_id');
              $data['zipcode']          = $this->input->post('zipcode');

              $product_data['course_id']    = $this->input->post('qualification');


              $this->load->model('login_model');
              if($this->login_model->check_User_email( $data['email'] ))
              {
                $this->session->set_flashdata('register','Email id already exists. Please try another');                   
              } else {
                $user_id  =   $this->Ftc_model->addDataId($data,"ftc_user_profile_master");
                if (!empty($user_id)) {
                  $product_data['user_id'] = $user_id;
                  $this->Ftc_model->addData($product_data,"ftc_user_product_master");
                  $from    = "info@discovertheprojects.com";
                  $message = "Your registeration have been done you can login after admin aproval";
                  $subject = "test";
                //$this->Ftc_Front_model->Sen_Email($data['email'] ,$from , $message , $subject);

                  $this->session->set_flashdata('register','Thanks for your registeration. You can login after admin aproval');                   
                } else {
                  $this->session->set_flashdata('register','Something went wrong...');
                }
              }
              return redirect(base_url(INDEX_PHP."ftcuser"));
             //return redirect('ftcuser');            
            }
          }
          $data['get_all_country']            =  $this->Ftc_Front_model->get_all_records('ftc_country_master');
          $data['allCourses']                 =  $this->Ftc_Front_model->get_all_records('ftc_courses_master');
      //$this->load->view('users/Registration.php',$data);

          $data['header']         = "users/include/main-header";
          $data['main']           = "users/welcome";
          $data['footer']         = "users/include/footer";    
          $this->load->view('users/templates.php', $data);		
        }

        function getStates(){
          $dataArray = '';
          $id = $_POST['id'];
          $data = $this->Ftc_Front_model->getStates($id);
    //print_r($data);
          echo json_encode($data);
        }



    public function login()
    {

      if(isset($_POST))
      $this->form_validation->set_rules('email', 'Email', 'required|trim');
      $this->form_validation->set_rules('password', 'Password', 'required|trim');
      if($this->form_validation->run() == FALSE){
          // $this->load->view('users/Registration.php');
        return redirect(base_url(INDEX_PHP."ftcuser"));

      }else{

        $username = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->model('login_model');
        $query  = $this->login_model->check_User_Login($username,$password);
        if (!empty($query)) {

          if($query['status'] ==1)
          {
            $this->session->set_userdata('first_name',$query['first_name']);
            $this->session->set_userdata('email',$query['email']);
            $this->session->set_userdata('user_id',$query['id']); 
            $course = $this->Ftc_Front_model->load_courses($query['id']);
            $this->session->set_userdata('course_id',$course[0]->course_id); 
            $this->session->set_userdata('course',$course[0]->course); 
            return redirect(base_url(INDEX_PHP."ftcuser/dashboard"));
              //return redirect('ftcuser/home'); 
          } else {
            $this->session->set_flashdata('Login','Deactive user');
              //return redirect('login');
              // $this->load->view('users/Registration.php');
            return redirect(base_url(INDEX_PHP."ftcuser"));
          }
        }else{
          $this->session->set_flashdata('Login','Invalid Username/Password');
        //return redirect('login');
       // return redirect('Ftcuser');
          return redirect(base_url(INDEX_PHP."ftcuser"));

        }
      }
    }

    public function dashboard()
    {
      $this->check_user_login();
      $id = $this->session->userdata('user_id');
      $data['categories']    = $this->Ftc_Front_model->get_user_course_categories($id);
      //print_r($data['categories']);exit;
      $data['header']         = "users/include/main-header";
      $data['main']           = "users/dashboard";
      $data['footer']         = "users/include/footer";   
      $this->load->view('users/templates.php', $data); 
    }


    public function user_product_master($id='')
    {
      $data['paid_status']   = $this->input->post('type');
      $data['course_id']   = $this->input->post('course');
      $data['user_id']       = $this->session->userdata('user_id');
      if($this->Ftc_model->addData($data,"ftc_user_product_master"))
      {
        echo true;
      }
      else
      {
       echo  false;
     }
   }


   public function units_view($id='')
   {
    if($id)
    {
     $data['get_unit']    =   $this->Ftc_Front_model->get_units_master($id);  
   }


   $data['header']         = "users/include/header";
   $data['main']           = "users/unit_view";
   $data['footer']         = "users/include/footer";   
   $this->load->view('users/templates', $data); 


 }

 public function preparation($value='')
 {
  $this->load->view('users/prepration');    

}

public function test_preparation($value='')
{
  $this->load->view('users/test_preparation');    

}


public function logout()
{
  $sessionId=$this->session->userdata('session_id');
  $this->session->unset_userdata('email');
  $this->session->unset_userdata('first_name');
  $this->session->unset_userdata('user_id');
    //session_destroy();
  return redirect('Ftcuser');
}


/*  ################################################################
      #######           Methods of Courses Start Here           ######
      ################################################################ */ 


  public function testprepration($id){
    $id = base64_decode($id);
        // if(isset($_POST)){
        //   $data['courseDetails'] = $_POST;
        //   $this->session->set_userdata('courseDetails', $data['courseDetails']);
        // }

        // print_r($_SESSION);exit;
        // $data['courseDetails'] = $this->session->courseDetails;
        $data['category']       =   $this->Ftc_Front_model->get_category_master($id); 
        //print_r($data['category']);ex 
        $data['header']         = "users/include/main-header";
        $data['main']           = "users/testprepration";
        $data['footer']         = "users/include/footer";   
        $this->load->view('users/templates.php', $data); 
  }

  public function create_session(){
    if(isset($_POST['button'])){
      print_r($_POST);
    }
        // if(isset($_POST)){
        //   $data['courseDetails'] = $_POST;
        //   $this->session->set_userdata('courseDetails', $data['courseDetails']);
        // }

        // print_r($_SESSION);exit;
        // $data['courseDetails'] = $this->session->courseDetails;
        //$data['category']       =   $this->Ftc_Front_model->get_category_master($id); 
        //print_r($data['category']);ex 
        $data['header']         = "users/include/main-header";
        $data['main']           = "users/testconfirmation";
        $data['footer']         = "users/include/footer";   
        $this->load->view('users/templates.php', $data); 
  }

}