<?php

class News_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_news($slug = FALSE) {
        if ($slug === FALSE) {
            $query = $this->db
                    ->limit(2)
                    ->order_by("ACTIVE", "Y")
                    ->order_by("ID", "desc")
                    ->get('i_news');
            return $query->result_array();
        }
        $query = $this->db->get_where('i_news', array('slug' => $slug));
        return $query->result_array();
    }
    
    public function get_block($num) {
        $all = $this->news_count();
        $l_1 = $all - $num * 5;
        $l_2 = $l_1 + 5;
      
        
        $query = $this->db->limit(5)
                ->order_by("ID", "desc")
                ->order_by("ACTIVE", "Y")
                ->where('ID >', $l_1)
                ->where('ID <=', $l_2)
                ->get('i_news');
        return $query->result_array();
    }
    
    public function news_count() {
        return $this->db->count_all_results('i_news');
    }
    

    public function set_news() {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );

        return $this->db->insert('news', $data);
    }
    

}
