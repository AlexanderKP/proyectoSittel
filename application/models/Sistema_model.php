<?php 

class Sistema_model extends CI_Model
{
    public function getConfig()
    {
        $this->db->select('sistema_descripcion,sistema_numticket,sistema_anio,sistema_fechalimite_ticket');
        $this->db->from('tbl_sistema');
        $query = $this->db->get();
        foreach($query->result() as $list)
        {
            $data['config'] = $list;
        }
        $this->session->set_userdata($data);
    }
}
