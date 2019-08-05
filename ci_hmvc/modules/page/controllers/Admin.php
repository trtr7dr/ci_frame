<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

	var $module_name	= "page";

    function __construct()
    {
        parent::__construct();
        $this->load->helper('text');
        $this->load->library('admin/admin_lib');
        $this->load->model('page_model');
        $this->load->library('page/page_lib');
    }

    function index()
    {
	    echo('123123121231');
        //Пагинация
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url().'admin/page/index/';
        $config['total_rows'] = $this->db->count_all('pages');
        $config["per_page"] = $this->config->item('pagination', 'admin_config');
        $config["uri_segment"] = 4;
        $uri_segment = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

        $data['categories'] = $this->page_lib->get_categories();
        $tree = $this->page_model->get_pages($config["per_page"], $uri_segment);
        $data["pageTreeHTML"] = $this->renderPageList($tree);

        $tpl['content'] = $this->load->view("admin/admin_page_list.tpl", $data, true);
        $this->admin_lib->render_admin_page($tpl);
    }

    function page_list($cat = null)
    {
        //Пагинация
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url().'admin/page/page_list/'.$cat.'/';
        $config['total_rows'] = $this->db->where('cat_id', $cat)->get('pages')->num_rows();
        $config["per_page"] = $this->config->item('pagination', 'admin_config');
        $config["uri_segment"] = 5;
        $uri_segment = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $this->pagination->initialize($config);
        $data['links'] = $this->pagination->create_links();

        $data['categories'] = $this->page_lib->get_categories($cat);
        //добаляем в сессии номер каталога для автоматического распознавания при добавлении статьи
        $this->session->set_userdata('catalog_id', $cat);
        $tree = $this->page_model->get_pages($config["per_page"], $uri_segment, $cat);
        $data["pageTreeHTML"] = $this->renderPageList($tree);

        $tpl['content'] = $this->load->view("admin/admin_page_list.tpl", $data, true);
        $this->admin_lib->render_admin_page($tpl);
    }

    //рендер всех каталогов по шаблону
    private function renderPageList($tree) {
        $html = '';

        foreach ($tree as $item) {
            $html .= '<div>';
            $html .= $this->load->view('admin/admin_page_list_item.tpl', array('item' => $item), true);
            $html .= '</div>';
        }
        return $html;
    }

    //добавляем данные
    function add()
    {
        if ($this->session->userdata('catalog_id')){
            $cat = $this->session->userdata('catalog_id');
        }
        else{
            $cat = "";
        }
        $data['today'] = date('Y-m-d H:i:s');
        $data['cat_id'] = $this->page_lib->get_select_categories($cat);
        $tpl['content'] = $this->load->view("admin/admin_page_add.tpl", $data, true);
        $this->admin_lib->render_admin_page($tpl);
    }

    //удаляем данные
    function delete($id = null)
    {
        if($id != ""){
            $this->db->where('id', $id);
            $this->db->delete('pages');
            $this->admin_lib->set_admin_alerts('alert_warning', 'Страница удалена ID#'.$id.'', 'admin/page');
        }
        elseif ($this->input->post()) {
            $post = $this->input->post();
            $data['ids'] = $post['ids'];
            $count = 0;
            foreach($data['ids'] as $key => $value){
                $this->db->where('id', $value);
                $this->db->delete('pages');
                $count++;
            }
            $this->admin_lib->set_admin_alerts('alert_warning', 'Страницы удалены '.$count.' шт.');
        }
        else {
            $this->admin_lib->set_admin_alerts('alert_danger', 'Ошибка страница не удалена');
        }
    }

    //редактируем данные
    function edit($id)
    {
        $this->db->where("id", $id);
        $query = $this->db->get('pages');

        $query_arr = $query->row_array();
        $data = $query_arr;
        $data['today'] = date('Y-m-d H:i:s');
        $data['cat_id'] = $this->page_lib->get_select_categories($query_arr['cat_id']);

        $tpl['content'] = $this->load->view("admin/admin_page_edit.tpl", $data, true);
        $this->admin_lib->render_admin_page($tpl);
    }

    //сохраняем данные
    function save($new = false)
    {
        if ($this->input->post())
        {
            $post = $this->input->post();
            $id = $this->input->post('id');
            $data['name'] = htmlspecialchars($post['name']);
            $data['cat_id'] = $post['cat_id'];
            $data['content'] = ($post['content']);
            $data['image'] = $post['image'];
            $data['template'] = $post['template'];
            $data['author'] = $this->session->userdata('username');


            (!isset($post['created']) || $post['created'] == "") ? $data['created'] = date('Y-m-d H:i:s') : $data['created'] = $post['created'];
            (!isset($post['edited']) || $post['edited'] == "") ? $data['edited'] = date('Y-m-d H:i:s') : $data['edited'] = $post['edited'];
            ($post['meta_url'] == "") ? $data['meta_url'] = $this->admin_lib->url_translit($post['name']) : $data['meta_url'] = $post['meta_url'];

            $data['meta_title'] = htmlspecialchars($post['meta_title']);
            $data['meta_h1'] = htmlspecialchars($post['meta_h1']);
            $data['meta_description'] = htmlspecialchars($post['meta_description']);
            $data['meta_keywords'] = htmlspecialchars($post['meta_keywords']);
            $data['post_status'] = htmlspecialchars($post['post_status']);

            (!isset($post['date_hidden']) || $post['date_hidden'] == "") ? $data['date_hidden'] = '0' : $data['date_hidden'] = '1';
            (!isset($post['post_from']) || $post['post_from'] == "") ? $data['post_from'] = '0' : $data['post_from'] = $post['post_from'];
            (!isset($post['post_to']) || $post['post_to'] == "") ? $data['post_to'] = '0' : $data['post_to'] = $post['post_to'];

            $data['short_content'] = htmlspecialchars($post['short_content']);

            if($new == true){
                $data['post_viewed'] = 0;
                $data['edited'] = $data['created'];
                $this->db->insert('pages', $data);
            }
            else{
                //$data['edited'] = $post['edited'];
                $this->db->where("id", $id);
                $this->db->update('pages', $data);
            }
            if ($this->session->userdata('catalog_id')){
                $redirect = "admin/page/page_list/".$this->session->userdata('catalog_id');
            }
            else{
                $redirect = "admin/page";
            }
            $this->admin_lib->set_admin_alerts('alert_success', 'Страница сохранена: '.$data['name'].' ', $redirect);
        }
        else
        {
            $this->admin_lib->set_admin_alerts('alert_danger', 'Страница не сохранена', 'admin/page');
        }
    }

    //методом post проверяет наличие URL в базе данных и возвращает TRUE или FALSE
    function checkname(){
        $isAvailable = true;
        if ($this->input->post()) {
            $post = $this->input->post();
            switch ($post['type']) {
                case 'url':
                    $url = $post['meta_url'];
                    $id = $post["id"];
                    $query = $this->db->where('id !=', $id)->where("meta_url", $url)->get('pages');
                    if ($query->num_rows() == 0) {
                        $isAvailable = true;
                    } elseif ($query->num_rows() > 0) {
                        $isAvailable = false;
                    }
                    break;
                case 'name':
                default:
                    $name = $post['name'];
                    $isAvailable = true; // or false
                    break;
            }
        }
        // возвращаем true or false для валидации
        echo json_encode(array(
            'valid' => $isAvailable,
        ));
    }

    //изменяем методом ajax видимость страницы
    function change_status($id){
        if ($id != "") {
            $query = $this->db->get_where('pages', array('id' => $id));
            $result = $query->row_array();
            if($result['post_status'] == '1'){
                $data['post_status'] = '0';
            }
            elseif($result['post_status'] == '0'){
                $data['post_status'] = '1';
            }
            $this->db->where("id", $id);
            $this->db->update('pages', $data);
        }
    }

}
