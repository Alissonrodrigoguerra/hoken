<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Leads_model extends CI_Model {

    public function cadastrar_lead($nome=NULL, $email=NULL, $telefone=NULL, $estado=NULL, $cidade=NULL, $investimento=NULL){
        
        $dataCadastro = '18/04/1989';
        $status = '1'; 

        $data = array( 
            'nome'=>  $nome,
            'email'=>  $email,
            'tel'=> $telefone,
            'estado'=>  $estado,
            'cidade'=>  $cidade,
            'investimento'=>  $investimento,
            'status'=>  $status
            
        );

        if ($this->db->insert('leads', $data)) {

            return json_encode('sucesso');
          
           
        } else 
        {
            return json_encode('error');
        }
      
        }
    

}

/* End of file ModelName.php */


?>