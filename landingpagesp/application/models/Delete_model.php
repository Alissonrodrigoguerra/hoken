<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Delete_model
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

class Delete_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index($id = NULL, $table = NULL)
  {
    //DELETE FROM products WHERE product_id=1;
   

    $sql = "DELETE FROM {$table} WHERE id".ucwords(strtolower($table))." = {$id} ";
    if($this->db->query($sql)){

      echo "removido com sucesso!";
    
    }else{
      
      echo "problemas ao remover!";
    
    }
    
  }

  // ------------------------------------------------------------------------

}

/* End of file Delete_model.php */
/* Location: ./application/models/Delete_model.php */