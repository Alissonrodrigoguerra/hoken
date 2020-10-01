<?php

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
	   
		// print_r($this->session->userdata('auth'));
		// exit;
		if (!$this->session->userdata('auth')) {
            
		
			redirect('painel/login');
		
		} else {
		
			$auth = $this->session->userdata('auth');
            $area = 'Painel ' . APP_NAME;
            if ($auth['area'] != $area) {
                redirect('painel/logout');
            }
		
		}
        $this->load->helper('painel2');
        $this->load->helper('session2');

    }

    public function index() {


        $data = array();
        $data['auth'] =   $this->session->auth;

        $data['view']['controller'] = array('name' => 'dashboard', 'alias' => 'Dashboard');
        $data['view']['action'] = array('name' => 'index', 'alias' => 'Index');

        $this->load->view('painel/dashboard/index', $data);
        //
    }

    public function limpar_cache() {

        $rows = scandir('./application/cache');

        $search = array_search('.', $rows);
        unset($rows[$search]);

        $search = array_search('..', $rows);
        unset($rows[$search]);

        $search = array_search('.htaccess', $rows);
        unset($rows[$search]);

        $search = array_search('index.html', $rows);
        unset($rows[$search]);

        $search = array_search('sql', $rows);
        unset($rows[$search]);

        foreach ($rows as $row) {
            unlink("./application/cache/{$row}");
        }

        $this->db->cache_delete_all();
        redirect('painel/dashboard');
    }

}
