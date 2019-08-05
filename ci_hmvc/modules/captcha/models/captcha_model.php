<?php
	
defined('BASEPATH') OR exit('No direct script access allowed');
class Captcha_model extends CI_Model {
	
	function setting($word){
		return array(
			'word' => $word,
			'img_path' => base_url().'img/captcha/',
			'img_url' => base_url().'img/captcha/',
			'font_path' => './system/fonts/texb.ttf',
			'img_width' => 150,
			'img_height' => 30,
			'expiration' => 60
		);
	}
	
		
}
