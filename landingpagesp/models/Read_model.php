<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Read_model
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

class Read_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();

    $this->load->database();

  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index($table)
  {
    
    $sql = "SELECT * FROM {$table}";
    $result = $this->db->query($sql)->result_array();
    return $result;
  
  }
 
  public function select__id($table, $id = Null )
  {
    $idtable = 'id'.ucfirst($table);
    $sql = "SELECT * FROM {$table}   WHERE {$idtable} = {$id} ORDER BY {$idtable} ASC";
    $result = $this->db->query($sql)->row_array();
    return $result;
   
  }

  


  public function select_ativo($table, $config = NUll)
  {
  $sql = "SELECT * FROM {$table} WHERE status = 1 {$config}";
    $result = $this->db->query($sql)->result_array();
    return $result;
   
  }



  // ------------------------------------------------------------------------

}

/* End of file Read_model.php */
/* Location: ./application/models/Read_model.php */