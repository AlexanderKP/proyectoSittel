<?php 
class Settings_model extends CI_Model{

    public function verifyPassword($password) {
        $this->db->select('*');
        $this->db->where('usuario_clave',do_hash(strtoupper($password),'md5'));
        $this->db->where('usuario_email', $this->session->userdata('s_user')->usuario_email);
		$this->db->from('tbl_usuario');
		$query = $this->db->get();
		if ($query->num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
	}
	
	public function changePassword($password) {
		$this->db->set('usuario_clave',do_hash(strtoupper($password),'md5'));
        $this->db->where('usuario_id',$this->session->userdata('s_user')->usuario_id);
		$this->db->update('tbl_usuario');
		
		return $this->db->affected_rows();
	}
}
