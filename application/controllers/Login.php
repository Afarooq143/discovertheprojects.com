<?php

class Login extends CI_Controller{

	public function index(){
		//print_r($_POST);exit;
		if( $this->session->userdata('id')){
			 $data['header']         = "admin/header";
		     $data['menu']           = "admin/menu";
		     $data['main']           = "admin/home";
		     $data['footer']         = "admin/footer";		
		     $this->load->view('admin/templates.php', $data);
		}
		$this->load->helper('form');
		$this->load->view('admin/login');	
	}

	public function adminLogin()
	{
		//print_r($_POST);
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
       $this->form_validation->set_rules('password', 'Password', 'required|trim');

       if($this->form_validation->run() == FALSE){
       }else{
      

			//Success
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('login_model');
			$userId = $this->login_model->checkLogin($username,$password);
			if ($userId) {
				$this->session->set_userdata('id',$userId); 
				return redirect('ftcinternational');
			}else{
				$this->session->set_flashdata('Login','Invalid Username/Password');
				//return redirect('login');
				$this->load->view('login');
			}
		}
	}




	 /**
   * 
   * To admin logout
   *
   * @return null
   */
    public function logout()
	 {
		//$sessionId=$this->session->userdata('session_id');
	    $this->session->unset_userdata('id');
	    $this->session->sess_destroy();
	    redirect(base_url(INDEX_PHP."login"));
	 }


}