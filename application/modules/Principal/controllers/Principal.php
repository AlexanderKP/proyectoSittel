<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MY_Controller {
	
	public function __construct(){
    	parent::__construct();
    $this->load->model('principal_model');
    $this->load->model('ticket_model');
    $this->load->model('usuario_model');
		if ($this->session->userdata('s_user') == FALSE) {
      		$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Por favor debe loguearse primero!</div>');
      		redirect(base_url());
    	}
  	}
	function index()
	{
		$data['links'] = 'Principal/header';
		$data['content_view'] = 'Principal/index_view';
		$data['scripts'] = 'Principal/scripts';
		if ($this->session->userdata('s_user')->usuario_rol == 1) {
      $data['pendientes'] = $this->ticket_model->getTicketsByStatus(1);
      $data['procesando'] = $this->ticket_model->getTicketsByStatus(2);
      $data['cerrado']    = $this->ticket_model->getTicketsByStatus(3);
      $data['afiliados']  = $this->usuario_model->getCountAfiliados();
			$data['content_view'] = 'Principal/admin_view';
		}
		$this->template->sample_template($data);
  }
  
	function changepass()
	{
		$data['content_view'] = 'Principal/passwordchange_view';
		$this->template->sample_template($data);
  }
  
  function updatePassword()
	{
		$this->load->model('usuario_model');
		$post = $this->input->post();
		$this->usuario_model->updatePassword($post);		
    $this->enviarMailPassword($post);
  }
  
  function enviarMailPassword($data)
	{
		// Debes editar las próximas dos líneas de código de acuerdo con tus preferencias
        $email_to = $data['usuario'];
        $email_subject = "Sistema de Tickets FETRATEL";

        // Aquí se deberían validar los datos ingresados por el usuario
        $email_message = "Su nueva clave es: ".$data['password']."\r\n No comparta este correo con nadie.";
        // Ahora se envía el e-mail usando la función mail() de PHP
        $headers = 'From: "FETRATEL Federacion" <fetratel@fetratel.com>'."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
	}
	
	function closesession()
	{
		$this->session->unset_userdata('s_user');
		//$this->session->sess_destroy('s_user');
		redirect(base_url());
  }
  
  function getTickets()
	{
		$this->load->model('ticket_model');
		$this->load->model('usuario_model');
		$pendiente = $this->ticket_model->getTicketsPendientes();
		$procesado = $this->ticket_model->getTicketsProcesados();
		$cerrado   = $this->ticket_model->getTicketsCerrados();
    $usuarios  = $this->ticket_model->getTotalAfiliados();
		return array($pendiente,$procesado,$cerrado,$usuarios);
  }
  
  function generarExcelTicketsPendientes() {
    $this->load->model('ticket_model');
    $this->load->model('usuario_model');
    $content['tituloExcel'] = 'Listado de Tickets Pendientes';
    $tickets = $this->ticket_model->getTicketsPendientesExcel();
    $est = "Filtros: Tickets Pendientes";
      $content['estado'] = $est;
    if($tickets==false){
      $content['data'] = '';
      $content['row'] = 0;
      $content['header'] = 0;
    }else{
      for($i = 0 ; $i < count($tickets); $i++){
        $content['data']['#'][$i] = $i+1;
        $content['data']['ticket_numero'][$i] = $tickets[$i]['ticket_numero'];      
        $content['data']['actividad_origen'][$i] =$this->usuario_model->filtrarUsuario($tickets[$i]['actividad_origen']);
        $content['data']['actividad_destino'][$i]=$this->usuario_model->filtrarUsuario($tickets[$i]['actividad_destino']);
        $content['data']['tema_detalle'][$i] = $tickets[$i]['tema_detalle'];
        $content['data']['subtema_detalle'][$i] = $tickets[$i]['subtema_detalle'];
        $content['data']['ticket_asunto'][$i] = $tickets[$i]['ticket_asunto'];
        $content['data']['actividad_mensaje'][$i] = $tickets[$i]['actividad_mensaje'];      
        $content['data']['ticket_fechareg'][$i] = $tickets[$i]['ticket_fechareg'];
      }
      $content['row'] = count($tickets);
      $content['header'] = count($content['data']);
      $content['header_title'] = array('#','Ticket', 'Origen', 'Destino', 'Tema', 'Subtema', 'Asunto', 'Mensaje','Fecha Reg.');
      $content['name_keydata'] = array_keys($content['data']);
    }
    $this->baseGenerarExcel($content);
  }

  function generarExcelTicketsProcesados() {
      $this->load->model('ticket_model');
      $this->load->model('usuario_model');
      $content['tituloExcel'] = 'Listado de Tickets Procesados';
      $tickets = $this->ticket_model->getTicketsProcesadosExcel();
      //var_dump($tickets);
      //exit();
      $est = "Filtros: Tickets Procesados";
        $content['estado'] = $est;
      if($tickets==false){
        $content['data'] = '';
        $content['row'] = 0;
        $content['header'] = 0;
      }else{

        for($i = 0 ; $i < count($tickets); $i++){
          $content['data']['#'][$i] = $i+1;
          $content['data']['ticket_numero'][$i] = $tickets[$i]['ticket_numero'];      
          $content['data']['actividad_origen'][$i] =$this->usuario_model->filtrarUsuario($tickets[$i]['actividad_origen']);
          $content['data']['actividad_destino'][$i]=$this->usuario_model->filtrarUsuario($tickets[$i]['actividad_destino']);
          $content['data']['tema_detalle'][$i] = $tickets[$i]['tema_detalle'];
          $content['data']['subtema_detalle'][$i] = $tickets[$i]['subtema_detalle'];
          $content['data']['ticket_asunto'][$i] = $tickets[$i]['ticket_asunto'];
          $content['data']['actividad_mensaje'][$i] = $tickets[$i]['actividad_mensaje'];      
          $content['data']['ticket_fechareg'][$i] = $tickets[$i]['ticket_fechareg'];
        }
        $content['row'] = count($tickets);
        $content['header'] = count($content['data']);
        $content['header_title'] = array('#','Ticket', 'Origen', 'Destino', 'Tema', 'Subtema', 'Asunto', 'Mensaje','Fecha Reg.');
        $content['name_keydata'] = array_keys($content['data']);
    }
    $this->baseGenerarExcel($content);
  }

  function generarExcelTicketsCerrados() {
    $this->load->model('ticket_model');
    $this->load->model('usuario_model');
    $content['tituloExcel'] = 'Listado de Tickets Cerrados';
    $tickets = $this->ticket_model->getTicketsCerradosExcel();
    //var_dump($tickets);
    //exit();
    $est = "Filtros: Tickets Cerrados";
      $content['estado'] = $est;
    if($tickets==false){
      $content['data'] = '';
      $content['row'] = 0;
      $content['header'] = 0;
    }else{
      for($i = 0 ; $i < count($tickets); $i++){
        $content['data']['#'][$i] = $i+1;
        $content['data']['ticket_numero'][$i] = $tickets[$i]['ticket_numero'];      
        $content['data']['actividad_origen'][$i] =$this->usuario_model->filtrarUsuario($tickets[$i]['actividad_origen']);
        $content['data']['actividad_destino'][$i]=$this->usuario_model->filtrarUsuario($tickets[$i]['actividad_destino']);
        $content['data']['tema_detalle'][$i] = $tickets[$i]['tema_detalle'];
        $content['data']['subtema_detalle'][$i] = $tickets[$i]['subtema_detalle'];
        $content['data']['ticket_asunto'][$i] = $tickets[$i]['ticket_asunto'];
        $content['data']['actividad_mensaje'][$i] = $tickets[$i]['actividad_mensaje'];      
        $content['data']['ticket_fechareg'][$i] = $tickets[$i]['ticket_fechareg'];
      }
      $content['row'] = count($tickets);
      $content['header'] = count($content['data']);
      $content['header_title'] = array('#','Ticket', 'Origen', 'Destino', 'Tema', 'Subtema', 'Asunto', 'Mensaje','Fecha Reg.');
      $content['name_keydata'] = array_keys($content['data']);
    }
    
    $this->baseGenerarExcel($content);
  }

  function generarExcelAfiliados() {
    $this->load->model('usuario_model');
    $this->load->model('sindicato_model');
    $content['tituloExcel'] = 'Listado de Afiliados';
    $afiliado = $this->usuario_model->getAfiliados();

    $est = "Filtros: Afiliados";
      $content['estado'] = $est;
    if($afiliado==false){
      $content['data'] = '';
      $content['row'] = 0;
      $content['header'] = 0;
    }else{
      for($i = 0 ; $i < count($afiliado); $i++){
        $content['data']['#'][$i] = $i+1;
        $content['data']['persona_nombres'][$i] = $afiliado[$i]['persona_nombres'];  
        $content['data']['usuario_email'][$i] = $afiliado[$i]['usuario_email'];    
        //$content['data']['persona_sindicato'][$i] = $this->sindicato_model->getSindicatoFilter($afiliado[$i]['persona_sindicato'])->result()[0]->sindicato_nombre;
        $content['data']['persona_numdocumento'][$i] = $afiliado[$i]['persona_numdocumento'];
        $content['data']['persona_telfijo'][$i] = $afiliado[$i]['persona_telfijo'];
        $content['data']['persona_telmovil'][$i] = $afiliado[$i]['persona_telmovil'];      
        $content['data']['persona_fechaingreso'][$i] = $afiliado[$i]['persona_fechaingreso'];
      }
      $content['row'] = count($afiliado);
      $content['header'] = count($content['data']);
      $content['header_title'] = array('#','Nombres', 'Email', 'Sindicato', 'DNI', 'Tel. Fijo', 'Tel. Movil', 'Fecha Reg.');
      $content['name_keydata'] = array_keys($content['data']);
    }
    
    $this->baseGenerarExcel($content);
  }

  function ticketsOfMonth() {
    if ($this->session->userdata('s_user')->usuario_rol != 1) {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No tienes derechos de administrador.</div>');
      redirect(base_url());
    }
    $rs['enero']      = $this->ticket_model->getTicketsByMonth(1);
    $rs['febrero']    = $this->ticket_model->getTicketsByMonth(2);
    $rs['marzo']      = $this->ticket_model->getTicketsByMonth(3);
    $rs['abril']      = $this->ticket_model->getTicketsByMonth(4);
    $rs['mayo']       = $this->ticket_model->getTicketsByMonth(5);
    $rs['junio']      = $this->ticket_model->getTicketsByMonth(6);
    $rs['julio']      = $this->ticket_model->getTicketsByMonth(7);
    $rs['agosto']     = $this->ticket_model->getTicketsByMonth(8);
    $rs['setiembre']  = $this->ticket_model->getTicketsByMonth(9);
    $rs['octubre']    = $this->ticket_model->getTicketsByMonth(10);
    $rs['noviembre']  = $this->ticket_model->getTicketsByMonth(11);
    $rs['diciembre']  = $this->ticket_model->getTicketsByMonth(12);
    echo json_encode($rs);
  }

}