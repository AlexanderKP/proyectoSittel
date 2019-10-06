<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller{

	function __contruct()
	{
		parent::__contruct();
        $this->session->userdata('s_user');
	}
	public function sample_template($view = null)
	{
		$view['title_head'] = 'Sistema Gestion de Ticket SITTEL';
		$view['title_page'] = 'SITTEL - PERU';
		$this->load->view('Template/sample_template_v',$view);
	}
}