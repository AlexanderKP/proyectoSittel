<?php 

class Sindicato_model extends CI_Model
{
	function getSindicatos()
	{
		$this->db->select('*');
		$this->db->where('sindicato_estado',1);
		$this->db->from('tbl_sindicato');
		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function guardarSindicato($post)
	{
		$sindicato = array(
			'sindicato_nombre'		=> $post['nombre'],
			'sindicato_ubicacion'	=> $post['descripcion'],
			'sindicato_telefono'	=> $post['telefono'],
			'sindicato_email'		=> $post['email']
		);
		$this->db->insert('tbl_sindicato',$sindicato);
	}

	function getSindicatoFilter($n)
	{
		$this->db->select('*');
		$this->db->where('sindicato_estado',1);
		$this->db->where('sindicato_id',$n);
		$this->db->from('tbl_sindicato');
		$query = $this->db->get();
		if ($query->num_rows() < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function deleteSindicato($n)
	{
		$this->db->set('sindicato_estado',0);
		$this->db->where('sindicato_id',$n);
		$this->db->update('tbl_sindicato');
	}

	function updateSindicato($post)
	{
		$data = array(
			'sindicato_nombre' => $post['nombre'],
			'sindicato_telefono' => $post['telefono'],
			'sindicato_email' => $post['email']
		);
		$this->db->where('sindicato_id',$post['codigo']);
		$this->db->update('tbl_sindicato',$data);
	}
}