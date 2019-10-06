<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mfederacion extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('s_user') == FALSE) {
      		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
      		redirect(base_url());
    	}
    }
    
    function index()
    {
        $data['content_view'] = 'Mfederacion/registrar_view';
		$this->template->sample_template($data);
    }

    function listar()
    {
    	$data['content_view'] = 'Mfederacion/listar_view';
		$this->template->sample_template($data);
    }
}
