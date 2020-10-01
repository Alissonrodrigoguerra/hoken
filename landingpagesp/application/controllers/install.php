<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		 $this->load->helper('construct_table_helper');

	}
	


	public function index(){
		
		$this->load->helper('cria_arquivo_helper');	
		$data = array();

		// if ( $this->input->post()) {
		
		// 	$host =   $this->input->post('host') ;
		// 	$user =  $this->input->post('user') ;
		// 	$pass =  $this->input->post('pass');
		// 	$database =  $this->input->post('database');
			

		// }

		// Instalação inicials
		
		// helperconstruct_table_criar('acoes');
		// helperconstruct_table_insert_fields('acoes','alias','varchar','128',Null,Null);
		// helperconstruct_table_insert_fields('acoes','icone','varchar','128',Null,Null);
		// helperconstruct_table_criar('areas');
		// helperconstruct_table_criar('cargos');
		// helperconstruct_table_criar('cargos_areas');
		// helperconstruct_table_insert_fields('cargos_areas','idCargos','int','11',Null,Null);
		// helperconstruct_table_insert_fields('cargos_areas','idAreas','int','11',Null,Null);
		// helperconstruct_table_criar('tabelas');
		// helperconstruct_table_insert_fields('tabelas','idTabelaGrupo','int','11',Null,Null);
		// helperconstruct_table_insert_fields('tabelas','alias','varchar','27',Null,Null);
		// helperconstruct_table_insert_fields('tabelas','icone','varchar','27',Null,Null);
		// helperconstruct_table_insert_fields('tabelas','posicao','int','11',Null,Null);
		// helperconstruct_table_insert_fields('tabelas','visivelNoMenu','enum','("1", "0")',Null,Null);
		// helperconstruct_table_criar('permissoes');
		// helperconstruct_table_insert_fields('permissoes','idTabela','int','11',Null,Null);
		// helperconstruct_table_insert_fields('permissoes','idAcao','int','11',Null,Null);
		// helperconstruct_table_insert_fields('permissoes','idTabela','int','11',Null,Null);

		// helperconstruct_table_criar('usuarios');
		// helperconstruct_table_insert_fields('usuarios','idCargos','int','11',Null,Null);
		// helperconstruct_table_insert_fields('usuarios','sobrenome','varchar','128',Null,Null);
		// helperconstruct_table_insert_fields('usuarios','email','varchar','200',Null,Null);
		// helperconstruct_table_insert_fields('usuarios','hash','varchar','128',Null,Null);
		// helperconstruct_table_insert_fields('usuarios','imagem','varchar','128',Null,Null);

		
		$this->load->view('install/index', $data, FALSE);
		

	}
	

}
/* End of file install.php */
/* Location: ./application/controllers/install.php */ 
?>
