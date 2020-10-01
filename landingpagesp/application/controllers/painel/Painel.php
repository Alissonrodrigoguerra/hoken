<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Painel extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		
		if (!$this->session->userdata('auth')) {
            redirect('painel/login');
        } else {
            $auth = $this->session->userdata('auth');
            $area = 'Painel ' . APP_NAME;
		   
			if ($auth['area'] != $area) {
                redirect('painel/logout');
            }
        }
        
        define('TABELA_NOME', 'tabelas');
        define('TABELA_ALIAS', 'Tabelas');
        define('TABELA_ID', 'idTabelas');
	}
	
	public function index()
	{
        
        $data['view']['controller'] = array('name' => TABELA_NOME, 'alias' => TABELA_ALIAS);
        $data['view']['action'] = array('name' => 'index', 'alias' => 'Listar');

		$this->load->view('./painel/dashboard/index', $data);
	}


	public function limpar_cache() {

        $rows = scandir('./application/cache');


        foreach ($rows as $row) {
            unlink("./application/cache/{$row}");
        }

        $this->db->cache_delete_all();
        redirect('dashboard');
        
    }


	// index.php
}
