<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_image_model extends CI_Model {
	
	function def_error(){
		return "Непредвиденная ошибка";
	}
	function get_path(){
		return './uploads/';
	}
	function config($path){
		return array(
                "upload_path"       =>  $path,
                "allowed_types"     =>  "gif|jpg|jpeg|png",
                "max_size"          =>  '5000'
            );
	}
	
	function upload_image(){
		
		
	    $this->load->helper(array('form'));

		
        if($this->input->post('submit')){

            $this->upload->initialize($this->upload_image_model->config($this->upload_image_model->get_path()));
           
            if($this->upload->do_multi_upload("uploadfile")){
                $data['upload_data'] = $this->upload->get_multi_upload_data();
                $data['upload_code'] = 1;
                return ($data);               
            } else {   
                $errors = array('error' => $this->upload->display_errors());              
				$data['upload_code'] = 0;
                foreach($errors as $k => $error){
	                $data['error'] = $error;
					return ($data);
                }  
            }
           
        } else {
	         $data['upload_code'] = 0;
	         $data['error'] = 'error';
	         return ($data);
        }
        exit();
    }
	
}

?>