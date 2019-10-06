<?php

class Usuario_model extends CI_Model {

    function getDatosPersonal($rol,$id){        
        $this->db->select('*');
        switch ($rol) {
            case '1':
                $this->db->where('federacion_id',$id);
                $this->db->from('tbl_federacion');
                break;
             case '2':  //LA EMPRESA ES ENTIDAD Y LOS USUARIOS SON DE TBL_CARGO
                $this->db->where('cargo_id',$id);
                $this->db->from('tbl_cargo');
                break;
             case '3':
                $this->db->where('secretaria_id',$id);
                $this->db->from('tbl_secretaria');
                break;
             case '4':
                $this->db->where('persona_id',$id);
                $this->db->from('tbl_afiliado');
                break;
        }
        $query = $this->db->get();
        return $query;
    }

    function getUsuario($post) {
        $this->db->select('*');
        $this->db->where('usuario_token','usado');
        $this->db->where('usuario_email',$post['email']);
        $this->db->where('usuario_clave',do_hash(strtoupper($post['password']),'md5'));
        $this->db->from('tbl_usuario');
        $query = $this->db->get();
        //$id = $query->result()->usuario_detalles;
        //$join = $this->getAllData($id);
        if ($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
    }

    function getUsuarios(){
        $this->db->select('*');
        $this->db->where('usuario_estado',1);
        $this->db->from('tbl_usuario');
        $query = $this->db->get();
        //$id = $query->result()->usuario_detalles;
        //$join = $this->getAllData($id);
        if ($query->num_rows() > 0)
        {
            return $query;
        }else{
            return false;
        }
    }

    function getAdmins(){
        $this->db->select('*');
        $this->db->where('usuario_rol',1);
        $this->db->where('usuario_estado',1);
        $this->db->from('tbl_usuario');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        }else{
            return false;
        }
    }
    function selectUsuariosAdmin() {
        $this->db->select('*')->from('tbl_usuario');
        $this->db->where('usuario_estado',1);
        $this->db->where('usuario_token','usado');
        $query = $this->db->get();
        foreach ($query->result() as $key) {
          $datos[$key->usuario_id] = $key->usuario_nombre.' - '.$key->usuario_email;
        }    
        return $datos;           
    }

    function selectUsuarios() {
        $this->db->select('*')->from('tbl_usuario');
        $this->db->where('usuario_estado',1);
        $this->db->where('usuario_token','usado');
        $query = $this->db->get();
        foreach ($query->result() as $key) {
          $datos[$key->usuario_id] = $key->usuario_nombre;
        }    
        return $datos;           
    }

    function selectUsuarioOrigen($n){
        switch ($n) {
            case '0':
                $this->db->select('*')->from('tbl_usuario');
                $this->db->where('usuario_estado',1);
                $this->db->where('usuario_token','usado');
                $query = $this->db->get();
                foreach ($query->result() as $key) {
                  $datos[$key->usuario_id] = $key->usuario_nombre;
                }               
            break;            
            case '1': //DEBO MOSTRAR EL NOMBRE DEL SECRETARIO 
                $this->db->select('u.*, s.secretaria_nombre, s.secretaria_encargado');
                $this->db->where('usuario_estado',1);
                $this->db->where('usuario_token','usado');
                $this->db->from('tbl_usuario u');
                $this->db->join('tbl_secretaria s','u.usuario_detalles = s.secretaria_id');
                $query = $this->db->get();
                foreach ($query->result() as $key) {
        $datos[$key->usuario_id]=$key->secretaria_nombre.' - '.$key->secretaria_encargado;
                }
                
            break;
        }     
        return $datos;   
    }

    function selectUsuarioDestino($n){
        switch ($n) {
            case '0':   //DEBO MOSTRAR EL NOMBRE DEL SECRETARIO 
                $this->db->select('u.*, s.secretaria_nombre, s.secretaria_encargado');
                $this->db->where('usuario_estado',1);
                $this->db->where('usuario_token','usado');
                $this->db->from('tbl_usuario u');
                $this->db->join('tbl_secretaria s','u.usuario_detalles = s.secretaria_id');
                $query = $this->db->get();
                foreach ($query->result() as $key) {
        $datos[$key->usuario_id]=$key->secretaria_nombre.' - '.$key->secretaria_encargado;
                }
            break;            
            case '1':
                $this->db->select('*');
                $this->db->where('usuario_estado',1);
                $this->db->where('usuario_token','usado');
                $this->db->from('tbl_usuario');
                $query = $this->db->get();
                foreach ($query->result() as $key) {
                  $datos[$key->usuario_id] = $key->usuario_nombre;
                }
            break;
        }        
        return $datos;        
    }

    function getUsuarioUnregister($n){
        $this->db->select('u.usuario_email, u.usuario_rol, u.usuario_token, u.usuario_id');
        $this->db->where('u.usuario_token',$n);
        $this->db->from('tbl_usuario u');
        $entidad = $this->db->get()->result();
        return $entidad;
    }

    function getOtherUser($n)
    {
        $this->db->select('u.usuario_email, u.usuario_rol, u.usuario_token, a.*');
        $this->db->where('u.usuario_token',$n);
        $this->db->from('tbl_usuario u');
        $this->db->join('tbl_afiliado a', 'u.usuario_detalles = a.persona_id');
        $entidad = $this->db->get()->result();
        
        return $entidad;
    }

    function finishUserRegist($post)
    {
        $data = array(
            'persona_telfijo'           =>  $post['teleffijo'], 
            'persona_telmovil'          =>  $post['telefmovil'], 
            'persona_cip'               =>  $post['cip'],
            'persona_telcorporativo'    =>  $post['telefonocorporativo'], 
            'persona_cargo'             =>  $post['cargo'], 
            'persona_fechaafiliacion'   => date('Y-m-d'),
            'persona_hijos'             =>  $post['hijos'], 
            'persona_gradoinstruccion'  =>  $post['gradoinstruccion'],
            'persona_gerenciajefatura'  =>  $post['gerenciajefatura']
        );

        $this->db->where('persona_id', $post['iduser']);
        $this->db->update('tbl_afiliado', $data);
        
        $this->db->set('usuario_clave', do_hash(strtoupper($post['clave']),'md5'));
        $this->db->set('usuario_token','usado');
        $this->db->where('usuario_token',$post['token']);
        $this->db->update('tbl_usuario');
    }

    function finishUser2Regit($post)
    {
        $this->db->set('usuario_clave',do_hash(strtoupper($post['clave']),'md5'));
        $this->db->set('usuario_token','usado');
        $this->db->where('usuario_id',$post['iduser']);
        $this->db->update('tbl_usuario');
    }

    function confirmarUse($id)
    {
        $query = $this->db->get_where('tbl_usuario', array('usuario_id' => $id));
        $destinatario = $query->result()[0]->usuario_email;
        $hash = rand(1111, 9999);
        $this->db->set('usuario_token','usado');
        $this->db->set('usuario_clave', do_hash(strtoupper($hash),'md5'));
        $this->db->where('usuario_id',$id);
        $this->db->update('tbl_usuario');

        $data = array('destino' => $destinatario, 'clave' => $hash);
        return $data; 
    }

    function filtrarUsuario($id)
    {
        $this->db->select('usuario_nombre');
        $this->db->where('usuario_id',$id);
        $this->db->from('tbl_usuario');
        return $this->db->get()->result()[0]->usuario_nombre;
    }

    function getAfiliados()
    {// p.persona_sindicato
        $this->db->select('u.usuario_email, p.persona_nombres, p.persona_numdocumento, p.persona_telmovil, p.persona_telfijo, p.persona_fechaingreso');
        $this->db->from('tbl_usuario u');
        $this->db->join('tbl_afiliado p','p.persona_id = u.usuario_detalles');
        $this->db->where('u.usuario_rol',4);
        $this->db->where('u.usuario_token','usado');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }        
    }

    function getCountAfiliados() 
    {
        $query = $this->db->query("SELECT COUNT(usuario_id) as total FROM tbl_usuario WHERE usuario_token = 'usado' AND usuario_estado = 1");
        $rs = $query->result_array()[0]['total'];

        return $rs;
    }
}
