<?php 
class Documento_model extends CI_Model
{
	function getTemas()
	{
		$this->db->select('*');
		$this->db->where('tema_estado',1);
		$this->db->from('tbl_tema');
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}
	function getSubtemas()
	{
		$this->db->select('s.*,t.*');		
		$this->db->from('tbl_subtema s');
		$this->db->join('tbl_tema t','s.subtema_temaid = tema_id');
		$this->db->where('subtema_estado',1);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function filtrarSubTemas($n)
	{
		$this->db->select('*');
		$this->db->where('subtema_estado',1);
		$this->db->where('subtema_temaid',$n);
		$this->db->from('tbl_subtema');
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function guardarTema($post)
	{
		$datos = array(
			'tema_detalle' => $post['nombre'],
		);
		$this->db->insert('tbl_tema',$datos);
	}

	function guardarSubtema($post)
	{
		$datos = array(
			'subtema_temaid'  => $post['temas'],
			'subtema_detalle' => $post['nombre']
		);
		$this->db->insert('tbl_subtema',$datos);
	}

	function selectTema()
	{
		$this->db->select('*')->from('tbl_tema');
	    $this->db->where('tema_estado',1);
	    $query = $this->db->get();
	    foreach ($query->result() as $key) {
	      $datos[$key->tema_id] = $key->tema_detalle;
	    }
	    return $datos;
	}
	function selectSubtema()
	{
		$this->db->select('*')->from('tbl_subtema');
	    $this->db->where('subtema_estado',1);
	    $query = $this->db->get();
	    foreach ($query->result() as $key) {
	      $datos[$key->subtema_id] = $key->subtema_detalle;
	    }
	    return $datos;
	}

	function getTemaFilter($n)
	{
		$this->db->select('*');
		$this->db->where('tema_estado',1);
		$this->db->where('tema_id',$n);
		$this->db->from('tbl_tema');
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}
	function deleteTema($n)
	{
		$this->db->set('tema_estado',0);
		$this->db->where('tema_id',$n);
		$this->db->update('tbl_tema');
	}

	function getSubtemaFilter($n)
	{
		$this->db->select('s.*,t.*');		
		$this->db->from('tbl_subtema s');
		$this->db->join('tbl_tema t','s.subtema_temaid = tema_id');
		$this->db->where('subtema_estado',1);
		$this->db->where('subtema_id',$n);
		$query = $this->db->get();
		if ($query->num_rows < 0) {
			return false;
		}else{
			return $query;
		}
	}

	function deleteSubtema($n)
	{
		$this->db->set('subtema_estado',0);
		$this->db->where('subtema_id',$n);
		$this->db->update('tbl_subtema');
	}

	function updateTema($post)
	{
		$data = array(
			'tema_detalle' => $post['nombre']
		);
		$this->db->where('tema_id',$post['codigo']);
		$this->db->update('tbl_tema',$data);
	}
	function updateSubtema($post)
	{
		$data = array(
			'subtema_detalle' => $post['nombre'],
			'subtema_temaid' => $post['tema']
		);
		$this->db->where('subtema_id',$post['codigo']);
		$this->db->update('tbl_subtema',$data);
	}
}