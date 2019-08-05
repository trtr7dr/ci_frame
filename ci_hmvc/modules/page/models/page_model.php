<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    //функция возвращает все данные страницы page
    function get_page($url){
        $result = $this->db->where('meta_url', $url)->get('pages')->row_array();
        return $result;
    }

    //функция возвращает все данные категории страницы
    function get_category_data($cat_id){
        $result = $this->db->where('id', $cat_id)->get('category')->row_array();
        return $result;
    }

    //функция увеличивает число просмотров страницы
    function update_page_viewed($url){
        $this->db->where('meta_url', $url)->set('post_viewed', '`post_viewed`+ 1', FALSE)->update('pages');
    }

//ДЛЯ АДМИНИСТРИРОВАНИЯ
    //функция возвращает все страницы по id каталога
    function get_pages($num, $offset, $cat = null){
        $this->db->select('*');
        if ($cat != null){
            $this->db->where('cat_id', $cat);
        }
        $this->db->order_by("pages.id", "ASC");
        $query = $this->db->get("pages", $num, $offset);
        $result = $query->result_array();
        return $result;
    }
}