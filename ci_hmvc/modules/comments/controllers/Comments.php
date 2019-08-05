<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comments extends MX_Controller {

	function comments()
	{
	    $this->load->view("comments/comment_view.tpl");
	}
}