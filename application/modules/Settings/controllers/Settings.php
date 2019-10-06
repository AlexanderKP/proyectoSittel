<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
        if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
    }

    public function index() {
        $data['links'] = 'Settings/header';
		$data['content_view'] = 'Settings/index_view';
        $data['scripts'] = 'Settings/scripts';
        $this->template->sample_template($data);
    }

    public function contactar() {
        $data['links'] = 'Settings/header';
		$data['content_view'] = 'Settings/contactar_view';
        $data['scripts'] = 'Settings/scripts';
        $this->template->sample_template($data);
    }

    public function quejas() {
        $data['links'] = 'Settings/header';
		$data['content_view'] = 'Settings/quejas_view';
        $data['scripts'] = 'Settings/scripts';
        
        $this->template->sample_template($data);
    }

    public function validatePassword() {
        $rs = $this->settings_model->verifyPassword($this->input->post()["password"]);
        if($rs) echo 1;
        else echo 0;
    }

    public function changePass() {
        $rs = $this->settings_model->changePassword($this->input->post()["password"]);
        
        echo $rs;
    }
}