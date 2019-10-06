<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msecretaria extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('secretaria_model');
        if ($this->session->userdata('s_user') == FALSE) {
      		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
      		redirect(base_url());
    	}
    }
    
    function index()
    {
        $data['links'] = 'Msecretaria/header';
        $data['token'] = do_hash(rand(100,99999),'md5');
        $data['content_view'] = 'Msecretaria/registrar_view';
        $data['scripts'] = 'Msecretaria/scripts';
		$this->template->sample_template($data);
    }

    function listar()
    {
        $data['links'] = 'Msecretaria/headerlist';
        $data['scripts'] = 'Msecretaria/scriptslist';
        $data['listasecretaria'] = $this->secretaria_model->getSecretaria()->result_array();
    	$data['content_view'] = 'Msecretaria/listar_view';
		$this->template->sample_template($data);
    }

    function guardarSecretaria()
    {
        $post = $this->input->post();        
        $this->secretaria_model->guardarSecretaria($post);
        $this->enviarMailRegistro($post['email'],$post);
    }

    function confirmarSecretaria()
    {
        $this->load->model('usuario_model');
        $id = $_POST['cod'];
        $result = $this->usuario_model->confirmCargoUser($id);
        
        $this->enviarPasswordHashed($result);
    }

    function getSecretaria($id)
    {
        $query = $this->secretaria_model->getSecretariaFilter($id);
        echo json_encode($query->result_array());
    }
    function deleteSecretaria()
    {
        $post = $this->input->post();
        $this->secretaria_model->deleteSecretaria($post);
    }

    function editarSecretaria()
    {
        $post = $this->input->post();
        $this->secretaria_model->updateSecretaria($post);
        redirect(base_url().'Msecretaria/listar');
    }
    function getSecretariaPendiente()
    {
        $query = $this->secretaria_model->getSecretariaPendiente();
        echo json_encode($query->result_array());
    }
}

