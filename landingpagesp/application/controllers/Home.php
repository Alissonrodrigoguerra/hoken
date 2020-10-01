

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->helper('formulario_painel');
        $data = array();

        // teste
        $this->load->view('home/index', $data, FALSE);
        
        
    }


}

// /* End of file home.php */


?>
