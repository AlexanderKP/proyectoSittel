<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdocumentos extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('documento_model');
        if ($this->session->userdata('s_user') == FALSE) {
      		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
      		redirect(base_url());
    	}
    }
    function index()
    {
        $data['links'] = 'Mdocumentos/header';
        $data['content_view'] = 'Mdocumentos/registrar_tema_view';
        $data['scripts'] = 'Mdocumentos/scripts1';
		$this->template->sample_template($data);
    }
    function listar()
    {
        $data['links'] = 'Mdocumentos/headerlist';
        $data['scripts'] = 'Mdocumentos/scriptslist';
        $data['listartema'] = $this->documento_model->getTemas()->result_array();
    	$data['content_view'] = 'Mdocumentos/listar_tema_view';
		$this->template->sample_template($data);
    }
    function subtema()
    {
        $data['links'] = 'Mdocumentos/header';
    	$data['content_view'] = 'Mdocumentos/registrar_subtema_view';
        $data['scripts'] = 'Mdocumentos/scripts2';
		$this->template->sample_template($data);
    }
    function sublistar()
    {
        $data['links'] = 'Mdocumentos/headerlist';
        $data['scripts'] = 'Mdocumentos/scriptslist2';
        $data['listarsubtema'] = $this->documento_model->getSubtemas()->result_array();
    	$data['content_view'] = 'Mdocumentos/listar_subtema_view';
		$this->template->sample_template($data);
    }


    function json_getTemas(){

        $temas = $this->documento_model->getTemas()->result_array();
        $data = array(
            'temas' => $temas
        );
        echo json_encode($data);
    }

    function json_FiltrosubTemas($n){
        $subtema = $this->documento_model->filtrarSubTemas($n)->result_array();
        echo json_encode($subtema);
    }

    function guardarTema()
    {
        $post = $this->input->post();
        $this->documento_model->guardarTema($post);
    }
    function guardarSubtema()
    {
        $post = $this->input->post();
        $this->documento_model->guardarSubtema($post);
    }

    function getTema($id)
    {
        $query = $this->documento_model->getTemaFilter($id);
        echo json_encode($query->result_array());
    }
    function deleteTema($n)
    {
        $this->documento_model->deleteTema($n);
    }

    function getSubtema($id)
    {
        $query = $this->documento_model->getSubtemaFilter($id);
        echo json_encode($query->result_array());
    }
    function deleteSubtema($n)
    {
        $this->documento_model->deleteSubtema($n);
    }

    function editarTema()
    {
        $post = $this->input->post();
        $this->documento_model->updateTema($post);  
        redirect(base_url().'Mdocumentos/listar');      
    }

    function editarSubtema()
    {
        $post = $this->input->post();
        $this->documento_model->updateSubtema($post);  
        redirect(base_url().'Mdocumentos/sublistar');      
    }
}