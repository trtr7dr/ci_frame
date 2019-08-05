<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('common/main_lib');
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function hmvc()
    {
        $data = array();
        $data['content'] = 'Content';
        $this->main_lib->render_main_page($data);
    }
}
