<!--  // Disciplina  :  [Função helper Loging ]
// Autor(a)    : Aisson Rodrigo Guerra
// Data atual  : 28/01/2020 -->
<?php 
     
function logando ($user=NULL, $pass=NULL){

    // EXEMPLO DE HElper com consulta ao banco de dados
		
		$ci=& get_instance();
        $ci->load->database();
        $ci->load->helper('url');
        $ci->load->helper('login2');
        $ci->load->library('session');


   if(empty($pass)){ 
    
        $data['mensagem']  = "<div id='msg' >Ops! Campo senha vazio. </div>" ;
        $ci->output->set_output($data['mensagem']);

    }
    
    if(!empty($pass)){ 
            
		$sql = "SELECT * FROM users WHERE nome = '".$user."' OR email = '".$user."'"; 
		$query = $ci->db->query($sql);
		$row = $query->result();
        if(!empty($row)){
            // COMPAR SE USUARIOS E SENHA SÃO IGUAIS AOS USUÁRIO E SENHA DO BANCO
            print_r($row);
            $pass = helperLogin2CriptografarSenha($pass);
            $senhalogin = $row[0]->senha;

            if(!$pass !== $senhalogin){
                
                $sql = "SELECT * FROM cargos WHERE idCargos = ".$row[0]->idCargo.""; 
                $query = $ci->db->query($sql);
                $cargos = $query->result();


                $auth = array(
                    
                    'idUsers' => $row[0]->idUsers,
                    'idCargos' => $row[0]->idCargo,
                    'cargo' => $cargos[0]->nome,
                    'nome' => $row[0]->nome,
                    'email' => $row[0]->email,
                    'logged_in' => TRUE,
                    'area' => 'Painel ' . APP_NAME,
                );
                
                
                $ci->session->set_userdata('auth', $auth);


                if ($ci->session->userdata('redirect')) {
                    $redirect = $ci->session->userdata('redirect');
                    $ci->session->unset_userdata('redirect');
                    redirect($redirect);

                } else {

                    redirect(base_url('painel/dashboard'));
                }

                
            }else{

                $data['mensagem']  = "<div id='msg' >Ops! Senha errada. </div>" ;
                $ci->output->set_output($data['mensagem']);

            }
            

        }


        $data['mensagem']  = "<div id='msg' >Ops! Usuário Não Identificado. </div>" ;
        $ci->output->set_output($data['mensagem']);

    }
    
    
}


function logout($session=NULL){
    $ci=& get_instance();
    $ci->load->library('session');

    $ci->session->sess_destroy('auth');
}

?>