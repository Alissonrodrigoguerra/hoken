<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	// index.php
	
	public function __construct(){
		parent::__construct();
		
		$this->load->helper('login');
		
	}
	

	function logon(){


		$this->session->set_userdata('pessoa', 'J');

        if ($this->session->userdata('auth')) {
            redirect('painel/dashboard');
        }

		$data = array();

		$name = $this->input->post('username');
		
		if(!empty($name)){
			
			$User = $this->input->post('username');
			$Pass = $this->input->post('password');
			
			// HELPER PARA VERIFICAR O LOGIN E ABRIR SESSÃO.
			
			logando($User, $Pass);

		

		}else{
			
			$data['mensagem']  = "<div id='msg' >Ops! Campos vazio. </div>" ;
			$this->output->set_output($data['mensagem']);
			
		}
	
				
		$this->load->view('./painel/login/index');

	}


	function recuperar(){

		
		$this->load->view('./painel/login/recuperar');

	}

	function redefinir(){

		
		$this->load->view('./painel/login/redefinir');

	}

	function logout(){

		logout('auth');
		$this->load->view('./painel/login/index');

	}

}
