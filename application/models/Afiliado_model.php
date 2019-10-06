<?php 
class Afiliado_model extends CI_Model
{
	function afiliarUsuario($post)
	{
		$afiliado = array(
			'persona_apellidos' => $post['apellido'],
			'persona_nombres' => $post['nombre'],
			'persona_tipodocumento' => 1,
			'persona_numdocumento' => $post['documento'],
			'persona_emailpersonal' => $post['emailpersonal'],
			'persona_emailcorporativo' => $post['emailfetratel'],
		);
		$this->db->insert('tbl_afiliado',$afiliado);
		$last_id = $this->db->insert_id();

		$usuario = array(
			'usuario_nombre' => 'Afiliado - ' . $post['apellido'] . ' ' . $post['nombre'],
			'usuario_email' => $post['emailfetratel'],
			'usuario_clave' => do_hash(strtoupper('fetratel'),'md5'),
			'usuario_entidad'=> 'SITTEL',
			'usuario_rol' => 4,
			'usuario_detalles' => $last_id,
			'usuario_token' => $post['token']
		);
		$this->db->insert('tbl_usuario',$usuario);
	}

	function getAfiliadoPendiente()
	{
		$this->db->select('u.*,a.*');
		$this->db->where('u.usuario_rol',4);
		$this->db->where('u.usuario_token !=','usado');
		$this->db->where('u.usuario_estado',1);
		$this->db->from('tbl_usuario u');
		$this->db->join('tbl_afiliado a','u.usuario_detalles = a.persona_id');

		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function getAfiliado()
	{
		$this->db->select('u.*,a.*');
		$this->db->where('u.usuario_rol',4);
		$this->db->where('u.usuario_token','usado');
		$this->db->where('u.usuario_estado',1);
		$this->db->from('tbl_usuario u');
		$this->db->join('tbl_afiliado a','u.usuario_detalles = a.persona_id');
		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}
	function getAfiliadoFilter($n)
	{
		$this->db->select('u.*,a.*');
		$this->db->where('u.usuario_rol',4);
		$this->db->where('u.usuario_token','usado');
		$this->db->where('u.usuario_estado',1);
		$this->db->from('tbl_usuario u');
		$this->db->join('tbl_afiliado a','u.usuario_detalles = a.persona_id');
		$this->db->where('u.usuario_id',$n);
		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function deleteAfiliado($post)
	{
		$this->db->set('usuario_estado',0);
		$this->db->where('usuario_id',$post['usu']);
		$this->db->update('tbl_usuario');

		$this->db->set('persona_estado',0);
		$this->db->where('persona_id',$post['per']);
		$this->db->update('tbl_afiliado');
	}

	function getAfiliadoReenvio($n)
	{
		$this->db->select('*');
		$this->db->where('usuario_id',$n);
		$this->db->from('tbl_usuario');
		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function updateUsuarioAfiliado($post)
	{
		$this->db->select('*');
		$this->db->where('usuario_id',$post['codigo']);
		$this->db->from('tbl_usuario');
		$query = $this->db->get()->result_array()[0];

		$afiliado = array(
			'persona_nombres' => $post['nombres'],
			'persona_emailpersonal' => $post['emailp'],
			'persona_emailcorporativo' => $post['emailc'],
			'persona_numdocumento' => $post['dni']
		);
		$this->db->where('persona_id',$query['usuario_detalles']);
		$this->db->update('tbl_afiliado',$afiliado);

		$usuario = array(
			'usuario_nombre' => "Afiliado - ".$post['nombres'],
			'usuario_email'  => $post['emailc']
		);		
		$this->db->where('usuario_id',$post['codigo']);
		$this->db->update('tbl_usuario',$usuario);
	}
}