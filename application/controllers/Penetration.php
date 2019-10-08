<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Penetration extends CI_Controller {

    public function index() {
        $this->load->helper('cookie');
        $this->load->helper('form');
        $this->load->view('penetration');
        $this->load->helper('url');
    }

    public function in() {
        $this->load->model('user_model');

        if ($this->user_model->check($this->input->post('name'), $this->input->post('pass'))) {
            $this->load->library('session');
            $_SESSION['log'] = true;
            
            $name   = 'user'; //установка куков
            $value  = md5($this->input->post('pass') . $this->input->post('name') . rand(0, PHP_INT_MAX - 1));
            $expire = 5000;
            $this->input->set_cookie($name, $value, $expire); 
            
            $this->db->where('name', $this->input->post('name')); //обновление кука в бд
            $data = array(
                'sid' => $value
            );
            $this->db->update('users', $data);
            
            redirect('/admin', 'refresh');
        } else {
            echo('Неправильные логин или пароль');
        }
    }

}
