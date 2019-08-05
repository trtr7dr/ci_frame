<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Captcha extends CI_Controller {
	
	function add_captcha($l){
		//$this->load->library('session');
		
		$this->load->helpers('captcha');
		$this->load->helpers('string');		
		$this->load->model('captcha_model');

		$word = random_string('alpha_dash', $l);
		
		$config = $this->captcha_model->setting($word);
		
		$data = create_captcha($config);
		
		$this->load->view('captcha_view', $data);
		
	}
	
}