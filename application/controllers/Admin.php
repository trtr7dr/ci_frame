<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private function _auth_check() {
        $this->load->helper('cookie');
        $this->load->library('session');
        $this->load->model('user_model');
        $sid = $this->db
                ->where('sid', $this->input->cookie('user'))
                ->count_all_results('users');
        $log = (!isset($_SESSION['log']) || $sid === 0) ? show_404() : 0;
        return $log;
    }

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('news_model');
        $this->_auth_check(); // проверка входа
    }

    public function index() {
        $data['news'] = $this->news_model->get_news(FALSE, 100);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/news/list', $data);
        $this->load->view('admin/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['title'] = 'Создание новости';
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'text', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');
        $this->form_validation->set_rules('pre_img', 'text', 'required');
        $this->form_validation->set_rules('gallery', 'text', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/news/create', $data);
        } else {
            $data['mess'] = 'Новость добавлена!';
            $this->news_model->set_news();
            $this->load->view('admin/header');
            $this->load->view('admin/news/success', $data);
            $this->load->view('admin/footer');
        }
    }

    public function edit($id) {
        $this->load->model('news_model');

        $data = [];
        $data['title'] = 'Правка новости';
        $data['news'] = $this->news_model->get_news_by_id($id);

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'text', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');
        $this->form_validation->set_rules('pre_img', 'text', 'required');
        $this->form_validation->set_rules('gallery', 'text', 'required');
        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/news/edit', $data);
            $this->load->view('admin/footer');
        } else {
            $this->news_model->update_news(intval($id));
            redirect('/admin', 'refresh');
        }
    }

    public function delete($id) {
        $this->db->where('id', intval($id));
        $this->db->delete('i_news');
        $data['mess'] = 'Новость удалена!';
        $this->load->view('admin/header');
        $this->load->view('admin/news/success', $data);
        $this->load->view('admin/footer');
    }

}
