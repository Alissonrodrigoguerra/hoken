<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Update_model
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

class Update_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
    $this->load->database();


  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index($id = Null, $table = Null, $data = Null)
  {
    // 
    $this->db->where('id'.ucfirst($table), $id);
    return $this->db->update($table, $data);
  }

  // ------------------------------------------------------------------------

}

/* End of file Update_model.php */
/* Location: ./application/models/Update_model.php */