<?php

class Feedback_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }


    public function set_feedback() {
        //$this->load->helper('url');

        //$slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'name' => $this->input->post('name'),
            'text' => $this->input->post('text'),
            'date' => date("d.m.Y H:i:s")
        );

        return $this->db->insert('feedback', $data);
    }
    

}
