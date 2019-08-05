<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class Upload extends CI_Controller {

	function __construct() {
	    parent::__construct();
	    $this->load->helper(array('form', 'url'));
	    $this->load->library('upload');
	    $this->load->library('My_Upload');
	}

	function index() {
	    $this->load->helper('form');
	    $this->load->view('upload_image_view', array('error' => ' '));
	}

	function do_upload() {

	    $this->load->model('upload_image_model');
	    $data = $this->upload_image_model->upload_image();
	    //print_r($data);
	    print json_encode($data);
	}

    }

?>