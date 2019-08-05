<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Feedback extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('feedback_model');
    } 
    public function index() {
        //$data['news'] = $this->news_model->get_news();
        $data['title'] = 'Обратная связь';

        $data['paginator'] = $this->pags();

        $this->load->view('templates/headers', $data);
        $this->load->view('feedback/create', $data);

        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Обратная связь';

        $this->form_validation->set_rules('name', 'Имя', 'required');
        $this->form_validation->set_rules('text', 'Сообщение', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/headers', $data);
            $this->load->view('feedback/create');
            $this->load->view('templates/footer');
        } else {
            $this->feedback_model->set_feedback();

            $data['title'] = 'Обратная связь';
            $this->load->view('templates/headers', $data);
            $this->load->view('feedback/success', $data);
            $this->load->view('templates/footer');

        }
    }

}
