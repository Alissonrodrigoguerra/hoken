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

class TabelasAlterar_Empresa extends CI_Controller
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

   $user = "Empresa";
   helperconstruct_table_insert_fields( $user,'sub_titulo','longtext',Null,Null);
    helperconstruct_table_insert_fields( $user,'titulo','varchar','255',Null,Null);
    helperconstruct_table_insert_fields( $user,'descricao','longtext',Null,Null);
    helperconstruct_table_insert_fields( $user,'link','varchar','255',Null,Null);
    helperconstruct_table_insert_fields( $user,'status','int','11',Null,Null);

    echo "tabela ".$user." criada com sucesso!";
  

  }
    

  public function down(){
   
   $user = "Empresa";
   $this->dbforge->drop_table($user, TRUE);
   echo 'Database deleted!';


  }
  
}


/* End of file Users_Model.php */
/* Location: ./application/controllers/Users_Model.php */