<?php
	/**
	* Model to perform CRM relatted task
	*/
	class Ftc_model extends CI_Model
	{	
		// Variable for table name  
		// private $stbl_adminusers                    = "stbl_adminusers";
  //       private $stbl_company                       = "stbl_company";
        
        
        function login_process($username,$password)
        {	            
            $this->db->select('userid,first_name,last_name,email,usertype');
            $this->db->from($this->stbl_adminusers);
            $this->db->where('email', $username);
            $this->db->where('password', $password);
            $this->db->limit(1);             
            $query = $this->db->get();
            if($query->num_rows() == 1)
            {	
                return $query->result();
            }
            else
            {
                return false;
            }
        }
		
		function user_login_process($username,$password)
        {	            
            $this->db->select('id,User_Name,User_Email,User_Password');
            $this->db->from($this->stbl_users);
            $this->db->where('User_Email', $username);
            $this->db->where('User_Password', $password);
            $this->db->limit(1);             
            $query = $this->db->get();
            if($query->num_rows() == 1)
            {	
                return $query->result();
            }
            else
            {
                return false;
            }
        }
        /**************************************************************
        All Functions related to the Company section : start here
        **************************************************************/
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
                $this->db->order_by("id desc");
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
            
            
            function getCourseCategories($id){
                $this->db->select('Course.category_id, Category.category_name, Category.id');
                $this->db->from('ftc_courses_master  Course, ftc_course_category_master Category');
                $this->db->where('FIND_IN_SET(Category.id, Course.category_id)');
                $this->db->where('Course.id', $id);                
               //$this->db->order_by("Category.id desc");
               $query = $this->db->get();
                return $query->result();
            }

            function delete_course_categories($id){
                $sql="DELETE FROM ftc_course_category_master USING ftc_course_category_master, ftc_courses_master WHERE FIND_IN_SET(ftc_course_category_master.id, ftc_courses_master.category_id) 
                      AND ftc_courses_master.id=?";
                if($this->db->query($sql, array($id))){
                    if($this->db->delete('ftc_courses_master', array('id' => $id))){
                        return true;
                    }else{
                       return false;
                    }
                }else{
                    return false;
                }
            }
            
             function getSubUnits($id){
                $this->db->select('Units.subunits_id, Subunit.subunit_name, Subunit.id');
                $this->db->from('ftc_units_master  Units, ftc_sub_units_master Subunit');
                $this->db->where('FIND_IN_SET(Subunit.id, Units.subunits_id)');
                $this->db->where('Units.id', $id);                
               $query = $this->db->get();
                return $query->result();
            }


            function get_all_units(){
                $this->db->select('Units.*,Category.category_name,Course.course'); 
                $this->db->from('ftc_units_master Units ');
                $this->db->join('ftc_course_category_master Category', 'ON Category.id = Units.category_id');
                $this->db->join('ftc_courses_master Course', 'ON Course.id = Units.course_id');
                $this->db->order_by("Units.id desc");
                $query = $this->db->get();
               //print_r($query->result());exit;
                return $query->result();
            }
            
            function delete_unit_subunits($id){
                $sql="DELETE FROM ftc_sub_units_master USING ftc_sub_units_master, ftc_units_master WHERE FIND_IN_SET(ftc_sub_units_master.id, ftc_units_master.subunits_id) 
                      AND ftc_units_master.id=?";
                if($this->db->query($sql, array($id))){
                    if($this->db->delete('ftc_units_master', array('id' => $id))){
                        return true;
                    }else{
                       return false;
                    }
                }else{
                    return false;
                }
            }



        function get_all_Questions(){
            $this->db->select('Question.*,Category.category_name,Course.course'); 
            $this->db->from('ftc_questions_master Question ');
            $this->db->join('ftc_course_category_master Category', 'ON Category.id = Question.category_id');
            $this->db->join('ftc_courses_master Course', 'ON Course.id = Question.course_id');
            $this->db->order_by("Category.id desc");
            $query = $this->db->get();
           //print_r($query->result());exit;
            return $query->result();
        }




        /*Function for getting single users group permission info */
            function get_single_course_info($id){
                
                $this->db->select('*');
                $this->db->from('ftc_courses_master');
                $this->db->where('id', $id); 
                //$this->db->join('ftc_course_category_master Category ', 'Category.id= Course.category_id');                     
                $query = $this->db->get();
                return $query->result();
            }


            /*Function for getting single company info */
            function get_single_info($table, $id){
                $query = $this->db->get_where($table, array('id' => $id));
                return $query->row();
            }


           
        
       function get_questions($course_id, $category_id){
            $this->db->select('*');
            $this->db->from('ftc_questions_master');
            $this->db->where('course_id', $course_id); 
            $this->db->where('category_id', $category_id);                      
            $query = $this->db->get();
            return $query->result();
       }     

        function get_all_tests(){
            $this->db->select('Test.*,Category.category_name,Course.course'); 
            $this->db->from('ftc_test_master Test ');
            $this->db->join('ftc_course_category_master Category', 'ON Category.id = Test.category_id');
            $this->db->join('ftc_courses_master Course', 'ON Course.id = Test.course_id');
            $this->db->order_by("Test.id desc");
            $query = $this->db->get();
           //print_r($query->result());exit;
            return $query->result();
        }


         function get_tests($id){
            $this->db->select('Questions.*, Tests.questions');
            $this->db->from('ftc_questions_master  Questions, ftc_test_master Tests');
            $this->db->where('FIND_IN_SET(Questions.id, Tests.questions)');
            $this->db->where('Tests.id', $id);                
           //$this->db->order_by("Category.id desc");
           $query = $this->db->get();
            return $query->result();
        }


       
	}	