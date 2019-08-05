<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MX_Controller {

	var $module_name = "menu";

	function __construct()
	{
		parent::__construct();
		$this->load->library('common/main_lib');
        $this->load->model('menu_model');
	}

  

    function get_simple_menu($menu_name){
        
        $html = $this->menu_model->get_menu_item($menu_name);
        return $html;

    }
    
 
}