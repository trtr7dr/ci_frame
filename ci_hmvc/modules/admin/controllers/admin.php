<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Admin extends MX_Controller {

	function __construct() {
	    parent::__construct();
	    $this->load->library('admin/admin_lib');
	    $this->load->model('admin_model');
	}
	
	function index() {
	    $_SESSION['log'] = FALSE;
	    if (!$this->admin_model->login() && !$_SESSION['log']) {
		$this->load->view("login_view");
	    } else {
		if(!$this->admin_model->identificate()){
		    $this->load->view("login_view");
		}else{
		    $modules = $this->db->get('modules')->result_array();
		    //заявок
		    $data["forms"] = $this->db->count_all_results('forms');
		    //заявок
		    $data["modules"] = count($modules); //$this->obj->db->count_all_results('modules');
		    //сколько страниц
		    $data["pages"] = $this->db->count_all_results('pages');
		    //сколько категорий
		    $data["category"] = $this->db->count_all_results('category');

		    $tpl['content'] = $this->load->view("admin/dashboard.tpl", $data, true);
		    $this->admin_lib->render_admin_page($tpl);
		}
	    }
	}
	
	function login() {
	    $this->load->view("login_view");
	    //$this->admin_model->log_check($_POST['log'],$_POST['pass']);
	}

	function docs() {
	    $data = array();
	    $tpl['content'] = $this->load->view("admin/docs.tpl", $data, true);
	    $this->admin_lib->render_admin_page($tpl);
	}

	//initialise elFinder
	public function elfinder_init($edMode = false) {
	    $this->load->helper('path');

	    if (!$edMode)
		$path = 'assets';
	    else
		$path = 'themes';

	    if ($this->input->get('path'))
		$path = $this->input->get('path');

	    $opts = array(
		// 'debug' => true,
		'roots' => array(
		    array(
			'driver' => 'LocalFileSystem',
			'path' => set_realpath($path),
			'URL' => site_url() . $path,
			'accessControl' => 'access',
			'attributes' => array(
			    array(
				'pattern' => '/admin/', //You can also set permissions for file types by adding, for example, .jpg inside pattern.
				'read' => false,
				'write' => false,
				'locked' => true
			    ),
//                        array(
//                            'pattern' => '/commerce/', //You can also set permissions for file types by adding, for example, .jpg inside pattern.
//                            'read'    => true,
//                            'write'   => true,
//                            'locked'  => false
//                        )
			)
		    // more elFinder options here
		    )
		)
	    );
	    $this->load->library('elfinder_lib', $opts);
	}

	public function do_upload() {
	    $is_ajax = $this->input->is_ajax_request();
	    $this->load->helper('file');
	    $post = $this->input->post();
	    $upload_path_url = '/assets/' . $post['folder'] . '/';

	    $config['upload_path'] = FCPATH . 'assets/' . $post['folder'] . '/';
	    $config['allowed_types'] = 'jpg|jpeg|png|gif';
	    $config['max_size'] = '30000';

	    $this->load->library('upload', $config);

	    if (!$this->upload->do_upload()) {
		$error = array('error' => $this->upload->display_errors());
		//$this->load->view('upload', $error);
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($error));
	    } else {
		$data = $this->upload->data();
		$info = new StdClass;
		$info->name = $data['file_name'];
		$info->size = $data['file_size'] * 1024;
		$info->type = $data['file_type'];
		$info->url = $upload_path_url . $data['file_name'];
		// I set this to original file since I did not create thumbs.  change to thumbnail directory if you do = $upload_path_url .'/thumbs' .$data['file_name']
		$info->thumbnailUrl = $upload_path_url . 'thumbs/' . $data['file_name'];
		$info->deleteUrl = base_url() . 'assets/deleteImage/' . $data['file_name'];
		$info->deleteType = 'DELETE';
		$info->error = null;

		$files[] = $info;
		//this is why we put this in the constants to pass only json data
		if ($is_ajax) {
		    echo json_encode(array("files" => $files));
		    //this has to be the only data returned or you will get an error.
		    //if you don't give this a json array it will give you a Empty file upload result error
		    //it you set this without the if(IS_AJAX)...else... you get ERROR:TRUE (my experience anyway)
		    // so that this will still work if javascript is not enabled
		} else {
		    show_404();
		}
	    }
	}

    }
    