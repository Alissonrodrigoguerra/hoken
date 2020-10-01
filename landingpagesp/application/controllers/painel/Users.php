<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Users
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 */

class Users extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    
    define('TABELA_NOME','users');

    $this->load->model('delete_model');
    $this->load->model('insert_model');
    $this->load->model('update_model');
    $this->load->model('read_model');



  }

  public function index()
  {

    $data = array();

    $this->load->view('painel/users/index.php', $data, FALSE);
    
  }

  public function create_update()
  {
    
    $this->load->helper('login2_helper');
    
    $data = array(

        'name' => 'Alisson',
        'email' => 'arodrigoguerra@gmail.com',
        'idCargo' => '0',
        'senha' => helperLogin2CriptografarSenha('123'),
        'path' => 'alisson_guerra',

    );

    
  $this->insert_model->index(TABELA_NOME, $data);

  }

  public function deactivate($id){
    
  $data = array(

      'name' => 'admin',
      'email' => 'admin@gmail.com',
      'path' => 'admin_admin',

  );

  
  $this->update_model->index($id, TABELA_NOME, $data);

  }

  public function remove($id){

    // echo $id;
    // echo TABELA_NOME;
    
    
    
    $this->delete_model->index($id, TABELA_NOME);
    
  }


  public function query($id)
  {


    echo $id;
    
  }

}


/* End of file Users.php */
/* Location: ./application/controllers/Users.php */