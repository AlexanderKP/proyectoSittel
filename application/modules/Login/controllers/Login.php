<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index() {
        if ($this->session->userdata('s_user') == TRUE) {
            redirect(base_url().'Principal');
        }
        $this->load->view('Login/index_view');
    }

    public function verificar() {
        if ($this->session->userdata('s_user') == TRUE) {
            //redirect(base_url().'Principal');
        }
        $this->form_validation->set_rules("email", "usuario", "trim|required");
        $this->form_validation->set_rules("password", "contraseña", "trim|required");

        $consulta = $this->usuario_model->getUsuario($this->input->post());
        $anio = time() + ( 365 * 24 * 60 * 60);
        if(!empty($_POST["rememberme"])){
            $cookie1 = array(
                'name'   => "member_login",
                'value'  => $this->input->post('email'),
                'expire' => $anio
            );  
            $this->input->set_cookie($cookie1);
            $cookie2 = array(
                'name'   => "member_pass",
                'value'  => $this->input->post('password'),
                'expire' => $anio
            );  
            $this->input->set_cookie($cookie2);
        }else{
            if(isset($_COOKIE["member_login"]))   
            {  
                $cookie1 = array(
                    'name'   => "member_login",
                    'value'  => "",
                    'expire' => $anio
                );  
                $this->input->set_cookie($cookie1);
            }
            if(isset($_COOKIE["member_pass"]))   
            {  
                $cookie2 = array(
                    'name'   => "member_pass",
                    'value'  => "",
                    'expire' => $anio
                );  
                $this->input->set_cookie($cookie2);
            }  
        }
        if ($consulta != false) {
                foreach($consulta->result() as $row){
                    $data['s_user'] = $row;
                }
                $this->session->set_userdata($data);
                $persona = $this->usuario_model->getDatosPersonal($data['s_user']->usuario_rol, $data['s_user']->usuario_detalles);

                foreach ($persona->result() as $row) {
                    $entity['s_persona'] = $row;
                }
                $this->session->set_userdata($entity);

                redirect(base_url() . 'Principal', 'refresh');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Este usuario no existe.</div>');
            $this->index();
        }
    }

    public function firstInit($n){
        $this->load->model('empresa_model');
        $user = $this->usuario_model->getUsuarioUnregister($n)[0];
        $rs = count($user);
        if ($rs < 1) {
            redirect(base_url());
        }
        if ($user->usuario_rol == 4) {
            $data['empresa'] = $this->empresa_model->getEmpresas()->result();
            $data['user'] = $this->usuario_model->getOtherUser($n)[0];;
            $this->load->view('registrar_view',$data);
        }else{
            $data['user'] = $user;
            $this->load->view('registrar2_view',$data);
        }
    }

    public function upLastRegister(){
        $post = $this->input->post();
        $this->usuario_model->finishUserRegist($post);
    }

    public function Update2Register() {
        $post = $this->input->post();
        $this->usuario_model->finishUser2Regit($post);
    }

    public function recuperar() {
        if ($this->session->userdata('s_user') == TRUE) {
            redirect(base_url().'Principal');
        }
        $this->load->view('Login/recovery_view');
    }

    function reenviarInvitacion($n)
    {        
        $this->load->model('afiliado_model');
        $consulta = $this->afiliado_model->getAfiliadoReenvio($n)->result_array()[0];
        $consulta['token'] = $consulta['usuario_token'];
        $this->enviarMailRegistro($consulta['usuario_email'],$consulta);
    }

    function confirmarUse()
    {
        $this->load->model('usuario_model');
        $id = $_POST['cod'];
        $result = $this->usuario_model->confirmarUse($id);
        
        $this->enviarPasswordHashed($result);
    }

}
