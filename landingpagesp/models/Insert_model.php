<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Insert_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Insert_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    $this->load->database();

  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index($table = null, $data = null)
  {
    // 
    if($this->db->insert($table, $data)){

      echo "Inserido com sucesso!";
    
    }else{
      
      echo "problemas ao Inserir!";
    
    }
  }

  // ------------------------------------------------------------------------

}

/* End of file Insert_model.php */
/* Location: ./application/models/Insert_model.php */