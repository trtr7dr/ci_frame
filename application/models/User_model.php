<?php

class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function check($name, $pass) {
        $query = $this->db
                ->where('name', $name)
                ->where('pass', md5($pass))
                ->get('users');
        $res = false;
        if(count($query->result_array()) === 1)
            $res = true;
        return $query->result_array();
    }

}
