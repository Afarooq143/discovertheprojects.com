<?php 

class Login_model extends CI_Model
{
	public function checkLogin( $username, $password)
	{
		$q = $this->db->where(['username'=>$username,'password'=>$password])
						->get('ftc_user_master');
		if( $q->num_rows() ){
			return $q->row()->id;
		} else {
			return FALSE;
		}
	}


	public function check_User_Login( $email, $password)
	{
		$q = $this->db->where(['email'=>$email,'password'=>md5($password)])
						->get('ftc_user_profile_master');
		if( $q->num_rows() ){
			   $data['first_name']   =  $q->row()->first_name;
	           $data['email']        =  $q->row()->email;
	           $data['id']           =  $q->row()->id;
	           $data['status']       =  $q->row()->status;
	           return $data;
		} else {
			return FALSE;
		}
	}

    
    public function check_User_email( $email)
	{
		$q = $this->db->where(['email'=>$email])
						->get('ftc_user_profile_master');
		if( $q->num_rows() ){
		
	           return true;
		} else {
			return FALSE;
		}
	}


}

?>