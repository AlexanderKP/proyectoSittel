<?php 
class Empresa_model extends CI_Model
{
	function getEmpresas()
	{
		$this->db->select('*');
		$this->db->where('empresa_estado',1);
		$this->db->from('tbl_empresa');
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function getCargos()
	{
		$this->db->select('e.*,c.*,u.*');
		$this->db->from('tbl_cargo c');
		$this->db->join('tbl_empresa e','c.cargo_empresaid = e.empresa_id');
		$this->db->join('tbl_usuario u','c.cargo_id = u.usuario_detalles');
		$this->db->where('u.usuario_estado',1);
		$this->db->where('u.usuario_token','usado');
		$this->db->where('u.usuario_rol',2);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function guardarEmpresa($post)
	{
		$data = array(
			'empresa_nombre'	=>$post['nombre'],
			'empresa_detalle'	=>$post['descripcion'],
			'empresa_ruc'		=>$post['ruc'],
			'empresa_direccion'	=>$post['direccion'],
			'empresa_email'		=>$post['email'],
			'empresa_telefono'	=>$post['telefono']
		);
		$this->db->insert('tbl_empresa',$data);
	}

	function guardarCargo($post)
	{
		$data = array(
			'cargo_nombre'		=>$post['nombre'],
			'cargo_descripcion'	=>$post['descripcion'],
			'cargo_telefono'	=>$post['telefono'],
			'cargo_email'		=>$post['email'],
			'cargo_empresaid'	=>$post['empresa']
		);
		$this->db->insert('tbl_cargo',$data);
		$last_id = $this->db->insert_id();

		$entidad = $this->db->get_where('tbl_empresa', array('empresa_id' => $post['empresa']));
		$entidad = $entidad->result_array();

		$usuario = array(
			'usuario_nombre' => $post['nombre']. ' - ' .$post['descripcion'],
			'usuario_email' => $post['email'],
			'usuario_clave' => do_hash(strtoupper('fetratel'),'md5'),
			'usuario_entidad'=> $entidad[0]['empresa_nombre'],
			'usuario_rol' => 2,
			'usuario_detalles' => $last_id,
			'usuario_token' => $post['token']
		);
		$this->db->insert('tbl_usuario',$usuario);
	}

	function getEmpresaFilter($n)
	{
		$this->db->select('*');
		$this->db->where('empresa_estado',1);
		$this->db->where('empresa_id',$n);
		$this->db->from('tbl_empresa');
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}
	function deleteEmpresa($n)
	{
		$this->db->set('empresa_estado',0);
		$this->db->where('empresa_id',$n);
		$this->db->update('tbl_empresa');
	}

	function getCargoFilter($n)
	{
		$this->db->select('c.*,e.*,u.*');		
		$this->db->from('tbl_cargo c');
		$this->db->join('tbl_usuario u','u.usuario_detalles = c.cargo_id');
		$this->db->join('tbl_empresa e','c.cargo_empresaid = e.empresa_id');
		$this->db->where('c.cargo_estado',1);
		$this->db->where('u.usuario_id',$n);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function getCargoUnregister()
	{
		$this->db->select('c.*,e.*,u.*');		
		$this->db->from('tbl_cargo c');
		$this->db->join('tbl_usuario u','u.usuario_detalles = c.cargo_id');
		$this->db->join('tbl_empresa e','c.cargo_empresaid = e.empresa_id');
		$this->db->where('u.usuario_token !=','usado');
		$this->db->where('u.usuario_estado',1);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function deleteCargo($post)
	{
		$this->db->set('usuario_estado',0);
		$this->db->where('usuario_id',$post['usu']);
		$this->db->update('tbl_usuario');
		$this->db->set('cargo_estado',0);
		$this->db->where('cargo_id',$post['car']);
		$this->db->update('tbl_cargo');
	}

	function updateEmpresa($post)
	{
		$data = array(
			'empresa_nombre' => $post['nombre'],
			'empresa_ruc' => $post['ruc'],
			'empresa_detalle' => $post['descripcion'],
			'empresa_direccion' => $post['direccion'],
			'empresa_email' => $post['email'],
			'empresa_telefono' => $post['telefono']
		);
		$this->db->where('empresa_id',$post['codigo']);
		$this->db->update('tbl_empresa',$data);
	}

	function updateCargo($post)
	{
		$this->db->select('*');
		$this->db->where('usuario_id',$post['codigo']);
		$this->db->from('tbl_usuario');
		$query = $this->db->get()->result_array()[0];

		$cargo = array(
			'cargo_descripcion' => $post['nombre'],
			'cargo_nombre' => $post['cargo'],
			'cargo_telefono' => $post['telefono'],
			'cargo_email' => $post['email'],
			'cargo_empresaid' => $post['entidad']
		);
		$this->db->where('cargo_id',$query['usuario_detalles']);
		$this->db->update('tbl_cargo',$cargo);

		$this->db->select('*');
		$this->db->where('empresa_id',$post['entidad']);
		$this->db->from('tbl_empresa');
		$entidad = $this->db->get()->result_array()[0];

		$usuario = array(
			'usuario_nombre' => $post['cargo']." - ".$post['nombre'],
			'usuario_email'  => $post['email'],
			'usuario_entidad'=> $entidad['empresa_nombre']
		);		
		$this->db->where('usuario_id',$post['codigo']);
		$this->db->update('tbl_usuario',$usuario);
	}
}