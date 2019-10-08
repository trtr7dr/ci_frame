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
        $config['per_page'] = 6;
        $config['first_link'] = '';
        
        $config['last_link'] = '';
        $config['base_url'] = base_url() . '/news/p';
        $config['total_rows'] = $this->news_model->news_count() / 6;
 
        return $this->pagination->initialize($config);
    }
    public function index() {
        $data['news'] = $this->news_model->get_news();
        $data['title'] = 'Новости';
        $data['paginator'] = 2;
        $this->load->view('templates/headers', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }
    public function pages($n = 1) { 
        $data['news'] = $this->news_model->get_block($n);
        $data['title'] = 'Новости';
        $data['paginator'] = $n + 1;
        $this->load->view('templates/headers', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
    }
    public function view($slug) {
        if($slug === 'p'){ //простите, не вкурил в пагинацию нормально
            $this->pages(1);
            return 0;
        }
        $art = $this->news_model->get_news($slug, 1);
        $data = [];
        
        $data['news_item'] = $art[0];
        if (empty($data['news_item'])) {
            show_404();
        }
        $data['title'] = $data['news_item']['title'];
        $this->load->view('templates/headers', $data);
        $this->load->view('news/view', $art[0]);
        $this->load->view('templates/footer');
    }
   
}
