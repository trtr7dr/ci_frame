<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MX_Controller {

	function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
		//$this->load->view('contact_view');
        
    }
	
	
	function show(){
        $this->load->view('contact_view');
	}
	
	function send(){
		
		$this->load->model('contact_model');
		
		if(!$this->contact_model->session()){
			$this->load->view('contact_timeout');
		}else{
			$this->contact_model->send_mail($_POST['name'],$_POST['mail'],$_POST['text']); 	
		}
		
	}
	
	

	
}
