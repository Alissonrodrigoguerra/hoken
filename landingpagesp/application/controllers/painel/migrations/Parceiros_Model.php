<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Users_Model
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Parceiros_Model extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();

    $this->load->dbforge();

  }

  public function up()
  {
    // 

    
   $this->load->helper('construct_table_helper');	
   $data = array();

   $user = "parceiros";
   
    helperconstruct_table_insert_fields( $user,'name','varchar','255',Null,Null);
    helperconstruct_table_insert_fields( $user,'imagem','varchar','255',Null,Null);

    echo "tabela ".$user." criada com sucesso!";
  

  }
    

  public function down(){
    
   $this->dbforge->drop_table('parceiros', TRUE);
   echo 'Database deleted!';


  }
  
}


/* End of file Users_Model.php */
/* Location: ./application/controllers/Users_Model.php */