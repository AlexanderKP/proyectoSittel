<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ticket_model');
        $this->load->model('secretaria_model');
        $this->load->model('usuario_model');
        $this->load->model('documento_model');
        if ($this->session->userdata('s_user') == FALSE) {
      		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
      		redirect(base_url());
    	}
    }
    
    function index()
    {
    	$data['links'] = 'Ticket/header';
        $data['scripts'] = 'Ticket/scriptsReg';
        $data['temas'] = $this->documento_model->getTemas()->result();
        $n = $this->session->userdata('s_user')->usuario_rol;
        switch ($n) {
            case '1':   //ADMIN
            $data['destinatario']=$this->usuario_model->getUsuarios()->result();
            break;

            case '2':   //CARGO
            $data['destinatario']=$this->usuario_model->getAdmins()->result();
            break;

            case '3':   //SECRETARIA    #FALTA->ver federación y sus secretarios asociados al mismo sindicato
            $admins=$this->secretaria_model->getArrayAdmin();
            $secres=$this->secretaria_model->getArraySecre();
            $data['destinatario'] = $admins + $secres;
            break;
            
            case '4':   //AFILIADO  
            $data['destinatario']=$this->secretaria_model->getSecretariaFiltro()->result();
            break;
        }
        $data['content_view'] = 'Ticket/registrar_view';
		$this->template->sample_template($data);
    }

    function listadoAdmin()
    {
    	$data['links'] = 'Ticket/header';
        $data['scripts'] = 'Ticket/scripts';

        $list = $this->ticket_model->getListadoAll();
        $data['usuario'] = $this->usuario_model->selectUsuariosAdmin();
        $data['listado'] = $list->result();   
        $data['content_view'] = 'Ticket/lista_general_view';
        $this->template->sample_template($data);
    }


    function json_actividadTicket()
    {
       $ticket = $this->input->post('ticket');
       $list = $this->ticket_model->getActividadTicket($ticket)->result_array(); 
       $user = $this->usuario_model->selectUsuarios();
       $data = array('ticket' => $list,'usuario' => $user);
       echo json_encode($data);
    }

    function listar($n)
    {
    	$data['links'] = 'Ticket/header';
        $data['scripts'] = 'Ticket/scriptsList';
        $list = $this->ticket_model->getListadoTicket($n);
        $data['titulo'] = $n;
        $data['usuario'] = $this->usuario_model->selectUsuarios(); //BUSCA DATOS DE TBL_USUARIO
        $data['listado'] = $list->result();   
        $data['content_view'] = 'Ticket/listar_view';
        $this->template->sample_template($data);
    }


    function generarTicket()
    {   
        if ($_FILES['archivo']['name'] != '') {
            $file =$this->procesarArchivo($_FILES['archivo']);
        }else{
            $file ='';
        }        
        $post = $this->input->post();
        $mail = $this->ticket_model->generarTicket($post,$file);
        $this->enviarMailTicket($mail);
    }

    function procesarArchivo($file)
    {
      $format = date("YmdHis");  
      $dir_upload = 'assets/ticket/';
      $name = $file['name'];
      $tmp = explode(".", $name);
      $extension = end($tmp);
      $name = $format . "." . $extension;
      copy($file['tmp_name'], $dir_upload . $name);
      return $name;
    }

    function listarDestinatario($n)
    {
        $accion = $this->input->post('paccion');
        $ticket = $this->input->post('pticket');
        switch ($accion) {
            case '0':
                $data = '';
            break;
            case '2':
                switch ($n) {
                    case '1':   //ADMIN
                    $data=$this->usuario_model->getUsuarios()->result_array();
                    break;

                    case '2':   //CARGO
                    $data=$this->usuario_model->getAdmins()->result_array();
                    break;

                    case '3':   //SECRETARIA    #FALTA
                    $admins=$this->secretaria_model->getArrayAdmin();
                    $secres=$this->secretaria_model->getArraySecre();
                    $data = $admins + $secres;
                    break;
                    
                    case '4':   //AFILIADO  
                    $sindicato_id = $this->session->userdata('s_persona')->persona_sindicato;
                    $data=$this->secretaria_model->getSecretariaFiltro($sindicato_id)->result_array();
                    break;
                }
                break;
            
            case '3':
                $data = $this->ticket_model->getTicket($ticket)->result_array();
                break;
        }      
        echo json_encode($data);
    }

    function responderTicket()
    {
        $post = $this->input->post();
        if ($_FILES['archivo']['name'] != '') {
            $file =$this->procesarArchivo($_FILES['archivo']);
        }else{
            $file ='';
        }   
        $mail = $this->ticket_model->generarActividad($post,$file);
        $this->enviarMailTicket($mail);
    }
}
