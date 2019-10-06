<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mafiliado extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('afiliado_model');
        $this->load->model('sindicato_model');
        if ($this->session->userdata('s_user') == FALSE) {
      		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
      		redirect(base_url());
    	}
    }

    function index()
    {
        $data['links'] = 'Mafiliado/header';
        $data['scripts'] = 'Mafiliado/scripts';
        $data['content_view'] = 'Mafiliado/afiliar_view';
        
        $data['token'] = do_hash(rand(100,99999),'md5');
		$this->template->sample_template($data);
    }

    function listar()
    {
        $data['links'] = 'Mafiliado/headerlist';
        $data['scripts'] = 'Mafiliado/scriptslist';
        $data['content_view'] = 'Mafiliado/listar_view';
        $data['listaafiliado'] = $this->afiliado_model->getAfiliado()->result_array();
    	
		$this->template->sample_template($data);
    }

    function registrar()
    {
    	$data['content_view'] = 'Mafiliado/registrar_view';
		$this->template->sample_template($data);
    }

    function guardarAfiliado()
    {
        $post = $this->input->post();
        $consulta = $this->afiliado_model->afiliarUsuario($post);
        $this->enviarMailRegistro($post['emailpersonal'],$post);
    }

    function json_afiliados_pendiente()
    {
        $afiliadospendiente = $this->afiliado_model->getAfiliadoPendiente();
        $data = array(
            'afiliados' => $afiliadospendiente->result_array(),
        );
        echo json_encode($data);
    }

    function getAfiliado($id)
    {
        $query = $this->afiliado_model->getAfiliadoFilter($id);
        echo json_encode($query->result_array());
    }
    function deleteAfiliado()
    {
        $post = $this->input->post();
        $this->afiliado_model->deleteAfiliado($post);
    }

    function reenviarInvitacion($n)
    {        
        $consulta = $this->afiliado_model->getAfiliadoReenvio($n)->result_array()[0];
        $consulta['token'] = $consulta['usuario_token'];
        $this->enviarMailRegistro($consulta['usuario_email'],$consulta);
    }

    function editarAfiliado()
    {
        $post = $this->input->post();
        $this->afiliado_model->updateUsuarioAfiliado($post);  
        redirect(base_url().'Mafiliado/listar');      
    }
}