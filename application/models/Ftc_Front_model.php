<?php 
class Ftc_Front_model extends CI_Model
{
         private $ftc_country_master           =       "ftc_country_master";
         private $ftc_user_product_master      =       "ftc_user_product_master";
         private  $ftc_units_master            =       "ftc_units_master";
         private  $ftc_courses_master          =       "ftc_courses_master";

/*Function for getting all records of company */
    // function get_all_country(){               
    //     $this->db->select("id,country_name");
    //     $this->db->from($this->ftc_country_master);
    //     $this->db->order_by("country_name","asc");
    //     $query = $this->db->get();               
    //     return $query->result();
    // }

    public function Sen_Email($to,$from,$message = "",$subject = "")
    {
          
        
        $this->load->library('email');
        $this->email->from($from);
		$this->email->to($to);
		/*$this->email->cc('another@another-example.com');
		$this->email->bcc('them@their-example.com');*/

		$this->email->subject($subject);
		$this->email->message($message);

		if($this->email->send())
		{
			return true;
		}
		else
		{
			 return $this->email->print_debugger();
		}
    }


   function check_user_product_master($id = ''){
       if($id)
       {
	        $query = $this->db->get_where($ftc_user_product_master, array('user_id' => $id));
	        if($query->num_rows())
	        {
	        	return true;
	        }
	        else
	        {
	        	return false;
	        }
       }
    }

     /*Function for getting active users course  info */
    function get_active_course_info($id = ''){
        
        $this->db->select('*');
        $this->db->from('ftc_courses_master');
        $this->db->where('status', 1); 
        $this->db->group_by("course");
        //$this->db->join('ftc_course_category_master Category ', 'Category.id= Course.category_id');                     
        $query = $this->db->get();
        return $query->result();
    }


    /*Function for getting active users course  info */
    function get_units_master($id = ''){
        
        $this->db->select('um.id,um.course_id,um.unit,cm.course,pm.paid_status');
        $this->db->from("$this->ftc_units_master um");
        $this->db->join("$this->ftc_courses_master cm ", 'cm.id= um.course_id','inner');  
        $this->db->join("$this->ftc_user_product_master pm ", 'pm.course_id= um.course_id','inner');                     
        $this->db->where('um.course_id',$id);
        $this->db->group_by("um.id");
        $query = $this->db->get();
        return $query->result();
    }



     /* Function to insert data of user group */
        function addDataId($data, $table){                
            if($this->db->insert($table, $data)){                  
                $insert_id = $this->db->insert_id();
                return  $insert_id;
            }else{
                return false;
            }
        }


        /* Function to insert data of user group */
        function addData($data, $table){                
            if($this->db->insert($table, $data)){                  
                return  true;
            }else{
                return false;
            }
        }

        /*Function for getting all records of company */
        function get_all_records($table){               
            $this->db->select("*");
            $this->db->from($table);
            //$this->db->order_by("id desc");
            $query = $this->db->get();               
            return $query->result();
        }

        /* Function to delete company record */
        function delete_data($table, $id){
            if($this->db->delete($table, array('id' => $id))){
                return true;
            }else{
                return false;
            }
        }


        /* Function to update company */
        function updateData($data, $table){
            $id = $data['id'];
            unset($data['id']);
            if($this->db->update($table, $data, array('id' => $id))){
                return true;
            }else{
                return false;
            }
        }

         function getStates($id){
            $this->db->select('*');
            $this->db->from('ftc_states_master');
                //$this->db->where('FIND_IN_SET(Category.id, Course.category_id)');
            $this->db->where('country_id', $id);                
               //$this->db->order_by("Category.id desc");
            $query = $this->db->get();
            return $query->result();
        }

        function load_courses($id){
            $this->db->select('Course.id AS course_id, Course.course');
            $this->db->from('ftc_user_product_master Products, ftc_courses_master  Course');
            $this->db->where('Course.id = Products.course_id');
            //$this->db->where('FIND_IN_SET(Category.id, Course.category_id)');
            $this->db->where('Products.user_id', $id);                
               //$this->db->order_by("Category.id desc");
            $query = $this->db->get();
            return $query->result();
        }





        function get_user_course_categories($id){
            $this->db->select('Products.course_id, Products.paid_status, Course.course, Course.category_type, Category.category_name, Category.id AS category_id');
            $this->db->from('ftc_user_product_master Products, ftc_courses_master  Course, ftc_course_category_master Category');
            $this->db->where('Course.id = Products.course_id');
            $this->db->where('FIND_IN_SET(Category.id, Course.category_id)');
            $this->db->where('Products.user_id', $id);                
               //$this->db->order_by("Category.id desc");
            $query = $this->db->get();
            return $query->result();
        }

        function get_category_master($id){
             $this->db->select('*');
            $this->db->from('ftc_course_category_master');
            $this->db->where('id', $id);                
               //$this->db->order_by("Category.id desc");
            $query = $this->db->get();
            return $query->result();
        }

         function get_units($id){
            $this->db->select('Units.id AS unit_id, Units.unit, Subunits.id AS subunit_id, Subunits.subunit_name');
            $this->db->from('ftc_units_master  Units, ftc_sub_units_master  Subunits');
            $this->db->where('FIND_IN_SET(Subunits.id, Units.subunits_id)');
            $this->db->where('Units.category_id', $id);
            $query = $this->db->get();
            return $query->result();
    }
}