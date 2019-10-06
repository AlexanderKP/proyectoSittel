<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msindicato extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sindicato_model');
        if ($this->session->userdata('s_user') == FALSE) {
      		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
      		redirect(base_url());
    	}
    }
    
    function index()
    {
        $data['content_view'] = 'Msindicato/registrar_view';
		$this->template->sample_template($data);
    }

    function listar()
    {
        $data['listasindicato'] = $this->sindicato_model->getSindicatos()->result_array();
    	$data['content_view'] = 'Msindicato/listar_view';
		$this->template->sample_template($data);
    }

    function guardarSindicato()
    {
        $post = $this->input->post();
        $this->sindicato_model->guardarSindicato($post);
    }

    function getSindicato($id)
    {
        $query = $this->sindicato_model->getSindicatoFilter($id);
        echo json_encode($query->result_array());
    }
    function deleteSindicato($id)
    {
        $this->sindicato_model->deleteSindicato($id);
    }

    function editarSindicato()
    {
        $post = $this->input->post();
        $this->sindicato_model->updateSindicato($post);  
        redirect(base_url().'Msindicato/listar');      
    }
}

