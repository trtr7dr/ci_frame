<?php

    if (!defined('BASEPATH'))
	exit('No direct script access allowed');

    class Admin_model extends CI_Model {

	function __construct() {
	    parent::__construct();
	}

	function login() {
	    $res;
	    if (isset($_SESSION['created'])) {
		if (time() - $_SESSION['created'] > 5) {
		    session_destroy();
		    session_unset();
		    $_SESSION['log'] = true;
		    $res = true;
		} else {
		    $res = false;
		}
	    } else {
		$_SESSION['created'] = time();
		$res = true;
	    }
	    return $res;
	}
	
	function identificate(){
	    $res;
	    if(isset($_POST['pass']) && isset($_POST['log'])){
		if($this->log_check($_POST['log'], $_POST['pass'])){
		    $res = true;
		}
		else{
		    $res = false;
		}
	    }
	    else {
		$res = FALSE;
	    }
	    return $res;
	}
	
	
	function log_check($log, $pass) {
	    $res = false;
	    $query = $this->db->query('SELECT pass FROM user WHERE name = "'.$log.'" LIMIT 1');
	    foreach ($query->result() as $row){

		if ($row->pass == md5($pass)){
		    $res = true;
		}
		else{
		    $res = false;
		}
	    }
	    return $res;
	}
    }