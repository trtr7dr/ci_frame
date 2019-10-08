<?php

class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_news_by_id($id) {
        $query = $this->db->where('id =', intval($id))
                ->limit(1)
                ->get('i_news');
        return $query->row();
    }

    public function get_news($slug = FALSE, $lim = 6) {
        if ($slug === FALSE) {
            $query = $this->db
                    ->limit($lim)
                    ->order_by("id", "desc")
                    ->get('i_news');
            return $query->result_array();
        }
        $query = $this->db->get_where('i_news', array('url' => $slug));
        return $query->result_array();
    }

    public function get_block($num) {
        $all = $this->news_count();
        $l_1 = $all - $num * 5;
        $l_2 = $l_1 + 5;


        $query = $this->db->limit(6)
                ->order_by("id", "desc")
                ->where('id >', $l_1)
                ->where('id <=', $l_2)
                ->get('i_news');
        return $query->result_array();
    }

    public function news_count() {
        return $this->db->count_all_results('i_news');
    }

    public function set_news() {
        $this->load->helper('url');
        $data = array(
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'text' => $this->input->post('text'),
            'type' => $this->input->post('type'),
            'pre_img' => $this->input->post('pre_img'),
            'gallery' => $this->input->post('gallery'),
            'created' => date('d.m.Y')
        );
        return $this->db->insert('i_news', $data);
    }

    public function update_news($id) {
        $this->load->helper('url');
        $data = array(
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'text' => $this->input->post('text'),
            'type' => $this->input->post('type'),
            'pre_img' => $this->input->post('pre_img'),
            'gallery' => $this->input->post('gallery')
        );
        $this->db->where('id', $id);
        return $this->db->update('i_news', $data);
    }

}
