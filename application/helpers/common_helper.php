<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function get_add_edit_form_permission($globalPermissionArray = array(),$pageAction)
    {	
        $return = false;
        $CI =& get_instance();
       
             if($CI->GLOBAL_ADMIN_LOGIN_STATUS =='SUPERADMIN'){ 
                $return = true;
             }else{
                 
                 if(isset($globalPermissionArray) && !empty($globalPermissionArray) && in_array($pageAction,$globalPermissionArray)){
                    $return = true;
                 }
             }
             
             return $return;
    
}
?>