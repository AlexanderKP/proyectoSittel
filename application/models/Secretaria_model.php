<?php 
class Secretaria_model extends CI_Model
{
	function getSecretariaFiltro()
	{
		$this->db->select('u.usuario_id, s.secretaria_nombre, s.secretaria_encargado');
		$this->db->where('u.usuario_rol',3);
		$this->db->from('tbl_secretaria s');
		$this->db->join('tbl_usuario u','s.secretaria_id = u.usuario_detalles');
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function guardarSecretaria($post)
	{
		$secretaria = array(
			'secretaria_nombre' => $post['nombre'],
			'secretaria_encargado' => $post['descripcion'],
			'secretaria_email' => $post['email'],
			'secretaria_telefono' => $post['telefono'],
		);
		$this->db->insert('tbl_secretaria',$secretaria);
		$last_id = $this->db->insert_id();

		$usuario = array(
			'usuario_nombre' => $post['nombre'] .' - '.$post['descripcion'],
			'usuario_email' => $post['email'],
			'usuario_clave' => do_hash(strtoupper('fetratel'),'md5'),
			'usuario_entidad'=> 'SITTEL',
			'usuario_rol' => 3,
			'usuario_detalles' => $last_id,
			'usuario_token' => $post['token']
		);
		$this->db->insert('tbl_usuario',$usuario);
	}


	function selectSecretariaDestino($n)
	{
		$sindicato = $this->session->userdata('s_persona')->secretaria_sindicatoid;
        switch ($n) {
        	case '0':
			$this->db->select('u.usuario_id, s.secretaria_nombre, s.secretaria_encargado');
			$this->db->where('usuario_rol',3);
			$this->db->from('tbl_usuario u');
			$this->db->join('tbl_secretaria s','s.secretaria_id = u.usuario_detalles');
			$query = $this->db->get();
        	foreach ($query->result() as $key) {
        	  $datos[$key->usuario_id] = $key->secretaria_nombre .' - '. $key->secretaria_encargado;
        	}
			break;	
			case '1':
			$this->db->select('u.usuario_id, s.secretaria_nombre, s.secretaria_encargado');
			$this->db->where('usuario_rol',3);
			$this->db->from('tbl_usuario u');
			$this->db->join('tbl_secretaria s','s.secretaria_id = u.usuario_detalles');
			$query = $this->db->get();
        	foreach ($query->result() as $key) {
        	  $datos[$key->usuario_id] = $key->secretaria_nombre .' - '. $key->secretaria_encargado;
        	}
			break;	
		}
        return $datos;
	}

	function selectSecretariaOrigen($n)
    {
    	$sindicato = $this->session->userdata('s_persona')->secretaria_sindicatoid;
        switch ($n) {
			case '0':
			$this->db->select('u.usuario_id, s.secretaria_nombre, s.secretaria_encargado');
			$this->db->where('usuario_rol',3);
			$this->db->from('tbl_usuario u');
			$this->db->join('tbl_secretaria s','s.secretaria_id = u.usuario_detalles');
			$query = $this->db->get();
        	foreach ($query->result() as $key) {
        	  $datos[$key->usuario_id] = $key->secretaria_nombre .' - '. $key->secretaria_encargado;
        	}
			break;			
			case '1':
			$this->db->select('u.usuario_id, s.secretaria_nombre, s.secretaria_encargado');
			$this->db->where('usuario_rol',3);
			$this->db->from('tbl_usuario u');
			$this->db->join('tbl_secretaria s','s.secretaria_id = u.usuario_detalles');
			$query = $this->db->get();
        	foreach ($query->result() as $key) {
        	  $datos[$key->usuario_id] = $key->secretaria_nombre .' - '. $key->secretaria_encargado;
        	}
			break;
		}
        return $datos;
    }

    function getArrayAdmin()
    {
    	$this->db->select('*');
        $this->db->where('usuario_rol',1);
        $this->db->where('usuario_estado',1);
        $this->db->from('tbl_usuario');
        $query = $this->db->get();
        foreach ($query->result() as $key) {
            $datos[$key->usuario_id] = $key->usuario_nombre;
        }
        return $datos;
    }

    function getArraySecre()
    {
    	$datos = array();
    	$myId = $this->session->userdata('s_persona')->secretaria_id;

    	$this->db->select('u.*,s.*');
        $this->db->where('s.secretaria_estado',1);
        $this->db->where('u.usuario_token','usado');
        $this->db->where('u.usuario_rol','3');
        $this->db->from('tbl_usuario u');
        $this->db->join('tbl_secretaria s','u.usuario_detalles = s.secretaria_id');
        $query = $this->db->get();
        foreach ($query->result() as $key) {
        	if ($key->secretaria_id != $myId) {
        		$datos[$key->usuario_id] = $key->secretaria_nombre . ' - '.$key->secretaria_encargado;
        	}            
        }
        return $datos;
    }
    function getSecretaria()
    {
    	$this->db->select('s.*,u.*');
    	$this->db->from('tbl_usuario u');
    	$this->db->join('tbl_secretaria s','u.usuario_detalles = secretaria_id');
    	$this->db->where('u.usuario_rol ', 3);
    	$this->db->where('u.usuario_estado',1);
    	$this->db->where('u.usuario_token','usado');
    	$query = $this->db->get();
    	if ($query->num_rows() < 0) {
    		return false;
    	}else{
    		return $query;
    	}
    }
    function getSecretariaFilter($n)
    {
    	$this->db->select('s.*,u.*');
    	$this->db->from('tbl_usuario u');
    	$this->db->join('tbl_secretaria s','u.usuario_detalles = secretaria_id');
    	$this->db->where('u.usuario_rol ', 3);
    	$this->db->where('u.usuario_estado',1);
    	$this->db->where('u.usuario_token','usado');
    	$this->db->where('u.usuario_id',$n);
    	$query = $this->db->get();
    	if ($query->num_rows() < 0) {
    		return false;
    	}else{
    		return $query;
    	}
    }

    function deleteSecretaria($post)
    {
        $this->db->set('usuario_estado',0);
        $this->db->where('usuario_id',$post['usu']);
        $this->db->update('tbl_usuario');

        $this->db->set('secretaria_estado',0);
        $this->db->where('secretaria_id',$post['sec']);
        $this->db->update('tbl_secretaria');
    }

    function updateSecretaria($post)
    {
        $this->db->select('*');
        $this->db->where('usuario_id',$post['codigo']);
        $this->db->from('tbl_usuario');
        $query = $this->db->get()->result_array()[0];

        $secretaria = array(
            'secretaria_nombre' => $post['nombre'],
            'secretaria_encargado' => $post['descripcion'],
            'secretaria_telefono' => $post['telefono'],
            'secretaria_email' => $post['email']
        );
        $this->db->where('secretaria_id',$query['usuario_detalles']);
        $this->db->update('tbl_secretaria',$secretaria);

        $usuario = array(
            'usuario_nombre' => $post['nombre']." - ".$post['descripcion'],
            'usuario_email' => $post['email']
        );
        $this->db->where('usuario_id',$post['codigo']);
        $this->db->update('tbl_usuario',$usuario);
    }

    function getSecretariaPendiente()
    {
        $this->db->select('s.*,u.*');       
        $this->db->from('tbl_secretaria s');
        $this->db->join('tbl_usuario u','u.usuario_detalles = s.secretaria_id');
        $this->db->where('u.usuario_token !=','usado');
        $this->db->where('u.usuario_estado',1);
        $query = $this->db->get();
        if ($query->num_rows < 0) {
            return false;
        }else{
            return $query;
        }
    }
}