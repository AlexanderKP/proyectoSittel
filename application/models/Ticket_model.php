<?php 
class Ticket_model extends CI_Model
{
	function updateSistema($n)
	{
		$this->db->set('sistema_numticket',$n);
		$this->db->where('sistema_id',1);
		$this->db->update('tbl_sistema');
	}

	function generarTicket($post,$file)
	{	
		$numticket = (int)$this->session->userdata('config')->sistema_numticket;
		$numticket++;
		$numticket = '0000000000' . $numticket;
		$numticket = substr($numticket, -7);
		$data = array(
			'ticket_numero' => $numticket,
			'ticket_origen' => $post['remitente'],
			'ticket_destino'=> $post['destinatario'],
			'ticket_asunto'	=> $post['asunto'],
			'ticket_tema'	=> $post['tema'],
			'ticket_subtema'=> $post['subtema']
		);
		$this->db->insert('tbl_ticket',$data);
		$last_id = $this->db->insert_id();
		$this->updateSistema($numticket);
		
		$actividad = array(
			'actividad_ticketid' => $last_id,
			'actividad_origen' => $post['remitente'],
			'actividad_destino'=> $post['destinatario'],
			'actividad_tipo'	=> 1,
			'actividad_mensaje'	=> nl2br($post['detalle']),
			'actividad_archivo'=> $file
		);
		$this->db->insert('tbl_actividad',$actividad);

		$email = $this->db->get_where('tbl_usuario', array('usuario_id' => $post['destinatario']));
		$email = $email->result_array();

		$rsp = array(
			'ticket' => $numticket,
			'destino'=> $email[0]['usuario_email']
			);
		return $rsp;
	}

	function getListadoTicket($n)
	{
		$id = $this->session->userdata('s_user')->usuario_id;
		$this->db->select('t.ticket_id, a.actividad_tipo, t.ticket_numero, te.tema_detalle, ts.subtema_detalle, t.ticket_asunto, a.actividad_mensaje, a.actividad_origen, a.actividad_destino, at.atipo_detalle, a.actividad_fechareg, a.actividad_archivo, t.ticket_estado, u.usuario_entidad');
		$this->db->from('tbl_ticket t');
		$this->db->join('tbl_actividad a', 't.ticket_id = a.actividad_ticketid');
		$this->db->join('tbl_actividadtipo at', 'a.actividad_tipo = at.atipo_id');
		$this->db->join('tbl_tema  te', 't.ticket_tema = te.tema_id');
		$this->db->join('tbl_subtema  ts', 't.ticket_subtema = ts.subtema_id');
		$this->db->join('tbl_usuario u','a.actividad_destino = u.usuario_id');
		switch($n)
		{
			case '0':
			$this->db->where('a.actividad_origen', $id);
			break;
			case '1':
			$this->db->where('a.actividad_destino', $id);
			break;
		}
		//$this->db->where('a.actividad_tipo',1);

		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function getActividadTicket($ticket)
	{
		$this->db->select('t.ticket_id, t.ticket_numero, t.ticket_asunto, a.actividad_mensaje, a.actividad_origen, a.actividad_destino, a.actividad_tipo, at.atipo_detalle, a.actividad_fechareg, a.actividad_rsp, a.actividad_id, a.actividad_archivo');
		$this->db->from('tbl_ticket t');
		$this->db->join('tbl_actividad a', 't.ticket_id = a.actividad_ticketid');
		$this->db->join('tbl_actividadtipo at', 'a.actividad_tipo = at.atipo_id');
		$this->db->where('t.ticket_id',$ticket);
		
		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function getListadoAll()
	{
		$id = $this->session->userdata('s_user')->usuario_id;
		$this->db->select('t.ticket_id, a.actividad_tipo, t.ticket_numero, te.tema_detalle, ts.subtema_detalle, t.ticket_asunto, a.actividad_mensaje, a.actividad_origen, a.actividad_destino, a.actividad_mensaje, at.atipo_detalle, a.actividad_fechareg, t.ticket_estado, a.actividad_archivo, u.usuario_entidad');
		$this->db->from('tbl_ticket t');
		$this->db->join('tbl_actividad a', 't.ticket_id = a.actividad_ticketid');
		$this->db->join('tbl_actividadtipo at', 'a.actividad_tipo = at.atipo_id');
		$this->db->join('tbl_tema  te', 't.ticket_tema = te.tema_id');
		$this->db->join('tbl_subtema  ts', 't.ticket_subtema = ts.subtema_id');
		$this->db->join('tbl_usuario u','a.actividad_destino = u.usuario_id');
		$this->db->where('a.actividad_tipo',1);
		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function getTicket($ticket)
	{
		$this->db->select('t.*, u.usuario_nombre, u.usuario_id');
		$this->db->where('ticket_id',$ticket);
		$this->db->from('tbl_ticket t');
		$this->db->join('tbl_usuario u', 't.ticket_origen = u.usuario_id');
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function generarActividad($post,$file)
	{
		switch ($post['accion']) {
			case '2':
				$rsp = 1;
				$status_ticket = 2;
				break;
			case '3':
				$rsp = 0;
				$status_ticket = 3;
				break;
		}
		$this->db->set('actividad_rsp',0);
		$this->db->where('actividad_id',$post['actividad']);
		$this->db->update('tbl_actividad');

		$actividad = array(
			'actividad_ticketid' => $post['ticket'],
			'actividad_origen' => $post['remitente'],
			'actividad_destino'=> $post['destinatario'],
			'actividad_tipo'	=> $post['accion'],
			'actividad_mensaje'	=> $post['mensaje'],
			'actividad_archivo'=> $file,
			'actividad_rsp' => $rsp
		);
		$this->db->insert('tbl_actividad',$actividad);

		$this->db->set('ticket_estado',$status_ticket);
		$this->db->where('ticket_id',$post['ticket']);
		$this->db->update('tbl_ticket');

		$email = $this->db->get_where('tbl_usuario', array('usuario_id' => $post['destinatario']));
		$email = $email->result_array();

		$numticket = $this->db->get_where('tbl_ticket', array('ticket_id' => $post['ticket']));
		$numticket = $numticket->result_array();

		$rsp = array(
			'ticket' => $numticket[0]['ticket_numero'],
			'destino'=> $email[0]['usuario_email']
			);
		return $rsp;
	}

	function getTicketsPendientes()
	{
		$this->db->select('count(ticket_id) as pendientes');		
		$this->db->where('ticket_estado',1);
		$this->db->from('tbl_ticket');
		return $this->db->get()->result()[0]->pendientes;
	}

	function getTicketsProcesados()
	{
		$this->db->select('count(ticket_id) as procesados');		
		$this->db->where('ticket_estado',2);
		$this->db->from('tbl_ticket');
		return $this->db->get()->result()[0]->procesados;
	}

	function getTicketsCerrados()
	{
		$this->db->select('count(ticket_id) as cerrados');		
		$this->db->where('ticket_estado',3);
		$this->db->from('tbl_ticket');
		return $this->db->get()->result()[0]->cerrados;
	}

	function getTotalAfiliados()
    {
        $this->db->select('count(usuario_id) as usuarios');        
        $this->db->where('usuario_rol',4);        
        $this->db->where('usuario_token','usado');
        $this->db->from('tbl_usuario');
        return $this->db->get()->result()[0]->usuarios;
	}
	
	function getTicketsPendientesExcel()
	{
		$this->db->select('t.ticket_id, a.actividad_tipo, t.ticket_numero, te.tema_detalle, ts.subtema_detalle, t.ticket_asunto, a.actividad_mensaje, a.actividad_origen, a.actividad_destino, a.actividad_mensaje, at.atipo_detalle, t.ticket_fechareg, t.ticket_estado, a.actividad_archivo, u.usuario_entidad');
		$this->db->from('tbl_ticket t');
		$this->db->join('tbl_actividad a', 't.ticket_id = a.actividad_ticketid');
		$this->db->join('tbl_actividadtipo at', 'a.actividad_tipo = at.atipo_id');
		$this->db->join('tbl_tema  te', 't.ticket_tema = te.tema_id');
		$this->db->join('tbl_subtema  ts', 't.ticket_subtema = ts.subtema_id');
		$this->db->join('tbl_usuario u','a.actividad_destino = u.usuario_id');
		$this->db->where('t.ticket_estado',1);
		$this->db->where('a.actividad_tipo',1);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query->result_array();
		}
	}

	function getTicketsProcesadosExcel()
	{
		$this->db->select('t.ticket_id, a.actividad_tipo, t.ticket_numero, te.tema_detalle, ts.subtema_detalle, t.ticket_asunto, a.actividad_mensaje, a.actividad_origen, a.actividad_destino, a.actividad_mensaje, at.atipo_detalle, t.ticket_fechareg, t.ticket_estado, a.actividad_archivo, u.usuario_entidad');
		$this->db->from('tbl_ticket t');
		$this->db->join('tbl_actividad a', 't.ticket_id = a.actividad_ticketid');
		$this->db->join('tbl_actividadtipo at', 'a.actividad_tipo = at.atipo_id');
		$this->db->join('tbl_tema  te', 't.ticket_tema = te.tema_id');
		$this->db->join('tbl_subtema  ts', 't.ticket_subtema = ts.subtema_id');
		$this->db->join('tbl_usuario u','a.actividad_destino = u.usuario_id');
		$this->db->where('t.ticket_estado',2);
		$this->db->where('a.actividad_tipo',1);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query->result_array();
		}
	}

	function getTicketsCerradosExcel()
	{
		$this->db->select('t.ticket_id, a.actividad_tipo, t.ticket_numero, te.tema_detalle, ts.subtema_detalle, t.ticket_asunto, a.actividad_mensaje, a.actividad_origen, a.actividad_destino, a.actividad_mensaje, t.ticket_fechareg, t.ticket_estado, a.actividad_archivo, u.usuario_entidad');
		$this->db->from('tbl_ticket t');
		$this->db->join('tbl_actividad a', 't.ticket_id = a.actividad_ticketid');
		$this->db->join('tbl_tema  te', 't.ticket_tema = te.tema_id');
		$this->db->join('tbl_subtema  ts', 't.ticket_subtema = ts.subtema_id');
		$this->db->join('tbl_usuario u','a.actividad_destino = u.usuario_id');
		$this->db->where('t.ticket_estado',3);
		$this->db->where('a.actividad_tipo',1);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query->result_array();
		}
	}

	function getTicketsByMonth($value)
	{
		$query = $this->db->query('SELECT COUNT(ticket_id) AS total_tickets FROM tbl_ticket WHERE YEAR(ticket_fechareg) = YEAR(CURDATE()) AND  MONTH(ticket_fechareg) = '.$value);
		$rs = $query->result_array(); 

		return $rs;
	}

	function getTicketsByStatus($type) {
		$query = $this->db->query('SELECT COUNT(ticket_estado) as total from tbl_ticket WHERE ticket_estado = '.$type);
		$rs = $query->result_array()[0]['total']; 

		return $rs;
		
	}
	function getTotalTocketsExcel(){
		$this->db->select('t.ticket_id, a.actividad_tipo, t.ticket_numero, te.tema_detalle, ts.subtema_detalle, t.ticket_asunto, a.actividad_mensaje, a.actividad_origen, a.actividad_destino, a.actividad_mensaje, t.ticket_fechareg, t.ticket_estado, a.actividad_archivo, u.usuario_entidad');
		$this->db->from('tbl_ticket t');
		$this->db->join('tbl_actividad a', 't.ticket_id = a.actividad_ticketid');
		$this->db->join('tbl_tema  te', 't.ticket_tema = te.tema_id');
		$this->db->join('tbl_subtema  ts', 't.ticket_subtema = ts.subtema_id');
		$this->db->join('tbl_usuario u','a.actividad_destino = u.usuario_id');
		$this->db->where('t.ticket_estado',3,2,1);
		//$this->db->where('a.actividad_tipo',1);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query->result_array();
			
		}
	}

	function getActividadforMonth($value){

		$query = $this->db->query('SELECT COUNT(actividad_id) as Actividad_total FROM tbl_actividad WHERE YEAR(actividad_fechareg) = YEAR(CURDATE()) AND  MONTH(actividad_fechareg) = '.$value);
		$rs = $query->result_array(); 

		return $rs;
	}
	function getCountActividad(){
		$query = $this->db->query("SELECT COUNT(actividad_id) as total_actividad FROM tbl_actividad");
        $rs = $query->result_array()[0]['total_actividad'];

        return $rs;
	}
	function getActividadExcel(){
		$this->db->select('t.ticket_numero, u.usuario_nombre, ud.usuario_nombre as usuario_destino, a.actividad_rsp, at.atipo_detalle, a.actividad_mensaje,a.actividad_fechareg, a.actividad_archivo, a.actividad_estado');
		$this->db->from('tbl_actividad a');
		$this->db->join('tbl_ticket t', 't.ticket_id = a.actividad_ticketid');
		$this->db->join('tbl_usuario u', 'u.usuario_id = a.actividad_origen');
		$this->db->join('tbl_usuario ud', 'ud.usuario_id = a.actividad_destino');
		$this->db->join('tbl_actividadtipo at', 'at.atipo_id = a.actividad_tipo');
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query->result_array();
			
		}
	}
}