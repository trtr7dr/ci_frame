<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function pags() {
        $this->load->library('pagination');
        $config['per_page'] = 2;
        $config['first_link'] = '';
        
        $config['last_link'] = '';


        $config['base_url'] = base_url() . '/news/p';
        $config['total_rows'] = $this->news_model->news_count() / 2;
 
        return $this->pagination->initialize($config);
    }

    public function index() {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'Новости';

        $data['paginator'] = $this->pags();

        $this->load->view('templates/headers', $data);
        $this->load->view('news/index', $data);

        $this->load->view('templates/footer');
    }

    public function pages($n = 1) { 
        $data['news'] = $this->news_model->get_block($n);
        $data['title'] = 'Новости';
        $data['paginator'] = $this->pags();
        $this->load->view('templates/headers', $data);
        $this->load->view('news/index', $data);

        $this->load->view('templates/footer');
    }

    public function view($slug) {
        if($slug === 'p'){ //простите, не вкурил в пагинацию нормально
            $this->pages(1);
            return 0;
        }
        $art = $this->news_model->get_news($slug);
        $data['news_item'] = $art[0];

        if (empty($data['news_item'])) {
            show_404();
        }

        $data['title'] = $data['news_item']['title'];

        $this->load->view('templates/headers', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/headers', $data);
            $this->load->view('news/create');
            $this->load->view('templates/footer');
        } else {
            $this->news_model->set_news();
            $this->load->view('news/success');
        }
    }

}
