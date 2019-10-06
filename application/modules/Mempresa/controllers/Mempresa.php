<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mempresa extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('empresa_model');
        
    }
    
    function index()
    {
        if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
        $data['links'] = 'Mempresa/header';
        $data['content_view'] = 'Mempresa/registrar_view';
        $data['scripts'] = 'Mempresa/scripts1';
		$this->template->sample_template($data);
    }

    function listar()
    {
        if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
        $data['links'] = 'Mempresa/headerlist';
        $data['scripts'] = 'Mempresa/scriptslist';
        $data['listarempresa'] = $this->empresa_model->getEmpresas()->result_array();
    	$data['content_view'] = 'Mempresa/listar_view';
		$this->template->sample_template($data);
    }

    function registrarcargo()
    {
        if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
        $data['token'] = do_hash(rand(100,99999),'md5');
        $data['empresa'] = $this->empresa_model->getEmpresas()->result_array();
        $data['links'] = 'Mempresa/header';
        $data['content_view'] = 'Mempresa/registrar_cargo_view';
        $data['scripts'] = 'Mempresa/scripts2';
        $this->template->sample_template($data);
    }

    function listarcargo()
    {
        if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
        $data['links'] = 'Mempresa/headerlist';
        $data['scripts'] = 'Mempresa/scriptslist2';
        $data['listarcargo'] = $this->empresa_model->getCargos()->result_array();
        $data['content_view'] = 'Mempresa/listar_cargo_view';
        $this->template->sample_template($data);
    }

    function guardarEmpresa()
    {
        $post = $this->input->post();
        $this->empresa_model->guardarEmpresa($post);
    }

    function guardarCargo()
    {
        $post = $this->input->post();
        $this->enviarMailRegistro($post['email'],$post);
        $this->empresa_model->guardarCargo($post);
    }

    function getEmpresa($id)
    {
        if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
        $query = $this->empresa_model->getEmpresaFilter($id);
        echo json_encode($query->result_array());
    }
    function deleteEmpresa($n)
    {
        $this->empresa_model->deleteEmpresa($n);
    }

    function getCargo($id)
    {
        if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
        $query = $this->empresa_model->getCargoFilter($id);
        echo json_encode($query->result_array());
    }

    function getCargoUnreg()
    {
        if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
        $query = $this->empresa_model->getCargoUnregister();
        echo json_encode($query->result_array());
    }

    function deleteCargo()
    {
        $post = $this->input->post();
        $this->empresa_model->deleteCargo($post);
    }

    function editarEmpresa()
    {
        $post = $this->input->post();
        $this->empresa_model->updateEmpresa($post);  
        redirect(base_url().'Mempresa/listar');      
    }

    function json_getEmpresas(){

if ($this->session->userdata('s_user') == FALSE) {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
            redirect(base_url());
        }
        $data = $this->empresa_model->getEmpresas()->result_array();
        echo json_encode($data);
    }

    function editarCargo()
    {
        $post = $this->input->post();
        $this->empresa_model->updateCargo($post);  
        redirect(base_url().'Mempresa/listarcargo');      
    }

    
}
