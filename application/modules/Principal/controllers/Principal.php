<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends MY_Controller {
	
	public function __construct(){
    	parent::__construct();
    $this->load->model('principal_model');
    $this->load->model('ticket_model');
    $this->load->model('usuario_model');
    $this->load->model('afiliado_model');
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
      $data['usuarios']  = $this->usuario_model->getCountAfiliados();
      $data['afiliados']  = $this->afiliado_model->getCountAfiliados();
      $data['actividad'] = $this->ticket_model->getCountActividad();
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
    $actividad = $this->ticket_model->getCountActividad();
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
 //*****************************keny ponte *********************/
  function generarExcelTotalTickets() {
    $this->load->model('ticket_model');
    $this->load->model('usuario_model');
    $content['tituloExcel'] = 'Listado de Total de tickets';
    $tickets = $this->ticket_model->getTotalTocketsExcel();
    //var_dump($tickets);
    //exit();
    $est = "Filtros: Total de tickets";
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
  //******************keny ponte****************** */
  function generarExcelUsuarios() {
    $this->load->model('usuario_model');
    $this->load->model('sindicato_model');
    $content['tituloExcel'] = 'Listado de Usuarios';
    $usuario = $this->usuario_model->getUsuariosAfiliados();

    $est = "Filtros: Usuarios";
      $content['estado'] = $est;
    if($usuario==false){
      $content['data'] = '';
      $content['row'] = 0;
      $content['header'] = 0;
    }else{

      for($i = 0 ; $i < count($usuario); $i++){
        $content['data']['#'][$i] = $i+1;
        $content['data']['persona_nombres'][$i] = $usuario[$i]['usuario_nombre'];  
        $content['data']['usuario_email'][$i] = $usuario[$i]['usuario_email'];    
        
        $content['data']['usuario_entidad'][$i] = $usuario[$i]['usuario_entidad'];
        $content['data']['rol_detalle'][$i] = $usuario[$i]['rol_detalle'];
        $content['data']['usuario_fechareg'][$i] = $usuario[$i]['usuario_fechareg'];      
        $content['data']['usuario_token'][$i] = $usuario[$i]['usuario_token'];
      }
      $content['row'] = count($usuario);
      $content['header'] = count($content['data']);
      $content['header_title'] = array('#','Nombres', 'Email', 'Entidad','rol', 'fecha de registro','token');
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
      $content['header_title'] = array('#','Nombres', 'Email', 'DNI', 'Tel. Fijo', 'Tel. Movil', 'Fecha Reg.');
      $content['name_keydata'] = array_keys($content['data']);
    }
    
    $this->baseGenerarExcel($content);
  }
  function generarExcelActividad(){

   // SELECT `actividad_id`, `actividad_ticketid`, `actividad_origen`, `actividad_destino`, `actividad_rsp`, `actividad_tipo`, `actividad_mensaje`, `actividad_fechareg`, `actividad_archivo`, `actividad_estado` FROM `tbl_actividad` WHERE 1
   $this->load->model('usuario_model');
    $this->load->model('sindicato_model');
    $content['tituloExcel'] = 'Listado de la Actividad De Sistema';
    $actividad = $this->ticket_model->getActividadExcel();

    $est = "Filtros: Movimiento";
      $content['estado'] = $est;
    if($actividad==false){
      $content['data'] = '';
      $content['row'] = 0;
      $content['header'] = 0;
    }else{
      for($i = 0 ; $i < count($actividad); $i++){
        $content['data']['#'][$i] = $i+1;
        $content['data']['actividad_ticketid'][$i] = $actividad[$i]['ticket_numero'];  
        $content['data']['actividad_origen'][$i] = $actividad[$i]['usuario_nombre'];   
        $content['data']['actividad_destino'][$i] = $actividad[$i]['usuario_destino'];
        $content['data']['actividad_rsp'][$i] = $actividad[$i]['actividad_rsp'];
        $content['data']['actividad_tipo'][$i] = $actividad[$i]['atipo_detalle'];      
        $content['data']['actividad_mensaje'][$i] = $actividad[$i]['actividad_mensaje'];
        $content['data']['actividad_fechareg'][$i] = $actividad[$i]['actividad_fechareg'];
        $content['data']['actividad_archivo'][$i] = $actividad[$i]['actividad_archivo'];
        $content['data']['actividad_estado'][$i] = $actividad[$i]['actividad_estado'];
      }
      $content['row'] = count($actividad);
      $content['header'] = count($content['data']);
      $content['header_title'] = array('#','Numero ticket', 'usuario origen', 'usuario destino', 'Actividad rsp', 'Tipo de actividad', 'mensaje','Fecha registro','Archivo','Estado');
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
  function ticketsByStatus() {
    if ($this->session->userdata('s_user')->usuario_rol != 1) {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No tienes derechos de administrador.</div>');
      redirect(base_url());
    }
    $rst['pendientes'] = $this->ticket_model->getTicketsByStatus(1);
    $rst['procesando'] = $this->ticket_model->getTicketsByStatus(2);
    $rst['cerrado']    = $this->ticket_model->getTicketsByStatus(3);
    echo json_encode($rst);
  }
  function getAfiliadosByMonth(){
    if ($this->session->userdata('s_user')->usuario_rol != 1) {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No tienes derechos de administrador.</div>');
      redirect(base_url());
    }
    $rsa['enero']      = $this->afiliado_model->getAfiliadosByMonth(1);
    $rsa['febrero']    = $this->afiliado_model->getAfiliadosByMonth(2);
    $rsa['marzo']      = $this->afiliado_model->getAfiliadosByMonth(3);
    $rsa['abril']      = $this->afiliado_model->getAfiliadosByMonth(4);
    $rsa['mayo']       = $this->afiliado_model->getAfiliadosByMonth(5);
    $rsa['junio']      = $this->afiliado_model->getAfiliadosByMonth(6);
    $rsa['julio']      = $this->afiliado_model->getAfiliadosByMonth(7);
    $rsa['agosto']     = $this->afiliado_model->getAfiliadosByMonth(8);
    $rsa['setiembre']  = $this->afiliado_model->getAfiliadosByMonth(9);
    $rsa['octubre']    = $this->afiliado_model->getAfiliadosByMonth(10);
    $rsa['noviembre']  = $this->afiliado_model->getAfiliadosByMonth(11);
    $rsa['diciembre']  = $this->afiliado_model->getAfiliadosByMonth(12);
    echo json_encode($rsa);
  }
  function getUsuariosAfiliadosByMonth(){
    if ($this->session->userdata('s_user')->usuario_rol != 1) {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No tienes derechos de administrador.</div>');
      redirect(base_url());
    }
    
    $rsa['enero']      = $this->usuario_model->getUsuariosAfiliadosByMonth(1);
    $rsa['febrero']    = $this->usuario_model->getUsuariosAfiliadosByMonth(2);
    $rsa['marzo']      = $this->usuario_model->getUsuariosAfiliadosByMonth(3);
    $rsa['abril']      = $this->usuario_model->getUsuariosAfiliadosByMonth(4);
    $rsa['mayo']       = $this->usuario_model->getUsuariosAfiliadosByMonth(5);
    $rsa['junio']      = $this->usuario_model->getUsuariosAfiliadosByMonth(6);
    $rsa['julio']      = $this->usuario_model->getUsuariosAfiliadosByMonth(7);
    $rsa['agosto']     = $this->usuario_model->getUsuariosAfiliadosByMonth(8);
    $rsa['setiembre']  = $this->usuario_model->getUsuariosAfiliadosByMonth(9);
    $rsa['octubre']    = $this->usuario_model->getUsuariosAfiliadosByMonth(10);
    $rsa['noviembre']  = $this->usuario_model->getUsuariosAfiliadosByMonth(11);
    $rsa['diciembre']  = $this->usuario_model->getUsuariosAfiliadosByMonth(12);
    echo json_encode($rsa);
  }
  function getActividadofMonth() {
    if ($this->session->userdata('s_user')->usuario_rol != 1) {
      $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">No tienes derechos de administrador.</div>');
      redirect(base_url());
    }
    $rs['enero']      = $this->ticket_model->getActividadforMonth(1);
    $rs['febrero']    = $this->ticket_model->getActividadforMonth(2);
    $rs['marzo']      = $this->ticket_model->getActividadforMonth(3);
    $rs['abril']      = $this->ticket_model->getActividadforMonth(4);
    $rs['mayo']       = $this->ticket_model->getActividadforMonth(5);
    $rs['junio']      = $this->ticket_model->getActividadforMonth(6);
    $rs['julio']      = $this->ticket_model->getActividadforMonth(7);
    $rs['agosto']     = $this->ticket_model->getActividadforMonth(8);
    $rs['setiembre']  = $this->ticket_model->getActividadforMonth(9);
    $rs['octubre']    = $this->ticket_model->getActividadforMonth(10);
    $rs['noviembre']  = $this->ticket_model->getActividadforMonth(11);
    $rs['diciembre']  = $this->ticket_model->getActividadforMonth(12);
    echo json_encode($rs);
  }
}
