<?php

class My_Controller extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if( !$this->session->userdata('id'))
			redirect(base_url(INDEX_PHP."login"));
	}
}
